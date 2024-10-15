
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>view borrow</title>

    <style type="text/css">
        *{
            font-family: 'Poppins', sans-serif; 
/*            margin:0; */
/*            padding:0; */
        }
        .container {
            width: auto;
            height: auto;
            text-align: left;
            overflow-x: auto;
        }

        a {
            font-size: 12px;
            text-decoration: none;
            color: white;
            background: #212529;
            padding: 10px 15px;
            border-radius: 5px;
            margin: 2px;
        }

        a:hover {
            text-decoration: underline;
        }

        img {
            height: 100%;
            width: 100%;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }
        th{
            background: crimson;
            padding: 8px;
            text-align: left;
        }
        
        td {
            border-bottom: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        .scrollable-table {
            overflow-y: auto;
            max-height: 690px; /* Set the maximum height of the scrollable area */
            margin-top: 38px;
            margin-bottom: 35px;
        }
        .tb-heading{
            position: fixed;
            top: 0;
            color: white;
            width: 100%;
        }
        .tb-bottom{
            position: fixed;
            bottom: 0;
            background: crimson;
            width: 100%;
            height: 40px;
            display: flex;
            justify-content: center;
        }
    </style>

</head>

<body>

    <div class="container">
        
        <div class="scrollable-table">
    <table>
        <tr>
            <th style='width: 50px;'>ID</th>
            <th style='width: 200px;'>Name</th>
            <th style='width: 200px;'>Book_name</th>
            <th style='width: 200px;'>Email</th>
            <th style='width: 200px;'>Issue_Date</th>
             <th style='width: 200px;'>Return_Date</th>
        </tr>
        <?php
        $con = mysqli_connect('localhost', 'root', '', 's_project') or die('Unable to connect');

        $sql = "SELECT borrow_id, user_name, email,book.book_name, borrow_date,return_date
            FROM borrow
            INNER JOIN user ON borrow.user_id = user.user_id
            INNER JOIN book ON borrow.book_id = book.book_id";

        $result = mysqli_query($con, $sql);

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td style='width: 50px; height: 40px;'>{$row['borrow_id']}</td>";
                echo "<td style='width: 400px; height: 40px;'>{$row['user_name']}</td>";
                echo "<td style='width: 200px; height: 40px;'>{$row['email']}</td>";
                echo "<td style='width: 200px; height: 40px;'>{$row['book_name']}</td>";
                echo "<td style='width: 200px; height: 40px;'>{$row['borrow_date']}</td>";
                 echo "<td style='width: 200px; height: 40px;'>{$row['return_date']}</td>";
                echo "</tr>";
            }
        } else {
            echo "Error in query: " . mysqli_error($con);
        }

        mysqli_close($con);
        ?>
    </table>
</div>
        <div class="tb-bottom">
            <a href='admin_page.php' >Back to Home Page</a>
            
        </div>
    </div>

</body>

</html> 