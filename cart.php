<?php


ob_start();
session_start();
include('./includes/connect.php');
include('./function/common_functions.php');
unset($_SESSION['catalogQueryPart']);
unset($_SESSION['priceQueryPart']);

$id = $_SESSION['user_id'];

if (!isset($id)) {
    header("Location: login.php");
}


if (isset($_GET['delete'])) {
    $id_del = $_GET['delete'];
    $find = mysqli_query($con, "select * from btl_cart where cart_id = '$id_del'");

    if (mysqli_num_rows($find) > 0) {
        $del = mysqli_query($con, "delete from btl_cart where cart_id = '$id_del'");
    } else {
        echo '<script type="text/javascript">
            window.onload = function () { alert("Sản phẩm không tồn tại"); } 
            </script>';
    }
}
if (isset($_POST['submit-button'])) {
    $select2 = mysqli_query($con, "select * from btl_cart where user_id = '$id'");
    $se2 = mysqli_num_rows($select2);

    for ($i = 0; $i < $se2; $i++) {
        $up_id = $_POST['ca_id'][$i];
        $up_quan = $_POST['quantity'][$i];
        $up_total = $_POST['totalp'][$i];

        mysqli_query($con, "UPDATE `btl_cart` SET `quantity` = '$up_quan', `total_price` = '$up_total'  WHERE `btl_cart`.`cart_id` = '$up_id';");
    }
}

if (isset($_POST['checkout'])) {
    $chktotal = mysqli_query($con, "SELECT * from btl_cart WHERE user_id = '$id'");
    $row_count = mysqli_num_rows($chktotal);
    if ($row_count <= 0) {
        $message = "Không có sản phẩm trong giỏ hàng";
        echo "<script type='text/javascript'>alert('$message');</script>";
    } else {

        while ($stotal = mysqli_fetch_array($chktotal)) {
            $up_total = $stotal['quantity'] * $stotal['price'];
            $up_id = $stotal['cart_id'];
            mysqli_query($con, "UPDATE `btl_cart` SET  `total_price` = '$up_total'  WHERE `btl_cart`.`cart_id` = '$up_id';");
        }
        header("location:checkout.php");
    }
}


include('./view/header.php');

?>


<!-- Template Stylesheet -->
<link href="css/style1.css" rel="stylesheet">
<link rel="stylesheet" href="css/cart.css">


