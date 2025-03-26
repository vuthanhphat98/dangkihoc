<!DOCTYPE html>
<html>
<head>
    <title>Danh sách sinh viên</title>
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
        .add-btn {
            color: blue;
            text-decoration: none;
            margin-bottom: 10px;
            display: inline-block;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        img {
            width: 50px;
            height: auto;
        }
        .action-links a {
            color: blue;
            text-decoration: none;
            margin-right: 5px;
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
        <h1>TRANG SINH VIÊN</h1>
        <a href="index.php?action=add" class="add-btn">Add Student</a>
        <table>
            <tr>
                <th>MaSV</th>
                <th>HoTen</th>
                <th>GioiTinh</th>
                <th>NgaySinh</th>
                <th>Hinh</th>
                <th>MaNganh</th>
                <th></th>
            </tr>
            <?php foreach ($sinhViens as $sinhVien): ?>
            <tr>
                <td><?php echo htmlspecialchars($sinhVien['MaSV']); ?></td>
                <td><?php echo htmlspecialchars($sinhVien['HoTen']); ?></td>
                <td><?php echo htmlspecialchars($sinhVien['GioiTinh']); ?></td>
                <td><?php echo date('d/m/Y h:i:s A', strtotime($sinhVien['NgaySinh'])); ?></td>
                <td>
                    <!-- Debug: In đường dẫn để kiểm tra -->
                    
                    <img src="<?php echo $base_url . ($sinhVien['Hinh'] ?? '/Content/images/default.jpg'); ?>" width="50" alt="Hinh" onerror="this.src='<?php echo $base_url; ?>/Content/images/default.jpg';">
                </td>
                <td><?php echo htmlspecialchars($sinhVien['MaNganh']); ?></td>
                <td class="action-links">
                    <a href="index.php?action=edit&id=<?php echo htmlspecialchars($sinhVien['MaSV']); ?>">Edit</a> |
                    <a href="index.php?action=detail&id=<?php echo htmlspecialchars($sinhVien['MaSV']); ?>">Detail</a> |
                    <a href="index.php?action=confirm_delete&id=<?php echo htmlspecialchars($sinhVien['MaSV']); ?>">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>