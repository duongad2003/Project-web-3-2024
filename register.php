<?php 
ob_start();
session_start();
    include('./includes/connect.php');
    include('./function/common_functions.php');
    unset($_SESSION['catalogQueryPart']);
unset($_SESSION['priceQueryPart']);
?>

<link href="css/style1.css" rel="stylesheet">
    <link rel="stylesheet" href="css/duong.css">
<body>

<?php include('./view/header.php');?>

    <section class="mylogin" style="margin-top:100px;">
        <div class="container" >
            <h1 class="login-form-title">Đăng ký</h1>
            <form action="" method="post">
                    <div class="main-user-info">
                        <div class="user-input-box">
                            <label for="fullName">Họ tên</label>
                            <input type="text" id="fullName" name="fullName" placeholder="Nhập Họ Tên" required/>
                        </div>
                    
                    
                        <div class="user-input-box">
                            <label for="userName">Tên đăng nhập</label>
                            <input type="email" id="userName" name="userName" placeholder="Nhập Tên Đăng Nhập" required/>
                        </div>
                    
                    
                        <div class="user-input-box">
                            <label for="email">Email</label>
                            <input type="text" id="email" name="email" placeholder="Nhập Email" required/>
                        </div>
                    
                    
                        <div class="user-input-box">
                            <label for="phoneNumber">Số điện thoại</label>
                            <input type="text" id="phoneNumber" name="phoneNumber" placeholder="Nhập Số Điện Thoại" required/>
                        </div>
                    
                    
                        <div class="user-input-box">
                            <label for="password">Mật khẩu</label>
                            <input type="password" id="password" name="password" placeholder="Nhập Mật Khẩu" required/>
                        </div>
                    
                    
                        <div class="user-input-box">
                            <label for="confirmPassword">Xác nhận mật khẩu</label>
                            <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Xác nhận mật khẩu" required/>
                        </div>
                    </div>
                    <div class="gender-details-box">
                        <span class="gender-title">Giới tính</span>
                        <div class="gender-category">
                            <input type="radio" name="gender" id="male" value="Nam" required>
                            <label for="male">Nam</label>
                            <input type="radio" name="gender" id="female" value="Nữ">
                            <label for="female">Nữ</label>
                        </div>
                    </div>
                    <div class="login-assist">
                        <p>
                            Bạn đã có tài khoản thành viên ?
                            <a href="login.php">Đăng nhập</a>
                        </p>
                    </div>
                    <div class="form-submit-btn">
                        <input type="submit" name="register" value="Đăng ký">
                    </div>
                  
                    
            </form>
        </div>
    </section>

    
    
    <!-- Footer Start -->
<?php include('./view/footer.php');?>
</body>

</html>



<?php 
if(isset($_POST['register'])){
    $fullnane = $_POST['fullName'];
    $username = $_POST['userName'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $confPass = $_POST['confirmPassword'];

    


    $select_query = "select * from user_table where user_userName = '$username'";
    $result = mysqli_query($con,$select_query);
    $row_count = mysqli_num_rows($result);
    if($row_count>0){
        $message = "Tên đăng nhập đã tồn tại";
            echo "<script type='text/javascript'>alert('$message');</script>";
        
    }else if($password != $confPass){
        $message = "Mật khẩu không hợp lệ";
            echo "<script type='text/javascript'>alert('$message');</script>";
    }
    else{
        $insert_query = "insert into user_table (user_name,user_userName,user_email,user_phone,user_pass,user_gender, role) values ('$fullnane','$username','$email','$phoneNumber','$password','$gender', 0) ";

        $sql_execute = mysqli_query($con,$insert_query);
        if($sql_execute){
            $message = "Chào mừng";
            echo "<script type='text/javascript'>alert('$message');";
            echo "window.location.href='login.php';";
            echo "</script>";
            
        }else{
            die(mysqli_error($con));
        }
    }
}


    
?>