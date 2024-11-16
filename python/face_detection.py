import os
import sys
import io
import json
import numpy as np
from tensorflow.keras.models import load_model
import time
import cv2
from sklearn.metrics.pairwise import cosine_similarity, euclidean_distances
from sklearn.metrics import precision_score, recall_score, f1_score, accuracy_score, roc_curve, auc
import dlib
import matplotlib.pyplot as plt
import scipy.spatial
import mediapipe as mp

# Suppress TensorFlow logs and oneDNN messages
os.environ['TF_CPP_MIN_LOG_LEVEL'] = '2'
os.environ['TF_ENABLE_ONEDNN_OPTS'] = '0'
import tensorflow as tf
tf.get_logger().setLevel('ERROR')

# Set up UTF-8 encoding for stdout
sys.stdout = io.TextIOWrapper(sys.stdout.buffer, encoding='utf-8')
start_time = time.time()

# Define paths
script_dir = os.path.dirname(os.path.abspath(__file__))
model_path = os.path.join(script_dir, '../face_recognition_model_v1.h5')

# Load model and dlib components
model = load_model(model_path)
predictor_path = os.path.join(script_dir, "../shape_predictor_68_face_landmarks.dat")
predictor = dlib.shape_predictor(predictor_path)
detector = dlib.get_frontal_face_detector()
mp_face_mesh = mp.solutions.face_mesh
mp_drawing = mp.solutions.drawing_utils

# Initialize face mesh model
face_mesh = mp_face_mesh.FaceMesh(min_detection_confidence=0.5, min_tracking_confidence=0.5)
def estimate_pose(image, landmarks):
    # Convert the landmarks to 3D points (3D head pose estimation requires a 3D model)
    image_height, image_width = image.shape[:2]
    
    # Create a list of points from the face landmarks (x, y, z)
    face_points = []
    for i in range(0, 468):  # MediaPipe FaceMesh has 468 landmarks
        landmark = landmarks[i]
        face_points.append([landmark.x * image_width, landmark.y * image_height])
    
    # You can use the 3D landmark positions (x, y, z) for pose estimation
    
    # Example for a simplified pose estimation (head tilt, yaw, roll)
    nose_point = face_points[1]  # Nose tip (use any key point for pose)
    chin_point = face_points[152]  # Chin (you can select multiple for better estimation)

    # This is a simplified example; a robust method should involve using a camera calibration matrix
    # to perform a more sophisticated pose estimation (such as solving PnP).
    
    # For now, we will calculate a simple angle between nose and chin to approximate head pose.
    vector = np.array(nose_point) - np.array(chin_point)
    yaw = np.arctan2(vector[1], vector[0])  # Yaw
    pitch = np.arctan2(vector[0], vector[1])  # Pitch

    return yaw, pitch  # Return yaw and pitch as example
def estimate_lighting(image):
    # Convert the image to grayscale
    gray_image = cv2.cvtColor(image, cv2.COLOR_BGR2GRAY)
    
    # Calculate the mean brightness
    mean_brightness = np.mean(gray_image)
    
    # Optional: Use histogram for more detailed lighting analysis
    hist = cv2.calcHist([gray_image], [0], None, [256], [0, 256])
    contrast = np.std(gray_image)

    
    # Calculate the overall contrast (standard deviation of pixel values)
    contrast = np.std(gray_image)
    
    # Determine lighting condition
    lighting_condition = "Optimal" if mean_brightness > 100 and contrast > 50 else "Poor Lighting"
    
    return mean_brightness, contrast, lighting_condition
def preprocess_image(image_path, target_size=(400, 400)):
    image = cv2.imread(image_path)
    if image is None:
        raise ValueError(f"Image at path {image_path} could not be loaded.")
    
    #print("Original image shape:", image.shape)
    
    # Estimate lighting condition
    brightness, contrast, lighting_condition = estimate_lighting(image)
    #print(f"Lighting Condition: {lighting_condition}, Brightness: {brightness}, Contrast: {contrast}")
    
    #if lighting_condition == "Poor Lighting":
        #print("Warning: Image has poor lighting, which may affect face detection and recognition.")
    
    # Proceed with regular preprocessing for face detection and embedding calculation
    gray_image = cv2.cvtColor(image, cv2.COLOR_BGR2GRAY)
    faces = detector(gray_image)
    
    #print(f"Detected faces: {len(faces)}")
    
    if len(faces) == 0:
        raise ValueError(f"No faces detected in the image: {image_path}")
    
    # Get the largest face (or use any other logic to choose the face)
    face = max(faces, key=lambda rect: rect.width() * rect.height())
    
    #print("Detected face at:", face)
    
    # Get landmarks for the cropped face
    landmarks = predictor(gray_image, face)
    
    #print(f"Landmarks detected: {len(landmarks.parts())}")
    
    input_shape = model.input_shape[1:3]
    image_resized = cv2.resize(image, input_shape)
    image_normalized = np.array(image_resized, dtype=np.float32) / 255.0
    image_expanded = np.expand_dims(image_normalized, axis=0)
    
    return image_expanded, landmarks, lighting_condition


