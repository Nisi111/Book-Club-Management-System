<?php 
$error = [];

if(isset($_POST['submit'])){
    $username = $_POST['uname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['pass'];
    $repassword = $_POST['repass'];
    $pattern = '/^(97|98)\d{8}$/';
    
    if (empty($username) || empty($email) || empty($phone) || empty($password) || empty($repassword) ) {
        $error[] = "Don't leave any field empty!";
    } elseif (!preg_match($pattern, $phone)) {
        $error[] = "Phone number must start from 98 or 97 and have 10 digits!";
    } elseif (!strlen($password) > 5) {
        $error[] = "Password must be more than 5!";
    } elseif (!preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $email)) {
        $error[] = "Please enter valid email!";
    }
    else {
        $conn = mysqli_connect('localhost:3306','root','','s_project');

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $username = mysqli_real_escape_string($conn, $username);
        $email = mysqli_real_escape_string($conn, $email);
        
        $select = "SELECT * FROM user WHERE email = '$email' ";
        $result = mysqli_query($conn, $select);

        if (!$result) {
            $error[] = 'Error querying database: ' . mysqli_error($conn);
        } else {
            if(mysqli_num_rows($result) > 0){
                $error[] = 'User already exists!';
            } else {
                if ($password != $repassword) {
                    $error[] = 'Passwords do not match!';
                } else {
                    // Hash the password using md5 
                    $hashed_password = md5($password);
                    $insert = "INSERT INTO user(user_name,email,phone,password) VALUES ('$username','$email','$phone','$hashed_password')";
                    if (mysqli_query($conn, $insert)) {
                        header("location:user_login.php");
                        exit();
                    } else {
                        $error[] = 'Error inserting data: ' . mysqli_error($conn);
                    }
                }
            }
        }
        mysqli_close($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register Page</title>
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
    
    background-image: url('../image/i.jpg');
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
            <h1>Register</h1>
            <?php
                if(isset($error)){
                    foreach($error as $err){
                        echo '<span class="error-msg">' . $err . '</span>';
                    }
                }
            ?>
            <!-- <label>User Name</label><br> -->
            <input type="text" name="uname" required placeholder="Enter your user name"><br><br>
            <!-- <label>Email</label><br> -->
            <input type="text" name="email" required placeholder="Enter your email"><br><br>
      
            <!-- <label>Phone</label><br> -->
            <input type="text" name="phone" required placeholder="Enter your phone"><br><br>
            <!-- <label>Password</label><br> -->
            <input type="password" name="pass" required placeholder="Create password"><br><br>
            <!-- <label>Confirm Password</label><br> -->
            <input type="password" name="repass" required placeholder="Re-enter your password"><br><br>
            <input class="btn" type="submit" name="submit" value="Register">
       
            <p>Already have an account? <a href="user_login.php">Login</a></p>
        </form>
    </div>
    </section>
</body>
</html>