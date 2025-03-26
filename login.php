<?php
session_start(); // Khởi tạo session

// Kết nối cơ sở dữ liệu
try {
    $db = new PDO('mysql:host=localhost;dbname=Test1', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Kết nối thất bại: " . $e->getMessage());
}

// Xử lý đăng nhập
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $MaSV = $_POST['MaSV'] ?? '';

    // Kiểm tra MaSV trong cơ sở dữ liệu
    $stmt = $db->prepare("SELECT * FROM users WHERE MaSV = ?");
    $stmt->execute([$MaSV]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Lưu MaSV vào session
        $_SESSION['MaSV'] = $user['MaSV'];
        header("Location: index.php"); // Chuyển hướng sau khi đăng nhập thành công
        exit;
    } else {
        $error = "Mã Sinh Viên không tồn tại!";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
        }
        .login-container {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 300px;
        }
        .login-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .login-container input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 3px;
            box-sizing: border-box;
        }
        .login-container button {
            width: 100%;
            padding: 10px;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        .login-container button:hover {
            background-color: #555;
        }
        .error {
            color: red;
            text-align: center;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Đăng Nhập</h2>
        <?php if (isset($error)): ?>
            <p class="error"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>
        <form method="POST" action="login.php">
            <input type="text" name="MaSV" placeholder="Mã Sinh Viên" required>
            <button type="submit">Đăng Nhập</button>
        </form>
    </div>
</body>
</html>