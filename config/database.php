<?php
class Database {
    private $host = "localhost";
    private $dbname = "Test1";
    private $username = "root"; // Thay bằng username của bạn
    private $password = "";     // Thay bằng password của bạn
    private $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
?>