<?php
ini_set('display_errors', 0);
ob_start();
session_start();
include('./includes/connect.php');
include('./function/common_functions.php');

$id = $_SESSION['user_id'];
if (!isset($id)) {
    header("Location: login.php");
    exit();
}

// Handle form submission automatically
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['catalogQueryPart'] = '';
    $_SESSION['priceQueryPart'] = '';

    if (!empty($_POST['categories'])) {
        $catalogcon = [];
        foreach ($_POST['categories'] as $selected2) {
            $catalogcon[] = "p.catalog_id = '" . mysqli_real_escape_string($con, $selected2) . "'";
        }
        $_SESSION['catalogQueryPart'] = ' AND (' . implode(' OR ', $catalogcon) . ')';
    }

    if (!empty($_POST['price'])) {
        $pricecon = [];
        foreach ($_POST['price'] as $selected) {
            list($min, $max) = explode('-', $selected);
            if ($max) {
                $pricecon[] = 'p.product_price BETWEEN ' . mysqli_real_escape_string($con, $min) . ' AND ' . mysqli_real_escape_string($con, $max);
            } else {
                $pricecon[] = 'p.product_price > ' . mysqli_real_escape_string($con, $min);
            }
        }
        $_SESSION['priceQueryPart'] = ' AND (' . implode(' OR ', $pricecon) . ')';
    }
}

// Handle adding to cart
if (isset($_GET['cart_id'])) {
    $pr_id = $_GET['cart_id'];
    $se_pro = mysqli_query($con, "SELECT * FROM btl_product WHERE product_id = '$pr_id'");

    $add = mysqli_fetch_array($se_pro);
    $name = $add['product_name'];
    $price = $add['product_price'];
    $image = $add['product_img'];

    $se_cart = mysqli_query($con, "SELECT * FROM btl_cart WHERE name = '$name' AND user_id = '$id'") or die('query failed');
    if (mysqli_num_rows($se_cart) > 0) {
        mysqli_query($con, "UPDATE `btl_cart` SET `quantity` = `quantity` + 1 WHERE `user_id` = '$id' AND `name` = '$name'") or die('query failed');
        echo '<script type="text/javascript">
                   window.onload = function () { alert("Đã thêm sản phẩm vào giỏ hàng"); window.location.href = "shop.php"; } 
            </script>';
    } else {
        mysqli_query($con, "INSERT INTO `btl_cart` (`user_id`, `name`, `price`, `image`, `quantity`) VALUES ('$id', '$name', '$price', '$image', '1')") or die('query failed');
        echo '<script type="text/javascript">
                   window.onload = function () { alert("Đã thêm sản phẩm vào giỏ hàng"); window.location.href = "shop.php"; } 
            </script>';
    }
}

$num_per_page = 9;
$page = isset($_GET["page"]) ? $_GET["page"] : 1;
$start_from = ($page - 1) * 9;

include('./view/header.php');
?>

<link rel="stylesheet" href="css/shop.css">

