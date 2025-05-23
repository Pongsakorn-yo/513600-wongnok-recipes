<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สแกนใบหน้า</title>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Kanit', sans-serif;
            margin: 0;
            padding: 0;
            background: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: radial-gradient(circle, rgba(255,255,255,1) 0%, rgba(0,185,255,1) 100%);
        }

        .camera-container {
            background: #222;
            width: 350px;
            height: 450px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            overflow: hidden;
            padding: 20px;
        }

        .camera-lens {
            background: radial-gradient(circle, rgba(255,255,255,0.7) 0%, rgba(0,0,0,0.5) 70%);
            width: 160px;
            height: 160px;
            border-radius: 50%;
            border: 5px solid #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.4);
            margin-top: 20px;
            position: relative;
        }

        .camera-lens::after {
            content: "";
            background: rgba(255,255,255,0.3);
            width: 30px;
            height: 30px;
            border-radius: 50%;
            position: absolute;
            top: 20px;
            left: 20px;
            box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.5);
        }

        h3 {
            color: #fff;
            margin-top: 20px;
            font-size: 26px;
            font-weight: 600;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.6);
        }

        p {
            color: #ddd;
            font-size: 14px;
            margin-bottom: 20px;
            text-align: center;
            font-weight: 400;
        }

        #video {
            width: 90%;
            height: auto;
            border-radius: 10px;
            margin-top: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        #scan-button {
            background-color: #00c6ff;
            color: white;
            font-size: 18px;
            padding: 15px 30px;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
            margin-top: 20px;
        }

        #scan-button:hover {
            background-color: #0099cc;
            transform: scale(1.05);
        }

        .message {
            font-size: 18px;
            margin-top: 20px;
            font-weight: 500;
        }

        .success {
            color: #28a745;
        }

        .error {
            color: #dc3545;
        }
    </style>
</head>
<body>

    <div class="camera-container">
        <div class="camera-lens"></div>
        <h3>สแกนใบหน้า</h3>
        <p>โปรดเปิดกล้องเพื่อเริ่มต้นการสแกนใบหน้า</p>
        <video id="video" autoplay muted></video>
        <button id="scan-button">เริ่มการสแกน</button>
        <div id="result" class="message"></div>
    </div>

    <!-- โหลด face-api จาก public/js/face-api.js-master -->
    <script src="{{ asset('js/face-api.js-master/dist/face-api.min.js') }}"></script>
    <script>
        async function loadModels() {
            const MODEL_URL = '{{ asset('models') }}'; // ชี้ไปที่โฟลเดอร์ models ใน public
            await faceapi.nets.ssdMobilenetv1.loadFromUri(MODEL_URL);
            await faceapi.nets.faceLandmark68Net.loadFromUri(MODEL_URL);
            await faceapi.nets.faceRecognitionNet.loadFromUri(MODEL_URL);
            console.log('โมเดลโหลดสำเร็จ');
        }

        async function startCamera() {
            const video = document.getElementById('video');
            try {
                const stream = await navigator.mediaDevices.getUserMedia({ video: {} });
                video.srcObject = stream;
            } catch (err) {
                console.error('ไม่สามารถเปิดกล้อง:', err);
            }
        }

        async function scanFace() {
            const video = document.getElementById('video');
            const result = document.getElementById('result');

            result.textContent = 'กำลังตรวจสอบใบหน้า...';
            result.classList.remove('success', 'error');
            result.classList.add('message');

            const detections = await faceapi.detectSingleFace(video).withFaceLandmarks().withFaceDescriptor();
            if (detections) {
                result.textContent = 'พบใบหน้า ✅';
                result.classList.add('success');
            } else {
                result.textContent = 'ไม่พบใบหน้า ❌';
                result.classList.add('error');
            }
        }

        document.addEventListener('DOMContentLoaded', async () => {
            await loadModels();
            await startCamera();

            document.getElementById('scan-button').addEventListener('click', scanFace);
        });
    </script>

</body>
</html>
