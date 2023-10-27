
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

    $loaisp = ("SELECT * FROM loaisp");
	$conn_loai = mysqli_query($conn, $loaisp);

	$th = ("SELECT * FROM thuonghieu");
	$conn_th = mysqli_query($conn, $th);

?>


    <div class="col-lg-3">
        <div class="filter-widget">
            <h4 class="fw-title">Categories</h4>
            <ul class="fw-brand-check">
            <?php
				while($rowdanhmuc = mysqli_fetch_array($conn_loai)){
			?>
                <a style="font-size: 16px; color: black" href="index.php?click=shop&id=<?php  echo $rowdanhmuc['maloai'] ?>">
                    <div class="bc-item">
                        <label for="bc-calvin">
                        <?php echo $rowdanhmuc['tenloai'] ?>
                            
                            
                        </label>
                    </div>
                </a>
        
                
            <?php
            }
            ?>
            </ul>
        </div>
        <div class="filter-widget">
            <h4 class="fw-title">Brand</h4>
            <div class="fw-brand-check">
            <?php
				while($rowth = mysqli_fetch_array($conn_th)){
			?>
            	
                <a style="font-size: 16px; color: black" href="index.php?click=thuonghieu&id=<?php  echo $rowth['mathuonghieu'] ?>">
                    <div class="bc-item">
                        <label for="bc-calvin">
                        <?php  echo $rowth['tenthuonghieu'] ?>
                            
                            
                        </label>
                    </div>
                </a>
            <?php
				}
			?>
            </div>
        </div>
        <div class="filter-widget">
            <h4 class="fw-title">Price</h4>
            <div class="filter-range-wrap">
                <div class="range-slider">
                    <div class="price-input">
                        <input type="text" id="minamount">
                        <input type="text" id="maxamount">
                    </div>
                </div>
                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                    data-min="33" data-max="98">
                    <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                </div>
            </div>
            <a href="#" class="filter-btn">Filter</a>
        </div>
        <div class="filter-widget">
            <h4 class="fw-title">Color</h4>
            <div class="fw-color-choose">
                <div class="cs-item">
                    <input type="radio" id="cs-black">
                    <label class="cs-black" for="cs-black">Black</label>
                </div>
                <div class="cs-item">
                    <input type="radio" id="cs-violet">
                    <label class="cs-violet" for="cs-violet">Violet</label>
                </div>
                <div class="cs-item">
                    <input type="radio" id="cs-blue">
                    <label class="cs-blue" for="cs-blue">Blue</label>
                </div>
                <div class="cs-item">
                    <input type="radio" id="cs-yellow">
                    <label class="cs-yellow" for="cs-yellow">Yellow</label>
                </div>
                <div class="cs-item">
                    <input type="radio" id="cs-red">
                    <label class="cs-red" for="cs-red">Red</label>
                </div>
                <div class="cs-item">
                    <input type="radio" id="cs-green">
                    <label class="cs-green" for="cs-green">Green</label>
                </div>
            </div>
        </div>
        <div class="filter-widget">
            <h4 class="fw-title">Size</h4>
            <div class="fw-size-choose">
                <div class="sc-item">
                    <input type="radio" id="s-size">
                    <label for="s-size">s</label>
                </div>
                <div class="sc-item">
                    <input type="radio" id="m-size">
                    <label for="m-size">m</label>
                </div>
                <div class="sc-item">
                    <input type="radio" id="l-size">
                    <label for="l-size">l</label>
                </div>
                <div class="sc-item">
                    <input type="radio" id="xs-size">
                    <label for="xs-size">xs</label>
                </div>
            </div>
        </div>
        <?php include "page/search_tag.php"; ?>
    </div>