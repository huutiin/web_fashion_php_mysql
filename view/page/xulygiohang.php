<?php
    session_start(); 

    $conn = new mysqli('localhost', 'root', '', 'qlbh');

    //cong sp
    if(isset($_GET['cong'])){
		$masp=$_GET['cong'];
		foreach($_SESSION['cart'] as $cart_item){
			if($cart_item['masp']!=$masp){
				$product[]= array('tensp'=>$cart_item['tensp'],'soluong'=>$cart_item['soluong'],'giaban'=>$cart_item['giaban'],'anh'=>$cart_item['anh'],'masp'=>$cart_item['masp']);
				$_SESSION['cart'] = $product;
			}else{
				$tangsoluong = $cart_item['soluong'] + 1;
				if($cart_item['soluong']){
					
					$product[]= array('tensp'=>$cart_item['tensp'],'soluong'=>$tangsoluong,'giaban'=>$cart_item['giaban'],'anh'=>$cart_item['anh'],'masp'=>$cart_item['masp']);
				}else{
					$product[]= array('tensp'=>$cart_item['tensp'],'soluong'=>$cart_item['soluong'],'giaban'=>$cart_item['giaban'],'anh'=>$cart_item['anh'],'masp'=>$cart_item['masp']);
				}
				$_SESSION['cart'] = $product;
			}
			
		}
			
			header('Location:../../index.php?click=cart');
		}
		
	

    //tru
    if(isset($_GET['tru'])){
		$masp=$_GET['tru'];
		foreach($_SESSION['cart'] as $cart_item){
			if($cart_item['masp']!=$masp){
				$product[]= array('tensp'=>$cart_item['tensp'],'soluong'=>$cart_item['soluong'],'giaban'=>$cart_item['giaban'],'anh'=>$cart_item['anh'],'masp'=>$cart_item['masp']);
				$_SESSION['cart'] = $product;
			}else{
				$tangsoluong = $cart_item['soluong'] - 1;
				if($cart_item['soluong']>1){
					
					$product[]= array('tensp'=>$cart_item['tensp'],'soluong'=>$tangsoluong,'giaban'=>$cart_item['giaban'],'anh'=>$cart_item['anh'],'masp'=>$cart_item['masp']);
				}else{
					$product[]= array('tensp'=>$cart_item['tensp'],'soluong'=>$cart_item['soluong'],'giaban'=>$cart_item['giaban'],'anh'=>$cart_item['anh'],'masp'=>$cart_item['masp']);
				}
				$_SESSION['cart'] = $product;
			}
			
		}
			
			header('Location:../../index.php?click=cart');
		}
		

    //them
    if(isset($_POST['themgiohang'])){
		//session_destroy();
		$masp=$_GET['masp'];
        $soluong = $_POST['soluong'];
        $sql ="SELECT * FROM sanpham WHERE masp='".$masp."' LIMIT 1"; 
        
        $query = mysqli_query($conn, $sql); 
        $row = mysqli_fetch_array($query); 
		if($row){
			$new_product=array(array('tensp'=>$row['tensp'],'soluong'=>$soluong,'giaban'=>$row['giaban'],'anh'=>$row['anh'],'masp'=>$row['masp']));
			//kiem tra session gio hang ton tai
			if(isset($_SESSION['cart'])){
				$found = false;
				
				foreach($_SESSION['cart'] as $cart_item){
					//neu du lieu trung
					if($cart_item['masp']==$masp){
						$product[]= array('tensp'=>$cart_item['tensp'],'soluong'=>$soluong+1,'giaban'=>$cart_item['giaban'],'anh'=>$cart_item['anh'],'masp'=>$cart_item['masp']);
						$found = true;
					}else{
						//neu du lieu khong trung
						$product[]= array('tensp'=>$cart_item['tensp'],'soluong'=>$cart_item['soluong'],'giaban'=>$cart_item['giaban'],'anh'=>$cart_item['anh'],'masp'=>$cart_item['masp']);
					}
				}
				if($found == false){
					//lien ket du lieu new_product voi product
					$_SESSION['cart']=array_merge($product,$new_product);
				}else{
					$_SESSION['cart']=$product;
				}
			}else{
				$_SESSION['cart'] = $new_product;
				
			}

		}header('Location:../../index.php?click=cart');
		
		
	}

    //xoa 1 
    if(isset($_SESSION['cart'])&&isset($_GET['xoa'])){
		$masp=$_GET['xoa'];
		foreach($_SESSION['cart'] as $cart_item){

			if($cart_item['masp']!=$masp){
				$product[]= array('tensp'=>$cart_item['tensp'], 'soluong'=>$cart_item['soluong'],'giaban'=>$cart_item['giaban'],'anh'=>$cart_item['anh'],'masp'=>$cart_item['masp']);
			}

		$_SESSION['cart'] = $product;
		header('Location:../../index.php?click=cart');
		}
	}

    //xoa all 
    if(isset($_GET['xoatatca']) &&$_GET['xoatatca']==1){ 
        unset($_SESSION['cart']); 
        header('Location:../../index.php?click=cart'); 
    }




    //them gio hang modal
    if(isset($_GET['them_cart'])){

        //session_destroy();
        $masp=$_GET['masp'];
        $soluong = 1;
		// $_SESSION['sl_sp']=1 ;
        $sql ="SELECT * FROM sanpham WHERE masp='".$masp."' LIMIT 1"; 
        
        $query = mysqli_query($conn, $sql); 
        $row = mysqli_fetch_array($query); 
		if($row){
			$new_product=array(array('tensp'=>$row['tensp'],'soluong'=>$soluong,'giaban'=>$row['giaban'],'anh'=>$row['anh'],'masp'=>$row['masp']));
			//kiem tra session gio hang ton tai
			if(isset($_SESSION['cart'])){
				$found = false;
				foreach($_SESSION['cart'] as $cart_item){
					//neu du lieu trung
					if($cart_item['masp']==$masp){
						$product[]= array('tensp'=>$cart_item['tensp'],'soluong'=>$soluong+1,'giaban'=>$cart_item['giaban'],'anh'=>$cart_item['anh'],'masp'=>$cart_item['masp']);
						$found = true;
					}else{
						//neu du lieu khong trung
						$product[]= array('tensp'=>$cart_item['tensp'],'soluong'=>$cart_item['soluong'],'giaban'=>$cart_item['giaban'],'anh'=>$cart_item['anh'],'masp'=>$cart_item['masp']);
					}
				}
				if($found == false){
					//lien ket du lieu new_product voi product
					$_SESSION['cart']=array_merge($product,$new_product);
				}else{
					$_SESSION['cart']=$product;
				}
			}else{
				$_SESSION['cart'] = $new_product;
				// $_SESSION['sl_sp']= 1;
			}

		} 
            header('Location:../../index.php?click=allproduct');
        }



    if(isset($_SESSION['cart']) && $_GET['xoa_modal']){ 
        $masp=$_GET['xoa_modal'];
		foreach($_SESSION['cart'] as $cart_item){

			if($cart_item['masp']!=$masp){
				$product[]= array('tensp'=>$cart_item['tensp'], 'soluong'=>$cart_item['soluong'],'giaban'=>$cart_item['giaban'],'anh'=>$cart_item['anh'],'masp'=>$cart_item['masp']);
			}

		$_SESSION['cart'] = $product;
        header('Location:../../index.php?click=allduct');
        }
    }
?>


