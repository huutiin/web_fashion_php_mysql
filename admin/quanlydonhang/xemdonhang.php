
<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'qlbh';
$conn = new mysqli($hostname, $username, $password, $dbname);
	$code = $_GET['code'];
	$sql_lietke_dh = "SELECT * FROM tbl_cart_details,sanpham WHERE tbl_cart_details.masp=sanpham.masp AND tbl_cart_details.code_cart='".$code."' ORDER BY tbl_cart_details.id_cart_details DESC";
	$query_lietke_dh = mysqli_query($conn,$sql_lietke_dh);
?>
<br><br>
<h2 class="text-center" ><b>CHI TIẾT HÓA ĐƠN</b></h2><br><br>
<table class="table table-striped"  style="width: 100%;">
  <tr>
  	<th>Id</th>
    <th>Mã đơn hàng</th>
    <th>Tên sản phẩm</th>
    <th>Số lượng</th>
    <th>Đơn giá</th>
    <th>Thành tiền</th>
  
  
  </tr>
  <?php
  $i = 0;
  $tongtien = 0;
  while($row = mysqli_fetch_array($query_lietke_dh)){
  	$i++;
  	$thanhtien = $row['giaban']*$row['soluongmua'];
  	$tongtien += $thanhtien ;
  ?>
  <tr>
  	<td><?php echo $i ?></td>
    <td><?php echo $row['code_cart'] ?></td>
    <td><?php echo $row['tensp'] ?></td>
    <td><?php echo $row['soluongmua'] ?></td>
    <td><?php echo number_format($row['giaban'],0,',','.').'vnđ' ?></td>
    <td><?php echo number_format($thanhtien,0,',','.').'vnđ' ?></td>
   	
  </tr>
  <?php
  } 
  ?>
  <tr>
  	<td colspan="6">
   		<p>Tổng tiền : <?php echo number_format($tongtien,0,',','.').'vnđ' ?></p>
   	</td>
   
  </tr>
 
</table>