<body>

    <main >
        <!-- Page Header Start -->
        <div class="container-fluid bg-secondary mb-5" style="margin-top: 100px; background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.5)), url(img/banner8.jpg) center center; ">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
                <h1 class="font-weight-semi-bold text-uppercase mb-3 " style="font-weight: 700;">HUDUOAI</h1>
                <div class="d-inline-flex">
                <p class="m-0"><a style="color: var(--bs-primary);" href="index.php">Trang chủ</a></p>
                    <p class="m-0 px-2">>></p>
                    <p class="m-0 ">Sản phẩm</p>
                    <p class="m-0 px-2">>></p>
                    <p class="m-0 fw-bold">Giỏ hàng</p>
                    <p class="m-0 px-2">>></p>
                    <p class="m-0 ">Thanh toán</p>
                    <p class="m-0 px-2">>></p>
                <p class="m-0">Liên hệ</p>
                </div>
            </div>
        </div>
        <!-- Page Header End -->

        <!-- Cart Start -->
        <div class="cart-page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <form method="POST">
                            <div class="cart-page-inner">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Sản phẩm</th>
                                                <th>Giá</th>
                                                <th>Số lượng</th>
                                                <th>Tổng tiền</th>
                                                <th>Loại bỏ</th>
                                            </tr>
                                        </thead>
                                        <tbody class="align-middle">


                                            <?php

                                            $select = mysqli_query($con, "select * from btl_cart where user_id = '$id'");
                                            if (mysqli_num_rows($select) <= 0) {
                                                echo "<tr><td colspan=5>Giỏ hàng trống</td></tr>";
                                            } else {
                                                while ($se = mysqli_fetch_array($select)) {
                                                    $prod_id = $se['product_id'];
                                            ?>
                                                    <tr>
                                                        <td>
                                                            <div class="img">

                                                                <a href="product-detail.php?id=<?php echo $se['product_id'] ?>"><img src="img/<?php echo $se['image'] ?>" alt="Image"></a>
                                                                <p><?php echo $se['name'] ?></p>
                                                            </div>
                                                        </td>
                                                        <?php $formatted_price = number_format($se['price'], 0, '.', ',') . ' VNĐ'; ?>
                                                        <td><?php echo $formatted_price ?></td>
                                                        <td>

                                                            <button type="submit" name="submit-button" id="submit" class="hidden-button"></button>
                                                            <input type="hidden" name="ca_id[]" value="<?php echo $se['cart_id'] ?>">

                                                            <?php
                                                            $select_numb = mysqli_query($con, "select * from btl_product where product_id = '$prod_id'");
                                                            $numb = mysqli_fetch_array($select_numb);
                                                            ?>


                                                            <div class="input-group quantity mx-auto" style="width: 100px;">
                                                                <div class="input-group-btn">
                                                                    <button class="btn btn-sm btn-primary btn-minus" type="button" name="minus">
                                                                        <i class="fa fa-minus"></i>
                                                                    </button>
                                                                </div>

                                                                <input type="number" class="form-control form-control-sm text-center" name="quantity[]" min="1" max="<?php echo $numb['product_amount'] ?>" oninput="setCustomValidity('')"  value="<?php echo $se['quantity'] ?>">

                                                                <script>
                                                                    document.addEventListener("DOMContentLoaded", function() {
                                                                        var elements = document.getElementsByTagName("INPUT");
                                                                        for (var i = 0; i < elements.length; i++) {
                                                                            elements[i].oninvalid = function(e) {
                                                                                e.target.setCustomValidity("");
                                                                                if (!e.target.validity.valid) {
                                                                                    e.target.setCustomValidity("Sản phẩm trong kho còn <?php echo $numb['product_amount'] ?>");
                                                                                }
                                                                            };
                                                                            elements[i].oninput = function(e) {
                                                                                e.target.setCustomValidity("");
                                                                            };
                                                                        }
                                                                    })
                                                                </script>

                                                                <div class="input-group-btn">
                                                                    <button class="btn btn-sm btn-primary btn-plus" type="button" name="plus" value="plus">
                                                                        <i class="fa fa-plus"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <input type="hidden" name="totalp[]" value="<?php echo $se['quantity'] * $se['price'] ?>">
                                                        </td>
                                                        <td>

                                                        </td>

                                                        <td>
                                                            <div class="del">
                                                                <a type="button" href="cart.php?delete=<?php echo $se['cart_id'] ?>" onclick="return confirm('Có chắc muốn xoá chứ?')"><i class="fa fa-trash"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>

                                            <?php }
                                            } ?>


                                        </tbody>

                                    </table>
                                    <style>

                                    </style>

                                </div>
                                <div class="back">
                                    <a href="shop.php"><i class="fa-solid fa-backward"></i> Quay lại xem sản phẩm</a>

                                </div>
                            </div>
                        </form>

                    </div>

                    <div class="col-lg-4">
                        <div class="cart-page-inner">
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- <div class="coupon">
                                    <input type="text" id="couponCode" placeholder="Coupon Code">
                                        <button id="applyCoupon">Apply Code</button>
                                    </div> -->
                                    <!-- <h3>Thanh Toán</h3> -->
                                </div>
                                <div class="col-md-12">
                                    <div class="cart-summary">
                                        <div class="cart-content">
                                            <h1>Tổng tiền dư tính</h1>
                                            <p>Tổng tiền<span id="subTotal"></span></p>
                                            <p>Phí giao hàng<span id="shippingFee"></span></p>
                                            <h2>Tổng thanh toán<span id="total"></span></h2>
                                        </div>

                                        <form action="" method="POST">
                                            <div class="cart-btn">

                                                <button type="submit" name="update" id="update">Cập nhật giỏ</button>
                                                <button type="submit" name="checkout" id="checkout">Thanh toán</button>
                                            </div>
                                        </form>

                                        <script>
                                            const btnUpdate = document.getElementById("update");
                                            const btnCheckout = document.getElementById("checkout");
                                            const btnSubmit = document.getElementById("submit");

                                            // add event listener to Form 1 button
                                            btnUpdate.addEventListener("click", () => {
                                                // simulate a click event on Form 2 button
                                                btnSubmit.click();
                                            });
                                        </script>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Cart End -->

    </main>
    <?php include('./view/footer.php') ?>
</body>

</html>