<?php
session_start();

// Kiểm tra xem có ảnh nào đã được upload không
if (!isset($_SESSION['uploaded_image'])) {
    header("Location: index.php?error=Không có ảnh nào để crop.");
    exit();
}

$imagePath = $_SESSION['compressed_image'];
$image_name = $_SESSION['image_name']; // Lấy tên ảnh từ session
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Crop Ảnh</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" />
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            background-color: #cfe6f66e; 
            margin: 0;
            padding: 20px; 
        }
        .crop-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        #image {
            max-width: 100%;
            margin-bottom: 20px;
        }
        .btn {
            background-color: #008ff672;
            color: #333;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }
        .btn:hover {
            background-color: #0191f7d3;
        }
        .cropper-container {
            border-radius: 15px !important; /* Bo góc cho toàn bộ vùng chứa */
            overflow: hidden; /* Đảm bảo phần nội dung bên trong không vượt ra ngoài */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Thêm shadow nhẹ cho vùng crop */
        }
    </style>
</head>
<body>
    <div class="crop-container">
        <h2>Crop Ảnh</h2>
        <img id="image" src="<?php echo htmlspecialchars($imagePath); ?>" alt="Image to crop">
        
        <button id="cropButton" class="btn">Crop</button>
        <form id="cropForm" action="upload.php" method="post" style="display:none;">
            <input type="hidden" name="cropped_image" id="cropped_image" value="">
            <input type="hidden" name="image_name" value="<?php echo htmlspecialchars($image_name); ?>"> <!-- Thêm tên ảnh vào form -->
            <input type="submit" value="Upload">
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
    <script>
        const image = document.getElementById('image');
        const cropButton = document.getElementById('cropButton');
        const cropForm = document.getElementById('cropForm');
        const croppedImageInput = document.getElementById('cropped_image');

        // Khởi tạo Cropper.js
        const cropper = new Cropper(image, {
            aspectRatio: 1, // Tỷ lệ khung hình (1:1)
            viewMode: 1,
            ready() {
                // Bất cứ điều gì khi cropper đã sẵn sàng
            },
        });

        cropButton.addEventListener('click', () => {
            const canvas = cropper.getCroppedCanvas();

            // Chuyển đổi canvas thành data URL và lưu vào trường ẩn
            croppedImageInput.value = canvas.toDataURL('image/png');

            // Hiện form upload và nộp
            cropForm.style.display = 'block';
            cropForm.submit(); // Tự động gửi form
        });
    </script>
</body>
</html>
