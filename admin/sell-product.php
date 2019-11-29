<?php
session_start();
if ($_SESSION['admin_login'] == TRUE) {
$message = "";
require_once './DBManager.php';
$DBM = new DBManager();
if (isset($_SESSION['message'])) {
	$message = $_SESSION['message'];
	unset($_SESSION['message']);
}
if (isset($_GET['delete'])) {
	$sell_id = $_GET['delete'];
	$message = $DBM->deleteSell($sell_id);
}
if (isset($_GET['edit'])) {
	$sell_id = $_GET['edit'];
	$sell_id = $_GET['sell_id'];
	$editBuyFood = $DBM->editSell($sell_id);
	$sell = mysqli_fetch_assoc($editSell);
}

if (isset($_POST['btn'])) {

	$connection = mysqli_connect('localhost', 'root', '', 'hasi');
	$sell_id = $_POST['sell_id'];
	$sql = "UPDATE sell SET payment_status='Paid' WHERE sell_id='$sell_id'";
	$query = $connection->query($sql);
		// $update = mysqli_fetch_assoc($query);
	header('location:sell-product.php');
}

$query = $DBM->viewSell();

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
							<div>
								<?php if($message){?>
								<div class="alert alert-success alert-dismissible text-center">
								  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								  <strong><?php echo $message?>! </strong>  
								</div>
							<?php }?>
							</div>
							<div class="section__content section__content--p30">
								<div class="container-fluid">
									<h3 style="text-align:center; color: #82ae46;">Sold Products</h3>
									<div class="row">
										<div class="col-md-12">

											<table id="MyDataTable" class="table table-striped table-bordered" style="width:100%">
												<thead>
													<tr style="background-color: #CFCBCB; color: #000; font-size: 14px;">
														<th>Sell ID</th>
														<th>Product Name</th>
														<th>Price</th>
														<th>Quantity</th>
														<th>Total Price</th>
														<th>Sold To</th>
														<th>Sold By</th>
														<th>Date</th>
														<th>Pay-Status</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
													<?php
													while ($viewSell = mysqli_fetch_assoc($query)) {
														?>
														<tr>
															<td><?php echo @$viewSell['sell_id']; ?></td>
															<td><?php echo @$viewSell['title']; ?></td>
															<td><?php echo @$viewSell['price']; ?></td>
															<td><?php echo @$viewSell['quantity']; ?></td>
															<td><?php echo @$viewSell['total']; ?></td>
															<td><?php echo @$viewSell['sold_to']; ?></td>
															<td><?php echo @$viewSell['sold_by']; ?></td>
															<td><?php echo @$viewSell['date']; ?></td>
															<td><?php echo @$viewSell['payment_status']; ?></td>
															<td>
																<a href="editSellProduct.php?sell_id=<?php echo $viewSell['sell_id']; ?>" class="btn <?php if($viewSell['payment_status']=='Paid'){?> disabled <?php }?>"   title="Edit" ><i class="fas fa-edit"></i></a> 
																<a href="?delete=<?php echo $viewSell['sell_id']; ?>" class="btn <?php if($viewSell['payment_status']=='Paid'){?> disabled <?php }?>"  title="Delete" ><i class="fas fa-trash-alt"></i></a>
																<form action="" method="post">
																	<input type="hidden" name="sell_id" value="<?php echo $viewSell['sell_id']; ?>" class="form-control" >
																	<button type="submit" <?php if($viewSell['payment_status']=='Paid'){?> disabled <?php }?> name="btn"><i class="far fa-check-square " style="font-size: 20px; color: blue;"></i></button>
																</form>
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
	header('location:login.php');
}
?>
