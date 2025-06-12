<?php
ob_start();
session_start();
include('./includes/connect.php');
include('./function/common_functions.php');
include('./view/header2.php');

?>





<!-- Table Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-10">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Sửa Sản Phẩm</h6>
                <label for="floatingSelect">Chọn Loại Sản Phẩm</label>



                <div class="form-floating mb-3">
                    <form action="" method="post">
                        <?php
                        $id = $_GET['id'];

                        $select = mysqli_query($con, "SELECT btl_product.*, btl_catalog.catalog_name FROM `btl_product` INNER JOIN btl_catalog on btl_product.catalog_id = btl_catalog.catalog_id where product_id = '$id'");
                        while ($c = mysqli_fetch_array($select)) {
                            $product_id = $c['product_id'];
                            $catalog_name = $c['catalog_name'];
                            $product_name = $c['product_name'];
                            $product_price = $c['product_price'];
                            $product_new_price = $c['product_new_price'];
                            $product_amount = $c['product_amount'];
                            $product_capacity = $c['product_ capacity'];
                            $product_ABV = $c['product_ABV'];
                            $product_place = $c['product_place'];
                            $product_img = $c['product_img'];
                            $product_description = $c['product_description'];
                        ?>
                            <select name="fctg_id" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                <?php
                                $catalog = mysqli_query($con, "Select * from btl_catalog");
                                while ($c = mysqli_fetch_array($catalog)) {
                                ?>

                                    <option value="<?php echo $c['catalog_id'] ?>"><?php echo $c['catalog_name'] ?></option>
                                <?php } ?>

                            </select>


                </div>


                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Nhập Tên Loại sản phẩm</label>
                    <input required type="text" name="fproduct_name" class="form-control" id="exampleInputPassword1" value="<?php echo $product_name ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Nhập Giá</label>
                    <input required type="text" name="fproduct_price" class="form-control" id="exampleInputPassword1" value="<?php echo $product_price ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Nhập Giá Khuyến Mại</label>
                    <input required type="text" name="fproduct_new_price" class="form-control" id="exampleInputPassword1" value="<?php echo $product_new_price ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Nhập Số Lượng</label>
                    <input required type="text" name="fproduct_amount" class="form-control" id="exampleInputPassword1" value="<?php echo $product_amount ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Nhập Dung Tích</label>
                    <input required type="text" name="fproduct_capacity" class="form-control" id="exampleInputPassword1" value="<?php echo $product_capacity ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Nhập Nồng Độ</label>
                    <input required type="text" name="fproduct_ABV" class="form-control" id="exampleInputPassword1" value="<?php echo $product_ABV ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Nhập Nơi Sản Xuất</label>
                    <input required type="text" name="fproduct_place" class="form-control" id="exampleInputPassword1" value="<?php echo $product_place ?>">
                </div>
                <div class="image-upload">
                    <div class="image-upload">
                        <input id="image-input" class="file-input visually-hidden" type="file" accept="image/*" onchange="displayFileName(this)">
                        <label for="image-input" class="file-label">Chọn ảnh: </label>
                        <span id="file-name-span"><?php echo $product_img ?></span>
                        <input type="text" name="fproduct_img" id="file-name-input" value="<?php echo $product_img ?>" class="file-input visually-hidden">
                        <img id="preview-image" src="img/<?php echo $product_img ?>" alt="Preview Image" class="preview-image">
                    </div>

                    <style>
                        .file-label {
                            padding: 5px 3px;
                            border: 1px solid #000;
                            background: #ddd;
                            color: #000;
                            cursor: pointer;
                        }

                        .visually-hidden {
                            position: absolute;
                            width: 1px;
                            height: 1px;
                            padding: 0;
                            margin: -1px;
                            overflow: hidden;
                            clip: rect(0, 0, 0, 0);
                            border: 0;
                        }
                    </style>

                    <script>
                        function displayFileName(input) {
                            const fileName = input.files[0].name;
                            document.getElementById('file-name-span').textContent = fileName;
                            document.getElementById('file-name-input').value = fileName;
                        }
                    </script>

                </div>
                <br>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Nhập Mô tảt</label>
                    <input required type="text" name="fproduct_description" class="form-control" id="exampleInputPassword1" value="<?php echo $product_description ?>">
                </div>
            <?php }

            ?>

            <script>
                function confirmBox(message) {
                    if (confirm(message)) {
                        return true;
                    } else {
                        return false;
                    }
                }
            </script>
            <button type="submit" class="btn btn-primary" name="btnSubmit">Sửa</button>
            </form>
            </div>
        </div>
    </div>
</div>
<?php
if (isset($_POST['btnSubmit'])) {
    $catalog_id = $_POST['fctg_id'];
    $product_name = $_POST['fproduct_name'];
    $product_price = $_POST['fproduct_price'];
    $product_new_price = $_POST['fproduct_new_price'];
    $product_amount = $_POST['fproduct_amount'];
    $product_capacity = $_POST['fproduct_capacity'];
    $product_ABV = $_POST['fproduct_ABV'];
    $product_place = $_POST['fproduct_place'];
    $product_description = $_POST['fproduct_description'];
    $product_img = $_POST['fproduct_img'];

    $sqlque = mysqli_query($con, "select * from btl_catalog where catalog_id = $catalog_id");
    $c2 = mysqli_fetch_array($sqlque);
    $catalog_name = $c2['catalog_name'];

    $sql = "UPDATE `btl_product` SET `catalog_id` = '$catalog_id', `product_name` = '$product_name', `catalog_name` = '$catalog_name', `product_price` = '$product_price', `product_amount` = '$product_amount', `product_ capacity` = '$product_capacity', `product_ABV` = '$product_ABV', `product_place` = '$product_place', `product_description` = '$product_description', `product_img` = '$product_img', `product_new_price` = '$product_new_price' WHERE `btl_product`.`product_id` = $id";


    $resul = mysqli_query($con, $sql);

    mysqli_close($con);

    header("location: ad-pr-show.php");
}
?>
</div>
<!-- Content End -->


<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="lib/chart/chart.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>
<script src="lib/tempusdominus/js/moment.min.js"></script>
<script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
<script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- Template Javascript -->
<script src="js/main1.js"></script>
<script src="js/main.js"></script>
</body>

</html>