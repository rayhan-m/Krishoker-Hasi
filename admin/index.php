<?php
session_start();
if ($_SESSION['admin_login'] == TRUE) {
	$connection = mysqli_connect('localhost', 'root', '', 'hasi');

	$sql = "SELECT * FROM farmer ";
    $query = $connection->query($sql);
    $countFarmer = $query->num_rows;

    $sql = "SELECT * FROM staff ";
    $query = $connection->query($sql);
    $countStaff = $query->num_rows;

    $sql = "SELECT * FROM user";
    $query = $connection->query($sql);
    $countCustomer = $query->num_rows;

    

    $sql = "SELECT * FROM sell WHERE payment_status='Paid'";
	$query = $connection->query($sql);
	$TotalSell = 0;
	while ($orderResult = $query->fetch_assoc()) {
		$TotalSell += $orderResult['total'];
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
					<li class="active menu">
						<a  href="index.php"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
					</li>
					<li class="menu">
						<a href="category.php"><i class="fas fa-user"></i>Category</a>
					</li>
					<li class="menu">
						<a href="staff.php"><i class="fas fa-user"></i>Staff</a>
					</li>
					<li class="menu">
						<a href="customer.php"><i class="fas fa-user"></i>Customer</a>
					</li>
						<li class=" has-sub menu">
							<a class="js-arrow" href="#">
								<i class="fas fa-dollar-sign"></i>Payment</a>
								<ul class="list-unstyled navbar__sub-list js-sub-list">
									<li>
										<a href="staff-payment.php">Staff Payment</a>
									</li>
								</ul>
							</li>
							<li class=" has-sub menu">
								<a class="js-arrow" href="#">
									<i class="fas fa-th"></i>Products</a>
									<ul class="list-unstyled navbar__sub-list js-sub-list">
										<li>
											<a href="product.php">Products List</a>
										</li>

									</ul>
								</li>
								<li class=" has-sub menu" >
									<a class="js-arrow" href="#">
										<i class="fas fa-cart-arrow-down"></i>Sell Information</a>
										<ul class="list-unstyled navbar__sub-list js-sub-list">
											<li>
													<a href="sell.php">Sell Product</a>
												</li>
											<li>
												<a href="sell-product.php">Total Sell</a>
											</li>
										</ul>
									</li>

									<li class="menu">
									<a href="vehicle.php"><i class="fas fa-user"></i>Vehicle</a>
										</li>
									

									<li class=" has-sub menu">
									<a class="js-arrow" href="#">
										<i class="fas fa-cart-arrow-down"></i>Manage Delivery</a>
										<ul class="list-unstyled navbar__sub-list js-sub-list">
											<li>
													<a href="add-delivery.php">Add new Delivery</a>
												</li>
											<li>
												<a href="delivery-report.php">Delivery Report</a>
											</li>
										</ul>
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
									<div class="container-fluid" style="padding-left: 30px;">
											<div class="row m-t-25">
												<div class="col-sm-6 col-lg-3">
													<div class="overview-item" style="background-color: #82ae46; padding-bottom: 36px;">
														<div class="overview__inner">
															<div class="overview-box clearfix">
																<div class="icon">
																	<i class="zmdi zmdi-account-o"></i>
																</div>
																<div class="text">
																	<h2><?php echo $countFarmer;?></h2>
																	<span>Total Farmer </span>
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
																	<i class="zmdi zmdi-account-o"></i>
																</div>
																<div class="text">
																	<h2><?php echo $countStaff;?></h2>
																	<span>Total Staff</span>
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
																	<i class="zmdi zmdi-account-o"></i>
																</div>
																<div class="text">
																	<h2><?php echo $countCustomer;?></h2>
																	<span>Total Customer</span>
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
																	<h2>TK <?php echo $TotalSell;?></h2>
																	<span>Total Sell</span>
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
								</div>
								<!-- END MAIN CONTENT-->
							<?php include("include/footer.php");
						}else{
							header('location:login.php');
						}
						?>
