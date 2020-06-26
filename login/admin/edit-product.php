<?php
	require'../../libs/all_function.php';
	$id = $_GET['id'];
	connect_db();
	global $conn;
	$sql = "SELECT * FROM product WHERE id = '$id'";
	$query = mysqli_query($conn, $sql);	
	$data = mysqli_fetch_assoc($query);
	$src = "anh1/";
	if(isset($_POST['edit'])){
		$data['id'] = $id;
		$data['name'] = $_POST['name'];
		$data['image'] = isset($_POST['image']) ? $src.$_POST['image'] : ' ';
		$data['price'] = ($_POST['price']) ? $_POST['price'] : ' ';
		$data['content'] = ($_POST['content']) ? $_POST['content'] : ' ';
		$data['created_time'] = ($_POST['created_time']) ? $_POST['created_time'] : ' ';
		$data['last_updated'] = ($_POST['last_updated']) ? $_POST['last_updated'] : ' ';
		edit_product($data['id'], $data['name'], $data['image'], $data['price'],$data['content'],$data['created_time'],$data['last_updated']);
		header('location:index.php');		
	}

	disconnect_db();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sửa sản phẩm</title>
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
		td .btn-edit{
			width: fit-content;
			padding: 1em;
			background: #ccc;
			border: 1px solid #ccc;
			outline: none;
			color: #333;
			margin: auto;
			cursor: pointer;
		}
		td .btn-edit:hover{
			color: #fff;
			background: #007bff;
			border: 1px solid #007bff;
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
							<input type="text" name="name" value="<?php echo !empty($data['name']) ? $data['name'] : ' '  ; ?>" required>
						</td>				
					</tr>
					<tr>
						<th>Image</th>
						<td>
							<input type="file" name="image" value="<?php echo !empty($data['image']) ? $data['image'] : ' '  ; ?>" required>
						</td>				
					</tr>
					<tr>
						<th>Price</th>
						<td>
							<input type="text" name="price" value="<?php echo !empty($data['price']) ? $data['price'] : ''; ?>" required>
						</td>				
					</tr>
					<tr>
						<th>Content</th>
						<td>
							<input type="text" name="content" value="<?php echo !empty($data['content']) ? $data['content'] : ''; ?>" required>
						</td>				
					</tr>
					<tr>
						<th>Create Time</th>
						<td>
							<input type="text" name="created_time" value="<?php echo !empty($data['created_time']) ? $data['created_time'] : ''; ?>" required>
						</td>				
					</tr>
					<tr>
						<th>Last Updated</th>
						<td>
							<input type="text" name="last_updated" value="<?php echo !empty($data['last_updated']) ? $data['last_updated'] : ''; ?>" required>
						</td>				
					</tr>
					<tr>
						<td colspan="2" align="center">
							<input type="submit" name="edit" value="Sửa" class="btn-edit">
						</td>
					</tr>
				</table>
			</form>
		</div>
	</div>
</body>
</html>