<?php include 'app/views/shares/header.php'; ?>

<h1>Giỏ hàng</h1>

<?php if (!empty($cart)): ?>
    <ul class="list-group">
        <?php 
        $totalQuantity = 0;
        $totalPrice = 0;
        
        foreach ($cart as $id => $item): 
            $totalQuantity += $item['quantity'];
            $totalPrice += $item['price'] * $item['quantity'];
        ?>
            <li class="list-group-item">
                <h2><?php echo htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8'); ?></h2>
                <?php if ($item['image']): ?>
                    <img src="/webbanhang/<?php echo $item['image']; ?>" alt="Product Image" style="max-width: 100px;">
                <?php endif; ?>
                <p>Giá: <?php echo number_format($item['price'], 0, ',', '.'); ?> VND</p>
                <p>Số lượng: <?php echo htmlspecialchars($item['quantity'], ENT_QUOTES, 'UTF-8'); ?></p>
                <p>Thành tiền: <?php echo number_format($item['price'] * $item['quantity'], 0, ',', '.'); ?> VND</p>
            </li>
        <?php endforeach; ?>
    </ul>
    
    <!-- Hiển thị tổng -->
    <div class="cart-totals mt-3 p-3 bg-light rounded">
        <h3>Tổng cộng:</h3>
        <p>Tổng số sản phẩm: <?php echo $totalQuantity; ?></p>
        <p>Tổng tiền: <strong><?php echo number_format($totalPrice, 0, ',', '.'); ?> VND</strong></p>
    </div>
    
<?php else: ?>
    <p>Giỏ hàng của bạn đang trống.</p>
<?php endif; ?>

<div class="mt-3">
    <a href="/webbanhang/Product" class="btn btn-secondary">Tiếp tục mua sắm</a>
    <?php if (!empty($cart)): ?>
        <a href="/webbanhang/Product/checkout" class="btn btn-primary">Thanh Toán</a>
    <?php endif; ?>
</div>

<?php include 'app/views/shares/footer.php'; ?>