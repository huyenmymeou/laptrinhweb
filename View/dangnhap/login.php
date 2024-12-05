<?php
session_start(); // Bắt đầu session để đọc lỗi
$error = $_SESSION['error'] ?? ''; // Đọc lỗi từ session
unset($_SESSION['error']); // Xóa lỗi sau khi đọc
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./../../Public/css/login.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <meta name="description" content="Trang chủ Website Khoa Công Nghệ Thông Tin - Đại Học Kiến Trúc Hà Nội">
    <meta name="Author" content="Nhóm 3">
    <meta name="copyright" content="Nhóm 3">
    <meta name="ROBOTS" content="INDEX, FOLLOW">
    <link rel="shortcut icon" href="./../../Public/img/logo.ico" type="image/x-icon">
    <title>Đăng nhập - Quản trị hệ thống Khoa Công Nghệ Thông Tin - Đại Học Kiến Trúc Hà Nội</title>
</head>
<body> 
    <div class="form-container">
        <div class="logo">
            <img src="./../../Public/img/logo.png" alt="Logo" class="ảnh">
            <div class="title">
                <span class="line1">KHOA CÔNG NGHỆ THÔNG TIN</span>
                <span class="line2">ĐẠI HỌC KIẾN TRÚC HÀ NỘI</span>
            </div>
        </div> 
        <p class="title">QUẢN TRỊ HỆ THỐNG</p>
        <form class="form" action="./../../Controller/errorlogin.php" method="POST">
            <!-- Hiển thị lỗi nếu có -->
            <?php if (!empty($error)): ?>
                <p class="error" style="color: #c30000; font-weight: bold; padding: 5px;"><?php echo htmlspecialchars($error); ?></p>
            <?php endif; ?>

            <div class="input-group">
                <label for="tendangnhap">Tên đăng nhập</label>
                <input type="text" name="tendangnhap" id="username" placeholder="Tên đăng nhập" required>
            </div>
            <div class="input-group">
                <label for="password">Mật khẩu</label>
                <div class="password-container">
                    <input type="password" name="matkhau" id="password" placeholder="Mật khẩu" required>
                    <span class="toggle-password" id="togglePassword">
                        <i class="fas fa-eye" id="eyeIcon"></i>
                    </span>
                </div>
                <div class="forgot">
                    <a rel="noopener noreferrer" href="forgotpw.php">Quên mật khẩu</a>
                </div>
            </div>
            <button class="sign">Đăng nhập</button>
        </form>
    </div>
    <p class="copyright"><i>Copyright ©Khoa CNTT Đại học Kiến trúc Hà Nội. All rights reserved.</i></p>
    <script src="./../../Public/js/login.js"></script>
</body>
</html>
