<?php
session_start();
$message="";
if ($_SESSION['admin_login'] == TRUE) {
	require_once './DBManager.php';
	$DBM = new DBManager();
	$sell_id = $_GET['sell_id']; 

	

	$editSellProduct = $DBM->editSellProduct($sell_id);
	$editSell = mysqli_fetch_assoc($editSellProduct);

	if (isset($_POST['button'])) {
		$DBM->updateSellProduct($_POST);
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
											<div class="row">
												<div class="col-md-10 col-md-offset-1">
													<h3 style="text-align:center; color: #82ae46;">Sell Product</h3>
													 

<form action="" method="post">
	<input type="hidden" name="sell_id" value="<?php echo $editSell['sell_id']; ?>" class="form-control" >
	<div class="form-group row">
		<label class="col-4 col-form-label">Bid ID:</label> 
		<div class="col-8">
			<input class="form-control here " name="bid_id" readonly value="<?php echo $editSell['bid_id'];?>">
		</div>
	</div>   
	<div class="form-group row">
		<label class="col-4 col-form-label">Product Name</label> 
		<div class="col-8">
			<input class="form-control here " name="title" readonly value="<?php echo $editSell['title'];?>">
		</div>
	</div>
	<div class="form-group row">
		<label class="col-4 col-form-label">Price/Kg</label> 
		<div class="col-8">
			<input class="form-control here " name="price" readonly value="<?php echo $editSell['price'];?>">
		</div>
	</div>
	<div class="form-group row">
		<label class="col-4 col-form-label">Quantity</label> 
		<div class="col-8">
			<input type="number" name="quantity" id="quantity" onblur="myFunction()" value="<?php echo $editSell['quantity'];?>" class="form-control here" placeholder="Enter Quantity" required>
		</div>
	</div>
	<div class="form-group row">
		<label class="col-4 col-form-label">Sold To</label> 
		<div class="col-8">
			<input class="form-control here" 
			name="sold_to" readonly value="<?php echo $editSell['sold_to'];?>">
		</div>
	</div>
	<div class="form-group row">
		<label class="col-4 col-form-label">Sold By</label> 
		<div class="col-8">
			<input class="form-control here " 
			name="sold_by"	readonly value="<?php echo $editSell['sold_by'];?>">
		</div>
	</div>
	<div class="form-group row">
		<label class="col-4 col-form-label"></label>
		<div class="col-8">
			<button type="submit" name="button" class="btn btn-primary ">Update</button>
			<a href="sell-product.php" class="btn btn-secondary pull-right">Cancel</a>
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
