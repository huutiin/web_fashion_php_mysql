<!-- <header>
    <div class="nav-item">
        <div class="container">
            <div class="inner">
                <div class="nav-depart">
                    <div class="depart-btn">
                        <i class="ti-menu"></i>
                        <span>DANH MỤC SẢN PHẨM</span>
                        <ul class="depart-hover">
                            <li class="active"><a href="#">ÁO VEST</a></li>
                            <li><a href="#">ÁO THUN</a></li>
                            <li><a href="#">ÁO KHOÁC</a></li>
                            <li><a href="#">ÁO SƠ MI</a></li>
                            <li><a href="#">QUẦN SHORT</a></li>
                            <li><a href="#">QUẦN DÀI</a></li>
                            <li><a href="#">PHỤ KIỆN</a></li>
                            <li><a href="#">BALO/NÓN</a></li>
                        </ul>
                    </div>
                </div>
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <li class=""><a href="./index.php">TRANG CHỦ</a></li>
                        <li><a href="index.php?click=shop">Shop</a></li>
                        
                        <li><a href="index.php?click=thongbao">THÔNG BÁO</a></li>
                        <li><a href="index.php?click=lienhe">LIÊN HỆ</a></li>
                        <li><a href="#">KHÁC</a>
                            <ul class="dropdown">
                                
                                <li><a href="index.php?click=cart">GIỎ HÀNG</a></li>
                                <li><a href="index.php?click=thanhtoan">THANH TOÁN</a></li>
                                
                                <li><a href="index.php?click=register">TẠO TÀI KHOẢN</a></li>
                                <li><a href="index.php?click=login">ĐĂNG NHẬP</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </div>
</header> -->


<!--header class="top-navbar"> 
			<nav class="navbar navbar-expand navbar-light bg-light text-white">
            <div class="nav-depart">
                    <div class="depart-btn">
                        <i class="ti-menu"></i>
                        <span>DANH MỤC SẢN PHẨM</span>
                        <ul class="depart-hover">
                            <li class="active"><a href="#">ÁO VEST</a></li>
                            <li><a href="#">ÁO THUN</a></li>
                            <li><a href="#">ÁO KHOÁC</a></li>
                            <li><a href="#">ÁO SƠ MI</a></li>
                            <li><a href="#">QUẦN SHORT</a></li>
                            <li><a href="#">QUẦN DÀI</a></li>
                            <li><a href="#">PHỤ KIỆN</a></li>
                            <li><a href="#">BALO/NÓN</a></li>
                        </ul>
                    </div>
                </div>
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <li class=""><a href="./index.php">TRANG CHỦ</a></li>
                        <li><a href="index.php?click=shop">Shop</a></li>
                        
                        <li><a href="index.php?click=thongbao">THÔNG BÁO</a></li>
                        <li><a href="index.php?click=lienhe">LIÊN HỆ</a></li>
                        <li><a href="#">KHÁC</a>
                            <ul class="dropdown">
                                
                                <li><a href="index.php?click=cart">GIỎ HÀNG</a></li>
                                <li><a href="index.php?click=thanhtoan">THANH TOÁN</a></li>
                                
                                <li><a href="index.php?click=register">TẠO TÀI KHOẢN</a></li>
                                <li><a href="index.php?click=login">ĐĂNG NHẬP</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
			</nav>
			
</header-->


<?php
	$hostname = 'localhost';
	$username = 'root';
	$password = '';
	$dbname = 'qlbh';
	$conn = new mysqli($hostname, $username, $password, $dbname);


	$loaisp = ("SELECT * FROM loaisp");
	$conn_loai = mysqli_query($conn, $loaisp);

	$th = ("SELECT * FROM thuonghieu");
	$conn_th = mysqli_query($conn, $th);


?>
<style>
.dropdown {
  position: relative;
  display: inline-block;
  
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  padding: 15px 16px;
  z-index: 1;
  
}

.dropdown:hover .dropdown-content {
  display: block;
}
</style>

