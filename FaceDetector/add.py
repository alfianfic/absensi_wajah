import cv2

# Inisialisasi Cascade Classifier untuk wajah
face_cascade = cv2.CascadeClassifier(cv2.data.haarcascades + 'haarcascade_frontalface_default.xml')

# Buka webcam (jika menggunakan video dari file, gantilah dengan cv2.VideoCapture('nama_file_video.mp4'))
cap = cv2.VideoCapture(0)

id = input('User ID : ')
a = 0
while True:
    a = a + 1
    # Baca setiap frame dari webcam
    ret, frame = cap.read()

    # Membalik gambar horizontal
    frame = cv2.flip(frame, 1)

    # Konversi frame ke grayscale
    gray = cv2.cvtColor(frame, cv2.COLOR_BGR2GRAY)

    # Deteksi wajah
    faces = face_cascade.detectMultiScale(gray, scaleFactor=1.3, minNeighbors=5, minSize=(30, 30))

    # Gambar kotak di sekitar wajah yang terdeteksi
    for (x, y, w, h) in faces:
        cv2.imwrite(f"DataSet/User.{str(id)}.{str(a)}.jpg", gray[y:y+h,x:x+w])
        cv2.rectangle(frame, (x, y), (x+w, y+h), (255, 0, 0), 2)

    # Tampilkan frame hasil
    cv2.imshow('Face Detection', frame)

    # Hentikan program dengan menekan tombol 'q'
    if a>100:
        break

# Tutup webcam dan jendela OpenCV
cap.release()
cv2.destroyAllWindows()
