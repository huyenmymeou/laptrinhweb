<?php
include_once('../Config/connect.inp'); // Kết nối cơ sở dữ liệu

// Lấy thông tin người dùng (giả sử Admin đã đăng nhập, có thể lấy ID qua session)
session_start();
$admin_id = $_SESSION['admin_id']; // Giả định bạn lưu ID admin trong session sau khi đăng nhập

// Truy vấn dữ liệu từ bảng tbladmin
$sql = "SELECT tentaikhoan, sodienthoai, email FROM tbladmin WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $admin_id); // Gán giá trị admin_id
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc(); // Lấy dữ liệu người dùng
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keyword" content="Trang chủ Website Khoa Công Nghệ Thông Tin - Đại Học Kiến Trúc Hà Nội, Công nghệ thông tin, Công nghệ đa phương tiện">
    <meta name="description" content="Trang chủ Website Khoa Công Nghệ Thông Tin - Đại Học Kiến Trúc Hà Nội">
    <meta name="Author" content="Nhóm 3">
    <meta name="copyright" content="Nhóm 3">
    <meta name="ROBOTS" content="INDEX, FOLLOW">
    <link rel="shortcut icon" href="../Public/img/logo.ico" type="image/x-icon">
    <title>Trang Admin - Khoa Công Nghệ Thông Tin - Đại Học Kiến Trúc Hà Nội</title>
    <link rel="stylesheet" href="../Public/css/admin.css">
    <script defer src="../Public/js/admin.js"></script>
</head>
<body>
<div class="wrapper">
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>FIT - HAU</h2>
        <ul>
            <li><a href="../View/adminchinh.php"><i class="fas fa-home"></i> Dashboard</a></li>
            <li><a href="../Model/moduletaikhoan.php"><i class="fas fa-book"></i> Quản lý Tài Khoản</a></li>
            <li><a href="../Model/modulemenu.php"><i class="fas fa-book"></i> Quản lý Menu</a></li>
            <li><a href="../Model/modulechuyenmuc.php"><i class="fas fa-book"></i> Quản lý Chuyên mục</a></li>
            <li><a href="../Model/modulebaiviet.php"><i class="fas fa-book"></i> Quản lý Bài viết</a></li>
            <li><a href="../Model/modulealbum.php"><i class="fas fa-book"></i> Quản lý Album ảnh</a></li>
            <li><a href="../Model/modulevideo.php"><i class="fas fa-book"></i> Quản lý Video clip</a></li>
            <li><a href="../Model/modulepopup.php"><i class="fas fa-book"></i> Quản lý Popup</a></li>
            <li><a href="../Model/moduleykienbinhluan.php"><i class="fas fa-book"></i> Quản lý Ý kiến bình luận</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Bar -->
        <div class="top-bar">
            <input type="text" class="search-bar" placeholder="Tìm kiếm...">
            <div class="user-info">
                <span>Admin</span>
                <img src="../Public/img/avtadmin.png" alt="Avatar" class="avatar">
            </div>
        </div>
    </div>

    <div class="user-popup" id="user-popup" style="display: none;"> <!-- Ẩn mặc định -->
        <div class="popup-content">
            <h3>Thông tin người dùng</h3>
            <p><strong>Họ tên:</strong> <?php echo htmlspecialchars($user['tentaikhoan']); ?></p>
            <p><strong>Số điện thoại:</strong> <?php echo htmlspecialchars($user['sodienthoai']); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
            <button class="btn btn-danger" id="logout-btn">Đăng xuất</button>
        </div>
    </div>
</div>

<footer>
    <p>&copy; 2024 EAUT Library. All rights reserved.</p>
</footer>
<script src="../js/scripts.js"></script>

</body>
</html>