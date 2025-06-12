<?php
ob_start();
session_start();
include('./includes/connect.php');
include('./function/common_functions.php');

$ma = $_GET['id'];

    $del = "UPDATE `user_table` SET `role` = '1' WHERE `user_table`.`user_id`  = '$ma'";
    $result = mysqli_query($con, $del);

    $message = "Đã thăng lên admin";
    echo "<script type='text/javascript'>alert('$message');";
    echo "window.location.href='ad-acc-show.php';";
    echo "</script>";

?>