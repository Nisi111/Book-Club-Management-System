<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>hoorror</title>
	<style type="text/css">
		*{
			font-family: 'Poppins', sans-serif;
		}
		.container{
			width: 100%;
			height: auto;
		}
		.item{
			height:250px;
			width: 95%;
			background: skyblue;
			border-radius: 15px;
			margin-top: 5px;
			
		}
		.item img{
			float: left;
			height: 250px;
			border-radius: 15px;
			margin-right: 15px;
			width: 160px;
		}
		.item h2{
			float: left;

		}
		.item p{
			font-size: 17px;
			text-align: left;
		}
		.item a{ 
			text-decoration: none;
			color: white;
			background: darkblue;
			padding: 10px 15px;
			border-radius: 5px;
			float: left;
		}
		.item a:hover{
			text-decoration: underline;
		}
		
	</style>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
 
</head>
<body>
	
<?php @include 'navbar.php' ?>
	<center>
	<div class="container">
		<?php
			$con = mysqli_connect('localhost:3306', 'root', '', 's_project') or die('Unable to connect');

			$sql = "SELECT * FROM book where genre_id=2";
			$result = mysqli_query($con, $sql);

			if ($result) {
			    while ($row = mysqli_fetch_assoc($result)) {
			        echo "<div class='item'>";
			        echo "<img src='{$row['book_url']}'/>";
			        echo "<h2>{$row['book_name']}</h2><br><br><br>";
			        echo "<p>{$row['description']}</p>";
			        if($row['stock']>0){
			        echo "<p>Stock: {$row['stock']}</p>";
			        echo "<a href='borrow1.php?book_id={$row['book_id']}'>Borrow </a>";
			    }else{
			    	echo "<p>Out of Stock</p>";
			    }

			        echo "</div>";
			    }
			} else {
			    echo "Error in query: " . mysqli_error($con);
			}
		?>

	</div>
	</center>
	
</body>
</html>