
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
<h2 class="text-center" ><b>QUẢN LÝ ĐƠN HÀNG</b></h2><br><br>
<table class="table table-striped"  style="width: 100%;">
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
    <th>In</th>
  
  </tr>
  <?php
  $i = 0;
  while($row = mysqli_fetch_array($query_lietke_dh)){
  	$i++;
  ?>
  <tr>
  	<td style="border-left: double;"><?php echo $i ?></td>
    <td style="border-left: double;"><?php echo $row['code_cart'] ?></td>
    <td style="border-left: double;"><?php echo $row['hoten'] ?></td>
    <td style="border-left: double;"><?php echo $row['diachi'] ?></td>
    <td style="border-left: double;"><?php echo $row['email'] ?></td>
    <td style="border-left: double;"><?php echo $row['phone'] ?></td>
    <td style="border-left: double;">
    	<?php if($row['cart_status']==1){
    		echo '<a href="quanlydonhang/xuly.php?code='.$row['code_cart'].'">Đơn hàng mới</a>';
    	}else{
    		echo 'Đã xem';
    	}
    	?>
    </td>
    <td style="border-left: double;"><?php echo $row['cart_date'] ?></td>
   	<td style="border-left: double;">
     <a href="?quanly=xemdonhang&code=<?php echo $row['code_cart'] ?>">Xem đơn hàng</a> 
   	</td>
    <td style="border-left: double;">
      <a target="_blank" href="quanlydonhang/indonhang.php?code=<?php echo $row['code_cart'] ?>">In Đơn hàng</a> 
    </td>
   
  </tr>
  <?php
  } 
  ?>
 
</table>