

<?php
    $hostname = 'localhost';
	$username = 'root';
	$password = '';
	$dbname = 'qlbh';
	$conn = new mysqli($hostname, $username, $password, $dbname);
    
 	if(isset($_POST['themvanchuyen'])) {
 		$name = $_POST['name'];
 		$phone = $_POST['phone'];
 		$address = $_POST['address'];
 		$note = $_POST['note'];
 		$id_dangky = $_SESSION['id_khachhang'];
 		$sql_them_vanchuyen = mysqli_query($conn,"INSERT INTO tbl_shipping(name,phone,address,note, matk) VALUES('$name','$phone','$address','$note','$id_dangky')");
 		if($sql_them_vanchuyen){
 			echo '<script>alert("✔Thêm vận chuyển thành công")</script>';

 		}
 	}elseif(isset($_POST['capnhatvanchuyen'])){
	    $name = $_POST['name'];
 		$phone = $_POST['phone'];
 		$address = $_POST['address'];
 		$note = $_POST['note'];
 		$id_dangky = $_SESSION['id_khachhang'];
 		$sql_update_vanchuyen = mysqli_query($conn,"UPDATE tbl_shipping SET name='$name',phone='$phone',address='$address',note='$note' WHERE matk='$id_dangky'");
 		if($sql_update_vanchuyen){
 			echo '<script>alert("✔Cập nhật vận chuyển thành công")</script>';

 		}
 	}
    


 	$id_dangky = $_SESSION['id_khachhang'];
 	$sql_get_vanchuyen = mysqli_query($conn,"SELECT * FROM tbl_shipping WHERE matk='$id_dangky' LIMIT 1");
 	$count = mysqli_num_rows($sql_get_vanchuyen);
 	if($count>0){
 		$row_get_vanchuyen = mysqli_fetch_array($sql_get_vanchuyen);
 		$name = $row_get_vanchuyen['name'];
 		$phone = $row_get_vanchuyen['phone'];
 		$address = $row_get_vanchuyen['address'];
 		$note = $row_get_vanchuyen['note'];
 	}else{

 		$name = '';
 		$phone = '';
 		$address = '';
 		$note = '';
 	}


?>
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <br><br><br><br>
                        <a href="index.php"><i class="fa fa-home"></i> TRANG CHỦ</a>
                        <a href="index.php?click=shop">SHOP</a>
                        <span>XÁC NHẬN THÔNG TIN</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Shopping Cart Section Begin -->
    <section class="checkout-section spad">
        <div class="container">
            <div  class="checkout-form" >
                <div class="row">
                    <div class="col-lg-6">
                       
                        <h4>XÁC NHẬN THÔNG TIN VẬN CHUYỂN</h4>
                        <div class="row" >
                            
                            <form action="" method="POST" >
                            
                            <div class="col-lg-12">
                                <label for="cun-name">HỌ TÊN</label>
                                <input style="width: 600px;" type="text" id="cun-name" name="name" value="<?php echo $name ?>">
                            </div>
                            <div class="col-lg-12">
                                <label for="cun">SỐ ĐIẸN THOẠI<span>*</span></label>
                                <input type="text" id="cun" name="phone" value="<?php echo $phone ?>">
                            </div>
                            <div class="col-lg-12">
                                <label for="street">ĐỊA CHỈ<span>*</span></label>
                                <input type="text" id="street" class="street-first" name="address" value="<?php echo $address ?>">
                                
                            </div>
                            <div class="col-lg-12">
                                <label for="zip">GHI CHÚ</label>
                                <input type="text" id="zip" name="note" value="<?php echo $note ?>">
                            </div>

                            <div class="col-lg-12">
                            <?php
                                if($name=='' && $phone=='') {
                                ?>
                                 <input name="themvanchuyen" style="background-color: #000; color: #FFFFFF;"  type="submit" id="zip" value="THÊM THÔNG TIN VẬN CHUYỂN">
                                <?php
                                } elseif($name!='' && $phone!=''){
                                ?>
                                 <input name="capnhatvanchuyen" style="background-color: #000; color: #FFFFFF;"  type="submit" id="zip" value="CẬP NHẬT THÔNG TIN VẬN CHUYỂN">
                                 <center><a href="index.php?click=xacnhan_thongtin" class="btn btn-info" role="button">XÁC NHẬP THÔNG TIN</a></center>
                                <?php
                                } 
                            ?>
                            
                            
                            
                            </div>
                            
                            </form>
                            
                            
                        </div>
                    </div>
                    <div class="col-lg-6">
                       
                        <div class="place-order">
                            <h4>Your Order</h4>
                            <div class="order-total">
                                <ul class="order-table">
                                    <li>Product <span>Total</span></li>
                                    <?php
                               
                                    if(isset($_SESSION['cart'])){
                                        $i = 0;
                                        $tongtien = 0;
                                        foreach($_SESSION['cart'] as $cart_item){
                                            $thanhtien = $cart_item['soluong']*$cart_item['giaban'];
                                            $tongtien+=$thanhtien;
                                            $i++;
                                    ?>
                                    <li class="fw-normal"><td>MSP:<?php echo $cart_item['masp']; ?> | </td><?php echo $cart_item ['tensp'];  ?> x <?php echo $cart_item ['soluong'];  ?> <span><?php echo number_format($thanhtien).' vnđ'  ?></span></li>
                                    
                                    <?php 
                                        }
                                    ?>


                                    <li class="fw-normal">Subtotal <span><?php echo number_format($tongtien).' vnđ'  ?></span></li>
                                    <li class="total-price">Total <span><?php echo number_format($tongtien).' vnđ'  ?></span></li>
                                    
                                </ul>
                                
                                <div class="order-btn">
                                    <!-- <button name="redirect" type="submit" class="site-btn place-btn">XÁC NHẬN ĐƠN HÀNG</button> -->
                                </div>
                                <?php
                                }else
                                {
                                ?>
                                    <a style="color: black; text-align:center;" href="index.php?click=allproduct">HIỆN BẠN CHƯA CÓ SẢN PHẨM NÀO TRONG GIÒ HÀNG !!! <br><br> 
                                    <i style="color: red;">CLICK ĐỂ MUA HÀNG</i></a>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->

    <!-- Partner Logo Section Begin -->

    <!-- Partner Logo Section End -->

    <!-- Footer Section Begin -->
    
    <!-- Footer Section End -->

    <!-- Js Plugins -->