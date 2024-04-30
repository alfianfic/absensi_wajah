import cv2, time
import os
from PIL import Image

camera = 0
video = cv2.VideoCapture(camera)
faceDetector = cv2.CascadeClassifier('./haarcascade_frontalface_default.xml')
recogFace = cv2.face.LBPHFaceRecognizer_create()
recogFace.read("./DataSet/training.xml")

a = 0
while True:
    a = a+1

    check,frame = video.read() # membaca video kamera


    frame = cv2.flip(frame, 1)  

    color = cv2.cvtColor(frame, cv2.COLOR_BGR2GRAY)

    faces = faceDetector.detectMultiScale(color, 1.3,5)

    for (x, y, w, h) in faces: #x,y bagian titik awal atas w,h untuk width dan height
        cv2.rectangle(frame,(x,y),(x+w,y+h),(255,0,0),2)    # membuat batas kotak

        id,conf = recogFace.predict(color[x:x+w,y:y+h])

        # kondisi jika id ada bisa masuk ke dalam database 
        if id == 26 :
            id = "Ahmad"

        cv2.putText(frame,str(id),(x+00,y+0),cv2.FONT_HERSHEY_SIMPLEX,1,(0,255,0)) # membuat tulisan

    cv2.imshow("Absensi Wajah",frame) # Untuk menampilkan video camera

    key = cv2.waitKey(1)
    if key == ord('q'):
        break

video.release()
cv2.destroyAllWindows()
