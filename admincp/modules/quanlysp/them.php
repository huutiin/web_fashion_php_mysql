<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lí Sản Phẩm</title>
        <link rel="icon" type="image/x-icon" href="./img/converse__3.png">

    <?php
        $hostname = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'qlbh';
        $conn = new mysqli($hostname, $username, $password, $dbname);

       
        $lsp = $conn -> query ("SELECT * FROM loaisp");
        $th = $conn -> query ("SELECT * FROM thuonghieu");

        if (isset($_POST['themsp'])){
            $maloaisp=$_POST['maloaisp'];
            $mathuonghieu=$_POST['mathuonghieu'];
            $tensp=$_POST['tensp'];
            $giaban=$_POST['giaban'];
            $giagiam = $_POST["giagiam"];
            $tinhtrang = $_POST["tinhtrang"];
            $mota = $_POST["mota"];
    
            $path = "../upload/"; // Ảnh sẽ lưu vào thư mục images
            $tmp_name = $_FILES['images']['tmp_name'];
            $name = $_FILES['images']['name'];
            // Upload ảnh vào thư mục images
            move_uploaded_file($tmp_name, $path . $name);
            $image_url = $path . $name;
            
            $sqlinsert = "INSERT INTO `sanpham`(`maloaisp`, `mathuonghieu`, `tensp`, `anh`,`giaban`, `giagiam`,`tinhtrang`, `mota`) 
            VALUES ('$maloaisp','$mathuonghieu','$tensp','$image_url','$giaban','$giagiam','$tinhtrang','$mota')	";
    
            $query=$conn->query($sqlinsert);
            if($query){
                echo '<script language="javascript">alert("✔ Thêm sản phẩm thành công!");
                location.replace("quanly.php?quanly=sanpham");
                </script>';
            }else{
            echo '<script language="javascript">alert("❌ Thêm không thành công");</script>';
            }
        }
        $thongtin = $conn->query("SELECT sanpham.*, loaisp.tenloai as tenloai, thuonghieu.tenthuonghieu as tenthuonghieu
                                    FROM sanpham, loaisp, thuonghieu
                                    WHERE sanpham.maloaisp = loaisp.maloai
                                    AND sanpham.mathuonghieu = thuonghieu.mathuonghieu 
                                    ORDER BY sanpham.masp DESC");

    ?>
</head>
<body>
<br>
    
    <h2 class="text-center" ><b>DANH SÁCH SẢN PHẨM ĐANG BÁN</b></h2><br><br>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
        THÊM SẢN PHẨM MỚI
    </button>

  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">NHẬP THÔNG TIN SẢN PHẨM</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          
            <form action="" enctype="multipart/form-data" method = "POST">
                <label for="">Tên Sản Phẩm:</label><br>
                <input type="text" name ="tensp">
                <br>
                <label for="">Hình Ảnh</label><br>
                <input type="file" name ="images" >
                <br>
                <label for="">Loại Sản Phẩm:</label><br>
                    <select name="maloaisp" >
                    <option value="">--Chọn--</option>
						<?php
							foreach($lsp as $key => $value){ ?>
                                    
									<option value="<?php echo $value ['maloai']?>" ><?php echo $value ['tenloai']?></option>
							<?php } ?>
					</select>
                <br>
                <label for="">Thương Hiệu:</label><br>
                    <select name="mathuonghieu" >
                    <option value="">--Chọn--</option>
						<?php
							foreach($th as $key => $value){ ?>
                                
                                <option value="<?php echo $value ['mathuonghieu']?>" ><?php echo $value ['tenthuonghieu']?></option>
						<?php 
                            } 
                        ?>
					</select>
                <br>
                <label for="">Giá Bán:</label><br>
                <input type="text" name ="giaban">
                <br>
                <label for="">Giá Giảm(%):</label><br>
                <input type="text" name = "giagiam">
                <br>
                <label for="">Tình Trạng:</label><br>
                <select name="tinhtrang" id="tinhtrang" value="">
                    <option value="">--Chọn--</option>
                    <option value="Còn hàng">Còn hàng</option>
                    <option value="Hết hàng">Hết hàng</option>
                </select>
                <br>
                <label for="">Mô tả:</label><br>
                <textarea  id="" cols="30" rows="10" name="mota"></textarea>
                <br><br>
                <input type="submit" value="Them moi" name="themsp">
            </form>

        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  
</div>
<br>
    <div class="container">
        <?php
            if ($thongtin->num_rows > 0) 
            {
        ?>
            <table style="width: 1300px;" class="table table-hover">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>NAME</th>
                    <th>IMAGE</th>
                    <th>NAME CATE</th>
                    <th>NAME BRAND</th>
                    <th>PIRCE</th>
                    <th>SALE</th>
                    <th>STATUS</th>
                    <th>INFO</th>
                    <th>CONTROL</th>
                </tr>
                </thead>
                <tbody>
                        <?php
                        
                            $stt = 1;
                            foreach($thongtin as $key => $value) {
                        ?>
                        <tr>
                            <td> <?php echo $stt; ?> </td>
                            <td style="width:20%;" > <?php echo $value['tensp']?> </td>
                            <td style="width:20%;" > <img style="width:60%;" src="<?php echo $value['anh']?>" alt=""> </td>
                            <td> <?php echo $value['tenloai']?> </td>
                            <td> <?php echo $value['tenthuonghieu']?> </td>
                            <td> <?php echo number_format($value['giaban'])?> vnd</td>
                            <td> <?php echo $value['giagiam']?> %</td>
                            <td> <?php echo $value['tinhtrang']?> </td>
                            <td> <?php echo $value['mota']?> </td>
                            
                            <td>
                                <a onclick="return confirm('Bạn có chắc là muốn sửa sản phẩm này ko?')" href="../admin/trang/edit_sp.php?masp=<?php echo $value['masp']?> ">Edit |</a>
                                <a onclick="return confirm('Bạn có chắc là muốn xóa sản phẩm này ko?')" href="../admin/trang/delete_sp.php?masp=<?php echo $value['masp']?> ">Delete</a>
                            </td>
                        </tr>
                        <?php
                            $stt ++;
                            }
                        ?>
                </tbody>
            </table>
        <?php
            }else {
        ?>
            <p style="color: red;">Hiện chưa có sản phẩm</p>
        <?php
            }
        ?>
    </div>
</body>
</html>