<?php 
$error = [];

if(isset($_POST['submit'])){
    $g_name = $_POST['gname'];
    
    if (empty($g_name)) {
        $error[] = "Don't leave any field empty!";
    } else {
        $conn = mysqli_connect('localhost:3306','root','','s_project');

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
           
            $insert = "INSERT INTO genre(genre_name) VALUES ('$g_name')";
            if (mysqli_query($conn, $insert)) {
                header("location:admin_page.php");
                exit();
            } else {
                $error[] = 'Error inserting data: ' . mysqli_error($conn);
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
    <title>Add products</title>
    <link rel="stylesheet" type="text/css" href="../css/main.css">
</head>
<body>
    <div class="Login">
        <form action="#" method="post">
            <h1>Add Genre</h1>
            <?php
                if(isset($error)){
                    foreach($error as $err){
                        echo '<span class="error-msg">' . $err . '</span>';
                    }
                }
            ?>
            <label>Genre</label>
            <input type="text" name="gname" required placeholder="Enter genre name"><br><br>
            <input class="btn" type="submit" name="submit" value="ADD">
        
        </form>
    </div>
</body>
</html>