<?php include 'app/views/shares/header.php'; ?>

<style>
    body {
        background: #ccffff;
        font-family: 'Poppins', sans-serif;
        color: #fff;
    }

    h1 {
        font-size: 2.5rem;
        font-weight: bold;
        text-shadow: 2px 2px 10px rgba(255, 255, 0, 0.2);
    }

    .card {
        transition: all 0.3s ease-in-out;
        border: none;
        background: #222;
        border-radius: 15px;
        box-shadow: 5px 5px 15px rgba(255, 255, 255, 0.2);
        overflow: hidden;
    }

    .card:hover {
        transform: translateY(-10px) scale(1.02);
        box-shadow: 10px 10px 30px rgba(255, 255, 255, 0.3);
    }

    .card-title a {
        font-size: 1.3rem;
        font-weight: bold;
        color: #fff;
        text-decoration: none;
    }

    .card-title a:hover {
        text-decoration: underline;
    }

    .card-footer {
        background: rgba(255, 255, 255, 0.1);
        border-top: none;
        border-radius: 0 0 15px 15px;
    }

    .btn {
        transition: all 0.3s ease-in-out;
        font-weight: bold;
        border-radius: 5px;
        font-size: 0.8rem;
        padding: 5px 10px;
    }

    .btn-warning {
        background: linear-gradient(to right, #f8b500, #ff7300);
        color: #fff;
    }

    .btn-danger {
        background: linear-gradient(to right, #e52d27, #b31217);
        color: #fff;
    }

    .btn-primary {
        background: linear-gradient(to right, #00c6ff, #0072ff);
        color: #fff;
    }

    .btn-group {
        display: flex;
        justify-content: center;
        gap: 5px;
    }

    footer {
        background-color: #111;
        color: white;
    }

    footer a {
        color: white !important;
    }
</style>

<h1 class="text-center my-4">
    <i class="fas fa-boxes"></i> Danh sách sản phẩm
</h1>

<a href="/Product/add" class="btn btn-success mb-4 d-block mx-auto w-25 shadow-lg">
    <i class="fas fa-plus-circle"></i> Thêm sản phẩm mới
</a>

<div class="container">
    <div class="row">
        <?php foreach ($products as $product): ?>
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="card h-100">
                    <?php if ($product->image): ?>
                        <img src="/<?php echo htmlspecialchars($product->image, ENT_QUOTES, 'UTF-8'); ?>" 
                             class="card-img-top" 
                             alt="Product Image" 
                             style="height: 200px; object-fit: cover;">
                    <?php else: ?>
                        <div class="d-flex justify-content-center align-items-center bg-light" style="height: 200px;">
                            <i class="fas fa-image fa-3x text-secondary"></i>
                        </div>
                    <?php endif; ?>
                    
                    <div class="card-body text-center">
                        <h5 class="card-title">
                            <a href="/Product/show/<?php echo $product->id; ?>">
                                <i class="fas fa-box-open"></i> 
                                <?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>
                            </a>
                        </h5>
                        <p class="card-text">
                            <i class="fas fa-tag"></i> Giá: 
                            <span class="text-danger font-weight-bold">
                                <?php echo htmlspecialchars($product->price, ENT_QUOTES, 'UTF-8'); ?> VND
                            </span>
                        </p>
                    </div>
                    
                    <div class="card-footer text-center">
                        <div class="btn-group">
                            <a href="/Product/edit/<?php echo $product->id; ?>" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Sửa
                            </a>
                            <a href="/Product/delete/<?php echo $product->id; ?>" class="btn btn-danger btn-sm"
                               onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">
                                <i class="fas fa-trash-alt"></i> Xóa
                            </a>
                            <a href="/Product/addToCart/<?php echo $product->id; ?>" class="btn btn-primary btn-sm">
                                <i class="fas fa-cart-plus"></i> Thêm
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<footer class="bg-dark text-center text-lg-start mt-4">
    <div class="container p-4">
        <div class="row">
            <div class="col-lg-6 col-md-12 mb-4">
                <h5 class="text-uppercase">Quản lý sản phẩm</h5>
                <p>Hệ thống quản lý sản phẩm giúp bạn theo dõi và cập nhật thông tin sản phẩm dễ dàng.</p>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <h5 class="text-uppercase">Liên kết nhanh</h5>
                <ul class="list-unstyled mb-0">
                    <li><a href="/Product/">Danh sách sản phẩm</a></li>
                    <li><a href="/Product/add">Thêm sản phẩm</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="text-center p-3 bg-dark text-white">© 2025 Quản lý sản phẩm. All rights reserved.</div>
</footer>
