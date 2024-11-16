import pytesseract
from PIL import Image, ImageEnhance
import cv2
import numpy as np

# Specify the full path to the tesseract executable
pytesseract.pytesseract.tesseract_cmd = r'C:/Program Files/Tesseract-OCR/tesseract.exe'

# Open the image
image = Image.open('C:/xampp/htdocs/barangayproject/public/pic/phil.jpg')

# Convert the image to grayscale
gray_image = cv2.cvtColor(np.array(image), cv2.COLOR_BGR2GRAY)

# Apply Otsu's Thresholding (alternative to adaptive thresholding)
_, otsu_thresh = cv2.threshold(gray_image, 0, 255, cv2.THRESH_BINARY + cv2.THRESH_OTSU)

# Further enhance the image by applying Gaussian Blur to reduce noise
blurred_image = cv2.GaussianBlur(otsu_thresh, (5, 5), 0)

# Apply morphological operations (dilation) to enhance text clarity
kernel = np.ones((3, 3), np.uint8)
dilated_image = cv2.dilate(blurred_image, kernel, iterations=1)

# Convert back to PIL for further processing
enhanced_image = Image.fromarray(dilated_image)

# Increase contrast to make text stand out more
enhancer = ImageEnhance.Contrast(enhanced_image)
enhanced_image = enhancer.enhance(3)  # Increase contrast to enhance the text

# Optional: Resize the image to increase resolution (if needed)
enhanced_image = enhanced_image.resize(
    (enhanced_image.width * 2, enhanced_image.height * 2),
    resample=Image.Resampling.LANCZOS
)

# Optional: Show the preprocessed image for debugging
enhanced_image.show()

# Use pytesseract to extract text with optimized OCR configurations
custom_oem_psm_config = r'--oem 3 --psm 6'  # Use PSM=6 (single block of text)
extracted_text = pytesseract.image_to_string(enhanced_image, config=custom_oem_psm_config)

# Print extracted text for verification
#print("Extracted text:", extracted_text)

# Check for the number
if 'P3381669B2PHL0304258M2409072' in extracted_text:
    print("Number P3381669B2PHL0304258M2409072 found in the image.")
else:
    print("Number P3381669B2PHL0304258M2409072 not found in the image.")
    print("Full extracted text:", extracted_text)
