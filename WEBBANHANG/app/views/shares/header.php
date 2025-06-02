<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            background: #0a0a0a url('data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"%3E%3Crect x="0" y="0" width="100" height="100" fill="none"/%3E%3Ccircle cx="20" cy="20" r="1" fill="rgba(255,255,255,0.3)"/%3E%3Ccircle cx="80" cy="30" r="1.5" fill="rgba(255,255,255,0.4)"/%3E%3Ccircle cx="50" cy="70" r="1" fill="rgba(255,255,255,0.2)"/%3E/svg%3E') repeat;
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
            background: rgba(0, 0, 0, 0.95) !important;
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
            color: #ffffff !important;
            font-weight: 500;
            text-shadow: 0 0 5px rgba(255, 255, 255, 0.5);
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
            color: #c0c0c0 !important;
            transform: translateY(-3px);
            text-shadow: 0 0 10px rgba(255, 255, 255, 0.9);
        }
        .navbar-toggler {
            border: none;
        }
        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(255, 255, 255, 0.8)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
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
        .nav-item {
            padding: 0.5rem 1rem;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container mx-auto px-4">
            <a class="navbar-brand text-2xl" href="#">Quản lý sản phẩm</a>
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
            <h1 class="text-4xl font-bold text-center text-white mb-6">Chào mừng đến với Quản lý sản phẩm</h1>
            <p class="text-center text-gray-300 text-lg">Hệ thống quản lý sản phẩm tối tân.</p>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>