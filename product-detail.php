<?php
ob_start();
session_start();
include('./includes/connect.php');
include('./function/common_functions.php');
$uid = $_SESSION['user_id'];
$id = $_GET['id'];

if (!isset($uid)) {
    header("Location: login.php");
    exit();
}
$select = mysqli_query($con, "SELECT * FROM `btl_product` WHERE `product_id` = '$id'");

while ($c = mysqli_fetch_array($select)) {
    $id = $c['product_id'];
    $name = $c['product_name'];

    if ($c['product_new_price'] != 0) {
        $price = $c['product_new_price'];
    } else {
        $price = $c['product_price'];
    }
    $amount = $c['product_amount'];
    $capacity = $c['product_ capacity'];
    $abv = $c['product_ABV'];
    $place = $c['product_place'];
    $img = $c['product_img'];
    $description = $c['product_description'];
}

$gUsernameQr = mysqli_query($con, "select * from user_table where user_id = '$uid'");
while ($gUsername = mysqli_fetch_array($gUsernameQr)) {
    $Username = $gUsername['user_name'];
}

if (isset($_POST['comment'])) {
    $uCmt = $_POST['uCmt'];

    $sql_cmt = mysqli_query($con, "INSERT INTO `btl_comment` (`cmt_id`, `user_id`,`product_id`,`user_name`, `cmt_content`, `cmt_time`) VALUES (NULL, '$uid','$id','$Username',  '$uCmt', current_timestamp())");
}

include('./view/header.php');


?>





