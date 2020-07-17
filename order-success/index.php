<?php session_start();date_default_timezone_set("Asia/Ho_Chi_Minh");
if(empty($_SESSION['infoProduct'])){ header('location:../');};?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Đặt hàng thành công</title>
	<link href="../img/icon/favicon.ico" rel="shortcut icon" type="image/x-icon">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<?php
	if(isset($_POST['gender'])){
        $gender = $_POST['gender'];
    }  else {
        $gender = false;
    }
	if (isset($_POST['submit'])) {
		$_SESSION['quantity'] = $_POST['amount'];
		$_SESSION['color'] = $_POST['color'];
 		$_SESSION['phonenumber'] = $_POST['PhoneNumber'];
		$_SESSION['note'] = $_POST['serviceother'];
		$_SESSION['gender'] = $gender;
		$_SESSION['fullname'] = $_POST['FullName'];
		$_SESSION['email'] = '';
		$_SESSION['pay'] = $_POST['pay'];
		
		if($_POST['BillingAddress']!=null){
			$_SESSION['address'] = $_POST['BillingAddress'].", ".$_POST['ward'].", ".$_POST['district'].", ".$_POST['province'];
		}else{
			$_SESSION['address'] = $_POST['district'].", ".$_POST['province'];
		}
	}
	?>
	<header id="header" class="">
		<div class="wrap-main">
			<a href="add_database.php" title="Về trang chủ Thegioididong.com" class="logo">
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
	            <a href="#" class="tablet" title="Máy tính bảng, tablet">
	                <i class="icon-tablet"></i>Tablet
	            </a>
	            <a href="#" class="laptop" title="Máy tính xách tay, Laptop">
	                <i class="icon-laptop"></i>Laptop
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
		<div class="container">
			<div class="picsuccess">
                <div class="notistatus">
                   	<i class="iconnoti iconsuccess"></i>Đặt hàng thành công
                </div>
            </div>
            <div class="thank">
            Cảm ơn <b><?php echo $_SESSION['gender'] ." ". $_SESSION['fullname'];  ?></b> đã cho Thegioididong cơ hội được phục vụ. Trước , nhân viên Thegioididong sẽ <b>gửi tin nhắn hoặc gọi điện </b>xác nhận đặt hàng tại siêu thị cho <?php echo $_SESSION['gender']; ?>
        	</div>
        	<div class="titlebill">Thông tin đặt hàng:</div>
        	<div class="infoorder">
				<div>Người nhận: <b><?php echo $_POST['FullName']; ?>,<?php echo $_POST['PhoneNumber']; ?></b></div>
				<div>Địa chỉ nhận hàng: <b><?php if($_POST['BillingAddress']==null){echo "Các siêu thị thuộc hệ thống trong khu vực: ";}; echo $_SESSION['address']; ?></b> </div>
				<div>Thời gian nhận hàng dự kiến: 
					<b> Trước <?php $currenttime = date('l, yy-m-d H:i:s');
						$date = new DateTime($currenttime);
						$date->add(new DateInterval('P1D'));
						echo $date->format('H')." giờ 00 phút "." Ngày mai ".$date->format('d/m'); ?>	
					</b>
				</div>
				<div>Tổng tiền: <strong><?php echo number_format($_SESSION['pay'],0,"","."); ?>₫</strong></div>
        	</div>
        	<div class="mess-payment" id="mess-payment">
			    <span>
			        Bạn đã chọn thanh toán : <b>Tiền mặt khi nhận hàng</b>
			    </span>
			</div>
        	<div class="choosepayment" id="choosepayment">
			    <div>
			        <h3>Chọn hình thức thanh toán:</h3>
			    </div>
			    <div class="clr"></div>
			    <div class="grid">
			        <a href="javascript:choosePayOffline()" class="payoffline">
			            <div>
			                <span>Tiền mặt khi nhận hàng</span>
			            </div>
			        </a>
			        <a href="javascript:void(0)" class="atm">
			            <div>
			                <span>
			                    Thanh toán thẻ
			                </span>
			                <img src="../img/icon/ATM2020.png" alt="Thanh toán qua thẻ ATM" width="30">
			            </div>
			            <p>(Có Internet Banking)</p>
			        </a>
			        <a href="javascript:void(0)" class="visa">
			            <div>
			                <span>Thanh toán thẻ </span>
			                <img src="../img/icon/Visa2020.png" alt="Thanh toán qua thẻ Visa, Master Card">
			                <img src="../img/icon/Master2020.png" alt="Thanh toán qua thẻ Visa, Master Card">
			                <img src="../img/icon/JCB2020.png" alt="Thanh toán qua thẻ Visa, Master Card">
			            </div>
			        </a>
			        <a href="javascript:void(0)" class="qr-code" >
			            <div>
			                <span>Thanh toán qua QR Code</span>
			                <img src="../img/icon/logo-vnp@2x.png" alt="Thanh toán qua Qr-Code Vnpay" height="36">
			            </div>
			        </a>
			    </div>
			</div>
			<div class="deleteOrder">
                <a href="javascript:cancel()">Hủy đơn hàng</a>
            </div>
            <div class="callship">Khi cần hỗ trợ vui lòng gọi
            	<a href="tel:18001060">1800.1060</a> (7h30 - 22h)
                <div class="link-csht">
                    <a href="javascript:void(0)">Tham khảo chính sách hoàn tiền khi thanh toán online</a>
                </div>
        	</div>
        	<div class="titlebill">Sản phẩm đã mua:</div>
        	<ul class="list_order">
        		<?php $src = "../";$i=0;
					if(isset($_SESSION['infoProduct'])){foreach($_SESSION['infoProduct'] as $cart) {
    			?>
    			<li>
    				<div class="colimg">
    					<a href="../dtdd/?id=<?php echo $cart['id'] ?>">
    						<img src="<?php echo $src.$cart['image'] ?>">
    					</a>
    				</div>
    				<div class="colinfo">
	    				<strong><?php echo number_format($cart['priceunit'],0,"","."); ?>₫</strong>
	    				<a href="../product/?id=<?php echo $cart['id'] ?>"><?php echo $cart['nameproduct']; ?></a>
	    				<div class="onecolor">
                            <span>Màu:</span> <?php echo $cart['color'] = $_POST['color'][$i]; ?>                         
                        </div>
                        <div class="quan">
                            <span>Số lượng:</span><?php echo $cart['quantity'] = $_POST['amount'][$i];$i++ ?>
                        </div>
                        <div class="clr"></div>
	    				<div class="promotion  webnote ">
							<span class="notnull"><?php echo $cart['promo1']; ?></span>
						    <span class="notnull"><?php echo $cart['promo2']; ?></span>
						    <span class="notnull"><?php echo $cart['promo3']; ?></span>
						    <span class="notnull"><?php echo $cart['promo4']; ?></span>
						</div>
    				</div>
    			</li>
    			<?php } } ?>
    		</ul>
        	<a href="add_database.php" class="buyother">Về trang chủ</a>
		</div>
	</section>
	<div class="popup" id="popup">
		<div>
			<h1>Hủy đơn hàng</h1>
			<p>Bạn có muốn hủy đơn hàng này ?</p>
			<p class="p1">Lưu ý: quà khuyến mãi có thể thay đổi theo thời điểm đặt hàng.</p>
			<a class="close" href="javascript:close()">Đóng</a>
			<a class="confirm" href="javascript:Success()">xác nhận hủy</a>
		</div>
	</div>
	<div class="popup" id="popup-success">
		<div>
			<h1>Hủy đơn hàng</h1>
			<p>Đơn hàng đã được hủy thành công!</p>
			<p>Sẽ tự động đóng trong : <b id="time">5</b> s</p>
			<a class="close" href="javascript:Redirect()">Đóng</a>
		</div>
	</div>
	<script type="text/javascript" charset="utf-8" async defer>
		var notnull = document.querySelectorAll('.promotion span')
		for (var i = 0; i < notnull.length; i++) {
			if(notnull[i].innerHTML.trim()==='') notnull[i].classList.remove('notnull')
		}
		function choosePayOffline(){
			document.getElementById('choosepayment').style.display = "none"
			document.getElementById('mess-payment').style.display = "block"
			document.querySelector('.deleteOrder').style.display = "none"
		}
		function cancel(){
			document.getElementById('popup').style.display = 'flex'
		}
		function close(){
			document.getElementById('popup').style.display = 'none'	
		}
		function Success(){
			close();
			document.getElementById('popup-success').style.display = 'flex'
			var realtime = document.getElementById('time').innerHTML;
			parseInt(realtime);
			var pause = setInterval(runtime,1000)
			function runtime(){
				realtime-=1;
				document.getElementById('time').innerHTML = realtime;
				if (realtime==0) { window.location = "cancel.php"; clearInterval(pause) }
			}
		}
		function Redirect(){
			window.location="cancel.php";
		}
	</script>
</body>
</html>
<?php 
$_SESSION['previous'] = basename(htmlspecialchars($_SERVER['PHP_SELF']));
if (isset($_SESSION['previous'])) {
	if (!$_SESSION['previous']) {
   		unset($_SESSION['infoProduct']); unset($_SESSION['totalmoney']);
   }
} 
?>