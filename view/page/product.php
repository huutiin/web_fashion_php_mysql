<?php
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'qlbh';
    $conn = new mysqli($hostname, $username, $password, $dbname);
?>
<?php
    $pro_details = "SELECT * FROM sanpham, loaisp, thuonghieu
                    WHERE sanpham.maloaisp=loaisp.maloai
                    AND sanpham.mathuonghieu=thuonghieu.mathuonghieu 
                    AND sanpham.masp='$_GET[masp]'LIMIT 1" ;
    $conn_details = mysqli_query($conn,  $pro_details);

    $pro_bonus = "SELECT * FROM sanpham, loaisp, thuonghieu
                WHERE sanpham.maloaisp=loaisp.maloai
                AND sanpham.mathuonghieu=thuonghieu.mathuonghieu ORDER BY RAND() LIMIT 4";
    $conn_bonus = mysqli_query($conn,  $pro_bonus);
?>



    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>


    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <br><br><br><br>
                        <a href="./home.php"><i class="fa fa-home"></i> Home</a>
                        <a href="./shop.php">Shop</a>
                        <span>Detail</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    while ($row_details = mysqli_fetch_array($conn_details)) {

    ?>
    <!-- xử lí add cart -->
        <form action="view/page/xulygiohang.php?masp=<?php  echo $row_details['masp']; ?> " method="POST">
            <section class="product-shop spad page-details">
            <div class="container">
                <div class="row">
                    <!-- menu left -->
                    <?php include "view/menu_pro.php"; ?>


                    <div class="col-lg-9">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="product-pic-zoom">
                                    <img class="product-big-img" src="upload/<?php  echo $row_details['anh']; ?>" alt="">
                                    <div class="zoom-icon">
                                        <i class="fa fa-search-plus"></i>
                                    </div>
                                </div>
                                <!-- <div class="product-thumbs">
                                    <div class="product-thumbs-track ps-slider owl-carousel">
                                        <div class="pt active" data-imgbigurl="img/product-single/product-1.jpg"><img
                                                src="img/product-single/product-1.jpg" alt=""></div>
                                        <div class="pt" data-imgbigurl="img/product-single/product-2.jpg"><img
                                                src="img/product-single/product-2.jpg" alt=""></div>
                                        <div class="pt" data-imgbigurl="img/product-single/product-3.jpg"><img
                                                src="img/product-single/product-3.jpg" alt=""></div>
                                        <div class="pt" data-imgbigurl="img/product-single/product-3.jpg"><img
                                                src="img/product-single/product-3.jpg" alt=""></div>
                                    </div>
                                </div> -->
                            </div>
                            <div class="col-lg-6">
                                <div class="product-details">
                                    <div class="pd-title">
                                        <!-- <span>oranges</span> -->
                                        <h3><?php  echo $row_details['tensp']; ?></h3> 
                                        <a href="#" class="heart-icon"><i class="icon_heart_alt"></i></a>
                                    </div>
                                    <div class="pd-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <span>(5)</span>
                                    </div>
                                    <div class="pd-desc">
                                            <!-- <p>Lorem ipsum dolor sit amet, consectetur ing elit, sed do eiusmod tempor sum dolor
                                            sit amet, consectetur adipisicing elit, sed do mod tempor</p> -->
                                        <h4><?php  echo number_format($row_details['giaban']); ?> vnđ <span></span>
                                        </h4><p>SALE <?php  echo $row_details['giagiam']; ?>%</p>
                                    </div>
                                    <div class="pd-color">
                                        <h6>Color</h6>
                                        <div class="pd-color-choose">
                                            <div class="cc-item">
                                                <input type="radio" id="cc-black">
                                                <label for="cc-black"></label>
                                            </div>
                                            <div class="cc-item">
                                                <input type="radio" id="cc-yellow">
                                                <label for="cc-yellow" class="cc-yellow"></label>
                                            </div>
                                            <div class="cc-item">
                                                <input type="radio" id="cc-violet">
                                                <label for="cc-violet" class="cc-violet"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pd-size-choose">
                                        <div class="sc-item">
                                            <input type="radio" id="sm-size">
                                            <label for="sm-size">s</label>
                                        </div>
                                        <div class="sc-item">
                                            <input type="radio" id="md-size">
                                            <label for="md-size">m</label>
                                        </div>
                                        <div class="sc-item">
                                            <input type="radio" id="lg-size">
                                            <label for="lg-size">l</label>
                                        </div>
                                        <div class="sc-item">
                                            <input type="radio" id="xl-size">
                                            <label for="xl-size">xs</label>
                                        </div>
                                    </div>
                                    <div class="quantity">
                                        <div class="pro-qty">
                                            <input type="text" name="soluong" value="1">
                                        </div>
                                        
                                            <input type="submit" value="Add To Cart" class="primary-btn pd-cart" name="themgiohang">
                                       
                                        
                                    </div>
                                    <ul class="pd-tags">
                                        <!-- <li><span>CATEGORIES</span>: More Accessories, Wallets & Cases</li> -->
                                        <li><span>STARTUS</span>: </li>
                                    </ul>
                                    <div class="pd-share">
                                        <div class="p-code">PRODUCT ID : <?php  echo $row_details['masp']; ?></div>
                                        <div class="pd-social">
                                            <a href="#"><i class="ti-facebook"></i></a>
                                            <a href="#"><i class="ti-twitter-alt"></i></a>
                                            <a href="#"><i class="ti-linkedin"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-tab">   
                            <div class="tab-item">
                                <ul class="nav" role="tablist">
                                    <li>
                                        <a class="active" data-toggle="tab" href="#tab-1" role="tab">PRODUCT INFO</a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#tab-2" role="tab">SPECIFICATIONS</a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#tab-3" role="tab">Customer Reviews (02)</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-item-content">
                                <div class="tab-content">
                                    <div class="tab-pane fade-in active" id="tab-1" role="tabpanel">
                                        <div class="product-content">
                                            <div class="row">
                                                <div class="col-lg-7">
                                                    
                                                    <p style="white-space:pre-wrap;"><?php  echo $row_details['mota']; ?></p>
                                                    
                                                </div>
                                                <div class="col-lg-5">
                                                    <img src="upload/<?php  echo $row_details['anh']; ?>" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab-2" role="tabpanel">
                                        <div class="specification-table">
                                            <table>
                                                <tr>
                                                    <td class="p-catagory">Customer Rating</td>
                                                    <td>
                                                        <div class="pd-rating">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <span>(5)</span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="p-catagory">Price</td>
                                                    <td>
                                                        <div class="p-price">$495.00</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="p-catagory">Add To Cart</td>
                                                    <td>
                                                        <div class="cart-add">+ add to cart</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="p-catagory">Availability</td>
                                                    <td>
                                                        <div class="p-stock">22 in stock</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="p-catagory">Weight</td>
                                                    <td>
                                                        <div class="p-weight">1,3kg</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="p-catagory">Size</td>
                                                    <td>
                                                        <div class="p-size">Xxl</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="p-catagory">Color</td>
                                                    <td><span class="cs-color"></span></td>
                                                </tr>
                                                <tr>
                                                    <td class="p-catagory">Sku</td>
                                                    <td>
                                                        <div class="p-code">00012</div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab-3" role="tabpanel">
                                        <div class="customer-review-option">
                                            <h4>2 Comments</h4>
                                            <div class="comment-option">
                                                <div class="co-item">
                                                    <div class="avatar-pic">
                                                        <img src="img/product-single/avatar-1.png" alt="">
                                                    </div>
                                                    <div class="avatar-text">
                                                        <div class="at-rating">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </div>
                                                        <h5>Brandon Kelley <span>27 Aug 2019</span></h5>
                                                        <div class="at-reply">Nice !</div>
                                                    </div>
                                                </div>
                                                <div class="co-item">
                                                    <div class="avatar-pic">
                                                        <img src="img/product-single/avatar-2.png" alt="">
                                                    </div>
                                                    <div class="avatar-text">
                                                        <div class="at-rating">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </div>
                                                        <h5>Roy Banks <span>27 Aug 2019</span></h5>
                                                        <div class="at-reply">Nice !</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="personal-rating">
                                                <h6>Your Ratind</h6>
                                                <div class="rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                            </div>
                                            <div class="leave-comment">
                                                <h4>Leave A Comment</h4>
                                                <form action="#" class="comment-form">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <input type="text" placeholder="Name">
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <input type="text" placeholder="Email">
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <textarea placeholder="Messages"></textarea>
                                                            <button type="submit" class="site-btn">Send message</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </section>
        </form>
    <?php
    }
    ?>
    <!-- Product Shop Section End -->

    <!-- SAN PHAM KHAC -->
    <div class="related-products spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>SẢN PHẨM KHÁC</h2>
                    </div>
                </div>
            </div>
                <div class="row isotope-grid"> <!--SẢN PHẨM -->
                    <?php
                    
                        while ($row_bonus = mysqli_fetch_array($conn_bonus)) {
                            
                    ?>
                        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women"  >
                            <!-- Sanpham1 -->
                            <a href="index.php?click=chitietsp&masp=<?php  echo $row_bonus['masp']; ?>">
                                <div class="block2">
                                    <div class="block2-pic hov-img0" style="height: 260px;">
                                        <img src="upload/<?php  echo $row_bonus['anh']; ?>" alt="IMG-PRODUCT">
                                        <!-- 
                                            <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                                Quick View
                                        </a> -->
                                    </div>

                                    <div class="block2-txt flex-w flex-t p-t-14">
                                        <div class="block2-txt-child1 flex-col-l ">
                                            <a href="index.php?click=chitietsp&masp=<?php  echo $row_bonus['masp']; ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                                <?php  echo $row_bonus['tensp']; ?>
                                            </a>

                                            <span class="stext-105 cl3">
                                                <?php  echo number_format($row_bonus['giaban']); ?> vnđ
                                            </span>
                                            <span class="stext-105 cl3">
                                                Giảm <?php  echo $row_bonus['giagiam']; ?> %
                                            </span>
                                        </div>

                                        
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php
                        }
                    
                    ?>
                </div>
        </div>
    </div>
    <!-- Related Products Section End -->

    <!-- Partner Logo Section Begin -->

    <!-- Partner Logo Section End -->

    <!-- Footer Section Begin -->

    <!-- Footer Section End -->

    <!-- Js Plugins -->
