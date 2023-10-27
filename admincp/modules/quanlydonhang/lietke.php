<p>Liệt kê đơn hàng</p>
<?php

$hostname = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'qlbh';
        $conn = new mysqli($hostname, $username, $password, $dbname);
	$sql_lietke_dh = "SELECT * FROM tbl_cart,account_user WHERE tbl_cart.matk=account_user.matk ORDER BY tbl_cart.id_cart DESC";
	$query_lietke_dh = mysqli_query($conn,$sql_lietke_dh);
?>
<table style="width:100%" border="1" style="border-collapse: collapse;">
  <tr>
  	<th>Id</th>
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
  	<td><?php echo $i ?></td>
    <td><?php echo $row['code_cart'] ?></td>
    <td><?php echo $row['hoten'] ?></td>
    <td><?php echo $row['diachi'] ?></td>
    <td><?php echo $row['email'] ?></td>
    <td><?php echo $row['phone'] ?></td>
    <td>
    	<?php if($row['cart_status']==1){
    		echo '<a href="modules/quanlydonhang/xuly.php?code='.$row['code_cart'].'">Đơn hàng mới</a>';
    	}else{
    		echo 'Đã xem';
    	}
    	?>
    </td>
    <td><?php echo $row['cart_date'] ?></td>
   	<td>
   		<a href="index.php?action=donhang&query=xemdonhang&code=<?php echo $row['code_cart'] ?>">Xem đơn hàng</a> 
   	</td>
    <td>
      <a href="modules/quanlydonhang/indonhang.php?code=<?php echo $row['code_cart'] ?>">In Đơn hàng</a> 
    </td>
   
  </tr>
  <?php
  } 
  ?>
 
</table>