<?php session_start();
	require '../libs/function.php';
	global $conn;
	connect_db();
	$phonenumber = $_SESSION['phonenumber'];
	$sql = "SELECT COUNT(*) FROM customer WHERE PhoneNumber = '$phonenumber'";
	$query = mysqli_query($conn, $sql);
	$row = mysqli_fetch_row($query);
	$data = array();
	$data['fullname'] = $_SESSION['fullname'];
	$data['gender'] = $_SESSION['gender'] == 'anh' ? 'nam' : 'nữ';
	$data['phonenumber'] = $_SESSION['phonenumber'];
	$data['email'] = $_SESSION['email'];
	$data['address'] = $_SESSION['address'];
	$data['note'] = $_SESSION['note'];
	$data['pay'] = $_SESSION['pay'];
	add_customer($data['fullname'],$data['gender'],$data['phonenumber'],$data['email'],$data['address'],$data['note'],$data['pay']);
	$i=0;
	foreach ($_SESSION['infoProduct'] as $data) {
		$data['quantity'] = $_SESSION['quantity'][$i];$i++;
		if($row[0]>=1){$row[0]+=1;
			add_orders_exist($data['nameproduct'],$data['image'],$data['priceunit'],$data['pricepromo'],$data['quantity'],$_SESSION['pay'],$row[0]);
		}
		else{
			add_orders($data['nameproduct'],$data['image'],$data['priceunit'],$data['pricepromo'],$data['quantity'],$_SESSION['pay'],$_SESSION['phonenumber']);
		}
	}
	disconnect_db();
	session_destroy();
	// header('location:../');
?>