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
                            <h6 class="mb-4">Thêm Loại Sản Phẩm</h6>
                            <label for="floatingSelect">Chọn Loại Sản Phẩm</label>

                           

                                <div class="form-floating mb-3">
                                     <form action="" method="post">
                                        <select name="ctg_id" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                            <?php
                                            $catalog = mysqli_query($con, "Select * from btl_catalog");
                                            while ($c = mysqli_fetch_array($catalog)) {
                                            ?>

                                                <option value="<?php echo $c['catalog_id'] ?>"><?php echo $c['catalog_name'] ?></option>
                                            <?php } 
                                            
                                            ?>
                                                
                                        </select>
                                        </select>
                                    
                                </div>
                               

                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Nhập Tên Loại sản phẩm</label>
                                    <input required type="text" name="product_name" class="form-control" id="exampleInputPassword1">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Nhập Giá</label>
                                    <input required type="text" name="product_price" class="form-control" id="exampleInputPassword1">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Nhập Giá Giảm</label>
                                    <input required type="text" name="product_new_price" class="form-control" id="exampleInputPassword1">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Nhập Số Lượng</label>
                                    <input required type="text" name="product_amount" class="form-control" id="exampleInputPassword1">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Nhập Dung tích</label>
                                    <input required type="text" name="product_capacity" class="form-control" id="exampleInputPassword1">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Nhập Năm Sản Xuất</label>
                                    <input required type="text" name="product_ABV" class="form-control" id="exampleInputPassword1">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Nhập Nơi Sản Xuất</label>
                                    <input required type="text"name="product_place" class="form-control" id="exampleInputPassword1">
                                </div>
                                <div class="image-upload">
                                        <input name="product_img" id="image-input" class="file-input" type="file" accept="image/*">

                                        <img id="preview-image" src="#" alt="Preview Image" class="preview-image">
                                    </div>
                                    <br>
                            <textarea name="product_description" cols="38" rows="4" placeholder="Nhập mô tả"></textarea><br>

                                <script>
                                    function confirmBox(message) {
                                        if (confirm(message)) {
                                            return true;
                                        } else {
                                            return false;
                                        }
                                    }
                                </script>
                                <button type="submit" class="btn btn-primary" name="btnSubmit">Thêm</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php
if (isset($_POST['btnSubmit'])) {
    $catalog_id = $_POST['ctg_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_new_price = $_POST['product_new_price'];
    $product_amount = $_POST['product_amount'];
    $product_capacity = $_POST['product_capacity'];
    $product_ABV = $_POST['product_ABV'];
    $product_place = $_POST['product_place'];
    $product_description = $_POST['product_description'];
    $product_img = $_POST['product_img'];

    $sqlque = mysqli_query($con, "select * from btl_catalog where catalog_id = $catalog_id");
    $c2 = mysqli_fetch_array($sqlque);
    $catalog_name = $c2['catalog_name'];




    $sql = "INSERT INTO `btl_product` (`product_id`, `catalog_id`, `product_name`,`catalog_name`, `product_new_price`, `product_price`, `product_amount`, `product_ capacity`, `product_ABV`, `product_place`, `product_description`, `product_img`) VALUES ('', '$catalog_id','$product_name' , '$catalog_name ', '$product_new_price', '$product_price', '$product_amount', '$product_capacity', '$product_ABV', '$product_place', '$product_description', '$product_img')";


    $resul = mysqli_query($con, $sql);

    mysqli_close($con);
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