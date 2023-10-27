<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh Sửa Thông Tin Thương Hiệu</title>
    <link rel="icon" type="image/x-icon" href="../img/converse__3.png">

    <?php
        
        $hostname = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'qlbh';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        
        $thuonghieu = $conn->query("SELECT * FROM thuonghieu");

        $mathuonghieu=$_GET['mathuonghieu'];
        $queryth=mysqli_query($conn,"select * from `thuonghieu` where mathuonghieu='$mathuonghieu'");
        $rowth=mysqli_fetch_assoc($queryth);
        if (isset($_POST['update_th'])){
            $mathuonghieu=$_GET['mathuonghieu'];
            $tenthuonghieu=$_POST['tenthuonghieu'];

            $sqlinsert = "Update `thuonghieu` set  `tenthuonghieu`='$tenthuonghieu' where mathuonghieu ='$mathuonghieu'";		
			if ($conn->query($sqlinsert) === TRUE) {	
				echo '<script language="javascript">
                alert("✔ Cập nhật sản phẩm thành công thành công!");
				location.replace("http://shop2hand.net/admin/quanly.php?quanly=thuonghieu");
				</script>';
			} else {
				echo '<script language="javascript">
                location.replace("http://shop2hand.net/admin/quanly.php?quanly=thuonghieu");
                alert("❌ Cập nhật không thành công");
                </script>';
			}
        }
    ?>
</head>
<body>
    <form action="" enctype="multipart/form-data" method = "POST">
        <label for="">Ten Danh Muc</label><br>
        <input type="text" name ="tenthuonghieu" value="<?php echo $rowth['tenthuonghieu']?>">

        <br><br>
        <input type="submit" value="Cập Nhật" name="update_th">
    </form>
</body>
</html>