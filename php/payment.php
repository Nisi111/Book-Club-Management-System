<?php
// Display errors for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_name'])) {
    header('Location: user_login.php');
    exit();
}

$conn = mysqli_connect('localhost:3306', 'root', '', 's_project');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$product = null;
$invoice = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['book_id'], $_POST['fine'], $_POST['book_name'], $_POST['borrow_id'])) {
        $book_id = mysqli_real_escape_string($conn, $_POST['book_id']);
        $cid = $_SESSION['id']; // Assuming you have a customer ID in the session
       //$quantity = 1; // Get quantity from POST
        $fine = mysqli_real_escape_string($conn, $_POST['fine']);
        $borrow_id = mysqli_real_escape_string($conn, $_POST['borrow_id']);


        $sql = "SELECT * FROM book WHERE book_id='$book_id'";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) == 1) {
            $product = mysqli_fetch_assoc($result);

            $invoice = $book_id . time();
            $bname = mysqli_real_escape_string($conn, $product['book_name']);
            //$fine = $product['price'];

            $insert = "INSERT INTO `fine` (book_id, borrow_id, book_name, amount, invoice, user_id) VALUES ('$book_id', '$borrow_id', '$bname', '$fine', '$invoice', '$cid')";
            if (!mysqli_query($conn, $insert)) {
                die('Error: ' . mysqli_error($conn));
            } 
        } else {
            die('Error fetching product: ' . mysqli_error($conn));
        }
    } else {
        die('Required POST variables not set');
    }
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product Order</title>
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            color: #000;
            margin: 0;
            padding: 0;
        }
        .item img {
            height: 200px;
            width: 150px;
        }
        .inpt {
            width: 80px;
            padding: 5px;
            margin-top: 5px;
            border: 1px solid #000;
            color: #000;
        }
        form {
            margin: 20px;
            padding: 20px;
            width: 300px;
            background-color: #fff;
            border: 1px solid #000;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .quantity-controls button {
            background-color: #dc143c;
            color: #fff;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }
        .quantity-controls button:hover {
            background-color: #a10f2d;
        }
        .quantity-controls input {
            text-align: center;
        }
        input[type="submit"] {
            background-color: #dc143c;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            margin-top: 10px;
        }
        input[type="submit"]:hover {
            background-color: #a10f2d;
        }
        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }
    </style>
</head>
<body>
<?php @include 'navbar.php'; ?>

<form action="https://uat.esewa.com.np/epay/main" method="POST">
    <div class="item">
        <?php 
        if ($product) {
            echo "<img src='{$product['book_url']}'/>";
            echo "<p>{$product['book_name']}</p>";
            echo "<p>RS. $fine</p>";
         
        } else {
            echo "<p>Product not found.</p>";
        }
        ?>
    </div>

    

    <input type="hidden" name="cid" value="<?php echo htmlspecialchars($_SESSION['id']); ?>">
    <input type="hidden" name="p_id" value="<?php echo htmlspecialchars($product['book_id']); ?>"><br>
    
    <label>Total</label><br>
    <input class="inpt" type="text" name="tAmt" id="total" value="<?php echo  $fine;?>" readonly>
    <input value="<?php echo  $fine;?>" name="amt" type="hidden">
    <input value="0" name="txAmt" type="hidden">
    <input value="0" name="psc" type="hidden">
    <input value="0" name="pdc" type="hidden">
    <input value="epay_payment" name="scd" type="hidden">
    <input value="<?php echo htmlspecialchars($invoice); ?>" name="pid" type="hidden">
    <input value="http://localhost/Summerproject/php/esewa_succ.php" type="hidden" name="su">
    <input value="http://localhost/Sproject/html_php/failed.php" type="hidden" name="fu">
    <br>
    <label>Pay With</label>
    <input type="image" src="../image/esewa.png">
</form>

<script>
function updateTotal() {
    var quantity = document.getElementById('quantity').value;
    var initialPrice = <?php echo $product['price']; ?>;
    var total = quantity * initialPrice;
    document.getElementById('total').value = total;
    document.getElementsByName('amt')[0].value = total;
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