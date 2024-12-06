// Khi người dùng click vào avatar, hiển thị hoặc ẩn popup thông tin người dùng
document.getElementById("avatar").addEventListener("click", function (e) {
    e.stopPropagation(); // Ngăn sự kiện click lan ra ngoài
    const popup = document.getElementById("user-popup");

    // Toggle trạng thái hiển thị của popup
    popup.style.display = popup.style.display === "block" ? "none" : "block";
});

// Ẩn popup khi click ra ngoài
document.addEventListener("click", function () {
    const popup = document.getElementById("user-popup");
    popup.style.display = "none"; // Ẩn popup
});

// Ngăn popup bị ẩn khi click bên trong nó
document.getElementById("user-popup").addEventListener("click", function (e) {
    e.stopPropagation(); // Ngăn sự kiện click lan ra ngoài
});

// Khi click vào nút đăng xuất
document.getElementById("logout-btn").addEventListener("click", function () {
    // Xử lý đăng xuất (ví dụ: xóa session và chuyển hướng về trang đăng nhập)
    window.location.href = "logout.php"; // Điều hướng đến tệp xử lý đăng xuất
});