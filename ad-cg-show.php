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
                            <h6 class="mb-4">Danh Sách Loại Sản Phẩm</h6>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Stt</th>
                                            <th scope="col">ID</th>
                                            <th scope="col">Tên loại sản phẩm</th>
                                            <th scope="col">Tuỳ biến</th>
                                        </tr>
                                        <?php 
                        $select = mysqli_query($con, "SELECT* FROM `btl_catalog`  ORDER BY catalog_id ASC");
                        $i=0;
                        while($c = mysqli_fetch_array($select)){
                            $i+=1;
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

                                    </thead>
                                    <tbody>
                                    <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $c['catalog_id'] ?></td>
                            <td><?php echo $c['catalog_name'] ?></td>
                            <td><a href="admin_catalog_del.php?id=<?php echo $c['catalog_id'];?>" onclick="return confirm('Có chắc muốn xoá chứ?')">Xoá</a></td> 

                            <?php }?>
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