<?php
require_once 'models/HocPhanModel.php';
require_once 'models/DangKyModel.php';

class DangKyController {
    private $hocPhanModel;
    private $dangKyModel;

    public function __construct() {
        $this->hocPhanModel = new HocPhanModel();
        $this->dangKyModel = new DangKyModel();
    }

    public function displayHocPhans() {
        // Lấy danh sách học phần
        $hocPhans = $this->hocPhanModel->getHocPhans();

        // Lấy thông tin học phần trong giỏ hàng (nếu có)
        $cartHocPhans = [];
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $maHP) {
                $hocPhan = $this->hocPhanModel->getHocPhanById($maHP);
                if ($hocPhan) {
                    $cartHocPhans[] = $hocPhan;
                }
            }
        }

        // Truyền dữ liệu vào view
        require_once 'views/hocphan_list.php';
    }

    public function addToCart($maHP) {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        if (!in_array($maHP, $_SESSION['cart'])) {
            $_SESSION['cart'][] = $maHP;
        }
        header("Location: index.php?controller=dangky&action=display");
    }

    public function removeFromCart($maHP) {
        if (isset($_SESSION['cart'])) {
            $key = array_search($maHP, $_SESSION['cart']);
            if ($key !== false) {
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart'] = array_values($_SESSION['cart']);
            }
        }
        header("Location: index.php?controller=dangky&action=display");
    }

    public function clearCart() {
        unset($_SESSION['cart']);
        header("Location: index.php?controller=dangky&action=display");
    }

    public function saveDangKy($maSV) {
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
            $ngayDK = date('Y-m-d');
            $maDK = $this->dangKyModel->addDangKy($maSV, $ngayDK);
            foreach ($_SESSION['cart'] as $maHP) {
                $this->dangKyModel->addChiTietDangKy($maDK, $maHP);
            }
            unset($_SESSION['cart']);
        }
        header("Location: index.php?controller=dangky&action=detail&maSV=$maSV");
    }

    public function detailDangKy($maSV) {
        $dangKyDetails = $this->dangKyModel->getDangKyDetails($maSV);
        require_once 'views/dangky_detail.php';
    }
}
?>