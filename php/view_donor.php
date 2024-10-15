<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Donation</title>

    <style type="text/css">
        * {
            font-family: 'Poppins', sans-serif;
        }

        .container {
            width: 90%;
            height: auto;
            text-align: left;
            overflow-x: auto;
            margin: auto;
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
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .scrollable-table {
            overflow-y: auto;
            max-height: 690px;
        }

        .tb-bottom {
            position: fixed;
            bottom: 0;
            background: black;
            width: 100%;
            height: 40px;
            display: flex;
            justify-content: center;
        }

        .header {
            margin-bottom: 20px;
        }

        .search-form {
            display: inline-block;
        }

        .search-input {
            padding: 5px;
            font-size: 14px;
        }

        .search-button {
            padding: 5px 10px;
            font-size: 14px;
            background-color: #212529;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .search-button:hover {
            background-color: #444;
        }
    </style>

</head>

<body>
    <center>
        <div class="header">
            <h1>Donors</h1>
            <form class='search-form' method='GET'>
                <input class='search-input' type='text' name='search' placeholder='Search by Donors'>
                <button class='search-button' type='submit'>Search</button>
            </form>
        </div>

        <div class="container">
            <table class="tb-heading">
                <tr>
                    <th style='width: 10%;'>ID</th>
                    <th style='width: 20%;'>Name</th>
                    <th style='width: 20%;'>Email</th>
                    <th style='width: 20%;'>Book Name</th>
                    <th style='width: 10%;'>Image</th>
                    <th style='width: 10%;'>Genre</th>
                    <th style='width: 10%;'>Quantity</th>
                </tr>
            </table>
            <div class="scrollable-table">
                <table>
                    <tbody>
                        <?php
                        $con = mysqli_connect('localhost', 'root', '', 's_project') or die('Unable to connect');

                        $search_query = isset($_GET['search']) ? mysqli_real_escape_string($con, $_GET['search']) : '';
                        $sql = "SELECT * FROM donation WHERE donor_name LIKE '%$search_query%'";

                        $result = mysqli_query($con, $sql);

                        if ($result) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td style='width: 10%;'>{$row['donor_id']}</td>";
                                echo "<td style='width: 20%;'>{$row['donor_name']}</td>";
                                echo "<td style='width: 20%;'>{$row['donor_email']}</td>";
                                echo "<td style='width: 20%;'>{$row['book_name']}</td>";
                                echo "<td style='width: 10%;'><img src='{$row['Image']}'/></td>";
                                echo "<td style='width: 10%;'>{$row['genre']}</td>";
                                echo "<td style='width: 10%;'>{$row['quantity']}</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='7'>Error in query: " . mysqli_error($con) . "</td></tr>";
                        }

                        mysqli_close($con);
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="tb-bottom">
            <a href='admin_page.php'>Back to Home Page</a>
            <a class="admlout" style="float:right;" href="admin_logout.php">Logout</a>
        </div>
    </center>
</body>

</html>