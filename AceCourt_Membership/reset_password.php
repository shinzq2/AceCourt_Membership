<?php
require 'db.php';
$message = "";

if (isset($_GET['token']) && isset($_GET['type'])) {
    $token = $_GET['token'];
    $type = $_GET['type'];

    // Choose table
    $table = $type === 'admin' ? 'ADMIN' : 'MEMBER';
    $stmt = $conn->prepare("SELECT * FROM $table WHERE reset_token = ? AND token_expiry > NOW()");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $user = $stmt->get_result()->fetch_assoc();

    if (!$user) {
        $message = "Invalid or expired token.";
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $user) {
        $newPassword = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $stmt = $conn->prepare("UPDATE $table SET password = ?, reset_token = NULL, token_expiry = NULL WHERE reset_token = ?");
        $stmt->bind_param("ss", $newPassword, $token);

        if ($stmt->execute()) {
            $message = "Password successfully reset. <a href='login.php'>Login now</a>";
        } else {
            $message = "Error updating password.";
        }
    }
} else {
    $message = "Missing token.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2>Reset Password</h2>
    <?php if ($user && !$message): ?>
        <form method="POST">
            <div class="mb-3">
                <label>New Password</label>
                <input type="password" name="password" class="form-control" minlength="6" required>
            </div>
            <button class="btn btn-success">Reset Password</button>
        </form>
    <?php endif; ?>
    <?php if ($message) echo "<div class='mt-3 alert alert-info'>$message</div>"; ?>
</div>
</body>
</html>
