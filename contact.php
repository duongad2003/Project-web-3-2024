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

<style>
    .message {
        background: none;
        color: black;
        border: 1px solid #000;
    }

    .message:hover {
        background: #000;

    }

    p i {
        color: #FF6F61;
    }

    p {
        font-size: 18px;
    }

    h2 {
        font-size: 24px;
        color: #FF6F61;
        font-weight: 800;
    }

    h5 {
        font-weight: 700;
    }
</style>
<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5" style="margin-top: 100px; background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.5)), url(img/banner8.jpg) center center; ">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3 " style="font-weight: 700;">HUDUOAI</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a style="color: var(--bs-primary);" href="index.php">Trang chủ</a></p>
            <p class="m-0 px-2">>></p>
            <p class="m-0 ">Sản phẩm</p>
            <p class="m-0 px-2">>></p>
            <p class="m-0 ">Giỏ hàng</p>
            <p class="m-0 px-2">>></p>
            <p class="m-0 ">Thanh toán</p>
            <p class="m-0 px-2">>></p>
            <p class="m-0 fw-bold">Liên hệ</p>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Contact Start -->
<div class="container-fluid pt-5">
    <div class="border-bottom text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Liên Hệ Với Chúng Tôi</span></h2>
    </div>
    <div class="row px-xl-5">
        <div class="col-lg-7 mb-5">

            <div class="h-100 rounded">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.2379412086516!2d105.87380377476808!3d20.983097089346387!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135aea00c96b6c1%3A0x8e95712f0f470a2c!2zMjE4IMSQLiBMxKluaCBOYW0sIFbEqW5oIEjGsG5nLCBIYWkgQsOgIFRyxrBuZywgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1716126612540!5m2!1svi!2s" width="800" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        <div class="col-lg-5 mb-5">
            <div class=" mx-auto" style="max-width: 700px;">
                <h4 class="">Thông tin</h4>
                <p class="mb-4">Chúng tôi rất hân hạnh được phục vụ quý khách. Nếu có bất kỳ thắc mắc nào, quý khách vui lòng liên hệ trực tiếp với chúng tôi để nhận được sự hỗ trợ và giải đáp kịp thời, nhằm mang đến dịch vụ tốt nhất cho quý khách.</p>
            </div>
            <div class="d-flex flex-column mb-3">
                <h5 class="font-weight-semi-bold mb-3">Chi nhánh 1</h5>
                <p class="mb-2"><i class="fa fa-map-marker-alt  mr-3"></i> 218 Lĩnh Nam - Hoàng Mai - Hà Nội</p>
                <p class="mb-2"><i class="fa fa-envelope  mr-3"></i> info@example.com</p>
                <p class="mb-2"><i class="fa fa-phone-alt  mr-3"></i> +012 345 67890</p>
            </div>
            <div class="d-flex flex-column">
                <h5 class="font-weight-semi-bold mb-3">Chi nhánh 2</h5>
                <p class="mb-2"><i class="fa fa-map-marker-alt  mr-3"></i> 296 Lĩnh Nam - Hoàng Mai - Hà Nội</p>
                <p class="mb-2"><i class="fa fa-envelope  mr-3"></i> info@example.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt  mr-3"></i> +012 345 67890</p>
            </div>

        </div>
    </div>
</div>
<!-- Contact End -->
<?php
include('./view/footer.php')
?>