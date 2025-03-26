<!DOCTYPE html>
<html>
<head>
    <title>Thông tin đăng ký</title>
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
        .back-link {
            color: blue;
            text-decoration: none;
            margin-top: 10px;
            display: inline-block;
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
        <h1>THÔNG TIN ĐĂNG KÝ</h1>
        <table>
            <tr>
                <th>Mã HP</th>
                <th>Tên HP</th>
                <th>Số Tín Chỉ</th>
            </tr>
            <?php if (!empty($dangKyDetails)): ?>
                <?php foreach ($dangKyDetails as $detail): ?>
                <tr>
                    <td><?php echo $detail['MaHP']; ?></td>
                    <td><?php echo $detail['TenHP']; ?></td>
                    <td><?php echo $detail['SoTinChi']; ?></td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="3">Chưa có học phần nào được đăng ký.</td></tr>
            <?php endif; ?>
        </table>
        <a href="index.php?controller=dangky&action=display" class="back-link">Quay lại</a>
    </div>
</body>
</html>