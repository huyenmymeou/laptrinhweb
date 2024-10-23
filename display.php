<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kiemtra2"; // Thay bằng tên cơ sở dữ liệu của bạn

// Kết nối với cơ sở dữ liệu
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Số ảnh trên mỗi trang
$images_per_page = 6;

// Xác định trang hiện tại
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$current_page = max($current_page, 1);

// Tính toán chỉ số bắt đầu của ảnh cho trang hiện tại
$offset = ($current_page - 1) * $images_per_page;

// Lấy tổng số ảnh
$total_images_result = $conn->query("SELECT COUNT(*) AS total FROM images");
$total_images_row = $total_images_result->fetch_assoc();
$total_images = $total_images_row['total'];

// Tính tổng số trang
$total_pages = ceil($total_images / $images_per_page);

// Truy vấn để lấy danh sách ảnh cho trang hiện tại
$sql = "SELECT file_name, image_name FROM images LIMIT $offset, $images_per_page";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ảnh đã tải lên</title>
    <link rel="stylesheet" href="styles.css"> <!-- Liên kết file CSS -->
</head>
<body>
    <div class="h2-container">
    <h2 class="h2">THƯ VIỆN ẢNH TÚI - JULIE</h2>
    </div>
    <div class="gallery">
        <?php
        if ($result->num_rows > 0) {
            $count = 0; // Biến đếm số ảnh trong hàng
            while($row = $result->fetch_assoc()) {
                // Bắt đầu một hàng mới nếu là ảnh đầu tiên hoặc sau mỗi 3 ảnh
                if ($count % 3 === 0) {
                    if ($count > 0) {
                        echo '</div>'; // Đóng hàng trước đó
                    }
                    echo '<div class="gallery-row">'; // Mở một hàng mới
                }

                // Hiển thị từng ảnh
                echo '<div class="gallery-item" onclick="openFullscreen(\'' . htmlspecialchars($row["file_name"]) . '\')">';
                echo '<img src="uploads/' . htmlspecialchars($row["file_name"]) . '" alt="' . htmlspecialchars($row["image_name"]) . '">';
                echo '<p>' . htmlspecialchars($row["image_name"]) . '</p>';
                echo '</div>';

                $count++;
            }
            // Đóng hàng cuối cùng nếu cần
            if ($count % 3 !== 0) {
                echo '</div>';
            }
        } else {
            echo "<p>Chưa có ảnh nào được tải lên.</p>";
        }
        ?>
    </div>


    <!-- Khung ảnh toàn màn hình -->
    <div id="fullscreen" class="fullscreen-img" onclick="closeFullscreen()">
        <span class="close" onclick="closeFullscreen()">✖</span>
        <img id="fullscreen-img" src="" alt="">
    </div>

    <script src="script.js"></script> <!-- Liên kết file JavaScript -->
</body>
    <!-- Phân trang -->
    <div class="pagination">
        <?php
        if ($total_pages > 1) {
            for ($page = 1; $page <= $total_pages; $page++) {
                echo '<a href="?page=' . $page . '" class="' . ($page == $current_page ? 'active' : '') . '">' . $page . '</a>';
            }
        }
        ?>
    </div>

</html>

<?php
$conn->close();
?>