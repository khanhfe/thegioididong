<?php 
 	require'libs/function.php';
 	$product = show_all();
 	$banner = show_banner();
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
</head>
<body>
	<header>
		<div class="wrap-main">
			<a href="index.php" title="Về trang chủ Thegioididong.com" class="logo">
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
                <a id="b_35866" title="Mobi Tặng 20% giá trị nạp thẻ - 24/06" href="#" class="liveevent card" target="_blank" rel="noopener"><span id="dot"><span class="ping"></span></span><span class="text"><strong></strong>Trực tiếp ra mắt Reddmi 9</span></a>
        	</figure>
        	<ul>
                <li>
                    <a href="#">
                        <img width="100" height="70" src="img/news/gismochina1_800x448-100x100.jpg" alt="Chơi lớn như Samsung, tiếp tục giảm sốc 2 triệu đồng cho Galaxy S10 Lite, Samfans không nên bỏ qua lần này">
                        <h3>Vivo X50 Pro và X50 Pro Plus với khả năng chống rung như Gimbal, sắp sửa lên kệ toàn cầu. Tín đồ thích quay video hẳn sẽ phải để ý</h3>
                        <span>56 phút trước</span>
                    </a>
                </li>
        	</ul>
        	<div class="twobanner ">
		        <a aria-label="slide" href="">
		        	<img style="cursor:pointer" src="img/banner/A31-398-110-398x110.png" alt="A21s" width="398" height="110">
		        </a>
				<a aria-label="slide" href="">
					<img style="cursor:pointer" src="img/banner/398-110copy-398x110.png" alt="iPhone 7" width="398" height="110">
				</a>    
			</div>
		</aside>
		<div class="clr"></div>
		<div class="promotebanner">
			<a href="">
				<img src="img/banner/1200-75-1200x75-1.png">
			</a>
		</div>
		<div class="container">
			<h2>10 Khuyễn mãi hot nhất</h2>
			<div class="product" id="product">
				<div class="carousel">
					<ul class="list" id="carousel" >
						<?php
						foreach ($product as $item) {  $_SESSION['id'] = $item['ProductImage'];$_SESSION['ProdcutName'] = $item['ProductName'];?>
						<li >
							<a href="dtdd/?id=<?= $item['ProductId'] ?>">
								<img src="<?php echo $item['ProductImage'] ?>" width="200" height="200">	
								<h5><?php echo $item['ProductName']; ?></h5>
								<div class="price">
									<strong><?php if($item['PricePromo']==0) echo number_format($item['PriceCurrent'],0,"","."); else echo number_format($item['PricePromo'],0,"","."); ?>₫</strong>
									<span><?php  if($item['PricePromo']!=0) echo number_format($item['PriceCurrent'],0,"",".") .'₫'; ?></span>
								</div>
								<div class="promo">
									<?php echo $item['Promo2'] ?>
								</div>
								<?php if($item['PricePromo'] != 0){ ?>
								<label class="discount">GIẢM <?php echo number_format($item['PriceCurrent']-$item['PricePromo'],0,"",".").'₫'?> </label>
								<?php }?>
							</a>
						</li> <?php } ?>
					</ul>	
				</div>
				<div class="control">					
					<div class="btn prev" id="prev">‹</div>
					<div class="btn next" id="next">›</div>
				</div>
			</div>		
		</div>
	</section>
	<script type="text/javascript" src="js/javascript.js">
	</script>
</body>
</html>