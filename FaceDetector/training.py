import cv2
import os
import numpy as np
from PIL import Image

# Inisialisasi recognizer untuk LBPH dan detektor wajah
recognizer = cv2.face.LBPHFaceRecognizer_create()
detector = cv2.CascadeClassifier(cv2.data.haarcascades + 'haarcascade_frontalface_default.xml')

def getImagesWithLabels(path):
    imagePaths = [os.path.join(path, f) for f in os.listdir(path) if os.path.isfile(os.path.join(path, f))]
    faceSamples = []
    Ids = []

    for imagePath in imagePaths:
        try:
            # Membuka gambar dan mengkonversi ke grayscale
            pilImage = Image.open(imagePath).convert('L')
            imageNp = np.array(pilImage, 'uint8')
            Id = int(os.path.split(imagePath)[-1].split(".")[1])

            # Mendeteksi wajah di dalam gambar
            faces = detector.detectMultiScale(imageNp)
            for (x, y, w, h) in faces:
                faceSamples.append(imageNp[y:y+h, x:x+w])
                Ids.append(Id)
        except Exception as e:
            print(f"Error processing {imagePath}: {e}")

    return faceSamples, Ids

# Mendapatkan gambar dan label dari dataset
faces, Ids = getImagesWithLabels('DataSet')

# Melatih recognizer dengan wajah dan ID yang didapat
recognizer.train(faces, np.array(Ids))

# Menyimpan model yang telah dilatih
recognizer.save('DataSet/training.xml')
