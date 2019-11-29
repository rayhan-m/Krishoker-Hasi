<?php
@session_start();
if ($_SESSION['user_login'] == TRUE) {

	if (isset($_POST['btn'])) {
	$sell_id = $_POST['sell_id'];

	$connection = mysqli_connect('localhost', 'root', '', 'hasi');
	$sql = "SELECT * FROM delivery WHERE sell_id='$sell_id'";
	$query1 = $connection->query($sql);
	$select = mysqli_fetch_assoc($query1);
	$s_id=$select['sell_id'];
	$st_id=$select['staff_id'];
	$v_id=$select['vehicle_id'];

	$sql2 = "UPDATE sell SET status='2' WHERE sell_id='$s_id'";
	$query2 = $connection->query($sql2);
	$sql3 = "UPDATE staff SET status='free' WHERE staff_id='$st_id'";
	$query3 = $connection->query($sql3);
	$sql4 = "UPDATE vehicle SET status='free' WHERE vehicle_id='$v_id'";
	$query4 = $connection->query($sql4);

	date_default_timezone_set('Asia/Dhaka');
        $delivery_date=date('m/d/Y');

	$sql4 = "UPDATE delivery SET status='Delivered', delivery_date='$delivery_date' WHERE sell_id='$sell_id'";
	$query4 = $connection->query($sql4);

}
?>
<?php include("inc/header.php"); ?>
    <!-- END nav -->

    <div class="hero-wrap hero-bread" style="background-image: url('images/banner.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Previous History</span></p>
            <h1 class="mb-0 bread">Previous History</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-no-pb ftco-no-pt bg-light">
			<div class="container">
				<div class="row">
					
					<div class="col-md-12" style=" margin:30px 0px;">
						<table id="MyDataTable" class="table table-striped table-bordered">
							<thead>
								<tr style="background-color: #82ae46; color: #fff; font-size: 12px;">
									<th>Sell ID</th>
									<th>Product Name</th>
									<th>Price</th>
									<th>Quantity</th>
									<th>Total Price</th>
									<th>Sold To</th>
									<th>Sold By</th>
									<th>Date</th>
									<th>Delivery Date</th>
									<th>Pay-Status</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
								<?php
					$user_name=$pro['user_name'];
					$connection = mysqli_connect('localhost', 'root', '', 'hasi');
                $sql = "SELECT * FROM sell as s, delivery as d Where s.sold_to='$user_name' AND d.sell_id=s.sell_id";

                $query = $connection->query($sql);
					while ($viewIndSell = mysqli_fetch_assoc($query)) {
						?>
									<tr>
										<th><?php echo @$viewIndSell['sell_id']; ?></th>
										<th><?php echo @$viewIndSell['title']; ?></th>
										<th><?php echo @$viewIndSell['price']; ?></th>
										<th><?php echo @$viewIndSell['quantity']; ?></th>
										<th><?php echo @$viewIndSell['total']; ?></th>
										<th><?php echo @$viewIndSell['sold_to']; ?></th>
										<th><?php echo @$viewIndSell['sold_by']; ?></th>
										<th><?php echo @$viewIndSell['date']; ?></th>
										<th><?php echo @$viewIndSell['delivery_date']; ?></th>
										<th><?php echo @$viewIndSell['payment_status']; ?>
										</th>
										<th><?php echo @$viewIndSell['status']; ?>
										</th>
									</tr>
								<?php } ?>
							</tbody>
							<tfoot>
								<tr style="background-color: #82ae46; color: #fff; font-size: 12px;">
									<th>Sell ID</th>
									<th>Product Name</th>
									<th>Price</th>
									<th>Quantity</th>
									<th>Total Price</th>
									<th>Sold To</th>
									<th>Sold By</th>
									<th>Date</th>
									<th>Delivery Date</th>
									<th>Pay-Status</th>
									<th>Status</th>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
		</section>
		

<?php include("inc/footer.php"); 
}else{
	header('location:login.php');
}
?>
