
<div class="main">
    <div class="container">
        <?php
            if (isset ($_GET['click'])) {
                $tam=$_GET['click'];
            } else {
                $tam='';
            }
            if ($tam=='thongbao') {
                include "page/thongbao.php";
            }
            elseif($tam=='lienhe') {
                include "page/contact.php";
            }
            elseif($tam=='shop') {
                include "page/shop.php";
            }
            elseif($tam=='thuonghieu') {
                include "page/thuonghieu.php";
            }
            elseif($tam=='cart') {
                include "page/shopping-cart.php";
            }
            elseif($tam=='thanhtoan') {
                include "page/xacnhan_tt_khachhang.php";
            }
            elseif($tam=='xacnhan_thongtin') {
                include "page/check-out.php";
            }
            elseif($tam=='register') {
                include "page/register.php";
            }
            elseif($tam=='login') {
                include "page/login.php";
            }
            elseif($tam=='login_cart') {
                include "page/login_cart.php";
            }
            elseif($tam=='chitietsp') {
                include "page/product.php";
            }
            elseif($tam=='about') {
                include "page/about.php";
            }
            elseif($tam=='timkiem') {
                include "page/search_pro.php";
            }
            elseif($tam=='allproduct') {
                include "page/shop_all.php";
            }
            elseif($tam=='camon') {
                include "page/camon.php";
            }
            elseif($tam=='trangchu') {
                include "page/body.php";
            }
            elseif($tam=='profile') {
                include "page/user_profile.php";
            }
            elseif($tam=='lichsugiaodich') {
                include "page/lichsugiaodich.php";
            }
            else {
                
                include "page/body.php";
            }
        ?>
    </div>
</div>