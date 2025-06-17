<?php
session_start();
include 'navbar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Ace Court - Home</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- HERO SECTION (Carousel) -->
<div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
  <!-- Indicators -->
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
    <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
    <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="3"></button>
  </div>

  <!-- Carousel Images -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="image/ac_page.jpg" class="d-block w-100 hero-img" alt="Hero 1">
      <div class="carousel-caption d-block text-center">
        <h2>Welcome to AceCourt</h2>
        <p>Your premier destination for indoor and outdoor court bookings</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="image/ac_page2.jpg" class="d-block w-100 hero-img" alt="Hero 2">
      <div class="carousel-caption d-block text-center">
        <h2>Book Courts with Ease</h2>
        <p>Simple, fast, and reliable court booking experience</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="image/ac_page3.jpg" class="d-block w-100 hero-img" alt="Hero 3">
      <div class="carousel-caption d-block text-center">
        <h2>Indoor & Outdoor Excellence</h2>
        <p>Perfect courts for every match and training session</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="image/ac_pageL.jpg" class="d-block w-100 hero-img" alt="Hero 4">
      <div class="carousel-caption d-block text-center">
        <h2>Join Our Membership</h2>
        <p>Enjoy exclusive benefits and discounts</p>
      </div>
    </div>
  </div>

  <!-- Controls -->
  <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>


<!-- ABOUT US -->
<section id="about" class="section">
  <div class="container">
    <h2 class="text-center mb-4">About Us</h2>
    <p class="text-center">
      Ace Court isn't just a pickleball court — it's a lifestyle destination for those who demand excellence, both on and off court.
    </p>
  </div>
</section>

<!-- OUR COURT -->
<section class="section court-section">
  <div class="container">
    <h2 class="text-center mb-4">Our Court</h2>

    <!-- Indoor Courts -->
    <h4 class="mt-4 text-center">Indoor</h4>
    <div class="row g-4 justify-content-center">
      <div class="col-md-3 text-center">
        <img src="image/indoor_courtA.png" class="img-fluid court-img" alt="Indoor Court A"
             data-bs-toggle="modal" data-bs-target="#modalCourtA">
        <p class="court-caption">Indoor Court A - Shared</p>
      </div>
      <div class="col-md-3 text-center">
        <img src="image/indoor_courtB.png" class="img-fluid court-img" alt="Indoor Court B"
             data-bs-toggle="modal" data-bs-target="#modalCourtB">
        <p class="court-caption">Indoor Court B - Private</p>
      </div>
    </div>

    <!-- Outdoor Courts -->
    <h4 class="mt-5 text-center">Outdoor</h4>
    <div class="row g-4 justify-content-center">
      <div class="col-md-3 text-center">
        <img src="image/outdoor_courtB.jpg" class="img-fluid court-img" alt="Outdoor Court A"
             data-bs-toggle="modal" data-bs-target="#modalCourtC">
        <p class="court-caption">Outdoor Court A - Shared</p>
      </div>
      <div class="col-md-3 text-center">
        <img src="image/outdoor_courtA.jpg" class="img-fluid court-img" alt="Outdoor Court D"
             data-bs-toggle="modal" data-bs-target="#modalCourtD">
        <p class="court-caption">Outdoor Court B - Private</p>
      </div>
    </div>
  </div>
  <!-- Modals -->
<div class="modal fade" id="modalCourtA" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content bg-light">
      <div class="modal-body text-center">
        <img src="image/indoor_courtA.png" class="img-fluid" alt="Court A">
        <p class="mt-2">Indoor Court A - Shared</p>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalCourtB" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content bg-light">
      <div class="modal-body text-center">
        <img src="image/indoor_courtB.png" class="img-fluid" alt="Court B">
        <p class="mt-2">Indoor Court B - Private</p>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalCourtC" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content bg-light">
      <div class="modal-body text-center">
        <img src="image/outdoor_courtA.jpg" class="img-fluid" alt="Court C">
        <p class="mt-2">Outdoor Court A - Shared</p>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalCourtD" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content bg-light">
      <div class="modal-body text-center">
        <img src="image/outdoor_courtB.jpg" class="img-fluid" alt="Court D">
        <p class="mt-2">Outdoor Court B - Private</p>
      </div>
    </div>
  </div>
</div>

</section>

<!-- OUR STAFF -->
<section id="staff" class="section staff-section">
  <div class="container">
    <h2 class="text-center mb-4">Our Staff</h2>
    <div class="row justify-content-center">
      <?php
      $staff = [
        ['img' => 'Staff1.jpg', 'name' => 'Adriana Aqilah'],
        ['img' => 'Staff2.jpg', 'name' => 'Kaazhim Nur Karim'],
        ['img' => 'user.jpg', 'name' => 'Nur Aqila'],
        ['img' => 'user.jpg', 'name' => 'Nurul Zawanah'],
        ['img' => 'Staff5.jpg', 'name' => 'Siti Nur Zuhairah']
      ];
      foreach ($staff as $person): ?>
        <div class="col-md-2 text-center">
          <img src="image/<?= $person['img'] ?>" class="staff-img" alt="<?= $person['name'] ?>">
          <p class="staff-name"><?= $person['name'] ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
</body>
</html>
<?php include 'footer.php'; ?>
