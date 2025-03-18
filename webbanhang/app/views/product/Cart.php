<?php include 'app/views/shares/header.php'; ?>
<!-- Import Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<div class="container mt-4">
    <!-- Banner -->
    <div class="jumbotron text-center bg-warning text-white py-3 rounded">
        <h1><i class="fas fa-shopping-cart"></i> Giỏ hàng </h1>
    </div>

    <?php
    // Xử lý cập nhật số lượng
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['action']) && isset($_POST['product_id'])) {
            $productId = $_POST['product_id'];

            if ($_POST['action'] === 'increase') {
                $_SESSION['cart'][$productId]['quantity'] += 1;
            } elseif ($_POST['action'] === 'decrease') {
                $_SESSION['cart'][$productId]['quantity'] -= 1;
                if ($_SESSION['cart'][$productId]['quantity'] <= 0) {
                    unset($_SESSION['cart'][$productId]); // Xóa nếu số lượng về 0
                }
            } elseif ($_POST['action'] === 'remove') {
                unset($_SESSION['cart'][$productId]); // Xóa sản phẩm khỏi giỏ hàng
            }
        }
    }

    $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
    ?>

    <?php if (!empty($cart)): ?>
        <?php $total = 0; ?>

        <ul class="list-group">
            <?php foreach ($cart as $id => $item): ?>
                <?php 
                    $subtotal = $item['price'] * $item['quantity']; 
                    $total += $subtotal;
                ?>

                <li class="list-group-item d-flex align-items-center">
                    <!-- Hình ảnh sản phẩm -->
                    <?php if ($item['image']): ?>
                        <div class="image-container">
                            <img src="/<?php echo $item['image']; ?>" class="cart-img" alt="Product Image">
                        </div>
                    <?php endif; ?>

                    <!-- Thông tin sản phẩm -->
                    <div class="ms-3 flex-grow-1">
                        <h5 class="mb-1">
                            <i class="fas fa-tag"></i> <?php echo htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8'); ?>
                        </h5>
                        <p class="mb-1"><i class="fas fa-money-bill-wave"></i> Giá: 
                            <strong><?php echo number_format(htmlspecialchars($item['price'], ENT_QUOTES, 'UTF-8')); ?> VND</strong>
                        </p>

                        <!-- Form cập nhật số lượng -->
                        <form action="" method="POST" class="d-inline">
                            <input type="hidden" name="product_id" value="<?php echo $id; ?>">
                            <button type="submit" name="action" value="decrease" class="btn btn-outline-secondary btn-sm">
                                <i class="fas fa-minus"></i>
                            </button>
                            <span class="mx-2"><?php echo htmlspecialchars($item['quantity'], ENT_QUOTES, 'UTF-8'); ?></span>
                            <button type="submit" name="action" value="increase" class="btn btn-outline-secondary btn-sm">
                                <i class="fas fa-plus"></i>
                            </button>
                        </form>

                        <p class="text-danger mt-2"><i class="fas fa-dollar-sign"></i> Thành tiền: 
                            <strong><?php echo number_format($subtotal); ?> VND</strong>
                        </p>
                    </div>

                    <!-- Nút xóa sản phẩm -->
                    <form action="" method="POST">
                        <input type="hidden" name="product_id" value="<?php echo $id; ?>">
                        <button type="submit" name="action" value="remove" class="btn btn-danger btn-sm ms-3" onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này khỏi giỏ hàng?');">
                            <i class="fas fa-trash-alt"></i> Xóa
                        </button>
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>

        <!-- Hiển thị tổng tiền -->
        <div class="total-box bg-light p-3 mt-3 rounded text-end">
            <h4 class="text-success">
                <i class="fas fa-coins"></i> Tổng tiền: <strong><?php echo number_format($total); ?> VND</strong>
            </h4>
        </div>

    <?php else: ?>
        <p class="alert alert-warning text-center">
            <i class="fas fa-shopping-basket"></i> Giỏ hàng của bạn đang trống.
        </p>
    <?php endif; ?>

    <!-- Nút điều hướng -->
    <div class="mt-3 d-flex justify-content-between">
        <a href="/Product" class="btn btn-primary">
            <i class="fas fa-arrow-left"></i> Tiếp tục mua sắm
        </a>
        <?php if (!empty($cart)): ?>
            <a href="/Product/checkout" class="btn btn-success">
                <i class="fas fa-credit-card"></i> Thanh Toán
            </a>
        <?php endif; ?>
    </div>
</div>
<style>
.jumbotron {
    background-color: #007bff !important; /* Xanh dương chủ đạo */
    color: white !important;
}

.list-group-item {
    background-color: #ffffff;
    border: 1px solid #ddd;
}

.image-container {
    width: 80px;
    height: 80px;
    overflow: hidden;
    border-radius: 8px;
    border: 1px solid #ddd;
}

.total-box {
    background-color:rgb(255, 0, 0);
    color:rgb(0, 4, 255);
    font-size: 1.2rem;
    font-weight: bold;
    border: 1px solid #ddd;
}

.btn-primary {
    background-color: #007bff;
    border-color: #007bff;
}

.btn-success {
    background-color:rgb(0, 255, 26);
    border-color: #28a745;
}

.btn-danger {
    background-color: #dc3545;
    border-color:rgb(0, 13, 255);
}

.btn-outline-secondary {
    color:rgb(13, 0, 255);
    border-color: #007bff;
}

.btn-outline-secondary:hover {
    background-color: #007bff;
    color: white;
}
</style>

<?php include 'app/views/shares/footer.php'; ?>