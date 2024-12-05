// Hiển thị hoặc ẩn popup khi nhấp vào avatar
function togglePopup(event) {
    event.stopPropagation(); // Ngăn sự kiện click lan ra ngoài
    const popup = document.getElementById('profile-popup');
    popup.style.display = popup.style.display === 'block' ? 'none' : 'block';
}

// Đóng popup
function closePopup() {
    const popup = document.getElementById('profile-popup');
    popup.style.display = 'none';
}

// Xử lý sự kiện nhấp chuột ngoài popup để đóng
document.addEventListener('click', function (event) {
    const popup = document.getElementById('profile-popup');
    const avatarLink = document.getElementById('avatar-link');

    // Đóng popup nếu nhấp ngoài popup và không phải avatar
    if (popup && !popup.contains(event.target) && event.target !== avatarLink) {
        popup.style.display = 'none';
    }
});

// Ngăn chặn sự kiện click bên trong popup lan ra ngoài
document.getElementById('profile-popup').addEventListener('click', function (event) {
    event.stopPropagation();
});