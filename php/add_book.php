<?php 
session_start(); // Start the session to manage login state
$error = [];

if (isset($_POST['submit'])) {
    // Retrieve and sanitize user inputs
    $b_name = trim($_POST['bname']);
    $descri = trim($_POST['description']);
    $stock = trim($_POST['stock']);
    $author = trim($_POST['author']);
    $genre = trim($_POST['genre']);
    
    // File upload handling
    $target_dir = "../image/"; // Ensure this directory exists
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
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        $error[] = "File is not an image.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["photo"]["size"] > 500000) { // 500KB limit
        $error[] = "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow only certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $error[] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        $error[] = "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
            // File uploaded successfully, now insert data into the database
            $conn = new mysqli('localhost:3306', 'root', '', 's_project');

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Use prepared statements to prevent SQL injection
            $stmt = $conn->prepare("INSERT INTO book (book_name, description, book_url, stock, author, genre_id) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssisi", $b_name, $descri, $target_file, $stock, $author, $genre);

            if ($stmt->execute()) {
                header("Location: admin_page.php");
                exit();
            } else {
                $error[] = 'Error inserting data: ' . $stmt->error;
            }

            $stmt->close();
            $conn->close();
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
    <title>Add</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
    <div class="Login">
        <form action="#" method="post" enctype="multipart/form-data">
            <h1>Register</h1>
            <?php
                if (!empty($error)) {
                    foreach ($error as $err) {
                        echo '<span class="error-msg">' . htmlspecialchars($err) . '</span><br>';
                    }
                }
            ?>
            <input type="text" name="bname" required placeholder="Enter your book name"><br><br>
            <input type="text" name="description" required placeholder="Enter description"><br><br>
            <input type="file" name="photo" accept="image/*" required><br><br>
            <input type="text" name="author" required placeholder="Enter author"><br><br>
            <input type="text" name="stock" required placeholder="Enter stock"><br><br>
            <select name="genre" required>
                <option value="">Choose Genre</option>
                <option value="1">Horror</option>
                <option value="2">Poem</option>
                <option value="3">Romance</option>
                <option value="4">Biography</option>
                <option value="5">History</option>
            </select><br><br>
            <input class="btn" type="submit" name="submit" value="ADD">
        </form>
    </div>
</body>
</html>