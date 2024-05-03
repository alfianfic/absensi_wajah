import cv2, time, os
import numpy as np
from PIL import Image

def add_data():
    face_cascade = cv2.CascadeClassifier(cv2.data.haarcascades + 'haarcascade_frontalface_default.xml')

    cap = cv2.VideoCapture(0)

    id = input('User ID : ')
    a = 0

    while True:
        a = a + 1
        ret, frame = cap.read()

        frame = cv2.flip(frame, 1)

        gray = cv2.cvtColor(frame, cv2.COLOR_BGR2GRAY)

        faces = face_cascade.detectMultiScale(gray, scaleFactor=1.3, minNeighbors=5, minSize=(30, 30))

        for (x, y, w, h) in faces:
            cv2.imwrite(f"DataSet/User.{str(id)}.{str(a)}.jpg", gray[y:y+h,x:x+w])
            cv2.rectangle(frame, (x, y), (x+w, y+h), (255, 0, 0), 2)

        cv2.imshow('Face Detection', frame)

        if a>10:
            cap.release()
            cv2.destroyAllWindows()
            menu()
            break

def training():
    recognizer = cv2.face.LBPHFaceRecognizer_create()
    detector = cv2.CascadeClassifier("./haarcascade_frontalface_default.xml");

    def getImagesWithLabels(path):
        imagePaths=[os.path.join(path,f) for f in os.listdir(path)]
        print(imagePaths)
        faceSamples=[]
        Ids=[]
        for imagePath in imagePaths:
            pilImage=Image.open(imagePath).convert('L')
            imageNp=np.array(pilImage,'uint8')
            Id=int(os.path.split(imagePath)[-1].split(".")[1])
            faces=detector.detectMultiScale(imageNp)
            for (x,y,w,h) in faces:
                faceSamples.append(imageNp[y:y+h,x:x+w])
                Ids.append(Id)
        return faceSamples, Ids

    faces, Ids = getImagesWithLabels('DataSet')
    recognizer.train(faces, np.array(Ids))
    recognizer.save('DataSet/training.xml')

    print("Data telah di proses dan siap untuk deteksi wajah")
    menu()


def recog_face():
    camera = 0
    video = cv2.VideoCapture(camera)
    faceDetector = cv2.CascadeClassifier('./haarcascade_frontalface_default.xml')
    recogFace = cv2.face.LBPHFaceRecognizer_create()
    recogFace.read("./DataSet/training.xml")

    a = 0
    while True:
        a = a+1

        check,frame = video.read()


        frame = cv2.flip(frame, 1)

        color = cv2.cvtColor(frame, cv2.COLOR_BGR2GRAY)

        faces = faceDetector.detectMultiScale(color, 1.3,5)

        for (x, y, w, h) in faces:
            cv2.rectangle(frame,(x,y),(x+w,y+h),(255,0,0),2)

            id,conf = recogFace.predict(color[x:x+w,y:y+h])

            if id == 26 :
                id = "Ahmad"
            else :
                id = "Tidak ada"


            cv2.putText(frame,str(id),(x+00,y+0),cv2.FONT_HERSHEY_SIMPLEX,1,(0,255,0))

        cv2.imshow("Absensi Wajah",frame) #

        key = cv2.waitKey(1)
        if key == ord('q'):
            break

    video.release()
    cv2.destroyAllWindows()


def menu():
    print("""
Menu
    1. Tambah data wajah
    2. Latih membaca wajah
    3. Deteksi wajah
 """)
    while True:
        a = int(input("Pilih menu > "))

        if a == 1:
            add_data()
            break
        elif a == 2 :
            training()
            break
        elif a == 3 :
            recog_face()
            break
        pass


if __name__ == "__main__":
    menu()


