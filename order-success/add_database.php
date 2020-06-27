<?php session_start(); date_default_timezone_set("Asia/Ho_Chi_Minh");
	require '../libs/function.php';
	global $conn;
	connect_db();

	$currenttime = date('H:i:s, yy-m-d ');
	$date = new DateTime($currenttime);
	$date->add(new DateInterval('P1D'));
	$EstimatedDeliveryTime = $date->format('H:i:s , l, Y-m-d');
	$phonenumber = $_SESSION['phonenumber'];
	$sql = "SELECT COUNT(*) FROM customer WHERE PhoneNumber = '$phonenumber'";
	$query = mysqli_query($conn, $sql);
	$row = mysqli_fetch_row($query);
	$data = array();
	$data['fullname'] = $_SESSION['fullname'];
	$data['gender'] = $_SESSION['gender'] == 'anh' ? 'Nam' : 'Nữ';
	$data['phonenumber'] = $_SESSION['phonenumber'];
	$data['email'] = $_SESSION['email'];
	$data['address'] = $_SESSION['address'];
	$data['note'] = $_SESSION['note'];
	$data['pay'] = $_SESSION['pay'];
	$data['date'] = $currenttime;
	add_customer($data['fullname'],$data['gender'],$data['phonenumber'],$data['email'],$data['address'],$data['note'],$data['pay'],$data['date']);
	$i=0;
	$row[0]+=1;
	foreach ($_SESSION['infoProduct'] as $data) {
		$data['quantity'] = $_SESSION['quantity'][$i];$i++;
		if($row[0]>=1){
			add_orders_exist($data['nameproduct'],$data['image'],$data['priceunit'],$data['pricepromo'],$data['quantity'],$_SESSION['pay'],date('l, Y-m-d'),$EstimatedDeliveryTime,$row[0]);
		}
		else{
			add_orders($data['nameproduct'],$data['image'],$data['priceunit'],$data['pricepromo'],$data['quantity'],$_SESSION['pay'],date('l, Y-m-d'),$EstimatedDeliveryTime,$_SESSION['phonenumber']);
		}
	}
	
	disconnect_db();
	session_destroy();
	header('location:../');
?>