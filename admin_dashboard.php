<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Ensure session is started
}
if (!isset($_SESSION['email']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}
include 'nav_dashboard.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Ace Court - Admin Dashboard</title>
  <link rel="stylesheet" href="style.css">
  <style>
    body {
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }
    .content {
      flex: 1 0 auto;
    }
    footer {
      flex-shrink: 0;
    }
  </style>
</head>
<body>
<div class="content">
  <div class="container mt-5">
    <h1 class="text-center">ADMIN DASHBOARD</h1>
    <div class="d-flex flex-column align-items-center mt-4">
      <div class="card mb-3" style="width: 18rem;">
        <div class="card-body text-center">
          <h5 class="card-title">Member List</h5>
          <a href="member_list.php" class="btn btn-primary">View Members</a>
        </div>
      </div>
      <div class="card mb-3" style="width: 18rem;">
        <div class="card-body text-center">
          <h5 class="card-title">Booking List</h5>
          <a href="booking_list.php" class="btn btn-primary">View Bookings</a>
        </div>
      </div>
      <div class="card mb-3" style="width: 18rem;">
        <div class="card-body text-center">
          <h5 class="card-title">Court List</h5>
          <a href="court_list.php" class="btn btn-primary">View Courts</a>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include 'footer.php'; ?>
</body>
</html>
