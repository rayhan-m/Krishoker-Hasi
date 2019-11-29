<?php
session_start();
if ($_SESSION['admin_login'] == TRUE) {
	$connection = mysqli_connect('localhost', 'root', '', 'hasi');
	$sql = "SELECT total FROM sell";
	$query = $connection->query($sql);
	$TotalSell = 0;
	while ($orderResult = $query->fetch_assoc()) {
		$TotalSell += $orderResult['total'];
	}
 function fetch_data()  
 {  
      $output = '';  
      $conn = mysqli_connect("localhost", "root", "", "hasi"); 
      $sql = "SELECT total FROM sell";
		$query = $conn->query($sql);
		$TotalSell = 0;
		while ($orderResult = $query->fetch_assoc()) {
			$TotalSell += $orderResult['total'];
		} 
      $sql = "SELECT * FROM sell ORDER BY sell_id ASC";  
      $result = mysqli_query($conn, $sql);
      $output .=  '<tbody>';
      while($row = mysqli_fetch_array($result))  
      {       
      $output .= 
	      
		      '<tr>  
		          <td>'.$row["sell_id"].'</td>  
		          <td>'.$row["title"].'</td>  
		          <td>'.$row["sold_to"].'</td>
		          <td>'.$row["price"].'</td> 
		          <td>'.$row["quantity"].'</td>
		          <td>'.$row["total"].'</td>   
		     </tr>';
	       
      }
      $output .= '<tr>  
	          <td></td>  
	          <td></td>  
	          <td></td>
	          <td></td> 
	          <td>Total Sell = </td>
	          <td>'.$TotalSell.' TK</td>   
	     </tr>';
      $output .='</tbody>'; 
      return $output;  
 }
 	  
 date_default_timezone_set('Asia/Dhaka');
$current_date=date('m/d/Y');
$time=date('h:i:s A');
 if(isset($_POST["generate_pdf"]))  
 {  
      require_once('tcpdf/tcpdf.php');  
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("Total Sell Report");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 11);  
      $obj_pdf->AddPage();  
      $content = '';  
      $content .= '  
      <img src="images/icon/logo.png" height="60px" width="100px" style="margin-left: 50%;"/>

      <h4 align="center">Total Sell Report</h4> 
      <h4 align="center">'.$current_date.' | ' .$time. '</h4><br /> 
      <table border="1" cellspacing="0" cellpadding="3" align="center" >  
           <thead>
		      <tr>
		        <th>Sell ID</th>
		        <th >Product Name</th>
		        <th >Sold To</th>
		        <th >Price</th>
		        <th >Quantity</th>
		        <th >Total Cost</th>
		      </tr>
		    </thead>  
		    
      ';  
      $content .= fetch_data();  
      $content .= '</table>';  
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('file.pdf', 'I');  
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
							<div class="section__content section__content--p30">
								<div class="container-fluid">
									<h3 style="text-align:center; color: #82ae46;">Total Sell Report</h3>
									<div class="row">
										<div class="col-md-8  text-center">
											
										</div>
										<div class="col-md-4">
											<form method="post">  
						                          <input type="submit" name="generate_pdf" class="btn btn-success" value="Download Report" />  
						                     </form>  
					                     </div>         
										  <table class="table table-bordered table-hover">
										    <thead>
										      <tr style="background-color: #82ae46; color: #fff; font-size: 14px;">
										        <th>Sell ID</th>
										        <th>Product Name</th>
										        <th>Sold To</th>
										        <th>Price</th>
										        <th>Quantity</th>
										        <th>Total Cost</th>
										      </tr>
										    </thead>
										    <tbody>
									    	<?php
									    	$sql = "SELECT * FROM sell ORDER BY sell_id ASC"; 
									    	$result = mysqli_query($connection, $sql);  
												while ($viewSell = mysqli_fetch_assoc($result)) {
													?>
													<tr>
														<th><?php echo @$viewSell['sell_id']; ?></th>
														<th><?php echo @$viewSell['title']; ?></th>
														<th><?php echo @$viewSell['sold_to']; ?></th>
														<th><?php echo @$viewSell['price']; ?></th>
														<th><?php echo @$viewSell['quantity']; ?></th>
														<th><?php echo @$viewSell['total']; ?></th>
													</tr>
										      <?php } ?>
										      		<tr style="background-color: #82ae46; color: #fff; font-size: 14px;">
										      			<th></th>
														<th></th>
														<th></th>
														<th></th>
														<th>Total Sell = </th>
														<th><?php echo @$TotalSell; ?></th>
													</tr>
										    </tbody>
										  </table>

									</div>
								</div>
							</div>
						</div>
						<?php include("include/footer.php");
}else{
	header('location:login.php');
}
?>