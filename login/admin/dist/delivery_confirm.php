<?php require_once '../../../libs/function.php';
	function UpdateStatus($CustomID){
		global $conn;
		connect_db();
		$sql = "UPDATE customer SET Status = 1 WHERE customer.CustomID = '$CustomID'";
		$query = mysqli_query($conn, $sql);
		return $query;
	}
	$CustomID = $_POST['CustomID'];
	UpdateStatus($CustomID);
	header('location:index.php');
?>