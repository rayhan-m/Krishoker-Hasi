<?php
session_start();
if ($_SESSION['farmer_login'] == TRUE) {
	$connection = mysqli_connect('localhost', 'root', '', 'hasi');

	$sql = "SELECT * FROM bid_board WHERE u_name='$_SESSION[user_name]'";
	$query = $connection->query($sql);
	$countProduct = $query->num_rows;
	$user_name=$_SESSION['user_name'];
	$sql = "SELECT * FROM sell WHERE payment_status='Paid' AND sold_by='$user_name'";
	$query = $connection->query($sql);
	$TotalEarn = 0;
	while ($orderResult = $query->fetch_assoc()) {
		$TotalEarn += $orderResult['total'];
	}

	$sql = "SELECT * FROM sell WHERE payment_status='Pending'";
	$query = $connection->query($sql);
	$TotalDue = 0;
	while ($orderResult = $query->fetch_assoc()) {
		$TotalDue += $orderResult['total'];
	}
	?>
	<?php include("include/header.php"); ?>
	<?php include("include/menubar.php"); ?>
	<!-- PAGE CONTAINER-->
	<div class="page-container">
		<!-- MENU SIDEBAR-->
		<aside class="menu-sidebar d-none d-lg-block">
			<div class="logo">
				<a href="#">
					<img src="images/icon/logo.png" alt="Cool Admin" />
				</a>
			</div>
			<div class="menu-sidebar__content js-scrollbar1">
				<nav class="navbar-sidebar">
					<h3 style="text-align: center; margin: 8px 0px; font-size: 20px; background-color: #82ae46; padding: 8px 0;color:#fff;">Menu Bar</h3>
					<ul class="list-unstyled navbar__list">
						<li class="active" style="background: #E4E4E4; border: 1px solid #FFFFFF;">
							<a  href="index.php"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
						</li>
						<li class=" has-sub"style="background: #E4E4E4; border: 1px solid #FFFFFF;">
							<a class="js-arrow" href="#">
								<i class="fas fa-th"></i>Products</a>
								<ul class="list-unstyled navbar__sub-list js-sub-list">
									<li >
										<a href="bid-info.php">Product Information</a>
									</li>
									<li >
										<a href="product.php">View Products</a>
									</li>

								</ul>
							</li>
							<li style="background: #E4E4E4; border: 1px solid #FFFFFF;">
								<a href="sell-details.php"><i class="fas fa-user"></i> Sell Details</a>
							</li>
							<li class=" has-sub menu">
								<a class="js-arrow" href="#">
									<i class="fas fa-file-powerpoint"></i>Report</a>
									<ul class="list-unstyled navbar__sub-list js-sub-list">
										<li>
											<a href="total-sell.php">Total Sell</a>
										</li>
									
									</ul>
								</li>
						
						
						</ul>
					</nav>
				</div>
			</aside>
			<!-- END MENU SIDEBAR-->
			<!-- MAIN CONTENT-->
			<div class="main-content">
				<div class="section__content section__content--p30">
					<div class="container-fluid" style="padding-left: 100px;">
						<div class="row m-t-25">
							
							<div class="col-sm-6 col-lg-3">
								<div class="overview-item" style="background-color: #82ae46; padding-bottom: 36px;">
									<div class="overview__inner">
										<div class="overview-box clearfix">
											<div class="icon">
												<i class="zmdi zmdi-account-o"></i>
											</div>
											<div class="text">
												<h2><?php echo $countProduct;?></h2>
												<span>Total Product</span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-6 col-lg-3">
								<div class="overview-item" style="background-color: #82ae46; padding-bottom: 36px;">
									<div class="overview__inner">
										<div class="overview-box clearfix">
											<div class="icon">
												<i class="zmdi zmdi-money"></i>
											</div>
											<div class="text">
												<h2>TK <?php echo $TotalEarn;?></h2>
												<span>Total Sell</span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-6 col-lg-3">
								<div class="overview-item" style="background-color: #82ae46; padding-bottom: 36px;">
									<div class="overview__inner">
										<div class="overview-box clearfix">
											<div class="icon">
												<i class="zmdi zmdi-money"></i>
											</div>
											<div class="text">
												<h2>TK <?php echo $TotalDue;?></h2>
												<span>Total Due </span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!--Calender-->

					<div id='wrap'>

						<div id='calendar'></div>

						<div style='clear:both'></div>

					</div>
					<!--End Calender-->

				</div>
			</div>
			<!-- END MAIN CONTENT-->
</div>
			<?php include("include/footer.php");
		}else{
			header('location:login.php');
		}
		?>
