<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="./../../Public/css/login.css">
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
        <form class="form" action="xllogin.php" method="POST">
            <?php if (!empty($error)): ?>
                <p class="error"><?php echo htmlspecialchars($error); ?></p>
            <?php endif; ?>
            
            <div class="input-group">
                <label for="username">Tên tài khoản</label>
                <input type="text" name="username" id="username" placeholder="Tên tài khoản" require>
            </div>
            <div class="input-group">
                <label for="password">Mật khẩu</label>
                <input type="password" name="password" id="password" placeholder="Đăng nhập" require>
                <div class="forgot">
                    <a rel="noopener noreferrer" href="forgotpw.php">Forgot Password?</a>
                </div>
            </div>
            <button class="sign">Đăng nhập</button>
        </form>
    </div>
    <p class="copyright"><i>Copyright ©Khoa CNTT Đại học Kiến trúc Hà Nội. All rights reserved.</i></p>
</body>
</html>