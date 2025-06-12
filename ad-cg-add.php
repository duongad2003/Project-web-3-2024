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
                <div class="col-sm-12 col-xl-8">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Thêm Loại Sản Phẩm</h6>
                                <div class="form-floating mb-3">

                                <form action="" method="post">
                               
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Nhập Tên Loại sản phẩm</label>
                                    <input required type="text" name="catalog_name" class="form-control" id="exampleInputPassword1">
                                </div>
                                
                            </div>
                               
                                
                                <script>
                                    function confirmBox(message) {
                                        if (confirm(message)) {
                                            return true;
                                        } else {
                                            return false;
                                        }
                                    }
                                </script>
                                <button type="submit" class="btn btn-primary"name="btnSubmit" onclick="return confirm('Thêm loại sản phẩm?')">Thêm</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Table End -->

            <!-- Footer Start -->

            <!-- Footer End -->
        </div>
        <!-- Content End -->
        <?php
    if (isset($_POST['btnSubmit'])) {
        $ctg_id = $_POST["ctg_id"];
        $catalog_name = $_POST["catalog_name"];

        $sql = "insert into btl_catalog (catalog_id, catalog_name) values ('','$catalog_name')";

        $resul = mysqli_query($con, $sql);

        mysqli_close($con);
    }
    ?>

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