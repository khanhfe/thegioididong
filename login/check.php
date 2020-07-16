<?php session_start();
	require'../libs/function.php';
	connect_db();
	if (isset($_POST['submit'])) 
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		$password = strtolower($password);
		$username = strip_tags($username);
		$username = addslashes($username);
		$password = strip_tags($password);
		$password = addslashes($password);
		$pass     = $password;
		$password = md5($password);
		$error = "Tên đăng nhập hoặc mật khẩu không chính xác!";
		if ($username != "" || $password !="") {
			$sql = "SELECT username,password FROM account WHERE username = '$username' AND password = '$password'";
			$query = mysqli_query($conn,$sql);
			$num_rows = mysqli_num_rows($query);
			$_SESSION['username'] = $username;
			if ($num_rows!=0) {
				if (isset($_POST['remember'])) {
					$_SESSION['password'] = $pass;
					header('Location: admin/');
				}
				unset($_SESSION['error']);
	            header('Location: admin/');
			}else{
				$_SESSION['error'] =$error;
				echo $_SESSION['error'];
				header('Location:index.php');
			}
		}
	}
	mysqli_close($conn);
?>