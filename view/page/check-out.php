<?php
    $hostname = 'localhost';
	$username = 'root';
	$password = '';
	$dbname = 'qlbh';
	$conn = new mysqli($hostname, $username, $password, $dbname);
    
 	

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
                        <span>THANH TOÁN</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Shopping Cart Section Begin -->
    <section class="checkout-section spad">
        <div class="container">
            <form action="view/page/xulythanhtoan.php" class="checkout-form" method="POST">
                <div class="row">
                    <div class="col-lg-6">
                       
                        <h4>CHI TIẾT HÓA ĐƠN</h4>
                        <div class="row">
                            
                            <form action="" method="POST" >
                            
                            <div class="col-lg-12">
                                <label for="cun-name">HỌ TÊN</label>
                                <input type="text" id="cun-name" name="name" value="<?php echo $name ?>" disabled>
                            </div>
                            <div class="col-lg-12">
                                <label for="cun">SỐ ĐIẸN THOẠI<span>*</span></label>
                                <input type="text" id="cun" name="phone" value="<?php echo $phone ?>" disabled>
                            </div>
                            <div class="col-lg-12">
                                <label for="street">ĐỊA CHỈ<span>*</span></label>
                                <input type="text" id="street" class="street-first" name="address" value="<?php echo $address ?>" disabled>
                                
                            </div>
                            <div class="col-lg-12">
                                <label for="zip">GHI CHÚ</label>
                                <input type="text" id="zip" name="note" value="<?php echo $note ?>" disabled>
                            </div>

                            <div class="col-lg-12">
                           
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
                                <div class="payment-check">
                                    <div class="pc-item">
                                        <label for="pc-check">
                                            Thanh Toán Khi Nhập Hàng
                                            <input type="radio" id="pc-check" name="payment" id="exampleRadios1" value="tienmat">
                                            <span class="checkmark"></span>
                                        </label>
                                        <!-- <input class="" type="radio" name="payment" id="pc-check" value="tienmat" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            Tiền mặt
                                        </label> -->
                                    </div>
                                    <!-- <div class="pc-item">
                                        <label for="pc-paypal">
                                            Chuyển Khoản
                                            <input type="radio" id="pc-paypal" name="payment" id="exampleRadios2" value="chuyenkhoan">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div> -->
                                    <div class="pc-item">
                                        <label for="pc-paypal">
                                            Chuyển Khoản VNPAY
                                            <input type="radio" id="pc-paypal" name="payment" id="exampleRadios2" value="vnpay">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="order-btn">
                                    <button name="redirect" type="submit" class="site-btn place-btn">XÁC NHẬN ĐƠN HÀNG</button>
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
            </form>
        </div>
    </section>
    <!-- Shopping Cart Section End -->

    <!-- Partner Logo Section Begin -->

    <!-- Partner Logo Section End -->

    <!-- Footer Section Begin -->
    
    <!-- Footer Section End -->

    <!-- Js Plugins -->