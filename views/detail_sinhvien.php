<!DOCTYPE html>
<html>
<head>
    <title>Chi tiết sinh viên</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background-color: #333;
            overflow: hidden;
        }
        .navbar a {
            float: left;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }
        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }
        .container {
            padding: 20px;
        }
        h1 {
            font-size: 24px;
            margin-bottom: 10px;
        }
        p {
            margin: 5px 0;
        }
        img {
            width: 100px;
            height: auto;
        }
        .back-link {
            color: blue;
            text-decoration: none;
            margin-top: 10px;
            display: inline-block;
        }
    </style>
</head>
<body>
    <?php
    // Định nghĩa base_url dựa trên cấu trúc thư mục dự án
    $base_url = '/src/dangkihoc'; // Thay 'your_project' bằng tên thư mục dự án của bạn, ví dụ: '/website_dangky'
    // Nếu dự án nằm trực tiếp trong htdocs (không có thư mục con), đặt $base_url = '';
    ?>
    <div class="navbar">
        <a href="index.php">Test1</a>
        <a href="index.php?controller=sinhvien&action=display">Sinh Viên</a>
        <a href="index.php?controller=dangky&action=display">Học Phần</a>
        <a href="index.php?controller=dangky&action=detail&maSV=0123456789">Đăng Ký</a>
        <a href="login.php">Đăng Nhập</a>
    </div>

    <div class="container">
        <h1>CHI TIẾT SINH VIÊN</h1>
        <p><strong>Mã SV:</strong> <?php echo $sinhVien['MaSV']; ?></p>
        <p><strong>Họ Tên:</strong> <?php echo $sinhVien['HoTen']; ?></p>
        <p><strong>Giới Tính:</strong> <?php echo $sinhVien['GioiTinh']; ?></p>
        <p><strong>Ngày Sinh:</strong> <?php echo date('d/m/Y h:i:s A', strtotime($sinhVien['NgaySinh'])); ?></p>
        <p>                   
            <img src="<?php echo $base_url . ($sinhVien['Hinh'] ?? '/Content/images/default.jpg'); ?>" width="50" alt="Hinh" onerror="this.src='<?php echo $base_url; ?>/Content/images/default.jpg';">
        </p>
        <p><strong>Ngành Học:</strong> <?php echo $sinhVien['MaNganh']; ?></p>
        <a href="index.php?action=display" class="back-link">Quay lại</a>
    </div>
</body>
</html>