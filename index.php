<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SHOP | 2HAND</title>
    <link rel="icon" type="image/x-icon" href="./img/converse__3.png">

    <!-- Google Font -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
	

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="css/themify-icons.css" type="text/css">
        <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
        <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
        <link rel="stylesheet" href="css/nice-select.css" type="text/css">
        <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
        <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style2/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style2/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style2/fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="style2/fonts/linearicons-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="style2/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="style2/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="style2/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="style2/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="style2/vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="style2/vendor/slick/slick.css">
	<link rel="stylesheet" type="text/css" href="style2/vendor/MagnificPopup/magnific-popup.css">
	<link rel="stylesheet" type="text/css" href="style2/vendor/perfect-scrollbar/perfect-scrollbar.css">
	<link rel="stylesheet" type="text/css" href="style2/css/util.css">
	<link rel="stylesheet" type="text/css" href="style2/css/main.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Colo Shop Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style2/styles/bootstrap4/bootstrap.min.css">
    <link href="style2/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="style2/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="style2/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="style2/plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="style2/styles/main_styles.css">
    <link rel="stylesheet" type="text/css" href="style2/styles/responsive.css">
</head>

<body>
    <!-- Page Preloder -->
    

    <!-- Header Section Begin -->
        
    <!-- Header End -->
        <?php
            include "view/menu.php"
        ?>
		<br><br>
    <!-- Hero Section Begin -->
        <?php
            include "view/main.php"
        ?>
    <!-- Partner Logo Section End -->

    <!-- Footer Section Begin -->
        <?php
            include "view/page/footer.php"
        ?>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery-ui.min.js"></script>
        <script src="js/jquery.countdown.min.js"></script>
        <script src="js/jquery.nice-select.min.js"></script>
        <script src="js/jquery.zoom.min.js"></script>
        <script src="js/jquery.dd.min.js"></script>
        <script src="js/jquery.slicknav.js"></script>
        <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>	



	<script src="style2/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="style2/vendor/animsition/js/animsition.min.js"></script>
	<script src="style2/vendor/bootstrap/js/popper.js"></script>
	<script src="style2/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="style2/vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="style2/vendor/daterangepicker/moment.min.js"></script>
	<script src="style2/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="style2/vendor/slick/slick.min.js"></script>
	<script src="style2/js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script src="style2/vendor/parallax100/parallax100.js"></script>
	<script>
        $('.parallax100').parallax100();
	</script>
<!--===============================================================================================-->
	<script src="style2/vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
		        delegate: 'a', // the selector for gallery item
		        type: 'image',
		        gallery: {
		        	enabled:true
		        },
		        mainClass: 'mfp-fade'
		    });
		});
	</script>
<!--===============================================================================================-->
	<script src="style2/vendor/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
	
<!--===============================================================================================-->
	<script src="style2/js/main.js"></script>
    
</body>

</html>