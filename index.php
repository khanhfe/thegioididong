<?php 
 	require'libs/function.php';
 	$product = product_promo();
 	$banner = show_banner();
 	$laptop = group_product('Laptop',4);
 	disconnect_db();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Thegioididong.com - Điện thoại, Tablet, Laptop, Phụ kiện chính hãng</title>
	<link href="img/icon/favicon.ico" rel="shortcut icon" type="image/x-icon">
	<link rel="stylesheet" href="css/style.css">
	<script src="js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
	<header>
		<div class="wrap-main">
			<a href="" title="Về trang chủ Thegioididong.com" class="logo">
				<i class="icon-logo"></i>
			</a>
			<form id="search-site" action="tim-kiem/" method="get" accept-charset="utf-8" autocomplete="off">
				<input type="text" name="key" class="topinput" maxlength="50" placeholder="Bạn tìm gì..." id="search-keyword">
				<button class="btntop" type="submit">
					<i class="icon-topsearch"></i>
				</button>
				<ul class="wrap-suggestion">
				</ul>
			</form>
			<nav>
	            <a href="dtdd/" class="mobile" title="Điện thoại di động, smartphone">
	                <i class="icon-mobile"></i>Điện thoại
	            </a>
	            <a href="laptop/" class="laptop" title="Máy tính xách tay, Laptop">
	                <i class="icon-laptop"></i>Laptop
	            </a>
	            <a href="may-tinh-bang/" class="tablet" title="Máy tính bảng, tablet">
	                <i class="icon-tablet"></i>Tablet
	            </a>
	            <a href="" class="phukien" title="Phụ kiện điện thoại di động, phụ kiện tablet, phụ kiện lapto">
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
	            <a href="login/" class="account" title="Đăng nhập">
	            	<i class="icon-account"></i> Đăng nhập
	            </a>
            </div>
        	</nav>
		</div>
	</header>
	<section>
		<aside class="homebanner">
			<div class="owl-carousel" id="sync1" onmouseover="clickable()" onmouseout="clickdisable()">
				<div class="owl-wrapper-out">
					<div class="owl-wrapper">
						<?php foreach ($banner as  $item) { ?>
						<div class="owl-item">
							<div class="item">
								<a href="<?php echo $item['link'] ?>" title="">
									<img src="<?php echo $item['image'] ?>" alt="">
								</a>
							</div>
						</div><?php } ?>
					</div>
				</div>
				<div class="owl-control">
					<div class="owl-buttons">
						<div class="owl-prev">‹</div>
						<div class="owl-next">›</div>
					</div>
				</div>
			</div>
			<div id="sync2" class="owl-carousel">
                <div class="owl-wrapper-outer">
                	<div class="owl-wrapper">
                		<?php foreach ($banner as $item) { ?>
                		<div class="owl-item" >
                			<div class="item">
                    			<h3><?php echo $item['content']; ?></h3>
	                		</div>
	                	</div> <?php } ?>
	                </div>
            	</div>            
        	</div>			
		</aside>
		<aside class="homenews">
			<figure>
            <h2><a href="#">Tin công nghệ</a></h2>
            <b></b>
                <a id="b_35866" title="Vina TẶNG 20% giá trị nạp thẻ - 24/06" href="#" class="liveevent card" rel="noopener"><span id="dot"><span class="ping"></span></span><span class="text"><strong>Vina TẶNG 20%</strong> giá trị thẻ nạp - 17/07</span></a>
        	</figure>
        	<ul>
                <li>
                    <a href="">
                        <img width="100" height="70" src="img/news/honor-30_800x451-100x100.jpg" alt="Chơi lớn như Samsung, tiếp tục giảm sốc 2 triệu đồng cho Galaxy S10 Lite, Samfans không nên bỏ qua lần này">
                        <h3>Huawei Enjoy 20s lộ gần như toàn bộ thông số cấu hình: Chip Dimensity 800, bộ 3 camera sau 64MP, viên pin 4.300mAh</h3>
                        <span>8 giờ trước</span>
                    </a>
                </li>
        	</ul>
        	<div class="twobanner ">
		        <a aria-label="slide" href="dtdd/detail/?id=18">
		        	<img style="cursor:pointer" src="img/banner/A31-398-110-398x110.png" alt="A21s" width="398" height="110">
		        </a>
				<a aria-label="slide" href="dtdd/detail/?id=17">
					<img style="cursor:pointer" src="img/banner/398-110copy-398x110.png" width="398" height="110">
				</a>    
			</div>
		</aside>
		<div class="clr"></div>
		<!-- <div class="promotebanner">
			<a href="">
				<img src="img/banner/1200-75-1200x75-1.png">
			</a>
		</div> -->
		<div class="">
			<div class="navigat">
				<h2>10 Khuyễn mãi hot nhất</h2>
			</div>
			<div class="owl-carousel product">
				<div class="owl-wrapper-out">
					<div class="owl-wrapper">
						<?php foreach ($product as $item) {  $_SESSION['id'] = $item['ProductImage'];$_SESSION['ProdcutName'] = $item['ProductName'];?>
						<div class="owl-item">
							<div class="item">
								<a href="<?php echo $item['folder']; ?>/detail/?id=<?= $item['ProductId'] ?>">
									<img src="<?php echo $item['ProductImage'] ?>" width="180">	
									<h5><?php echo $item['ProductName']; ?></h5>
									<div class="price">
										<strong><?php if($item['PricePromo']==0) echo number_format($item['PriceCurrent'],0,"","."); else echo number_format($item['PricePromo'],0,"","."); ?>₫</strong>
										<span><?php  if($item['PricePromo']!=0) echo number_format($item['PriceCurrent'],0,"",".") .'₫'; ?></span>
									</div>
									<div class="promo">
										<?php echo $item['Promo1'] ?>
									</div>
									<?php if($item['PricePromo'] != 0){ ?>
									<label class="discount">GIẢM <?php echo number_format($item['PriceCurrent']-$item['PricePromo'],0,"",".").'₫'?> </label>
									<?php }?>
								</a>
							</div>
						</div> <?php } ?>
					</div>	
				</div>
				<div class="control">					
					<div class="btn prev">‹</div>
					<div class="btn next">›</div>
				</div>
			</div>
		</div>
		<div class="navigat">
			<h2>Laptop nổi bật</h2>
			<div class="viewcat">
				<a href="laptop/">Xem tất cả laptop</a>
			</div>
		</div>
		<div class="clr"></div>
		<ul class="homeproduct laptop">
			<?php foreach ($laptop as $item) { ?>
			<li class="item">
				<a href="laptop/detail/?id=<?php echo $item['ProductId'] ?>">
					<img src="<?php echo $item['ProductImage'];?>" >
					<h3><?php echo $item['ProductName']; ?></h3>
					<div class="price">
						<strong><?php if($item['PricePromo']==0) echo number_format($item['PriceCurrent'],0,"","."); else echo number_format($item['PricePromo'],0,"","."); ?>₫</strong>
						<span><?php  if($item['PricePromo']!=0) echo number_format($item['PriceCurrent'],0,"",".") .'₫'; ?></span>
					</div>
					<div class="promo"><?php echo $item['Promo1'] ?></div>
					<?php if($item['PricePromo'] != 0){ ?>
					<label class="discount">GIẢM <?php echo floor((($item['PriceCurrent']-$item['PricePromo'])/$item['PriceCurrent'])*100).'%';?> </label>
					<?php } ?>
				</a>
			</li>
			<?php } ?>
		</ul>
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
	<script type="text/javascript" src="js/javascript.js">
	</script>
	<script type="text/javascript" src="js/searching.js">
	</script>
</body>
</html>