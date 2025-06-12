<?php
ini_set("display_errors", 0);

$u_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];

if (isset($_GET['logout'])) {

    unset($id);
    session_destroy();
    header("location:index.php");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HUDUOAI</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- owl caroul -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="./lib/slick/slick.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" -->
    <!-- /> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer"
    /> -->
    <link rel="stylesheet" href="./lib/slick/slick-theme.css">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/all.css">
    <link rel="stylesheet" href="./BTL/fontawesome-web/css/solid.css">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="./lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="./lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">



    <!-- Customized Bootstrap Stylesheet -->
    <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="css1/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <!-- <link href="css/duong.css" rel="stylesheet"> -->
    <link rel="icon" href="../img/huduoai.png">


</head>
<style>

</style>

<body>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <header>
        <div class="container-fluid bg-dark fixed-top">
            <div class="container topbar bg-light d-none d-lg-block ">
            <div class="d-flex justify-content-between">
                    <div class="top-info ps-2">
                        <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="#" class="text-dark">218 Lĩnh Nam / 296 Lĩnh Nam,</a></small>
                        <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#" class="text-dark">HUDUOAI@gmail.com</a></small>
                    </div>
                    <div class="top-link pe-2">
                        <a href="#" class="text-dark"><small class="text-dark mx-2">An Toàn</small>/</a>
                        <a href="#" class="text-dark"><small class="text-dark mx-2">Uy Tín</small>/</a>
                        <a href="#" class="text-dark"><small class="text-dark ms-2">Chất Lượng</small></a>
                    </div>
                </div>
            </div>
            <div class="container px-0">
                <nav class="navbar navbar-light bg-dark navbar-expand-xl ">
                    <a href="index.php"><img src="./img/huduoai-logo.png" class="img-fluid"style="height: 50px" alt="logo"></a>

                    <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars text-primary"></span>
                    </button>
                    <div class="collapse navbar-collapse bg-dark" id="navbarCollapse">
                        <div class="navbar-nav mx-auto">
                            <a href="index.php" class="nav-item nav-link">Trang chủ</a>
                            <a href="shop.php" class="nav-item nav-link">Sản phẩm</a>
                            <div class="menu-dropdown">
                                <a href="shop.php" class="nav-item nav-link">Danh mục <i class="fa-solid fa-caret-down"></i></a>
                                <div class="menu-dropdown-content">
                                    <?php
                                    $sel_ca = mysqli_query($con, 'select * from btl_catalog');
                                    while ($SEcatalog = mysqli_fetch_array($sel_ca)) {

                                    ?>
                                        <div class="column">
                                            <a href="" class="fw-bold border-bottom"><?php echo $SEcatalog['catalog_name']; ?></a>
                                            <?php
                                            $sel_pro = mysqli_query($con, 'select * from btl_product where catalog_id=' . $SEcatalog["catalog_id"]);
                                            while ($SEproduct = mysqli_fetch_array($sel_pro)) {
                                            ?>
                                                <a href="product-detail.php?id=<?php echo $SEproduct['product_id'] ?>"><?php echo $SEproduct['product_name'] ?></a>

                                            <?php
                                            }
                                            ?>
                                        </div>
                                    <?php
                                    }
                                    ?>

                                </div>
                            </div>

                            <a href="contact.php" class="nav-item nav-link">Liên hệ</a>
                        </div>
                        <!-- search -->
                        <div class="d-flex m-3  ">
                            <form action="shop.php" id="search" method="post">
                                <div class="search d-flex me-4">

                                    <input type="text" name="key" id="key" class="search-text" placeholder="Search?" required>

                                    <button type="button" name="searchpro" id="search" class="btn-search btn border border-secondary btn-md-square rounded-circle bg-white " onclick="submitForm()" keydown()>
                                        <i class="fas fa-search text-dark"></i>
                                    </button>
                                </div>
                            </form>
                            <!-- search end -->
                            <?php
                            $se_pro_num = mysqli_query($con, "Select * from btl_cart where user_id = '$u_id'");

                            ?>
                            <a href="cart.php" class="position-relative me-4 my-auto">
                                <i class="fa-light fa-bag-shopping-minus icon-header"></i>
                                <span class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1" style="top: -5px; left: 15px; height: 20px; min-width: 20px;"><?php echo mysqli_num_rows($se_pro_num) ?></span>
                            </a>

                            <!-- <a href="#" class="my-auto">
                                <i class="fas fa-user fa-2x " data-bs-toggle="dropdown"></i>
                                </a> -->
                            <div class="dropdown position-relative me-4 my-auto" style="float:right; margin-top: 7px;">
                                <a href="#" class="my-auto">
                                    <i class="fa-light fa-user icon-header" data-bs-toggle="dropdown"></i>
                                    
                                </a>
                                <div class="dropdown-content ">
                                    <div class="account">
                                    <?php
                                    if(!isset($id))
                                    { echo"<span>Tài Khoản</span>";

                                    }else{
                                        echo"<span>$user_name</span>";
                                    }
                                    
                                    ?> 

                                    </div>
                               
                                    <?php
                                    if (!isset($id)) {
                                        echo '<a href="register.php">Đăng ký</a>';
                                        echo '<a href="login.php">Đăng nhập</a>';
                                    } else {
                                        echo '<a href="?logout=<?php echo $id;?>">Đăng xuất</a>';
                                    }
                                    ?>

                                </div>
                            </div>

                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>

    <script>
        function confirmBox(message) {
            if (confirm(message)) {
                return true;
            } else {
                return false;
            }
        }

        function submitForm() {
            var inputValue = document.getElementById("key").value;
            document.getElementById("search").action = "shop.php?key=" + inputValue;
            document.getElementById("search").submit();
        }
        document.getElementById('search').addEventListener('keypress', function(event) {
        if (event.keyCode === 13) {
            var inputValue = document.getElementById("key").value;
            document.getElementById("search").action = "shop.php?key=" + inputValue;
            document.getElementById("search").submit();
        }
        });
    </script>