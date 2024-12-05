
<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keyword" content="Trang chủ Website Khoa Công Nghệ Thông Tin - Đại Học Kiến Trúc Hà Nội, Công nghệ thông tin, Công nghệ đa phương tiện">
    <meta name="description" content="Trang chủ Website Khoa Công Nghệ Thông Tin - Đại Học Kiến Trúc Hà Nội">
    <meta name="Author" content="Nhóm 3">
    <meta name="copyright" content="Nhóm 3">
    <meta name="ROBOTS" content="INDEX, FOLLOW">
    <link rel="shortcut icon" href="./Public/img/logo.ico" type="image/x-icon">
    <title>Trang Admin - Khoa Công Nghệ Thông Tin - Đại Học Kiến Trúc Hà Nội</title>
    <link rel="stylesheet" type="text/css" href="../Public/css/admin.css"> 
    <link rel="stylesheet" type="text/css" href="../Public/css/admintaikhoan.css">  
    <script defer src="../Public/js/admin.js"></script>
</head>
<body>
<header class="header" id="main-header">
        <div class="container">
            <div class="logo">
                <img src="../Public/img/logo.png" alt="Logo" class="ảnh">
                <div class="title">
                    <span class="line1">KHOA CÔNG NGHỆ THÔNG TIN</span><br>
                    <span class="line2">ĐẠI HỌC KIẾN TRÚC HÀ NỘI</span>
                </div>
            </div>          
            
            <nav class="navbar">
                <div class="hotline">
                    <a href="adminchinh.php" id="hotline-link" onclick="showHotline()"><img src="../Public/img/nuttrangchu.png" alt="Hotline" ></a>
                </div>
                <div class="dangxuat">
                    <a href="#" id="dangxuat-link" onclick="showdangxuat()"><img src="../Public/img/nutdangxuat.png" alt="dangxuat" ></a>
                </div>
                <div class="avatar">
                    <a href="../Model/taikhoan.php" id="avatar-link" onclick="togglePopup()"><img src="../Public/img/avtadmin.png" alt="avatar" ></a>
                </div>
            </nav>
        </div>

    <nav class="tieude">
        <a href="./adminchinh.php" id="selected">TRANG CHỦ</a>
         
        <div class="dropdown">
            <a href="./Model/quanlymodules.php">QUẢN LÝ MODULES</a>
            <div class="dropdown-content">
                <a href="./Model/modulemenu.php">MENU</a>
                <a href="./Model/modulequantri.php">QUẢN TRỊ</a>
                <a href="./Model/modulechuyenmuc.php">CHUYÊN MỤC</a>
                <a href="./Model/modulebaiviet.php">BÀI VIẾT</a>
                <a href="./Model/modulealbum.php">ALBUM</a>
                <a href="./Model/modulevideo.php">VIDEO</a>
                <a href="./Model/modulepopup.php">POPUP</a>
                <a href="./Model/moduleykienbinhluan.php">Ý KIẾM BÌNH LUẬN</a>
            </div>
        </div>

        <div class="dropdown">
            <a href="./tintuc/tintuc.html">QUẢN LÝ GIAO DIỆN</a>
            
        </div>

        <div class="dropdown">
            <a href="./daotao/daotao.html">QUẢN LÝ FILE</a>
            
        </div>

        <div class="dropdown">
            <a href="./sinhvien/sinhvien.html">QUẢN LÝ SITE CON</a>
            
        </div>
        

    </nav>
    </header>
<header class="header1">
<div class="avatar1">
        <div class="popup" id="popup">
            <div class="header1">
                <img src="../Public/img/avtadmin.png"" alt="Profile">
                <div>
                    <h3>Huyền Nguyễn</h3>
                    <p>26thuhuyen28@gmail.com</p>
                </div>
            </div>
            <hr>
            <ul class="links">
                <li><a href="#">Tính năng đồng bộ hóa đang bật</a></li>
                <li><a href="#">Quản lý tài khoản Google của bạn</a></li>
            </ul>
            <hr>
            <div class="profiles">
                <h4>Hồ sơ khác</h4>
                <ul>
                    <li><a href="#">Đào Nguyễn Thành</a></li>
                    <li><a href="#">Nguyễn Thu</a></li>
                    <li><a href="#">bav.edu.vn</a></li>
                    <li><a href="#">stu.vinschool.edu.vn</a></li>
                </ul>
            </div>
            <a href="#" class="add-account">Thêm</a>
        </div>
    </div>
</header>
</body>
</html>