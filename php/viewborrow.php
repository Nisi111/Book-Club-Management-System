<?php
session_start();
if (!isset($_SESSION['admin_name'])) {
    header('location:admin_logout.php');
    exit();
}

$con = mysqli_connect('localhost', 'root', '', 's_project') or die('Unable to connect');

if (isset($_POST['validate_return'])) {
    $borrow_id = $_POST['borrow_id'];
    
    // Update the status of the book to 'Returned'
    $sql = "UPDATE borrow SET status='Returned' WHERE borrow_id='$borrow_id'";
    
    if (mysqli_query($con, $sql)) {
        echo "Book return validated successfully.";
    } else {
        echo "Error updating record: " . mysqli_error($con);
    }
}

// Fetch all borrowed books
$all_books_sql = "SELECT borrow_id, book_name, description, borrow_date, return_date, status
                  FROM borrow";

$all_books_result = mysqli_query($con, $all_books_sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - Borrowed Books Management</title>
    <style type="text/css">
        .container {
            width: 90%;
            height: auto;
            text-align: center;
            margin: 20px auto;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 10px;
            text-align: center;
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

        .header {
            width: 100%;
            height: 60px;
            background: black;
            color: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
        }

        .header h1 {
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Admin - Borrowed Books Management</h1>
        <a href="admin_logout.php">Logout</a>
    </div>
    <div class="container">
        <h2>Borrowed Books</h2>
        <?php
        if ($all_books_result && mysqli_num_rows($all_books_result) > 0) {
            echo "<table>";
            echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>Name</th>";
            echo "<th>Description</th>";
            echo "<th>Borrow Date</th>";
            echo "<th>Return Date</th>";
            echo "<th>Status</th>";
            echo "<th>Action</th>";
            echo "</tr>";

            while ($row = mysqli_fetch_assoc($all_books_result)) {
                echo "<tr>";
                echo "<td>{$row['borrow_id']}</td>";
                echo "<td>{$row['book_name']}</td>";
                echo "<td>{$row['description']}</td>";
                echo "<td>{$row['borrow_date']}</td>";
                echo "<td>{$row['return_date']}</td>";
                echo "<td>{$row['status']}</td>";
                if ($row['status'] == 'Requested for Return') {
                    echo "<td>
                            <form method='post' action=''>
                                <input type='hidden' name='borrow_id' value='{$row['borrow_id']}'>
                                <button type='submit' name='validate_return'>Validate Return</button>
                            </form>
                          </td>";
                } else {
                    echo "<td>N/A</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No borrowed books found.</p>";
        }
        ?>
    </div>
</body>
</html>

<?php
mysqli_close($con);
?>