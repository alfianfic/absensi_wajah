import cv2
import os

# Inisialisasi Cascade Classifier untuk wajah
face_cascade = cv2.CascadeClassifier(cv2.data.haarcascades + 'haarcascade_frontalface_default.xml')

# Buka webcam (jika menggunakan video dari file, gantilah dengan cv2.VideoCapture('nama_file_video.mp4'))
cap = cv2.VideoCapture(0)

# Memastikan direktori DataSet ada
if not os.path.exists('DataSet'):
    os.makedirs('DataSet')

# Input ID pengguna dengan validasi
while True:
    try:
        user_id = int(input('User ID: '))
        break
    except ValueError:
        print("ID harus berupa angka. Silakan coba lagi.")

# Inisialisasi variabel penghitung
a = 0

while True:
    # Baca setiap frame dari webcam
    ret, frame = cap.read()

    # Membalik gambar horizontal
    frame = cv2.flip(frame, 1)

    # Konversi frame ke grayscale
    gray = cv2.cvtColor(frame, cv2.COLOR_BGR2GRAY)

    # Deteksi wajah
    faces = face_cascade.detectMultiScale(gray, scaleFactor=1.3, minNeighbors=5, minSize=(30, 30))

    # Gambar kotak di sekitar wajah yang terdeteksi dan simpan wajah yang terdeteksi
    for (x, y, w, h) in faces:
        a += 1
        cv2.imwrite(f"DataSet/User.{str(user_id)}.{str(a)}.jpg", gray[y:y+h, x:x+w])
        cv2.rectangle(frame, (x, y), (x+w, y+h), (255, 0, 0), 2)

        # Beri jeda untuk memastikan tidak terlalu banyak gambar yang disimpan dalam waktu singkat
        cv2.waitKey(100)

    # Tampilkan frame hasil
    cv2.imshow('Face Detection', frame)

    # Hentikan program dengan menekan tombol 'q' atau setelah 30 wajah ditangkap
    if cv2.waitKey(1) & 0xFF == ord('q'):
        break
    if a >= 50:
        break

# Tutup webcam dan jendela OpenCV
cap.release()
cv2.destroyAllWindows()
