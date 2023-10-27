<?php
	$hostname = 'localhost';
	$username = 'root';
	$password = '';
	$dbname = 'qlbh';
	$conn = new mysqli($hostname, $username, $password, $dbname);

    $pro_cate = "SELECT * FROM sanpham, loaisp, thuonghieu
        WHERE sanpham.maloaisp=loaisp.maloai
        AND sanpham.mathuonghieu=thuonghieu.mathuonghieu";
    $conn_pro = mysqli_query($conn, $pro_cate);
?>


<div id="preloder">
        <div class="loader"></div>
    </div>

    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <br><br><br><br>
                        <a href="#"><i class="fa fa-home"></i> TRANG CHỦ</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Product Shop Section Begin -->
    <section class="product-shop spad">
        <div class="container">
            <div class="row">
            <?php include "view/menu_pro.php"; ?>
                <div class="col-lg-9 order-1 order-lg-2">
                <h2 style="text-align:center;">TẤT CẢ SẢN PHẨM</h2>
                <br><br><br>
                    <div class="product-show-option">
                        <div class="row">
                            <div class="col-lg-7 col-md-7">
                                <div class="select-option">
                                    <select class="sorting">
                                        <option value="">Default Sorting</option>
                                    </select>
                                    <select class="pro-show">
                                        <option value="">Show: 08</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 text-right">
                                <p>Show 01- 09 Of 36 Product</p>
                            </div>
                        </div>
                    </div>
                    <div class="row isotope-grid"> <!--SẢN PHẨM -->
                    <?php
                    if ($conn_pro->num_rows > 0) {
                        while ($row_cate = mysqli_fetch_array($conn_pro)) {
                            
                    ?>
                        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women"  >
                            <!-- Sanpham1 -->
                            
                                <div class="block2">
                                    <form action="view/page/xulygiohang.php?them_cart&masp=<?php  echo $row_cate['masp']; ?> " method="POST">
                                            <a href="index.php?click=chitietsp&masp=<?php  echo $row_cate['masp']; ?>">
                                                <div class="block2-pic hov-img0" style="height: 260px;">
                                                    <img src="upload/<?php  echo $row_cate['anh']; ?>" alt="IMG-PRODUCT">
                                                </div>
                                            </a>
                                            <div class="block2-txt flex-w flex-t p-t-14">
                                                <div class="block2-txt-child1 flex-col-l ">
                                                    <a href="index.php?click=chitietsp&masp=<?php  echo $row_cate['masp']; ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                                       <b style ="color: black;"> <?php  echo $row_cate['tensp']; ?></b>
                                                    </a>

                                                    <span class="stext-105 cl3">
                                                        <?php  echo $row_cate['giaban']; ?> vnđ
                                                    </span>
                                                    <span class="stext-105 cl3">
                                                        Giảm <?php  echo $row_cate['giagiam']; ?> %
                                                    </span>
                                                    <input type="submit" name="them_cart"
                                                       value="Thêm giỏ hàng"
                                                    />
                                                    
                                                </div>
                                            </div>
                                        
                                    </form>
                                </div>
                            
                        </div>
                    <?php
                        }
                    }else {
                        ?>
                        <a href="index.php"><i style="color: red;">Hiện Chưa Có Sản Phẩm Liên Quan, Click Để Quay Lại!</i></a>
                        <?php
                    }
                    ?>
                    </div>
                    <br><br><br><br><br>
                    <div class="loading-more">
                        <a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
                            Lên đầu trang
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    
    
   