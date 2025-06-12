<?php
ob_start();
session_start();
include('./includes/connect.php');
include('./function/common_functions.php');
$uid = $_SESSION['user_id'];
$id = $_GET['id'];
$select = mysqli_query($con, "SELECT * FROM `btl_product` WHERE `product_id` = '$id'");

while ($c = mysqli_fetch_array($select)) {
    $id = $c['product_id'];
    $name = $c['product_name'];
    $price = $c['product_price'];
    $amount = $c['product_amount'];
    $capacity = $c['product_ capacity'];
    $abv = $c['product_ABV'];
    $place = $c['product_place'];
    $img = $c['product_img'];
    $description = $c['product_description'];
}

include('./view/header.php') ;

?>





<link rel="stylesheet" href="css/detail.css">
<main>
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Shop Detail</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item active text-white">Shop Detail</li>
        </ol>
    </div>

    <div class="container-fluid py-5 mt-5">
        <div class="container py-5">
            <div class="row g-4 mb-5">
                <div class="col-lg-8 col-xl-12">
                    <form action="" method="post">
                        <div class="row g-4">
                            <?php
                                if(isset($_POST['add_cart'])){
                                    $quan = $_POST['quan'];
                                    $search = mysqli_query($con, "Select * from btl_cart where name = '$name'");
                                    $row = mysqli_fetch_row($search);
         
                                    if($row>0){
                                        $se_quan = mysqli_query($con, "Select * from btl_cart where name = '$name'");
                                        while ($oldquan = mysqli_fetch_array($se_quan)) {
                                            $newquan = $oldquan['quantity'] + $quan;

                                        $update_query = "UPDATE `btl_cart` SET `quantity` = '$newquan'  WHERE `btl_cart`.`name` = '$name'; ";
                                        $sql_execute = mysqli_query($con, $update_query);}
                                        }
                                        else
                                        {
                                        $insert_query = "INSERT INTO `btl_cart` (`user_id`, `name`, `price`, `image`, `quantity`) VALUES ('$uid', '$name', '$price', '$img', '$quan') ";
                                        $sql_execute = mysqli_query($con, $insert_query);
                                        if ($sql_execute) {
                                            $message = "Đã thêm vào sản phẩm";
                                            echo "<script type='text/javascript'>alert('$message');";
                                            echo "window.location.href='product-detail.php?id=$id';";
                                            echo "</script>";
                                        }
                                    }
                                    
                                }

                                if(isset($_POST['buy'])){
                                    $quan = $_POST['quan'];
                                    $search = mysqli_query($con, "Select * from btl_cart where name = '$name'");
                                    $row = mysqli_fetch_row($search);
         
                                    if($row>0){
                                        $se_quan = mysqli_query($con, "Select * from btl_cart where name = '$name'");
                                        while ($oldquan = mysqli_fetch_array($se_quan)) {
                                            $newquan = $oldquan['quantity'] + $quan;

                                        $update_query = "UPDATE `btl_cart` SET `quantity` = '$newquan'  WHERE `btl_cart`.`name` = '$name'; ";
                                        $sql_execute = mysqli_query($con, $update_query);}
                                        if($sql_execute){
                                            header('location:cart.php');
                                        }
                                        }
                                        else
                                        {
                                        $insert_query = "INSERT INTO `btl_cart` (`user_id`, `name`, `price`, `image`, `quantity`) VALUES ('$uid', '$name', '$price', '$img', '$quan') ";
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
                                <div class="border rounded">
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
                                    Giá: <?php echo $price; ?>
                                </p>
                                <i class="fa fa-star text-secondary"></i>
                                <i class="fa fa-star text-secondary"></i>
                                <i class="fa fa-star text-secondary"></i>
                                <i class="fa fa-star text-secondary"></i>
                                <i class="fa fa-star text-secondary "></i>

                                <p class="mb-3">Xuất xứ: <?php echo $place ?></p>
                                <p class="mb-3">Nồng độ: <?php echo $abv ?>&deg;</p>
                                <p class="mb-5">Dung tích: <?php echo $capacity ?>ML</p>
                                <p >Mô tả: </p>
                                <div class="tab-pane active" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                                <p><?php echo $description ?></p>
                                </div>
                                <div class="input-group quantity mb-5" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-minus rounded-circle bg-light border">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>

                                    <input type="text" name="quan" class="form-control form-control-sm text-center border-0" value="1">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-plus rounded-circle bg-light border">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                
                                <div class="action">
                                    <input type="submit" name="add_cart" class="btn" value="Thêm vào giỏ">
                                    <input type="submit" name="buy" class="btn" value="Mua ngay">
                                </div>
                            </div>
                    </form>
                    <div class="col-lg-12">
                        <nav>
                            <div class="nav nav-tabs mb-3">
                                <button class="nav-link active border-white border-bottom-0" type="button" role="tab" id="nav-about-tab" data-bs-toggle="tab" data-bs-target="#nav-about" aria-controls="nav-about" aria-selected="flase">Đánh giá</button>
                                <button class="nav-link border-white border-bottom-0" type="button" role="tab" id="nav-mission-tab" data-bs-toggle="tab" data-bs-target="#nav-mission" aria-controls="nav-mission" aria-selected="flase">Đánh giá</button>
                                <button class="nav-link border-white border-bottom-0" type="button" role="tab" id="nav-comment-tab" data-bs-toggle="tab" data-bs-target="#nav-comment" aria-controls="nav-comment" aria-selected="true">Các đánh giá khác (0)</button>
                            </div>
                        </nav>
                        <div class="tab-content mb-5">
                            
                            <div class="tab-pane" id="nav-mission" role="tabpanel" aria-labelledby="nav-mission-tab">
                                <form action="#">
                                    <h4 class="mb-5 fw-bold">Leave a Reply</h4>

                                    <div class="col-lg-12">
                                        <div class="border-bottom rounded my-4">
                                            <textarea name="" id="" class="form-control border" cols="30" rows="8" placeholder="Your Review *" spellcheck="false"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="d-flex justify-content-between py-3 mb-5">

                                            <a href="#" class="btn border border-secondary text-primary rounded-pill px-4 py-3"> Post Comment</a>
                                        </div>
                                    </div>

                                </form>
                            </div>

                            <div class="tab-pane" id="nav-comment" role="tabpanel" aria-labelledby="nav-comment-tab">
                                <form action="#">
                                    <h4 class="mb-5 fw-bold">Leave a Reply</h4>

                                    <div class="col-lg-12">
                                        <div class="border-bottom rounded my-4">
                                            <textarea name="" id="" class="form-control border" cols="30" rows="8" placeholder="Your h *" spellcheck="false"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="d-flex justify-content-between py-3 mb-5">

                                            <a href="#" class="btn border border-secondary text-primary rounded-pill px-4 py-3"> Post Comment</a>
                                        </div>
                                    </div>

                                </form>
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