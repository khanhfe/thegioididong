<?php session_start(); date_default_timezone_set("Asia/Ho_Chi_Minh");
	require '../libs/function.php';
	function GetQuantity($productname){
		global $conn;
		connect_db();
		$sql = "SELECT Quantity FROM product WHERE product.ProductName = '$productname'";
		$query = mysqli_query($conn, $sql);
		$row = mysqli_fetch_row($query);
		return $row;
	}
	function UpdateQuantity($quantity,$productname){
		global $conn;
		connect_db();
		$sql = "UPDATE product SET Quantity = '$quantity' WHERE product.ProductName = '$productname'";
		$query = mysqli_query($conn, $sql);
		return $query;
	}
	$currenttime = date('H:i:s, yy-m-d ');
	$date = new DateTime($currenttime);
	$date->add(new DateInterval('P1D'));
	$EstimatedDeliveryTime = $date->format('H:i:s , l, Y-m-d');
	$data = array();
	$data['fullname'] = $_SESSION['fullname'];
	$data['gender'] = $_SESSION['gender'] == 'anh' ? 'Nam' : 'Nữ';
	$data['phonenumber'] = $_SESSION['phonenumber'];
	$data['email'] = $_SESSION['email'];
	$data['address'] = $_SESSION['address'];
	$data['note'] = implode(" ", $_SESSION['note']);
	$data['pay'] = $_SESSION['pay'];
	$data['date'] = $currenttime;
	add_customer($data['fullname'],$data['gender'],$data['phonenumber'],$data['email'],$data['address'],$data['note'],$data['pay'],$data['date']);
	$i=0;
	foreach ($_SESSION['infoProduct'] as $data) {
		$data['quantity'] = $_SESSION['quantity'][$i];
		$data['color'] = $_SESSION['color'][$i];$i++;
		
		add_orders($data['nameproduct'],$data['image'],$data['priceunit'],$data['pricepromo'],$data['color'],$data['quantity'],$_SESSION['pay'],date('l, Y-m-d'),$EstimatedDeliveryTime,$_SESSION['phonenumber'],$currenttime	);
		$quantity = GetQuantity($data['nameproduct']);
		foreach ($quantity as $quan) {
			$quan = $quan - $data['quantity'];
			UpdateQuantity($quan,$data['nameproduct']);
		}
	}
	disconnect_db();
	session_destroy();
	if (isset($_GET['links'])) {
		header('location:../'.$_GET['links']);
	}else header('location:../');
?>