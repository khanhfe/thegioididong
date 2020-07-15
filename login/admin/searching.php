<?php 
	require '../../libs/function.php';
	$keyword = $_POST['key'];
	global $conn;
	connect_db();
	$sql = "SELECT * FROM product WHERE INSTR(ProductName,'$keyword')>0 OR INSTR(GroupProduct,'$keyword')>0";
	$query = mysqli_query($conn, $sql);
	$result = array();
	if($query) {
		while($row = mysqli_fetch_assoc($query)){
			$result[] = $row;
		}
	}
	echo "<tr>
		<th>ID</th>
		<th>Tên sản phẩm</th>
		<th>Hình ảnh</th>
		<th>Giá khuyến mãi(Nếu có)</th>
		<th>Giá gốc</th>
		<th>Thương hiệu</th>
		<th>Số lượng tồn kho</th>
		<th>Nhóm sản phẩm</th>
		<th>Công cụ</th>
	</tr>";
	foreach ($result as $value) {
		echo '<tr>
			<td>'.$value['ProductId'].'</td>
			<td class="name">'.$value["ProductName"].'</td>
			<td><img src=../../'.$value["ProductImage"].' width="100"></td>
			<td class="price">'.number_format($value['PricePromo'],0,"",".").'₫</td>
			<td>'.number_format($value['PriceCurrent'],0,"",".").'₫</td>
			<td class="brand">
				'.$value['Brand'].'
			</td>
			<td class="quantity">
				'.$value['Quantity'].'
			</td>
			<td class="group">
				'.$value['GroupProduct'].'
			</td>
			<td class="tool">
				<a href="edit-product.php?id='.$value["ProductId"].' class="edit">Sửa</a>
				<a href="delete-product.php?id='.$value["ProductId"].' onclick="return confirm("Xóa sản phẩm ?")" class="del">Xóa</a>
			</td>
		</tr>';
	}
	disconnect_db();
?>