<body class="animsition">
	
	<!-- Header -->
	<header>
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<!-- Topbar -->
			<div class="top-bar">
				<div class="content-topbar flex-sb-m h-full ">
					<div style="margin-left:30px;" class="left-top-bar ">
						Liên hệ: 0931069288	 |	Email: tinnguen123@gmail.com
					</div>
					<div style="margin-right:30px;" class="right-top-bar flex-w h-full">

						<?php
							if(isset($_SESSION['email'])){
						?>
							<a href="#" class="flex-c-m trans-04 p-lr-25">
								Wellcome <?php echo $_SESSION['email']; ?>
							</a>

							<a href="view/page/logout.php?out=1" class ="flex-c-m trans-04 p-lr-25">
								Logout
							</a>
						<?php
						}else{
						?>
							<a href="#" class="flex-c-m trans-04 p-lr-25">
								Help & FAQs
							</a>
							<a href="index.php?click=login" class ="flex-c-m trans-04 p-lr-25">
								Login
							</a>
						<?php
						}
						?>
						<!-- <a href="#" class="flex-c-m trans-04 p-lr-25">
							EN
						</a>

						<a href="#" class="flex-c-m trans-04 p-lr-25">
							USD
						</a> -->
					</div>
				</div>
			</div>

			<!-- HÌNH ĐẦU TRANG INDEX -->
			


			<br><br>
			<h2></h2>
			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop ">
					
					<a href="index.php"class="converse">
                            <img style="width:85px;" src="img/converse__3.png" alt="IMG-LOGO">
                    </a>
					
					<!-- Logo desktop -->
                    
                    
					<!-- Menu desktop -->
                    <div class="col-lg-6 text-center col-md-7">
                        <div class="menu-desktop">
                            <ul class="main-menu">
								<li class="">
                                    <a href="index.php">HOME</a>
                                </li>
                                
								<li>
									<div class="dropdown">
									<a style="color: black;" href="index.php?click=allproduct">SẢN PHẨM</a>
										<div class="dropdown-content">
											<ul class="dropdown" >
												<?php
													while($rowdanhmuc = mysqli_fetch_array($conn_loai)){
												?>
													<li style="padding-bottom:15px;"><a style="color: black;" href="index.php?click=shop&id=<?php  echo $rowdanhmuc['maloai'] ?>"> <?php  echo $rowdanhmuc['tenloai'] ?> </a></li>
												
												<?php
													}
												?>
											</ul>
										</div>
									</div>
								</li>
								<li>
									<div class="dropdown">
									<a style="color: black;" href="#">THƯƠNG HIỆU</a>
										<div class="dropdown-content">
											<ul class="dropdown" >
												<?php
												while($rowth = mysqli_fetch_array($conn_th)){
												?>
													<li style="padding-bottom:15px;width: 150px;"><a style="color: black;" href="index.php?click=thuonghieu&id=<?php  echo $rowth['mathuonghieu'] ?>"> <?php  echo $rowth['tenthuonghieu'] ?> </a></li>
												<?php
													}
												?>
											</ul>
										</div>
									</div>
								</li>
								
                                <!-- <li>
                                    <a href="index.php?click=thongbao">THÔNG BÁO</a>
                                </li> -->

                                <li>
                                    <a href="index.php?click=about">THÔNG TIN THÊM</a>
                                </li>

                                <li>
                                    <a href="index.php?click=lienhe">LIÊN HỆ</a>
                                </li>

								<li>
                                    <a href="index.php?click=cart">GIỎ HÀNG</a>
                                </li>
                            </ul>
                        </div>
                    </div>
						

					<!-- Icon header -->
                    <div class="col-lg-4 text-right col-md-3">
                        <div class="wrap-icon-header flex-w flex-r-m">
                            <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                                <i class="zmdi zmdi-search"></i>
                            </div>

								<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="2">
									<i class="zmdi zmdi-shopping-cart"><a href=""></a></i>
								</div>
                            <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" data-notify="0">
                                <i class="zmdi zmdi-favorite-outline"></i>
                            </a>
                        </div>
                    </div>
					
				</nav>
				
			</div>	
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->		
			<div class="logo-mobile">
				<a href="index.php"><img src="images/icons/logo-01.png" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
					<i class="zmdi zmdi-search"></i>
				</div>
				<?php
                if(isset($_SESSION['cart'])){
						//print_r($_SESSION['cart']);
						$i = 0;
						$tongtien = 0; 
				?>
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="<?php  echo $i; ?>">
					<i class="zmdi zmdi-shopping-cart"></i>
				</div>
				<?php
					$i++;
				}
				?>
				<a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti" data-notify="0">
					<i class="zmdi zmdi-favorite-outline"></i>
				</a>
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<ul class="topbar-mobile">
				<li>
					<div class="left-top-bar">
						Free shipping for standard order over $100
					</div>
				</li>

				<li>
					<div class="right-top-bar flex-w h-full">
						<a href="#" class="flex-c-m p-lr-10 trans-04">
							Help & FAQs
						</a>

						<a href="index.php?click=login" class="flex-c-m p-lr-10 trans-04">
							My Account
						</a>

						<!-- <a href="#" class="flex-c-m p-lr-10 trans-04">
							EN
						</a>

						<a href="#" class="flex-c-m p-lr-10 trans-04">
							USD
						</a> -->
					</div>
				</li>
			</ul>

			<ul class="main-menu-m">
				<li>
					<a href="index.php">Home</a>
					<ul class="sub-menu-m">
						<li><a href="index.php">Homepage 1</a></li>
						<li><a href="home-02.php">Homepage 2</a></li>
						<li><a href="home-03.php">Homepage 3</a></li>
					</ul>
					<span class="arrow-main-menu-m">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
					</span>
				</li>

				<li>
					<a href="index.php?click=shop">HOME</a>
				</li>

				<li>
					<a href="index.php?click=cart" class="label1 rs1" data-label1="hot">GIỎ HÀNG</a>
				</li>

				<li>
					<a href="index.php?click=thongbao">THÔNG BÁO</a>
				</li>

				<li>
					<a href="index.php?click=about">THÔNG TIN THÊM</a>
				</li>

				<li>
					<a href="index.php?click=lienhe">LIÊN HỆ</a>
				</li>
			</ul>
		</div>

		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="images/icons/icon-close2.png" alt="CLOSE">
				</button>

				<form class="wrap-search-header flex-w p-l-15" method="POST" action="index.php?click=timkiem">
					<button class="flex-c-m trans-04" name="btn_timkiem">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input class="plh3" type="text" name="tukhoa" placeholder="Search...">
				</form>
			</div>
		</div>
	</header>

	<!-- Cart -->
	<div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>

		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					GIỎ HÀNG
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>
			
			<divart-content flex-w js-pscroll>
			<?php
                foreach($_SESSION['cart'] as $cart_item){ 
                    $thanhtien = $cart_item['soluong'] * $cart_item['giaban']; 
                    $tongtien += $thanhtien;
                    $i++;
            ?>
				<ul class="header-cart-wrapitem w-full">
					<li class="header-cart-item flex-w flex-t m-b-12">
					<span style="font-size: 30px;" class="dec qtybtn"><a style="color: black;" href="view/page/xulygiohang.php?xoa_modal=<?php  echo $cart_item['masp']; ?> ">X</a></span>
						<div class="">
							<img src="images/item-cart-01.jpg" alt="IMG">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								<?php echo $cart_item ['tensp'];  ?>
							</a>

							<span class="header-cart-item-info">
							<?php echo $cart_item ['soluong'];  ?> x <?php echo number_format($cart_item ['giaban']).' vnđ';  ?>
							</span>
						</div>
					</li>

				</ul>
				<?php 
                     }
                ?>
				<div class="w-full">
					<div class="header-cart-total w-full p-tb-40">
						Total: <?php echo number_format($tongtien).' vnđ'  ?>
					</div>

					<div class="header-cart-buttons flex-w w-full">
						<a href="index.php?click=cart" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
							View Cart
						</a>

						<a href="index.php?click=thanhtoan" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
							Check Out
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
