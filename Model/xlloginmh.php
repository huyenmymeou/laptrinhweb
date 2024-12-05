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
        $sql = "SELECT * FROM tbltaikhoan WHERE tendangnhap = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();

            // Sử dụng password_verify để kiểm tra mật khẩu đã mã hóa
            if (password_verify($password, $user['matkhau'])) {
                return $user; // Trả về dữ liệu người dùng nếu mật khẩu đúng
            }
        }

        return false; // Nếu không tìm thấy người dùng hoặc mật khẩu sai
    }

    // Hàm làm sạch dữ liệu đầu vào
    private function validate($data) {
        return htmlspecialchars(stripslashes(trim($data)));
    }
}
?>
