<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJx3X02D6I0e7a2l+xo7x59DkV4vA4unP6hzyhtV/h6K6kZTlcH42Pxw3M8Y" crossorigin="anonymous">
    <style>
        /* Phong cách vẽ tay (doodle) */
        body {
            background-color: #f7f7f7;
            background-image: url('data:image/svg+xml;utf8,<svg width="100" height="50" viewBox="0 0 100 50" xmlns="http://www.w3.org/2000/svg"><path d="M0 30 C20 10, 40 40, 60 20 S80 40, 100 30" stroke="%23333" stroke-width="2" fill="none" /><path d="M0 40 C15 20, 35 50, 55 30 S75 50, 100 40" stroke="%23333" stroke-width="2" fill="none" /></svg>');
            background-repeat: repeat;
            background-size: 100px 50px;
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

        .list-container {
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

        .list-container::before {
            content: '';
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

        ul {
            list-style-type: none;
            padding-left: 0;
            color: #333;
            font-size: 1.1rem;
        }

        li {
            margin-bottom: 1.5rem;
            padding: 10px 10px 10px 10px;
            border: 1px dashed #333;
            border-radius: 6px;
            background-color: #f7f7f7;
            position: relative;
            z-index: 2;
            min-height: 80px;
        }

        li h2 {
            font-size: 1.5rem;
            font-weight: bold;
            color: #333;
            margin-right: 100px;
        }

        li p {
            font-size: 1.1rem;
            margin-bottom: 0.5rem;
            color: #555;
            margin-right: 100px;
        }

        a {
            color: #333;
            text-decoration: none;
            font-size: 1rem;
            margin-right: 10px;
            border: 2px solid #333;
            border-radius: 4px;
            padding: 5px 10px;
            transition: all 0.3s ease;
            position: relative;
            z-index: 2;
        }

        a:hover {
            background-color: #333;
            color: white;
            border-color: #333;
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

        .add-product-button {
            display: block;
            text-align: center;
            margin-top: 2rem;
            font-size: 1.2rem;
            color: #fff;
            text-decoration: none;
            background-color: #333;
            padding: 10px 15px;
            border: 2px solid #333;
            border-radius: 6px;
            font-weight: bold;
            transition: all 0.3s ease;
            position: relative;
            z-index: 3;
            cursor: pointer;
        }

        .add-product-button:hover {
            background-color: #555;
            color: white;
        }

        /* Phong cách nút "Thêm vào giỏ hàng" */
        .cart-button {
            --width: 90px;
            --height: 32px;
            --tooltip-height: 32px;
            --gap-between-tooltip-to-button: 18px;
            --button-color: #333;
            --tooltip-color: #fff;
            min-width: var(--width);
            height: var(--height);
            background: var(--button-color);
            position: absolute;
            bottom: 10px;
            right: 10px;
            text-align: center;
            border-radius: 4px;
            border: 2px solid #333;
            font-family: 'Comic Sans MS', sans-serif;
            transition: background 0.3s, transform 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 3;
            padding: 5px 10px;
        }

        .cart-button::before {
            position: absolute;
            content: attr(data-tooltip);
            width: auto;
            min-width: 80px;
            height: var(--tooltip-height);
            background-color: #333;
            font-size: 0.8rem;
            color: #fff;
            border-radius: 4px;
            line-height: var(--tooltip-height);
            bottom: calc(var(--height) + var(--gap-between-tooltip-to-button) + 10px);
            left: 50%;
            transform: translateX(-50%);
            padding: 0 8px;
        }

        .cart-button::after {
            position: absolute;
            content: "";
            width: 0;
            height: 0;
            border: 6px solid transparent;
            border-top-color: #333;
            left: 50%;
            transform: translateX(-50%);
            bottom: calc(100% + var(--gap-between-tooltip-to-button) - 10px);
        }

        .cart-button::after,
        .cart-button::before {
            opacity: 0;
            visibility: hidden;
            transition: all 0.5s;
        }

        .button-wrapper,
        .text,
        .icon {
            overflow: hidden;
            position: absolute;
            width: 100%;
            height: 100%;
            left: 0;
            color: #fff;
        }

        .text {
            display: flex;
            align-items: center;
            justify-content: center;
            top: 0;
            font-size: 1rem;
        }

        .text,
        .icon {
            transition: top 0.5s;
        }

        .icon {
            color: #fff;
            top: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .icon svg {
            width: 16px;
            height: 16px;
        }

        .cart-button:hover {
            background: #555;
            transform: scale(1.05);
        }

        .cart-button:hover .text {
            top: -100%;
        }

        .cart-button:hover .icon {
            top: 0;
        }

        .cart-button:hover::before,
        .cart-button:hover::after {
            opacity: 1;
            visibility: visible;
        }

        .cart-button:hover::after {
            bottom: calc(var(--height) + var(--gap-between-tooltip-to-button) - 20px);
        }

        .cart-button:hover::before {
            bottom: calc(var(--height) + var(--gap-between-tooltip-to-button));
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="list-container">
            <h1>Danh sách sản phẩm</h1>

            <a href="/Bai1/Product/add" class="add-product-button">Thêm sản phẩm mới</a>

            <ul>
                <?php foreach ($products as $product): ?>
                    <li>
                        <h2><?php echo htmlspecialchars($product->getName(), ENT_QUOTES, 'UTF-8'); ?></h2>
                        <p>Mô tả: <?php echo htmlspecialchars($product->getDescription(), ENT_QUOTES, 'UTF-8'); ?></p>
                        <p>Giá: <?php echo htmlspecialchars($product->getPrice(), ENT_QUOTES, 'UTF-8'); ?></p>
                        <a href="/Bai1/Product/edit/<?php echo $product->getId(); ?>">Sửa</a>
                        <a href="/Bai1/Product/delete/<?php echo $product->getId(); ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?');">Xóa</a>
                        <div class="cart-button" data-tooltip="Giá: <?php echo htmlspecialchars($product->getPrice(), ENT_QUOTES, 'UTF-8'); ?> $" onclick="addToCart(<?php echo $product->getId(); ?>)">
                            <div class="button-wrapper">
                                <div class="text">Thêm vào giỏ</div>
                                <span class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart2" viewBox="0 0 16 16">
                                        <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"></path>
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <!-- <img src="https://via.placeholder.com/100x100.png?text=Doodle" alt="Doodle" class="doodle-img"> -->
        <!-- <img src="https://via.placeholder.com/100x100.png?text=Doodle" alt="Doodle" class="doodle-img-2"> -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gyb6d5U07P7JvScc7v4hkw3H7O9nUksdX5txd6lghY9f8P64xX5" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0bQWvByWB6rfp9zLxS+JtrfCJJlvH9zxusXTEmtWyY8VV1QU" crossorigin="anonymous"></script>

    <script>
        function addToCart(productId) {

            alert('Đã thêm sản phẩm có ID ' + productId + ' vào giỏ hàng!');
            // TODO: Thêm logic thực tế để gửi yêu cầu tới server hoặc cập nhật giỏ hàng
        }
    </script>
</body>

</html>