def crop_face(image, face, target_size=(400, 400)):
    # Get the coordinates of the face bounding box
    x, y, w, h = (face.left(), face.top(), face.width(), face.height())
    
    # Crop the image to the face bounding box
    cropped_face = image[y:y+h, x:x+w]
    
    # Resize the cropped face to simulate "zooming in" to the face
    cropped_face_resized = cv2.resize(cropped_face, target_size)
    
    return cropped_face_resized

def calculate_face_embedding(image):
    embedding = model.predict(image, verbose=0)
    #print("calculate_face_embedding: ",embedding)
    return embedding

def normalize_landmark_distance(landmarks1, landmarks2, image_size):
    # Calculate landmark distances for the first and second set of landmarks
    result1 = calculate_landmark_ratios(landmarks1)
    result2 = calculate_landmark_ratios(landmarks2)
    
    # Check that both results have six values
    if len(result1) != 6 or len(result2) != 6:
        raise ValueError(f"Expected 6 values for each result, but got {len(result1)} and {len(result2)}.")

    # Unpack the results into six variables each
    eye_distance1, jaw_width1, nose_mouth_distance1, eye_to_nose_distance1, nose_to_mouth_distance1, mouth_to_chin_distance1 = result1
    eye_distance2, jaw_width2, nose_mouth_distance2, eye_to_nose_distance2, nose_to_mouth_distance2, mouth_to_chin_distance2 = result2
    
    # Calculate the normalized differences for each distance type
    normalized_eye_distance = abs(eye_distance1 - eye_distance2) / image_size[0]  # Normalize by image width
    normalized_jaw_width = abs(jaw_width1 - jaw_width2) / image_size[0]  # Normalize by image width
    normalized_nose_mouth_distance = abs(nose_mouth_distance1 - nose_mouth_distance2) / image_size[1]  # Normalize by image height
    normalized_eye_to_nose_distance = abs(eye_to_nose_distance1 - eye_to_nose_distance2) / image_size[1]  # Normalize by image height
    normalized_nose_to_mouth_distance = abs(nose_to_mouth_distance1 - nose_to_mouth_distance2) / image_size[1]  # Normalize by image height
    normalized_mouth_to_chin_distance = abs(mouth_to_chin_distance1 - mouth_to_chin_distance2) / image_size[1]  # Normalize by image height

    # Sum the normalized distances, potentially applying different weights if desired
    total_normalized_distance = (
        normalized_eye_distance + 
        0.5 * normalized_jaw_width + 
        0.5 * normalized_nose_mouth_distance +
        0.3 * normalized_eye_to_nose_distance + 
        0.3 * normalized_nose_to_mouth_distance + 
        0.3 * normalized_mouth_to_chin_distance
    )
    
    return total_normalized_distance

def calculate_landmark_ratios(landmarks):
    # Focus on key distances: eyes, jaw, and nose-to-mouth
    eye_distance = np.linalg.norm(np.array([landmarks.part(36).x, landmarks.part(36).y]) - 
                                  np.array([landmarks.part(45).x, landmarks.part(45).y]))
    jaw_width = np.linalg.norm(np.array([landmarks.part(0).x, landmarks.part(0).y]) - 
                               np.array([landmarks.part(16).x, landmarks.part(16).y]))
    nose_mouth_distance = np.linalg.norm(np.array([landmarks.part(33).x, landmarks.part(33).y]) - 
                                         np.array([landmarks.part(57).x, landmarks.part(57).y]))
    eye_to_nose_distance = np.linalg.norm(
        np.array([landmarks.part(36).x, landmarks.part(36).y]) - 
        np.array([landmarks.part(33).x, landmarks.part(33).y])
    )
    nose_to_mouth_distance = np.linalg.norm(
        np.array([landmarks.part(33).x, landmarks.part(33).y]) - 
        np.array([landmarks.part(57).x, landmarks.part(57).y])
    )
    mouth_to_chin_distance = np.linalg.norm(
        np.array([landmarks.part(57).x, landmarks.part(57).y]) - 
        np.array([landmarks.part(8).x, landmarks.part(8).y])
    )
    
    # Ensure it returns 6 values
    return eye_distance, jaw_width, nose_mouth_distance, eye_to_nose_distance, nose_to_mouth_distance, mouth_to_chin_distance

