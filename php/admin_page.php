
<?php

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:admin_login.php');
}

?>







<!DOCTYPE html>



<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
	 a{
	  text-decoration:none;
	   border-radius: 5px; 
	   background: darkblue;
	   color: white;
	   padding: 5px 10px;

	}

	h1{
		color: white;
	}
	a:hover{
		text-decoration: underline;

	}

	nav{
		background-color: black;
		height: 80px;

	}

	nav .a{
		float: left;
		text-align: center;
		padding: 14px 16px;
		color: white;
	}
	.admlout{
		float: right;
	}
	

	/*.sidebar {
            width: 200px;
            background-color: #f0f0f0;
            padding: 20px;
            text-decoration-color: white;
        }

        .sidebar a {
            display: block;
            margin-bottom: 10px;
            text-decoration: none;
            color: #333;
        }

        .sidebar a:hover {
            color: #555;*/

            .sidebar {
            width: 200px;
            background-color: #f0f0f0;
            padding: 20px;
        }

        .sidebar a {
            display: block;
            margin-bottom: 10px;
            text-decoration: none;
            color: white; /* Changing text color to white */
        }

        .sidebar a:hover {
            color: #ccc; /* Changing hover color */
        }

</style>
</head>
<body>
<center>
<div style="width: 100%; height: 60px; background: black; color: white;">
  <h1 style="float: left; margin-bottom: 30px;">Admin </h1>
  <h3 style="float: left; margin-left: 10px;">welcome <span><?php echo $_SESSION['admin_name'] ?></span></h3> 
  <a style="float: right; margin-right: 10px; margin-top: 10px;" class="admlout" href="admin_logout.php">Logout</a>
</div> 
</center>

<br><br>
 <div class="sidebar">

<a href="view_member.php" >View member</a><br><br>

<a href="view_book.php" >View book</a><br><br>

<a href="add_book.php" >Add book</a><br><br>

<a href="viewborrow.php" >Issue book</a><br><br>

<a href="adddonor.php" >Add Bookdonor</a><br><br>

<a href="view_donor.php" >Bookdonor</a><br><br>

<a href="add_genre.php" >Add genre</a><br><br>


</div>


</body>
</html>