<?php
session_start(); // Khởi tạo session

require_once 'controllers/SinhVienController.php';
require_once 'controllers/DangKyController.php';

$controller = $_GET['controller'] ?? 'sinhvien';
$action = $_GET['action'] ?? 'display';
$id = $_GET['id'] ?? null;
$maHP = $_GET['maHP'] ?? null;
$maSV = $_GET['maSV'] ?? null;

if ($controller == 'sinhvien') {
    $sinhVienController = new SinhVienController();
    switch ($action) {
        case 'display':
            $sinhVienController->displaySinhViens();
            break;
        case 'add':
            $sinhVienController->addSinhVien();
            break;
        case 'edit':
            if ($id) {
                $sinhVienController->editSinhVien($id);
            }
            break;
        case 'delete':
            if ($id) {
                $sinhVienController->deleteSinhVien($id);
            }
            break;
        case 'detail':
            if ($id) {
                $sinhVienController->detailSinhVien($id);
            }
            break;
        case 'confirm_delete':
            if ($id) {
                $sinhVienController->confirmDelete($id);
            }
            break;
        default:
            $sinhVienController->displaySinhViens();
    }
} elseif ($controller == 'dangky') {
    $dangKyController = new DangKyController();
    switch ($action) {
        case 'display':
            $dangKyController->displayHocPhans();
            break;
        case 'addToCart':
            if ($maHP) {
                $dangKyController->addToCart($maHP);
            }
            break;
        case 'removeFromCart':
            if ($maHP) {
                $dangKyController->removeFromCart($maHP);
            }
            break;
        case 'clearCart':
            $dangKyController->clearCart();
            break;
        case 'saveDangKy':
            if ($maSV) {
                $dangKyController->saveDangKy($maSV);
            }
            break;
        case 'detail':
            if ($maSV) {
                $dangKyController->detailDangKy($maSV);
            }
            break;
        default:
            $dangKyController->displayHocPhans();
    }
}
?>