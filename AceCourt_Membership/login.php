<?php
require 'db.php';

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // ✅ Step 1: Check if admin
    $stmt = $conn->prepare("SELECT * FROM ADMIN WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $adminResult = $stmt->get_result();

    if ($admin = $adminResult->fetch_assoc()) {
        // ✅ Admin login (uses phoneNum for demo password)
        if (password_verify($password, $admin['phoneNum'])) {
            $_SESSION['role'] = 'admin';
            $_SESSION['admin_id'] = $admin['adminId'];
            $_SESSION['email'] = $admin['email'];
            $_SESSION['user'] = $admin['fullName']; // ✅ Store admin name for navbar
            header("Location: dashboard_admin.php");
            exit();
        } else {
            $message = "Invalid password for admin.";
        }
    } else {
        // ✅ Step 2: Check if member
        $stmt = $conn->prepare("SELECT * FROM MEMBER WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $memberResult = $stmt->get_result();

        if ($member = $memberResult->fetch_assoc()) {
            if (password_verify($password, $member['password'])) {
                $_SESSION['role'] = 'member';
                $_SESSION['member_id'] = $member['memberId'];
                $_SESSION['email'] = $member['email'];
                $_SESSION['user'] = $member['fullName']; // ✅ Store member name for navbar
                header("Location: homepage.php");
                exit();
            } else {
                $message = "Incorrect password.";
            }
        } else {
            $message = "Email not found.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - Ace Court</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card p-4 mx-auto" style="max-width: 400px;">
        <h3 class="text-center">LOGIN FORM</h3>
        <form method="POST">
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" required class="form-control" placeholder="Enter your email address">
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" required class="form-control" placeholder="Enter your password">
            </div>
            <div class="mb-2">
                <a href="forgot_password.php">Forgot Password?</a>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
        <div class="mt-3 text-center">
            Don't have an account? <a href="signup.php">Sign up here</a>
        </div>
        <?php if ($message): ?>
            <div class="alert alert-warning mt-3"><?= $message ?></div>
        <?php endif; ?>
    </div>
</div>
</body>
</html>
