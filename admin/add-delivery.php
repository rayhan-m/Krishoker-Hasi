<?php
session_start();
if ($_SESSION['admin_login'] == TRUE) {
	require_once './DBManager.php';
	$DBM = new DBManager();

	if (isset($_POST['button'])) {
		$DBM->addDelivery($_POST);
	}
	?>

	
	<?php include("include/header.php"); ?>
	<?php include("include/menubar.php"); ?>
	<script>
		function myFunction() {
			var x = document.getElementById("quantity");
			if(x.value <=0){
				x.value="";
			} 
		}

	</script>
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
									<div class="section__content section__content--p30">

										<div class="container-fluid">
											<h3 style="text-align:center; color: #82ae46; margin-bottom: 20px;">Add Delivery Info</h3>
											<div class="row">
												<div class="col-md-10 col-md-offset-1">

													<form action="" method="post">   
														<div class="form-group row">
															<label class="col-4 col-form-label">Sell ID</label> 
															<div class="col-8">
																<select type="text" class="form-control here" name="sell_id"  required>
																	<option value="">~~SELECT~~</option>
																	<?php
																	$connection = mysqli_connect('localhost', 'root', '', 'hasi');

																	$sql = "SELECT sell_id from sell WHERE status='1' AND payment_status='Paid'";
																	$result = $connection->query($sql);

																	while ($row = $result->fetch_array()) {
																		echo "<option value='" . $row['sell_id'] . "'>" . $row['sell_id'] . "</option>";
    } // while
    
    ?>
</select>
</div>
</div>

<div class="form-group row">
	<label class="col-4 col-form-label">Staff ID</label> 
	<div class="col-8">
		<select type="text" class="form-control here" name="staff_id"  required>
			<option value="">~~SELECT~~</option>
			<?php
			$connection = mysqli_connect('localhost', 'root', '', 'hasi');

			$sql = "SELECT staff_id from staff WHERE status='free'";
			$result = $connection->query($sql);

			while ($row = $result->fetch_array()) {
				echo "<option value='" . $row['staff_id'] . "'>" . $row['staff_id'] . "</option>";
    } // while
    ?>
</select>
</div>
</div>

<div class="form-group row">
	<label class="col-4 col-form-label">Vehicle ID</label> 
	<div class="col-8">
		<select type="text" class="form-control here" name="vehicle_id"  required>
			<option value="">~~SELECT~~</option>
			<?php
			$connection = mysqli_connect('localhost', 'root', '', 'hasi');

			$sql = "SELECT vehicle_id from vehicle WHERE status='free'";
			$result = $connection->query($sql);

			while ($row = $result->fetch_array()) {
				echo "<option value='" . $row['vehicle_id'] . "'>" . $row['vehicle_id'] . "</option>";
    } // while
    ?>
</select>
</div>
</div>

<div class="form-group row">
	<label class="col-4 col-form-label"></label>
	<div class="col-8">
		<button type="submit" name="button" class="btn btn-primary ">Confirm</button>
		<a href="delivery-report.php" class="btn btn-secondary pull-right">Cancel</a>
	</div>
</div>
</form>
</div>
</div>
</div>
<!-- END MAIN CONTENT-->
<?php include("include/footer.php"); 
}else{
	header('location:login.php');
}
?>
