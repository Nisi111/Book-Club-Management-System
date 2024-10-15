<?php
$conn = mysqli_connect('localhost:3306','root','','s_project');
session_start();
session_unset();
session_destroy();

header('location:home.php');

?>