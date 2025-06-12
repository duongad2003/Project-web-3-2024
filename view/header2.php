<?php
ini_set("display_errors", 0);

$id = $_SESSION['user_id'];
$name = $_SESSION['user_name'];
if (isset($_GET['logout'])) {

    unset($id);
    session_destroy();
    header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ADMIN-HUDUOAI</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/all.css">
    <link rel="stylesheet" href="./BTL/fontawesome-web/css/solid.css">


    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style1.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative bg-white d-flex p-0">

        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="ad-index.php" class="navbar-brand mx-4 mb-3">
                    <img src="./img/demo.png" alt="">
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/avatar.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0"><?php echo $name; ?></h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa-regular fa-users"></i>Tài khoản</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a class="dropdown-item" href="ad-acc-show.php">Danh sách tài khoản</a>
                        </div>
                    </div>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa-solid fa-layer-group me-2"></i></i>Loại sản phẩm</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a class="dropdown-item" href="ad-cg-add.php">Thêm loại sản phẩm </a>
                            <a class="dropdown-item" href="ad-cg-show.php">Danh sách loại sản phẩm</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa-duotone fa-wine-bottle me-2"></i>Sản phẩm</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a class="dropdown-item" href="ad-pr-add.php">Thêm sản phẩm</a>
                            <a class="dropdown-item" href="ad-pr-show.php">Danh sách sản phẩm</a>
                        </div>
                    </div>



                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>

                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">

                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                <img class="rounded-circle me-lg-2" src="img/avatar.jpg" alt="" style="width: 40px; height: 40px;">
                                <span class="d-none d-lg-inline-flex"><?php echo $name; ?></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                                <?php
                                if (!isset($id)) {
                                    echo '<a class="dropdown-item" href="register.php">Đăng ký</a>';
                                    echo '<a class="dropdown-item" href="login.php">Đăng nhập</a>';
                                } else {
                                    echo '<a class="dropdown-item" href="?logout=<?php echo $id;?>">Đăng xuất</a>';
                                }
                                ?>

                            </div>
                        </div>
                    </div>
            </nav>
            <!-- Navbar End -->