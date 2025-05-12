<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJx3X02D6I0e7a2l+xo7x59DkV4vA4unP6hzyhtV/h6K6kZTlcH42Pxw3M8Y" crossorigin="anonymous">
    <style>
        /* Phong cách vẽ tay (doodle) */
        body {
            background-color: #f7f7f7;
            /* Nền nhạt để sóng nổi bật */
            background-image: url('data:image/svg+xml;utf8,<svg width="100" height="50" viewBox="0 0 100 50" xmlns="http://www.w3.org/2000/svg"><path d="M0 30 C20 10, 40 40, 60 20 S80 40, 100 30" stroke="%23333" stroke-width="2" fill="none" /><path d="M0 40 C15 20, 35 50, 55 30 S75 50, 100 40" stroke="%23333" stroke-width="2" fill="none" /></svg>');
            background-repeat: repeat;
            /* Lặp lại sóng */
            background-size: 100px 50px;
            /* Kích thước sóng */
            color: #333;
            font-family: 'Comic Sans MS', sans-serif;
            padding: 2rem;
            position: relative;
        }

        h1 {
            font-size: 2rem;
            margin-bottom: 1.5rem;
            font-weight: bold;
            color: #333;
            text-align: center;
            position: relative;
            z-index: 2;
        }

        .form-container {
            max-width: 800px;
            margin: auto;
            padding: 2rem;
            border: 2px solid #333;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: visible;
        }

        /* Viền doodle bao quanh toàn bộ form */
        .doodle-border {
            position: absolute;
            top: -10px;
            left: -10px;
            right: -10px;
            bottom: -10px;
            border: 2px dashed #333;
            border-radius: 12px;
            z-index: 1;
            animation: doodle 5s infinite linear;
        }

        /* Hoạt hình vẽ doodle */
        @keyframes doodle {
            0% {
                transform: rotate(0deg);
            }

            50% {
                transform: rotate(15deg);
            }

            100% {
                transform: rotate(0deg);
            }
        }

        label {
            font-size: 1.2rem;
            color: #333;
            font-weight: bold;
        }

        input,
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 0.5rem;
            margin-bottom: 1.5rem;
            border: 2px solid #ddd;
            border-radius: 6px;
            font-size: 1rem;
            font-family: 'Comic Sans MS', sans-serif;
            position: relative;
            z-index: 2;
            background-color: #f7f7f7;
            transition: all 0.3s ease;
        }

        input:focus,
        textarea:focus {
            border-color: #5a5a5a;
            box-shadow: 0 0 10px rgba(90, 90, 90, 0.5);
        }

        .add-product-button {
            display: block;
            text-align: center;
            font-size: 1.2rem;
            color: #fff;
            background-color: #333;
            padding: 12px;
            border: 2px solid #333;
            border-radius: 6px;
            font-weight: bold;
            transition: all 0.3s ease;
            position: relative;
            z-index: 3;
            cursor: pointer;
            width: 100%;
        }

        .add-product-button:hover {
            background-color: #555;
            color: white;
            transform: scale(1.05);
        }

        a {
            display: inline-block;
            margin-top: 1rem;
            color: #333;
            text-decoration: none;
            font-size: 1.1rem;
            background-color: #fff;
            padding: 10px 15px;
            border: 2px solid #333;
            border-radius: 6px;
            font-weight: bold;
            position: relative;
            z-index: 2;
        }

        a:hover {
            background-color: #333;
            color: white;
        }


        .doodle-img {
            position: absolute;
            top: 20%;
            left: 50%;
            transform: translateX(-50%);
            max-width: 100px;
            z-index: -1;
        }

        .doodle-img-2 {
            position: absolute;
            top: 60%;
            right: 10%;
            transform: rotate(180deg);
            max-width: 80px;
            z-index: -1;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="form-container">
            <h1>Sửa sản phẩm</h1>

            <form method="POST" action="/Bai1/Product/edit/<?php echo $product->getId(); ?>">
                <div class="mb-3">
                    <label for="name">Tên sản phẩm:</label>
                    <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($product->getName(), ENT_QUOTES, 'UTF-8'); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="description">Mô tả:</label>
                    <textarea id="description" name="description" required><?php echo htmlspecialchars($product->getDescription(), ENT_QUOTES, 'UTF-8'); ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="price">Giá:</label>
                    <input type="number" id="price" name="price" value="<?php echo htmlspecialchars($product->getPrice(), ENT_QUOTES, 'UTF-8'); ?>" required>
                </div>

                <button type="submit" class="add-product-button">Lưu thay đổi</button>
            </form>

            <div class="doodle-border"></div> <!-- Viền doodle bao quanh toàn bộ form -->

            <a href="/Bai1/Product/list">Quay lại danh sách sản phẩm</a>
        </div>

        <!-- <img src="https://via.placeholder.com/100x100.png?text=Doodle" alt="Doodle" class="doodle-img"> -->
        <!-- <img src="https://via.placeholder.com/100x100.png?text=Doodle" alt="Doodle" class="doodle-img-2"> -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gyb6d5U07P7JvScc7v4hkw3H7O9nUksdX5txd6lghY9f8P64xX5" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0bQWvByWB6rfp9zLxS+JtrfCJJlvH9zxusXTEmtWyY8VV1QU" crossorigin="anonymous"></script>
</body>

</html>