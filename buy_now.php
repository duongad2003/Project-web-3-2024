<?php
ob_start();
session_start();
include('./includes/connect.php');
include('./function/common_functions.php');
$uid = $_SESSION['user_id'];
$id = $_GET['id'];
$select = mysqli_query($con, "SELECT * FROM `btl_product` WHERE `product_id` = '$id'");

if (!isset($uid)) {
    header("Location: login.php");
    exit();
}

while ($c = mysqli_fetch_array($select)) {
    $id = $c['product_id'];
    $name = $c['product_name'];
    
    if($c['product_new_price'] != 0){
        $price = $c['product_new_price'];
    }else{
        $price = $c['product_price'];
    }
    $amount = $c['product_amount'];
    $capacity = $c['product_ capacity'];
    $abv = $c['product_ABV'];
    $place = $c['product_place'];
    $img = $c['product_img'];
    $description = $c['product_description'];
}

$search = mysqli_query($con, "Select * from btl_cart where name = '$name'");
$row = mysqli_fetch_row($search);

if ($row > 0) {
    $se_quan = mysqli_query($con, "Select * from btl_cart where name = '$name'");
    while ($oldquan = mysqli_fetch_array($se_quan)) {
        $newquan = $oldquan['quantity'] + 1;

        $update_query = "UPDATE `btl_cart` SET `quantity` = '$newquan'  WHERE `btl_cart`.`name` = '$name'; ";
        $sql_execute = mysqli_query($con, $update_query);
        header('location:cart.php');
    }
} else {
    $insert_query = "INSERT INTO `btl_cart` (`user_id`, product_id, `name`, `price`, `image`, `quantity`) VALUES ('$uid','$id', '$name', '$price', '$img', '1') ";
    $sql_execute = mysqli_query($con, $insert_query);
    if ($sql_execute) {
        $message = "Đã thêm vào sản phẩm";
        echo "<script type='text/javascript'>alert('$message');</script>";
        header('location:cart.php');
    }
}


?>
