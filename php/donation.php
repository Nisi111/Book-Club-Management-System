

 <?php 
$error = [];

if(isset($_POST['submit'])){
    $donor_name = $_POST['dname'];
    $donor_email = $_POST['email'];
    $book_name = $_POST['bname']; 
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

            $insert = "INSERT INTO donation (donor_name, donor_email,book_name, Image, genre,quantity) 
                       VALUES ('$donor_name', '$donor_email', '$book_name',' $target_file', '$genre', '$quantity')";

            if (mysqli_query($conn, $insert)) {
                header("location:home.php");
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book Donation Form</title>
    <link rel="stylesheet" type="text/css" href="styles.css"> <!-- Link to your CSS file -->
    <style type="text/css">
        /* styles.css */
body {
    font-family: Arial, sans-serif;
    background-color: #f9f9f9;
    margin: 0;
    padding: 0;
}

.container {
    width: 50%;
    margin: 50px auto;
    padding: 20px;
    background-color: white;
    border: 1px solid #ccc;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
    color: #333;
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    font-weight: bold;
    color: #333;
}

.form-control {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
}

.form-control:focus {
    border-color: #66afe9;
    outline: none;
}

.btn {
    padding: 10px 20px;
    font-size: 16px;
    border: none;
    border-radius: 5px;
    color: white;
    background-color: #007bff;
    cursor: pointer;
}

.btn:hover {
    background-color: #0056b3;
}

    </style>
<body>
</head>

    <div class="container">
        
        <form action="#" method="POST" enctype="multipart/form-data"> 
            <h2>Book Donation Form</h2>
            <div class="form-group">
                <label for="donor_name">Donor Name:</label>
                <input type="text" class="form-control" id="donor_name" name="dname" required>
            </div>
            <div class="form-group">
                <label for="donor_email">Donor Email:</label>
                <input type="email" class="form-control" id="donor_email" name="email" required>
            </div>
            <div class="form-group">
                <label for="book_name">Book Name:</label>
                <input type="text" class="form-control" id="book_name" name="bname" required>
            </div>
             <div class="form-group">
                <label for="book_image">Book Photo:</label>
                <input type="file" class="form-control" id="book_image" name="photo" accept="image/*" required>
            </div>
            <div class="form-group">
                <label for="genre">Genre:</label>
                <input type="text" class="form-control" id="genre" name="genre" required>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" class="form-control" id="quantity" name="quantity"  required>
            </div>
            <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
            <input type="submit" name="submit" class="btn" value="Submit">
        </form>
    </div>
</body>
</html>