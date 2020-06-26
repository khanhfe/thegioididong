<?php 
	session_start();
 	require'../libs/function.php';
 	$id = $_GET['id'];
 	connect_db();
	global $conn;
	$sql = "SELECT * FROM smartphone JOIN promotion ON smartphone.ProductId = promotion.PromotionId JOIN detail ON smartphone.ProductId = detail.ProductId WHERE smartphone.ProductId = '$id'";
	$query = mysqli_query($conn, $sql);	
	$product = mysqli_fetch_assoc($query);
 	disconnect_db();
 	if (empty($product)) {
 		header('location:../');
 	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $product['ProductName']; ?> | Trả góp 0%</title>
	<link href="../img/icon/favicon.ico" rel="shortcut icon" type="image/x-icon">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<header>
		<div class="wrap-main">
			<a href="#" title="Về trang chủ Thegioididong.com" class="logo">
				<i class="icon-logo"></i>
			</a>
			<form id="search-site" action="#" method="get" accept-charset="utf-8" autocomplete="off">
				<input type="text" name="key" class="topinput" maxlength="50" placeholder="Bạn tìm gì..." id="search-keyword">
				<button class="btntop" type="submit">
					<i class="icon-topsearch"></i>
				</button>
			</form>
			<nav>
	            <a href="#" class="mobile" title="Điện thoại di động, smartphone">
	                <i class="icon-mobile"></i>Điện thoại
	            </a>
	            <a href="#" class="laptop" title="Máy tính xách tay, Laptop">
	                <i class="icon-laptop"></i>Laptop
	            </a>
	            <a href="#" class="tablet" title="Máy tính bảng, tablet">
	                <i class="icon-tablet"></i>Tablet
	            </a>
	            <a href="#" class="phukien" title="Phụ kiện điện thoại di động, phụ kiện tablet, phụ kiện lapto">
	                <i class="icon-phukien"></i>Phụ kiện
	            </a>
	            <a href="#" class="smartwatch" title="Đồng hồ">
	                <i class="icon-watch"></i>Đồng hồ
	            </a>
	            <a href="#" class="maydoitra" title="Máy cũ giá rẻ, máy đổi trả thegioididong">
	                <i class="icon-maydoitra"></i><span>Máy</span>Cũ giá rẻ
	            </a>

                <a href="#" class="news" title="24h công nghệ">
                    <i class="icon-news"></i>Công Nghệ
                </a>
                <a href="#" class="ask" title="Hỏi đáp">
                    <i class="icon-ask"></i>Hỏi đáp
                </a>

	            <a href="#" class="gameapp" title="Game app">
	                <i class="icon-gameapp"></i>Game App
	            </a>
	            <div id="utility-cardsim" class="utility">
                Sim, thẻ cào<br>
                Đóng tiền
                <div class="mix-menu">
                    <a href="#" class="cardsim">
                        Sim số, thẻ cào
                    </a>
                    <a href="#">
                        Đóng tiền điện, <br> nước, trả góp
                    </a>
                </div>
            </div>
        	</nav>
		</div>
	</header>
	<section>
		<?php $src = "../"?>
		<div class="container">
			<ul class="category">
				<li><a href="../" title="Trang chủ">Trang chủ </a><span>›</span></li>
				<li><a href="../" title="Trang chủ"><?php echo $product['GroupProduct']; ?></a><span>›</span></li>	
				<li><a href="../" title="Trang chủ"><?php echo $product['Brand']; ?></a></li>	
			</ul>
			<h1>Điện thoại <?php if(isset($product['ProductName'])) echo $product['ProductName']; ?></h1>
			<div class="row"></div>
			<div class="product" id="product">
				<div class="image">
					<img src="<?php if(isset($product['ProductName'])) echo $src.$product['ProductImage'] ?>" width="400">	
				</div>
				<div class="price_sale">
					<div class="price">
						<strong><?php if($product['PricePromo']==0) echo number_format($product['PriceCurrent'],0,"","."); else echo number_format($product['PricePromo'],0,"",".") ?>₫</strong>
						<span class="hisprice"><?php if($product['PricePromo']!=0) echo number_format($product['PriceCurrent'],0,"",".").'₫'; ?></span>
						<label class="installment">Trả góp 0%</label>
					</div>
					<div class="mermory">
						<div class="default">Bạn đang xem phiên bản: <b></b></div>
					</div>
					<div class="area_promotion">
						<strong>Khuyến mãi</strong>
						<div class="infopromo">
							<span class="notnull"><?php echo $product['Promo1']; ?></span>
							<span class="notnull"><?php echo $product['Promo2']; ?></span>
							<span class="notnull"><?php if($product['Promo3']!=null) echo $product['Promo3']; ?></span>
							<span class="notnull"><?php if($product['Promo4']!=null) echo $product['Promo4'].'<a href="" style="color:#288ad6"> (click xem chi tiết)</a>' ?></span>
						</div>
						<div class="vipservice">
							<div>
								<b>Chọn thêm các dịch vụ<b style="color: #ff0011;"> miễn phí chỉ có ở TGDD</b></b>
							</div>
							<div class="ol">
								<input type="checkbox" name="" checked="checked"><span> Giao ngay từ cửa hàng gần bạn nhất</span>
							</div>
							<div class="ol">
								<input type="checkbox" name=""><span> Chuyển danh bạ, dữ liệu qua máy mới</span>
							</div>
							<div class="ol">
								<input type="checkbox" name=""><span> Mang thêm điện thoại khác để bạn xem</span>
							</div>		
						</div>
					</div>
					<div class="area_order btn-buy">
						<a id="mua-ngay" href="buy.php?id=<?php echo $id; ?>" class="buy_now"><b>Mua ngay</b><span>Giao tận nơi hoặc nhận tại siêu thị</span></a>
						<a id="tra-gop" class="buy_repay " href=""><b>Mua trả góp 0%</b><span>Thủ tục đơn giản</span></a>
						<a class="buy_repay s " href=""><b>Trả góp  qua thẻ</b><span>Visa, Master, JCB</span></a>
					</div>
				</div>
				<div class="tableparameter">
					<h2>Thông số kỹ thuật</h2>
					<ul class="parameter">
						<li class="p217287">
							<span>Màn hình:</span><div><?php echo $product['Display']; ?></div>
						</li>
						<li>
							<span>Hệ điều hành:</span><div><a href=""><?php echo $product['OS']; ?></a></div>
						</li>
						<li>
							<span>Camera sau:</span><div><?php echo $product['RearCamera']; ?></div>
						</li>
						<li>
							<span>Camera trước:</span><div><?php echo $product['FrontCamera']; ?></div>
						</li>
						<li>
							<span>CPU:</span><div><a href=""><?php echo $product['CPU']; ?></a></div>
						</li>
						<li>
							<span>RAM:</span><div><?php echo $product['RAM']; ?></div>
						</li>
						<li>
							<span>Bộ nhớ trong:</span><div><?php echo $product['ROM']; ?></div>
						</li>
						<li>
							<span>Dung lượng pin:</span><div><?php echo $product['battery']; ?></div>
						</li>
					</ul>
					<button type="button" class="viewparameterfull">Xem thêm cấu hình chi tiết</button>
				</div>	
			</div>
		</div>
	</section>
	<script type="text/javascript" charset="utf-8" async defer>
		var notnull = document.querySelectorAll('.infopromo span')
		for (var i = 0; i < notnull.length; i++) {
			if(notnull[i].innerHTML=='') notnull[i].classList.remove('notnull')
		}
	</script>	
</body>
</html>
