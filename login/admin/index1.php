<?php session_start(); if (empty($_SESSION['username'])){header('location:../');}; ?>
<?php 
	require '../../libs/function.php';
	$data = group_product('Điện thoại',10);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Trang quản trị dành cho admin</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="container">
		<h2>Quản lý website</h2>
		<div class="tool">
			<div class="">
				<a href="product_manage.php">Quản lý sản phẩm</a>
			</div>
			<div class="order">
				<a href="orders_manage.php">Quản lý đơn đặt hàng</a>
			</div>
		</div>
		<div class="listproduct">
			<h2>Danh sách các sản phẩm</h2> 
			<div>
				<ul class="homeproduct">
					<?php foreach ($data as $item) { ?>
					<li class="item">
						<a href="detail/?id=<?php echo $item['ProductId'] ?>">
							<img src="../../<?php echo $item['ProductImage'];?>" height="180">
							<h3><?php echo $item['ProductName']; ?></h3>
							<div class="price">
								<strong><?php if($item['PricePromo']==0) echo number_format($item['PriceCurrent'],0,"","."); else echo number_format($item['PricePromo'],0,"","."); ?>₫</strong>
								<span><?php  if($item['PricePromo']!=0) echo number_format($item['PriceCurrent'],0,"",".") .'₫'; ?></span>
							</div>
							<div class="promo"><?php echo $item['Promo1'] ?></div>
							<?php if($item['PricePromo'] != 0){ ?>
							<label class="discount">GIẢM <?php echo number_format($item['PriceCurrent']-$item['PricePromo'],0,"",".").'₫';}?> </label>
						</a>
					</li>
					<?php } ?>
				</ul>
				<a href="product_manage.php">Xem tất cả</a>
			</div>
		</div>
	</div>
</body>
</html>