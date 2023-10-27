
<?php

    
    #session_start();

    $hostname = 'localhost';
	$username = 'root';
	$password = '';
	$dbname = 'qlbh';
	$conn = new mysqli($hostname, $username, $password, $dbname);
    
    #session_start();
    
    if(isset($_POST['login-btn'])){
		$email = $_POST['email'];
		$matkhau = $_POST['matkhau'];
		$sql = "SELECT * FROM account_user WHERE email='".$email."' AND matkhau='".$matkhau."' LIMIT 1";
		$row = mysqli_query($conn,$sql);
		$count = mysqli_num_rows($row);

		if($count>0){
			$row_data = mysqli_fetch_array($row);
			$_SESSION['dangky'] = $row_data['hoten'];
			$_SESSION['email'] = $row_data['email'];
			$_SESSION['id_khachhang'] = $row_data['matk'];
            // header('Location:../../index.php?click=trangchu');
            echo '<script language="javascript">;
				location.replace("index.php?click=cart");
			</script>';
		}elseif($email != 'email'){
			echo '<p style="color:red">Tài khoản không tồn tại.</p>';
			
		}else
        {
            echo '<p style="color:red">Mật khẩu hoặc Email sai ,vui lòng nhập lại.</p>';
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
                    <span>ĐĂNG NHẬP</span>
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
                <div class="login-form">
                    <h2>ĐĂNG NHẬP</h2>
                    <form action="#" method="POST">
                        <div class="group-input">
                            <label for="username">Tên đăng nhập hoặc Email *</label>
                            <input type="text" id="username" name="email">
                        </div>
                        <div class="group-input">
                            <label for="pass">Mật Khẩu *</label>
                            <input type="password" id="pass" name="matkhau" value="<?php echo '123'; ?>">
                        </div>
                        <div class="group-input gi-check">
                            <div class="gi-more">
                                <label for="save-pass">
                                    Lưu mật khẩu
                                    <input type="checkbox" id="save-pass" >
                                    <span class="checkmark"></span>
                                </label>
                                <a href="#" class="forget-pass">Quên mật khẩu ?</a>
                            </div>
                        </div>
                        <button type="submit" class="site-btn login-btn" name="login-btn">ĐĂNG NHẬP</button>
                    </form>
                    <div class="switch-login">
                        <a href="index.php?click=register" class="or-login">HOẶC TẠO TÀI KHOẢN</a>
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
