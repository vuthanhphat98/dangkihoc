<!DOCTYPE html>
<html>
<head>
    <title>Thêm sinh viên</title>
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
    <div class="navbar">
        <a href="index.php">Test1</a>
        <a href="index.php?controller=sinhvien&action=display">Sinh Viên</a>
        <a href="index.php?controller=dangky&action=display">Học Phần</a>
        <a href="index.php?controller=dangky&action=detail&maSV=0123456789">Đăng Ký</a>
        <a href="login.php">Đăng Nhập</a>
    </div>

    <div class="container">
        <h1>THÊM SINH VIÊN</h1>
        <form method="post" action="index.php?action=add" enctype="multipart/form-data">
            <label>Mã SV:</label>
            <input type="text" name="maSV" required>
            
            <label>Họ Tên:</label>
            <input type="text" name="hoTen" required>
            
            <label>Giới Tính:</label>
            <select name="gioiTinh" required>
                <option value="Nam">Nam</option>
                <option value="Nữ">Nữ</option>
            </select>
            
            <label>Ngày Sinh:</label>
            <input type="date" name="ngaySinh" required>
            
            <label>Hình:</label>
            <input type="file" name="hinh" accept="image/*">
            
            <label>Ngành Học:</label>
            <select name="maNganh" required>
                <option value="CNTT">Công nghệ thông tin</option>
                <option value="QTKD">Quản trị kinh doanh</option>
            </select>
            
            <button type="submit">Thêm</button>
        </form>
    </div>
</body>
</html>