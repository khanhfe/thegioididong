<?php 
require 'libs/function.php';
$i = $_GET['i'];
$group = $_GET['group'];
settype($i,"int");$limit = 10;
function total_record($group)
{
	connect_db();
	global $conn;
	$sql = "SELECT count(ProductId) AS total FROM product WHERE GroupProduct = '$group' ";
	$query = mysqli_query($conn, $sql);
	if($query){
		$row = mysqli_fetch_assoc($query);
	}
	return $row;
}
$total_records = total_record($group);
$total_records = $total_records['total'];
$total_page = ceil($total_records / $limit);
if ($i > $total_page){
    $i = $total_page;
}else if ($i < 1){
    $i = 1;
}
$start = ($i-1)*10;
function page($group,$start)
{
	connect_db();
	global $conn;
	$sql = "SELECT * FROM product JOIN promotion ON product.ProductId = promotion.ProductId WHERE product.GroupProduct = '$group' LIMIT $start,10";
	$query = mysqli_query($conn, $sql);
	$result = array();
	if($query){
		while($row = mysqli_fetch_assoc($query)){
			$result[] =$row;
		}
	}
	return $result;
}
$result = page($group,$start);
disconnect_db();
foreach ($result as $data) {
	if($data['PricePromo']==0){
	echo '<li class="item">
			<a href="detail/?id='.$data["ProductId"].'">
				<img src="../'.$data["ProductImage"].'" height="180">
				<h3>'.$data["ProductName"].'</h3>
				<div class="price">
					<strong>'.number_format($data['PriceCurrent'],0,"",".").'₫</strong>
					<span></span>
				</div>
				<div class="promo">'.$data["Promo1"].'</div>
			</a>
		</li>';
	}else{
		echo '<li class="item">
			<a href="detail/?id='.$data["ProductId"].'">
				<img src="../'.$data["ProductImage"].'" height="180">
				<h3>'.$data["ProductName"].'</h3>
				<div class="price">
					<strong>'.number_format($data['PricePromo'],0,"",".").'₫</strong>
					<span>'.number_format($data['PriceCurrent'],0,"",".").'₫</span>
				</div>
				<div class="promo">'.$data["Promo1"].'</div>
				<label class="discount">GIẢM '.number_format($data['PriceCurrent']-$data['PricePromo'],0,"",".").'₫</label>
			</a>
		</li>';
	}
}
?>