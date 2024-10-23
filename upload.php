<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kiemtra2"; // Thay bằng tên cơ sở dữ liệu của bạn

// Tạo kết nối với cơ sở dữ liệu
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $image_name = $_POST['image_name']; // Tên ảnh do người dùng nhập
    $target_dir = "uploads/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir);
    }
    
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $maxFileSize = 2 * 1024 * 1024; // 2MB
    
    // Kiểm tra xem file có phải là hình ảnh không
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check === false) {
        header("Location: index.php?error=File không phải là hình ảnh.");
        exit();
    }

    // Kiểm tra dung lượng file
    if ($_FILES["image"]["size"] > $maxFileSize) {
        header("Location: index.php?error=Kích thước file vượt quá 2MB.");
        exit();
    }

    // Chỉ cho phép định dạng JPG, PNG và GIF
    $allowedFormats = ['jpg', 'png', 'gif'];
    if (!in_array($imageFileType, $allowedFormats)) {
        header("Location: index.php?error=Chỉ chấp nhận các file JPG, PNG & GIF.");
        exit();
    }

    // Lưu file tải lên vào thư mục mục tiêu
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $sql = "INSERT INTO images (file_name, image_name) VALUES ('" . basename($_FILES["image"]["name"]) . "', '" . $image_name . "')";
        if ($conn->query($sql) === TRUE) {
            header("Location: display.php");
        } else {
            echo "Lỗi: " . $sql . "<br>" . $conn->error;
        }
    } else {
        header("Location: index.php?error=Có lỗi xảy ra khi tải file.");
    }
}

$conn->close();
?>