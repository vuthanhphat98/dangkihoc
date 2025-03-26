<?php
require_once 'config/database.php';

class DangKyModel {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function addDangKy($ngayDK, $maSV) {
        $query = "INSERT INTO DangKy (NgayDK, MaSV) VALUES (:ngayDK, :maSV)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':ngayDK', $ngayDK);
        $stmt->bindParam(':maSV', $maSV);
        if ($stmt->execute()) {
            return $this->db->lastInsertId();
        }
        return false;
    }

    public function addChiTietDangKy($maDK, $maHP) {
        $query = "INSERT INTO ChiTietDangKy (MaDK, MaHP) VALUES (:maDK, :maHP)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':maDK', $maDK);
        $stmt->bindParam(':maHP', $maHP);
        return $stmt->execute();
    }

    public function getDangKyByMaSV($maSV) {
        $query = "SELECT dk.*, hp.TenHP, hp.SoTinChi 
                  FROM DangKy dk 
                  JOIN ChiTietDangKy ctdk ON dk.MaDK = ctdk.MaDK 
                  JOIN HocPhan hp ON ctdk.MaHP = hp.MaHP 
                  WHERE dk.MaSV = :maSV";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':maSV', $maSV);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>