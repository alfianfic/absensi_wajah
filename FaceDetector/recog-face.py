import time
import datetime
import mysql.connector
import cv2, time
import os
from PIL import Image
from dotenv import load_dotenv,dotenv_values


now = datetime.datetime.now()
dt = now.strftime("%H:%M:%S")
load_dotenv()

class Sql :
    def __init__(self) -> None:
        try :
            self.db_connect = mysql.connector.connect(
                host = str(os.getenv("DB_HOST")),
                user = str(os.getenv("DB_USERNAME")),
                password = str(os.getenv("DB_PASSWORD")),
                database = str(os.getenv("DB_DATABASE"))
            )
        except Exception as e :
            print(e)
            exit()
        pass

    def sql_connect(self):
        return self.db_connect

    def update_data(self,):
        mycursor = self.db_connect.cursor()
        sql = "UPDATE absensi SET jam_kedatangan = %s WHERE nama = 2"
        val = (dt,)
        mycursor.execute(sql, val)
        self.db_connect.commit()
        print(mycursor.rowcount, "Data berhasil diupdate...")

con = Sql()
conn = con.sql_connect()
# print(con)
# lapotp
camera = 0
# external
# camera = "http://192.168.43.217:4747/video"
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

    faces = faceDetector.detectMultiScale(color, scaleFactor=1.3,minNeighbors=6 )

    for (x, y, w, h) in faces: #x,y bagian titik awal atas w,h untuk width dan height
        cv2.rectangle(frame,(x,y),(x+w,y+h),(255,0,0),2)    # membuat batas kotak

        id,conf = recogFace.predict(color[y:y+h,x:x+w])
        print(id)
        print(conf)

        if conf < 70:
            id = f"User {id}"
        else:
            id = "Unknown"

        # if id == 26 :
        #     con.update_data()
            # time.sleep(3)
            # break
            # exit()


        cv2.putText(frame,str(id),(x+00,y+0),cv2.FONT_HERSHEY_SIMPLEX,1,(0,255,0)) # membuat tulisan

    cv2.imshow("Absensi Wajah",frame) # Untuk menampilkan video camera

    key = cv2.waitKey(1)
    if key == ord('q'):
        break

video.release()
cv2.destroyAllWindows()
