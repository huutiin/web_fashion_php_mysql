<?php
	require('tfpdf/tfpdf.php');
	$hostname = 'localhost';
	$username = 'root';
	$password = '';
	$dbname = 'qlbh';
	$conn = new mysqli($hostname, $username, $password, $dbname);

	$pdf = new tFPDF();
	$pdf->AddPage("0");
	// $pdf->SetFont('Arial','B',16);
	// Add a Unicode font (uses UTF-8)
	$pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
	$pdf->SetFont('DejaVu','',15);
	
	$pdf->SetFillColor(193,229,252);
	//set header 

	$code = $_GET['code'];
	$sql_lietke_dh = "SELECT * FROM tbl_cart_details,sanpham WHERE tbl_cart_details.masp=sanpham.masp AND tbl_cart_details.code_cart='".$code."' ORDER BY tbl_cart_details.id_cart_details DESC";
	$query_lietke_dh = mysqli_query($conn,$sql_lietke_dh);

	$pdf->Write(10,'                                                                 SHOP 2 HAND');
	$pdf->Ln(20);
	$pdf->Write(10,'Địa chỉ : 73, Nguyễn Huệ, Phường 2, TP.Vĩnh Long');
	$pdf->Ln(10);
	$pdf->Write(10,'HOTLINE: 0931069288');
	$pdf->Ln(10);
	$pdf->Write(10,'Số:.............');
	$pdf->Ln(10);
	$pdf->Ln(10);
	$pdf->Write(10,'                                                         HÓA ĐƠN THANH TOÁN');
	$pdf->Ln(10);
	$pdf->Ln(10);
	$pdf->Write(10,'Tên Khách Hàng:.................................................................................................................');
	$pdf->Ln(20);
	$pdf->Write(10,'Số Điện Thoại:.....................................................................................................................');
	$pdf->Ln(20);
	$pdf->Write(10,'Email:..................................................................................................................................');
	$pdf->Ln(20);
	$pdf->Write(10,'Địa Chỉ:...............................................................................................................................');
	$pdf->Ln(20);
	$pdf->Write(10,'Ghi Chú (nếu có):.................................................................................................................');
	$pdf->Ln(20);

	$pdf->Write(10,'                                                         THÔNG TIN ĐƠN HÀNG');
	$pdf->Ln(20);
	$width_cell=array(5,35,80,20,30,40);

	$pdf->Cell($width_cell[0],10,'ID',1,0,'C',true);
	$pdf->Cell($width_cell[1],10,'Mã hàng',1,0,'C',true);
	$pdf->Cell($width_cell[2],10,'Tên sản phẩm',1,0,'C',true);
	$pdf->Cell($width_cell[3],10,'Số lượng',1,0,'C',true); 
	$pdf->Cell($width_cell[4],10,'Giá',1,0,'C',true);
	$pdf->Cell($width_cell[5],10,'Tổng tiền',1,1,'C',true); 
	
	$pdf->SetFillColor(235,236,236); 
	$fill=false;
	if ($query_lietke_dh) {
		$i = 0;
		$tongtien =0;
	
		while($row = mysqli_fetch_array($query_lietke_dh)){
			$tongtien+=$row['soluongmua']*$row['giaban'];
			$i++;
		$pdf->Cell($width_cell[0],10,$i,1,0,'C',$fill);
		$pdf->Cell($width_cell[1],10,$row['code_cart'],1,0,'C',$fill);
		$pdf->Cell($width_cell[2],10,$row['tensp'],1,0,'C',$fill);
		$pdf->Cell($width_cell[3],10,$row['soluongmua'],1,0,'C',$fill);
		$pdf->Cell($width_cell[4],10,number_format($row['giaban']),1,0,'C',$fill);
		$pdf->Cell($width_cell[5],10,number_format($row['soluongmua']*$row['giaban']),1,1,'C',$fill);
		
		$fill = !$fill;

		}
		$pdf->Write(15,'                                                                                             Thành tiền:  ');
		$pdf->Cell($width_cell[3],15,number_format($tongtien));
		$pdf->Write(15,'      vnđ');
	}
	$pdf->Ln(20);
	$pdf->Write(10,'                                                                 ....................,Ngày..........Tháng...........Năm.........');
	$pdf->Ln(10);
	$pdf->Write(10, '       Người Mua Hàng                                                                 Người Bán Hàng');
	$pdf->Ln(10);
	$pdf->Write(10,'       (Ký và ghi họ tên)                                                              (Ký và ghi họ tên)');

	$pdf->Output(); 
?>