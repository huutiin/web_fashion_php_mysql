<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh Sửa Thông Tin Loại Sản Phẩm</title>
    <link rel="icon" type="image/x-icon" href="../img/converse__3.png">

    <?php
        
        $hostname = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'qlbh';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        
        $loaisp = $conn->query("SELECT * FROM loaisp");

        $maloai=$_GET['maloai'];
        $queryloai=mysqli_query($conn,"select * from `loaisp` where maloai='$maloai'");
        $rowloai=mysqli_fetch_assoc($queryloai);
        if (isset($_POST['update_loai'])){
            $maloai=$_GET['maloai'];
            $tenloai=$_POST['tenloai'];

            $sqlinsert = "Update `loaisp` set  `tenloai`='$tenloai' where maloai ='$maloai'";		
			if ($conn->query($sqlinsert) === TRUE) {	
				echo '<script language="javascript">
                alert("✔ Cập nhật sản phẩm thành công!");
				location.replace("http://shop2hand.net/admin/quanly.php?quanly=loaisp");
				</script>';
			} else {
				echo '<script language="javascript">
                location.replace("http://shop2hand.net/admin/quanly.php?quanly=loaisp");
                alert("❌ Cập nhật không thành công");
                </script>';
			}
        }
    ?>
    <style>
        body{
            background-color: #ccffff;
        }
        #btn{
            width: 150px;
            background-color: #0099ff;
        }
        tr.spaceUnder>th {
            padding-bottom: 2em;
        }
        tr,th{
            padding-right: 50px;
        }
    </style>
</head>
<body>
    <center>
        <div class="container">
            <br><br><br>
            <h1>
                CHỈNH SỬA THÔNG TIN LOẠI SẢN PHẨM
            </h1>
            <br>
            <br>
            <form action="" enctype="multipart/form-data" method = "POST">
                <table>
                    <tr class="spaceUnder">
                        <th><label for="">Tên Danh Mục</label></th>
                        <th><input type="text" name ="tenloai" value="<?php echo $rowloai['tenloai']?>"></th>
                    </tr>
                    <tr colspan=2 class="spaceUnder">
                        <th></th>
                        <th><input id="btn" type="submit" value="Cập Nhật" name="update_loai"></th>
                    </tr>
                </table>
            </form>               
        </div>
    </center>
</body>
</html>