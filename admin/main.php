<div class="clear"></div>
<div class="main">
    <div class="container">
            <?php
                if (isset ($_GET['quanly'])) {
                    $tam=$_GET['quanly'];
                } else {
                    $tam='';
                }
                
                    if ($tam=='sanpham') {
                        include "trang/sanpham.php";
                    }
                    elseif($tam=='loaisp') {
                        include "trang/loaisp.php";
                    }
                    elseif($tam=='order') {
                        include "trang/order.php";
                    }
                    elseif($tam=='thuonghieu') {
                        include "trang/thuonghieu.php";
                    }
                    elseif($tam=='khac') {
                        include "trang/khac.php";
                    }
                    elseif($tam=='taikhoan') {
                        include "trang/taikhoan.php";
                    }
                    elseif($tam=='layout') {
                        include "layout.php";
                    }
                    elseif($tam=='slidebar') {
                        include "trang/quanly_hinhanh.php";
                    }
                    elseif($tam=='profile') {
                        include "trang/users-profile.php";
                    }
                    elseif($tam=='donhang') {
                        include "quanlydonhang/lietke.php";
                    }
                    elseif($tam=='xemdonhang') {
                        include "quanlydonhang/xemdonhang.php";
                    }
                    elseif($tam=='indonhang') {
                        include "quanlydonhang/indonhang.php";
                    }
                    elseif($tam=='xuly') {
                        include "quanlydonhang/xuly.php";
                    }
                    elseif($tam=='thongke') {
                        include "dl_thongke.php";
                    }
                    elseif($tam=='thongkedl') {
                        include "modules/thongke.php";
                    }
                    else {
                        include "trang/index.php";
                    }
                
                
            ?>
    </div>
</div>