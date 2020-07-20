<?php
 	require'../../../libs/function.php';
 	connect_db();
	global $conn;
	$data = array();
	function addpromo($Promo1,$Promo2,$Promo3,$Promo4,$Promo5,$productname)
	{
		global $conn;
		connect_db();
		$sql = "INSERT INTO promotion(Promo1,Promo2,Promo3,Promo4,Promo5,ProductId) VALUES ('$Promo1','$Promo2','$Promo3','$Promo4','$Promo5',(SELECT product.ProductId FROM product WHERE product.ProductName='$productname'))";
		$query = mysqli_query($conn, $sql);
		return $query;
	}
	function adddetail($Display,$Card,$gateway,$OS,$RearCamera,$FrontCamera,$CPU,$RAM,$ROM,$network,$battery,$design,$productname)
	{
		global $conn;
		connect_db();
		$sql = "INSERT INTO detail(Display,Card,gateway,OS,RearCamera,FrontCamera,CPU,RAM,ROM,Network,battery,design,ProductId) VALUES ('$Display','$Card','$gateway','$OS','$RearCamera','$FrontCamera','$CPU','$RAM','$ROM','$network','$battery','$design',(SELECT product.ProductId FROM product WHERE product.ProductName='$productname'))";
		$query = mysqli_query($conn, $sql);
		return $query;
	}
	if (isset($_POST['submit'])) {
		$data['productname'] = $_POST['productname'];
		$data['image'] = 'img/product/'.$_POST['image'];
		$data['pricepromo'] = $_POST['pricepromo'];
		$data['pricecurrent'] = $_POST['pricecurrent'];
		$data['brand'] = $_POST['brand'];
		$data['quantity'] = $_POST['quantity'];
		$data['group'] = $_POST['group'];
		$data['folder'] = $_POST['folder'];

		$data['Promo1'] = $_POST['Promo1'];
		$data['Promo2'] = $_POST['Promo2'];
		$data['Promo3'] = $_POST['Promo3'];
		$data['Promo4'] = $_POST['Promo4'];
		$data['Promo5'] = $_POST['Promo5'];

		$data['Display'] = $_POST['Display'];
		$data['Card'] = $_POST['Card'];
		$data['gateway'] = $_POST['gateway'];
		$data['OS'] = $_POST['OS'];
		$data['RearCamera'] = $_POST['RearCamera'];
		$data['FrontCamera'] = $_POST['FrontCamera'];
		$data['CPU'] = $_POST['CPU'];
		$data['RAM'] = $_POST['RAM'];
		$data['ROM'] = $_POST['ROM'];
		$data['network'] = $_POST['network'];
		$data['battery'] = $_POST['battery'];
		$data['design'] = $_POST['design'];

		add_product($data['productname'],$data['image'],$data['pricepromo'],$data['pricecurrent'],$data['brand'],$data['quantity'],$data['group'],$data['folder']);
		addpromo($data['Promo1'],$data['Promo2'],$data['Promo3'],$data['Promo4'],$data['Promo5'],$data['productname']);
		adddetail($data['Display'],$data['Card'],$data['gateway'],$data['OS'],$data['RearCamera'],$data['FrontCamera'],$data['CPU'],$data['RAM'],$data['ROM'],$data['network'],$data['battery'],$data['design'],$data['productname']);
		header('location: addcolor.php');
	}
 	disconnect_db();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Add Product</title>
        <link href="../../../img/icon/favicon.ico" rel="shortcut icon" type="image/x-icon">
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
        <style type="text/css" media="screen">
            input{
                width: 90%
            }
            th{
                width: 30%
            }
        </style>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.html">Start Bootstrap</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Settings</a>
                        <a class="dropdown-item" href="#">Activity Log</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../../">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Layouts
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Login</a>
                                            <a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="charts.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="tables.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Products
                            </a>
                            <a class="nav-link" href="orders.php">
                                <div class="sb-nav-link-icon" style="display: flex">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bag-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 4h14v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4zm7-2.5A2.5 2.5 0 0 0 5.5 4h-1a3.5 3.5 0 1 1 7 0h-1A2.5 2.5 0 0 0 8 1.5z"/>
                                    </svg>
                                </div>
                               Orders
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Add</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Add</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body table-responsive">
                                <form action="" method="post">
                                    <table class="table table-bordered" width="100%" cellspacing="0">
                                        <h2 class="text-primary">Bảng thông tin chung về sản phẩm</h2>
                                        <tr>
                                            <th>Tên sản phẩm</th>
                                            <td>
                                                <input type="text" name="ProductName" value="">
                                            </td>               
                                        </tr>
                                        <tr>
                                            <th>Hình ảnh</th>
                                            <td>
                                                <input type="file" name="ProductImage" value="" required>
                                            </td>               
                                        </tr>
                                        <tr>
                                            <th>Giá khuyến mãi(Nếu có)</th>
                                            <td>
                                                <input type="number" name="PricePromo" value="" require>
                                            </td>               
                                        </tr>
                                        <tr>
                                            <th>Giá gốc</th>
                                            <td>
                                                <input type="number" name="PriceCurrent" value="" require>
                                            </td>               
                                        </tr>
                                        <tr>
                                            <th>Thương hiệu</th>
                                            <td>
                                                <input type="text" name="Brand" value="" require>
                                            </td>               
                                        </tr>
                                        <tr>
                                            <th>Số lượng tồn kho</th>
                                            <td>
                                                <input type="number" name="Quantity" value="" require>
                                            </td>               
                                        </tr>
                                        <tr>
                                            <th>Nhóm sản phẩm</th>
                                            <td>
                                                <input type="text" name="GroupProduct" value="" required>
                                            </td>               
                                        </tr>
                                        <tr>
                                            <th>Thư mục</th>
                                            <td>
                                                <input type="text" name="folder" value="" required>
                                            </td>               
                                        </tr>
                                    </table>
                                    <table class="table table-bordered" width="100%" cellspacing="0">
                                        <h2 class="text-primary">Bảng thông tin khuyến mãi của sản phẩm</h2>
                                        <tbody>
                                            <tr>
                                                <th>Khuyến mãi 1</th>
                                                <td>
                                                    <input type="text" name="Promo1" value="" >
                                                </td>               
                                            </tr>
                                            <tr>
                                                <th>Khuyến mãi 2</th>
                                                <td>
                                                    <input type="text" name="Promo2" value="">
                                                </td>               
                                            </tr>
                                            <tr>
                                                <th>Khuyến mãi 3</th>
                                                <td>
                                                    <input type="text" name="Promo3" value="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Khuyến mãi 4</th>
                                                <td>
                                                    <input type="text" name="Promo4" value="">
                                                </td>               
                                            </tr>
                                            <tr>
                                                <th>Khuyến mãi 5</th>
                                                <td>
                                                    <input type="text" name="Promo5" value="">
                                                </td>               
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <h2 class="text-primary">Bảng thông số kỹ thuật của sản phẩm</h2>
                                        <tbody>
                                            <tr>
                                                <th>Màn hình</th>
                                                <td>
                                                    <input type="text" name="Display" value="">
                                                </td>               
                                            </tr>
                                            <tr>
                                                <th>Card (Đối với sản phẩm Laptop)</th>
                                                <td>
                                                    <input type="text" name="Card" value="">
                                                </td>               
                                            </tr>
                                            <tr>
                                                <th>Cổng kết nối (Đối với sản phẩm Laptop)</th>
                                                <td>
                                                    <input type="text" name="gateway" value="">
                                                </td>               
                                            </tr>
                                            <tr>
                                                <th>Hệ điều hành</th>
                                                <td>
                                                    <input type="text" name="OS" value="">
                                                </td>               
                                            </tr>
                                            <tr>
                                                <th>Camera sau</th>
                                                <td>
                                                    <input type="text" name="RearCamera" value="">
                                                </td>               
                                            </tr>
                                            <tr>
                                                <th>Camera trước</th>
                                                <td>
                                                    <input  type="text" name="FrontCamera" value="">
                                                </td>               
                                            </tr>
                                            <tr>
                                                <th>CPU</th>
                                                <td>
                                                    <input type="text" name="CPU" value="">
                                                </td>               
                                            </tr>
                                            <tr>
                                                <th>RAM</th>
                                                <td>
                                                    <input type="text" name="RAM" value="">
                                                </td>               
                                            </tr>
                                            <tr>
                                                <th>ROM</th>
                                                <td>
                                                    <input type="text" name="ROM" value="">
                                                </td>               
                                            </tr>
                                            <tr>
                                                <th>Kết nối mạng</th>
                                                <td>
                                                    <input type="text" name="network" value="" >
                                                </td>               
                                            </tr>
                                            <tr>
                                                <th>Dung lượng pin</th>
                                                <td>
                                                    <input type="text" name="battery" value="" >
                                                </td>               
                                            </tr>
                                            <tr>
                                                <th>Thiết kế (Đối với sản phẩm Laptop)</th>
                                                <td>
                                                    <input type="text" name="design" value="">
                                                </td>               
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div ><button class="btn btn-success" type="submit" name="submit" value="Thêm">Thêm</button></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Thegioididong 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
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