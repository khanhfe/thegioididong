<?php
 	require'../../libs/all_function.php';
 	$product = show_all();
 	disconnect_db();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Quản lý sản phẩm</title>
	<link href="../../img/favicon.ico" rel="shortcut icon" type="image/x-icon">
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
						<img src="anh1/icon/icons8-notification-50.png" width="25">
					</div>
					<div class="email">
						<div class="notificationdot">5</div>
						<img src="anh1/icon/77987835-email-or-mail-symbol-icon-vector-illustration-graphic-design.png" width="25">
					</div>
					<div class="avatar">
						<img src="anh1/icon/Speaker-Unknown.jpg" width="35">
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
					<th>Name</th>
					<th>Image</th>
					<th>Price</th>
					<th>Old Price</th>
					<th>Content</th>
					<th>Create Time</th>
					<th>Last Updated</th>
					<th>Tool</th>
				</tr>
				<tr>
					<?php
						foreach ($product as $item) {?>
					<td><?php echo $item['id']; ?></td>
					<td class="name"><?php echo $item['name']; ?></td>
					<td><img src="<?php echo $item['image']; ?>" width="100px"></td>
					<td class="price"><?php echo number_format($item['price']); ?>đ</td>
					<td class="price old"><?php echo number_format($item['old-price']); ?>đ</td>
					<td class="content"><?php echo $item['content']; ?></td>
					<td><?php echo $item['created_time']; ?></td>
					<td class="last_updated"><?php echo $item['last_updated']; ?></td>
					<td>
						<a href="edit-product.php?id=<?php echo $item['id'];?>" class="edit">Sửa</a>
						<a href="delete-product.php?id=<?php echo $item['id'];?>" onclick="return confirm('Xóa sản phẩm ?')" class="del">Xóa</a>
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