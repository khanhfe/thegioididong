<?php
require '../../libs/function.php';
function addcolor($color,$image_product,$ProductName){
	global $conn;
	connect_db();
	$sql = "INSERT INTO color_product(Color,image_product,ProductId) VALUES ('$color','$image_product',(SELECT product.ProductId FROM product WHERE product.ProductName = '$ProductName'))";
	$query = mysqli_query($conn, $sql);
	return $query;
};
$data = array();
if(isset($_POST['submit'])){
	$data['Color'] = $_POST['Color'];
	$data['image_product'] = 'img/product/color/'.$_POST['image_product'];
	$data['ProductName'] = $_POST['ProductName'];
	addcolor($data['Color'], $data['image_product'], $data['ProductName'] );
	disconnect_db();
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Thêm màu sắc sản phẩm</title>
	<script type="text/javascript" src="../../js/jquery.min.js"></script>
	<style type="text/css" media="screen">
		*{
			padding: 0;
			margin: 0;
			box-sizing: border-box; 
		}
		body{
			font: 14px/18px Helvetica,Arial,'DejaVu Sans','Liberation Sans',Freesans,sans-serif;
		    color: #333;
		    background: #f0f0f0;
		    outline: none;
		}	
		.main-body{
			padding: 0 15px;
			background: #fff;
			text-align: center;
		}
		.container{
			padding: 15px;
			width: 1024px;
			margin: auto;
		}
		table{
			width: 100%;
			border: 1px solid #fff;
		}
		th{
			width:300px;
			color: #768192;
		    background-color: #d8dbe0;
		}
		td{
		    text-align: left;
		}
		table input{
			margin: auto;
			padding: 0.7em;
			width: 100%;
		}
		input:focus{
			outline: none
		}
		input[type="submit"]{
			display: block;
			padding: 15px;
			transition: all 0.5s;
			cursor: pointer;
			background-color: #00a88a;
			border: #00a88a 1px solid;
			outline: none;
		}
		input[type="submit"]:hover{
			background-color: #fed700;
			border: #fed700 1px solid;
		}
	</style>
</head>
<body>
	<div class="container">
		<a href="add-product.php" title="">Quay lại</a>
		<div class="content">
			<form action="#" method="post">
				<table>
					<caption>Thêm màu sắc</caption>
					<tr>
						<th>Tên sản phẩm</th>
						<td>
							<input type="text" name="ProductName" value="<?php echo !empty($data['ProductName']) ? $data['ProductName'] : '' ?>">
						</td>				
					</tr>
					<tr>
						<th>Màu sắc</th>
						<td>
							<input type="text" name="Color" value="" required>
						</td>				
					</tr>
					<tr>
						<th>Hình ảnh</th>
						<td>
							<input type="file" name="image_product" value="" required>
						</td>				
					</tr>
				</table>
				<div class="btn-edit"><input type="submit" name="submit" value="Thêm"></div>
			</form>
		</div>
	</div>
</body>
</html>