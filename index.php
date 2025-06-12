<?php
ini_set('display_errors', 0);
ob_start();
session_start();
include('./includes/connect.php');
include('./function/common_functions.php');
unset($_SESSION['catalogQueryPart']);
unset($_SESSION['priceQueryPart']);
$id = $_SESSION['user_id'];

include('./view/header.php')
?>
<link rel="stylesheet" href="css/index.css">
<link rel="stylesheet" href="css/brand.css">

<main class="main ">


    <div class="containerfluid   hero-header">
        <!-- <div class="container py-5"> -->
        <div id="demo" class="carousel slide" data-bs-ride="carousel">

            <!-- Indicators/dots -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
            </div>

            <!-- The slideshow/carousel -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://inwine.vn/_next/image/?url=https%3A%2F%2Fapi.inwine.vn%2Fmedia%2Fmona%2Fbanner%2Fbanner_danh_muc_1.webp&w=1920&q=75" alt="Los Angeles" class="d-block" style="width:100%">
                </div>
                <div class="carousel-item">
                    <img src="https://inwine.vn/_next/image/?url=https%3A%2F%2Fapi.inwine.vn%2Fmedia%2Fmona%2Fbanner%2Fbanner_danh_muc_3.webp&w=1920&q=75" alt="Chicago" class="d-block" style="width:100%">
                </div>
                <div class="carousel-item">
                    <img src="https://inwine.vn/_next/image/?url=https%3A%2F%2Fapi.inwine.vn%2Fmedia%2Fmona%2Fbanner%2Ft5_-2024.png&w=1920&q=75" alt="New York" class="d-block" style="width:100%">
                </div>
            </div>


        </div>

        <!-- </div> -->
    </div>
    <!-- alcohol Shop Start-->
    <div class="brand">
        <div class="container-fluid">
            <div class="brand-slider">
                <div class="brand-item"><img src="img/logo1.webp" alt=""></div>
                <div class="brand-item"><img src="img/logo2.webp" alt=""></div>
                <div class="brand-item"><img src="img/logo3.webp" alt=""></div>
                <div class="brand-item"><img src="img/logo4.webp" alt=""></div>
                <div class="brand-item"><img src="img/logo5.webp" alt=""></div>
                <div class="brand-item"><img src="img/logo6.webp" alt=""></div>
                

                <div class="brand-item"><img src="img/logo7.webp" alt=""></div>

                <div class="brand-item"><img src="img/logo8.webp" alt=""></div>
                <div class="brand-item"><img src="img/logo9.webp" alt=""></div>


            </div>
        </div>
    </div>
    <!-- alcohol Shop End -->
    <!-- review start -->
    <div class="review">


        <p class="title">
            Giới thiệu
        </p>
        <h2 class="title2">
            HUDUOAI
        </h2>
        <p class="content">
            Thành lập năm 1975 tại Việt Nam, là một thương hiệu rượu danh tiếng và chất lượng cao.
            Với hơn bốn thập kỷ kinh nghiệm trong ngành sản xuất rượu, Huduoai đã xây dựng được một danh tiếng vững
            chắc về uy tín và sự tinh tế trong từng giọt rượu. Thương hiệu này không chỉ nổi bật với quy trình sản
            xuất nghiêm ngặt và công nghệ hiện đại, mà còn với sự kết hợp độc đáo giữa truyền thống và sáng tạo.
            Sản phẩm của Huduoai đã chinh phục được lòng tin của người tiêu dùng trong nước và quốc tế, trở thành
            lựa chọn hàng đầu cho những ai đam mê thưởng thức rượu ngon và chất lượng.

        </p>





    </div>
    <!-- review end -->
    <!-- product-special start -->
    <section class="product py-5">
        <div class="product-special">
            <div class="header-ps text-center ">
                <h2 class="title">Sản Phẩm Nổi Bật </h2>
                <h1 class="">Khách Hàng Ưa Chuộng</h1>
            </div>
            
                <div class="container ">
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class=" carousel-item active">
                                <div class=" align-items-center slide ">
                                    <div class=" content text-light ">
                                        <div class="favorite-conten">
                                            <h1 class="favorite-title">RƯỢU CHIVAS</h1>
                                            <p class="text-light">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-regular fa-star"></i>
                                            </p>
                                            <p class="text-light">
                                                Nổi bật trong các dòng rượu ngoại nổi tiếng, Chivas Regal là thương hiệu rượu Whisky Scotch nổi tiếng có nguồn gốc từ Scotland, được biết đến với hương vị cân bằng giữa trái cây với một chút mật ong, vani và gỗ sồi. Rượu Whisky có đặc tính phong phú và sang trọng, với vị khói nhẹ nhàng làm tăng thêm chiều sâu cho hương vị của nó.

                                                Hãng đa dạng về các dòng rượu Chivas 62 gum, Chivas l 21, Chivas Regal 25, Chivas 38 và kết hợp tốt các món ăn mặn và đậm vị như thịt quay, cũng như là một thành phần thú vị trong các loại cocktail như Whisky Sour cổ điển hoặc Old Fashioned.
                                            </p>
                                        </div>

                                        <div class="favorite-list">
                                            <ul>
                                                <li>
                                                    <span>Nồng độ</span>
                                                    <span>13% ABV</span>
                                                </li>
                                                <li>
                                                    <span>Xuất xứ</span>
                                                    <span>Bỉ</span>
                                                </li>
                                                <li>
                                                    <span>Nồng độ</span>
                                                    <span>720ml</span>
                                                </li>
                                                <li>
                                                    <span>Phân hạng</span>
                                                    <span>Cru Bourgeois</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class=" image">
                                        <img src="./img/Chivasregal12_1.png" alt="" style="width: 350px;">
                                    </div>
                                </div>
                            </div>
                            <div class=" carousel-item ">
                                <div class=" align-items-center slide ">
                                    <div class=" content text-light ">
                                        <h1 class="favorite-title">DRB Château Tour Seran</h1>
                                        <p class="text-light">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-regular fa-star"></i>
                                        </p>
                                        <p class="text-light">Chateau Tour Seran dòng vang hội tụ đầy đủ tinh hoa đất trời của vùng Medoc đầy nắng và gió,
                                            bao tâm huyết của nhà làm vang xuất sắc Domaines Rollan de By. Nổi bật với hương thơm quyến rũ của hoa quả chín đỏ,
                                            hương gỗ sồi, cacao, cà phê espresso quyện trong hương vị chát dày và nhung mượt. Một dòng vang đỏ cô đọng với những
                                            tầng hương phức hợp của caramel nướng, đậm đà vị khoáng chất gợn hương gỗ ấm áp. Luôn có mặt trong những bữa tiệc đẳng cấp của giới thượng lưu,
                                            Chateau Tour Seran như một biều tượng sang trọng của sự sang trọng, quyến rũ và thời thượng.</p>

                                        <div class="favorite-list">
                                            <ul>
                                                <li>
                                                    <span>Nồng độ</span>
                                                    <span>13% ABV</span>
                                                </li>
                                                <li>
                                                    <span>Xuất xứ</span>
                                                    <span>Bỉ</span>
                                                </li>
                                                <li>
                                                    <span>Nồng độ</span>
                                                    <span>720ml</span>
                                                </li>
                                                <li>
                                                    <span>Phân hạng</span>
                                                    <span>Cru Bourgeois</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class=" image">
                                        <img src="./img/chateau_tour_seran_1.png" alt="" style="width: 350px;">
                                    </div>
                                </div>
                            </div>
                            <div class=" carousel-item ">
                                <div class=" align-items-center slide ">
                                    <div class=" content text-light ">
                                        <h1 class="favorite-title">L'Hirondelle de Faugeres</h1>
                                        <p class="text-light">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-regular fa-star"></i>
                                        </p>
                                        <p class="text-light">Chateau Tour Seran ban đầu có diện tích 15 ha và thuộc sở hữu của Marquis de Ségur,
                                            người được vua Louis XV vinh danh là "hoàng tử của những cây nho." Sau đó, được mua lại bởi nhà vang danh tiếng
                                            Domaines Rollan de By, một chương mới trong lịch sử đầy huy hoàng được tạo nên.
                                            Chateau Tour Seran là dòng rượu vang nổi bật với nghệ thuật làm vang truyền thống của nhà Domaine Rollan de By.</p>

                                        <div class="favorite-list">
                                            <ul>
                                                <li>
                                                    <span>Nồng độ</span>
                                                    <span>13% ABV</span>
                                                </li>
                                                <li>
                                                    <span>Xuất xứ</span>
                                                    <span>Bỉ</span>
                                                </li>
                                                <li>
                                                    <span>Nồng độ</span>
                                                    <span>720ml</span>
                                                </li>
                                                <li>
                                                    <span>Phân hạng</span>
                                                    <span>Cru Bourgeois</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class=" image">
                                        <img src="https://api.inwine.vn/media/catalog/product/l/_/l_hirondelle_de_faugeres.webp" alt="" style="width: 350px;">
                                    </div>
                                </div>
                            </div>
                            <div class=" carousel-item ">
                                <div class=" align-items-center slide ">
                                    <div class=" content text-light ">
                                        <h1 class="favorite-title">CHAMPAGNE VICTOIRE BLACK</h1>
                                        <p class="text-light">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-regular fa-star"></i>
                                        </p>
                                        <p class="text-light">Tự hào là một trong số những dòng vang sủi cao cấp tiêu biểu của nhà làm vang G.H.Martel & Co danh tiếng ,
                                            ngay từ khi ra đời đã thu hút được sự chú ý của rất nhiều người yêu vang ở khắp mọi nơi trên toàn thế giới.

                                            Champagne Victoire Black - một thức uống khai vị hoàn hảo cho mọi bữa tiệc sang trọng. Rượu quyến rũ với sắc vàng trong trẻo,
                                            lan tỏa hương thơm của trái cây trắng, chuối và chanh. Hương hoa và gỗ sồi, tiết lộ chút vani béo ngậy cùng bánh gừng và hạnh nhân.
                                            Chất vị vang hài hòa tươi mát, đạt đến đỉnh cao với hậu vị kéo dài sảng khoái cuốn theo những lớp bọt sủi mịn màng,
                                            tinh tế.Hứa hẹn đem lại những cảm xúc thăng hoa kéo dài đến vô tận.</p>

                                        <div class="favorite-list">
                                            <ul>
                                                <li>
                                                    <span>Nồng độ</span>
                                                    <span>13% ABV</span>
                                                </li>
                                                <li>
                                                    <span>Xuất xứ</span>
                                                    <span>Bỉ</span>
                                                </li>
                                                <li>
                                                    <span>Nồng độ</span>
                                                    <span>720ml</span>
                                                </li>
                                                <li>
                                                    <span>Phân hạng</span>
                                                    <span>Cru Bourgeois</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class=" image">
                                        <img src="./img/victorie_black_1.png" alt="" style="width: 350px;">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <button class="carousel-control-prev prev-sp" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next next-sp" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next" style="margin-right: 0px;">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>



            
        </div>

    </section>
    <!-- product-special end -->

    <section>
        <div class="list-product py-5">
            <div class="sp-title">
                <p class="title">Sản Phẩm Mới Của Chúng Tôi</p>
                <h1 class="title2">Khám Phá Nhiều Ưu Đãi</h1>
            </div>

            <div class="owl-carousel owl-theme slide-product py-5">
                <?php

                $conn = mysqli_connect('localhost', 'root', '', 'btl');
                $query = "SELECT * FROM btl_product where product_new_price != 0";
                $result = mysqli_query($conn, $query);


                while ($row = mysqli_fetch_assoc($result)) : ?>

                    <div class=" item ">
                        <div class="border product-item">


                            <div class="product-image">
                                <a href="product-detail.html">
                                    <img src=" img/<?php echo $row['product_img']; ?>" alt="Product Image">
                                </a>
                                <div class="product-action">
                                    <a href="buy_now.php?id=<?php echo $row['product_id']; ?>"><i class="fa-light fa-cart-shopping"></i></a>
                                    <a href="add_to_cart.php?id=<?php echo $row['product_id']; ?>"><i class="fa-light fa-plus"></i></a>
                                    <a href="product-detail.php?id=<?php echo $row['product_id']; ?>"><i class="fa-regular fa-magnifying-glass"></i></a>
                                </div>
                            </div>
                            <div class="bottom-product">
                                <a class="fw-bold " href="">
                                    <?php echo $row['product_name']; ?>
                                </a>
                                <?php
                                $formatted_price = number_format($row['product_price'], 0, '.', ',') . ' VNĐ';
                                $formatted_newprice = number_format($row['product_new_price'], 0, '.', ',') . ' VNĐ';
                                ?>
                                <div class="price">
                                    <p>
                                        Hàng siêu giảm giá
                                    </p>
                                    <p style="text-decoration: line-through;"><?php echo $formatted_price; ?></p>
                                    <p>

                                        Chỉ còn: <?php echo $formatted_newprice; ?>
                                    </p>
                                </div>

                                </a>
                            </div>
                        </div>
                    </div>

                <?php endwhile; ?>
            </div>
        </div>
    </section>
