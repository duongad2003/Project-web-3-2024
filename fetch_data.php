<?php
include('./includes/connect.php');

$num_per_page = 9;
$page = isset($_GET["page"]) ? $_GET["page"] : 1;
$start_from = ($page - 1) * $num_per_page;

$query = "SELECT p.*, c.catalog_name FROM btl_product p INNER JOIN btl_catalog c ON p.catalog_id = c.catalog_id WHERE p.product_id IS NOT NULL LIMIT $start_from, $num_per_page";
$select = mysqli_query($con, $query);

while ($se = mysqli_fetch_array($select)) {
    // Hiển thị sản phẩm
    echo "<div class='col-md-6 col-lg-6 col-xl-4 product' data-price='" . $se['product_price'] . "'>";
    echo "<div class='border rounded position-relative product-item'>";
    echo "<div class='product-title'>";
    echo "<a href='product-detail.php?id=" . $se['product_id'] . "'>" . $se['product_name'] . "</a>";
    echo "<div class='ratting'>";
    echo "<p>" . $se['product_description'] . "</p>";
    echo "</div>";
    echo "</div>";
    echo "<div class='product-image'>";
    echo "<a href='product-detail.php?id=" . $se['product_id'] . "'>";
    echo "<img src='img/" . $se['product_img'] . "' alt='Product Image'>";
    echo "</a>";
    echo "<div class='product-action'>";
    echo "<a href='shop.php?cart_id=" . $se['product_id'] . "'><i class='fa fa-cart-plus'></i></a>";
    echo "<a href='#'><i class='fa fa-heart'></i></a>";
    echo "<a href='product-detail.html'><i class='fa fa-search'></i></a>";
    echo "</div>";
    echo "</div>";
    echo "<div class='product-price text-center'>";
    echo "<h3>" . number_format($se['product_price'], 0, '.', ',') . " VNĐ</h3>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
}
?>

