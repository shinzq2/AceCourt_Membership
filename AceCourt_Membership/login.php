<?php
session_start();
require 'db.php';

$message = "";

// 5 hardcoded admin accounts
$admin = [
    'adriana1@acestaff.com' => '123456',
    'kaazhim2@acestaff.com' => '123456',
    'aqila3@acestaff.com' => '123456',
    'zawanah4@acestaff.com' => '123456',
    'zuhairah5@acestaff.com' => '123456'
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    // First, check admin login
    if (isset($admin[$email])) {
        if ($admin[$email] === $password) {
            $_SESSION["role"] = "admin";
            $_SESSION["email"] = $email;
            header("Location: admin_dashboard.php");
            exit();
        } else {
            $message = "Invalid password for admin.";
        }
    } else {
        // Check member login from database
        $stmt = $conn->prepare("SELECT * FROM MEMBER WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($user = $result->fetch_assoc()) {
            if (password_verify($password, $user["password"])) {
                $_SESSION["role"] = "member";
                $_SESSION["email"] = $user["email"];
                $_SESSION["memberId"] = $user["memberId"];
                $_SESSION["fullName"] = $user["fullName"];
                header("Location: homepage.php");
                exit();
            } else {
                $message = "Invalid password for member.";
            }
        } else {
            $message = "Email not found.";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login - Ace Court</title>
  <link rel="stylesheet" href="styles.css">
  <style>
    body {
        background-color: #d9e4ff;
        font-family: Arial, sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }
    .login-container {
        background: white;
        padding: 30px 40px;
        border-radius: 12px;
        box-shadow: 0 8px 16px rgba(0,0,0,0.1);
        width: 100%;
        max-width: 400px;
        text-align: center;
    }
    .login-container h2 {
        margin-bottom: 20px;
        font-size: 28px;
        color: #333;
    }
    .login-container label {
        display: block;
        margin-bottom: 8px;
        text-align: left;
        font-weight: bold;
        color: #333;
    }
    .login-container input[type="email"],
    .login-container input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 16px;
    }
    .login-container button {
        background-color: #27548A;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 6px;
        font-size: 16px;
        cursor: pointer;
        width: 100%;
    }
    .login-container button:hover {
        background-color: #183B4E;
    }
    .login-container a {
        display: block;
        margin-top: 12px;
        color: #27548A;
        text-decoration: none;
        font-weight: bold;
    }
    .error-message {
        color: red;
        margin-bottom: 10px;
    }
  </style>
</head>
<body>
<div class="login-container">
    <h2>Login</h2>

    <?php if (!empty($message)): ?>
        <p class="error-message"><?= $message ?></p>
    <?php endif; ?>

    <form method="post">
        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <label for="password">Password:</label>
        <input type="password" name="password" required>

        <button type="submit">Login</button>
    </form>

    <a href="forgot_password.php">Forgot Password?</a>
    <a href="signup.php">Don't have an account? Register</a>
</div>
</body>
</html>
