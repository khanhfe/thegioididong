<?php 
	global $conn;
	function connect_db(){
		global $conn;
		if(!$conn){
			$conn = mysqli_connect('localhost:3306', 'root', '', 'project_db') or die("Khong the ket noi!");
			mysqli_set_charset($conn, 'UTF8');
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
	function product_promo(){
		global $conn;
		connect_db();
		$sql = 'SELECT * FROM product JOIN promotion ON product.ProductId = promotion.ProductId WHERE product.PricePromo>0 LIMIT 10';
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
		$sql = 'SELECT * FROM product';
		$query = mysqli_query($conn, $sql);
		$result = array();
		if($query) {
			while($row = mysqli_fetch_assoc($query)){
				$result[] = $row;
			}
		}
		return $result;
	}
	function group_product($group,$limit){
		global $conn;
		connect_db();
		$sql = "SELECT * FROM product JOIN promotion ON product.ProductId = promotion.ProductId WHERE product.GroupProduct = '$group' LIMIT $limit";
		$query = mysqli_query($conn,$sql);
		$result = array();
		if($query) {
			while($row = mysqli_fetch_assoc($query)){
				$result[] = $row;
			}
		}
		return $result;
	}
	function add_customer($fullname,$gender,$phonenumber,$email,$address,$note,$pay,$date){
		global $conn;
		connect_db();
		$sql = "INSERT INTO customer(FullName,Gender,PhoneNumber,Email,Address,NoteCart,TotalPay,CreateTime) VALUES ('$fullname','$gender','$phonenumber','$email','$address','$note','$pay','$date')";
		$query = mysqli_query($conn, $sql);
		return $query;
	}
	function add_orders($product,$image,$priceunit,$pricepromote,$color,$quantity,$pay,$date,$time,$phonenumber){
		global $conn;
		connect_db();
		$sql = "INSERT INTO orders(Product,Image,PriceUnit,PricePromote,Color,Quantity,TotalPay,OrderDate,CustomID) VALUES ('$product','$image','$priceunit','$pricepromote','$color','$quantity','$pay','$date','$time',(SELECT customer.CustomID From customer WHERE customer.PhoneNumber = '$phonenumber'))";
		$query = mysqli_query($conn, $sql);
		return $query;
	}
	function add_orders_exist($product,$image,$priceunit,$pricepromote,$color,$quantity,$pay,$date,$time,$count){
		global $conn;
		connect_db();
		$sql = "INSERT INTO orders(Product,Image,PriceUnit,PricePromote,Color,Quantity,TotalPay,OrderDate,EstimatedDeliveryTime,CustomID) VALUES ('$product','$image','$priceunit','$pricepromote','$color','$quantity','$pay','$date','$time',(SELECT customer.CustomID From customer WHERE customer.CustomID = '$count'))";
		$query = mysqli_query($conn, $sql);
		return $query;
	}
	function add_product($product,$image,$pricepromo,$pricecurrent,$brand,$quantity,$group,$folder){
		global $conn;
		connect_db();
		$sql = "INSERT INTO product(ProductName,ProductImage,PriceCurrent,PricePromo,Brand,Quantity,GroupProduct,folder) VALUES ('$product','$image','$pricecurrent','$pricepromo','$brand','$quantity','$group','$folder')";
		$query = mysqli_query($conn, $sql);
		return $query;
	}

	function info_orders(){
		global $conn;
		connect_db();
		$sql = "SELECT * FROM customer";
		$query = mysqli_query($conn, $sql);
		$result = array();
		if($query) {
			while($row = mysqli_fetch_assoc($query)){
				$result[] = $row;
			}
		}
		return $result;
	}
	
?>