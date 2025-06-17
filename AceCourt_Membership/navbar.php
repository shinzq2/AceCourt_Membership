<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Ensure session is started
}
?>

<!-- Load Bootstrap and Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg custom-navbar">
  <div class="container-fluid">
    
    <!-- Left: Logo -->
    <a class="navbar-brand d-flex align-items-center" href="homepage.php">
      <img src="image/ac_logo.png" class="logo" alt="AceCourt Logo">
      <span class="ms-2 brand-text">ace court</span>
    </a>

    <!-- Toggler for mobile -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Center: Navigation Links -->
    <div class="collapse navbar-collapse justify-content-center" id="navbarContent">
      <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="homeDropdown" role="button" data-bs-toggle="dropdown">
            Home
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#about">About Us</a></li>
            <li><a class="dropdown-item" href="#staff">Our Staff</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="membership.php">Membership</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="booking.php">Booking</a>
        </li>
      </ul>
    </div>

    <!-- User icon dropdown -->
<div class="dropdown">
  <a class="dropdown-toggle text-white" href="#" data-bs-toggle="dropdown">
    <img src="image/user_icon.png" class="user-img" alt="User Icon">
    <?php if (isset($_SESSION['user'])): ?>
      <span class="ms-2"><?= htmlspecialchars($_SESSION['user']) ?></span>
    <?php endif; ?>
  </a>
  <ul class="dropdown-menu dropdown-menu-end">
    <li><a class="dropdown-item" href="userProfile.php">User Profile</a></li>
    <?php if (isset($_SESSION['user'])): ?>
      <li><a class="dropdown-item" href="logout.php">Logout</a></li>
    <?php else: ?>
      <li><a class="dropdown-item" href="login.php">Login</a></li>
    <?php endif; ?>
  </ul>
</div>
    
  </div>
</nav>
