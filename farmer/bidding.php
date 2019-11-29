<?php
session_start();
if ($_SESSION['farmer_login'] == TRUE) {
$message = "";
require_once '../admin/DBManager.php';
$DBM = new DBManager();
$bid_id = $_GET['bid_id'];
$query = $DBM->viewIndBid($bid_id);
$bid = mysqli_fetch_assoc($query);

if (isset($_POST['button'])) {
	$message = $DBM->addComments($_POST);
}

if (isset($_SESSION['message'])) {
	$message = $_SESSION['message'];
	unset($_SESSION['message']);
}
// $query = $DBM->viewComments();

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

							<?php
							date_default_timezone_set('Asia/Dhaka');
							$current_date=date('m/d/Y');
							if($bid['end_date'] < $current_date){

							} ?>
							<!-- MAIN CONTENT-->
							<div class="main-content">
								<div class="section__content section__content--p30">
									<div class="container-fluid">
										<div class="row">
											<div class="col-md-12" >
												<div class="col-md-12" style="background-color: #82ae46; text-align:center; color: #fff; padding-top: 10px; font-family: 'Tomorrow', sans-serif;">
											<h4 style=" color: #fff;">Bid ID: <span><?php echo $bid['bid_id'];?> </span></h4><h5 style=" color: #fff;"> Title: <span style="font-size: 22px; margin-right: 25px; "><b><?php echo $bid['title']; ?></b></span>  Category Name:<span style="font-size: 22px; margin-right: 25px; "> <b><?php echo $bid['cat_name'];?> </b></span></h5><h6 style=" color: #fff;"> Start Date: <span style="font-size: 26px; margin-right: 25px;"><?php echo  $bid['start_date'];?></span>End Date:<span style="font-size: 26px;">  <?php echo   $bid['end_date'];?></span></h6><h5 style="color:#fff;padding-bottom: 15px;">Start Price:<span style="font-size: 26px;" ><?php echo $bid['start_price'];?> TK</span> <br/> Available Quantity:<span style="font-size: 26px;"><?php echo $bid['quantity'];?> KG</span></h5>
										</div>
											</div>
											<div class="col-md-12">

												<?php if($message){?>
												<div class="alert alert-success alert-dismissible text-center">
												  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
												  <strong><?php echo $message?>! </strong>  
												</div>
											<?php }?>

											</div >
											<?php 
												date_default_timezone_set('Asia/Dhaka');
														$current_date=date('m/d/Y');
												if($bid['end_date'] < $current_date){?>
											<div class="col-md-12">
												<h3 class="text-center" style="background-color: #fff; padding: 8px 0px; color: #82ae46;">
													<?php

													$connection = mysqli_connect('localhost', 'root', '', 'hasi');
													$sql = "SELECT user_name, price FROM comments WHERE price=(SELECT MAX(price) FROM comments WHERE bid_id='$bid_id')";
													$result = $connection->query($sql);
													$viewWinBid = mysqli_fetch_assoc($result);

													date_default_timezone_set('Asia/Dhaka');
													$current_date=date('m/d/Y');
													if($bid['end_date'] < $current_date){
														echo "(" .$viewWinBid['user_name']. ") Win The Bid : ";
														echo  $viewWinBid['price']; 
													}
													?>
												</h3>
											</div>
										<?php }?>
											<div class="col-md-12">
												<h3 class="text-center" style="color: #0B610B;  font-family: 'Tomorrow', sans-serif; margin-top: 18px;">Bit High Price To Win</h3>
											</div>
											<div class="col-md-12">
												<div class="col-md-12"><h4 style="color: #0B610B;  font-family: 'Tomorrow', sans-serif;">Current Highest Bid: 
													<?php

													$sql = "SELECT MAX(price) FROM comments WHERE bid_id='$bid_id'";
													$result = $connection->query($sql);
													$viewHighestBid = mysqli_fetch_assoc($result);
													?>
													<span class="badge bg-success" style="color: #fff;"><?php echo $viewHighestBid['MAX(price)']; ?></span>TK/KG</h4>
												</div>
												<div class="col-md-12"><h4 style="color: #0B610B;  font-family: 'Tomorrow', sans-serif;">Total Bid:
													<?php

													$connection = mysqli_connect('localhost', 'root', '', 'hasi');
													$sql = "SELECT count(comment_id) FROM comments WHERE bid_id='$bid_id'";
													$result = $connection->query($sql);
													$viewTotalBid = mysqli_fetch_assoc($result);?>
													<span class="badge bg-success" style="color: #fff;"><?php echo $viewTotalBid['count(comment_id)']; ?></span>
												</h4>
											</div>
											<div class="col-md-6 offset-md-3 col-sm-6 offset-sm-3 col-12 comments-main pb-4 rounded">


												<form action="" method="post" class="row comment-box-main p-3 rounded-bottom">
													<input type="hidden" name="bid_id" value="<?php echo $bid['bid_id']; ?>" class="form-control " >
													<div class="col-md-9 col-sm-9 col-9 pr-0 comment-box">
														<input type="number" name="price" class="form-control " placeholder="Enter Bid Price"/>
													</div>
													<div class="col-md-2 col-sm-2 col-2 pl-0 text-center send-btn">
														<button class="btn btn-info" name="button" <?php
														if ($_SESSION['farmer_login'] == TRUE) { ?>
														 disabled <?php } ?>/>Send</button>
													</div>
												</form>


												<ul class="p-0">
													<?php
													$connection = mysqli_connect('localhost', 'root', '', 'hasi');
													$sql = "SELECT * FROM comments WHERE bid_id='$bid_id' ORDER by comment_id DESC";
													$result = $connection->query($sql);
													while ($viewComments = mysqli_fetch_assoc($result)) {

														?>
														<li>
															<div class="row comments mb-2">
																<div class="col-md-2 col-sm-2 col-3 text-center user-img">
																	<?php
																	$u_name=$viewComments['user_name'];
																	$sql1 = "SELECT img FROM user WHERE user_name='$u_name'";
																$result1 = $connection->query($sql1);
																$viewImg = mysqli_fetch_assoc($result1);
																	?>
																	<img id="profile-photo" src="../<?php echo $viewImg['img']; ?>" class="rounded-circle" alt="No Img" />
																</div>
																<div class="col-md-9 col-sm-9 col-9 comment rounded mb-2">
																	<h4 class="m-0"><?php echo $viewComments['user_name']; ?></h4>
																	<time class="text-black ml-3"><?php echo $viewComments['date']; ?> <?php echo $viewComments['time']; ?></time>
																	<like></like>
																	<p class="mb-0 text-black" style="font-size: 24px;"><?php echo $viewComments['price']; ?></p>
																</div>
															</div>

														</li>
													<?php } ?>
						</ul>
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
