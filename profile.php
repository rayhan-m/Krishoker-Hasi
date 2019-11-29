<?php
session_start();
if ($_SESSION['user_login'] == TRUE) {
$message = "";
require_once 'admin/DBManager.php';
$DBM = new DBManager();
if (isset($_SESSION['message'])) {
	$message = $_SESSION['message'];
	unset($_SESSION['message']);
}
?>
<?php include("inc/header.php"); ?>
    <!-- END nav -->

    <div class="hero-wrap hero-bread" style="background-image: url('images/banner.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>User Profile</span></p>
            <h1 class="mb-0 bread">User Profile</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section contact-section bg-light">
      <div class="container">
      	<div class="row d-flex mb-5 contact-info">
          <div class="col-md-8 col-md-offset-2" style="border: 2px solid #82ae46; margin-left: 158px; text-align:center;">
					<div class="col-md-12">
						<?php if($message){?>
							<div class="alert alert-success alert-dismissible text-center">
							  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							  <strong><?php echo $message?>! </strong>  
							</div>
						<?php }?>
					</div>
						<h3 style="text-align:center; color: #82ae46;">My Profile</h3>
						<div class="col-md-12">
								<td class="text-center"><?php echo "<img src='". @$pro['img'] . "'height='150' width='150'>"; ?>
							</td>

						</div>
						<div class="form-group row">
							<label class="col-4 col-form-label">User ID</label> 
							<div class="col-8">
								<input class="form-control here " disabled value="<?php echo $pro['user_id'];?>">
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
							
							<a href="editUserProfile.php?user_id=<?php echo $pro['user_id']; ?>" class="btn btn-primary"   title="Edit" ><i class="fas fa-edit"></i>Edit Profile</a>
						</div>
					</div>
				</div>
        </div>
      </div>
    </section>

    <?php include("inc/footer.php"); 
}else{
    header('location:login.php');
}
?>