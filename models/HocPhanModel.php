<?php
require_once 'config/database.php';

class HocPhanModel {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function getHocPhans() {
        $query = "SELECT * FROM HocPhan";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getHocPhanById($id) {
        $query = "SELECT * FROM HocPhan WHERE MaHP = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateSoLuongDuKien($maHP, $soLuong) {
        $query = "UPDATE HocPhan SET SoLuongDuKien = SoLuongDuKien - :soLuong WHERE MaHP = :maHP";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':maHP', $maHP);
        $stmt->bindParam(':soLuong', $soLuong, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
?>