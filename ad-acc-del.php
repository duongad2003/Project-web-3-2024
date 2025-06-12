<?php
ob_start();
session_start();
include('./includes/connect.php');
include('./function/common_functions.php');
$uid = $_SESSION['user_id'];

$ma = $_GET['id'];



    if ($uid == $ma) {
        $sel1 = mysqli_query($con, "select * from btl_comment where user_id = $ma") or die('fail');
        if (mysqli_num_rows($sel1) > 0) {
            $del1 = "DELETE FROM `btl_comment` WHERE `btl_comment`.`user_id` = $ma;";
            $result1 = mysqli_query($con, $del1);
        }

        $sel2 = mysqli_query($con, "select * from btl_cart where user_id = $ma");
        if (mysqli_num_rows($sel2) > 0) {
            $del2 = "DELETE FROM `btl_cart` WHERE `btl_cart`.`user_id` =  $ma;";
            $result2 = mysqli_query($con, $del2);
        }

        $sel3 = mysqli_query($con, "select * from btl_order where user_id = $ma");
        if (mysqli_num_rows($sel3) > 0) {
            $del3 = "DELETE FROM `btl_order` WHERE `btl_order`.`user_id` = $ma;";
            $result3 = mysqli_query($con, $del3);
        }

        $del4 = "DELETE FROM `user_table` WHERE `user_table`.`user_id` = $ma;";
        $result4 = mysqli_query($con, $del4);


        $message = "Đã xoá tài khoản";
        unset($ma);
        session_destroy();
        echo "<script type='text/javascript'>alert('$message');";
        echo "window.location.href='index.php';";
        echo "</script>";

        

    } else {

        $sel1 = mysqli_query($con, "select * from btl_comment where user_id = $ma") or die('fail');
        if (mysqli_num_rows($sel1) > 0) {
            $del1 = "DELETE FROM `btl_comment` WHERE `btl_comment`.`user_id` = $ma;";
            $result1 = mysqli_query($con, $del1);
        }

        $sel2 = mysqli_query($con, "select * from btl_cart where user_id = $ma");
        if (mysqli_num_rows($sel2) > 0) {
            $del2 = "DELETE FROM `btl_cart` WHERE `btl_cart`.`user_id` =  $ma;";
            $result2 = mysqli_query($con, $del2);
        }

        $sel3 = mysqli_query($con, "select * from btl_order where user_id = $ma");
        if (mysqli_num_rows($sel3) > 0) {
            $del3 = "DELETE FROM `btl_order` WHERE `btl_order`.`user_id` = $ma;";
            $result3 = mysqli_query($con, $del3);
        }

        $del4 = "DELETE FROM `user_table` WHERE `user_table`.`user_id` = $ma;";
        $result4 = mysqli_query($con, $del4);


        $message = "Đã xoá tài khoản";
        echo "<script type='text/javascript'>alert('$message');";
        echo "window.location.href='ad-acc-show.php';";
        echo "</script>";
    }
