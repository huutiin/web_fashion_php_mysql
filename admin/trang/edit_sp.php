<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Chỉnh Sửa Thông Tin Sản Phẩm</title>
    <link rel="icon" type="image/x-icon" href="../img/converse__3.png">
    <?php
        
        $hostname = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'qlbh';
        $conn = new mysqli($hostname, $username, $password, $dbname);
        
        $sp = $conn->query("SELECT * FROM sanpham");
        $loaisp = $conn->query("SELECT * FROM loaisp");
	    $thuonghieu = $conn->query("SELECT * FROM thuonghieu");

        $masp=$_GET['masp'];
        //load cbb loai
        $loai=mysqli_query($conn,"select * from `loaisp`");
        $query=mysqli_query($conn,"select * from `sanpham` where masp='$masp'");
        $row=mysqli_fetch_assoc($query);
        //load cbb tinhtrang
        $thuonghieu = mysqli_query($conn,"select * from `thuonghieu`");
        $querythuonghieu=mysqli_query($conn,"select * from `sanpham` where masp='$masp'");
        $rowthuonghieu=mysqli_fetch_assoc($querythuonghieu);

        $querysp=mysqli_query($conn,"select * from `sanpham` where masp='$masp'");
        $rowsp=mysqli_fetch_assoc($querysp);
        if (isset($_POST['btn_update'])){
            $masp=$_GET['masp'];
            $maloaisp=$_POST['maloaisp'];
            $mathuonghieu=$_POST['mathuonghieu'];
            $tensp=$_POST['tensp'];
            $giaban=$_POST['giaban'];
            $giagiam = $_POST["giagiam"];
            $tinhtrang = $_POST["tinhtrang"];
            $mota = $_POST["mota"];

            if($_FILES["images"]['name']){
                $path = "../upload/"; 
                $tmp_name = $_FILES['images']['tmp_name'];
                $name = $_FILES['images']['name'];

                move_uploaded_file($tmp_name, $path . $name);
                $image_url = $path . $name;
            }else
            {
                $image_url =$rowsp['anh'];
            }

           

            $sqlinsert = "Update `sanpham` set  `maloaisp`='$maloaisp',`mathuonghieu`='$mathuonghieu',`tensp`='$tensp',`anh`='$image_url',`giaban`='$giaban',`giagiam`='$giagiam',`tinhtrang`='$tinhtrang'
		 , `mota`='$mota' where masp ='$masp'";		
			if ($conn->query($sqlinsert) === TRUE) {	
				echo '<script language="javascript">
                alert("✔ Cập nhật sản phẩm thành công thành công!");
				location.replace("http://shop2hand.net/admin/quanly.php?quanly=sanpham");
				</script>';
			} else {
				echo '<script language="javascript">
                location.replace("http://shop2hand.net/admin/quanly.php?quanly=sanpham");
                alert("❌ Cập nhật không thành công");
                </script>';
			}
        }
    ?>

    <style>
        body{
            margin-top:30px;
            background-color: #ccffff;
        }
        
        #btn{
            width: 150px;
            background-color: #0099ff;
            float: right;
            
        }
        tr.spaceUnder>th {
            padding-bottom: 0.5em;
        }
        tr,th{
            padding-right: 50px;
        }
    </style>
</head>
<body>
    <center>
    <div class="container edt">
        <form action="" enctype="multipart/form-data" method = "POST">
            
            <h2>CHỈNH SỬA THÔNG TIN SẢN PHẨM</h2>
            <br>
            <table>
                <tr class="spaceUnder">
                    <th><label for="">Tên Sản Shẩm</label></th>
                    <th><input type="text" name ="tensp" value=" <?php echo $rowsp['tensp']?> "></th>
                </tr>
                <tr class="spaceUnder">
                    <th><label for="">Hình Ảnh (nếu cần thay đổi)</label></th>
                    <th><input type="file" name="images" accept="image/*"></th>
                </tr>
                <tr class="spaceUnder">
                    <th><label for="">Loại Sản Phẩm</label></th>
                    <th>
                        <select name="maloaisp" id="lsp" class="lsp1">
                            <?php
                                while($rowloai= mysqli_fetch_assoc($loai)) {?>
                                <option <?php if($rowloai['maloai']==$row['maloaisp']){echo "selected= \"selected\"";} ?>
                                value="<?php echo $rowloai['maloai']?>"><?php echo $rowloai['tenloai']?></option>
                            <?php } ?>
                        </select>
                    </th>
                </tr>
                <tr class="spaceUnder">
                    <th><label for="">Thương Hiệu</label></th>
                    <th>
                        <select name="mathuonghieu" id="lsp" class="lsp1">
                            <?php
                                while($rowth = mysqli_fetch_assoc($thuonghieu)) {?>
                                <option <?php if($rowth['mathuonghieu']==$rowthuonghieu['mathuonghieu']){echo "selected= \"selected\"";} ?>
                                value="<?php echo $rowth['mathuonghieu']?>"><?php echo $rowth['tenthuonghieu']?></option>
                            <?php } ?>
                        </select>
                    </th>
                </tr>
                <tr class="spaceUnder">
                    <th><label for="">Giá Bán</label></th>
                    <th><input type="text" name ="giaban" id="qty" value="<?php echo $rowsp['giaban']?>"></th>
                </tr>
                <tr class="spaceUnder">
                    <th><label for="">Giá Giảm(%)</label></th>
                    <th><input type="text" name = "giagiam" value="<?php echo $rowsp['giagiam']?>"></th>
                </tr>
                <tr class="spaceUnder">
                    <th><label for="">Tình Trạng</label></th>
                    <th>
                        <select name="tinhtrang" id="tinhtrang" value="<?php echo $rowsp['tinhtrang']?>">
                            <option value="">--Chọn--</option>
                            <option value="Còn hàng">Còn hàng</option>
                            <option value="Hết hàng">Hết hàng</option>
                        </select>
                    </th>
                </tr>
                <tr class="spaceUnder">
                    <th style="text-align: left;"><label  for="">Mô Tả</label></th>
                    <th><textarea  id="" cols="30" rows="10" name="mota"><?php echo $rowsp['mota']?></textarea></th>
                </tr>
                <tr rowspan=2 class="spaceUnder">
                    <th></th>
                    <th><input id="btn" type="submit" value="Cập Nhật" name="btn_update"></th>
                </tr>
            </table>
        </form>
    </div>
    </center>

</body>
</html>