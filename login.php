<?php 
    ob_start();
    session_start();
    include('./includes/connect.php');
    include('./function/common_functions.php');
    unset($_SESSION['catalogQueryPart']);
unset($_SESSION['priceQueryPart']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap"
        rel="stylesheet">
        <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/all.css">
        <link rel="stylesheet" href="./BTL/fontawesome-web/css/solid.css">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css1/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style1.css" rel="stylesheet">
    <link rel="stylesheet" href="css/duong.css">
</head>

<body>
    <?php
        include('./view/header.php')
    ?>
    
    <main>
    

    <section class="mylogin">
        <div class="container">
            <h1 class="login-form-title">Đăng nhập</h1>
            <form action="" method="POST">
                    <div class="main-user-info-log">
                    
                        <div class="user-input-box-log">
                            <label for="userName">Tên đăng nhập</label>
                            <input type="text" id="userName" name="userName" placeholder="Nhập Tên Đăng Nhập" require/>
                            
                        </div>

                        <div class="user-input-box-log">
                            <label for="password">Mật khẩu</label>
                            <input type="password" id="password" name="password" placeholder="Nhập Mật Khẩu" require/>
                            
                        </div>
                        
                    </div>
                    
                    <div class="login-assist">
                        <p>
                            Chưa có tài khoản ?
                            <a href="register.php">Đăng ký ngay</a>
                        </p>
                    </div>
                    <div class="form-submit-btn">
                        <input type="submit" name="login" value="Đăng nhập">
                    </div>

                    
            </form>
        </div>
    </section>
    </main>
    
    <!-- Footer Start -->
    <?php include('./view/footer.php'); ?>
 

</body>

</html>



<?php
    if(isset($_POST['login'])){
        $username = $_POST['userName'];
        $password = $_POST['password'];

        $select_query = "select * from user_table where user_userName = '$username' and user_pass = '$password'";

        $select = mysqli_query($con,"select * from user_table where user_userName = '$username' and user_pass = '$password'")or die('query fail');
        $result = mysqli_query($con,$select_query);

        
        if(mysqli_num_rows($result)>0){
            $row = mysqli_fetch_array($result);
            
            if($row["role"]==0){
                $row = mysqli_fetch_assoc($select);
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['user_name'] = $row['user_name'];
                header('location: index.php');
            }elseif($row["role"]==1){
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['user_name'] = $row['user_name'];

                header('location: ad-pr-show.php');
            }

        }else{
            $message = "Sai tên đăng nhập hoặc mật khẩu";
            echo "<script type='text/javascript'>alert('$message');</script>";

        }
        
    }
    
    
    
?>