<?php include 'app/views/shares/header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background: #0a0a0a url('data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"%3E%3Crect x="0" y="0" width="100" height="100" fill="none"/%3E%3Ccircle cx="20" cy="20" r="1" fill="rgba(255,255,255,0.3)"/%3Ccircle cx="80" cy="30" r="1.5" fill="rgba(255,255,255,0.4)"/%3Ccircle cx="50" cy="70" r="1" fill="rgba(255,255,255,0.2)"/%3C/svg%3E') repeat;
            color: #ffffff;
            font-family: 'Orbitron', sans-serif;
            position: relative;
            overflow-x: hidden;
        }
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: repeating-linear-gradient(
                45deg,
                transparent,
                transparent 20px,
                rgba(192, 192, 192, 0.1) 20px,
                rgba(192, 192, 192, 0.1) 22px
            );
            z-index: -1;
            opacity: 0.5;
        }
        .navbar {
            background: rgba(10, 10, 10, 0.9);
            backdrop-filter: blur(8px);
            border-bottom: 1px solid #c0c0c0;
            box-shadow: 0 0 15px rgba(192, 192, 192, 0.2);
        }
        .navbar-brand {
            color: #ffffff;
            font-weight: 700;
            text-shadow: 0 0 10px rgba(192, 192, 192, 0.5);
            transition: text-shadow 0.3s ease;
        }
        .navbar-brand:hover {
            text-shadow: 0 0 15px rgba(192, 192, 192, 0.8);
        }
        .nav-link {
            color: #c0c0c0;
            transition: all 0.3s ease;
            position: relative;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: #ffffff;
            transition: width 0.3s ease;
        }
        .nav-link:hover::after {
            width: 100%;
        }
        .nav-link:hover {
            color: #ffffff;
            transform: translateY(-2px);
        }
        .navbar-toggler {
            border: none;
        }
        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(192, 192, 192, 0.8)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
        }
        .container {
            animation: fadeIn 1s ease-in-out;
        }
        @keyframes fadeIn {
            0% { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        .glow {
            box-shadow: 0 0 15px rgba(192, 192, 192, 0.3);
            border: 1px solid rgba(192, 192, 192, 0.2);
        }
        .hover-scale {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .hover-scale:hover {
            transform: scale(1.03);
            box-shadow: 0 0 20px rgba(192, 192, 192, 0.4);
        }
        .content-box {
            background: rgba(20, 20, 20, 0.95);
            border-radius: 8px;
            padding: 2rem;
            border: 2px solid #c0c0c0;
            animation: glowPulse 4s infinite;
        }
        @keyframes glowPulse {
            0% { border-color: #c0c0c0; box-shadow: 0 0 15px rgba(192, 192, 192, 0.3); }
            50% { border-color: #ffffff; box-shadow: 0 0 25px rgba(255, 255, 255, 0.5); }
            100% { border-color: #c0c0c0; box-shadow: 0 0 15px rgba(192, 192, 192, 0.3); }
        }
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-top: 2rem;
        }
        .product-card {
            background: rgba(30, 30, 30, 0.9);
            border: 1px solid #c0c0c0;
            border-radius: 8px;
            padding: 1.5rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 0 10px rgba(192, 192, 192, 0.2);
        }
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 0 20px rgba(192, 192, 192, 0.5);
        }
        .product-card img {
            max-width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 4px;
            margin-bottom: 1rem;
        }
        .product-card h2 {
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
        }
        .product-card h2 a {
            color: #ffffff;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        .product-card h2 a:hover {
            color: #c0c0c0;
        }
        .product-card p {
            color: #c0c0c0;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }
        .btn {
            font-family: 'Orbitron', sans-serif;
            transition: all 0.3s ease;
            border: 1px solid transparent;
        }
        .btn-success {
            background: #c0c0c0;
            color: #0a0a0a;
            border-radius: 20px;
        }
        .btn-success:hover {
            background: #ffffff;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
        }
        .btn-primary {
            background: #c0c0c0;
            color: #0a0a0a;
            border-radius: 20px;
        }
        .btn-primary:hover {
            background: #ffffff;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
        }
        .btn-warning {
            background: #c0c0c0;
            color: #0a0a0a;
            border-radius: 20px;
        }
        .btn-warning:hover {
            background: #ffffff;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
        }
        .btn-danger {
            background: #c0c0c0;
            color: #0a0a0a;
            border-radius: 20px;
        }
        .btn-danger:hover {
            background: #ffffff;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container mx-auto px-4">
            <a class="navbar-brand text-2xl" href="#">Quản lý sản phẩm</kingen</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto space-x-6">
                    <li class="nav-item">
                        <a class="nav-link text-lg hover-scale" href="/webbanhang/Product/">Danh sách sản phẩm</a>
                    </li>
                    <?php if (SessionHelper::isAdmin()): ?>
                    <li class="nav-item">
                        <a class="nav-link text-lg hover-scale" href="/webbanhang/Product/add">Thêm sản phẩm</a>
                    </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <?php
                        if (SessionHelper::isLoggedIn()) {
                            echo "<a class='nav-link text-lg hover-scale'>" . htmlspecialchars($_SESSION['username']) . " (" . SessionHelper::getRole() . ")</a>";
                        } else {
                            echo "<a class='nav-link text-lg hover-scale' href='/webbanhang/account/login'>Đăng nhập</a>";
                        }
                        ?>
                    </li>
                    <li class="nav-item">
                        <?php
                        if (SessionHelper::isLoggedIn()) {
                            echo "<a class='nav-link text-lg hover-scale' href='/webbanhang/account/logout'>Đăng xuất</a>";
                        }
                        ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-24 mx-auto px-4">
        <div class="content-box glow">
            <h1 class="text-3xl font-bold text-center text-white mb-4">Danh sách sản phẩm</h1>
            <?php if (SessionHelper::isAdmin()): ?>
                <div class="text-center mb-4">
                    <a href="/webbanhang/Product/add" class="btn btn-success mb-2 px-4 py-2">Thêm sản phẩm mới</a>
                </div>
            <?php endif; ?>
            <div class="product-grid">
                <?php foreach ($products as $product): ?>
                    <div class="product-card">
                        <?php if ($product->image): ?>
                            <img src="/webbanhang/<?php echo $product->image; ?>" alt="Product Image">
                        <?php endif; ?>
                        <h2>
                            <a href="/webbanhang/Product/show/<?php echo $product->id; ?>">
                                <?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>
                            </a>
                        </h2>
                        <p><?php echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?></p>
                        <p>Giá: <?php echo htmlspecialchars($product->price, ENT_QUOTES, 'UTF-8'); ?> VND</p>
                        <p>Danh mục: <?php echo htmlspecialchars($product->category_name, ENT_QUOTES, 'UTF-8'); ?></p>
                        <div class="mt-4">
                            <div class="d-flex gap-2 flex-wrap">
                                <?php if (SessionHelper::isAdmin()): ?>
                                    <a href="/webbanhang/Product/edit/<?php echo $product->id; ?>"
                                       class="btn btn-warning btn-sm w-100 fw-bold text-dark rounded-pill transition-all hover-btn">
                                        <i class="fas fa-edit me-1"></i> Sửa
                                    </a>
                                    <a href="/webbanhang/Product/delete/<?php echo $product->id; ?>"
                                       class="btn btn-danger btn-sm w-100 fw-bold text-dark rounded-pill transition-all hover-btn delete-btn">
                                        <i class="fas fa-trash me-1"></i> Xóa
                                    </a>
                                <?php endif; ?>
                                <a href="/webbanhang/Product/addToCart/<?php echo $product->id; ?>"
                                   class="btn btn-primary btn-sm w-100 fw-bold text-dark rounded-pill transition-all hover-btn">
                                    <i class="fas fa-cart-plus me-1"></i> Thêm vào giỏ
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php include 'app/views/shares/footer.php'; ?>