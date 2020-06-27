<div class="pseudo" id="wardvalue" value="0">Chọn phường, xã</div>
<div class="layer grid2 ward" style="overflow:hidden;display: none">
<?php require 'connect_address.php';
	global $conn;
	connect_db();
	$sql = 'SELECT * FROM ward WHERE _district_id = '.$_POST['ID'];
	$query = mysqli_query($conn, $sql);
	$result = array();
	if($query) {
		while($row = mysqli_fetch_assoc($query)){
			$result[] = $row;
		}
	}
	foreach ($result as $value) {
		echo '<div class="list listward" value="'.$value["id"].'">'.$value['_prefix']." ".$value["_name"].'</div>';
	}
	$sql = 'SELECT * FROM street WHERE _district_id = '.$_POST['ID'];
	$query = mysqli_query($conn, $sql);
	$result = array();
	if($query) {
		while($row = mysqli_fetch_assoc($query)){
			$result[] = $row;
		}
	}
	foreach ($result as $value) {
		echo '<div class="list listward" value="'.$value["id"].'">'.$value['_prefix']." ".$value["_name"].'</div>';
	}
	echo "</div>";
	echo '<div class="error" id="nullward"></div>';
	disconnect_db();