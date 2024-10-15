<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    text-align: cemter;
    margin: 20px auto;
    background-color: black;
}  

.heading h1{
    font-size: 50px;
    color: white;
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

 </style>
</head>
<body>
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
<br><br>
<p>The KEA Book Club Management System is an innovative platform designed to simplify and enhance the management of book clubs, whether they operate online or offline. This comprehensive system addresses the diverse needs of book enthusiasts by offering a seamless experience for organizing and participating in club activities. From selecting books and scheduling meetings to tracking reading progress and fostering community discussions, the KEA Book Club Management System ensures that every aspect of a book club is efficiently managed. Its user-friendly interface and robust features make it easy for members to engage, share insights, and deepen their love for reading. Whether you're a seasoned book club organizer or just starting, the KEA Book Club Management System is your perfect partner in creating a vibrant and interactive reading community.</p>       
 </div>
    </section>
</div>
<footer class="site-footer">
  <div class="footer-content">
    <p>Want to support our cause? Click below to donate a book!</p>
    <a href="donation.php" class="donate-button">Donate a Book</a>
  </div>
</footer>
</body>
</html>