<?php 
	require'../../libs/function.php';	
	$id = $_GET['id'] ;
	function delete_product($id){
		global $conn;
		connect_db();
		$sql= "DELETE FROM product WHERE ProductId = '$id'";
		$query = mysqli_query($conn, $sql);
		return $query;
	}
	delete_product($id);
	header("location: index.php");
	disconnect_db();
?>