 <?php
	$conn = mysqli_connect('localhost:3306', 'root', '', 's_project');

	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}
	$book_id = $_GET['book_id'];

	$sql = "DELETE FROM book WHERE book_id='$book_id'";
	$result = mysqli_query($conn, $sql);

	if ($result) {
	    if (mysqli_affected_rows($conn) == 1) {
	        header('location: view_book.php');
	        exit;
	    } else {
	        echo "No records deleted.";
	    }
	} else {
	    echo "Error: " . mysqli_error($conn);
	}

	mysqli_close($conn);
?> 