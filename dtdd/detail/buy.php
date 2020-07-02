<?php 
	session_start();
 	require'../../libs/function.php';
 	$id = $_GET['id'];
 	connect_db();
	global $conn;
	$sql = "SELECT * FROM product JOIN promotion ON product.ProductId = promotion.ProductId JOIN color_product ON product.ProductId = color_product.ProductId WHERE product.ProductId = '$id'";
	$query = mysqli_query($conn, $sql);		
	$product = mysqli_fetch_assoc($query);
	$sql2 ="SELECT * FROM color_product  WHERE color_product.ProductId = '$id'";
	$query2 = mysqli_query($conn, $sql2);
	$arraycolor = array();
	if($query) {
		while($row = mysqli_fetch_assoc($query2)){
			$arraycolor[] = $row;
		}
	}
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
				'color' => array(
					$arraycolor
				),
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
	header('Location: ../../gio-hang/');
?>