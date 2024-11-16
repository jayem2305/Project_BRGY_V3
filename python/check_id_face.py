# detect_faces.py
import sys
from ultralytics import YOLO
import cv2
import json

def detect_faces(image_path):
    model = YOLO('../yolov8n.pt')  # Replace with your model's path
    results = model(image_path)

    faces = []
    for result in results:
        for box in result.boxes:
            faces.append({
                'x': int(box.xyxy[0][0]),  # x-min
                'y': int(box.xyxy[0][1]),  # y-min
                'width': int(box.xyxy[0][2] - box.xyxy[0][0]),  # width
                'height': int(box.xyxy[0][3] - box.xyxy[0][1])  # height
            })
            
            # Stop after detecting the first face
            if len(faces) >= 1:
                break
        if len(faces) >= 1:
            break

    # If no face is detected or more than one face is detected, handle accordingly
    if len(faces) != 1:
        return None  # Indicate failure if no face or multiple faces are detected

    return faces[0]  # Return only the first face

if __name__ == "__main__":
    image_path = sys.argv[1]
    face = detect_faces(image_path)
    if face:
        print(json.dumps(face))  # Output JSON with detected face
    else:
        print(json.dumps({'error': 'No face detected or multiple faces detected'}))
