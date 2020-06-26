<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Đăng nhập trang quản trị</title>
	<link href="../img/favicon.ico" rel="shortcut icon" type="image/x-icon">
	<style type="text/css" media="screen">
		*{
			padding: 0;
			margin: 0;
			box-sizing: border-box; 
		}
		body{
			font: 14px/18px Helvetica,Arial,'DejaVu Sans','Liberation Sans',Freesans,sans-serif;
		    color: #333;
		    background: #f0f0f0;
		    outline: none;
		    position: relative;
		}
		.formlogin{
			width:fit-content;
			background: #fff;
			text-align: center;
			position: absolute;
			left: 25%;
			transform: translate(50%,50%);
			border-radius: 15px;
			box-shadow: 0 1px 7px 1px rgba(60, 75, 100, .6)
		}
		.content{
			padding: 15px;
			margin: 0 auto;
		}
		.content h3{
			font-size: 23px;
			padding: 15px;
			margin:15px;
		}
		input{
			outline: none;
			border: 1px solid #ccc;
			border-radius: 7px;
			padding: 12px;
			margin: 20px auto;
			display: block;
		}
		input[value=""]{
			text-indent: 3px;
			width: 70%;
		}
		input[value=""]:focus{
			border:1px solid #feb000;
		}
		input[type="submit"]{
			background: 0;
		}
		input[type="submit"]:hover{
			background: #feb000;
			border:1px solid #feb000;
			transition: all 0.5s;
		}
		.content a{
			text-decoration: none;
			color: #007bff;
		}
		.content a:hover{
			color:#feb000;
			text-decoration: underline;
		}
		.error{
			position: absolute;
			top: 28%;
			left: 20%;
			background: #fff;
			padding:0 3px;
			color: #d93025; 
		}
		#errorpass{
			top:48%;
		}
	</style>
</head>
<body>
	<?php 
 		require'../libs/all_function.php';
		connect_db();

		if (isset($_POST['btn-submit'])) 
		{
			$username = $_POST['username'];
			$password = $_POST['password'];
			if(!isset($_SESSION['infouser'])){
				$_SESSION['infouser'] = array( 'username' => $username,'password' => $password);
			}

			$error = '';
			
			if ($username != "" || $password !="") {
				$sql = "SELECT username,password FROM user WHERE username = '$username' AND password = '$password' ";
				$query = mysqli_query($conn,$sql);
				$num_rows = mysqli_num_rows($query);
				if ($num_rows!=0) {
					$password = md5($password);
					$_SESSION['username'] = $username;
                	header('Location: trangchu/');
				}else{
					$error = "Tên đăng nhập hoặc mật khẩu không chính xác!";
				}
			}
		}
		mysqli_close($conn);
	?>
	<div class="container">
		<div class="formlogin">
			<form action="" method="POST" onsubmit="return checkFormLogin()" accept-charset="utf-8">
				<div class="content">
					<h3>Đăng nhập vào hệ thống website:</h3>
					<div style="color:#d93025"><?php if (isset($_POST['btn-submit'])) echo $error; ?></div>
					<input type="text" name="username" id="username" placeholder="Tên đăng nhập" value="<?php if(isset($_SESSION['infouser'])) echo $_SESSION['infouser']['username'] ?>">
					<div class="error" id="erroruser"></div>
					<input type="password" name="password" id="password" placeholder="Mật khẩu" value="<?php if(isset($_SESSION['infouser'])) echo $_SESSION['infouser']['password'] ?>">
					<div class="error" id="errorpass"></div>
					<input type="submit" name="btn-submit" value="Đăng nhập">
					<a href="#" title="">Quên mật khẩu</a>
				</div>
			</form>
		</div>
	</div>
	<script type="text/javascript" charset="utf-8" async defer>
		function checkFormLogin(){

			var username = document.getElementById('username').value;
			var password = document.getElementById('password').value;

			if (username=='' && password=='') {
				document.getElementById('username').style.border = '1px solid #d93025';
				document.getElementById('password').style.border = '1px solid #d93025';
				document.getElementById('erroruser').innerHTML = "Hãy nhập tên đăng nhập của bạn";
				document.getElementById('errorpass').innerHTML = "Hãy nhập mật khẩu của bạn";
				return false;
			}else if(username==''){
				document.getElementById('username').style.border = '1px solid #d93025';
				document.getElementById('erroruser').innerHTML = "Hãy nhập tên đăng nhập của bạn";
				return false;
			}else if(password==''){
				document.getElementById('password').style.border = '1px solid #d93025';
				document.getElementById('errorpass').innerHTML = "Hãy nhập mật khẩu của bạn";
				return false;
			}
			else return true;
		}
	</script>
</body>
</html>