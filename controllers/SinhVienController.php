<?php
require_once 'models/SinhVienModel.php';

class SinhVienController {
    private $model;

    public function __construct() {
        $this->model = new SinhVienModel();
    }

    public function displaySinhViens() {
        $sinhViens = $this->model->getSinhViens();
        require_once 'views/sinhvien_list.php';
    }

    public function addSinhVien() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $maSV = $_POST['maSV'];
            $hoTen = $_POST['hoTen'];
            $gioiTinh = $_POST['gioiTinh'];
            $ngaySinh = $_POST['ngaySinh'];
            $hinh = $_FILES['hinh']['name'];
            move_uploaded_file($_FILES['hinh']['tmp_name'], "Content/images/" . $hinh);
            $maNganh = $_POST['maNganh'];
            $this->model->addSinhVien($maSV, $hoTen, $gioiTinh, $ngaySinh, "/Content/images/" . $hinh, $maNganh);
            header("Location: index.php?action=display");
        } else {
            require_once 'views/add_sinhvien.php';
        }
    }

    public function editSinhVien($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $maSV = $id;
            $hoTen = $_POST['hoTen'];
            $gioiTinh = $_POST['gioiTinh'];
            $ngaySinh = $_POST['ngaySinh'];
            $hinh = $_FILES['hinh']['name'];
            move_uploaded_file($_FILES['hinh']['tmp_name'], "Content/images/" . $hinh);
            $maNganh = $_POST['maNganh'];
            $this->model->editSinhVien($maSV, $hoTen, $gioiTinh, $ngaySinh, "/Content/images/" . $hinh, $maNganh);
            header("Location: index.php?action=display");
        } else {
            $sinhVien = $this->model->getSinhVienById($id);
            require_once 'views/edit_sinhvien.php';
        }
    }
    public function confirmDelete($id) {
        $sinhVien = $this->model->getSinhVienById($id);
        require_once 'views/confirm_delete.php';
    }
    public function deleteSinhVien($id) {
        $this->model->deleteSinhVien($id);
        header("Location: index.php?action=display");
    }

    public function detailSinhVien($id) {
        $sinhVien = $this->model->getSinhVienById($id);
        require_once 'views/detail_sinhvien.php';
    }
}
?>