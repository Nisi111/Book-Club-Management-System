<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_name'])) {
    header('location:user_login.php');
    exit();
}

// Establish database connection
$conn = mysqli_connect('localhost:3306', 'root', '', 's_project');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get book ID from query parameter
$book_id = $_GET['book_id'];

// Fetch book details
$select = "SELECT * FROM book WHERE book_id = '$book_id'";
$res = mysqli_query($conn, $select);

if (!$res) {
    die("Error retrieving data: " . mysqli_error($conn));
}

$data = mysqli_fetch_assoc($res);

if (isset($_POST['submit'])) {
    $cid = $_POST['cid'];
    $pid = $_POST['pid'];
    $quantity = $_POST['quantity'];

    $pname = $data['book_name'];
    $description = $data['description'];
    $borrow_date = date('Y-m-d'); // current date
    $return_date = date('Y-m-d', strtotime('+7 days')); // 7 days after current date

    // Check if the user already borrowed the same book
    $check_borrow = "SELECT * FROM borrow WHERE book_id = '$pid' AND user_id = '$cid' AND return_date >= '$borrow_date'";
    $check_res = mysqli_query($conn, $check_borrow);

    if (mysqli_num_rows($check_res) > 0) {
        echo '<script>alert("You have already borrowed this book.");</script>';
    } else {
        // Check if there is enough stock
        if ($data['stock'] >= $quantity) {
            // Insert order
            $insert = "INSERT INTO borrow (book_name, description, borrow_date, return_date, book_id, user_id) VALUES ('$pname', '$description', '$borrow_date', '$return_date', '$pid', '$cid')";

            if (mysqli_query($conn, $insert)) {
                // Update stock
                $newStock = $data['stock'] - $quantity;
                $update = "UPDATE book SET stock = '$newStock' WHERE book_id = '$pid'";
                
                if (mysqli_query($conn, $update)) {
                    echo '<script>alert("Borrowed book!");</script>';
                    echo '<meta http-equiv="refresh" content="0;url=home.php" />';
                    exit();
                } else {
                    echo 'Error updating stock: ' . mysqli_error($conn);
                }
            } else {
                echo 'Error inserting data: ' . mysqli_error($conn);
            }
        } else {
            echo '<script>alert("Not enough stock available!");</script>';
        }
    }
}

// Close database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Borrow Book</title>
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
        }
        .item img {
            height: 200px;
            width: 150px;
        }
        .inpt {
            width: 80px;
        }
        form {
            margin-left: 20px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
<?php @include 'navbar.php' ?>

<form method="post" action="#">
    <div class="item">
        <?php 
            echo "<img src='{$data['book_url']}'/>";
            echo "<p>{$data['book_name']}</p>";
        ?>
    </div>

    <label>Quantity</label><br>
    <div class="quantity-controls">
        <input class="inpt" type="number" name="quantity" id="quantity" value="1" min="1">
    </div>

    <input type="hidden" name="cid" value="<?php echo $_SESSION['id'] ?>">
    <input type="hidden" name="pid" value="<?php echo $data['book_id'] ?>"><br>
   
    <input type="submit" name="submit" value="Borrow">
</form>

<script>
  function updateTotal() {
    var quantity = document.getElementById('quantity').value;
    var initialPrice = <?php echo $data['price']; ?>;
    var total = quantity * initialPrice;
    document.getElementById('total').value = total;
  }

  function incrementQuantity() {
    var quantityInput = document.getElementById('quantity');
    quantityInput.value = parseInt(quantityInput.value) + 1;
    updateTotal();
  }

  function decrementQuantity() {
    var quantityInput = document.getElementById('quantity');
    if (parseInt(quantityInput.value) > 1) {
      quantityInput.value = parseInt(quantityInput.value) - 1;
      updateTotal();
    }
  }
</script>

</body>
</html>