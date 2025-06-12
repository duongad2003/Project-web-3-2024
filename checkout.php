<?php

ob_start();
session_start();
include('./includes/connect.php');
include('./function/common_functions.php');
unset($_SESSION['catalogQueryPart']);
unset($_SESSION['priceQueryPart']);
$id = $_SESSION['user_id'];

$subqr = mysqli_query($con, "SELECT SUM(total_price) as total FROM btl_cart WHERE user_id = '$id'");
$gettotal = mysqli_fetch_assoc($subqr);
    $gtt = $gettotal["total"] + 15000;


if (isset($_POST['check'])) {
    $fullname = $_POST['uName'];
    $email = $_POST['uEmail'];
    $phone = $_POST['uPhone'];
    $addr = $_POST['uAdd'];
    $note = $_POST['uNote'];
    $receive = $_POST['payment'];
    

    $quan_cart = mysqli_query($con, "select * from btl_cart where user_id = $id") or die ('query faillll');
    while($minus = mysqli_fetch_array($quan_cart)){
        $qtt = $minus['quantity'];
        $pro_id = $minus['product_id'];
        $quan_product = mysqli_query($con, "select * from btl_product where product_id = $pro_id");
        while($minus_quantt = mysqli_fetch_array($quan_product)){
            $pro_amount = $minus_quantt['product_amount'];
            $new_amount = $pro_amount - $qtt;
            $update_amount = mysqli_query($con, "UPDATE `btl_product` SET `product_amount` = '$new_amount' WHERE `btl_product`.`product_id` = $pro_id") or die('faill');
        }
    }
    
    $order = "INSERT INTO `btl_order` (`order_id`, `user_id`, `fullname`, `email`, `phoneNumber`, `address`, `note`, `total_price`, `receive`) VALUES (NULL, '$id', '$fullname', '$email', '$phone', '$addr', '$note', '$gtt', '$receive')";
    $place_order = mysqli_query($con,$order) or die('query fal');

    $delOrder = mysqli_query($con,"DELETE FROM btl_cart WHERE user_id = $id") or die('query faillll');





    echo '<script type="text/javascript">
                   window.onload = function () { alert("Thanh toán thành công"); window.location.href = "index.php"; } 
            </script>';



    
}
include('./view/header.php');
?>
<link rel="stylesheet" href="css/checkout.css">

