<?php
ob_start();
session_start();
include('./includes/connect.php');
include('./function/common_functions.php');
$uid = $_SESSION['user_id'];

$ma = $_GET['id'];

if($ma == $uid){
    $message = "Không thể tước quyển bản thân";
    echo "<script type='text/javascript'>alert('$message');";
    echo "window.location.href='ad-acc-show.php';";
    echo "</script>";
}else{

    $del = "UPDATE `user_table` SET `role` = '0' WHERE `user_table`.`user_id`  = '$ma'";
    $result = mysqli_query($con, $del);

    $message = "Đã tước quyền admin";
    echo "<script type='text/javascript'>alert('$message');";
    echo "window.location.href='ad-acc-show.php';";
    echo "</script>";
}
?>