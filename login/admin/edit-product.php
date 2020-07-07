<?php
	require'../../libs/function.php';
	$id = $_GET['id'];
	global $conn;
	connect_db();
	$sql = "SELECT * FROM product JOIN promotion ON product.ProductId = promotion.ProductId JOIN detail ON product.ProductId = detail.ProductId WHERE product.ProductId = '$id'";
	$query = mysqli_query($conn, $sql);	
	$data = mysqli_fetch_assoc($query);
	function edit_product($product,$image,$pricepromo,$pricecurrent,$brand,$quantity,$group,$id)
	{
		global $conn;
		connect_db();
		$sql = "UPDATE product SET ProductName = '$product', ProductImage = '$image', PricePromo = '$pricepromo',PriceCurrent = '$pricecurrent',Brand = '$brand',Quantity = '$quantity',GroupProduct ='$group' WHERE ProductId = '$id'";
		$query = mysqli_query($conn, $sql);
		return $query;
	}
	function editpromo($Promo1,$Promo2,$Promo3,$Promo4,$Promo5,$id)
	{
		global $conn;
		connect_db();
		$sql = "UPDATE promotion SET Promo1 = '$Promo1', Promo2 = '$Promo2', Promo3 = '$Promo3',Promo4 = '$Promo4',Promo5 = '$Promo5' WHERE ProductId = '$id'";
		$query = mysqli_query($conn, $sql);
		return $query;
	}
	function editdetail($Display,$OS,$RearCamera,$FrontCamera,$CPU,$RAM,$ROM,$network,$battery,$id)
	{
		global $conn;
		connect_db();
		$sql = "UPDATE detail SET Display = '$Display', OS = '$OS', RearCamera = '$RearCamera',FrontCamera = '$FrontCamera',CPU = '$CPU',RAM = '$RAM',ROM ='$ROM',Network = '$network',battery = '$battery' WHERE ProductId = '$id'";
		$query = mysqli_query($conn, $sql);
		return $query;
	}

	if(isset($_POST['submit'])){
		$data['ProductId'] = $id;
		$data['ProductName'] = $_POST['ProductName'];
		$data['ProductImage'] = 'img/product/'.$_POST['ProductImage'];
		$data['PricePromo'] = $_POST['PricePromo'];
		$data['PriceCurrent'] = $_POST['PriceCurrent'];
		$data['Brand'] = $_POST['Brand'];
		$data['Quantity'] = $_POST['Quantity'];
		$data['GroupProduct'] = $_POST['GroupProduct'];

		$data['Promo1'] = $_POST['Promo1'];
		$data['Promo2'] = $_POST['Promo2'];
		$data['Promo3'] = $_POST['Promo3'];
		$data['Promo4'] = $_POST['Promo4'];
		$data['Promo5'] = $_POST['Promo5'];

		$data['Display'] = $_POST['Display'];
		$data['OS'] = $_POST['OS'];
		$data['RearCamera'] = $_POST['RearCamera'];
		$data['FrontCamera'] = $_POST['FrontCamera'];
		$data['CPU'] = $_POST['CPU'];
		$data['RAM'] = $_POST['RAM'];
		$data['ROM'] = $_POST['ROM'];
		$data['network'] = $_POST['network'];
		$data['battery'] = $_POST['battery'];

		edit_product($data['ProductName'], $data['ProductImage'], $data['PricePromo'],$data['PriceCurrent'],$data['Brand'],$data['Quantity'],$data['GroupProduct'],$data['ProductId']);
		editpromo($data['Promo1'],$data['Promo2'],$data['Promo3'],$data['Promo4'],$data['Promo5'],$data['ProductId']);
		editdetail($data['Display'],$data['OS'],$data['RearCamera'],$data['FrontCamera'],$data['CPU'],$data['RAM'],	$data['ROM'],$data['network'], $data['battery'], $data['ProductId']);

		// header('location:edit-product.php');	
	}
	disconnect_db();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sửa sản phẩm</title>
	<script type="text/javascript" src="../../js/jquery.min.js"></script>
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
					<caption>Bảng thông tin chung về sản phẩm</caption>
					<tr>
						<th>Tên sản phẩm</th>
						<td>
							<input class="able" type="text" name="ProductName" value="<?php echo !empty($data['ProductName']) ? $data['ProductName'] : ''; ?>"  disabled='disabled'>
						</td>				
					</tr>
					<tr>
						<th>Hình ảnh</th>
						<td>
							<input type="file" name="ProductImage" value="<?php echo !empty($data['ProductImage']) ? $data['ProductImage'] : ''; ?>" required>
						</td>				
					</tr>
					<tr>
						<th>Giá khuyến mãi(Nếu có)</th>
						<td>
							<input class="able" type="number" name="PricePromo" value="<?php echo !empty($data['PricePromo']) ? $data['PricePromo'] : '0'; ?>" required disabled='disabled'>
						</td>				
					</tr>
					<tr>
						<th>Giá gốc</th>
						<td>
							<input class="able" type="number" name="PriceCurrent" value="<?php echo !empty($data['PriceCurrent']) ? $data['PriceCurrent'] : ''; ?>" required disabled='disabled'>
						</td>				
					</tr>
					<tr>
						<th>Thương hiệu</th>
						<td>
							<input class="able" type="text" name="Brand" value="<?php echo !empty($data['Brand']) ? $data['Brand'] : ''; ?>" required disabled='disabled'>
						</td>				
					</tr>
					<tr>
						<th>Số lượng tồn kho</th>
						<td>
							<input class="able" type="number" name="Quantity" value="<?php echo !empty($data['Quantity']) ? $data['Quantity'] : ''; ?>" required disabled='disabled'>
						</td>				
					</tr>
					<tr>
						<th>Nhóm sản phẩm</th>
						<td>
							<input class="able" type="text" name="GroupProduct" value="<?php echo !empty($data['GroupProduct']) ? $data['GroupProduct'] : ''; ?>" required disabled='disabled'>
						</td>				
					</tr>
				</table>
				<table>
					<caption>Bảng thông tin khuyến mãi của sản phẩm</caption>
					<tbody>
						<tr>
							<th>Khuyến mãi 1</th>
							<td>
								<input class="able" type="text" name="Promo1" value="<?php echo !empty($data['Promo1']) ? $data['Promo1'] : ' '  ; ?>"  disabled='disabled'>
							</td>				
						</tr>
						<tr>
							<th>Khuyến mãi 2</th>
							<td>
								<input class="able" type="text" name="Promo2" value="<?php echo !empty($data['Promo2']) ? $data['Promo2'] : ' '  ; ?>" disabled='disabled'>
							</td>				
						</tr>
						<tr>
							<th>Khuyến mãi 3</th>
							<td>
								<input class="able" type="text" name="Promo3" value="<?php echo !empty($data['Promo3']) ? $data['Promo3'] : ' '  ; ?>" disabled='disabled'>
							</td>				
						</tr>
						<tr>
							<th>Khuyến mãi 4</th>
							<td>
								<input class="able" type="text" name="Promo4" value="<?php echo !empty($data['Promo4']) ? $data['Promo4'] : ' '  ; ?>" disabled='disabled'>
							</td>				
						</tr>
						<tr>
							<th>Khuyến mãi 5</th>
							<td>
								<input class="able" type="text" name="Promo5" value="<?php echo !empty($data['Promo5']) ? $data['Promo5'] : ' '  ; ?>" disabled='disabled'>
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
								<input class="able" type="text" name="Display" value="<?php echo !empty($data['Display']) ? $data['Display'] : ''; ?>" disabled='disabled'>
							</td>				
						</tr>
						<tr>
							<th>Hệ điều hành</th>
							<td>
								<input class="able" type="text" name="OS" value="<?php echo !empty($data['OS']) ? $data['OS'] : '' ; ?>" disabled='disabled'>
							</td>				
						</tr>
						<tr>
							<th>Camera sau</th>
							<td>
								<input class="able" type="text" name="RearCamera" value="<?php echo !empty($data['RearCamera']) ? $data['RearCamera'] : ''; ?>" disabled='disabled'>
							</td>				
						</tr>
						<tr>
							<th>Camera trước</th>
							<td>
								<input class="able" type="text" name="FrontCamera" value="<?php echo !empty($data['FrontCamera']) ? $data['FrontCamera'] : ''; ?>" disabled='disabled'>
							</td>				
						</tr>
						<tr>
							<th>CPU</th>
							<td>
								<input class="able" type="text" name="CPU" value="<?php echo !empty($data['CPU']) ? $data['CPU'] : ''; ?>" disabled='disabled'>
							</td>				
						</tr>
						<tr>
							<th>RAM</th>
							<td>
								<input class="able" type="text" name="RAM" value="<?php echo !empty($data['RAM']) ? $data['RAM'] : ''; ?>" disabled='disabled'>
							</td>				
						</tr>
						<tr>
							<th>ROM</th>
							<td>
								<input class="able" type="text" name="ROM" value="<?php echo !empty($data['ROM']) ? $data['ROM'] : ''; ?>" disabled='disabled'>
							</td>				
						</tr>
						<tr>
							<th>Kết nối mạng</th>
							<td>
								<input class="able" type="text" name="network" value="<?php echo !empty($data['network']) ? $data['network'] : ''; ?>" disabled='disabled'>
							</td>				
						</tr>
						<tr>
							<th>Dung lượng pin</th>
							<td>
								<input class="able" type="text" name="battery" value="<?php echo !empty($data['battery']) ? $data['battery'] : ''; ?>" disabled='disabled'>
							</td>				
						</tr>
					</tbody>
				</table>
				<div class="btn-edit"><input type="submit" name="submit" value="Sửa"></div>
			</form>
		</div>
	</div>
	<script type="text/javascript" charset="utf-8" async defer>
		$(document).ready(function() {
			$('input[type="submit"]').removeAttr('disabled')
			$('td').click(function(event) {
				$('input',this).removeAttr('disabled')
			});
			$('form').submit(function(event) {
				$('input').removeAttr('disabled')
			});
		});
	</script>
</body>
</html>