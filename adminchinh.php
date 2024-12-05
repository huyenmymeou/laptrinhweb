
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
    <link rel="shortcut icon" href="./Public/img/logo.ico" type="image/x-icon">
    <title>Trang Admin - Khoa Công Nghệ Thông Tin - Đại Học Kiến Trúc Hà Nội</title>
    <link rel="stylesheet" type="text/css" href="./Public/css/admin.css">  
    <script defer src="./Public/js/admin.js"></script>
</head>
<body>
    <header class="header" id="main-header">
        <div class="container">
            <div class="logo">
                <img src="./Public/img/logo.png" alt="Logo" class="ảnh">
                <div class="title">
                    <span class="line1">KHOA CÔNG NGHỆ THÔNG TIN</span><br>
                    <span class="line2">ĐẠI HỌC KIẾN TRÚC HÀ NỘI</span>
                </div>
            </div>          
            
            <nav class="navbar">
                <div class="hotline">
                    <a href="adminchinh.php" id="hotline-link" onclick="showHotline()"><img src="./Public/img/nuttrangchu.png" alt="Hotline" onmouseover="hoverEffect(this)" onmouseout="normalEffect(this)"></a>
                </div>
                <div class="dangxuat">
                    <a href="#" id="dangxuat-link" onclick="showdangxuat()"><img src="./Public/img/nutdangxuat.png" alt="dangxuat" onmouseover="hoverEffect(this)" onmouseout="normalEffect(this)"></a>
                </div>
                <div class="avatar">
                <a href="#" id="avatar-link" onclick="togglePopup(event)">
                    <img src="./Public/img/avtadmin.png" alt="avatar"></a>
                    <div class="popup" id="profile-popup">
                        <div class="popup-content">
                            <h3>Hồ Sơ Người Dùng</h3>
                            <p>Họ và tên: <?php echo htmlspecialchars($name); ?></p>
                            <p>Chức vụ: <?php echo htmlspecialchars($position); ?></p>
                            <p>SĐT: <?php echo htmlspecialchars($phone); ?></p>
                            <p>Email: <?php echo htmlspecialchars($email); ?></p>
                        <button onclick="closePopup()">Đóng</button>
                        </div>
                    </div>
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
            <a href="#">QUẢN LÝ GIAO DIỆN</a>
            
        </div>

        <div class="dropdown">
            <a href="#">QUẢN LÝ FILE</a>
            
        </div>

        <div class="dropdown">
            <a href="#">QUẢN LÝ SITE CON</a>
            
        </div>
        

    </nav>
    </header>

</body>
</html>