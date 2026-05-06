<?php
session_start();
include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM admin_users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION["admin_logged_in"] = true;
        $_SESSION["admin_username"] = $username;
        header("Location: admin/dashboard.php");
        exit;
    } else {
        $error = "Sai tài khoản hoặc mật khẩu";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Đăng nhập admin</title>
  <style>
    body{
      font-family: Arial, sans-serif;
      background:#f5f5f5;
      display:flex;
      justify-content:center;
      align-items:center;
      height:100vh;
    }
    .login-box{
      width:360px;
      background:#fff;
      padding:30px;
      border-radius:12px;
      box-shadow:0 8px 24px rgba(0,0,0,0.08);
    }
    h2{
      text-align:center;
      margin-bottom:20px;
    }
    input{
      width:100%;
      padding:12px;
      margin-bottom:15px;
      border:1px solid #ddd;
      border-radius:8px;
      box-sizing:border-box;
    }
    button{
      width:100%;
      padding:12px;
      background:#f15d30;
      color:white;
      border:none;
      border-radius:8px;
      font-size:16px;
      cursor:pointer;
    }
    .error{
      color:red;
      margin-bottom:15px;
      text-align:center;
    }
  </style>
</head>
<body>
  <div class="login-box">
    <h2>ĐĂNG NHẬP QUẢN TRỊ</h2>

    <?php if(isset($error)) { ?>
      <div class="error"><?php echo $error; ?></div>
    <?php } ?>

    <form method="POST">
      <input type="text" name="username" placeholder="Tên đăng nhập" required>
      <input type="password" name="password" placeholder="Mật khẩu" required>
      <button type="submit">Đăng nhập</button>
    </form>
  </div>
</body>
</html>