<?php
session_start();
if ($_SESSION['staff_login'] == TRUE) {
require_once '../admin/DBManager.php';
$DBM = new DBManager();

if (isset($_POST['btn'])) {
  $sp_id = $_POST['sp_id'];

  $connection = mysqli_connect('localhost', 'root', '', 'hasi');

  $sql4 = "UPDATE staff_payment SET status='Confirm' WHERE sp_id='$sp_id'";
  $query4 = $connection->query($sql4);

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
							<div class="div-action pull pull-right" style="padding-bottom:20px;">

							</div>
							<div class="col-md-12">
								<h2 style="text-align: center;color: #82ae46;">Payment Info</h2>
								<table id="MyDataTable" class="table table-striped table-bordered" style="width:100%">
									<thead>
										<tr style="background-color: #CFCBCB; color: #000; font-size: 14px;">
											<th>Payment ID</th>
											<th>Staff ID</th>
											<th>Payment Date</th>
											<th>Payment Month</th>
											<th>Salary</th>
											<th>Status</th>
											<th>Action</th>

										</tr>
									</thead>

									<tbody >
										<?php
										$staff_id=$pro['staff_id'];
                                    $sql = "SELECT * FROM staff_payment Where staff_id='$staff_id'";

                                    $query = $connection->query($sql);
										while ($viewIndStaffPayment = mysqli_fetch_assoc($query)) {
											?>
											<tr>
												<td><?php echo @$viewIndStaffPayment['sp_id']; ?></td>
												<td><?php echo @$viewIndStaffPayment['staff_id']; ?></td>
												<td><?php echo @$viewIndStaffPayment['payment_date']; ?></td>
												<td><?php echo @$viewIndStaffPayment['payment_month']; ?></td>
												<td><?php echo @$viewIndStaffPayment['salary']; ?> TK</td>
												<td><?php echo @$viewIndStaffPayment['status']; ?></td>
												<td>
													 <form action="" method="post">
		                                                <input type="hidden" name="sp_id" value="<?php echo $viewIndStaffPayment['sp_id']; ?>" class="form-control" >
		                                                <button type="submit" name="btn" class="btn" style="background-color: #82ae46; color: #fff;"  <?php if($viewIndStaffPayment['status'] == 'Confirm'){?> disabled <?php } ?> >Done</button>
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
