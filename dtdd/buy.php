<?php 
	session_start();
 	require'../libs/function.php';
 	$id = $_GET['id'];
 	connect_db();
	global $conn;
	$sql = "SELECT * FROM smartphone JOIN promotion ON smartphone.ProductId = promotion.PromotionId JOIN detail ON smartphone.ProductId = detail.ProductId WHERE smartphone.ProductId = '$id'";
	$query = mysqli_query($conn, $sql);	
	$product = mysqli_fetch_assoc($query);
 	
		if(isset($product)){
			$ID = $product['ProductId'];
			$Name = $product['ProductName'];
			$Image = $product['ProductImage'];
			$PriceUnit = $product['PriceCurrent'];
			$price_sale = $product['PricePromo'];
			$quantity = 1;
			$Promo1 = $product['Promo1'];
			$Promo2 = $product['Promo2'];
			$Promo3 = $product['Promo3'];
			$Promo4 = $product['Promo4'];
			if(!isset($_SESSION['infoProduct'][$ID])){
					$_SESSION['infoProduct'][$ID] = array(
						'id' => $ID,
						'nameproduct' => $Name,
						'priceunit' => $PriceUnit,
						'pricepromo' => $price_sale,
						'quantity' => $quantity,
						'image' => $Image,
						'promo1' => $Promo1,
						'promo2' => $Promo2,
						'promo3' => $Promo3,
						'promo4' => $Promo4
					);
			} 
		}
	disconnect_db();
	header('Location: ../gio-hang/');
?>