<?php
require_once('./Config/connect.inp'); // File kết nối database

function loginUser($tendangnhap, $matkhau) {
    global $db;

    // Truy vấn thông tin người dùng từ database
    $stmt = $db->prepare("SELECT mataikhoan, tendangnhap, matkhau, quyen FROM tbltaikhoan WHERE tendangnhap = :tendangnhap");
    $stmt->bindParam(':tendangnhap', $tendangnhap);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Kiểm tra mật khẩu
    if ($user && password_verify($matkhau, $user['matkhau'])) {
        return $user; // Trả về thông tin người dùng nếu đăng nhập thành công
    }

    return false; // Đăng nhập thất bại
}
?>
