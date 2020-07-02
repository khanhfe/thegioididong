<?php session_start(); require 'connect_address.php';date_default_timezone_set("Asia/Ho_Chi_Minh");?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Giỏ hàng của bạn</title>
	<link href="../img/icon/favicon.ico" rel="shortcut icon" type="image/x-icon">
	<link rel="stylesheet" href="css/style.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
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
	            <a href="../login/" class="account" title="Đăng nhập">
	            	<i class="icon-account"></i> Đăng nhập
	            </a>
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
    		<div class="overlay">
    			<span class="cswrap">
    				<span class="dot"></span>
    				<span class="dot"></span>
    				<span class="dot"></span>
    			</span>
    		</div>
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
    								<img data-value="<?php echo $infoProduct['id'] ?>" src="<?php echo $src.$infoProduct['image'] ?>">
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
						        		<strong style="float: none; margin-right: 0;"><?php echo number_format($infoProduct['priceunit']-$infoProduct['pricepromo'],0,"",".").'₫'; ?>
						        			
						        		</strong>còn
						        		<strong style="float: none;"><?php echo number_format($infoProduct['pricepromo'],0,"",".").'₫'; ?></strong>
						        	</span>
						        </div>
						        <input type="hidden" name="saleoff" value="<?php echo $saleoff ?>">
						    	<?php } else{ ?>
						    	<input type="hidden" name="saleoff" value="0"> <?php } ?>
						        <div class="choosecolor">
						        	<div class="pseudocolor"></div>
						        	<span class="color">Màu: </span>
						        	<div class="listcolor">
						        	<?php 
						        		foreach ($infoProduct['color'] as $color) {
											foreach ($color as $codecolor ) {
						        	?>
						        		<div class="blockcolor"  data-color="<?php echo $codecolor['Color'];?>">
						        			<img src="<?php echo '../'.$codecolor['image_product']; ?>" >
						        			<span> <?php echo " ".$codecolor['Color']; ?></span>
						        		</div>
						        	<?php } } ?>
						        	</div>
						        	<input type="hidden" name="color[]" value="">
						        </div>
						        <div class="choosenumber">
						        	<div class="abate"></div>
						        	<div class="number">1</div>
						        	<div class="augment"></div>
						        	<input type="hidden" name="amount[]" value="1" class="amount">
						        	<?php $getvalue = ''; echo $getvalue; ?>
						        	<input type="hidden" name="price" value="<?php echo $infoProduct['priceunit'] ?>">
						        </div>
						        <div class="clr"></div>
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
			                <div class="textcode">Sử dụng mã giảm giá</div>
			                <div class="inputcode " style="display:none;">
			                    <button type="button">Áp dụng</button>
			                    <input name="CouponCode" id="CouponCode" placeholder="Nhập mã giảm giá" maxlength="20">
			                    <label id="CouponCode-error" class="error" for="CouponCode" style="display: none;"></label>
			                </div>
			            </div>
			            <div class="clr"></div>
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
				            <input type="text" class="saveinfo" name="FullName" placeholder="Họ và tên" maxlength="50" value="<?php echo !empty($_SESSION['fullname'])? $_SESSION['fullname']: '' ?>">
				            <div class="error" id="errorFullName"></div>
				        </div>
				        <div class="right">
				            <input type="tel" class="saveinfo" name="PhoneNumber" placeholder="Số điện thoại" maxlength="10" value="<?php echo !empty($_SESSION['phonenumber'])? $_SESSION['phonenumber']: '' ?>">
				            <div class="error" id="errorPhoneNumber"></div>
				        </div>
				        <input type="text" class="note" id="OrderNote" name="OrderNote" placeholder="Yêu cầu khác (không bắt buộc)" maxlength="300">
				    </div>
				</div>
				<div class="area_other">
					<div class="textnote">
						<b>Để được phục vụ nhanh hơn,</b> hãy chọn thêm:
					</div>
					<div class="ship_address show">
						<label><input type="radio" name="ship" value="true" checked="checked"><span>Địa chỉ giao hàng</span></label>
						<label><input type="radio" name="ship" value="false"><span>Nhận tại siêu thị</span></label>
					</div>
					<div class="area_address">
						<div class="grid4">
							<div id="citys" class="dropdown">
								<div class="pseudo" id="default" value="1">Hồ Chí Minh</div>
								<div class="layer grid2 city">
									<?php $province = select_province(); foreach ($province as $value) { ?>
									<div class="list province" value="<?php echo $value['id']; ?>" ><?php echo $value['_name']; ?></div> 
									<?php } ?>
								</div>
							</div>
							<div id="district" class="dropdown">
								<div class="pseudo" id="districtvalue" value="0">Chọn quận, huyện</div>
								<div class="layer grid2 district">
									<?php $district = get_district(); foreach ($district as $value) { ?>
									<div class="list listdist" value="<?php echo $value['_prefix'].$value['id']; ?>"><?php echo $value['_name']; ?></div> 
									<?php } ?>
								</div>
								<div class="error" id="nulldistrict"></div>
							</div>
							<div id="ward" class="dropdown">
								<div class="pseudo" id="wardvalue" value="0">Chọn phường, xã</div>
								<div class="layer grid2 ward">
									<div class="list listward" value=""></div> 
								</div>
								<div class="error" id="nullward"></div>
							</div>
							<div class="billaddress">
								<input type="text" placeholder="Số nhà, tên đường" id="BillingAddress_Address" name="BillingAddress" maxlength="200" class="ShipAtHome homenumber saveinfo dropdown" value="" width="100%">
								<div class="error" id="address" style="line-height: 30px;"></div>
							</div>
						</div>
						<input type="hidden" name="province" value="">
						<input type="hidden" name="district" value="">
						<input type="hidden" name="ward" value="">
						<p class="introduction" style="margin-top:20px;color: #fb6e2e;display: block"><b>Hướng dẫn: </b>Chọn địa chỉ để biết chính xác thời gian giao hàng</p>
						<div class="timeblock" style="display: none">
							<div class="tit">Miễn phí giao hàng</div>
							<div class="time">Thời gian nhận hàng muộn nhất dự kiến:
								<b> Trước <?php $currenttime = date('l, yy-m-d H:i:s');
									$date = new DateTime($currenttime);
									$date->add(new DateInterval('P2D'));
									echo $date->format('H')."h "." Ngày ".$date->format('d/m');?>	
								</b>
							</div>
						</div>
						<div class="ol ol1" style="margin-top: 10px;">
							<label>
								<input type="checkbox" name="serviceother[]" value="Gọi người khác nhận hàng (Nếu có)">
								<span> Gọi người khác nhận hàng (Nếu có)</span>
							</label>
						</div>
						<div class="infocontact">
							<div class="malefemale">
						        <label><input type="radio" name="serviceother[]" value="anh" id="male"><span>Anh</span></label>
						        <label><input type="radio" name="serviceother[]" value="chị" id="female"><span>Chị</span></label>
						    </div>
						    <div class="clr"></div>
						    <div class="areainfo">
						        <div class="left">
						            <input type="text" class="saveinfo" name="serviceother[]" placeholder="Họ và tên" maxlength="50" value="">
						        </div>
						        <div class="right">
						            <input type="tel" class="saveinfo" name="serviceother[]" placeholder="Số điện thoại" maxlength="10" value="">
						        </div>
						        <div class="clr"></div>
						    </div>
						</div>
					    <div class="clr"></div>
						<div class="ol">
							<label>
								<input type="checkbox" name="serviceother[]" value="Chuyển danh bạ, dữ liệu qua máy mới">
								<span> Chuyển danh bạ, dữ liệu qua máy mới</span>
							</label>
						</div>
						<div class="ol ol3">
							<label>
								<input type="checkbox" name="serviceother[]" value="Mang thêm điện thoại khác để bạn xem">
								<span> Mang thêm điện thoại khác để bạn xem</span>
							</label>
						</div>
						<div class="deviceother">
							<input type="text" class="saveinfo" name="serviceother[]" placeholder="Nhập tên điện thoại bạn muốn xem" maxlength="50" value="">
						</div>
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
	<script type="text/javascript" charset="utf-8" async defer>
		$(document).ready(function($) {
			$('.promotion span').each(function() {
				if($(this).html()==="Tặng 2 suất mua Đồng hồ thời trang giảm 40% (không áp dụng thêm khuyến mãi khác)"){
					$(this).append(" <a href='#'>(click xem chi tiết)</a>")
				}
			});
			$('.choosecolor').each(function() {
				$('.color',this).append($('.blockcolor',this).attr('data-color'))
				$('input[name="color[]"]',this).val($('.blockcolor',this).attr('data-color'))
				var img = $(this).children('img')
				console.log(img.attr('src','1'));
			});
			$('.choosecolor').click(function(event) {
				$('.listcolor', this).slideToggle(200)
				$('.pseudocolor', this).toggleClass('act');
			});
			$('.blockcolor').click(function(event) {
				color = $(this).attr('data-color');
				$(this).closest('.choosecolor').find('span.color').text("Màu: "+color);
				inputcolor = $(this).closest('.choosecolor').find('input')
				inputcolor.val(color)
				src = $(this).find('img').attr('src')
				$(this).closest('.list_order li').find('.colimg a img').attr('src',src)
			});

			$('.textcode').click( function(event) {
				$('.inputcode').css('display','block')
			});

			$('.city,.district,.ward').hide();
			$('#citys').click(function(event) {
				$('.city').slideToggle(300);
				$('.city').css('overflow-y','scroll');
				$('#citys').toggleClass('show');
				if($('.district').css('display')=='grid'){
					$('.district').slideToggle(100)
					$('#district').toggleClass('show');
				}
				if($('.ward').css('display')=='grid'){
					$('.ward').slideToggle(100)
					$('#ward').toggleClass('show');
				}

			});
			$('.list.province').click(function(event) {
				city = $(this).html();
				index = $(this).attr('value');
				$('#default').html(city);
				$('#default').attr('value',index);
			});
			$('#district').click(function(event) {
				$('.district').slideToggle(300);
				$('.district').css('overflow-y','scroll');
				$('#district').toggleClass('show');
				$('.ward').css('overflow','hidden');
				if($('.city').css('display')=='grid'){
					$('.city').slideToggle(100)
					$('#citys').toggleClass('show');
				}
				if($('.ward').css('display')=='grid'){
					$('.ward').slideToggle(100)
					$('#ward').toggleClass('show');
				}
			});

			$('.listdist').live('click',function(event) {
				listdist = $(this).html();
				index = $(this).attr('value');
				$('#districtvalue').html(listdist);
				$('#districtvalue').attr('value',index);
			});
			$('#ward').live('click',function(event) {
				$('.ward').slideToggle(300);
				$('.ward').css('overflow-y','scroll');
				$('#ward').toggleClass('show');
				if($('.city').css('display')=='grid'){
					$('.city').slideToggle(100)
					$('#citys').toggleClass('show');
				}
				if($('.district').css('display')=='grid'){
					$('.district').slideToggle(100)
					$('#district').toggleClass('show');
				}
			})
			$('.listward').live('click',function(event) {
				listward = $(this).html();
				index = $(this).attr('value');
				$('#wardvalue').html(listward);
				$('#wardvalue').attr('value',index);
			});
			$('.province').click(function(event) {
				ProvinceID = $('#default').attr('value');
				$.post('get_district.php', {'ID': ProvinceID}, function(data) {
					$('#district').html(data);
				});
			});
			$('.listdist').live('click',function(event) {
				DistrictID = $('#districtvalue').attr('value');
				$.post('get_ward.php', {'ID': DistrictID}, function(data) {
					$('#ward').html(data);
				});
				listdist = $('#districtvalue').html();
				$('input[name="district"]').val(listdist)
			});
			$('.listward').live('click', function(event) {
				listprovince = $('#default').html()
				listward = $('#wardvalue').html();
				$('input[name="province"]').val(listprovince)
				$('input[name="ward"]').val(listward)
			});
			$('input[type="radio"]').change(function(event) {
				$('#errorgender').html('')
			});
			$('input.saveinfo').change(function(event) {
				$(this).removeClass('error')
				$('#errorFullName').html('')
			});
			$('input[name="PhoneNumber"]').change(function(event) {
				$('#errorPhoneNumber').html('')
			});
			$('input[name="BillingAddress"]').change(function(event) {
				$('#address').html('')
			});
			$('input[value="false"]').click(function(event) {
				$('.area_address').addClass('supermarket');
				$('#ward, #BillingAddress_Address,.ol1,.ol3,.infocontact,.deviceother').css('display','none')
				$('.introduction').html("Chúng tôi sẽ sớm cập nhật các siêu thị gần nhất đến quý khách.<br>Quý khách vui lòng đến các siêu thị thuộc hệ thống <b>thegioididong.com</b> để nhận máy trong 24h, hết 24h đơn hàng sẽ tự động hủy!")
				$('.introduction').css('margin','10px 0 20px ')
				$('.introduction').css('line-height','22px')
			});
			$('input[value="true"]').click(function(event) {
				$('.area_address').removeClass('supermarket');
				$('#ward, #BillingAddress_Address,.ol1,.ol3').css('display','block')
				$('.introduction').html("<b>Hướng dẫn: </b>Chọn địa chỉ để biết chính xác thời gian giao hàng")
				
			});
			function delay(){
				$('.overlay').css('display','none')
			}
			function timing(){
				$('.overlay').css('display','block')
				setTimeout(delay,300)
			}
			$('.blockcolor,.augment,.abate,.province,.listdist,.listward,.delete').live('click', function(event) {
				timing();
				$('.dot').addClass('active')
			});
			$('.listward').live('click', function(event) {
				$('.introduction').css('display','none')
				$('.timeblock').css('display','block')
			});
			$('.ol1 label input').change(function(event) {
				$('.infocontact').slideToggle(400)
				$('.infocontact').css('overflow','hidden')
			});
			$('.ol3 label input').change(function(event) {
				$('.deviceother').slideToggle(400)
			});
			$('.payoffline').click(function(){
		        var val = []
		        $(':checkbox:checked').each(function(i){
		          val[i] = $(this).val();
		          console.log(val[i]);
		        });
		    });

		});
	</script>
	<script type="text/javascript" charset="utf-8">
		function checkInforUser(){
			var male = document.getElementById('male');
			var female = document.getElementById('female');
			if (!male.checked&&!female.checked) {
				document.getElementById('errorgender').innerHTML = "Mời quý khách chọn danh xưng";
				document.getElementById('errorgender').style.marginTop = "5px";
			}
			var fullname = document.querySelector('input[name="FullName"]').value;
			var phonenumber = document.querySelector('input[name="PhoneNumber"]').value;
			var address = document.querySelector('input[name="BillingAddress"]').value;
			if (fullname=='' && phonenumber=='' && address=='') {
				var error = document.querySelectorAll('.saveinfo')
				for (i = 0; i < error.length; i++) {
					error[i].classList.add('error')
				}
				document.getElementById('errorFullName').innerHTML = "Quý khách cần điền tên";
				document.getElementById('errorPhoneNumber').innerHTML = "Quý khách cần điền số điện thoại";
				if(document.getElementById('BillingAddress_Address').style.display=='')
					document.getElementById('address').innerHTML = "Quý khách vui lòng điền số nhà, tên đường";
				return false;
			}else if(fullname==''){
				document.querySelector('input[name="FullName"]').classList.add('error')
				document.getElementById('errorFullName').innerHTML = "Quý khách cần điền tên";
				return false;
			}else if(phonenumber==''){
				document.querySelector('input[name="PhoneNumber"]').classList.add('error')
				document.getElementById('errorPhoneNumber').innerHTML = "Quý khách cần điền số điện thoại";
				return false;
			}else if(isNaN(phonenumber)||phonenumber.length<10){
				document.querySelector('input[name="PhoneNumber"]').classList.add('error')
				document.getElementById('errorPhoneNumber').innerHTML = "Số điện thoại không hợp lệ";
				return false;
			}else if (address==''&&(document.getElementById('BillingAddress_Address').style.display=='')) {
				document.querySelector('input[name="BillingAddress"]').classList.add('error')
				document.getElementById('address').innerHTML = "Quý khách vui lòng điền số nhà, tên đường";
				return false;
			}
			else return true;
			
		}
		var pay = document.getElementById("pay").innerHTML 
		if (pay == "0₫") {
			document.getElementById('nullcart').style.display = 'block'
			document.getElementById('cart').style.display = 'none'
			document.querySelector('body').style.background = '#fff' 
		} else {
			document.getElementById('nullcart').style.display = 'none'
			document.getElementById('cart').style.display = 'block'
		}

		var notnull = document.querySelectorAll('.promotion span')
		for (var i = 0; i < notnull.length; i++) {
			if(notnull[i].innerHTML.trim()==='') notnull[i].classList.remove('notnull')
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