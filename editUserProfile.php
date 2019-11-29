<?php 
session_start();
if ($_SESSION['user_login'] == TRUE) {
require_once 'admin/DBManager.php';
$user_id = $_GET['user_id']; 
$DBM = new DBManager();
$editUserProfile = $DBM->editUserProfile($user_id);
$profile = mysqli_fetch_assoc($editUserProfile);
if (isset($_POST['button'])) {
	$DBM->updateUserProfile($_POST);
}
?>
<?php include("inc/header.php"); ?>
    <!-- END nav -->

    <div class="hero-wrap hero-bread" style="background-image: url('images/banner.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>User Profile</span></p>
            <h1 class="mb-0 bread">Edit User Profile</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section contact-section bg-light">
      <div class="container">
      	<div class="row d-flex mb-5 contact-info">
          <div class="col-md-8 col-md-offset-2" style="border: 2px solid #82ae46; margin-left: 158px; text-align:center;">
				<h3 style="text-align:center; color: #82ae46;">My Profile</h3>
										<div class="test">
					<form action="" method="post" enctype="multipart/form-data">
						<input type="hidden" name="user_id" value="<?php echo $profile['user_id']; ?>" class="form-control" >

						<div class="form-group row">
							<label  class="col-4 col-form-label">First Name</label> 
							<div class="col-8">
								<input  name="first_name" placeholder="First name" class="form-control here" required="required" type="text" value="<?php echo $profile['fname']; ?>">
							</div>
						</div>
						<div class="form-group row">
							<label  class="col-4 col-form-label">Last Name</label> 
							<div class="col-8">
								<input  name="last_name" placeholder="Last name" class="form-control here" required="required" type="text" value="<?php echo $profile['lname']; ?>">
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
							<label  class="col-4 col-form-label">Email</label> 
							<div class="col-8">
								<input  name="email" placeholder="Email" class="form-control here" type="email" value="<?php echo $profile['email']; ?>">
							</div>
						</div>
						<div class="form-group row">
							<label  class="col-4 col-form-label">Phone No</label> 
							<div class="col-8">
								<input  name="phn_no" placeholder="Phone No" class="form-control here" required="required" type="text" minlength="11" maxlength="11" value="<?php echo $profile['phn_no']; ?>">
							</div>
						</div>
						<div class="form-group row">
							<label  class="col-4 col-form-label">NID No</label> 
							<div class="col-8">
								<input  name="nid" placeholder="NID No" minlength="13" maxlength="13" class="form-control here" required="required" type="text" value="<?php echo $profile['nid']; ?>">
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
							<div class="col-6">
								<input type="file" name="fileToUpload" id="fileToUpload"  required>
								<div class="col-md-12">
						<td class="text-center"><?php echo "<img src='". @$pro['img'] . "'height='150' width='150'>"; ?>
					</td>

				</div>
							</div>
						</div>

						<button type="submit" name="button" class="btn btn-primary ">Update My Profile</button>
						<a href="profile.php" class="btn btn-secondary pull-right">Cancel</a>
					</form>

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