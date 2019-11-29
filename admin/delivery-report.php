<?php
session_start();
if ($_SESSION['admin_login'] == TRUE) {
$message = "";
$message1 = "";
require_once './DBManager.php';
$DBM = new DBManager();

if (isset($_SESSION['message'])) {
	$message = $_SESSION['message'];
	unset($_SESSION['message']);
}
if (isset($_SESSION['message1'])) {
	$message1 = $_SESSION['message1'];
	unset($_SESSION['message1']);
}
if (isset($_GET['delete'])) {
	$delivery_id = $_GET['delete'];
	$message = $DBM->deleteDelivery($delivery_id);
}
if (isset($_POST['btn'])) {
	$delivery_id = $_POST['delivery_id'];

	$connection = mysqli_connect('localhost', 'root', '', 'hasi');
	$sql = "SELECT * FROM delivery WHERE delivery_id='$delivery_id'";
	$query1 = $connection->query($sql);
	$select = mysqli_fetch_assoc($query1);
	$s_id=$select['sell_id'];
	$st_id=$select['staff_id'];
	$v_id=$select['vehicle_id'];

	$sql2 = "UPDATE sell SET status='2' WHERE sell_id='$s_id'";
	$query2 = $connection->query($sql2);
	$sql3 = "UPDATE staff SET status='busy' WHERE staff_id='$st_id'";
	$query3 = $connection->query($sql3);
	$sql4 = "UPDATE vehicle SET status='busy' WHERE vehicle_id='$v_id'";
	$query4 = $connection->query($sql4);

	$sql4 = "UPDATE delivery SET approve='2' WHERE delivery_id='$delivery_id'";
	$query4 = $connection->query($sql4);

}
$query = $DBM->viewDelivery();
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
								<?php if($message1){?>
								<div class="alert alert-danger alert-dismissible text-center">
								  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								  <strong><?php echo $message1?>! </strong>  
								</div>
							<?php }?>
							</div>
							<div class="section__content section__content--p30">
								<div class="container-fluid">
									<h3 style="text-align:center; color: #82ae46;">Delivery Reports</h3>
									<div class="row">
										<div class="col-md-12">
											<table id="MyDataTable" class="table table-striped table-bordered" style="width:100%">
												<thead>
													<tr style="background-color: #CFCBCB; color: #000; font-size: 14px;">
														<th>Delivery ID</th>
														<th>Sell ID</th>
														<th>Vehicle ID</th>
														<th>Staff ID</th>
														<th>Status</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
													<?php
													while ($viewDelivery = mysqli_fetch_assoc($query)) {
														?>
														<tr>
															<td><?php echo @$viewDelivery['delivery_id']; ?></td>
															<td><?php echo @$viewDelivery['sell_id']; ?></td>
															<td><?php echo @$viewDelivery['vehicle_id']; ?></td>
															<td><?php echo @$viewDelivery['staff_id']; ?></td>
															<td><?php echo @$viewDelivery['status']; ?></td>
															
														<td>
															<a href="?delete=<?php echo $viewDelivery['delivery_id']; ?>" class=" <?php if($viewDelivery['approve'] == '2'){?> disabled <?php } ?>" title="Delete" ><i class="fas fa-trash-alt"></i></a>
															<form action="" method="post">
                                                <input type="hidden" name="delivery_id" value="<?php echo $viewDelivery['delivery_id']; ?>" class="form-control" >
                                                <button type="submit" name="btn" class="btn" style="background-color: blue; color: #fff;"  <?php if($viewDelivery['approve'] == '2'){?> disabled <?php } ?> >Confirm</button>
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
