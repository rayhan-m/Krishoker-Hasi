<?php
session_start();
if ($_SESSION['admin_login'] == TRUE) {
$message = "";
$message1 = "";
require_once './DBManager.php';
$DBM = new DBManager();
if (isset($_POST['button'])) {
	$message = $DBM->addStaff($_POST);
}
if (isset($_SESSION['message'])) {
	$message = $_SESSION['message'];
	unset($_SESSION['message']);
}
if (isset($_SESSION['message1'])) {
	$message1 = $_SESSION['message1'];
	unset($_SESSION['message1']);
}
if (isset($_GET['delete'])) {
	$staff_id = $_GET['delete'];
	$message1 = $DBM->deleteStaff($staff_id);
}
$query = $DBM->viewStaff();
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
							<?php }else if($message1){?>
								<div class="alert alert-danger alert-dismissible text-center">
								  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								  <strong><?php echo $message1?>! </strong>  
								</div>
							<?php }?>
							</div>
							<div class="section__content section__content--p30">
								<div class="container-fluid">
									<h3 style="text-align:center; color: #82ae46;">All Staff</h3>
									<div class="row">
										<div class="div-action pull pull-right" style="padding-bottom:20px;">
											<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
												<i class="fas fa-plus"></i> New Staff
											</button>
										</div>
										<div class="col-md-12">
											<table id="MyDataTable" class="table table-striped table-bordered" style="width:100%">
												<thead>
													<tr style="background-color: #CFCBCB; color: #000; font-size: 14px;">
														<th>ID</th>
														<th>Name</th>
														<th>User Name</th>
														<th>Password</th>
														<th>Phn No</th>
														<th>NID No</th>
														<th>Address</th>
														<th>Image</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
													<?php
													while ($viewStaff = mysqli_fetch_assoc($query)) {
														?>
														<tr>
															<td><?php echo @$viewStaff['staff_id']; ?></td>
															<td><?php echo @$viewStaff['full_name']; ?></td>
															<td><?php echo @$viewStaff['user_name']; ?></td>
															<td><?php echo @$viewStaff['password']; ?></td>
															<td><?php echo @$viewStaff['phn_no']; ?></td>
															<td><?php echo @$viewStaff['nid_no']; ?></td>
															<td><?php echo @$viewStaff['address']; ?></td>
															<td class="text-center"><?php echo "<img src='". @$viewStaff['img'] . "'height='70' width='120'>"; ?>
														</td>
														<td>
															<a href="?delete=<?php echo $viewStaff['staff_id']; ?>"  title="Delete" ><i class="fas fa-trash-alt"></i></a>
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
					<!-- Modal -->
					<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header mod-head">
									<h3 class="mod-color " id="exampleModalLabel">Staff Information</h3>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<form action="" method="post" enctype="multipart/form-data">
										<div class="form-group">
											<label>Full Name:</label>
											<div>
												<input type="text" name="full_name"class="form-control" placeholder="Enter Full Name" required>
											</div>
										</div>
										<div class="form-group">
											<label>User Name:</label>
											<div>
												<input type="text" name="user_name"class="form-control" placeholder="Enter user Name" required>
											</div>
										</div>
										<div class="form-group">
											<label>Password:</label>
											<div>
												<input type="Password" name="password"class="form-control" placeholder="Enter Password" required>
											</div>
										</div>
										<div class="form-group">
											<label>Phone Number:</label>
											<div>
												<input type="text" name="phn_no" minlength="11" maxlength="11" class="form-control" placeholder="Enter Phone Number" required>
											</div>
										</div>
										<button type="submit" name="button" class="btn btn-primary btn-block">Submit</button>
									</form>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

								</div>
							</div>
						</div>
					</div>
					<?php include("include/footer.php"); 
}else{
	header('location:login.php');
}
?>
