<?php
 	require'../../libs/all_function.php';
 	connect_db();
	global $conn;
	$data = array();
	$src = "anh1/";
	if (isset($_POST['add'])) {
		$data['name'] = $_POST['name'];
		$data['image'] = $src.$_POST['image'];
		$data['price'] = $_POST['price'];
		$data['content'] = $_POST['content'];
		$data['created_time'] = $_POST['created_time'];
		$data['last_updated'] = $_POST['last_updated'];
		add_product($data['name'],$data['image'],$data['price'],$data['content'],$data['created_time'],$data['last_updated']);
		header('location:index.php');
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
			border: 1px solid #fff;
		}
		th{
			padding:12px;
			color: #768192;
		    background-color: #d8dbe0;
		    border:1px solid #d8dbe0;
		}
		td{
			padding: .75rem;
		    border-top: 1px solid #fff;
		    text-align: center;
		}
		table input{
			margin: auto;
			padding: 0.7em;
			width: 75%;
		}
		td .btn-add{
			width: fit-content;
			padding: 1em;
			background: #ccc;
			border: 1px solid #ccc;
			outline: none;
			color: #333;
			margin: auto;
			cursor: pointer;
		}
		td .btn-add:hover{
			color: #fff;
			background: #28a745;
			border: 1px solid #28a745;
			transition: all 0.5s;
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
		<div class="container">
			<form action="#" method="post">
				<table cellspacing="0">
					<tr>
						<th>Product</th>
						<td>
							<input type="text" name="name" value="" required>
						</td>				
					</tr>
					<tr>
						<th>Image</th>
						<td>
							<input type="file" name="image" value="" required>
						</td>				
					</tr>
					<tr>
						<th>Price</th>
						<td>
							<input type="text" name="price" value="" required>
						</td>				
					</tr>
					<tr>
						<th>Content</th>
						<td>
							<input type="text" name="content" value="" required>
						</td>				
					</tr>
					<tr>
						<th>Create Time</th>
						<td>
							<input type="text" name="created_time" value="" required>
						</td>				
					</tr>
					<tr>
						<th>Last Updated</th>
						<td>
							<input type="text" name="last_updated" value="" required>
						</td>				
					</tr>
					<tr>
						<td colspan="2" align="center">
							<input type="submit" name="add" value="Thêm" class="btn-add">
						</td>
					</tr>
				</table>
			</form>
		</div>
	</div>
</body>
</html>