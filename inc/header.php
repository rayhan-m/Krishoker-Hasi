<!DOCTYPE html>
<html lang="en">
<head>
	<title>কৃষকের হাসি</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css?family=Oswald|Tomorrow&display=swap" rel="stylesheet">



	<link rel="stylesheet" href="asset/css/open-iconic-bootstrap.min.css">
	<link rel="stylesheet" href="asset/css/animate.css">
	
	<link rel="stylesheet" href="asset/css/owl.carousel.min.css">
	<link rel="stylesheet" href="asset/css/owl.theme.default.min.css">
	<link rel="stylesheet" href="asset/css/magnific-popup.css">

	<link rel="stylesheet" href="asset/css/aos.css">

	<link rel="stylesheet" href="asset/css/ionicons.min.css">

	<link rel="stylesheet" href="asset/css/bootstrap-datepicker.css">
	<link rel="stylesheet" href="asset/css/jquery.timepicker.css">

	
	<link rel="stylesheet" href="asset/css/flaticon.css">
	<link rel="stylesheet" href="asset/css/icomoon.css">
	<link rel="stylesheet" href="asset/css/style.css">

	
</head>
<body class="goto-here">
	<div class="py-1" style="background-color: #82ae46;">
		<div class="container">
			<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
				<div class="col-lg-12 d-block">
					<div class="row d-flex">
						<div class="col-md pr-4 d-flex topper align-items-center">
							<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
							<span class="text">+00880170000500</span>
						</div>
						<div class="col-md pr-4 d-flex topper align-items-center">
							<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
							<span class="text">krishokerhasi@email.com</span>
						</div>
						<div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
							<span class="text">3-5 Business days delivery &amp; Free Returns</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar ftco-navbar-light" id="ftco-navbar">
		<div class="container">
			<a class="navbar-brand" href="index.php"><img src="asset/images/logo.png" alt="logo"></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="oi oi-menu"></span> Menu
			</button>

			<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
					<li class="nav-item active"><a href="product.php" class="nav-link">Products</a></li>
					<li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
					<li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>

					<?php
					@session_start();

                    @$user_name=$_SESSION['user_name'];
                    $connection = mysqli_connect('localhost', 'root', '', 'hasi');
                    $sql = "SELECT * from user WHERE user_name='$user_name'";
                    $result = $connection->query($sql);
                    $pro = mysqli_fetch_assoc($result);
                               
					if (@$_SESSION['user_login'] != TRUE) {
						?>
						<li class="nav-item"><a href="login.php" class="nav-link">Login</a></li>
						<li style="padding-top: 15px;"><a href="farmer/login.php" class="btn btn-primary">Sell Products</a></li>
					<?php }else{?>
						<li class="nav-item"><a href="previous-history.php" class="nav-link">History</a></li>
						<li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
						<li class="nav-item" style="margin: 20px 15px 0px 0px;">( <?php echo @$pro['user_name'];?> )</li>
						<li >
							<a href="profile.php">
                            <img src="<?php echo @$pro['img'];?>" class="user_img"/>
                        </a>
						</li>
					<?php }?>
					
				</ul>
			</div>
		</div>
	</nav>
	<!-- END nav -->