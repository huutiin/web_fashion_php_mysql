<?php  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QUẢN LÍ HỆ THỐNG</title>
    <link rel="icon" type="image/x-icon" href="img/converse__3.png">
      <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<style>
      body{
          background-color: #00cccc;
      }
      .full{
          padding-top : 10%;
          width: 30%;
      }
      .btn{
        width:20%;
        background-color: #336699;
        color: white;
      }
</style>



<?php  

  session_start();

  $hostname = 'localhost';
	$username = 'root';
	$password = '';
	$dbname = 'qlbh';
	$conn = new mysqli($hostname, $username, $password, $dbname);
  if(isset($_POST['btn'])){
		$email = $_POST['tentk'];
		$matkhau = $_POST['matkhau'];
		$sql = "SELECT * FROM account_admin WHERE tentk='".$email."' AND matkhau='".$matkhau."' LIMIT 1";
		$row = mysqli_query($conn,$sql);
		$count = mysqli_num_rows($row);

		if($count>0){
			$row_data = mysqli_fetch_array($row);
			$_SESSION['hoten'] = $row_data['hoten'];
			$_SESSION['email'] = $row_data['email'];
			$_SESSION['id_khachhang'] = $row_data['matk'];
            // header('Location:../../index.php?click=trangchu');
            echo '<script language="javascript">;
				location.replace("quanly.php");
			</script>';
		}else{
			echo '<p style="color:red">Mật khẩu hoặc Email sai ,vui lòng nhập lại.</p>';
			
		}
       
	}



  
?>

</head>
<body>
    <center>
<div class="full">
<div class="container">
  <h1 class="text-center">Đăng nhập Quyền Admin</h1>
  
  <form method="POST" action="<?php ($_SERVER['PHP_SELF'])?>" class="needs-validation" novalidate>
    <div class="form-group">
      <label for="uname"></label>
      <input type="text" class="form-control" id="uname" placeholder="Enter username" name="tentk" required>
      <!-- <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Thiếu tên đăng nhập.</div> -->
    </div>
    <div class="form-group">
      <label for="pwd"></label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="matkhau" required>
    </div>
    <div class="form-group form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="" required> Nhớ mật khẩu.
        
      </label>
      <br>
      
    </div>
    <input type="submit" class="btn" name="btn" value="Login"> <br><br>
    <!-- <a href="index.php?quanly=register">Tôi chưa có tài khoản !</a> -->
  </form>
</div>
</div>
</center>

<!-- $salt = 'csdnfgksdgojnmfnb';

$password = md5($salt.$_POST['password']);
$result = mysql_query("SELECT id FROM users
                       WHERE username = '".mysql_real_escape_string($_POST['username'])."'
                       AND password = '$password'");

if (mysql_num_rows($result) < 1) {
    /* Access denied */
    echo "The username or password you entered is incorrect.";
} 
else {
    $_SESSION['id'] = mysql_result($result, 0, 'id');
    #header("Location: ./");
    echo "Hello $_SESSION[id]!";
} -->

<!-- <script>
// Disable form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Get the forms we want to add validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script> -->

</body>
</html>