<main>
    <div class="container-fluid bg-secondary mb-5" style="margin-top: 152px; background-image: url(./img/banner5.png);">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3 ">Shop</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a style="color: var(--bs-primary);" href="index.php">Home</a></p>
                <p class="m-0 px-2">>></p>
                <p class="m-0 fw-bold">Shop</p>
                <p class="m-0 px-2">>></p>
                <p class="m-0">Cart</p>
                <p class="m-0 px-2">>></p>
                <p class="m-0">Checkout</p>
            </div>
        </div>
    </div>
    <div class="container-fluid fruite ">
        <div class="container py-5">
            <div class="row g-4">
                <div class="col-lg-12">
                    <div class="row g-4 ">
                        <div class="col-4">
                            <h2 class="mb-4">Gợi ý cho quý khách </h2>
                        </div>
                        <div class="col-7"></div>
                        <div class="col-xl-1">
                            <div class="dropdown ml-4">
                                <button class="border btn  dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    Sort by
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="shop.php?sr=asc">thấp đến cao</a></li>
                                    <li><a class="dropdown-item" href="shop.php?sr=des">cao đến thấp</a></li>
                                    <li><a class="dropdown-item" href="shop.php?sr=all">tất cả</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row g-4">
                        <div class="col-lg-3 left-menu ">
                            <form action="" id="myForm" method="POST">
                                <div class="row g-4 ">
                                    <div class="col-lg-12">
                                        <div class="border-bottom mb-4 pb-4">
                                            <h5 class="font-weight-semi-bold mb-4">Loại sản phẩm</h5>
                                            <?php
                                            $se_cata = mysqli_query($con, "SELECT * FROM btl_catalog");
                                            while ($sec = mysqli_fetch_array($se_cata)) {
                                                $checked = isset($_SESSION['catalogQueryPart']) && strpos($_SESSION['catalogQueryPart'], "p.catalog_id = '" . $sec['catalog_id'] . "'") !== false ? 'checked' : '';
                                            ?>
                                                <div class="custom-control custom-checkbox d-flex align-items-center mb-3">
                                                    <input type="checkbox" name="categories[]" class="custom-control-input" id="catalog-<?php echo $sec['catalog_id']; ?>" value="<?php echo $sec['catalog_id']; ?>" <?php echo $checked; ?> onchange="this.form.submit()">
                                                    <label class="custom-control-label px-3" for="catalog-<?php echo $sec['catalog_id']; ?>"><?php echo $sec['catalog_name']; ?></label>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div id="filter" class="border-bottom mb-4 pb-4">
                                            <h5 class="font-weight-semi-bold mb-4">Khoảng giá</h5>
                                            <?php
                                            $price_ranges = [
                                                '0-499999' => 'Dưới 500,000 VNĐ',
                                                '500000-999999' => '500,000 VNĐ đến 1,000,000 VNĐ',
                                                '1000000-2999999' => '1,000,000 VNĐ đến 3,000,000 VNĐ',
                                                '3000000' => 'Trên 3,000,000 VNĐ'
                                            ];
                                            foreach ($price_ranges as $range => $label) {
                                                $checked = isset($_SESSION['priceQueryPart']) && strpos($_SESSION['priceQueryPart'], str_replace('-', ' AND ', $range)) !== false ? 'checked' : '';
                                            ?>
                                                <div class="custom-control custom-checkbox d-flex align-items-center mb-3">
                                                    <input type="checkbox" class="custom-control-input" name="price[]" id="price-<?php echo $range; ?>" value="<?php echo $range; ?>" <?php echo $checked; ?> onchange="this.form.submit()">
                                                    <label class="custom-control-label px-3" for="price-<?php echo $range; ?>"><?php echo $label; ?></label>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-9 product-list">
                            <div class="row g-3 justify-content-center">
                                <?php
                                $srquery = '';
                                $sr = isset($_GET['sr']) ? $_GET['sr'] : '';
                                if ($sr == "asc") {
                                    $srquery = " ORDER BY product_price ASC";
                                } elseif ($sr == "des") {
                                    $srquery = " ORDER BY product_price DESC";
                                }

                                $catalogQueryPart = isset($_SESSION['catalogQueryPart']) ? $_SESSION['catalogQueryPart'] : '';
                                $priceQueryPart = isset($_SESSION['priceQueryPart']) ? $_SESSION['priceQueryPart'] : '';

                                $query = "SELECT p.*, c.catalog_name FROM btl_product p INNER JOIN btl_catalog c ON p.catalog_id = c.catalog_id WHERE p.product_id IS NOT NULL $catalogQueryPart $priceQueryPart $srquery LIMIT $start_from, $num_per_page";
                                $select = mysqli_query($con, $query);

                                while ($se = mysqli_fetch_array($select)) {
                                    $formatted_price = number_format($se['product_price'], 0, '.', ',') . ' VNĐ';
                                ?>
                                    <div class="col-md-6 col-lg-6 col-xl-4 product" data-price="<?php echo $se['product_price'] ?>">
                                        <div class="border rounded position-relative product-item">
                                            <div class="product-title">
                                                <a href="product-detail.php?id=<?php echo $se['product_id']; ?>"><?php echo $se['product_name'] ?></a>
                                                <div class="ratting">
                                                    <p><?php echo $se['product_description'] ?></p>
                                                </div>
                                            </div>
                                            <div class="product-image">
                                                <a href="product-detail.php?id=<?php echo $se['product_id']; ?>">
                                                    <img src="img/<?php echo $se['product_img'] ?>" alt="Product Image">
                                                </a>
                                                <div class="product-action">
                                                    <a href="shop.php?cart_id=<?php echo $se['product_id']; ?>"><i class="fa fa-cart-plus"></i></a>
                                                    <a href="#"><i class="fa fa-heart"></i></a>
                                                    <a href="product-detail.html"><i class="fa fa-search"></i></a>
                                                </div>
                                            </div>
                                            <div class="product-price text-center">
                                                <h3><?php echo $formatted_price ?></h3>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>

                                <div class="col-12">
                                    <div class="pagination d-flex justify-content-center mt-5">
                                        <?php
                                        $sql = "SELECT * FROM btl_product p WHERE p.product_id IS NOT NULL $catalogQueryPart $priceQueryPart";
                                        $rs_result = mysqli_query($con, $sql);
                                        $total_records = mysqli_num_rows($rs_result);
                                        $total_page = ceil($total_records / $num_per_page);

                                        if ($page > 1) {
                                            echo "<a href='shop.php?page=" . ($page - 1) . "&sr=" . $sr . "' class='rounded'>&laquo;</a>";
                                        }

                                        for ($i = 1; $i <= $total_page; $i++) {
                                            if ($i == $page) {
                                                echo "<a href='shop.php?page=" . $i . "&sr=" . $sr . "' class='active rounded'>" . $i . "</a>";
                                            } else {
                                                echo "<a href='shop.php?page=" . $i . "&sr=" . $sr . "' class='rounded'>" . $i . "</a>";
                                            }
                                        }

                                        if ($page < $total_page) {
                                            echo "<a href='shop.php?page=" . ($page + 1) . "&sr=" . $sr . "' class='rounded'>&raquo;</a>";
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include('./view/footer.php'); ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var form = document.getElementById('myForm');
        var checkboxes = form.querySelectorAll('input[type="checkbox"]');
        checkboxes.forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                form.submit();
            });
        });
    });
</script>
</body>
</html>
