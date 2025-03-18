<?php include 'app/views/shares/header.php'; ?>
<div class="container mt-4">
    <h1 class="text-center text-primary mb-4">🛒 Thêm sản phẩm mới</h1>

    <!-- Hiển thị lỗi -->
    <?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach ($errors as $error): ?>
            <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php endif; ?>

    <!-- Form nhập liệu -->
    <div class="card shadow-sm border-0 rounded p-4">
        <form method="POST" action="/Product/save" enctype="multipart/form-data" onsubmit="return validateForm();">
            
            <div class="mb-3">
                <label for="name" class="form-label fw-bold">📌 Tên sản phẩm:</label>
                <input type="text" id="name" name="name" class="form-control" required placeholder="Nhập tên sản phẩm...">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label fw-bold">📖 Mô tả:</label>
                <textarea id="description" name="description" class="form-control" rows="3" required placeholder="Nhập mô tả sản phẩm..."></textarea>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label fw-bold">💰 Giá (VND):</label>
                <input type="number" id="price" name="price" class="form-control" step="0.01" required placeholder="Nhập giá sản phẩm...">
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label fw-bold">📂 Danh mục:</label>
                <select id="category_id" name="category_id" class="form-select" required>
                    <option value="" disabled selected>-- Chọn danh mục --</option>
                    <?php foreach ($categories as $category): ?>
                    <option value="<?php echo $category->id; ?>">
                        <?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label fw-bold">🖼 Hình ảnh:</label>
                <input type="file" id="image" name="image" class="form-control" accept="image/*" onchange="previewImage(event)">
                <div class="mt-2">
                    <img id="imagePreview" src="" class="img-fluid rounded d-none" style="max-height: 150px;">
                </div>
            </div>

            <button type="submit" class="btn btn-primary w-100 py-2">✅ Thêm sản phẩm</button>
        </form>
    </div>

    <div class="text-center mt-3">
        <a href="/Product/" class="btn btn-secondary">⬅ Quay lại danh sách sản phẩm</a>
    </div>
</div>

<script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const output = document.getElementById('imagePreview');
            output.src = reader.result;
            output.classList.remove('d-none');
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

<?php include 'app/views/shares/footer.php'; ?>
