<?php
// file: controller/errorlogin.php

session_start();
include_once('../Model/xllogin.php'); // Kết nối với model
include_once('../Config/connect.inp'); // Kết nối cơ sở dữ liệu

// Khởi tạo model
$loginModel = new LoginModel($con);

$error = ''; // Biến lỗi

// Kiểm tra nếu form đã được gửi
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['tendangnhap'] ?? '';
    $password = $_POST['matkhau'] ?? '';

    // Xác thực người dùng
    $user = $loginModel->authenticate($username, $password);

    if ($user) {
        // Lưu thông tin người dùng vào session
        $_SESSION['tendangnhap'] = $user['tendangnhap']; // Lưu tên đăng nhập
        $_SESSION['tentaikhoan'] = $user['tentaikhoan']; // Lưu tên tài khoản
        $_SESSION['mataikhoan'] = $user['mataikhoan']; // Lưu mã tài khoản
        $_SESSION['quyen'] = $user['quyen']; // Lưu quyền của người dùng

        // Điều hướng đến trang chủ dựa trên quyền
        header("Location: ../user_dashboard.php");
        exit();
    } else {
        $error = 'Tên đăng nhập hoặc mật khẩu không đúng.';
    }
}

// Chuyển đến view
if (!$user) {
    // Lưu lỗi vào session (hoặc truyền qua query string)
    $_SESSION['error'] = 'Tên đăng nhập hoặc mật khẩu không đúng.';
    header("Location: ../View/dangnhap/login.php");
    exit();
}

