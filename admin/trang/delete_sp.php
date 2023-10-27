<?php 
	$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "qlbh";
    // Tạo kết nối
    $conn = new mysqli($servername, $username, $password, $dbname);
	
		if(isset($_REQUEST['masp']) and $_REQUEST['masp']!="")
		{
			$masp=$_GET['masp'];
			$sql = "DELETE FROM `sanpham` WHERE masp='$masp'";
			if ($conn->query($sql) === TRUE)
			{
			echo '<script language="javascript">alert("✔ Xóa sản phẩm thành công!");
				location.replace("http://shop2hand.net/admin/quanly.php?quanly=sanpham");
			</script>';
			} 
			else 
			{
				echo '<script language="javascript">alert("❌ Xóa không thành công");
                location.replace("http://shop2hand.net/admin/quanly.php?quanly=sanpham");
				</script>';
			}
			$conn->close();
		}
?>