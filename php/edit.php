<?php

session_start();

if (!isset($_SESSION['admin_name'])) {
    header('location:admin_logout.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $book_id = $_POST['book_id'];
    $book_name = $_POST['book_name'];
    $description = $_POST['description'];
    $stock = $_POST['stock'];
     $author = $_POST['author'];
    $genre_id = $_POST['genre_id'];


    $con = mysqli_connect('localhost:3306', 'root', '', 's_project') or die('Unable to connect');

    $sql = "UPDATE book SET book_name = '$book_name', description ='$description', stock = '$stock', author= '$author', genre_id = '$genre_id' WHERE book_id = '$book_id'";

    $result = mysqli_query($con, $sql);

    if ($result) {
        header('location: view_book.php');
        exit;
    } else {
        echo "Error updating " . mysqli_error($con);
    }

    mysqli_close($con);
}

if (isset($_GET['book_id'])) {
    $book_id = $_GET['book_id'];

    $con = mysqli_connect('localhost:3306', 'root', '', 's_project') or die('Unable to connect');

    $sql = "SELECT book_id, book_name, description, stock,author, genre_id
            FROM book
            WHERE book_id = '$book_id'";

    $result = mysqli_query($con, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "Error in query: " . mysqli_error($con);
    }

    mysqli_close($con);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update book</title>
</head>
<body>

    <h1>Update book</h1>

    <form method="post" action="">
        <input type="hidden" name="book_id" value="<?php echo $row['book_id']; ?>">
        
        <label for="product_name">book Name:</label>
        <input type="text" name="book_name" value="<?php echo $row['book_name']; ?>" required><br>

        <label for="price">description:</label>
        <input type="text" name="description" value="<?php echo $row['description']; ?>" required><br>

        <label for="stock">Stock:</label>
        <input type="text" name="stock" value="<?php echo $row['stock']; ?>" required><br>

         <label for="author">author:</label>
        <input type="text" name="author" value="<?php echo $row['author']; ?>" required><br>

        <label for="category_id">genre:</label>
        <input type="text" name="genre_id" value="<?php echo $row['genre_id']; ?>" required><br>


        <input type="submit" value="Edit">
    </form>

    <br>
    <a href='admin_page.php'>Back</a>

</body>
</html>