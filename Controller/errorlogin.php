<?php
session_start();
require_once('./Model/xllogin.php'); // Import model xử lý đăng nhập

$error = ''; // Biến chứa thông báo lỗi

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Kiểm tra dữ liệu form
    $tendangnhap = trim($_POST['tendangnhap'] ?? '');
    $matkhau = trim($_POST['matkhau'] ?? '');

    if (empty($tendangnhap)) {
        $error = "Vui lòng điền tên đăng nhập.";
    } elseif (empty($matkhau)) {
        $error = "Vui lòng điền mật khẩu.";
    } else {
        // Gọi model để kiểm tra thông tin
        $user = loginUser($tendangnhap, $matkhau);

        if ($user) {
            // Lưu thông tin đăng nhập vào session
            $_SESSION['mataikhoan'] = $user['mataikhoan']; // Lưu ID người dùng
            $_SESSION['tendangnhap'] = $user['tendangnhap']; // Lưu tên đăng nhập
            $_SESSION['quyen'] = $user['quyen']; // Lưu quyền người dùng

            // Chuyển hướng đến trang admin
            header("Location: ./View/adminchinh.php");
            exit();
        } else {
            $error = "Sai tên đăng nhập hoặc mật khẩu, vui lòng kiểm tra lại.";
        }
    }
}

// Bao gồm giao diện view
include('./View/dangnhap/login.php');
?>