</main>
<div class="container-fluid counter py-5" style="background: linear-gradient(rgba(0, 0, 0, .4), rgba(0, 0, 0, 0.4)), url(img/banner3.jpg) center center; background-size: cover;">
    <div class="container py-5">
        <div class="text-center mx-auto pb-5" style="max-width: 800px;">
            <h5 class="text-uppercase title">Dịch Vụ</h5>
            <h2 class="text-white mb-0">LÝ DO LỰA CHỌN CHÚNG TÔI
            </h2>
        </div>
        <div class="row g-3">
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="counter-item text-center border p-5">

                    <img src="./img/anh1.png" alt="">

                    <div class="">
                        <p class="text-light title-counter">
                            Chính sách mua hàng
                        </p>
                        <p class="text-light content-counter">Chính sách mua hàng của chúng tôi giúp bạn mua sản phẩm dễ dàng và có thể tin tưởng vào sự hỗ trợ từ đội ngũ chúng tôi.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="counter-item text-center border p-5">
                    <img src="./img/anh2.png" alt="">
                    <div class="">
                        <p class="text-light title-counter">
                            Cam kết chính hãng </p>
                        <p class="text-light content-counter">Chúng tôi tự hào cam kết đem đến cho khách hàng sự lựa chọn tuyệt vời với các sản phẩm chính hãng.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="counter-item text-center border p-5">
                    <img src="./img/anh3.png" alt="">
                    <div class="">
                        <p class="text-light title-counter">
                            Hỗ trợ tư vấn </p>
                        <p class="text-light content-counter">Chúng tôi đảm bảo sản phẩm đến tay bạn một cách an toàn và kịp thời.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="counter-item text-center border p-5">
                    <img src="./img/anh4.png" alt="">
                    <div class="">
                        <p class="text-light title-counter">
                            Bảo mật thông tin khách hàng
                        </p>
                        <p class="text-light content-counter">Chúng tôi tuân thủ nghiêm ngặt các quy định về bảo mật để đảm bảo rằng thông tin của bạn.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="counter-item text-center border p-5">
                    <img src="./img/anh5.png" alt="">

                    <div class="">
                        <p class="text-light title-counter">
                            Chính sách giao hàng
                        </p>
                        <p class="text-light content-counter">Tận hưởng sự thuận tiện với dịch vụ giao hàng nhanh chóng và đảm bảo sản phẩm đến tay bạn một cách an toàn và kịp thời.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="counter-item text-center border p-5">
                    <img src="./img/anh6.png" alt="">
                    <div class="">
                        <p class="text-light title-counter">
                            Quà tặng dành cho bạn
                        </p>
                        <p class="text-light content-counter">Chúng tôi luôn mang đến những ưu đãi và quà tặng đặc biệt cho khách hàng thân thiết. Cảm ơn bạn đã tin tưởng INWINE</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<hr style="margin-top: 95px;">
