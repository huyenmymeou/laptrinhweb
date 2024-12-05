<?php
include_once('Config/connect.inp'); // Kết nối cơ sở dữ liệu

// Dữ liệu người dùng cần tạo
$mataikhoan = '';
$tentaikhoan = 'Vũ Khánh';
$tendangnhap = 'admin';
$matkhau = '123'; // Mật khẩu người dùng nhập vào
$quyen = 'admin';
$email = 'a@mail.com';
$sodienthoai = '0123456789';
$chucvu = 'giangvien';

// Mã hóa mật khẩu
$hashedPassword = password_hash($matkhau, PASSWORD_DEFAULT);

// Truy vấn SQL để chèn dữ liệu vào bảng tbltaikhoan
$sql = "INSERT INTO tbltaikhoan (mataikhoan, tentaikhoan, tendangnhap, matkhau, quyen, email, sodienthoai, chucvu)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssss", $mataikhoan, $tentaikhoan, $tendangnhap, $hashedPassword, $quyen, $email, $sodienthoai, $chucvu);

// Thực hiện câu lệnh
if ($stmt->execute()) {
    echo "Tạo tài khoản thành công!";
} else {
    echo "Có lỗi khi tạo tài khoản!";
}

$stmt->close();
$conn->close();
?>
