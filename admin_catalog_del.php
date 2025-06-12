
<?php
ob_start();
session_start();
include('./includes/connect.php');
include('./function/common_functions.php');

$ma = $_GET['id'];

$select = mysqli_query($con, "select * from btl_product where catalog_id = '$ma'");


$row_count = mysqli_num_rows($select);
if($row_count>0){
    $message = "Không thể xoá do còn sản phẩm";
    echo "<script type='text/javascript'>alert('$message');";
    echo "window.location.href='ad-cg-show.php';";
    echo "</script>";
}else{
    $del = "delete from btl_catalog where catalog_id = '$ma'";
    $result = mysqli_query($con, $del);
    header("location: ad-cg-show.php");
}

?>