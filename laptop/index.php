<?php 
	require '../libs/function.php';
	connect_db();
	global $conn;
	$sql = "SELECT count(ProductId) AS total FROM product WHERE GroupProduct = 'Điện thoại' ";
	$query = mysqli_query($conn, $sql);
	if($query){
		$row = mysqli_fetch_assoc($query);
	}
	$total_records = $row['total'];
	$group = "Điện thoại";
	$data = group_product($group);
	disconnect_db();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Điện thoại smartphone chính hãng, giá rẻ, trả góp 0%</title>
	<link href="../img/icon/favicon.ico" rel="shortcut icon" type="image/x-icon">
	<script src="../js/jquery.min.js"></script>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<header>
		<div class="wrap-main">
			<a href="../" title="Về trang chủ Thegioididong.com" class="logo">
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
	            <a href="#" class="laptop actmenu" title="Máy tính xách tay, Laptop">
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
	            <a href="../login/" class="account" title="Đăng nhập">
	            	<i class="icon-account"></i> Đăng nhập
	            </a>
            </div>
        	</nav>
		</div>
	</header>
	<section>
		<aside>
			<img src="../img/banner/sinh-nhat-800-170-800x170.png" alt="">
		</aside>
		<div class="filter">
			<div class="brand">
				<a href="dtdd-samsung/">
					<img src="../img/brand/Samsung42-b_25.jpg">
				</a>
				<a href="dtdd-apple-iphone">
					<img src="../img/brand/iPhone-(Apple)42-b_16.jpg">
				</a>
				<a href="dtdd-oppo">
					<img src="../img/brand/OPPO42-b_9.png">
				</a>
				<a href="dtdd-xiaomi">
					<img src="../img/brand/Xiaomi42-b_45.jpg">
				</a>
				<a href="dtdd-vsmart">
					<img src="../img/brand/Vsmart42-b_40.png">
				</a>
				<a href="dtdd-vivo">
					<img src="../img/brand/Vivo42-b_50.jpg">
				</a>
				<a href="dtdd-realme">
					<img src="../img/brand/Realme42-b_37.png">
				</a>
				<a href="dtdd-huawei">
					<img src="../img/brand/Huawei42-b_30.jpg">
				</a>
			</div>
		</div>
		<h1 class="h1">Danh mục laptop</h1>
		<!-- <div class="sort">
			<span>Sắp xếp:</span>
			<span>Giá cao đến thấp</span>
			<span>Giá thấp đến cao</span>
		</div> -->
		<ul class="homeproduct">
			<?php foreach ($data as $item) { ?>
			<li class="item">
				<a href="detail/?id=<?php echo $item['ProductId'] ?>">
					<img src="../<?php echo $item['ProductImage'];?>" height="180">
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
		<a class="viewmore">Xem thêm <span><?php echo $total_records-10; ?></span> điện thoại</a>
	</section>
	<script type="text/javascript">
		var current = 1;
		var group = "Điện thoại";
		$(document).ready(function() {
			$('.viewmore').click(function(event) {
				total = $('span',this).html()
				total-=10
				$('span',this).html(total)
				if($('span',this).html()<=0){
					$(this).css('display','none')
				}
				current+=1;
				$.get('../pagination.php',{i:current,group:group},function(data){
					$('.homeproduct').append(data)
				})
			});

		});
	</script>
</body>
</html>