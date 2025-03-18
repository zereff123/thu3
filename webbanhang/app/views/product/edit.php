<?php include 'app/views/shares/header.php'; ?>
<div class="container mt-5">
    <h1 class="text-center text-primary mb-4">✏️ Chỉnh sửa sản phẩm</h1>

    <!-- Hiển thị lỗi -->
    <?php if (!empty($errors)): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>⚠ Lỗi:</strong>
        <ul class="mb-0">
            <?php foreach ($errors as $error): ?>
            <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
            <?php endforeach; ?>
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif; ?>

    <!-- Form chỉnh sửa sản phẩm -->
    <div class="card shadow-lg border-0 rounded-4 p-4">
        <form method="POST" action="/Product/update" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $product->id; ?>">

            <div class="mb-3">
                <label for="name" class="form-label fw-bold">📌 Tên sản phẩm:</label>
                <input type="text" id="name" name="name" class="form-control p-2" 
                       value="<?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label fw-bold">📖 Mô tả:</label>
                <textarea id="description" name="description" class="form-control p-2" rows="3" required><?php echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?></textarea>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="price" class="form-label fw-bold">💰 Giá (VND):</label>
                    <input type="number" id="price" name="price" class="form-control p-2" step="0.01" 
                           value="<?php echo htmlspecialchars($product->price, ENT_QUOTES, 'UTF-8'); ?>" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="category_id" class="form-label fw-bold">📂 Danh mục:</label>
                    <select id="category_id" name="category_id" class="form-select p-2" required>
                        <option value="" disabled>-- Chọn danh mục --</option>
                        <?php foreach ($categories as $category): ?>
                        <option value="<?php echo $category->id; ?>" <?php echo $category->id == $product->category_id ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label fw-bold">🖼 Hình ảnh:</label>
                <input type="file" id="image" name="image" class="form-control p-2" accept="image/*" onchange="previewImage(event)">
                <input type="hidden" name="existing_image" value="<?php echo $product->image; ?>">

                <div class="mt-2">
                    <?php if ($product->image): ?>
                        <p class="fw-bold">Ảnh hiện tại:</p>
                        <img id="currentImage" src="/<?php echo $product->image; ?>" alt="Hình ảnh sản phẩm" class="img-fluid rounded shadow-sm" style="max-height: 150px;">
                    <?php endif; ?>
                    <img id="imagePreview" class="img-fluid rounded shadow-sm d-none mt-2" style="max-height: 150px;">
                </div>
            </div>

            <button type="submit" class="btn btn-primary w-100 py-2">💾 Lưu thay đổi</button>
        </form>
    </div>

    <div class="text-center mt-4">
        <a href="/Product/" class="btn btn-secondary px-4 py-2">⬅ Quay lại danh sách sản phẩm</a>
    </div>
</div>

<script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const output = document.getElementById('imagePreview');
            const currentImage = document.getElementById('currentImage');
            output.src = reader.result;
            output.classList.remove('d-none');
            if (currentImage) currentImage.classList.add('d-none');
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

<?php include 'app/views/shares/footer.php'; ?>
