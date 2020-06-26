<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Giỏ hàng của bạn</title>
	<link href="../img/icon/favicon.ico" rel="shortcut icon" type="image/x-icon">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<?php $src = "../";?>
	<header id="header" class="">
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
	<section id="cart">
		<div class="bar-top">
        	<a href="../" class="buymore">Mua thêm sản phẩm khác</a>
        	<div class="yourcart">Giỏ hàng của bạn</div>
    	</div>
    	<div class="wrap_cart">
    		<form action="../order-success/" method="post" accept-charset="utf-8">
    			<div class="detail_cart">
    				<ul class="list_order">
    					<?php 
							$totalmoney = 0;
							$saleoff = 0;
							$pay = 0;
							if (is_array($_SESSION['infoProduct']) || is_object($_SESSION['infoProduct'])){
							foreach($_SESSION['infoProduct'] as $infoProduct) {
								$totalmoney += $infoProduct['priceunit'];
								if($infoProduct['pricepromo']!=0){ $saleoff = $infoProduct['priceunit']-$infoProduct['pricepromo'];}
								$pay = $totalmoney - $saleoff;
    					?>
    					<li>
    						<div class="colimg">
    							<a href="../dtdd/?id=<?php echo $infoProduct['id'] ?>">
    								<img src="<?php echo $src.$infoProduct['image'] ?>">
    							</a>
    							<a class="delete" href="delete.php?id=<?php echo $infoProduct['id'] ?>"><span></span>Xóa</a>
    						</div>
    						<div class="colinfo">
    							<strong><?php echo number_format($infoProduct['priceunit'],0,"","."); ?>₫</strong>
    							<a href="../dtdd/?id=<?php echo $infoProduct['id'] ?>"><?php echo $infoProduct['nameproduct']; ?></a>
    							<div class="promotion  webnote ">
    								<span class="notnull"><?php echo $infoProduct['promo1']; ?></span>
						            <span class="notnull"><?php echo $infoProduct['promo2']; ?></span>
						            <span class="notnull"><?php echo $infoProduct['promo3']; ?></span>
						            <span class="notnull"><?php echo $infoProduct['promo4']; ?></span>
						        </div>
						        <?php if($infoProduct['pricepromo']!=0) { ?>
						        <div>
						        	<span>Giảm 
						        		<strong style="float: none; margin-right: 0;"><?php echo number_format($infoProduct['priceunit']-$infoProduct['pricepromo'],0,"",".").'₫'; ?></strong>
						        		còn
						        		<strong style="float: none;"><?php echo number_format($infoProduct['pricepromo']).'₫'; ?></strong>
						        	</span>
						        </div>
						        <input type="hidden" name="saleoff" value="<?php echo $saleoff ?>">
						    	<?php } else{ ?>
						    	<input type="hidden" name="saleoff" value="0"> <?php } ?>
						        <div class="choosecolor">
						        	<span>Màu: đen</span>
						        </div>
						        <div class="choosenumber">
						        	<div class="abate"></div>
						        	<div class="number">1</div>
						        	<div class="augment"></div>
						        	<input type="hidden" name="amount[]" value="1" class="amount">
						        	<?php $getvalue = ''; echo $getvalue; ?>
						        	<input type="hidden" name="price" value="<?php echo $infoProduct['priceunit'] ?>">
						        </div>
    						</div>
    					</li>
    					<?php } } ?>
    				</ul>
    				<div class="area_total">
			            <div>
			                <div>
			                    <span>Tổng tiền:</span>
			                    <span id="totalmoney"><?php echo number_format($totalmoney,0,"","."); ?>₫</span>
			                </div>
			                <?php if($saleoff!=0) { ?>
			                <div>
			                	<span>Giảm:</span>
			                	<span id="saleoff">-<?php echo number_format($saleoff,0,"",".").'₫'; ?></span>
			                </div>
			            	<script type="text/javascript" charset="utf-8" async defer>
			            		function formatNumber(num) {
									return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
								}
			            		var moneyoff = 0
						        var saleoff = document.querySelectorAll('input[name="saleoff"]')
						        for (var j = 0; j < saleoff.length; j++) {
									b = parseInt(saleoff[j].value)
									moneyoff+=b
								}
								document.getElementById('saleoff').innerHTML = '-'+formatNumber(moneyoff)+ '₫'
						    </script>
						    <?php } ?>
			                <div class="pay">
			                    <b>Cần thanh toán:</b>
			                    <strong id="pay"><?php echo number_format($pay,0,"",".");  ?>₫</strong>
			                    <input type="hidden" name="totalmoney" value="">
			                    <input type="hidden" name="pay" value="">
			                </div>
			            </div>
			            <div class="boxCouponCode">
			                <div class="textcode">
			                    Sử dụng mã giảm giá
			                </div>
			                <div class="inputcode " style="display:none;">
			                    <button type="button">Áp dụng</button>
			                    <label id="CouponCode-error" class="error" for="CouponCode" style="display: none;"></label>
			                </div>
			            </div>
        			</div>
    			</div>
    			<div class="infouser ">
				    <div class="malefemale">
				        <label><input type="radio" name="gender" value="anh" id="male" <?php if(isset($_SESSION['gender'])){ if($_SESSION['gender']=='anh')echo "checked"; } ?> ><span>Anh</span></label>
				        <label><input type="radio" name="gender" value="chị" id="female" <?php if(isset($_SESSION['gender'])){ if($_SESSION['gender']=='chị')echo "checked"; } ?>><span>Chị</span></label>
				        <span id="errorgender" class="error"></span>
				    </div>
				    <div class="areainfo">
				        <div class="left">
				            <input type="text" id="fullname" class="saveinfo" name="FullName" placeholder="Họ và tên" maxlength="50" value="<?php echo !empty($_SESSION['fullname'])? $_SESSION['fullname']: '' ?>">
				            <div class="error" id="errorFullName"></div>
				        </div>
				        <div class="right">
				            <input type="tel" id="phonenumber" class="saveinfo" name="PhoneNumber" placeholder="Số điện thoại" maxlength="10" value="<?php echo !empty($_SESSION['phonenumber'])? $_SESSION['phonenumber']: '' ?>">
				            <div class="error" id="errorPhoneNumber"></div>
				        </div>
				        <input type="text" class="saveinfo" style="" id="OrderNote" name="OrderNote" placeholder="Yêu cầu khác (không bắt buộc)" maxlength="300">
				    </div>
				</div>
				<div class="new-follow">
                    <div class="choosepayment">
                        <button name="submit" onclick="return checkInforUser()" class="payoffline full">Đặt hàng</button>
                    </div>
                    <p style="text-align:center">Bạn có thể chọn hình thức thanh toán sau khi đặt hàng</p>
                </div>
    		</form>
    	</div>
    	<p class="provision">Bằng cách đặt hàng, bạn đồng ý với <a href="/tos" target="_blank">Điều khoản sử dụng</a> của Thegioididong</p>
	</section>
	<section id="nullcart">
		<div class="null_cart">
	        <i class="iconnoti iconnull"></i>
	        Không có sản phẩm nào  trong giỏ hàng
	        <a href="../" class="buyother">Về trang chủ</a>
	        <div class="callship">Khi cần trợ giúp vui lòng gọi 
	        	<a href="tel:18001060">1900.2803</a> hoặc <a href="tel:02836221060">024.2001.2803</a> (7h30 - 22h)
	        </div>
	    </div>
	</section>
	<script type="text/javascript" charset="utf-8">
		function checkInforUser(){
			var male = document.getElementById('male');
			var female = document.getElementById('female');
			if (!male.checked&&!female.checked) {
				document.getElementById('errorgender').innerHTML = "Mời quý khách chọn danh xưng";
				document.getElementById('errorgender').style.marginTop = "5px";
			}
			var fullname = document.getElementById('fullname').value;
			var phonenumber = document.getElementById('phonenumber').value;

			if (fullname=='' && phonenumber=='') {
				document.getElementById('fullname').style.border = '1px solid #dd4b39';
				document.getElementById('phonenumber').style.border = '1px solid #dd4b39';
				document.getElementById('errorFullName').innerHTML = "Quý khách cần điền tên";
				document.getElementById('errorPhoneNumber').innerHTML = "Quý khách cần điền số điện thoại";
				return false;
			}else if(fullname==''){
				document.getElementById('fullname').style.border = '1px solid #dd4b39';
				document.getElementById('errorFullName').innerHTML = "Quý khách cần điền tên";
				return false;
			}else if(phonenumber==''){
				document.getElementById('phonenumber').style.border = '1px solid #dd4b39';
				document.getElementById('errorPhoneNumber').innerHTML = "Quý khách cần điền số điện thoại";
				return false;
			}else if(isNaN(phonenumber)||phonenumber.length<10){
				document.getElementById('phonenumber').style.border = '1px solid #dd4b39';
				document.getElementById('errorPhoneNumber').innerHTML = "Số điện thoại không hợp lệ";
				return false;
			}
			else return true;
		}
		var pay = document.getElementById("pay").innerHTML 
		if (pay == "0₫") {
			document.getElementById('nullcart').style.display = 'block'
			document.getElementById('cart').style.display = 'none'
		} else {
			document.getElementById('nullcart').style.display = 'none'
			document.getElementById('cart').style.display = 'block'
		}

		var notnull = document.querySelectorAll('.promotion span')
		for (var i = 0; i < notnull.length; i++) {
			if(notnull[i].innerHTML=='') notnull[i].classList.remove('notnull')
		}

		if (pay != "0₫"){
			var pay = 0
			var totalmoney = 0
			var moneyoffs = 0
			var priceunit = document.querySelectorAll('input[name="price"]')
			
			var augment = document.querySelectorAll('.augment')
			var number = document.querySelectorAll('.number')
			var amount = document.querySelectorAll('.amount')
			
			for (var i = 0; i < priceunit.length; i++) {
				a = parseInt(priceunit[i].value)
				totalmoney+=a
			}
			if(document.querySelector('#saleoff')!=null) {
				pay = totalmoney - moneyoff 
				moneyoffs = moneyoff
			}
			else {
				pay = totalmoney
			}
			document.getElementById('pay').innerHTML = formatNumber(pay) + '₫'
			function formatNumber(num) {
				return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
			}

			document.querySelector('input[name="totalmoney"]').value = totalmoney
			document.querySelector('input[name="pay"]').value = pay

			document.querySelectorAll('.augment').forEach( item => {
				item.addEventListener('click',function() {
					var indexNumber = Array.from(augment).indexOf(event.target)
					var valueNumber = number[indexNumber].innerHTML
					valueNumber = parseInt(valueNumber)
					valueNumber+=1
					number[indexNumber].innerHTML = valueNumber
					if (valueNumber>=2) {
						var active = document.querySelectorAll('.abate')
						active[indexNumber].classList.add('active')
						active[indexNumber].style.pointerEvents = "auto";
					}
					amount[indexNumber].value = valueNumber
					if (valueNumber>=5) {
						augment[indexNumber].style.pointerEvents = 'none'
					}
					var sum = priceunit[indexNumber].value
					sum = parseInt(sum)
					totalmoney+=sum
					if(document.querySelector('#saleoff')!=null) {
						valueoff = parseInt(saleoff[indexNumber].value)
						moneyoffs += valueoff
						pay = totalmoney - moneyoffs
						document.getElementById('saleoff').innerHTML = '-'+formatNumber(moneyoffs)+'₫'
					}
					else {
						pay = totalmoney
					}
					document.getElementById('totalmoney').innerHTML = formatNumber(totalmoney) + '₫'
					document.getElementById('pay').innerHTML = formatNumber(pay) + '₫'
					document.querySelector('input[name="pay"]').value = pay
				})
			})
			var abate = document.querySelectorAll('.abate')
			document.querySelectorAll('.abate').forEach( item => {
				item.addEventListener('click',function() {
					var indexNumber = Array.from(abate).indexOf(event.target)
					console.log(indexNumber)
					var valueNumber = number[indexNumber].innerHTML
					valueNumber = parseInt(valueNumber)
					valueNumber-=1
					number[indexNumber].innerHTML = valueNumber
					if (valueNumber<=1) {
						var active = document.querySelectorAll('.abate')
						active[indexNumber].classList.remove('active')
						active[indexNumber].style.pointerEvents = "none";
					}
					amount[indexNumber].value = valueNumber
					var price = priceunit[indexNumber].value
					price = parseInt(price)
					augment[indexNumber].style.pointerEvents = 'auto'
					var sum = priceunit[indexNumber].value
					sum = parseInt(sum)
					totalmoney-=sum
					if(document.querySelector('#saleoff')!=null) {
						valueoff = parseInt(saleoff[indexNumber].value)
						moneyoffs -= valueoff
						pay = totalmoney - moneyoffs
						document.getElementById('saleoff').innerHTML = '-'+formatNumber(moneyoffs)+'₫'
					}
					else {
						pay = totalmoney
					}
					
					document.getElementById('totalmoney').innerHTML = formatNumber(totalmoney) + '₫'
					document.getElementById('pay').innerHTML = formatNumber(pay) + '₫'
					document.querySelector('input[name="pay"]').value = pay
				})
			})
		}
		var time = 3600000
		var run = setInterval(runtimeDestroySession,1000)
		function runtimeDestroySession(){
			time -= 1000;
			if (time==0) {clearInterval(run);window.location = "delete.php?id=<?php if(!empty($infoProduct['id'])) echo $infoProduct['id']; ?>"}
		}
	</script>
</body>
</html>