def calculate_weighted_similarity(embedding_similarity, landmark_similarity, landmark_ratios_score, weights=(0.95, 0.025, 0.025)):
    # Ensure that all values are floats (in case they are numpy types or tuples)
    embedding_similarity = float(embedding_similarity)
    landmark_similarity = float(landmark_similarity)
    
    # If landmark_ratios_score is a tuple, take the first value
    if isinstance(landmark_ratios_score, tuple):
        landmark_ratios_score = float(landmark_ratios_score[0])  # Extract the first value of the tuple

    combined_score = (weights[0] * embedding_similarity + 
                      weights[1] * (1 - landmark_similarity) + 
                      weights[2] * landmark_ratios_score)
    return combined_score



def check_distance(image, optimal_face_size=(400, 400), min_face_size=(400, 400), max_face_size=(400, 400)):
    # Assume the face size should ideally be around (200, 200) pixels
    image_height, image_width = image.shape[:2]
    face_size = max(image_height, image_width)  # or any other metric for face size
    
    if face_size < min_face_size[0] or face_size < min_face_size[1]:
        return "You are too far from the camera."
    elif face_size > max_face_size[0] or face_size > max_face_size[1]:
        return "You are too close to the camera."
    else:
        return "Your distance from the camera is optimal."

def compare_faces_with_landmarks(image1_path, image2_path, embedding_similarity_threshold=0.99 , landmark_distance_threshold=100):
    # Preprocess both images to get landmarks and embeddings
    img1, landmarks1, lighting_condition1 = preprocess_image(image1_path)
    #print(f"Lighting condition for image1: {lighting_condition1}")
    img2, landmarks2, _ = preprocess_image(image2_path)

    # Apply comparison only if image1 has "Poor Lighting" or "Optimal" lighting
    if lighting_condition1 in ["Poor Lighting"]:
        return {
            "result": "skipped",
            "message": f"Face scan skipped due to lighting condition: {lighting_condition1}.",
        }


    # Calculate facial embeddings for both images
    embedding1 = calculate_face_embedding(img1)
    embedding2 = calculate_face_embedding(img2)

    # Calculate embedding similarity
    embedding_similarity = float(cosine_similarity(embedding1, embedding2)[0][0])
    embedding_distance = float(euclidean_distances(embedding1, embedding2)[0][0])
    distances1 = plot_landmarks_and_distances(image1_path, landmarks1)
    distances2 = plot_landmarks_and_distances(image2_path, landmarks2)
    # Calculate the normalized landmark distance
    landmark_distance = float(normalize_landmark_distance(landmarks1, landmarks2, img1.shape[:2]))

    # Determine match based on thresholds
    match = embedding_similarity >= embedding_similarity_threshold and landmark_distance >= landmark_distance_threshold
    
    # Calculate combined similarity
    combined_similarity = (embedding_similarity + (1 - landmark_distance)) / 2

    # Return result based on match condition
    if match:
        return {
            "result": "success", 
            "message": "Faces match!", 
            "embedding_similarity": embedding_similarity, 
            "embedding_distance": embedding_distance, 
            "landmark_distance": landmark_distance,
            "combined_similarity": combined_similarity
        }
    else:
        return {
            "result": "failure", 
            "message": "Faces do not match", 
            "embedding_similarity": embedding_similarity, 
            "embedding_distance": embedding_distance, 
            "landmark_distance": landmark_distance,
            "combined_similarity": combined_similarity
        }



def calculate_metrics(y_true, y_pred):
    precision = precision_score(y_true, y_pred, average='weighted', zero_division=0)
    recall = recall_score(y_true, y_pred, average='weighted', zero_division=0)
    f1 = f1_score(y_true, y_pred, average='weighted', zero_division=0)
    accuracy = accuracy_score(y_true, y_pred)
    return precision, recall, f1, accuracy


