<?php
 	require'../../libs/function.php';
 	$product = show_all();
 	disconnect_db();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Quản lý sản phẩm</title>
	<link href="../../img/icon/favicon.ico" rel="shortcut icon" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>		
	<header id="header" class="">
		<div class="navtop">
			<div class="burger">
				<div class="line1"></div>
				<div class="line2"></div>
				<div class="line3"></div>
			</div>
			<nav>
				<ul>
					<li><a href="" title="">Dashboard</a></li>
					<li><a href="" title="">User</a></li>
					<li><a href="" title="">Setting</a></li>
				</ul>
				<div class="navright">
					<div class="notification">
						<div class="notificationdot">1</div>
						<!-- <img src="anh1/icon/icons8-notification-50.png" width="25"> -->
					</div>
					<div class="email">
						<div class="notificationdot">5</div>
						<!-- <img src="anh1/icon/77987835-email-or-mail-symbol-icon-vector-illustration-graphic-design.png" width="25"> -->
					</div>
					<div class="avatar">
						<!-- <img src="anh1/icon/Speaker-Unknown.jpg" width="35"> -->
					</div>
				</div>
			</nav>
		</div>
		<div class="navbottom">
			<nav>
				<ul>
					<li><a href="">Home</a></li>
					<li class="before"><a href="">Admin</a></li>
					<li class="before"><a href="">Dashboard</a></li>
				</ul>
			</nav>
		</div>	
	</header>
	<div class="main-body">
		<div class="container">
			<a href="add-product.php" class="add">Thêm mới sản phẩm</a>
			<table cellspacing="0">
				<tr>
					<th>ID</th>
					<th>Tên sản phẩm</th>
					<th>Hình ảnh</th>
					<th>Giá khuyến mãi(Nếu có)</th>
					<th>Giá gốc</th>
					<th>Thương hiệu</th>
					<th>Số lượng tồn kho</th>
					<th>Nhóm sản phẩm</th>
					<th>Công cụ</th>
				</tr>
				<tr>
					<?php
						foreach ($product as $item) {?>
					<td><?php echo $item['ProductId']; ?></td>
					<td class="name"><?php echo $item['ProductName']; ?></td>
					<td><img src="<?php echo '../../'.$item['ProductImage']; ?>" width="100px"></td>
					<td class="price"><?php echo number_format($item['PricePromo']); ?>đ</td>
					<td class="price old"><?php echo number_format($item['PriceCurrent']); ?>đ</td>
					<td class="content"><?php echo $item['Brand']; ?></td>
					<td><?php echo $item['Quantity']; ?></td>
					<td class="last_updated"><?php echo $item['GroupProduct']; ?></td>
					<td>
						<a href="edit-product.php?id=<?php echo $item['ProductId'];?>" class="edit">Sửa</a>
						<a href="delete-product.php?id=<?php echo $item['ProductId'];?>" onclick="return confirm('Xóa sản phẩm ?')" class="del">Xóa</a>
					</td>
				</tr>
					<?php } ?>	
			</table>
			<div class="vieworder">
				<h2>Xem đơn hàng</h2>
				
			</div>
			<div class="checkorder">
				<h2>Kiểm tra trạng thái đơn hàng</h2>
			</div>
		</div>
	</div>
</body>
</html>