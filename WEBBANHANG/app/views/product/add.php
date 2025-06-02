<?php include 'app/views/shares/header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm mới</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap" rel="stylesheet">
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
            text-shadow: 0 0 12px rgba(192, 192, 192, 0.7);
            transition: text-shadow 0.3s ease;
        }
        .navbar-brand:hover {
            text-shadow: 0 0 18px rgba(192, 192, 192, 0.9);
        }
        .nav-link {
            color: #ffffff;
            font-weight: 500;
            text-shadow: 0 0 8px rgba(192, 192, 192, 0.5);
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
            text-shadow: 0 0 12px rgba(192, 192, 192, 0.8);
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
        .content-box h1 {
            color: #ffffff;
            text-shadow: 0 0 10px rgba(192, 192, 192, 0.6);
            font-weight: 700;
        }
        .alert {
            background: rgba(220, 53, 69, 0.9);
            color: #ffffff;
            border: 1px solid #c0c0c0;
            border-radius: 4px;
            padding: 1rem;
            margin-bottom: 1rem;
            font-weight: 600;
            text-shadow: 0 0 5px rgba(192, 192, 192, 0.3);
        }
        .alert ul {
            margin: 0;
            padding-left: 1.5rem;
        }
        .form-group label {
            color: #ffffff;
            font-weight: 700;
            text-shadow: 0 0 8px rgba(192, 192, 192, 0.5);
            margin-bottom: 0.5rem;
            display: block;
        }
        .form-control {
            background: rgba(30, 30, 30, 0.9);
            border: 1px solid #c0c0c0;
            color: #ffffff;
            border-radius: 4px;
            padding: 0.5rem;
            font-size: 1rem;
            font-weight: 600;
            text-shadow: 0 0 5px rgba(192, 192, 192, 0.3);
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }
        .form-control:focus {
            border-color: #ffffff;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.3);
            outline: none;
        }
        .form-control::placeholder {
            color: #c0c0c0;
            font-weight: 500;
            text-shadow: 0 0 3px rgba(192, 192, 192, 0.2);
        }
        .btn {
            font-family: 'Orbitron', sans-serif;
            transition: all 0.3s ease;
            border: 1px solid transparent;
            padding: 0.5rem 1rem;
            font-weight: 700;
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
        .btn-secondary {
            background: #c0c0c0;
            color: #0a0a0a;
            border-radius: 20px;
        }
        .btn-secondary:hover {
            background: #ffffff;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
        }
    </style>
</head>
<body>
    <?php include 'app/views/shares/header.php'; ?>
    <div class="container mt-24 mx-auto px-4">
        <div class="content-box glow">
            <h1 class="text-3xl font-bold text-center text-white mb-4">Thêm sản phẩm mới</h1>
            <?php if (!empty($errors)): ?>
                <div class="alert">
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
            <form method="POST" action="/WEBBANHANG/Product/save" enctype="multipart/form-data" onsubmit="return validateForm();">
                <div class="form-group">
                    <label for="name">Tên sản phẩm:</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="description">Mô tả:</label>
                    <textarea id="description" name="description" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label for="price">Giá:</label>
                    <input type="number" id="price" name="price" class="form-control" step="0.01" required>
                </div>
                <div class="form-group">
                    <label for="category_id">Danh mục:</label>
                    <select id="category_id" name="category_id" class="form-control" required>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?php echo $category->id; ?>"><?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="image">Hình ảnh:</label>
                    <input type="file" id="image" name="image" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary mt-4">Thêm sản phẩm</button>
            </form>
            <a href="/WEBBANHANG/Product/list" class="btn btn-secondary mt-2">Quay lại danh sách sản phẩm</a>
        </div>
    </div>
    <?php include 'app/views/shares/footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function validateForm() {
            const name = document.getElementById('name').value;
            const description = document.getElementById('description').value;
            const price = document.getElementById('price').value;
            if (!name || !description || !price) {
                alert('Vui lòng điền đầy đủ thông tin!');
                return false;
            }
            return true;
        }
    </script>
</body>
</html>