def plot_landmarks_and_distances(image_path, landmarks, target_size=(400, 400)):
    # Load the image
    image = cv2.imread(image_path)
    image_rgb = cv2.cvtColor(image, cv2.COLOR_BGR2RGB)

    # Get the face bounding box using landmarks
    all_landmarks = [(landmarks.part(i).x, landmarks.part(i).y) for i in range(68)]
    
    # Get the face bounding box coordinates (min/max of all landmarks)
    x_min = min([landmarks.part(i).x for i in range(68)])
    y_min = min([landmarks.part(i).y for i in range(68)])
    x_max = max([landmarks.part(i).x for i in range(68)])
    y_max = max([landmarks.part(i).y for i in range(68)])
    
    # Crop the image to the bounding box around the face
    cropped_face = image[y_min:y_max, x_min:x_max]
    
    # Resize the cropped face to the target size
    cropped_face_resized = cv2.resize(cropped_face, target_size)

    # Calculate the resize ratio (original crop size to target size)
    crop_width = x_max - x_min
    crop_height = y_max - y_min
    resize_ratio_x = target_size[0] / crop_width
    resize_ratio_y = target_size[1] / crop_height

    # Adjust the landmarks relative to the cropped image and scale them to the resized image
    adjusted_landmarks = [
        ((x - x_min) * resize_ratio_x, (y - y_min) * resize_ratio_y) for (x, y) in all_landmarks
    ]

    # Plot the cropped face with landmarks
    plt.figure(figsize=(8, 8))
    plt.imshow(cropped_face_resized)

    # Plot landmarks on the resized cropped face
    for (x, y) in adjusted_landmarks:
        plt.scatter(x, y, color="blue", s=20)  # Plot adjusted landmarks

    # Draw the key points and lines
    key_point_pairs = [
        # Eyes to eyes
        (adjusted_landmarks[36], adjusted_landmarks[45]),  # Right eye to left eye
        # Eyes to nose
        (adjusted_landmarks[36], adjusted_landmarks[33]),  # Right eye to nose
        (adjusted_landmarks[45], adjusted_landmarks[33]),  # Left eye to nose
        # Nose to chin
        (adjusted_landmarks[33], adjusted_landmarks[8]),   # Nose to chin
        # Mouth to chin
        (adjusted_landmarks[48], adjusted_landmarks[8]),   # Mouth to chin
        # Lip points (connecting upper and lower lips)
        (adjusted_landmarks[62], adjusted_landmarks[66]),  # Upper lip to lower lip
        (adjusted_landmarks[64], adjusted_landmarks[60]),  # Upper lip to lower lip (other side)
        # Jaw to Chin
        (adjusted_landmarks[0], adjusted_landmarks[8]),    # Jaw left to chin
        (adjusted_landmarks[16], adjusted_landmarks[8])    # Jaw right to chin
    ]
    
    # Define different colors for each type of line
    line_colors = {
        "eyes_to_eyes": "green",
        "eyes_to_nose": "purple",
        "nose_to_chin": "red",
        "mouth_to_chin": "orange",
        "lips": "yellow",
        "eyes_to_mouth":"blue",
        "jaw_to_chin": "cyan"  # Color for jaw-to-chin line
    }
    
    # Plot the lines with different colors
    plt.plot([adjusted_landmarks[36][0], adjusted_landmarks[45][0]], 
             [adjusted_landmarks[36][1], adjusted_landmarks[45][1]], 
             color=line_colors["eyes_to_eyes"], lw=2)
    
    plt.plot([adjusted_landmarks[36][0], adjusted_landmarks[30][0]], 
             [adjusted_landmarks[36][1], adjusted_landmarks[30][1]], 
             color=line_colors["eyes_to_nose"], lw=2)
    
    plt.plot([adjusted_landmarks[45][0], adjusted_landmarks[30][0]], 
             [adjusted_landmarks[45][1], adjusted_landmarks[30][1]], 
             color=line_colors["eyes_to_nose"], lw=2)
    
    plt.plot([adjusted_landmarks[36][0], adjusted_landmarks[48][0]], 
             [adjusted_landmarks[36][1], adjusted_landmarks[48][1]], 
             color=line_colors["eyes_to_mouth"], lw=2)

    plt.plot([adjusted_landmarks[45][0], adjusted_landmarks[54][0]], 
             [adjusted_landmarks[45][1], adjusted_landmarks[54][1]], 
             color=line_colors["eyes_to_mouth"], lw=2)

    plt.plot([adjusted_landmarks[30][0], adjusted_landmarks[8][0]], 
             [adjusted_landmarks[30][1], adjusted_landmarks[8][1]], 
             color=line_colors["nose_to_chin"], lw=2)
    
    plt.plot([adjusted_landmarks[48][0], adjusted_landmarks[8][0]], 
             [adjusted_landmarks[48][1], adjusted_landmarks[8][1]], 
             color=line_colors["mouth_to_chin"], lw=2)
    
    plt.plot([adjusted_landmarks[54][0], adjusted_landmarks[8][0]], 
             [adjusted_landmarks[54][1], adjusted_landmarks[8][1]], 
             color=line_colors["mouth_to_chin"], lw=2)
    # Lips
    plt.plot([adjusted_landmarks[62][0], adjusted_landmarks[66][0]], 
             [adjusted_landmarks[62][1], adjusted_landmarks[66][1]], 
             color=line_colors["lips"], lw=2)
    
    plt.plot([adjusted_landmarks[64][0], adjusted_landmarks[60][0]], 
             [adjusted_landmarks[64][1], adjusted_landmarks[60][1]], 
             color=line_colors["lips"], lw=2)
    
    # Jaw to Chin
    plt.plot([adjusted_landmarks[4][0], adjusted_landmarks[8][0]], 
             [adjusted_landmarks[4][1], adjusted_landmarks[8][1]], 
             color=line_colors["jaw_to_chin"], lw=2)
    
    plt.plot([adjusted_landmarks[12][0], adjusted_landmarks[8][0]], 
             [adjusted_landmarks[12][1], adjusted_landmarks[8][1]], 
             color=line_colors["jaw_to_chin"], lw=2)
    
    # Display distances between landmarks
    distances = {
        "Eye Distance": np.linalg.norm(np.array(adjusted_landmarks[36]) - np.array(adjusted_landmarks[45])),
        "Mouth Width": np.linalg.norm(np.array(adjusted_landmarks[48]) - np.array(adjusted_landmarks[54])),
        "Nose to Chin": np.linalg.norm(np.array(adjusted_landmarks[33]) - np.array(adjusted_landmarks[8])),
        "Eye to Nose": np.linalg.norm(np.array(adjusted_landmarks[36]) - np.array(adjusted_landmarks[33])),
    }
    
    # Annotate distances on the image
    #for i, (label, distance) in enumerate(distances.items()):
        #plt.text(10, 30 + (i * 30), f"{label}: {distance:.2f} px", color="white", fontsize=12)
    
    # Show the plot with landmarks
    plt.title(f"Landmark Distances for {os.path.basename(image_path)}")
    plt.axis("off")
    plt.legend(loc='upper left', fontsize=10)
    plt.show()

    # Return distances for logging or analysis if needed
    return distances

