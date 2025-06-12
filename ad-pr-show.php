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

                    <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Quản Lý Tài Khoản</h6>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>

                                            <th scope="col">ID</th>
                                            <th scope="col">Loại sản phẩm</th>
                                            <th scope="col">Tên sản phẩm</th>
                                            <th scope="col">Giá thành</th>
                                            <th scope="col">Giá khuyến mại</th>
                                            <th scope="col">Số lượng</th>
                                            <th scope="col">Dung tích</th>
                                            <th scope="col">Nồng độ</th>
                                            <th scope="col">Nơi sản xuất</th>
                                            <th scope="col">Ảnh</th>
                                            <th scope="col">Mô tả</th>
                                            <th scope="col">Tuỳ biến</th>
                                        </tr>
                                        <?php
                                        $select = mysqli_query($con, "SELECT btl_product.*, btl_catalog.catalog_name FROM `btl_product` INNER JOIN btl_catalog on btl_product.catalog_id = btl_catalog.catalog_id ORDER BY btl_catalog.catalog_id ASC");
                                        $i = 0;
                                        while ($c = mysqli_fetch_array($select)) {

                                        ?>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <?php echo $c['product_id'] ?>
                                            </td>
                                            <td>
                                                <?php echo $c['catalog_name'] ?>
                                            </td>
                                            <td>
                                                <?php echo $c['product_name'] ?>
                                            </td>
                                            <td>
                                                <?php echo $c['product_price'] ?>
                                            </td>
                                            <td>
                                                <?php echo $c['product_new_price'] ?>
                                            </td>
                                            <td>
                                                <?php echo $c['product_amount'] ?>
                                            </td>
                                            <td>
                                                <?php echo $c['product_ capacity'] ?>
                                            </td>
                                            <td>
                                                <?php echo $c['product_ABV'] ?>
                                            </td>
                                            <td>
                                                <?php echo $c['product_place'] ?>
                                            </td>
                                            <td>
                                                <?php echo $c['product_img'] ?>
                                            </td>
                                            <td>
                                                <?php echo $c['product_description'] ?>
                                            </td>
                                            <td><a href="admin_product_del.php?id=<?php echo $c['product_id']; ?>" onclick="return confirm('Có chắc muốn xoá chứ?')">Xoá</a>|<a href="ad-pr-fix.php?id=<?php echo $c['product_id']; ?>" onclick="return confirm('Có muốn sửa chứ?')">Sửa</a></td>

                                        <?php } ?>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Table End -->

            <!-- Footer Start -->

            <!-- Footer End -->
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
</body>

</html>