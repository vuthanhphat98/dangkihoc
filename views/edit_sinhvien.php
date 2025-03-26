<!DOCTYPE html>
<html>
<head>
    <title>Sửa sinh viên</title>
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
        form {
            max-width: 500px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input, select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }
        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
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
        <h1>SỬA SINH VIÊN</h1>
        <form method="post" action="index.php?action=edit&id=<?php echo $sinhVien['MaSV']; ?>" enctype="multipart/form-data">
            <label>Mã SV:</label>
            <input type="text" name="maSV" value="<?php echo $sinhVien['MaSV']; ?>" readonly>
            
            <label>Họ Tên:</label>
            <input type="text" name="hoTen" value="<?php echo $sinhVien['HoTen']; ?>" required>
            
            <label>Giới Tính:</label>
            <select name="gioiTinh" required>
                <option value="Nam" <?php if ($sinhVien['GioiTinh'] == 'Nam') echo 'selected'; ?>>Nam</option>
                <option value="Nữ" <?php if ($sinhVien['GioiTinh'] == 'Nữ') echo 'selected'; ?>>Nữ</option>
            </select>
            
            <label>Ngày Sinh:</label>
            <input type="date" name="ngaySinh" value="<?php echo $sinhVien['NgaySinh']; ?>" required>
            
            <label>Hình:</label>
                           
            <img src="<?php echo $base_url . ($sinhVien['Hinh'] ?? '/Content/images/default.jpg'); ?>" width="50" alt="Hinh" onerror="this.src='<?php echo $base_url; ?>/Content/images/default.jpg';">
            <input type="file" name="hinh" accept="image/*">
            
            <label>Ngành Học:</label>
            <select name="maNganh" required>
                <option value="CNTT" <?php if ($sinhVien['MaNganh'] == 'CNTT') echo 'selected'; ?>>Công nghệ thông tin</option>
                <option value="QTKD" <?php if ($sinhVien['MaNganh'] == 'QTKD') echo 'selected'; ?>>Quản trị kinh doanh</option>
            </select>
            
            <button type="submit">Cập nhật</button>
        </form>
    </div>
</body>
</html>