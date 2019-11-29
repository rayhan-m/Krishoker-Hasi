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
					<?php if($message){?>
					<div class="alert alert-success alert-dismissible text-center">
					  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					  <strong><?php echo $message?>! </strong>  
					</div>
				<?php }?>
				</div>
				<div class="section__content section__content--p30">
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-8 col-md-offset-2" style="border: 2px solid #82ae46; margin-left: 158px; text-align:center;">
								<h3 style="text-align:center; color: #82ae46;">My Profile</h3>
								<div class="form-group row">
									<label class="col-4 col-form-label"></label> 
									<div class="col-8" style="margin-right:0px;">
										<td  class="text-center"><?php echo "<img src='". @$pro['img'] . "'height='250' width='180' >"; ?>
									</td>

								</div>
							</div>
								<div class="form-group row">
									<label class="col-4 col-form-label">Farmer ID</label> 
									<div class="col-8">
										<input class="form-control here " disabled value="<?php echo $pro['farmer_id'];?>">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-4 col-form-label">First Name</label> 
									<div class="col-8">
										<input class="form-control here " disabled value="<?php echo $pro['fname'];?>">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-4 col-form-label">Last Name</label> 
									<div class="col-8">
										<input class="form-control here " disabled value="<?php echo $pro['lname'];?>">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-4 col-form-label">User Name</label> 
									<div class="col-8">
										<input class="form-control here " disabled value="<?php echo $pro['user_name'];?>">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-4 col-form-label">Password</label> 
									<div class="col-8">
										<input class="form-control here " disabled value="<?php echo $pro['password'];?>">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-4 col-form-label">Email</label> 
									<div class="col-8">
										<input class="form-control here " disabled value="<?php echo $pro['email'];?>">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-4 col-form-label">Phone No</label> 
									<div class="col-8">
										<input class="form-control here " disabled value="<?php echo $pro['phn_no'];?>">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-4 col-form-label">NID No</label> 
									<div class="col-8">
										<input class="form-control here " disabled value="<?php echo $pro['nid'];?>">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-4 col-form-label">Address</label> 
									<div class="col-8">
										<input class="form-control here " disabled value="<?php echo $pro['address'];?>">
									</div>
								</div>
								

							<div class="form-group row">
								<div class="offset-4 col-8">

									<a href="editFarmerProfile.php?farmer_id=<?php echo $pro['farmer_id']; ?>" class="btn btn-primary"   title="Edit" ><i class="fas fa-edit"></i>Edit Profile</a>
								</div>
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
