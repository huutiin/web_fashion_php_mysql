<!-- Page Preloder -->

<div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->

    <!-- Header End -->

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <br><br><br><br>
                        <a href="./home.php"><i class="fa fa-home"></i> TRANG CHỦ</a>
                        <a href="./shop.php">SHOP</a>
                        <span>GIỎ HÀNG</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cart-table">
                            <?php
                               
                               if(isset($_SESSION['cart'])){
                                $i = 0;
                                $tongtien = 0;
                            ?>
                            <table>
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>HÌNH ẢNH</th>
                                    <th class="p-name">TÊN SẢN PHẨM</th>
                                    <th>GIÁ</th>
                                    <th>SỐ LƯỢNG</th>
                                    <th>TỔNG CỘNG</th>
                                    <th>Xóa All <br><a onclick="return confirm('Bạn có chắc muốn tất cả?')" href="view/page/xulygiohang.php?xoatatca=1"><i class="ti-close"></i></a></th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php
                                        foreach($_SESSION['cart'] as $cart_item){
                                            $thanhtien = $cart_item['soluong']*$cart_item['giaban'];
                                            $tongtien+=$thanhtien;
                                            $i++;
                                    ?>
                                        <tr>
                                            <td><?php echo $i ;  ?></td>
                                            <td class="cart-pic first-row"><img src="upload/<?php echo $cart_item['anh']; ?>" width="150px"></td>
                                            <td class="cart-title first-row"><h5><?php echo $cart_item ['tensp'];  ?></h5></td>
                                            <td class="p-price first-row"><?php echo number_format($cart_item ['giaban']);  ?> vnđ</td>
                                            <td style="padding-left: 80px;" class="qua-col first-row">
                                                <div class="">
                                                    <div class="row">
                                                        <span style="font-size: 30px;" class="dec qtybtn"><a style="color: black;" href="view/page/xulygiohang.php?tru=<?php  echo $cart_item['masp']; ?> ">-</a></span> 
                                                        &nbsp; &nbsp; &nbsp;<input style="width: 30px; font-size: 16px;" type="text" value="<?php echo $cart_item ['soluong'];  ?>">
                                                        <span style="font-size: 30px;" class="inc qtybtn"><a style="color: black;" href="view/page/xulygiohang.php?cong=<?php  echo $cart_item['masp']; ?> ">+</a></span>
                                                    </div>
                                                </div>
                                            </td>
                                            
                                            
                                            <td class="total-price first-row"><?php echo number_format($thanhtien).' vnđ'  ?></td>
                                            <!-- XOA SAN PHAM -->
                                            <td class="close-td first-row"><a href="view/page/xulygiohang.php?xoa=<?php  echo $cart_item['masp']; ?> "><i class="ti-close"></i></a></i></td>
                                        </tr>
                                <?php 
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <!-- <div class="cart-buttons">
                                <a href="index.php" class="primary-btn continue-shop">TIẾP TỤC MUA SẮM</a>
                                <a href="#" class="primary-btn up-cart">CẬP NHẬT GIỎ HÀNG</a>
                            </div>
                            <div class="discount-coupon">
                                <h6>MÃ GIẢM GIÁ</h6>
                                <form action="#" class="coupon-form">
                                    <input type="text" placeholder="Nhập mã giảm giá">
                                    <button type="submit" class="site-btn coupon-btn" style ="background-color: #e7ab3c;">SỬ DỤNG</button>
                                </form>
                            </div> -->
                        </div>
                        <div class="col-lg-4 offset-lg-4">
                            <div class="proceed-checkout">
                                <ul>
                                    
                                    <li class="cart-total">TỔNG CỘNG <span><?php echo number_format($tongtien).' vnđ'  ?></span></li>
                                </ul>
                                
                                <?php
                                    if(isset($_SESSION['dangky'])){
                                ?>
                                    

                                    <a href="index.php?click=thanhtoan" class="proceed-btn">THANH TOÁN</a>
                                <?php
                                }else{
                                ?>
                                    <a href="index.php?click=login_cart" class="proceed-btn">ĐĂNG NHẬP ĐỂ THANH TOÁN</a>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
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
    </section>

<?php

?>