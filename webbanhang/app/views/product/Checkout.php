<?php include 'app/views/shares/header.php'; ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg p-4 border-0" style="border-radius: 15px; background:  linear-gradient(135deg, #dfe9f3 0%, #ffffff 100%); color: #004000;">
                <h2 class="text-center mb-4" style="font-weight: bold; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);">Thanh toán</h2>
                <form method="POST" action="/Product/processCheckout">
                    <div class="form-group mb-3">
                        <label for="name" class="form-label">Họ tên:</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Nhập họ tên" required style="border-radius: 10px;">
                    </div>
                    <div class="form-group mb-3">
                        <label for="phone" class="form-label">Số điện thoại:</label>
                        <input type="text" id="phone" name="phone" class="form-control" placeholder="Nhập số điện thoại" required style="border-radius: 10px;">
                    </div>
                    <div class="form-group mb-3">
                        <label for="address" class="form-label">Địa chỉ:</label>
                        <textarea id="address" name="address" class="form-control" placeholder="Nhập địa chỉ" rows="3" required style="border-radius: 10px;"></textarea>
                    </div>
                    <button type="submit" class="btn btn-light w-100" style="border-radius: 10px; font-weight: bold; box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);">Thanh toán</button>
                </form>
                <a href="/Product/cart" class="btn btn-light w-100 mt-3" style="border-radius: 10px; font-weight: bold;">Quay lại giỏ hàng</a>
            </div>
        </div>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>