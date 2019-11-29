<?php
session_start();
if ($_SESSION['admin_login'] == TRUE) {
require_once './DBManager.php';
$DBM = new DBManager();
$query = $DBM->viewBid();
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
	<div class="main-content" style="margin-left: -48px;">
		<div class="section__content section__content--p30">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<h3 style="text-align:center; color: #82ae46;">Products List</h3>
						<table id="MyDataTable" class="table table-striped" style="width:100%; ">
							<thead class="text-center">
								<tr style="background-color: #82ae46; color: #fff;">
									<th></th>
									<th></th>
									<th></th>
									<th></th>
									<th></th>
									<th></th>
								</tr>
							</thead>
							<tbody class="text-center">
								<?php
	                            while ($viewBid = mysqli_fetch_assoc($query)) {
	                            ?>
								<tr >
									<td class="text-center"><?php echo "<img src='../admin/". @$viewBid['img'] . "'height='70' width='140'>"; ?>
														</td>
									<td>Name: <?php echo @$viewBid['title']; ?></td>
									<td>Category: <?php echo @$viewBid['cat_name']; ?></td>
									<td>Location: <?php echo @$viewBid['location']; ?></td>
									<td>Price: <?php echo @$viewBid['start_price']; ?></td>
									<td class="text-center">
										<a href="bidding.php?bid_id=<?php echo $viewBid['bid_id']; ?>" class="btn btn-success"   title="View Details" ><i class="fas fa-eye"></i> View Details</a>
										<?php
										date_default_timezone_set('Asia/Dhaka');
										$current_date=date('m/d/Y');
										if($viewBid['end_date']>$current_date){
										?>
										<p>Status: Active</p> 
									<?php }else{?>
										<p>Status: Expaired</p> 
									<?php }?>
									</td>
								</tr>
								<?php } ?>
							</tbody>
							
						</table>
					</div>
				</div>
			</div>
		</div>
		<!-- END MAIN CONTENT-->
<?php include("include/footer.php"); 
}else{
	header('location:../admin/login.php');
}
?>
