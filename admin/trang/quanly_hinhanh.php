<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loại sản phẩm</title>
    <link rel="icon" type="image/x-icon" href="img/converse__3.png">
    <?php
        $hostname = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'qlbh';
        $conn = new mysqli($hostname, $username, $password, $dbname);

       
        $loaisp = $conn -> query ("SELECT * FROM loaisp");

        if (isset($_POST['them_loai'])){
            $tenloai=$_POST['tenloai'];
            
            $sqlinsert = "INSERT INTO `loaisp`(`tenloai`) 
            VALUES ('$tenloai')";
    
            $query=$conn->query($sqlinsert);
            if($query){
                echo '<script language="javascript">alert("✔ Thêm danh mục thành công!");
                location.replace("quanly.php?quanly=loaisp");
                </script>';
            }else{
            echo '<script language="javascript">alert("❌ Thêm danh muc không thành công");</script>';
            }
        }
        

    ?>
</head>
<body>

    <div class="container">
        <br>
        <h2 class="text-center" >DANH SÁCH CÁC LOẠI SẢN PHẨM MÀ CỬA HÀNG ĐANG BÁN</h2>
        <br>

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
            THÊM DANH MỤC MỚI
        </button> <br><br>
                <!-- The Modal -->
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">NHẬP THÔNG TIN DANH MỤC</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    
                    <!-- Modal body -->
                    <div class="modal-body">
                    
                        <form action="" enctype="multipart/form-data" method = "POST">
                            <label for="">Ten Danh Muc</label><br>
                            <input type="text" name ="tenloai">
                            
                            <br><br>
                            <input type="submit" value="Cập Nhật" name="them_loai">
                        </form>

                    </div>
                    
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                    
                </div>
            </div>
        </div>


        <table style="width: 1300px;" class="table table-hover">
            <thead>
            <tr>
                <th>STT</th>
                <th>NAME</th>
                <th>CONTROL</th>
            </tr>
            </thead>
            <tbody>
                    <?php
                        $stt = 1;
                        foreach($loaisp as $key => $value) {
                    ?>
                    <tr>
                        <td> <?php echo $stt; ?> </td>
                        <td> <?php echo $value['tenloai']?> </td>
                        
                        <td>
                            <a onclick="return confirm('Bạn có chắc là muốn sửa sản phẩm này ko?')" href="../admin/trang/edit_loaisp.php?maloai=<?php echo $value['maloai']?> ">Edit |</a>
                            <a onclick="return confirm('Bạn có chắc là muốn sửa sản phẩm này ko?')" href="../admin/trang/delete_loaisp.php?maloai=<?php echo $value['maloai']?> ">Delete</a>
                        </td>
                    </tr>
                    <?php
                        $stt ++;
                        }
                    ?>
            </tbody>
        </table>
    </div>
</body>
</html>