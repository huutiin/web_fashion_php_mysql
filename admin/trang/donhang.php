
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<?php
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'qlbh';
    $conn = new mysqli($hostname, $username, $password, $dbname);
	
	$sql_lietke_dh = "SELECT * FROM tbl_cart,account_user WHERE tbl_cart.matk=account_user.matk ORDER BY tbl_cart.id_cart DESC";
	$query_lietke_dh = mysqli_query($conn,$sql_lietke_dh);
?>
<br><br>
<h2 class="text-center" ><b>ĐƠN HÀNG</b></h2>
<br><br>


<div class="container">
         
  <table class="table table-striped"  style="width: 100%;" >
    <thead>
        <tr>
            <th>STT</th>
            <th>Mã đơn hàng</th>
            <th>Tên khách hàng</th>
            <th>Địa chỉ</th>
            <th>Email</th>
            <th>Số điện thoại</th>
            <th>Tình trạng</th>
            <th>Ngày đặt</th>
            <th>Quản lý</th>
            <!-- <th>In</th> -->
        </tr>
    </thead>
    <tbody>
                    <?php
                        $stt = 1;
                        while($row = mysqli_fetch_array($query_lietke_dh)){
                    ?>
                     <tr>
                        <td><?php echo $stt; ?> </td>
                        <td><?php echo $row['code_cart'] ?></td>
                        <td><?php echo $row['hoten'] ?></td>
                        <td><?php echo $row['diachi'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['phone'] ?></td>
                        <td>
                            <?php if($row['cart_status']==1){
                                echo '<a href="?quanly=xuly&code='.$row['code_cart'].'">Đơn hàng mới</a>';
                            }else{
                                echo 'Đã xem';
                            }
                            ?>
                        </td>
                        <td><?php echo $row['cart_date'] ?></td>
                        <td>
                            <a href="?quanly=xemdonhang&code=<?php echo $row['code_cart'] ?>">Xem đơn hàng</a> 
                        </td>
                        <td>
                        <!-- <a  href="?quanly=indonhang&code=<?php echo $row['code_cart'] ?>">In Đơn hàng</a> 
                        <a  href="?quanly=ex&code=<?php echo $row['code_cart'] ?>">EX</a>  -->
                        </td>
                    
                    </tr>
                    <?php
                        $stt ++;
                        }
                    ?>
            </tbody>
  </table>
</div>