<div class=" service">
    <div class="wrapper">
        <ul class="service-box">
            <li class="service-item">
                <div class="service-icon">
                    <img src="./img/anh7.png" alt="">
                </div>
                <div class="service-title">
                    Giao hàng cẩn thận
                </div>
                <div>
                    <p>
                        Đến tay bạn một cách an toàn và kịp thời.
                    </p>
                </div>
            </li>
            <li class="service-item">
                <div class="service-icon">
                    <img src="./img/anh8.png" alt="">
                </div>
                <div class="service-title">
                    Hỗ trợ tư vấn
                </div>
                <div>
                    <p>
                        Lời khuyên hoặc giúp đỡ về các vấn đề liên quan
                    </p>
                </div>
            </li>
            <li class="service-item">
                <div class="service-icon">
                    <img src="./img/anh9.png" alt="">
                </div>
                <div class="service-title">
                    Thanh toán an toàn
                </div>
                <div>
                    <p>
                        Đảm bảo tính bảo mật và bảo vệ thông tin tài chính
                    </p>
                </div>
            </li>
            <li class="service-item">
                <div class="service-icon">
                    <img src="./img/anh10.png" alt="">
                </div>
                <div class="service-title">
                    Nguồn gốc chất lượng
                </div>
                <div>
                    <p>
                        Đảm bảo nơi sản xuất hoặc xuất xứ
                    </p>
                </div>
            </li>
        </ul>
    </div>
</div>

<?php
include('./view/footer.php');

?>