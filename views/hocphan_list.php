<!DOCTYPE html>
<html>
<head>
    <title>Danh sách học phần</title>
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
        h1, h2 {
            font-size: 24px;
            margin-bottom: 10px;
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
        .action-links a {
            color: blue;
            text-decoration: none;
            margin-right: 5px;
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

    <div class="container">
        <h1>TRANG HỌC PHẦN</h1>
        <table>
            <tr>
                <th>Mã HP</th>
                <th>Tên HP</th>
                <th>Số Tín Chỉ</th>
                <th>Số Lượng Dự Kiến</th>
                <th>Hành động</th>
            </tr>
            <?php foreach ($hocPhans as $hocPhan): ?>
            <tr>
                <td><?php echo htmlspecialchars($hocPhan['MaHP']); ?></td>
                <td><?php echo htmlspecialchars($hocPhan['TenHP']); ?></td>
                <td><?php echo htmlspecialchars($hocPhan['SoTinChi']); ?></td>
                <td><?php echo htmlspecialchars($hocPhan['SoLuongDuKien']); ?></td>
                <td class="action-links">
                    <a href="index.php?controller=dangky&action=addToCart&maHP=<?php echo htmlspecialchars($hocPhan['MaHP']); ?>">Thêm vào giỏ</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>

        <h2>GIỎ HÀNG</h2>
        <table>
            <tr>
                <th>Mã HP</th>
                <th>Tên HP</th>
                <th>Hành động</th>
            </tr>
            <?php if (isset($cartHocPhans) && !empty($cartHocPhans)): ?>
                <?php foreach ($cartHocPhans as $hocPhan): ?>
                <tr>
                    <td><?php echo htmlspecialchars($hocPhan['MaHP']); ?></td>
                    <td><?php echo htmlspecialchars($hocPhan['TenHP']); ?></td>
                    <td class="action-links">
                        <a href="index.php?controller=dangky&action=removeFromCart&maHP=<?php echo htmlspecialchars($hocPhan['MaHP']); ?>">Xóa</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="3">Giỏ hàng trống</td></tr>
            <?php endif; ?>
        </table>
        <div class="action-links">
            <a href="index.php?controller=dangky&action=clearCart">Xóa hết</a>
            <a href="index.php?controller=dangky&action=saveDangKy&maSV=0123456789">Lưu đăng ký</a>
        </div>
    </div>
</body>
</html>