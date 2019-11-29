<?php 
session_start();
if ($_SESSION['admin_login'] == TRUE) {
require_once './DBManager.php';
$admin_id = $_GET['admin_id']; 
$DBM = new DBManager();
$editOwnerProfile = $DBM->editOwnerProfile($admin_id);
$profile = mysqli_fetch_assoc($editOwnerProfile);
if (isset($_POST['button'])) {
	$DBM->updateOwnerProfile($_POST);
}
?>
<?php include("include/header.php"); ?>
<?php include("include/menubar.php"); ?>
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
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-8 col-md-offset-2" style="border: 2px solid #82ae46; margin-left: 158px; text-align:center;">
						<div class="panel-heading ">
							 <h3 style="text-align:center; color: #82ae46;">Edit My Profile</h3>
						</div> <!-- /panel-heading -->   
						<div class="">
							<form action="" method="post" enctype="multipart/form-data">
								<input type="hidden" name="admin_id" value="<?php echo $profile['admin_id']; ?>" class="form-control" >

								<div class="form-group row">
									<label  class="col-4 col-form-label">Full Name</label> 
									<div class="col-8">
										<input  name="Full_name" placeholder="Full name" class="form-control here" required="required" type="text" value="<?php echo $profile['full_name']; ?>">
									</div>
								</div>
								
								<div class="form-group row">
									<label for="name" class="col-4 col-form-label">User Name</label> 
									<div class="col-8">
										<input name="user_name" class="form-control here " type="text"disabled  value="<?php echo $profile['user_name']; ?>">
									</div>
								</div>
								<div class="form-group row">
									<label  class="col-4 col-form-label">New Password</label> 
									<div class="col-8">
										<input  name="password" placeholder="Password" class="form-control here" type="password" value="<?php echo $profile['password']; ?>">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-4 col-form-label">Upload Image</label>
									<div class="col-8">
										<input type="file" name="fileToUpload" id="fileToUpload"  required>
										<?php echo "<img src='". $profile['img'] . "'height='70' width='120'>"; ?>
									</div>
								</div>

								<button type="submit" name="button" class="btn btn-primary ">Update My Profile</button>
								<a href="profile.php" class="btn btn-secondary pull-right">Cancel</a>
							</form>

						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include("include/footer.php"); 
}else{
	header('location:../admin/login.php');
}
?>