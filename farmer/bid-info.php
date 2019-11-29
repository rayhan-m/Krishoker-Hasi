<?php
@session_start();
if ($_SESSION['farmer_login'] == TRUE) {
$message = "";
$message1 = "";
require_once '../admin/DBManager.php';
$DBM = new DBManager();
if (isset($_POST['button'])) {
	$message = $DBM->addBid($_POST);
}
if (isset($_SESSION['message'])) {
	$message = $_SESSION['message'];
	unset($_SESSION['message']);
}
if (isset($_SESSION['message1'])) {
	$message1 = $_SESSION['message1'];
	unset($_SESSION['message1']);
}
if (isset($_GET['delete'])) {
	$bid_id = $_GET['delete'];
	$message = $DBM->deleteBid($bid_id);
}
if (isset($_GET['edit'])) {
	$bid_id = $_GET['edit'];
	$bid_id = $_GET['bid_id'];
	$editBid = $DBM->editBid($bid_id);
	$bid = mysqli_fetch_assoc($editBid);
}

$query = $DBM->viewOwnBid();

?>

  <script>
    function myFunction1() {
        var x = document.getElementById("start_price");
        if(x.value <=0){
          x.value="";
        } 
    }
    function myFunction() {
        var x = document.getElementById("quantity");
        if(x.value <=0){
          x.value="";
        } 
    }

    function myFunction2() {
    	var today = new Date();
		var dd = today.getDate();
		var mm = today.getMonth()+1; //January is 0!
		var yyyy = today.getFullYear();

		if(dd<10) {
		    dd = '0'+dd
		} 

		if(mm<10) {
		    mm = '0'+mm
		} 

		today = mm + '/' + dd + '/' + yyyy;
    	
        var date = document.getElementById("datepicker1");
        if(date.value < today){
        	alert("End Date Must be Gretter then Current Date..!");
          date.value="";          
        } 
    }
  </script>

<?php include("include/header.php"); ?>
<?php include("include/menubar.php"); ?>
<script>
	$(function () {
		$("#datepicker").datepicker({minDate: "-100Y-1M -10D", maxDate: 0});
	});
</script>
<script>
	$(function () {
		$("#datepicker1").datepicker({minDate: "-100Y-1M -10D", maxDate: 0});
	});
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
							<?php }else if($message1){?>
								<div class="alert alert-danger alert-dismissible text-center">
								  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								  <strong><?php echo $message1?>! </strong>  
								</div>
							<?php }?>
							</div>
								<div class="section__content section__content--p30">
									<div class="container-fluid">
										<h3 style="text-align:center; color: #82ae46;">Product Information</h3>
										<div class="row">
											<div class="div-action pull pull-right" style="padding-bottom:20px;">
												<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
													<i class="fas fa-plus"></i> New Bid 
												</button>
											</div>

											<div class="col-md-12">
												<table id="MyDataTable" class="table table-striped table-bordered" style="width:100%">
													<thead>
														<tr style="background-color: #CFCBCB; color: #000; font-size: 14px;">
															<th>Image</th>
															<th>Title</th>
															<th>Category Name</th>
															<th>Location</th>
															<th>Start Date</th>
															<th>End Date</th>
															<th>Start Price</th>
															<th>Quantity</th>
															<th>Action</th>
														</tr>
													</thead>
													<tbody>
														<?php
														while ($viewBid = mysqli_fetch_assoc($query)) {
															?>
															<tr>
																<td class="text-center"><?php echo "<img src='../admin/". @$viewBid['img'] . "'height='140' width='180'>"; ?>
														</td>
																<th><?php echo @$viewBid['title']; ?></th>
																<th><?php echo @$viewBid['cat_name']; ?></th>
																<th><?php echo @$viewBid['location']; ?></th>
																<th><?php echo @$viewBid['start_date']; ?></th>
																<th><?php echo @$viewBid['end_date']; ?></th>
																<th><?php echo @$viewBid['start_price']; ?></th>
																<th><?php echo @$viewBid['quantity']; ?></th>
																<td>

																	<?php 
																		date_default_timezone_set('Asia/Dhaka');
																	$current_date=date('m/d/Y');
																	
																	?>
																	<a href="editBid.php?bid_id=<?php echo $viewBid['bid_id']; ?>" class="btn  <?php if($viewBid['end_date'] < $current_date){?> disabled <?php } ?>"   title="Edit"  ><i class="fas fa-edit "></i></a> 
																	<a href="?delete=<?php echo $viewBid['bid_id']; ?>" class="btn <?php if($viewBid['end_date'] < $current_date){?> disabled <?php } ?>"  title="Delete" onclick="return confirm('Are You Sure To Delete!');"><i class="fas fa-trash-alt"></i></a>
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
						<!-- Modal -->
						<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header mod-head">
										<h2 class="mod-color " id="exampleModalLabel">Bid Information</h2>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<form action="" method="post" enctype="multipart/form-data">
											<div class="form-group">
												<label>Title/Name:</label>
												<input type="text" name="title"class="form-control" placeholder="Title/Name" required>
											</div>
											<div class="form-group">
												<label>Category  Name:</label>
												<select type="text" class="form-control" name="cat_name" required>
													<option value="">~~SELECT~~</option>
													<?php
													$connection = mysqli_connect('localhost', 'root', '', 'hasi');
													$sql = "SELECT cat_name from category";
													$result = $connection->query($sql);

													while ($row = $result->fetch_array()) {
														echo "<option value='" . $row['cat_name'] . "'>" . $row['cat_name'] . "</option>";
                                    } // while
                                    
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
								<label>Location:</label>
								<select type="text" class="form-control" name="location" required>
									<option value="">~~SELECT~~</option>
									<option value="Joypurhat">Joypurhat</option>
									<option value="Bogra">Bogra</option>
									<option value="Naogaon">Naogaon</option>
									<option value="Natore">Natore</option>
									<option value="Nawabganj">Nawabganj</option>
									<option value="Pabna">Pabna</option>
									<option value="Sirajganj">Sirajganj</option>
									<option value="Airport">Airport</option>
									<option value="Aminbazar">Aminbazar</option>
									<option value="Adabar">Adabar</option>
									<option value="Banani">Banani</option>
									<option value="Badda">Badda</option>
									<option value="Bashundhara">Bashundhara</option>
									<option value="Boshila">Boshila</option>
									<option value="Baridhara">Baridhara</option>
									<option value="Charcharia">Charcharia</option>
									<option value="Dhanmondi">Dhanmondi</option>
									<option value="Dohar">Dohar</option>
									<option value="Elenbari">Elenbari</option>
									<option value="Farmgate">Farmgate</option>
									<option value="Gulshan-1">Gulshan-1</option>
									<option value="Gabtoli">Gabtoli</option>
									<option value="Gulshan">Gulshan</option>
									<option value="Hazratpur">Hazratpur</option>
									<option value="Hazaribag">Hazaribag</option>
									<option value="Hizla">Hizla</option>
									<option value="Jatrabari">Jatrabari</option>
									<option value="Khilgaon">Khilgaon</option>
									<option value="Keraniganj">Keraniganj</option>
									<option value="Kalabagan">Kalabagan</option>
									<option value="Karwan Bazar">Karwan Bazar</option>
									<option value="Kallyanpur">Kallyanpur</option>
									<option value="Khilkhet">Khilkhet</option>
									<option value="Kakrail">Kakrail</option>
									<option value="Kafrul">Kafrul</option>
									<option value="Lalkuthi">Lalkuthi</option>
									<option value="Lalmatia">Lalmatia</option>
									<option value="Mirpur">Mirpur</option>
									<option value="Motijheel">Motijheel</option>
									<option value="Matuail">Matuail</option>
									<option value="Mohakhali DOHS">Mohakhali DOHS</option>
									<option value="Mohakhali">Mohakhali</option>
									<option value="Monipur">Monipur</option>
									<option value="Mohammadpur">Mohammadpur</option>
									<option value="Matuail">Matuail</option>
									<option value="Nawabganj">Nawabganj</option>
									<option value="Paikpara">Paikpara</option>
									<option value="Pirerbag">Pirerbag</option>
									<option value="Matuail">Matuail</option>
									<option value="Rampura">Rampura</option>
									<option value="Rayer Bazaar">Rayer Bazaar</option>
									<option value="Sujapur">Sujapur</option>
									<option value="Shyamoli">Shyamoli</option>
									<option value="Savar">Savar</option>
									<option value="Sutrapur">Sutrapur</option>
									<option value="Sher-E-Bangla">Sher-E-Bangla</option>
									<option value="Ibrahimpur">Ibrahimpur</option>
									<option value="Uttara">Uttara</option>
									<option value="Dinajpur">Dinajpur</option>
									<option value="Gaibandha">Gaibandha</option>
									<option value="Kurigram">Kurigram</option>
									<option value="Lalmonirhat">Lalmonirhat</option>
									<option value="Nilphamari">Nilphamari</option>
									<option value="Panchagarh">Panchagarh</option>
									<option value="Thakurgaon">Thakurgaon</option>
									<option value="Barguna">Barguna</option>
									<option value="Bhola">Bhola</option>
									<option value="Jhalokati">Jhalokati</option>
									<option value="Patuakhali">Patuakhali</option>
									<option value="Pirojpur">Pirojpur</option>
									<option value="Bandarban">Bandarban</option>
									<option value="Brahmanbaria">Brahmanbaria</option>
									<option value="Chandpur">Chandpur</option>
									<option value="Comilla">Comilla</option>
									<option value="Cox's Bazar">Cox's Bazar</option>
									<option value="Feni">Feni</option>
									<option value="Khagrachhari">Khagrachhari</option>
									<option value="Lakshmipur">Lakshmipur</option>
									<option value="Noakhali">Noakhali</option>
									<option value="Rangamati">Rangamati</option>
									<option value="Faridpur">Faridpur</option>
									<option value="Gazipur">Gazipur</option>
									<option value="Gopalganj">Gopalganj</option>
									<option value="Jamalpur">Jamalpur</option>
									<option value="Kishoreganj">Kishoreganj</option>
									<option value="Madaripur">Madaripur</option>
									<option value="Manikganj">Manikganj</option>
									<option value="Munshiganj">Munshiganj</option>
									<option value="Mymensingh">Mymensingh</option>
									<option value="Narayanganj">Narayanganj</option>
									<option value="Netrokona">Netrokona</option>
									<option value="Rajbari">Rajbari</option>
									<option value="Shariatpur">Shariatpur</option>
									<option value="Sherpurs">Sherpurs</option>
									<option value="Tangail">Tangail</option>
									<option value="Narsingdi">Narsingdi</option>
									<option value="Bagerhat">Bagerhat</option>
									<option value="Chuadanga">Chuadanga</option>
									<option value="Jessore">Jessore</option>
									<option value="Jhenaida">Jhenaida</option>
									<option value="Kushtia">Kushtia</option>
									<option value="Magura">Magura</option>
									<option value="Meherpur">Meherpur</option>
									<option value="Narail">Narail</option>
									<option value="Satkhira">Satkhira</option>
									<option value="Habiganj">Habiganj</option>
									<option value="Moulvibazar">Moulvibazar</option>
									<option value="Sunamganj">Sunamganj</option>
                                </select>
                            </div>
                            <div class="form-group">
                            	<label>End Date:</label>
                            	<input type="text" class="form-control" id="datepicker1" name="end_date"  onblur="myFunction2()"  placeholder="End Date" required/>
                            </div>
                            <div class="form-group">
                            	<label>Start Price/KG:</label>
                            	<input type="number" name="start_price" id="start_price" onblur="myFunction1()" class="form-control" placeholder="Enter Price" required>
                            </div>
                            <div class="form-group">
                            	<label>Quantity:</label>
                            	<input type="number" name="quantity" id="quantity" onblur="myFunction()" class="form-control" placeholder="Enter Quantity" required>
                            </div>
                            <div class="form-group">
								<label>Upload Image</label>
								<input type="file" name="fileToUpload" id="fileToUpload" required>
							</div>
                            <button type="submit" name="button" class="btn btn-primary btn-block">Submit</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                    	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <?php include("include/footer.php"); 
 }else{
	header('location:login.php');
}
?>
