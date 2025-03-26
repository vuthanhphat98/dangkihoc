<!DOCTYPE html>
<html>
<head>
    <title>Xác nhận xóa sinh viên</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        .confirmation-box {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .buttons {
            margin-top: 20px;
            text-align: right;
        }
        .btn {
            padding: 8px 15px;
            margin-left: 10px;
            text-decoration: none;
            border-radius: 3px;
        }
        .btn-danger {
            background-color: #dc3545;
            color: white;
            border: 1px solid #dc3545;
        }
        .btn-secondary {
            background-color: #6c757d;
            color: white;
            border: 1px solid #6c757d;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="index.php">Test1</a>
        <a href="index.php?controller=sinhvien&action=display">Sinh Viên</a>
        <a href="index.php?controller=dangky&action=display">Học Phần</a>
        <a href="index.php?controller=dangky&action=detail&maSV=0123456789">Đăng Ký</a>
        <a href="login.php">Đăng Nhập</a>
    </div>

    <div class="confirmation-box">
        <h2>Xác nhận xóa sinh viên</h2>
        <p>Bạn có chắc chắn muốn xóa sinh viên <strong><?php echo htmlspecialchars($sinhVien['HoTen']); ?></strong> (Mã SV: <?php echo htmlspecialchars($sinhVien['MaSV']); ?>)?</p>
        <div class="buttons">
            <a href="index.php?action=display" class="btn btn-secondary">Hủy</a>
            <a href="index.php?action=delete&id=<?php echo htmlspecialchars($sinhVien['MaSV']); ?>" class="btn btn-danger">Xóa</a>
        </div>
    </div>
</body>
</html>