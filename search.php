<?php 
	require 'libs/function.php';
	$keyword = $_POST['key'];
	global $conn;
	connect_db();
	$sql = "SELECT * FROM product WHERE INSTR(ProductName,'$keyword')>0";
	$query = mysqli_query($conn, $sql);
	$result = array();
	if($query) {
		while($row = mysqli_fetch_assoc($query)){
			$result[] = $row;
		}
	}
	foreach ($result as $value) {
		if($value['PricePromo']==0){
		echo '<li>
				<a href="'.$value["folder"].'/detail/?id='.$value["ProductId"].'">
					<img src="'.$value["ProductImage"].'">
					<h3>'.$value["ProductName"].'</h3>
					<span class="price">'.number_format($value['PriceCurrent'],0,"",".").'₫</span>
				</a>
			</li>';
		}else{
			echo '<li>
				<a href="'.$value["folder"].'/detail/?id='.$value["ProductId"].'">
					<img src="'.$value["ProductImage"].'">
					<h3>'.$value["ProductName"].'</h3>
					<span class="price">'.number_format($value['PricePromo'],0,"",".").'₫</span>
					<cite style="font-style: normal; text-decoration: line-through">'.number_format($value['PriceCurrent'],0,"",".").'₫</cite>
				</a>
			</li>';
		}
	}
	disconnect_db();
?>