function openFullscreen(fileName) {
    var img = document.getElementById("fullscreen-img");
    img.src = "uploads/" + fileName; // Đường dẫn đến ảnh
    document.getElementById("fullscreen").style.display = "flex"; // Hiện khung ảnh
}

function closeFullscreen() {
    document.getElementById("fullscreen").style.display = "none"; // Ẩn khung ảnh
}