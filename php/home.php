<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <style type="text/css">
    .body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0; 
    }
    section {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      width: 100%;
      background-position: center;
      background-size: cover;
      background-attachment: fixed;
    }
    section h1 {
      color: white;
    }
    .p {
      font-size: 50;
    }
    .nav-link-btn {
      text-decoration: none;
      background: crimson;
      color: white;
      border-radius: 5px;
      margin: 5px;
      padding: 5px 10px;
    }
    .nav-link-btn:hover {
      text-decoration: underline;
    }
    nav-item dropdown .dropdown-menu {
      color: blue;
    }
    .nav-link-btn {
      text-decoration: none;
      background: blue; 
      color: white;
      border-radius: 5px;
      margin: 5px;
      padding: 5px 10px;
    }
    .nav-link-btn:hover {
      text-decoration: underline;
    }
    .site-footer {
      background-color: black;
      color: white;
      text-align: center;
      padding: 20px;
    }
    .footer-content {
      max-width: 800px;
      margin: 0 auto;
    }
    .button-container {
      margin-top: 20px;
      padding: 10px;
      border: 2px solid #e74c3c;
      border-radius: 10px;
      display: inline-block;
      background-color: transparent;
    }
    .donate-button {
      display: inline-block;
      padding: 10px 20px;
      border: 2px solid blue;
      background-color: transparent;
      color: white;
      text-decoration: none;
      border-radius: 5px;
      font-weight: bold;
      transition: background-color 0.3s, color 0.3s;
    }
    .donate-button:hover {
      background-color: blue;
      color: white;
    }
    img {
      height: 650px;
    }
  </style>
  <title>KEA Book Club</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: black;">
  <div class="container-fluid">
    <p><a href="#" class="logo" style="font-size: 20px; color: white; text-decoration: none;">
      <ion-icon name="library-sharp"></ion-icon>KEABookClub
    </a></p>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" style="border: 1px solid white; color: white; border-radius: 5px; margin: 3px;" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="border: 1px solid white; color: white; border-radius: 5px; margin: 3px;" href="aboutus.php">About us</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" style="border: 1px solid white; color: white; border-radius: 5px; margin: 3px;" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Genre
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background: white;">
            <li><a class="dropdown-item" href="horror.php">Horror</a></li>
            <li><a class="dropdown-item" href="romance.php">Romance</a></li>
            <li><a class="dropdown-item" href="poem.php">Poem</a></li>
            <li><a class="dropdown-item" href="history.php">History</a></li>
            <li><a class="dropdown-item" href="biography.php">Biography</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="border: 1px solid white; color: white; border-radius: 5px; margin: 3px;" href="contactus.php">Contact us</a>
        </li>
        <?php if (isset($_SESSION['user_name']) && $_SESSION['user_name'] > 0): ?>
          <li class="nav-item">
            <a class="nav-link" style="border: 1px solid white; color:white; border-radius: 5px; margin: 3px;" href="port1.php">My Portfolio</a>
          </li>
        <?php endif; ?>
      </ul>
      <ul class="navbar-nav d-flex flex-row-reverse">
        <?php if (isset($_SESSION['user_name']) && $_SESSION['user_name'] > 0): ?>
          <li><a class="nav-link-btn" aria-current="page" href="user_logout.php">Logout</a></li>
          <li class="nav-item">
            <h3 style="color: white;">welcome <span><?php echo $_SESSION['user_name']; ?></span></h3>
          </li>
        <?php else: ?>
          <li><a class="nav-link-btn" aria-current="page" href="user_register.php">Register</a></li>
          <li><a class="nav-link-btn" aria-current="page" href="user_login.php">Login</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>

<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="../image/lib.jpeg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>KEA Book Club</h5>
        <p>"I think books are like people, in the sense that they’ll <br>
        turn up in your life when you most need them."<br>
        – Emma Thompson
        </p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="../image/lib4.jpeg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>KEA Book Club</h5>
        <p>"I think books are like people, in the sense that they’ll <br>
        turn up in your life when you most need them."<br>
        – Emma Thompson
        </p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="../image/lib2.jpeg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>KEA Book Club</h5>
        <p>"I think books are like people, in the sense that they’ll <br>
        turn up in your life when you most need them."<br>
        – Emma Thompson
        </p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
<footer class="site-footer">
  <div class="footer-content">
    <p>Want to support our cause? Click below to donate a book!</p>
    <a href="donation.php" class="donate-button">Donate a Book</a>
  </div>
</footer>
</html>