<link rel="stylesheet" href="css/detail.css">
<main>
<div class="container-fluid bg-secondary mb-5" style="margin-top: 100px; background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.5)), url(img/banner8.jpg) center center; ">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3 " style="font-weight:700;">HUDUOAI</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a style="color: var(--bs-primary);" href="index.php">Trang chủ</a></p>
                <p class="m-0 px-2">>></p>
                <p class="m-0 fw-bold">Chi tiết sản phẩm</p>
            </div>
        </div>
    </div>

    <div class="container-fluid py-5 mt-5">
        <div class="container py-5">
            <div class="row g-4 mb-5">
                <div class="col-lg-8 col-xl-12">
                    <form action="" method="post">
                        <div class="row g-4">
                            <?php
                            if (isset($_POST['add_cart'])) {
                                $quan = $_POST['quan'];
                                $search = mysqli_query($con, "Select * from btl_cart where name = '$name'");
                                $row = mysqli_fetch_row($search);

                                if ($row > 0) {
                                    $se_quan = mysqli_query($con, "Select * from btl_cart where name = '$name'");
                                    while ($oldquan = mysqli_fetch_array($se_quan)) {
                                        $newquan = $oldquan['quantity'] + $quan;

                                        $update_query = "UPDATE `btl_cart` SET `quantity` = '$newquan'  WHERE `btl_cart`.`name` = '$name'; ";
                                        $sql_execute = mysqli_query($con, $update_query);
                                    }
                                } else {
                                    $insert_query = "INSERT INTO `btl_cart` (`user_id`, product_id, `name`, `price`, `image`, `quantity`) VALUES ('$uid','$id', '$name', '$price', '$img', '$quan') ";
                                    $sql_execute = mysqli_query($con, $insert_query);
                                    if ($sql_execute) {
                                        $message = "Đã thêm vào sản phẩm";
                                        echo "<script type='text/javascript'>alert('$message');</script>";
                                    }
                                }
                            }

                            if (isset($_POST['buy'])) {
                                $quan = $_POST['quan'];
                                $search = mysqli_query($con, "Select * from btl_cart where name = '$name'");
                                $row = mysqli_fetch_row($search);

                                if ($row > 0) {
                                    $se_quan = mysqli_query($con, "Select * from btl_cart where name = '$name'");
                                    while ($oldquan = mysqli_fetch_array($se_quan)) {
                                        $newquan = $oldquan['quantity'] + $quan;

                                        $update_query = "UPDATE `btl_cart` SET `quantity` = '$newquan'  WHERE `btl_cart`.`name` = '$name'; ";
                                        $sql_execute = mysqli_query($con, $update_query);
                                    }
                                    if ($sql_execute) {
                                        header('location:cart.php');
                                    }
                                } else {
                                    $insert_query = "INSERT INTO `btl_cart` (`user_id`, product_id, `name`, `price`, `image`, `quantity`) VALUES ('$uid','$id', '$name', '$price', '$img', '$quan') ";
                                    $sql_execute = mysqli_query($con, $insert_query);
                                    if ($sql_execute) {
                                        $message = "Đã thêm vào sản phẩm";
                                        echo "<script type='text/javascript'>alert('$message');</script>";
                                        header('location:cart.php');
                                    }
                                }
                            }
                            ?>
                            <div class="col-lg-6">
                                <div class="border rounded img-product">
                                    <a href="#">
                                        <img src="img/<?php echo $img; ?>" class="img-fluid rounded" alt="Image">
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <h1 class="fw-bold mb-3" style="border-bottom: 3px solid #000;">
                                    <?php echo $name; ?>
                                </h1>
                                <p class="mb-3">
                                    <?php
                                    $formatted_price = number_format($price, 0, '.', ',') . ' VNĐ';
                                    ?>
                                    Giá: <?php echo $formatted_price; ?>
                                </p>
                                <i class="fa fa-star text-secondary"></i>
                                <i class="fa fa-star text-secondary"></i>
                                <i class="fa fa-star text-secondary"></i>
                                <i class="fa fa-star text-secondary"></i>
                                <i class="fa fa-star text-secondary "></i>

                                <p class="mb-3">Xuất xứ: <?php echo $place ?></p>
                                <p class="mb-3">Nồng độ: <?php echo $abv ?>&deg;</p>
                                <p class="mb-3">Dung tích: <?php echo $capacity ?>ML</p>
                                <p class="mb-3">Mô tả: </p>
                                <p class="mb-5" style="font-size:18px;"><?php echo $description ?></p>
                                <div class="input-group quantity mb-5" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-minus rounded-circle bg-light border">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>

                                    <input type="number" name="quan" min="1" max="<?php echo $amount ?>" oninput="setCustomValidity('')" class="form-control form-control-sm text-center border-0" value="1">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-plus rounded-circle bg-light border">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="action">
                                    <input type="submit" name="add_cart" class="btn btn-add-cart" value="Thêm vào giỏ">
                                    <input type="submit" name="buy" class="btn btn-add-cart" value="Mua ngay">
                                </div>
                            </div>

                            <script>
                                document.addEventListener("DOMContentLoaded", function() {
                                    var elements = document.getElementsByTagName("INPUT");
                                    for (var i = 0; i < elements.length; i++) {
                                        elements[i].oninvalid = function(e) {
                                            e.target.setCustomValidity("");
                                            if (!e.target.validity.valid) {
                                                e.target.setCustomValidity("Sản phẩm trong kho còn <?php echo $amount ?>");
                                            }
                                        };
                                        elements[i].oninput = function(e) {
                                            e.target.setCustomValidity("");
                                        };
                                    }
                                })
                            </script>
                    </form>
                    <div class="col-lg-12">
                        <nav>
                            <div class="nav nav-tabs mb-3">
                                <button class="nav-link active text-secondary  border-white border-bottom-0" type="button" role="tab" id="nav-mission-tab" data-bs-toggle="tab" data-bs-target="#nav-mission" aria-controls="nav-mission" aria-selected="true">Đánh giá</button>
                                <?php
                                $gCmtQr = mysqli_query($con, "select * from btl_comment where product_id = '$id'");

                                ?>
                                <button class="nav-link  text-secondary border-white border-bottom-0" type="button" role="tab" id="nav-comment-tab" data-bs-toggle="tab" data-bs-target="#nav-comment" aria-controls="nav-comment" aria-selected="true">Các phản hồi khác (<?php echo mysqli_num_rows($gCmtQr); ?>)</button>

                                <?php  ?>
                            </div>
                        </nav>
                        <div class="tab-content mb-5">
                            <div class="tab-pane active" id="nav-mission" role="tabpanel" aria-labelledby="nav-mission-tab">
                                <form action="" method="POST">
                                    <?php




                                    ?>
                                    <h4 class="mb-5 fw-bold">Để lại đánh giá</h4>
                                    <div class="col-lg-12">
                                        <div class="border-bottom rounded my-4">
                                            <textarea name="uCmt" id="" class="form-control border" cols="30" rows="8" placeholder="Đánh giá của bạn" spellcheck="false"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="d-flex justify-content-between py-3 mb-5">

                                            <button type="submit" name="comment" class="btn border border-secondary text-primary rounded-pill px-4 py-3">Đánh giá</button>
                                        </div>
                                    </div>

                                </form>
                            </div>

                            <div class="tab-pane" id="nav-comment" role="tabpanel" aria-labelledby="nav-comment-tab">
                                <div class="row ">


                                    <div class="col-md-12">
                                        <div class="media mb-4">

                                            <div class="media-body">
                                                <?php
                                                $gCmtQr = mysqli_query($con, "select * from btl_comment where product_id = '$id'");

                                                while ($se_cmt = mysqli_fetch_array($gCmtQr)) {
                                                ?>
                                                    <h6>User: <?php echo $se_cmt['user_name'] ?><small> - <i><?php echo $se_cmt['cmt_time'] ?></i></small></h6>
                                                    <p><?php echo $se_cmt['cmt_content'] ?></p>

                                                <?php
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

        </div>
    </div>
    </div>


</main>
<?php
include("./view/footer.php");
?>