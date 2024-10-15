<?php
session_start(); 
$error = [];

if(isset($_POST['submit'])){
    $d_name = $_POST['d_name'];
    $email = $_POST['email']; 
    $b_name = $_POST['b_name'];
    $genre = $_POST['genre'];
    $quantity = $_POST['quantity'];

    // File upload handling
    $target_dir = "../image/"; // Updated path based on your folder structure
    $target_file = $target_dir . basename($_FILES["photo"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

     // Check if file already exists
    if (file_exists($target_file)) {
        $error[] = "Sorry, the file already exists.";
        $uploadOk = 0;
    }

    // Check if image file is an actual image or fake image
    $check = getimagesize($_FILES["photo"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        $error[] = "File is not an image.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["photo"]["size"] > 500000) {
        $error[] = "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow only certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $error[] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        $error[] = "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
            // File uploaded successfully, now insert data into the database
            $conn = mysqli_connect('localhost:3306','root','','s_project');

            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            //  $stmt = $conn->prepare("INSERT INTO donation(donor_name, donor_email, Book_name,image, genre,quantity)  VALUES (?, ?, ?, ?, ?, ?)");
            // $stmt->bind_param("sssisi",'$d_Sname', '$email',  '$b_name','$target_file', '$genre', '$quantity');

            $insert = "INSERT INTO donation (donor_name, donor_email, Book_name,image, genre,quantity) 
                    VALUES ('$d_name', '$email',  '$b_name','$target_file', '$genre', '$quantity')";

            if (mysqli_query($conn, $insert)) {
                header("location:admin_page.php");
                exit();
            } else {
                $error[] = 'Error inserting data: ' . mysqli_error($conn);
            }

            mysqli_close($conn);
        } else {
            $error[] = "Sorry, there was an error uploading your file.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Bookdonor</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
    <div class="Login">
       <form action="#" method="post" enctype="multipart/form-data">
            <h1>Add Bookdonor</h1>
            <?php
                if(isset($error)){
                    foreach($error as $err){
                        echo '<span class="error-msg">' . $err . '</span>';
                    }
                }
            ?>
            <input type="text" name="d_name" required placeholder="Enter donor name"><br><br>
            <input type="text" name="email" required placeholder="Enter email"><br><br>
             <input type="text" name="b_name" required placeholder="Enter book name"><br><br>
              <input type="file" name="photo" accept="image/*" required><br><br>
             <input type="text" name="genre" required placeholder="Enter genre"><br><br>
             <input type="text" name="quantity" required placeholder="Enter quantity"><br><br> 
             <input class="btn" type="submit" name="submit" value="ADD">
        
        </form>
    </div>
</body>
</html>