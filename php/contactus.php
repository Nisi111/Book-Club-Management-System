<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>

 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
	<style type="text/css">
		#social-media
{  
	background: white;
	//padding: 100px 0;
	font-weight: 200px;
	height: 0px;
	width: 100%;
}
#social-media p{
	font-size:30px;
	font-weight: 100;
	margin-bottom: 30px;
	text-align: center;
}
.social-icons{
	height: 10vh;
	display: flex;
	justify-content: center;
	align-items: center;

}
 .social-icons a{
	height: 100px;
	width: 100px;
	background-color:lavander;
	border-radius: 50px;
	margin: 10px;
	line-height: 120px;
	box-shadow: 1px 4px 2px 2px blue;
}
 a i{
 transition: all 0.3s linear;
}
 a:hover i{
	transform: scale(1.4);
}
.fa-facebook{
	color: blue;
}
.fa-instagram{
	color: red;
}
.fa-twitter{
	color:royalblue;

}
#footer{
	/-------------footer section--------/
 background : lavender;
}
.footer-box{
	padding: 20px;
}
.footer-box .fa{
	margin-right: 8px;
	font-size: 25px;
	height: 40px;
	width: 40px;
	text-align: center;
	padding-top:7px ;
	border-radius: 2px;
	background color: darkred;
}
contactForm{
	width: 20%;
	padding: 30px;
}
.contactForm h2{
	font-size: 30px;
	color: Black;
	font-weight: 300;

}
.contactForm .inputBox{
	position: relative;
	width: 100%;
	margin-top:10px ;
}
.contactForm .inputBox input,
.contactForm .inputBox textarea{
	width: 60%;
	padding: 5px 0;
	font-size: 16px;
	margin:10px 0 ;
	border: none;
	border-bottom: 2px solid #333;
	outline: none;
	resize: none;
}
.contactForm .inputBox span{
	position: absolute;
	left: 0;
	padding: 5px 0;
	font-size: 15px;
	margin: 10px 0;
	pointer-events: none;
	transition: 0.5s;
	color: green;
}
.contactForm .inputBox input:focus ~ span,
.contactForm .inputBox input:valid ~ span,
.contactForm .inputBox textarea:focus ~ span,
.contactForm .inputBox textarea:valid ~ span
{
	color:red;
	font-size: 10px;
	transform: translativeY(-10px);

}
.contactForm .inputBox input[type="submit"]{
width: 100px;
background:peachpuff;
color: white;
border: noone;
cursor:pointer;
padding: 10px;
font-size: 18px;
}


#map{
       	width: 100%;
        height: 700px;
            border: 0;
}
	</style>

</head>
<body>
	
   <section id="social-media">
    <div class="container text-center">
   <p>Find us on social media</p> 
 
    <div class="social-icons">
    	<a href="https://www.facebook.com"><i class="fa-brands fa-3x fa-facebook"></i></a>
    	<a href="https://www.instagram.com"><i class="fa-brands fa-3x fa-instagram"></i></a>
    	<a href="https://www.twitter.com"><i class="fa-brands fa-3x fa-twitter"></i></a>
     </div>
     </div>
     </section>
     <!--------footer section--------->
     <section id="footer">
     	<div class="container">
     		<div class="row">
    		<div class="col-md-4 footer-box">
    			<p><b>Location Details</b></p>
    			<p><i class="fa-solid fa-location-dot"></i>libali, Bhaktapur</p>
    			<p><i class="fa-light fa-phone"></i>9811234567,9866201999</p>
    			<p><i class="fa-light fa-envelope"></i>keabookclub@gmail.com</p>
    			
    				</div>
    				  
               
    			</div>
    		</div>

    <div id="map-container" class="map">       
            <iframe 
            id="map"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3533.5052887527722!2d85.43822452492176!3d27.67077372710458!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb0552b71692f7%3A0x9723fe61bf96a6fd!2sKhwopring%20English%20Secondary%20School!5e0!3m2!1sen!2snp!4v1714991635940!5m2!1sen!2snp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" allowfullscreen></iframe>"
           
        
    </div>
    </section>
    </body>
</html>