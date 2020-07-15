<?php 
	require '../libs/function.php';
	connect_db();
	global $conn;
	$sql = "SELECT count(ProductId) AS total FROM product WHERE GroupProduct = 'Máy tính bảng' ";
	$query = mysqli_query($conn, $sql);
	if($query){
		$row = mysqli_fetch_assoc($query);
	}
	$total_records = $row['total'];
	$group = "Máy tính bảng";
	$data = group_product($group,10);
	disconnect_db();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Máy tính bảng, tablet giá rẻ, trả góp 0%</title>
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
	            <a href="../dtdd" class="mobile" title="Điện thoại di động, smartphone">
	                <i class="icon-mobile"></i>Điện thoại
	            </a>
	            <a href="" class="laptop" title="Máy tính xách tay, Laptop">
	                <i class="icon-laptop"></i>Laptop
	            </a>
	            <a href="../may-tinh-bang actmenu" class="tablet" title="Máy tính bảng, tablet">
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
				<a href="laptop-apple/">
					<img src="../img/brand/iPad-(Apple)522-b_28.jpg">
				</a>
				<a href="laptop-asus">
					<img src="../img/brand/Samsung42-b_25.jpg">
				</a>
				<a href="laptop-hp">
					<img src="../img/brand/Huawei42-b_30.jpg">
				</a>
				<a href="laptop-lenovo">
					<img src="../img/brand/Lenovo44-b_36.jpg">
				</a>
				<a href="laptop-acer">
					<img src="../img/brand/Masstel522-b_35.png">
				</a>
				<a href="laptop-dell">
					<img src="../img/brand/Mobell522-b_30.jpg">
				</a>
			</div>
		</div>
		<h1 class="h1">Danh mục máy tính bảng</h1>
		<!-- <div class="sort">
			<span>Sắp xếp:</span>
			<span>Giá cao đến thấp</span>
			<span>Giá thấp đến cao</span>
		</div> -->
		<ul class="homeproduct">
			<?php foreach ($data as $item) { ?>
			<li class="item">
				<a href="detail/?id=<?php echo $item['ProductId'] ?>">
					<img src="../<?php echo $item['ProductImage'];?>" >
					<h3><?php echo $item['ProductName']; ?></h3>
					<div class="price">
						<strong><?php if($item['PricePromo']==0) echo number_format($item['PriceCurrent'],0,"","."); else echo number_format($item['PricePromo'],0,"","."); ?>₫</strong>
						<span><?php  if($item['PricePromo']!=0) echo number_format($item['PriceCurrent'],0,"",".") .'₫'; ?></span>
					</div>
					<div class="promo"><?php echo $item['Promo1'] ?></div>
					<?php if($item['PricePromo'] != 0){ ?>
					<label class="discount">GIẢM <?php echo number_format($item['PriceCurrent']-$item['PricePromo'],0,"",".").'₫';?> </label>
					<?php } ?>
				</a>
			</li>
			<?php } ?>
		</ul>
		<a class="viewmore">Xem thêm <span><?php echo $total_records-10; ?></span> máy tính bảng</a>
	</section>
	<footer>
		<div class="rowfoot1">
			<ul class="colfoot">
				<li><a href="" title="">Lịch sử mua hàng</a></li>
				<li><a href="" title="">Tìm hiểu về mua trả góp</a></li>
				<li><a href="" title="">Chính sách bảo hành</a></li>
				<li><a href="" title="">Chính sách đổi trả</a></li>
			</ul>
			<ul class="colfoot">
				<li><a href="" title="">Giới thiệu công ty</a></li>
				<li><a href="" title="">Tuyển dụng</a></li>
				<li><a href="" title="">Gửi góp ý, khiếu nại</a></li>
				<li><a href="" title="">Tìm siêu thị</a></li>
			</ul>
			<ul class="colfoot">
				<li>
					<p>Gọi mua hàng <a href="tel:18001060">1800.1060</a> (7:30 - 22:00)</p>
					<p>Gọi khiếu nại <a href="tel:18001060">1800.1060</a> (8:00 - 21:30)</p>
					<p>Gọi bảo hành <a href="tel:18001060">1800.1060</a> (8:00 - 21:30)</p>
					<p>Kỹ thuật &nbsp; &nbsp; &nbsp; &nbsp; <a href="tel:18001060">1800.1060</a> (7:30 - 22:00)</p>
				</li>
			</ul>
			<ul class="colfoot">
				<li><a href="" title="">Lịch sử mua hàng</a></li>
				<li><a href="" title="">Tìm hiểu về mua trả góp</a></li>
				<li><a href="" title="">Chính sách bảo hành</a></li>
				<li><a href="" title="">Chính sách đổi trả</a></li>
			</ul>
		</div>
		<div class="rowfoot2">
        <p>© 2018. Công ty cổ phần Thế Giới Di Động. GPMXH: 238/GP-BTTTT do Bộ Thông Tin và Truyền Thông cấp ngày 04/06/2020. Địa chỉ: 128 Trần Quang Khải, P. Tân Định, Q.1, TP.Hồ Chí Minh. Điện thoại: 028 38125960. Email: cskh@thegioididong.com. Chịu trách nhiệm nội dung: Huỳnh Văn Tốt. <a href="">Xem chính sách sử dụng</a></p>
    	</div>
	</footer>
	<script type="text/javascript">
		var current = 1;
		var group = "Máy tính bảng";
		var limit = 10;
		$(document).ready(function() {
			if ($('.viewmore span').html()<=0) {
				$('.viewmore').css('display','none')
			}
			$('.viewmore').click(function(event) {
				total = $('span',this).html()
				total-=10
				$('span',this).html(total)
				if($('span',this).html()<=0){
					$(this).css('display','none')
				}
				current+=1;
				$.get('../pagination.php',{i:current,group:group,limit:limit},function(data){
					$('.homeproduct').append(data)
				})
			});

		});
	</script>
</body>
</html>