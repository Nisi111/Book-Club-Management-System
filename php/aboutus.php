<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>About Us</title>
    <style type="text/css">
*{
    margin: 0px;
    padding: 0px;
    box-sizing: border-box;
    font-family: 'Robot', sans-serif;
      } 

body{
    background-color: #f2f2f2;
} 
.heading{
    width: 90%;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    text-align: cemter;
    margin: 20px auto;
  
}  

.heading h1{
    font-size: 50px;
    color: black;
    margin-bottom: 25px;
    position: relative;
} 

.heading h1::after{
    content: "";
    position: absolute;
    width: 100%;
    height: 4px;
    display: block;
    margin: 0 auto;
    background-color: blue;
} 
.heading p{
    font-size: 18px;
    color: #666;
    margin-bottom: 35px;
} 
.container{
    width: 90%;
    margin: 0 auto;
    padding: 10px 20px;
} 
.about{
  display: flex;
  justify-content: space-between;
  align-items: center;
  flex-wrap: wrap;
   
}

.about-image{
    flex: 1;
    margin-right: 40px;
    overflow: hidden;
}
.about-image img{
  max-width: 100%;
  height: auto;
  display: block;
  transition: 0.5s ease;

}
.about-image:hover img{
    transform: scale(1.2);
}
.about-content{
    flex: 1;
}
.about-content h2{
    font-size: 23px;
    margin-bottom: 15px;
    color: #333;
}

.about-content p{
    font-size: 18px;
    line-height: 1.5;
    color: #666;
}

.about-content .read-more{
    display: inline-block;
    padding: 10px 20px;
    background-color: blue;
    color: #fff;
    font-size: 19px;
    text-decoration: none;
    border-radius: 25px;
    margin-top: 15px;
    transition: 0.3s ease;
}

.about-content .read-more:hover{
  background-color: #3e8e41;

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
@media screen and (max-width:768px){
    .heading{
        padding: 0px 20px;
    }
    .heading h1{
        font-size: 36px;
    }
    .heading p{
        font-size: 17px;
        margin-bottom: 0px;
    }
    .container{
        padding: 0px;
    }
    .about{
        padding: 20px;
        flex-direction: column;
    }
    .about-image{
        margin-right: 0px;
        margin-bottom: 20px;
    }
    .about-content p{
        padding: 0px;
        font-size: 16px;
    }
    .about-content .read-more{
        font-size: 16px;
    }
}

 </style>
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
<div class="heading">
    <h1>About Us</h1>
    <p1>KEA Book Club Management System is a comprehensive solution designed to streamline the operations of book clubs, both online and offline. Our system caters to the diverse needs of book enthusiasts, ensuring a seamless experience for managing club activities, from book selection to member engagement.</p1>
</div>
<div class="container">
    <section class="about">
        <div class="about-image">
            <img src="../image/about us.jpg">
            <img src="../image/i.jpg">
        </div>
        <div class="about-content">
          <h2>Our Vision</h2>
<p>At KEA Book Club Management System, our vision is to foster a love for reading and literature by providing an innovative and user-friendly platform for book clubs. We aim to bring together readers from all walks of life, enhancing their literary experiences through technology and community engagement.
<br>
Our Mission
Our mission is to simplify book club management and enhance the reading experience by offering a robust platform that supports both online and offline interactions. We strive to create a space where book lovers can easily organize, discuss, and share their passion for books.
<br> <br>

<h2>Key Features</h2>
<p>Online and Offline Accessibility**: Our system is accessible both online and offline, ensuring that members can participate and manage club activities regardless of their internet connectivity.
 <br> <br>
User-Friendly Interface: Designed with ease of use in mind, our interface allows for effortless navigation and management of book club activities.
  <br> <br>

Comprehensive Management Tools: From tracking reading progress to organizing meetings and discussions, our tools cover every aspect of book club management.
  <br> <br>

Community Engagement: Foster a sense of community with features that allow for discussions, reviews, and recommendations among members.
  <br> <br>

Customizable Options: Tailor the system to fit the unique needs of your book club with customizable settings and features.</p>


<h2>Our Commitment</h2>
<p>We are committed to continuous improvement and innovation, ensuring that our platform evolves with the changing needs of book clubs. Our dedicated support team is always available to assist with any questions or issues, providing a reliable and responsive service to our users.</p>

 <h2>Join Us</h2>
<p>Whether you're a seasoned book club organizer or starting a new group, KEA Book Club Management System is here to support you. Join us and take your book club experience to the next level with our cutting-edge management solution. Embrace the joy of reading and community with KEA Book Club Management System. </p> 
<a href="readmore.php" class="read-more">Read More</a>
        </div>
    </section>
</div>
</body>
</html>