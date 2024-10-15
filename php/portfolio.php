<?php
session_start();
if (!isset($_SESSION['user_name'])) {
    header('location:user_logout.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Portfolio</title>
    <style type="text/css">
        .container {
            width: 90%;
            height: auto;
            text-align: center;
        }

        table {
            border-collapse: collapse;
        }

        a {
            font-size: 12px;
            text-decoration: none;
            color: white;
            background: darkblue;
            padding: 10px 15px;
            border-radius: 15px;
            margin: 2px;
        }

        a:hover {
            text-decoration: underline;
        }

        img {
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
          <!--   <form class='search-form' method='GET'>
                <input class='search-input' type='text' name='search' placeholder='Search by Book Name or Genre'>
                <button class='search-button' type='submit'>Search</button>
            </form> -->
            <a class="admlout" style="float:right;" href="user_logout.php">Logout</a>
        </div>
        <div class="container">
            <?php
            $con = mysqli_connect('localhost', 'root', '', 's_project') or die('Unable to connect');

            $user_id = $_SESSION['id'];

            $sql = "SELECT borrow_id, book_name, description, borrow_date, return_date, status
                    FROM borrow WHERE user_id='$user_id'";

            $result = mysqli_query($con, $sql);

            echo "<table border='1px solid black'>";
            echo "<tr>";
            echo "<th style='width: 20px;'>ID</th>";
            echo "<th style='width: 200px;'>Name</th>";
            echo "<th style='width: 400px;'>Description</th>";
            echo "<th style='width: 300px;'>Borrow date</th>";
            echo "<th style='width: 300px;'>Return date</th>";
            echo "<th style='width: 300px;'>status</th>";
            echo "</tr>";

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td style='width: 20px;'>{$row['borrow_id']}</td>";
                    echo "<td style='width: 200px;'>{$row['book_name']}</td>";
                    echo "<td style='width: 400px;'>{$row['description']}</td>";
                    echo "<td style='width: 100px;'>{$row['borrow_date']}</td>";
                    echo "<td style='width: 100px;'>{$row['return_date']}</td>";
                    echo "<td style='width: 100px;'>{$row['status']}</td>";
                    echo "</tr>";
                }
                echo "</table><br>";
                echo "<a href='admin_page.php' style='float: left;'>Go Back</a>";
            } else {
                echo "Error in query: " . mysqli_error($con);
            }

            mysqli_close($con);
            ?>
        </div>
    </center>
</body>
</html>