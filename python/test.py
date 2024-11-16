from tensorflow.keras.models import load_model
from sklearn.metrics import confusion_matrix
import seaborn as sns
import matplotlib.pyplot as plt
import numpy as np
import os
import cv2
from tensorflow.keras.preprocessing import image
from tensorflow.keras.applications.resnet50 import preprocess_input

# Load the trained model
model = load_model('face_recognition_model.h5')  # Replace with the actual path to your model file

# Define the path to your test data
base_dir = "C:/xampp/htdocs/barangayproject/dataset1"  # Adjust the path to your dataset
label_dict = {}  # Load the label dictionary (you should have this from the training phase)

# Load and preprocess the test data (same as training)
def load_test_data(base_dir, label_dict):
    images = []
    labels = []

    label_counter = 0
    for folder_name in ['left', 'right', 'front']:
        folder_path = os.path.join(base_dir, folder_name)

        for person_folder in os.listdir(folder_path):
            person_folder_path = os.path.join(folder_path, person_folder)
            if os.path.isdir(person_folder_path):
                if person_folder not in label_dict:
                    label_dict[person_folder] = label_counter
                    label_counter += 1

                label = label_dict[person_folder]

                # Loop through images in each person folder
                for img_name in os.listdir(person_folder_path):
                    img_path = os.path.join(person_folder_path, img_name)

                    # Read and preprocess image
                    img = cv2.imread(img_path)
                    img = cv2.cvtColor(img, cv2.COLOR_BGR2RGB)  # Convert BGR to RGB
                    img = cv2.resize(img, (224, 224))  # Resize to (224, 224)
                    img = preprocess_input(np.array(img, dtype=np.float32))  # Preprocess image

                    images.append(img)
                    labels.append(label)

    return np.array(images), np.array(labels)

# Load test data
X_test, y_test = load_test_data(base_dir, label_dict)

# One-hot encode the labels for the test set (same as training)
y_test = np.array([label_dict.get(label, -1) for label in y_test])  # Ensure labels are encoded as integers

# Get predictions for the test data
y_pred = model.predict(X_test)
y_pred_classes = np.argmax(y_pred, axis=1)  # Get class labels with the highest probability
y_true = np.array(y_test)

# Generate confusion matrix
cm = confusion_matrix(y_true, y_pred_classes)

# Plot confusion matrix using seaborn heatmap
plt.figure(figsize=(8, 6))
sns.heatmap(cm, annot=True, fmt='d', cmap='Blues', xticklabels=label_dict.keys(), yticklabels=label_dict.keys())
plt.xlabel('Predicted Label')
plt.ylabel('True Label')
plt.title('Confusion Matrix')
plt.show()
