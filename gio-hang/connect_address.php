<?php 
	require '../libs/function.php';
	function select_province(){
		global $conn;
		connect_db();
		$sql = 'SELECT * FROM province';
		$query = mysqli_query($conn, $sql);
		$result = array();
		if($query) {
			while($row = mysqli_fetch_assoc($query)){
				$result[] = $row;
			}
		}
		return $result;
	}
	function get_district(){
		global $conn;
		connect_db();
		$sql = 'SELECT * FROM district WHERE _province_id = 1';
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