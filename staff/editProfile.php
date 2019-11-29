<?php 
session_start();
if ($_SESSION['staff_login'] == TRUE) {
require_once '../admin/DBManager.php';
$staff_id = $_GET['staff_id']; 
$DBM = new DBManager();
$editProfile = $DBM->editProfile($staff_id);
$profile = mysqli_fetch_assoc($editProfile);
if (isset($_POST['button'])) {
	$DBM->updateProfile($_POST);
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

						<li class="has-sub menu">
							<a class="js-arrow" href="#">
								<i class="fas fa-dollar-sign"></i>Payment</a>
								<ul class="list-unstyled navbar__sub-list js-sub-list">
									<li>
										<a href="payment.php">View Payment Info</a>
									</li>
								</ul>
							</li>
							<li class=" menu">
								<a  href="delivery.php"><i class="fas fa-tachometer-alt"></i>Delivery</a>
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
							<div class="col-md-8 col-md-offset-2" style=" margin-left: 158px; text-align:center;">
								<div class="panel-heading ">
									<h1 class="text-center"> Edit My Profile</h1>
								</div> <!-- /panel-heading -->   
								<div class="test">
									<form action="" method="post" enctype="multipart/form-data">
										<input type="hidden" name="staff_id" value="<?php echo $profile['staff_id']; ?>" class="form-control" >


										<div class="form-group row">
											<label  class="col-4 col-form-label">Full Name</label> 
											<div class="col-8">
												<input  name="full_name" placeholder="Full name" class="form-control here" required="required" type="text" value="<?php echo $profile['full_name']; ?>">
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
											<label  class="col-4 col-form-label">Phone No</label> 
											<div class="col-8">
												<input  name="phn_no" minlength="11" maxlength="11" placeholder="Phone No" class="form-control here" required="required" type="text" value="<?php echo $profile['phn_no']; ?>">
											</div>
										</div>
										
										<div class="form-group row">
											<label class="col-4 col-form-label">NID No</label> 
											<div class="col-8">
												<input name="nid_no" placeholder="NID No" minlength="13" maxlength="13" class="form-control here" required="required" type="text" value="<?php echo $profile['nid_no']; ?>">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-4 col-form-label">Address</label> 
											<div class="col-8">
												<input  name="address" placeholder="Address" class="form-control here" type="text" value="<?php echo $profile['address']; ?>">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-4 col-form-label">Upload Image</label>
											<div class="col-8">
												<input type="file" name="fileToUpload" id="fileToUpload"  required>
												<?php echo "<img src='../admin/". $profile['img'] . "'height='70' width='120'>"; ?>
											</div>
										</div>

										<button type="submit" name="button" class="btn btn-primary ">Update My Profile</button>
										<a href="user-profile.php" class="btn btn-secondary pull-right">Cancel</a>
									</form>

								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
			<?php include("include/footer.php"); 
}else{
	header('location:login.php');
}
?>