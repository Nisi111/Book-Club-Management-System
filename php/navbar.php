<?php
  session_start();
?>



<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <style type="text/css">
    .nav-link-btn{
      text-decoration: none;
      background: darkblue;
      color: white;
      border-radius: 5px;
      margin: 5px;
      padding: 5px 10px;
    }
    .nav-link-btn:hover{
      text-decoration: underline;
    }
  </style>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light" style="background-color:black ;">
  <div class="container-fluid">
    <p > <a href="#" class="logo" style="font-size: 20px; color: white; text-decoration:none ;">

           <ion-icon name="library-sharp"></ion-icon>KEABookClub</a></p>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" style="border: 1px solid white; color: white; border-radius: 5px; margin: 3px;" aria-current="page"  href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="border: 1px solid white; color: white; border-radius: 5px; margin: 3px;" href="aboutus.php" >About us</a>
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
          <a class="nav-link" style="border: 1px solid white; color:white; border-radius: 5px; margin: 3px;" href="contactus.php" >Contact us</a>
        </li>
         <li class="nav-item">
          <a class="nav-link" style="border: 1px solid white; color:white; border-radius: 5px; margin: 3px;" href="portfolio.php" >My Portfolio</a>
        </li>
        
      </ul>
      
       
      <ul class="navbar-nav d-flex flex-row-reverse">
              
              
          <?php if (isset($_SESSION['user_name']) && $_SESSION['user_name'] > 0): ?>
                  <li><a class="nav-link-btn" aria-current="page" href="user_logout.php">Logout</a></li>
                  <li class="nav-item">
                  <h3 style="color:white;">welcome <span><?php echo $_SESSION['user_name'] ?></span></h3>
                </li>
              <?php else: ?>
                  <li><a class="nav-link-btn" aria-current="page" href="user_register.php">Register</a></li>
                  <li><a class="nav-link-btn" aria-current="page" href="user_login.php">Login</a></li>

              <?php endif; ?>
            </ul>
    </div>
  </div>
</nav>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>