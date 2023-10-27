<?php 
	$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "qlbh";
    // Tạo kết nối
    $conn = new mysqli($servername, $username, $password, $dbname);
	
		if(isset($_REQUEST['maloai']) and $_REQUEST['maloai']!="")
		{
			$maloai=$_GET['maloai'];
			$sql = "DELETE FROM `loaisp` WHERE maloai='$maloai '";
			if ($conn->query($sql) === TRUE)
			{
			echo '<script language="javascript">alert("✔ Xóa sản phẩm thành công!");
				location.replace("http://shop2hand.net/admin/quanly.php?quanly=loaisp");
			</script>';
			} 
			else 
			{
				echo '<script language="javascript">alert("❌ Xóa không thành công");
                location.replace("http://shop2hand.net/admin/quanly.php?quanly=loaisp");
				</script>';
			}
			$conn->close();
		}
?>