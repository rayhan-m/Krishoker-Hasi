<?php
session_start();
if ($_SESSION['farmer_login'] == TRUE) {
$message = "";
require_once '../admin/DBManager.php';
$DBM = new DBManager();
if (isset($_SESSION['message'])) {
	$message = $_SESSION['message'];
	unset($_SESSION['message']);
}



$query = $DBM->viewIndSell();

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
							<div>
								
							</div>
							<div class="section__content section__content--p30">
								<div class="container-fluid" style="padding-left: 30px;">
									<h3 style="text-align:center; color: #82ae46;">Sell Information</h3>
									<div class="row">
										<div class="col-md-12">
											<table id="MyDataTable" class="table table-striped table-bordered" style="width:100%">
												<thead>
													<tr style="background-color: #CFCBCB; color: #000; font-size: 14px;">
														<th>Sell ID</th>
														<th>Category Name</th>
														<th>Price</th>
														<th>Quantity</th>
														<th>Total Price</th>
														<th>Sold To</th>
														
														<th>Date</th>
														<th>Delivery Date</th>
														<th>Delivery Status</th>
														<th>Payment Status</th>
														
													</tr>
												</thead>
												<tbody>
													<?php
													while ($viewSell = mysqli_fetch_assoc($query)) {
														?>
														<tr>
															<th><?php echo @$viewSell['sell_id']; ?></th>
															<th><?php echo @$viewSell['title']; ?></th>
															<th><?php echo @$viewSell['price']; ?></th>
															<th><?php echo @$viewSell['quantity']; ?></th>
															<th><?php echo @$viewSell['total']; ?></th>
															<th><?php echo @$viewSell['sold_to']; ?></th>
															
															<th><?php echo @$viewSell['date']; ?></th>
															<th><?php echo @$viewSell['delivery_date']; ?></th>
															<th><?php echo @$viewSell['status']; ?></th>
															<th><?php echo @$viewSell['payment_status']; ?>
															</th>
															
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
	header('location:login.php');
}
?>
