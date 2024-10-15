<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>view members</title>

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
  .header {
    width: 100%;
    height: 60px;
    background: black;
    color: white;
    display: flex;
    align-items: center;
    padding: 0 10px;
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
            background: white;
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
            width: 100%;
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

</head>

<body>
    <center>
        <div class="header">
    <h1 style="margin-right: 20px;">Members</h1>
    <form class='search-form' method='GET'>
        <input class='search-input' type='text' name='search' placeholder='Search by Members'>
        <button class='search-button' type='submit'>Search</button>
    </form>
     <th> <a class="admlout" style="float:right;" href="admin_logout.php">Logout</a></th>      
   
</div>

    <div class="container">
            <?php
            $con = mysqli_connect('localhost', 'root', '', 's_project') or die('Unable to connect');

       $search_query = isset($_GET['search']) ? mysqli_real_escape_string($con, $_GET['search']) : '';
            $sql = "SELECT * FROM user
                   
                    WHERE user_name LIKE '%$search_query%'";
    

            $result = mysqli_query($con, $sql);

            echo "<table border='1px solid black'>";
            echo "<tr>";
            echo "<th style='width:50px;'>ID</th>";
            echo "<th style='width:300px;'>User Name</th>";
            echo "<th style='width:200px;'>Email</th>";
            echo "<th style='width:200px;'>Phone</th>";
            echo "<th style='width:300px;'>Password</th>";

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td style='width: 50px; height: 40px;'>{$row['user_id']}</td>";
                    echo "<td style='width: 300px;'>{$row['user_name']}</td>";
                    echo "<td style='width: 200px;'>{$row['email']}</td>";
                   
                    echo "<td style='width: 200px;'>{$row['phone']}</td>";
                    echo "<td style='width: 200px;'>{$row['password']}</td>";
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
            
        </div>
    </div>


</body>

</html>