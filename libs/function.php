<?php 
	global $conn;
	function connect_db(){
		global $conn;
		if(!$conn){
			$conn = mysqli_connect('localhost:3306', 'root', '', 'project_db') or die("Khong the ket noi!");
		}
	}
	function disconnect_db(){
		global $conn;
		if($conn){
			mysqli_close($conn);
		}
	}
	function show_banner(){
		global $conn;
		connect_db();
		$sql = 'SELECT * FROM banner';
		$query = mysqli_query($conn, $sql);
		$result = array();
		if($query) {
			while($row = mysqli_fetch_assoc($query)){
				$result[] = $row;
			}
		}
		return $result;
	}
	function show_all(){
		global $conn;
		connect_db();
		$sql = 'SELECT * FROM smartphone JOIN promotion ON smartphone.ProductId = promotion.ProductId';
		$query = mysqli_query($conn, $sql);
		$result = array();
		if($query) {
			while($row = mysqli_fetch_assoc($query)){
				$result[] = $row;
			}
		}
		return $result;
	}
	function add_customer($fullname,$gender,$phonenumber,$email,$address,$note,$pay){
		global $conn;
		connect_db();
		$sql = "INSERT INTO customer(FullName,Gender,PhoneNumber,Email,Address,NoteCart,TotalPay) VALUES ('$fullname','$gender','$phonenumber','$email','$address','$note','$pay')";
		$query = mysqli_query($conn, $sql);
		return $query;
	}
	function add_orders($product,$image,$priceunit,$pricepromote,$quantity,$pay,$phonenumber){
		global $conn;
		connect_db();
		$sql = "INSERT INTO orders(Product,Image,PriceUnit,PricePromote,Quantity,TotalPay,CustomID) VALUES ('$product','$image','$priceunit','$pricepromote','$quantity','$pay',(SELECT customer.CustomID From customer WHERE customer.PhoneNumber = '$phonenumber'))";
		$query = mysqli_query($conn, $sql);
		return $query;
	}
	function add_orders_exist($product,$image,$priceunit,$pricepromote,$quantity,$pay,$count){
		global $conn;
		connect_db();
		$sql = "INSERT INTO orders(Product,Image,PriceUnit,PricePromote,Quantity,TotalPay,CustomID) VALUES ('$product','$image','$priceunit','$pricepromote','$quantity','$pay',(SELECT customer.CustomID From customer WHERE customer.CustomID = '$count'))";
		$query = mysqli_query($conn, $sql);
		return $query;
	}
 ?>