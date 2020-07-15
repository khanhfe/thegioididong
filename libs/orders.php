<?php 
	require 'function.php';
	function info_orders(){
		global $conn;
		connect_db();
		$sql = "SELECT * FROM customer JOIN orders ON customer.CustomID = orders.CustomID";
		$query = mysqli_query($conn, $sql);
		$result = array();
		if($query) {
			while($row = mysqli_fetch_assoc($query)){
				$result[] = $row;
			}
		}
		return $result;
	}
	disconnect_db();
?>