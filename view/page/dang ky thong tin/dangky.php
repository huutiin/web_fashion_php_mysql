<?php
	
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'qlbh';
    $conn = new mysqli($hostname, $username, $password, $dbname);
    $loaisp = $conn->query("SELECT * FROM account_user");

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
                    location.replace("index.php");
                    </script>';
                } else {
                    echo '<script language="javascript">
                    location.replace("view/page/register.php");
                    alert("❌ Đăng ký tài khoản chưa thành công");
                    </script>';
                }
        
    }
    ?>




<div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-3">
                    <div class="register-form">
                        <h2>ĐĂNG KÝ THÔNG TIN THANH TOÁN</h2>
                        <form action="" method="POST">
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