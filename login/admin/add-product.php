<?php
 	require'../../libs/function.php';
 	connect_db();
	global $conn;
	$data = array();
	if (isset($_POST['add'])) {
		$data['productname'] = $_POST['productname'];
		$data['image'] = 'img/product/smartphones/'.$_POST['image'];
		$data['pricepromo'] = $_POST['pricepromo'];
		$data['pricecurrent'] = $_POST['pricecurrent'];
		$data['brand'] = $_POST['brand'];
		$data['quantity'] = $_POST['quantity'];
		$data['group'] = $_POST['group'];
		add_product($data['productname'],$data['image'],$data['pricepromo'],$data['pricecurrent'],$data['brand'],$data['quantity'],$data['group']);
	}
 	disconnect_db();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Thêm mới sản phẩm</title>
	<style type="text/css">
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
			border: 1px solid #f0f0f0;
		}
		th{
			width: 300px;
			color: #768192;
		    background-color: #d8dbe0;
		}
		td{
		    text-align: center;
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
	
	<header id="header" class="">
		<nav>
			<ul>
				<li><a href="" title=""></a></li>
			</ul>
			<ul>
				<li><a href="" title=""></a></li>
			</ul>
			<ul>
				<li><a href="" title=""></a></li>
			</ul>
			<ul>
				<li><a href="" title=""></a></li>
			</ul>
			<ul>
				<li><a href="" title=""></a></li>
			</ul>
		</nav>		
	</header>
	<div class="main-body">
		<div class="back"><a href="index.php">Quay lại</a></div>
		<div class="container">
			<form action="#" method="post">
				<table>
					<caption>Bảng thông tin chung của sản phẩm</caption>
					<tr>
						<th>Tên sản phẩm</th>
						<td>
							<input type="text" name="productname" value="" required>
						</td>				
					</tr>
					<tr>
						<th>Hình ảnh</th>
						<td>
							<input type="file" name="image" value="" required>
						</td>				
					</tr>
					<tr>
						<th>Giá khuyến mãi(Nếu có)</th>
						<td>
							<input type="number" name="pricepromo" value="" required>
						</td>				
					</tr>
					<tr>
						<th>Giá gốc</th>
						<td>
							<input type="number" name="pricecurrent" value="" required>
						</td>				
					</tr>
					<tr>
						<th>Thương hiệu</th>
						<td>
							<input type="text" name="brand" value="" required>
						</td>				
					</tr>
					<tr>
						<th>Số lượng</th>
						<td>
							<input type="number" name="quantity" value="" required>
						</td>				
					</tr>
					<tr>
						<th>Nhóm sản phẩm</th>
						<td>
							<input type="text" name="group" value="" required>
						</td>				
					</tr>
				</table>
				<table>
					<caption>Bảng thông tin khuyến mãi của sản phẩm</caption>
					<tbody>
						<tr>
							<th>Khuyến mãi 1</th>
							<td>
								<input class="able" type="text" name="Promo1" value="">
							</td>				
						</tr>
						<tr>
							<th>Khuyến mãi 2</th>
							<td>
								<input class="able" type="text" name="Promo2" value="">
							</td>				
						</tr>
						<tr>
							<th>Khuyến mãi 3</th>
							<td>
								<input class="able" type="text" name="Promo3" value="">
							</td>				
						</tr>
						<tr>
							<th>Khuyến mãi 4</th>
							<td>
								<input class="able" type="text" name="Promo4" value="" >
							</td>				
						</tr>
						<tr>
							<th>Khuyến mãi 5</th>
							<td>
								<input class="able" type="text" name="Promo5" value="">
							</td>				
						</tr>
					</tbody>
				</table>
				<table>
					<caption>Bảng thông số kỹ thuật của sản phẩm</caption>
					<tbody>
						<tr>
							<th>Màn hình</th>
							<td>
								<input class="able" type="text" name="Display" value="">
							</td>				
						</tr>
						<tr>
							<th>Hệ điều hành</th>
							<td>
								<input class="able" type="text" name="OS" value="">
							</td>				
						</tr>
						<tr>
							<th>Camera sau</th>
							<td>
								<input class="able" type="text" name="RearCamera" value="">
							</td>				
						</tr>
						<tr>
							<th>Camera trước</th>
							<td>
								<input class="able" type="text" name="FrontCamera" value="">
							</td>				
						</tr>
						<tr>
							<th>CPU</th>
							<td>
								<input class="able" type="text" name="CPU" value="">
							</td>				
						</tr>
						<tr>
							<th>RAM</th>
							<td>
								<input class="able" type="text" name="RAM" value="">
							</td>				
						</tr>
						<tr>
							<th>ROM</th>
							<td>
								<input class="able" type="text" name="ROM" value="">
							</td>				
						</tr>
						<tr>
							<th>Dung lượng pin</th>
							<td>
								<input class="able" type="text" name="battery" value="">
							</td>				
						</tr>
					</tbody>
				</table>
				<div class="btn-add"><input type="submit" name="submit" value="Thêm"></div>
			</form>
		</div>
	</div>
</body>
</html>