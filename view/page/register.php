
    <?php
	
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'qlbh';
    $conn = new mysqli($hostname, $username, $password, $dbname);
    $loaisp = $conn->query("SELECT * FROM account_user");
?>
    <?php
        if(isset($_POST['dangky'])){
            $tentk = $_POST['hovaten'];
            $email = $_POST['email'];
            $matkhau = $_POST['pass'];
            $phone = $_POST['phone'];
            $local = $_POST['local'];
            $sql_dangky = mysqli_query($conn,"INSERT INTO account_user(hoten,email,matkhau,phone,diachi) VALUES ('".$tentk."','".$email."','".$matkhau."','".$phone."','".$local."')");

            
                if ($sql_dangky) {	
                    echo '<script language="javascript">
                    alert("✔ Đăng ký tài khoản thành công!");
                    location.replace("index.php?click=login_cart");
                    </script>';
                } else {
                    echo '<script language="javascript">
                    location.replace("view/page/register.php");
                    alert("❌ Đăng ký tài khoản chưa thành công");
                    </script>';
                }
        }
    

?>
    
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->

    <!-- Header End -->

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <br><br><br><br>
                        <a href="index.php"><i class="fa fa-home"></i> TRANG CHỦ</a>
                        <span>ĐĂNG KÝ</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Form Section Begin -->

    <!-- Register Section Begin -->
    <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="register-form">
                        <h2>ĐĂNG KÝ TÀI KHOẢN</h2>
                        <form action="#" method="POST">
                            <div class="group-input">
                                <label for="hovaten">Họ và Tên: *</label>
                                <input type="text" name="hovaten">
                            </div>
                            <div class="group-input">
                                <label for="email">Email: *</label>
                                <input type="text" name="email">
                            </div>
                            <div class="group-input">
                                <label for="pass">Mật khẩu: *</label>
                                <input type="password" name="pass">
                            </div>
                            <div class="group-input">
                                <label for="con-pass">Số điện thoại: *</label>
                                <input type="text" name="phone">
                            </div>
                            <div class="group-input">
                                <label for="con-pass">Địa chỉ: *</label>
                                <input type="text" name="local">
                            </div>
                            <button type="submit" class="site-btn register-btn" name ="dangky">ĐĂNG KÝ</button>
                        </form>
                        <div class="switch-login">
                            <a href="./login.php" class="or-login">Hoặc Đăng nhập</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Register Form Section End -->
    
    <!-- Partner Logo Section Begin -->

    <!-- Partner Logo Section End -->

    <!-- Footer Section Begin -->

    <!-- Footer Section End -->

    <!-- Js Plugins -->