def plot_roc_curve(y_true, y_score):
    fpr, tpr, _ = roc_curve(y_true, y_score)
    roc_auc = auc(fpr, tpr)
    plt.figure()
    plt.plot(fpr, tpr, color='darkorange', lw=2, label='ROC curve (area = %0.2f)' % roc_auc)
    plt.plot([0, 1], [0, 1], color='navy', lw=2, linestyle='--')
    plt.xlim([0.0, 1.0])
    plt.ylim([0.0, 1.05])
    plt.xlabel('False Positive Rate')
    plt.ylabel('True Positive Rate')
    plt.title('Receiver Operating Characteristic (ROC)')
    plt.legend(loc="lower right")
    plt.show()

if __name__ == "__main__":
    if len(sys.argv) != 3:
        print(json.dumps({"result": "failure", "message": "Provide exactly two image paths as arguments."}))
        sys.exit(1)

    image1 = sys.argv[1]
    image2 = sys.argv[2]

    try:
        
        result = compare_faces_with_landmarks(image1, image2)
        #plot_roc_curve(simulated_y_true, simulated_y_pred)

        end_time = time.time()
        elapsed_time = end_time - start_time

        # Include execution time in the result
        result["execution_time"] = str(elapsed_time) + " seconds"

        # Print the final result
        print(json.dumps(result))

    except Exception as e:
        print(json.dumps({"result": "failure", "message": str(e)}))
        sys.exit(1)