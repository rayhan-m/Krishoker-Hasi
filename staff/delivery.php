
<?php
session_start();
if ($_SESSION['staff_login'] == TRUE) {
$message = "";
require_once '../admin//DBManager.php';
$DBM = new DBManager();

if (isset($_SESSION['message'])) {
	$message = $_SESSION['message'];
	unset($_SESSION['message']);
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

	$sql3 = "UPDATE staff SET status='free' WHERE staff_id='$st_id'";
	$query3 = $connection->query($sql3);
	$sql4 = "UPDATE vehicle SET status='free' WHERE vehicle_id='$v_id'";
	$query4 = $connection->query($sql4);
	date_default_timezone_set('Asia/Dhaka');
        $date=date('m/d/Y');
	$sql4 = "UPDATE delivery SET status='Delivered',delivery_date='$date'  WHERE delivery_id='$delivery_id'";
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
							<div>
								<h4 class="text-center text-success remove-message"><?php echo $message ?></h4>
							</div>
							<div class="section__content section__content--p30">
								<div class="container-fluid">
									<div class="row">

										<div class="col-md-12">
											<h2 style="text-align: center;color: #82ae46;">Delivery Info</h2>
											<table id="MyDataTable" class="table table-striped" style="width:100%">
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
															
															<form action="" method="post">
                                                <input type="hidden" name="delivery_id" value="<?php echo $viewDelivery['delivery_id']; ?>" class="form-control" >
                                                <button type="submit" name="btn" class="btn" style="background-color: #82ae46; color: #fff;"  <?php if($viewDelivery['status'] == 'Delivered'){?> disabled <?php } ?> >Done</button>
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
