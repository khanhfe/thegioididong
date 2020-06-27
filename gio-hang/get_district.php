<div class="pseudo" id="districtvalue" value="0">Chọn quận, huyện</div>
<div class="layer grid2 district" style="overflow:hidden;display: none">
<?php include 'connect_address.php';
	global $conn;
	connect_db();
	$sql = 'SELECT * FROM district WHERE _province_id = '.$_POST['ID'];
	$query = mysqli_query($conn, $sql);
	$result = array();
	if($query) {
		while($row = mysqli_fetch_assoc($query)){
			$result[] = $row;
		}
	}
	foreach ($result as $value) {
		echo '<div class="list listdist" value="'.$value["id"].'">'.$value['_prefix']." ".$value["_name"].'</div>';
	}
	echo '</div>';
	echo '<div class="error" id="nulldistrict"></div>';
	disconnect_db();