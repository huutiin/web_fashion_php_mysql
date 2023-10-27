
<?php
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'qlbh';
    $conn = new mysqli($hostname, $username, $password, $dbname);

    // SHOW THÔNG TIN
    $info_user="SELECT * FROM account_user WHERE matk = $_GET[matk]";
    $conn_acc = mysqli_query($conn,$info_user);
    $row_acc = mysqli_fetch_array($conn_acc);

    // SHOW THÔNG TIN VAN CHUYEN
    $info_shipping="SELECT * FROM tbl_shipping WHERE matk = $_GET[matk]";
    $conn_shipping = mysqli_query($conn,$info_shipping);
    $row_shipping = mysqli_fetch_array($conn_shipping);

    // SỬA THÔNG TIN USER
    if(isset($_GET['matk']))
    {
        $matk= (int)$_GET['matk'];
        $query=mysqli_query($conn,"SELECT * from `account_user` where matk='$matk'");
        $row=mysqli_fetch_assoc($query);
        if (isset($_POST['update_info'])){
            $matk=$_GET['matk'];
            $hoten=$_POST['hoten'];
            $email=$_POST['email'];
            $phone=$_POST['phone'];
            $diachi=$_POST['diachi'];
    
            $sqlinsert = "UPDATE `account_user` set  `hoten`='$hoten', `email`='$email', `phone`='$phone',`diachi`='$diachi'  where matk ='$matk'";		
            if ($conn->query($sqlinsert) === TRUE) {	
              echo '<script language="javascript">
                    alert("✔ Cập nhật thành công!");
                    location.replace("index.php");
              
              </script>';
            } else {
              echo '<script language="javascript">
                    location.replace("index.php");
                    alert("❌ Cập nhật không thành công");
                    </script>';
            }
        }

        // SỬA MẬT KHẨU
        if (isset($_POST['update_password']) && $_SESSION['id_khachhang']){
          $matkhau= $_POST['matkhau'];
          $rematkhau= $_POST['newpassword'];

          $sqlupdate = "UPDATE `account_user` set  matkhau = '$matkhau'  where matk ='$matk' ";	
          if($matkhau ==  $rematkhau)	{
            if ($conn->query($sqlupdate) === TRUE) {
              echo '<script language="javascript">
                      alert("✔ Cập nhật thành công!");
                      location.replace("index.php");
                
                </script>';
            }
          }else{
            echo '<script language="javascript">
                    alert("❌ Mật Khẩu Không Khớp!");
                    location.replace("index.php");
              
              </script>';
          }
        }
        
        //CẬP NHẬT VẬN CHUYỂN
        if(isset($_POST['capnhatvanchuyen']) && $_SESSION['id_khachhang']){
          // $matk=$_GET['matk'];
          $name = $_POST['name'];
          $phone = $_POST['phone'];
          $address = $_POST['address'];
          $id_dangky = $_SESSION['id_khachhang'];
          $sql_update_vanchuyen = mysqli_query($conn,"UPDATE tbl_shipping SET name='$name',phone='$phone',address='$address' WHERE matk='$id_dangky'");
          if($sql_update_vanchuyen){
            echo '<script>alert("✔Cập nhật vận chuyển thành công");
            location.replace("index.php");
            </script>';

            }
        }

      }else{
        header("Location: index.php");
      }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Users / Profile - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Lịch sử giao dịch</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Lịch sử giao dịch</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="img/user.png" alt="" class="rounded-circle">
              <h2><?php  echo $row_acc['hoten']; ?></h2>
              
                
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <div class="w3-container">

                    <div class="w3-bar w3-black">
                    <button class="w3-bar-item w3-button" onclick="openCity('London')">My account</button>
                    <button class="w3-bar-item w3-button" onclick="openCity('Paris')">Setting Account</button>
                    <button class="w3-bar-item w3-button" onclick="openCity('Tokyo')">Changes Password</button>
                    </div>

                    <div id="London" class="w3-container city">
                        <h2>
                            THÔNG TIN TÀI KHOẢN
                        </h2>
                    <table class="table table-borderless">
                        <thead>
                        <tr>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Họ Tên:</td>
                            <td><input type="text" disabled value ="<?php  echo $row_acc['hoten']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td><input type="text" disabled value ="<?php  echo $row_acc['email']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Số Điện Thoại:</td>
                            <td><input type="text" disabled value ="<?php  echo $row_acc['phone']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Địa Chỉ:</td>
                            <td><input type="text" disabled value ="<?php  echo $row_acc['diachi']; ?>"></td>
                        </tr>
                        
                        </tbody>
                    </table>
                        <br>
                        <h2>
                            THÔNG TIN ĐỊA CHỈ ĐẶT HÀNG
                        </h2>

                        <form action="" method="POST" >
                          <table class="table table-borderless">
                            <thead>
                            <tr>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td >Họ Tên:</td>
                                <td><input type="text" name="name" value="<?php echo $row_shipping['name'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Số Điện Thoại:</td>
                                <td><input type="text" name="phone" value ="<?php echo $row_shipping['phone'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Địa Chỉ:</td>
                                <td>
                                  
                                  <input style="width: 100%;" name="address"  type="text"  value =" <?php echo $row_shipping['address'] ?>">
                                </td>
                            </tr>
                            <tr >
                            <td colspan="2">
                                <center>
                                <input name="capnhatvanchuyen" class="btn btn-primary"  type="submit" id="zip" value="CẬP NHẬT THÔNG TIN VẬN CHUYỂN">
                                </center>
                            </td>
                        </tr>
                            </tbody>
                          </table>
                            </form>
                    </div>

                    <div id="Paris" class="w3-container city" style="display:none">
                    <form action="" method = "POST">
                        <h2>CHỈNH SỬA THôNG TIN CÁ NHÂN</h2>
                    <table class="table table-borderless">
                        <thead>
                        <tr>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Họ Tên:</td>
                            <td><input type="text" name = "hoten" value ="<?php  echo $row['hoten']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td><input type="text" disabled name = "email" value ="<?php  echo $row['email']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Số Điện Thoại:</td>
                            <td><input type="text" name = "phone" value ="<?php  echo $row['phone']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Địa Chỉ:</td>
                            <td><input type="text" name = "diachi" value ="<?php  echo $row['diachi']; ?>"></td>
                        </tr>

                        <tr colspan= 2>
                            <td >
                                <center>
                                <input onClick="window.location.reload(true)" class=" btn btn-primary" type="submit" name="update_info" value="CẬP NHẬT">
                                </center>

                            </td>
                        </tr>
                        
                        </tbody>
                    </table>
                    </form>
                    </div>

                    <div id="Tokyo" class="w3-container city" style="display:none">
                    <h2>ĐỔI MẬT KHẨU</h2>
                    <form action="" method = "POST">
                      <table class="table table-borderless">
                          <thead>
                          <tr>

                          </tr>
                          </thead>
                          <tbody>
                          <tr>
                              <td>Mật Khẩu Cũ:</td>
                              <td><input type="password" name="oldpass" disabled value ="<?php  echo $row_acc['matkhau']; ?>"></td>
                          </tr>
                          <tr>
                              <td>Mật Khẩu Mới:</td>
                              <td>
                                
                                <input style="background-color:#f0f0f0;" type="password" value="" name="newpassword" id="myInput">
                                
                              </td>
                              <td>
                                <input type="checkbox" onclick="myFunction()">
                              </td>
                              <td>
                                  <span>Show Password</span>
                              </td>
                              <script>
                                function myFunction() {
                                  var x = document.getElementById("myInput");
                                  if (x.type === "password") {
                                    x.type = "text";
                                  } else {
                                    x.type = "password";
                                  }
                                }
                              </script>
                          </tr>
                          <tr>
                              <td>Xác Nhận Mật Khẩu:</td>
                              <td><input style="background-color:#f0f0f0;" type="password" name="matkhau"  value =""></td>
                          </tr>
                          <tr colspan= 2>
                              <td >
                                  <center>
                                  <input onClick="window.location.reload(true)" class=" btn btn-primary" type="submit" name="update_password" value="CẬP NHẬT">
                                  </center>

                              </td>
                          </tr>
                          
                          </tbody>
                      </table>
                    </form>
                </div>
            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <br><br>

  <!-- ======= Footer ======= -->
  


  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
<script>
function openCity(cityName) {
  var i;
  var x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  document.getElementById(cityName).style.display = "block";  
}
</script>