from flask import Flask, Response, request, jsonify
from flask_cors import CORS
import cv2
import os
from PIL import Image
import mysql.connector
import datetime
from dotenv import load_dotenv

app = Flask(__name__)
CORS(app)

# Load environment variables
load_dotenv()

class Sql:
    def __init__(self):
        try:
            self.db_connect = mysql.connector.connect(
                host=os.getenv("DB_HOST"),
                user=os.getenv("DB_USERNAME"),
                password=os.getenv("DB_PASSWORD"),
                database=os.getenv("DB_DATABASE")
            )
        except Exception as e:
            print(e)
            exit()

    def sql_connect(self):
        return self.db_connect

    def insert_data(self, user_id):
        try:
            now = datetime.datetime.now()
            dt = now.strftime("%H:%M:%S")
            mycursor = self.db_connect.cursor()
            sql = "INSERT INTO absensi(id_user, jam_kedatangan) VALUES(%s, %s)"
            val = (user_id, dt)
            mycursor.execute(sql, val)
            self.db_connect.commit()
            print(mycursor.rowcount, "Data berhasil ditambahkan...")
        except Exception as e:
            print(f"Gagal tambah data: {e}")

# Initialize database connection
con = Sql()
conn = con.sql_connect()

# Initialize camera and face detector
camera = cv2.VideoCapture(0, cv2.CAP_V4L)
face_detector = cv2.CascadeClassifier(cv2.data.haarcascades + 'haarcascade_frontalface_default.xml')
recog_face = cv2.face.LBPHFaceRecognizer_create()
recog_face.read("./DataSet/training.xml")

def generate_frames():
    while True:
        success, frame = camera.read()
        if not success:
            print("Failed to capture image")
            break
        else:
            gray = cv2.cvtColor(frame, cv2.COLOR_BGR2GRAY)
            faces = face_detector.detectMultiScale(gray, scaleFactor=1.3, minNeighbors=6)

            for (x, y, w, h) in faces:
                cv2.rectangle(frame, (x, y), (x + w, y + h), (255, 0, 0), 2)
                id, conf = recog_face.predict(gray[y:y + h, x:x + w])
                print(f"ID: {id}, Confidence: {conf}")

                if conf < 100:
                    user_id = id
                    con.insert_data(user_id)  # Insert data to database when face is recognized
                    name = f"User {id}"
                else:
                    name = "Unknown"
                cv2.putText(frame, name, (x + 5, y - 5), cv2.FONT_HERSHEY_SIMPLEX, 1, (0, 255, 0), 2)

            ret, buffer = cv2.imencode('.jpg', frame)
            frame = buffer.tobytes()
            yield (b'--frame\r\n'
                   b'Content-Type: image/jpeg\r\n\r\n' + frame + b'\r\n')

@app.route('/video_feed')
def video_feed():
    return Response(generate_frames(), mimetype='multipart/x-mixed-replace; boundary=frame')

@app.route('/check_in', methods=['POST'])
def check_in():
    # This endpoint will only be used to trigger the modal
    return jsonify({"message": "Check In initiated"})

@app.route('/check_out', methods=['POST'])
def check_out():
    # This endpoint will only be used to trigger the modal
    return jsonify({"message": "Check Out initiated"})

if __name__ == '__main__':
    app.run(debug=True)
