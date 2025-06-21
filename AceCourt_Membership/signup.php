<?php
require 'db.php';
$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullName = $_POST['fullName'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phoneNum = $_POST['phoneNum'];

    $stmt = $conn->prepare("INSERT INTO MEMBER (fullName, password, gender, email, phoneNum) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $fullName, $password, $gender, $email, $phoneNum);

    if ($stmt->execute()) {
        $message = "Account created successfully! Redirecting to login…";
        header("refresh:3;url=login.php");
    } else {
        $message = "Error: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2>Register</h2>
    <form method="POST">
        <div class="mb-3">
            <label>Full Name</label>
            <input type="text" name="fullName" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" minlength="6" required>
        </div>
        <div class="mb-3">
            <label>Gender</label>
            <select name="gender" class="form-select" required>
                <option value="">Select...</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required pattern="[^@]+@[^\.]+\..+">
        </div>
        <div class="mb-3">
            <label>Phone Number</label>
            <input type="text" name="phoneNum" class="form-control" required>
        </div>
        <button class="btn btn-primary" type="submit">Register</button>

        <?php if ($message): ?>
            <div class="alert alert-info mt-3"><?= $message ?></div>
        <?php endif; ?>
    </form>
</div>
</body>
</html>
