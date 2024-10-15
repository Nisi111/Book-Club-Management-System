<?php 
session_start();
$message="";
if (isset($_POST['submit'])) {
	$con = mysqli_connect('localhost:3306','root','','s_project') or die('unable to connect');
	$email_username = $_POST['email_username'];
	$password = $_POST['pass'];

	$sql = "SELECT * FROM admin WHERE
	email = '$email_username' OR admin_name = '$email_username'";

	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_assoc($result);
	$stored_pass=$row["password"];
	if ($password == $stored_pass) {
		if (is_array($row)) {
			$_SESSION['id'] = $row['admin_id'];
			$_SESSION['admin_name'] = $row['admin_name'];
		} 
	}
	else {
		$error[] = 'Wrong Email/Username or password!';
	}
} 

if (isset($_SESSION['id'])) {
	header("location:admin_page.php");
	exit();
}  
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login Page</title>
	<style type="text/css">

	.Login{
    background:rgba(255, 255, 255, 0.5);
    backdrop-filter: blur(10px);
   
    text-align: center;
    border: 4px solid transparent;
    border-width: 1px;
}
	section{
			display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    width: 100%;
    
    background-image: url('../image/admin.jpg');
    background-position: center;
    background-size: cover;
    background-attachment: fixed;
		}
	</style>
	
</head>
<body>
	<section>
	<div class="Login">
		<form action="#" method="post">
			<h1>Admin Login</h1>
			<?php
				if(isset($error)){
					foreach($error as $error){
						echo '<span class="error-msg">'.$error.'</span>';
					};
				};
			?>
			<label>Email / Username</label><br>
			<input type="text" name="email_username" required placeholder="Enter email or username"><br><br>
			<label>Password</label><br>
			<input type="password" name="pass" required placeholder="Enter password"><br><br>
			<input class="btn" type="submit" name="submit" value="Login">
		
		</form>
	</div>
	</section>
</body>
</html>