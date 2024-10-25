<?php
session_start();

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

// Kiểm tra xem có ảnh nào đã được upload không
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Lưu tên ảnh vào session (từ bước nhập tên ảnh ban đầu)
    if (isset($_POST['image_name'])) {
        $_SESSION['image_name'] = $_POST['image_name'];
    }

    $image_name = isset($_SESSION['image_name']) ? $_SESSION['image_name'] : ''; // Lấy tên ảnh từ session
    $maxFileSize = 2 * 1024 * 1024; // 2MB
    $target_dir = "uploads/";

    // Kiểm tra xem file có phải là hình ảnh không
    if (isset($_FILES["image"])) {
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
        $imageFileType = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));
        $allowedFormats = ['jpg', 'png', 'gif'];
        if (!in_array($imageFileType, $allowedFormats)) {
            header("Location: index.php?error=Chỉ chấp nhận các file JPG, PNG & GIF.");
            exit();
        }

        // Lưu ảnh gốc vào thư mục uploads
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true); // Tạo thư mục nếu chưa có
        }

        // Đường dẫn file gốc
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $temp_file = $_FILES["image"]["tmp_name"];

        // Di chuyển file vào thư mục đích
        if (move_uploaded_file($temp_file, $target_file)) {
            $_SESSION['uploaded_image'] = $target_file; // Lưu đường dẫn ảnh gốc vào session

            // Thực hiện nén ảnh sau khi đã lưu vào thư mục
            $quality = 75; // Chất lượng nén (0-100, 100 là chất lượng cao nhất)
            $compressed_file = $target_dir . 'compressed_' . basename($_FILES["image"]["name"]); // Đường dẫn file nén

            // Xử lý nén cho các định dạng ảnh được cho phép
            if ($imageFileType == 'jpg' || $imageFileType == 'jpeg') {
                $image = imagecreatefromjpeg($target_file);
                if ($image === false) {
                    echo "Không thể mở tệp ảnh JPEG.";
                    exit();
                }
                imagejpeg($image, $compressed_file, $quality); // Nén ảnh JPG
            } elseif ($imageFileType == 'png') {
                $image = imagecreatefrompng($target_file);
                if ($image === false) {
                    echo "Không thể mở tệp ảnh PNG.";
                    exit();
                }
                imagepng($image, $compressed_file, 9); // Nén ảnh PNG (9 là mức nén tối đa)
            } elseif ($imageFileType == 'gif') {
                $image = imagecreatefromgif($target_file);
                if ($image === false) {
                    echo "Không thể mở tệp ảnh GIF.";
                    exit();
                }
                imagegif($image, $compressed_file); // Ảnh GIF không hỗ trợ nén nhiều
            } else {
                header("Location: index.php?error=Định dạng file không được hỗ trợ.");
                exit();
            }

            // Lưu ảnh nén vào session
            $_SESSION['compressed_image'] = $compressed_file;

            // Thực hiện điều hướng đến trang crop
            header("Location: crop.php");
            exit();
        } else {
            echo "Lỗi trong quá trình tải ảnh lên.";
            exit();
        }
    }

    // Kiểm tra xem có ảnh đã crop được gửi lên hay không
    if (!empty($_POST['cropped_image'])) {
        $image_data = $_POST['cropped_image'];

        // Lưu file đã crop vào thư mục
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true); // Tạo thư mục nếu chưa có
        }

        $target_file = $target_dir . 'cropped_' . time() . '.png'; // Đặt tên file mới

        // Chuyển đổi data URL thành ảnh
        list($type, $image_data) = explode(';', $image_data);
        list(, $image_data)      = explode(',', $image_data);
        $image_data = base64_decode($image_data);

        // Lưu ảnh vào file
        if (file_put_contents($target_file, $image_data)) {
            // Lưu thông tin vào CSDL
            $sql = "INSERT INTO images (file_name, image_name) VALUES ('" . $conn->real_escape_string(basename($target_file)) . "', '" . $conn->real_escape_string($image_name) . "')";
            if ($conn->query($sql) === TRUE) {
                // Điều hướng về trang display.php sau khi upload thành công
                header("Location: display.php");
                exit();
            } else {
                echo "Lỗi: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Lỗi lưu file.";
        }
    } else {
        echo "Không có ảnh nào được gửi.";
    }
}

$conn->close();
?>
