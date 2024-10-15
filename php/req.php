<?php
session_start();
if (!isset($_SESSION['user_name'])) {
    header('location:user_logout.php');
    exit();
}

if (isset($_GET['borrow_id'])) {
    $borrow_id = $_GET['borrow_id'];
    
    $con = mysqli_connect('localhost', 'root', '', 's_project') or die('Unable to connect');

    // Update the status of the book to 'Requested for Return'
    $sql = "UPDATE borrow SET status='Requested for Return' WHERE borrow_id='$borrow_id'";

    if (mysqli_query($con, $sql)) {
        header('location:success.php');
    } else {
        echo "Error updating record: " . mysqli_error($con);
    }

    mysqli_close($con);
} else {
    header('location:port1.php');
}
?>