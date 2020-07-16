<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Đăng nhập / Đăng ký tài khoản</title>
	<link href="../img/icon/favicon.ico" rel="shortcut icon" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="../js/jquery.min.js" type="text/javascript"></script>
</head>
<body>
	<div class="container">
		<div class="left">
			
		</div>
		<div class="right">
			<div class="form">
				<div class="tit">
					<h3>Đăng nhập</h3><br>
					<img src="../img/icon/account.jpg" height="45">
				</div>
				<div class="error"><?php if(isset($_SESSION['error'])) echo $_SESSION['error'];?></div>
				<form action="check.php" method="post" >
					<div class="user">
						<input class="input check" type="text" name="username" value="<?php if(isset($_SESSION['username'])) echo $_SESSION['username']; ?>" placeholder="Tài khoản">	
					</div>
					<div class="pass">
						<input class="input check" type="password" name="password" value="<?php if(isset($_SESSION['password'])) echo $_SESSION['password']; ?>" placeholder="Mật khẩu">
						<div class="togglepass">Ẩn/Hiện</div>	
					</div>
					<div class="remember_forgot">
						<label><input type="checkbox" name="remember" value="save"> Ghi nhớ đăng nhập</label>
						<a href="#" title="">Quên mật khẩu?</a>
					</div>
					<div class="btn-submit">
						<input class="input" type="submit" name="submit" value="Đăng nhập" disabled>
					</div>
				</form>
				<div class="note">Hiện tại hệ thống chưa có chức năng đăng nhập và tạo tài khoản dành cho người dùng!
					<a href="../" title="">Quay lại trang chủ</a></div>
			</div>
		</div>
	</div>
	<script type="text/javascript" charset="utf-8" async defer>
		$(document).ready(function() {
			$('.togglepass').click(function(event) {
				if($('input[name="password"]').attr('type') ==="password")
					$('input[name="password"]').attr('type','text')
				else $('input[name="password"]').attr('type','password')
			});
			$('.check').keyup(function(event) {
				username = $('input[name="username"]').val()
				password = $('input[name="password"]').val()
				if(username!=''&&password!=''&&username.length>4&&password.length>7){
					$('input[type="submit"]').removeAttr('disabled');
					$('input[type="submit"]').hover(function() {
						$('input[type="submit"]').css({
						'cursor': 'pointer',
						'color': '#000',
						'background' : 'rgba(254,215,0,1)',
						'border' : '1px solid #fed700'
						});
					}, function() {
						$('input[type="submit"]').css({
						'cursor': 'auto',
						'color': '#000',
						'background' : '#00a88a',
						'border' : '1px solid #00a88a'
						});
					});
				}
				else{
					$('input[type="submit"]').css('cursor', 'not-allowed');
					$('input[type="submit"]').attr('disabled','disable');
				}
			});
			if ($('input[name="password"]').val()!=' '){
				$('input[type="submit"]').removeAttr('disabled');
					$('input[type="submit"]').hover(function() {
						$('input[type="submit"]').css({
						'cursor': 'pointer',
						'color': '#000',
						'background' : 'rgba(254,215,0,1)',
						'border' : '1px solid #fed700'
						});
					}, function() {
						$('input[type="submit"]').css({
						'cursor': 'auto',
						'color': '#000',
						'background' : '#00a88a',
						'border' : '1px solid #00a88a'
					});
				});
			}
			if ($('.error').html()!=' ') {
				$('.check').keyup(function(event) {
					$('.error').html('')
				})
			}
		});
	</script>
</body>
</html>