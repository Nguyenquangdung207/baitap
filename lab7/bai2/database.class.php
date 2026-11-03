<?php
/**
 * Bài 2 - OOP với PHP
 * Lớp Database dùng PDO để kết nối và truy vấn CSDL
 */
class Database {
    private $host = "localhost";
    private $dbname = "udn";
    private $username = "root";
    private $password = "";
    private $conn;

    public function __construct() {
        try {
            $this->conn = new PDO(
                "mysql:host={$this->host};dbname={$this->dbname};charset=utf8",
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Kết nối thất bại: " . $e->getMessage());
        }
    }

    /**
     * Truy vấn và trả về tất cả dòng của một bảng
     */
    public function getAll($table) {
        $allowedTables = ['giaovien', 'sinhvien', 'hocphan'];
        if (!in_array($table, $allowedTables)) {
            return [];
        }
        $stmt = $this->conn->query("SELECT * FROM `$table`");
        return $stmt->fetchAll();
    }

    /**
     * Lấy tên các cột của bảng
     */
    public function getColumns($table) {
        $allowedTables = ['giaovien', 'sinhvien', 'hocphan'];
        if (!in_array($table, $allowedTables)) {
            return [];
        }
        $stmt = $this->conn->query("DESCRIBE `$table`");
        $cols = [];
        while ($row = $stmt->fetch()) {
            $cols[] = $row['Field'];
        }
        return $cols;
    }
}
?>
