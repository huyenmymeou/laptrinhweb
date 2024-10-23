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

    // Nén ảnh trước khi lưu
    $quality = 75; // Chất lượng nén (0-100, 100 là chất lượng cao nhất)

    // Xử lý nén cho các định dạng ảnh được cho phép
    if ($imageFileType == 'jpg' || $imageFileType == 'jpeg') {
        $image = imagecreatefromjpeg($_FILES["image"]["tmp_name"]);
        $compressed_file = $target_dir . 'compressed_' . basename($_FILES["image"]["name"]);
        imagejpeg($image, $compressed_file, $quality); // Nén ảnh JPG
    } elseif ($imageFileType == 'png') {
        $image = imagecreatefrompng($_FILES["image"]["tmp_name"]);
        $compressed_file = $target_dir . 'compressed_' . basename($_FILES["image"]["name"]);
        imagepng($image, $compressed_file, 9); // Nén ảnh PNG (9 là mức nén tối đa)
    } elseif ($imageFileType == 'gif') {
        $image = imagecreatefromgif($_FILES["image"]["tmp_name"]);
        $compressed_file = $target_dir . 'compressed_' . basename($_FILES["image"]["name"]);
        imagegif($image, $compressed_file); // Ảnh GIF không hỗ trợ nén nhiều
    } else {
        header("Location: index.php?error=Định dạng file không được hỗ trợ.");
        exit();
    }

    // Kiểm tra và lưu thông tin vào cơ sở dữ liệu
    if (file_exists($compressed_file)) {
        $sql = "INSERT INTO images (file_name, image_name) VALUES ('" . basename($compressed_file) . "', '" . $image_name . "')";
        if ($conn->query($sql) === TRUE) {
            header("Location: display.php");
        } else {
            echo "Lỗi: " . $sql . "<br>" . $conn->error;
        }
    } else {
        header("Location: index.php?error=Có lỗi xảy ra khi nén file.");
    }
}

$conn->close();
?>