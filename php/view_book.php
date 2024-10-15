<?php
session_start();
if(!isset($_SESSION['admin_name'])){
   header('location:admin_logout.php');
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>hoorror</title>
	<style type="text/css">

.container{

    width:90%;
    height:auto;
    text-align: center;
  }

table{
  border-collapse: collapse;
}


a{
  font-size: 12px;
  text-decoration: none;
  color: white;
  background: darkblue;
  padding: 10px 15px;
  border-radius: 15px;
  margin: 2px;
}
a:hover{
  text-decoration: underline;
}
img{
  height: 100%;
  width: 100%;
}

.header {
    width: 100%;
    height: 60px;
    background: black;
    color: white;
    display: flex;
    align-items: center;
    padding: 0 10px;
}

.search-form {
    display: flex;
    align-items: center;
}

.search-input {
    padding: 5px;
}

.search-button {
    padding: 5px;
    background-color: darkblue;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-right: 1000px; 
}
  


</style>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
 
</head>
<body>
	
	

  <center>
<div class="header">
    <h1 style="margin-right: 20px;">BOOKS</h1>
    <form class='search-form' method='GET'>
        <input class='search-input' type='text' name='search' placeholder='Search by Book Name or Genre'>
        <button class='search-button' type='submit'>Search</button>
    </form>
    <a class="admlout" style="float:right;" href="admin_logout.php">Logout</a>
</div>
	<div class="container">
		<?php
			$con = mysqli_connect('localhost:3306', 'root', '', 's_project') or die('Unable to connect');

      
$search_query = isset($_GET['search']) ? mysqli_real_escape_string($con, $_GET['search']) : '';
            $sql = "SELECT book_id, book_name, description, author, stock, genre_name, book_url
                    FROM book
                    INNER JOIN genre ON book.genre_id = genre.genre_id
                    WHERE book_name LIKE '%$search_query%' OR genre_name LIKE '%$search_query%'";
        $result = mysqli_query($con, $sql);

			echo "<table border='1px solid black'>";
echo "<tr>";
          echo "<th style='width: 20px;'>ID</th>";
          echo "<th style='width: 40px; height: 60px'>Image</th>";
          echo "<th style='width: 200px;'>Name</th>";
          echo "<th style='width: 200px;'>Author</th>";
          echo "<th style='width: 400px;'>Description</th>";
           echo "<th style='width: 200px;'>Genre</th>";
           
           
          echo "<th style='width: 100px;'>Stock</th>";
           echo "<th style='width: 250px;'>Action</th>";
            
        echo "</tr>";
        
        if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
      
        echo "<tr>";
          echo "<td style='width: 20px;'>{$row['book_id']}</td>";
          echo "<td style='width: 40px; height: 60px'><img src='{$row['book_url']}'/></td>";
          echo "<td style='width: 200px;'>{$row['book_name']}</td>";
           echo "<td style='width: 200px;'>{$row['author']}</td>";
          echo "<td style='width: 400px;'>{$row['description']}</td>";
           echo "<td style='width: 200px;'>{$row['genre_name']}</td>";

          echo "<td style='width: 100px;'>{$row['stock']}</td>";
          echo "<td><a href='edit.php?book_id={$row['book_id']}'>Edit</a>
         <a href='delete.php?book_id={$row['book_id']}'</a>Delete</td>";
         //echo "<td><a href='javascript:void(0);' onclick='confirmRemove({$row['book_id']})'>Remove</td>"; 
        echo "</tr>";
      
    }
    echo "</table><br>";
    echo "<a href='admin_page.php' style='float: left;'>Go Back</a>";
} else {
    echo "Error in query: " . mysqli_error($con);
}

		?>

	</div>
	</center>
  <script>
        function confirmRemove(book_id) {
            var confirmDelete = confirm("Are you sure you want to remove this book?");
            if (confirmDelete) {
                window.location.href = "delete.php?book_id=" + book_id;
            }
        }
    </script>
	
</body>
</html>