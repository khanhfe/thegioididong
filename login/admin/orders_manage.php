<?php require '../../libs/orders.php'; $orders = info_orders(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Quản lý đơn hàng</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="container">
		<a href="index.php">Home</a>
		<?php 
		    foreach ($orders as $value)
		    {
		       	echo $value['Product'];
		    }
		
		?>
	</div>	
</body>
</html>