<body>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <main >
    <div class="container-fluid bg-secondary mb-5" style="margin-top: 100px; background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.5)), url(img/banner8.jpg) center center; ">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
                <h1 class="font-weight-semi-bold text-uppercase mb-3 " style="font-weight: 700;">HUDUOAI</h1>
                <div class="d-inline-flex">
                <p class="m-0"><a style="color: var(--bs-primary);" href="index.php">Trang chủ</a></p>
                    <p class="m-0 px-2">>></p>
                    <p class="m-0 ">Sản phẩm</p>
                    <p class="m-0 px-2">>></p>
                    <p class="m-0 ">Giỏ hàng</p>
                    <p class="m-0 px-2">>></p>
                    <p class="m-0 fw-bold">Thanh toán</p>
                    <p class="m-0 px-2">>></p>
                <p class="m-0">Liên hệ</p>
                </div>
            </div>
        </div>
        <!-- Checkout Start -->
        <div class="container-fluid pt-5">
            <div class="row px-xl-5">
                <div class="col-lg-7">
                    <div class="mb-4">
                        <h4 class="font-weight-semi-bold mb-4">Thanh toán</h4>
                        <?php
                        $info = mysqli_query($con, "select * from user_table where user_id = '$id'");
                        while ($se_info = mysqli_fetch_array($info)) {


                        ?>
                            <form action="" method="Post">
                                <div class="row">

                                    <div class="col-md-10 form-group">
                                        <label>Họ tên</label>
                                        <input class="form-control" type="text" name="uName" placeholder="Họ tên" value="<?php echo $se_info['user_name']; ?>" required>
                                    </div>

                                    <div class="col-md-5 form-group">
                                        <label>E-mail</label>
                                        <input class="form-control" type="email" name="uEmail" placeholder="example@email.com" value="<?php echo $se_info['user_email']; ?>" required>
                                    </div>
                                    <div class="col-md-5 form-group">
                                        <label>Số điện thoại</label>
                                        <input class="form-control" type="text" name="uPhone" placeholder="+123 456 789" value="<?php echo $se_info['user_phone']; ?>" required>
                                    </div>


                                    <div class="col-md-10 form-item">
                                        <label for="">Ghi chú thêm</label>
                                        <textarea name="uNote" class="form-control" spellcheck="false" cols="30" rows="11" placeholder="Ghi chú"></textarea>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="payment" value="store" id="store" required>
                                                <label class="custom-control-label" for="store">Nhận tại cửa hàng</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="payment" value="home" id="home" required>
                                                <label class="custom-control-label" for="home">Nhận tại địa chỉ</label>
                                            </div>
                                            <div class="address row" id="address">
                                                <h1></h1>
                                                <div class="col-md-10 form-group">
                                                    <h4>Địa chỉ</h4>
                                                    <input class="form-control" type="text" name="uAdd" id="uAdd" placeholder="Địa chỉ nhà">
                                                </div>
                                            </div>
                                            <button type="submit" name="check" id="submit" class="hidden-button"></button>
                                        </div>
                                    <?php } ?>

                                    </div>
                                </div>

                    </div>

                </div>

                <div class="col-lg-5">
                    <div class="card border-secondary mb-5">
                        <div class="card-header  border-0">
                            <h4 class="font-weight-semi-bold m-0">Tổng thanh toán</h4>
                        </div>
                        <div class="card-body">
                            <h5 class="font-weight-medium mb-3">Sản phẩm</h5>
                            <?php
                            $tt = mysqli_query($con, "select * from btl_cart where user_id = '$id'");

                            while ($se_info = mysqli_fetch_array($tt)) {
                            ?>
                                <div class="d-flex justify-content-between">
                                    <p><?php echo $se_info['name'] ?> x <?php echo $se_info['quantity'] ?> </p>
                                    <?php $formatted_price = number_format($se_info['total_price'], 0, '.', ',') . ' VNĐ'; ?>
                                    <p><?php echo $formatted_price ?></p>
                                </div>
                            <?php } ?>
                            <hr class="mt-0">
                            <div class="d-flex justify-content-between mb-3 pt-1">
                                <h6 class="font-weight-medium">Tổng tiền sản phẩm</h6>
                                <?php

                                $sub = mysqli_query($con, "SELECT SUM(total_price) as total FROM btl_cart WHERE user_id = '$id'");

                                while ($stotal = mysqli_fetch_assoc($sub)) {
                                    $total = $stotal["total"] + 15000;
                                    $formatted_subprice = number_format($stotal["total"], 0, '.', ',') . ' VNĐ';
                                    $formatted_totalprice = number_format($total, 0, '.', ',') . ' VNĐ';
                                ?>
                                    <h6 class="font-weight-medium"><?php echo $formatted_subprice ?></h6>
                            </div>
                            <div class="d-flex justify-content-between">
                                <h6 class="font-weight-medium">Phí giao hàng</h6>
                                <h6 class="font-weight-medium "><span id="shippingFee">15000 VNĐ</span></h6>
                            </div>
                        </div>
                        <div class="card-footer border-secondary bg-transparent">
                            <div class="d-flex justify-content-between mt-2">
                                <h5 class="font-weight-bold">Tổng thanh toán</h5>
                                <h5 class="font-weight-bold"><?php echo $formatted_totalprice ?></h5>
                            </div>
                        <?php
                                }
                        ?>
                        </div>
                    </div>

                    </form>
                    <form action="" method="POST">
                        <div class="card border-secondary mb-5">
                            <div class="card-header border-0">
                                <h4 class="font-weight-semi-bold m-0">Payment</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" name="payment" id="cashpayment" required>
                                        <label class="custom-control-label" for="cashpayment">Tiền mặt</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" name="payment" id="directcheck" required>
                                        <label class="custom-control-label" for="directcheck">Chuyển khoản</label>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer border-secondary bg-transparent">
                                <button type="button" class="btn btn-lg btn-block btn-secondary font-weight-bold my-3 py-3 po" name="order" id="checkout">Thanh toán</button>
                                <img src="./img/qr.png" alt="" style="width: 80px; height:80px;">
                                <img src="./img/vnpay.png" alt="" style="width: 80px; height:80px;">

                                <img src="./img/visa.png" alt="" style="width: 80px; height:80px;">
                                <img src="./img/napas.png" alt="" style="width: 80px; height:80px;">
                            </div>
                        </div>
                        <!-- Add QR Code Image Here -->
                        <div id="qrCodeContainer" class="qrCodeContainer" style="display:none; text-align: center; margin-top: 20px;">
                            <p>Ngân Hàng: TPBANK</p>
                            <p>Số Tài Khoản: 123456</p>
                            <p>Chủ Khoản: CTY CP RUOU HUDUOAI</p>
                            <img src="./img/qr.png" alt="QR Code" style="max-width: 50%;">
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <script>
            const btnCheckout = document.getElementById("checkout");
            const btnSubmit = document.getElementById("submit");

            // add event listener to Form 1 button
            btnCheckout.addEventListener("click", () => {
                // simulate a click event on Form 2 button
                btnSubmit.click();
            });
        </script>

        <script>
            const radioButtons = document.querySelectorAll('input[name="payment"]');
            const textValue = document.getElementById('uAdd');

            radioButtons.forEach(radio => {
                radio.addEventListener('change', () => {
                    if (radio.checked && radio.value === 'home') {
                        textValue.required = true;
                    } else {
                        textValue.required = false;
                    }
                });
            });
        </script>
        <!-- Checkout End -->
    </main>
    <?php
    include('./view/footer.php')
    ?>