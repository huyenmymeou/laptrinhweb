<?php

class LoginModel {
    private $con;

    public function __construct($db) {
        $this->con = $db;
    }

    // Hàm xác thực người dùng
    public function authenticate($username, $password) {
        $username = $this->validate($username);
        $password = $this->validate($password);

        // Nếu username hoặc password trống, trả về false
        if (empty($username) || empty($password)) {
            return false;
        }

        // Truy vấn cơ sở dữ liệu với bảng tbltaikhoan
        $sql = "SELECT * FROM tbltaikhoan WHERE tendangnhap = ? AND matkhau = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            return $result->fetch_assoc(); // Trả về dữ liệu người dùng nếu tìm thấy
        }

        return false; // Nếu không tìm thấy người dùng
    }

    // Hàm làm sạch dữ liệu đầu vào
    private function validate($data) {
        return htmlspecialchars(stripslashes(trim($data)));
    }
}
?>
