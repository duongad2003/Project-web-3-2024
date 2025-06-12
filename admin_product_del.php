<?php
ob_start();
session_start();
include('./includes/connect.php');
include('./function/common_functions.php');

$ma = $_GET['id'];

$select = mysqli_query($con, "select * from btl_product where product_id = '$ma'");

    $del = "delete from btl_product where product_id = '$ma'";
    $result = mysqli_query($con, $del);
    header("location: ad-pr-show.php");

?>