<?php 
	require'../../libs/function.php';	
	$id = $_GET['id'] ;
	connect_db();
	delete_product($id);
	header("location: index.php");
	disconnect_db();
?>