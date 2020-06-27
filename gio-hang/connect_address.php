<?php 
	global $conn;
	function connect_db(){
		global $conn;
		if(!$conn){
			$conn = mysqli_connect('localhost:3306', 'root', '', 'danhmucxahuyentinhtp') or die("Khong the ket noi!");
		}
	}
	function disconnect_db(){
		global $conn;
		if($conn){
			mysqli_close($conn);
		}
	}
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