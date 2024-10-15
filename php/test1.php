
  <!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>view donation</title>

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
            width: 90%;
        }
        th{
            background: black;
            padding: 8px;
            text-align: left;

        }
        
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;

        }

        .scrollable-table {
            overflow-y: auto;
            max-height: 690px; /* Set the maximum height of the scrollable area */
            /*margin-top: 38px;
            margin-bottom: 35px;*/
        }
        .tb-heading{
           margin-top: 5px;
            color: white;
            width: 90%;
        }
        .tb-bottom{
            position: fixed;
            bottom: 0;
            background: black;
            width: 100%;
            height: 40px;
            display: flex;
            justify-content: center;
        }
    </style>

</head>

<body>
    <center><div class="header">
    <h1 style="margin-right: 20px;">Donors</h1>
    <form class='search-form' method='GET'>
        <input class='search-input' type='text' name='search' placeholder='Search by donation'>
        <button class='search-button' type='submit'>Search</button>
    </form>
   
</div>

    <div class="container">
        <table class="tb-heading">
            <tr>
            <th style='width: 80px;'>ID</th>
            <th style='width: 300px;'>Name</th>
            <th style='width: 280px;'>Email</th>
            <th style='width: 200px;'>Book Name</th>
            <th style='width: 40px; height:60px;'>Image</th>
            <th style='width: 200px;'>Genre</th>
            <th style='width: 80px;'>Quantity</th>
            
            
            </tr>
        </table>
        <div class="scrollable-table">
              <?php
            $con = mysqli_connect('localhost', 'root', '', 's_project') or die('Unable to connect');

            $sql = "SELECT * FROM donation";

            $result = mysqli_query($con, $sql);

            echo "<table>";


            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td style='width: 80px; height: 40px;'>{$row['donor_id']}</td>";
                    echo "<td style='width: 300px;'>{$row['donor_name']}</td>";
                    echo "<td style='width: 280px;'>{$row['donor_email']}</td>";
                   
                    echo "<td style='width: 200px;'>{$row['book_name']}</td>";
                    echo "<td style='width: 40px; height:60px;'><img src='{$row['Image']}'/></td>";
                    echo "<td style='width: 200px;'>{$row['genre']}</td>";
                    echo "<td style='width: 80px;'>{$row['quantity']}</td>";
                    echo "</tr>";
                    
                }
                echo "</table><br>";
                
            } else {
                echo "Error in query: " . mysqli_error($con);
            }

            mysqli_close($con);
            ?>
        </div>
        </center>
        <div class="tb-bottom">
           <a href='admin_page.php' >Back to Home Page</a>
            <th> <a class="admlout" style="float:right;" href="admin_logout.php">Logout</a></th>
            
        </div>
    </div>


</body>

</html>