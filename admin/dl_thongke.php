<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admincp</title>
	<link rel="stylesheet" type="text/css" href="css/styleadmincp.css">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Quản lí cửa hàng</title>
        <link rel="icon" type="image/x-icon" href="./img/converse__3.png">
        <!-- Latest compiled and minified CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Latest compiled JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Favicon-->
        
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/styleadmincp.css">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
</head>

<body>
	<h3 class="title_admin">Welcome to AdminCP</h3>
	<div class="wrapper">
	<?php 
			
            $hostname = 'localhost';
            $username = 'root';
            $password = '';
            $dbname = 'qlbh';
            $conn = new mysqli($hostname, $username, $password, $dbname);
			
	?>
	</div>

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="//cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
	<script>
		CKEDITOR.replace('thongtinlienhe');
        CKEDITOR.replace('tomtat');
        CKEDITOR.replace('noidung');
    </script>
    <script type="text/javascript">
   	$(document).ready(function(){
   		// thongke();
	    var chart = new Morris.Area({
		
		  element: 'chart',
		
		  xkey: 'date',
		 
		  ykeys: ['date','sales','order','quantity'],
		
		  labels: ['Đơn hàng','Số lượng bán ra','Doanh thu','Số lượng']
		});

		$('.select-date').change(function(){
            var thoigian = $(this).val();
            if(thoigian=='7ngay'){
                var text = '7 ngày qua';
            }else if(thoigian=='28ngay'){
                var text = '28 ngày qua';
            }else if(thoigian=='90ngay'){
                var text = '90 ngày qua';
            }else{
                var text = '365 ngày qua';
            }

             $.ajax({
                    url:"trang/dlthongke.php",
                    method:"POST",
                    dataType:"JSON",
                    data:{thoigian:thoigian},
                    success:function(data)
                    {
                        chart.setData(data);
                        $('#text-date').text(text);
                    }   
                });
        });
		//  function thongke(){
        //         var text = '365 ngày qua';
        //         $('#text-date').text(text);
        //         $.ajax({
        //             url:"trang/index.php",
        //             method:"POST",
        //             dataType:"JSON",
        //             success:function(data)
        //             {
        //                 char.setData(data);
        //                 $('#text-date').text(text);
        //             }   
        //         });
        //     }
	// });
    </script>
    <?php
    
    use Carbon\Carbon;
    use Carbon\CarbonInterval;

    
    require('carbon/autoload.php');
    $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

    if(isset($_POST['thoigian'])){
    	$thoigian = $_POST['thoigian'];
	}else{
		$thoigian = '';
		$subdays = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();	
	}

   
    if($thoigian=='7ngay'){
    	$subdays = Carbon::now('Asia/Ho_Chi_Minh')->subdays(7)->toDateString();
	}elseif($thoigian=='28ngay'){
    	$subdays = Carbon::now('Asia/Ho_Chi_Minh')->subdays(28)->toDateString();
	}elseif($thoigian=='90ngay'){
    	$subdays = Carbon::now('Asia/Ho_Chi_Minh')->subdays(90)->toDateString();
	}elseif($thoigian=='365ngay'){
		$subdays = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();	
	}
	

    $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString(); 

    $sql = "SELECT * FROM tbl_thongke WHERE ngaydat BETWEEN '$subdays' AND '$now' ORDER BY ngaydat ASC" ;
    $sql_query = mysqli_query($conn,$sql);

    while($val = mysqli_fetch_array($sql_query)){

    	$chart_data[] = array(
	        'date' => $val['ngaydat'],
	        'order' => $val['donhang'],
	        'sales' => $val['doanhthu'],
	        'quantity' => $val['soluongban']

    	);
    }
  	// print_r($chart_data);
    echo $data = json_encode($chart_data);
    ?>
<div id = "chart" > </div>
</body>
</html>