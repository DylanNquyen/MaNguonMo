<?php
$name = '';
$color = '';
$greeting = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $color = htmlspecialchars($_POST['color']);
    $greeting = "<div class='greeting-box' style='color: $color;'>👋 Xin chào $name đẹp trai nhất vũ trụ!</div>";
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>PHP 3D Universe</title>
    <style>
        html,
        body {
            margin: 0;
            padding: 0;
            overflow: hidden;
            height: 100%;
            font-family: 'Segoe UI', sans-serif;
            color: white;
        }

        canvas#bgCanvas {
            position: fixed;
            z-index: -1;
            width: 100%;
            height: 100%;
        }

        body {
            background: #0f0f1a;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: start;
            padding-top: 50px;
            perspective: 1000px;
        }

        h1 {
            margin-bottom: 20px;
        }

        form {
            background: rgba(255, 255, 255, 0.05);
            padding: 30px;
            border-radius: 12px;
            display: inline-block;
            box-shadow: 0 0 30px rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(5px);
            animation: fadeIn 1s ease-out;
        }

        input,
        select {
            padding: 10px;
            margin: 10px;
            border-radius: 8px;
            border: none;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: gold;
            color: black;
            cursor: pointer;
            font-weight: bold;
            transition: transform 0.2s ease;
        }

        input[type="submit"]:hover {
            transform: scale(1.1);
        }

        .greeting-box {
            font-size: 24px;
            font-weight: bold;
            margin-top: 30px;
            animation: rotateIn 1s ease-out forwards;
            transform-style: preserve-3d;
            transform-origin: center;
        }

        @keyframes rotateIn {
            from {
                opacity: 0;
                transform: rotateX(-90deg) rotateY(90deg) scale(0.8);
            }

            to {
                opacity: 1;
                transform: rotateX(0deg) rotateY(0deg) scale(1);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.95);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .cube {
            width: 100px;
            height: 100px;
            position: relative;
            transform-style: preserve-3d;
            transform: rotateX(30deg) rotateY(30deg);
            animation: rotateCube 6s infinite linear;
            margin-top: 50px;
        }

        .cube div {
            position: absolute;
            width: 100px;
            height: 100px;
            background: rgba(255, 255, 255, 0.1);
            border: 2px solid #fff;
        }

        .front {
            transform: translateZ(50px);
        }

        .back {
            transform: rotateY(180deg) translateZ(50px);
        }

        .right {
            transform: rotateY(90deg) translateZ(50px);
        }

        .left {
            transform: rotateY(-90deg) translateZ(50px);
        }

        .top {
            transform: rotateX(90deg) translateZ(50px);
        }

        .bottom {
            transform: rotateX(-90deg) translateZ(50px);
        }

        @keyframes rotateCube {
            0% {
                transform: rotateX(0) rotateY(0);
            }

            100% {
                transform: rotateX(360deg) rotateY(360deg);
            }
        }

        .footer {
            margin-top: 40px;
            font-size: 14px;
            color: #999;
        }
    </style>
</head>

<body>
    <canvas id="bgCanvas"></canvas>

    <h1>🚀 Vũ trụ PHP 3D</h1>

    <form method="POST">
        <input type="text" name="name" placeholder="Nhập tên của bạn" required>
        <select name="color" required>
            <option value="">Chọn màu yêu thích</option>
            <option value="red">Đỏ</option>
            <option value="green">Xanh lá</option>
            <option value="blue">Xanh dương</option>
            <option value="gold">Vàng gold</option>
            <option value="#FF69B4">Hồng cute</option>
        </select>
        <br>
        <input type="submit" value="Gửi lời chào!">
    </form>

    <?php echo $greeting; ?>

    <div class="cube">
        <div class="front"></div>
        <div class="back"></div>
        <div class="right"></div>
        <div class="left"></div>
        <div class="top"></div>
        <div class="bottom"></div>
    </div>

    <div class="footer">
        &copy; <?php echo date('Y'); ?> | Made by bạn đẹp trai nhất hệ mặt trời 🌍
    </div>

    <script>
        const canvas = document.getElementById('bgCanvas');
        const ctx = canvas.getContext('2d');
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;

        let stars = [];

        for (let i = 0; i < 150; i++) {
            stars.push({
                x: Math.random() * canvas.width,
                y: Math.random() * canvas.height,
                radius: Math.random() * 1.5,
                dx: (Math.random() - 0.5) * 0.5,
                dy: (Math.random() - 0.5) * 0.5
            });
        }

        function drawStars() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            ctx.fillStyle = 'white';
            stars.forEach(star => {
                ctx.beginPath();
                ctx.arc(star.x, star.y, star.radius, 0, Math.PI * 2);
                ctx.fill();
                star.x += star.dx;
                star.y += star.dy;

                if (star.x < 0 || star.x > canvas.width) star.dx *= -1;
                if (star.y < 0 || star.y > canvas.height) star.dy *= -1;
            });
            requestAnimationFrame(drawStars);
        }

        drawStars();

        window.addEventListener('resize', () => {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
        });
    </script>
</body>

</html>