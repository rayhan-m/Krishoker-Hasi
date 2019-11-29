<?php
@session_start();

    $connection = mysqli_connect('localhost', 'root', '', 'hasi');
   date_default_timezone_set('Asia/Dhaka');
	$current_date=date('m/d/Y');

    $sql = "SELECT * FROM bid_board WHERE end_date>='$current_date'";
	$query = $connection->query($sql);
    ?>
<?php include("inc/header.php"); ?>
<?php include("inc/p_head.php"); ?>
<!-- DataTable-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>  

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css" rel="stylesheet" media="all">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css " rel="stylesheet" media="all">
    <!-- END nav -->
<div class="hero-wrap hero-bread" style="background-image: url('images/banner.jpg'); ">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Products List</span></p>
            <h1 class="mb-0 bread">Active Products List</h1>
          </div>
        </div>
      </div>
    </div>
 <!-- PAGE CONTAINER-->

<div style="width: 100%;

margin-left: 0;">
	<div class="row">
			<div class="col-md-2 ">
				<nav class="navbar-sidebar menu-sidebar" style="width: 250px;top: 40px;background:#fff;overflow-y: hidden; padding: 20px;">
					
				<h3 style="text-align: center; margin-bottom: 8px; font-size: 20px; background-color: #82ae46; padding: 8px 0;color:#fff;">Search by Location</h3>
				<ul class="list-unstyled navbar__list">
					
					<li class=" has-sub" style="background: #E4E4E4; border: 1px solid #FFFFFF;">
						<a class="js-arrow" href="#">
							Rajshahi <i class="far fa-plus-square" style="float: right;"></i></a>
							<ul class="list-unstyled navbar__sub-list js-sub-list ">
								<li><a
					href="search-product.php?location=Joypurhat"><span class="glyphicon glyphicon-ok-sign"></span>Joypurhat</a></li>
								<li><a
									href="search-product.php?location=Bogra"><span
													class="glyphicon glyphicon-ok-sign"></span>Bogra</a></li>
								<li><a
									href="search-product.php?location=Naogaon"><span
													class="glyphicon glyphicon-ok-sign"></span>Naogaon</a></li>
								<li><a
									href="search-product.php?location=Natore"><span
													class="glyphicon glyphicon-ok-sign"></span>Natore</a></li>
								<li><a
									href="search-product.php?location=Nawabganj"><span
													class="glyphicon glyphicon-ok-sign"></span>Nawabganj</a></li>

								<li><a
									href="search-product.php?location=Pabna"><span
													class="glyphicon glyphicon-ok-sign"></span>Pabna</a></li>
								<li><a
									href="search-product.php?location=Sirajganj"><span
													class="glyphicon glyphicon-ok-sign"></span>Sirajganj</a></li>
							</ul>
					</li>
					<li class=" has-sub" style="background: #E4E4E4; border: 1px solid #FFFFFF;">
						<a class="js-arrow" href="#">
							Dhaka City<i class="far fa-plus-square" style="float: right;"></i></a>
							<ul class="list-unstyled navbar__sub-list js-sub-list">
								<li><a
												href="search-product.php?location=Airport"><span
													class="glyphicon glyphicon-ok-sign"></span> Airport</a></li>
											<li><a
												href="search-product.php?location=Aminbazar"><span
													class="glyphicon glyphicon-ok-sign"></span> Aminbazar</a></li>
											<li><a
												href="search-product.php?location=Adabar"><span
													class="glyphicon glyphicon-ok-sign"></span> Adabar</a></li>
											<li><a
												href="search-product.php?location=Banani"><span
													class="glyphicon glyphicon-ok-sign"></span> Banani</a></li>
											<li><a
												href="search-product.php?location=Badda"><span
													class="glyphicon glyphicon-ok-sign"></span> Badda</a></li>

											<li><a
												href="search-product.php?location=Bashundhara"><span
													class="glyphicon glyphicon-ok-sign"></span> Bashundhara</a></li>
											<li><a
												href="search-product.php?location=Boshila"><span
													class="glyphicon glyphicon-ok-sign"></span> Boshila</a></li>

											<li><a
												href="search-product.php?location=Baridhara"><span
													class="glyphicon glyphicon-ok-sign"></span> Baridhara</a></li>

											<li><a
												href="search-product.php?location=Charcharia"><span
													class="glyphicon glyphicon-ok-sign"></span> Charcharia</a></li>

											<li><a
												href="search-product.php?location=Dhanmondi"><span
													class="glyphicon glyphicon-ok-sign"></span> Dhanmondi</a></li>

											<li><a
												href="search-product.php?location=Dohar"><span
													class="glyphicon glyphicon-ok-sign"></span> Dohar</a></li>

											<li><a
												href="search-product.php?location=Elenbari"><span
													class="glyphicon glyphicon-ok-sign"></span> Elenbari</a></li>

											<li><a
												href="search-product.php?location=Farmgate"><span
													class="glyphicon glyphicon-ok-sign"></span> Farmgate</a></li>

											<li><a
												href="search-product.php?location=Gulshan-1"><span
													class="glyphicon glyphicon-ok-sign"></span> Gulshan-1</a></li>

											<li><a
												href="search-product.php?location=Gabtoli"><span
													class="glyphicon glyphicon-ok-sign"></span> Gabtoli</a></li>
											<li><a
												href="search-product.php?location=Gulshan"><span
													class="glyphicon glyphicon-ok-sign"></span> Gulshan</a></li>

											<li><a
												href="search-product.php?location=Hazratpur"><span
													class="glyphicon glyphicon-ok-sign"></span> Hazratpur</a></li>

											<li><a
												href="search-product.php?location=Hazaribag"><span
													class="glyphicon glyphicon-ok-sign"></span> Hazaribag</a></li>

											<li><a
												href="search-product.php?location=Hizla"><span
													class="glyphicon glyphicon-ok-sign"></span> Hizla</a></li>

											<li><a
												href="search-product.php?location=Jatrabari"><span
													class="glyphicon glyphicon-ok-sign"></span> Jatrabari</a></li>

											<li><a
												href="search-product.php?location=Khilgaon"><span
													class="glyphicon glyphicon-ok-sign"></span> Khilgaon</a></li>

											<li><a
												href="search-product.php?location=Keraniganj"><span
													class="glyphicon glyphicon-ok-sign"></span> Keraniganj</a></li>

											<li><a
												href="search-product.php?location=Kalabagan"><span
													class="glyphicon glyphicon-ok-sign"></span> Kalabagan</a></li>


											<li><a
												href="search-product.php?location=Karwan Bazar"><span
													class="glyphicon glyphicon-ok-sign"></span> Karwan Bazar</a></li>

											<li><a
												href="search-product.php?location=Kallyanpur"><span
													class="glyphicon glyphicon-ok-sign"></span> Kallyanpur</a></li>

											<li><a
												href="search-product.php?location=Khilkhet"><span
													class="glyphicon glyphicon-ok-sign"></span> Khilkhet</a></li>

											<li><a
												href="search-product.php?location=Kakrail"><span
													class="glyphicon glyphicon-ok-sign"></span> Kakrail</a></li>

											<li><a
												href="search-product.php?location=Kafrul"><span
													class="glyphicon glyphicon-ok-sign"></span> Kafrul</a></li>

											<li><a
												href="search-product.php?location=Lalkuthi"><span
													class="glyphicon glyphicon-ok-sign"></span> Lalkuthi</a></li>

											<li><a
												href="search-product.php?location=Lalmatia"><span
													class="glyphicon glyphicon-ok-sign"></span> Lalmatia</a></li>

											<li><a
												href="search-product.php?location=Mirpur"><span
													class="glyphicon glyphicon-ok-sign"></span> Mirpur</a></li>

											<li><a
												href="search-product.php?location=Motijheel"><span
													class="glyphicon glyphicon-ok-sign"></span> Motijheel</a></li>

											<li><a
												href="search-product.php?location=Matuail"><span
													class="glyphicon glyphicon-ok-sign"></span> Matuail</a></li>


											<li><a
												href="search-product.php?location=Mohakhali DOHS"><span
													class="glyphicon glyphicon-ok-sign"></span> Mohakhali DOHS</a></li>

											<li><a
												href="search-product.php?location=Mohakhali"><span
													class="glyphicon glyphicon-ok-sign"></span> Mohakhali</a></li>

											<li><a
												href="search-product.php?location=Monipur"><span
													class="glyphicon glyphicon-ok-sign"></span> Monipur</a></li>

											<li><a
												href="search-product.php?location=Mohammadpur"><span
													class="glyphicon glyphicon-ok-sign"></span> Mohammadpur</a></li>

											<li><a
												href="search-product.php?location=Matuail"><span
													class="glyphicon glyphicon-ok-sign"></span> Matuail</a></li>

											<li><a
												href="search-product.php?location=Nawabganj"><span
													class="glyphicon glyphicon-ok-sign"></span> Nawabganj</a></li>

											<li><a
												href="search-product.php?location=Paikpara"><span
													class="glyphicon glyphicon-ok-sign"></span> Paikpara</a></li>

											<li><a
												href="search-product.php?location=Pirerbag"><span
													class="glyphicon glyphicon-ok-sign"></span> Pirerbag</a></li>

											<li><a
												href="search-product.php?location=Matuail"><span
													class="glyphicon glyphicon-ok-sign"></span> Matuail</a></li>

											<li><a
												href="search-product.php?location=Rampura"><span
													class="glyphicon glyphicon-ok-sign"></span> Rampura</a></li>

											<li><a
												href="search-product.php?location=Rayer Bazaar"><span
													class="glyphicon glyphicon-ok-sign"></span> Rayer Bazaar</a></li>

											<li><a
												href="search-product.php?location=Sujapur"><span
													class="glyphicon glyphicon-ok-sign"></span> Sujapur</a></li>

											<li><a
												href="search-product.php?location=Shyamoli"><span
													class="glyphicon glyphicon-ok-sign"></span> Shyamoli</a></li>

											<li><a
												href="search-product.php?location=Savar"><span
													class="glyphicon glyphicon-ok-sign"></span> Savar</a></li>

											<li><a
												href="search-product.php?location=Sutrapur"><span
													class="glyphicon glyphicon-ok-sign"></span> Sutrapur</a></li>

											<li><a
												href="search-product.php?location=Sher-E-Bangla Nagar"><span
													class="glyphicon glyphicon-ok-sign"></span> Sher-E-Bangla
													Nagar</a></li>

											<li><a
												href="search-product.php?location=Ibrahimpur"><span
													class="glyphicon glyphicon-ok-sign"></span> Ibrahimpur</a></li>

											<li><a
												href="search-product.php?location=Uttara"><span
													class="glyphicon glyphicon-ok-sign"></span> Uttara</a></li>
							</ul>
					</li>

					<li class=" has-sub" style="background: #E4E4E4; border: 1px solid #FFFFFF;">
						<a class="js-arrow" href="#">
							Rangpur <i class="far fa-plus-square" style="float: right;"></i></a>
							<ul class="list-unstyled navbar__sub-list js-sub-list ">
								<li><a
												href="search-product.php?location=Dinajpur"><span
													class="glyphicon glyphicon-ok-sign"></span> Dinajpur</a></li>
											<li><a
												href="search-product.php?location=Gaibandha"><span
													class="glyphicon glyphicon-ok-sign"></span> Gaibandha</a></li>
											<li><a
												href="search-product.php?location=Kurigram"><span
													class="glyphicon glyphicon-ok-sign"></span> Kurigram</a></li>
											<li><a
												href="search-product.php?location=Lalmonirhat"><span
													class="glyphicon glyphicon-ok-sign"></span> Lalmonirhat</a></li>
											<li><a
												href="search-product.php?location=Nilphamari"><span
													class="glyphicon glyphicon-ok-sign"></span> Nilphamari</a></li>

											<li><a
												href="search-product.php?location=Panchagarh"><span
													class="glyphicon glyphicon-ok-sign"></span> Panchagarh</a></li>
											<li><a
												href="search-product.php?location=Thakurgaon"><span
													class="glyphicon glyphicon-ok-sign"></span> Thakurgaon</a></li>
							</ul>
					</li>
					<li class=" has-sub" style="background: #E4E4E4; border: 1px solid #FFFFFF;">
						<a class="js-arrow" href="#">
							Barisal <i class="far fa-plus-square" style="float: right;"></i></a>
							<ul class="list-unstyled navbar__sub-list js-sub-list ">
								<li><a
												href="search-product.php?location=Barguna"><span
													class="glyphicon glyphicon-ok-sign"></span> Barguna</a></li>
											<li><a
												href="search-product.php?location=Bhola"><span
													class="glyphicon glyphicon-ok-sign"></span> Bhola</a></li>
											<li><a
												href="search-product.php?location=Jhalokati"><span
													class="glyphicon glyphicon-ok-sign"></span> Jhalokati</a></li>
											<li><a
												href="search-product.php?location=Patuakhali"><span
													class="glyphicon glyphicon-ok-sign"></span> Patuakhali</a></li>
											<li><a
												href="search-product.php?location=Pirojpur"><span
													class="glyphicon glyphicon-ok-sign"></span> Pirojpur</a></li>

							</ul>
					</li>

					<li class=" has-sub" style="background: #E4E4E4; border: 1px solid #FFFFFF;">
						<a class="js-arrow" href="#">
							Chittagong <i class="far fa-plus-square" style="float: right;"></i></a>
							<ul class="list-unstyled navbar__sub-list js-sub-list ">
								<li><a
												href="search-product.php?location=Bandarban"><span
													class="glyphicon glyphicon-ok-sign"></span> Bandarban</a></li>
											<li><a
												href="search-product.php?location=Brahmanbaria"><span
													class="glyphicon glyphicon-ok-sign"></span> Brahmanbaria</a></li>
											<li><a
												href="search-product.php?location=Chandpur"><span
													class="glyphicon glyphicon-ok-sign"></span> Chandpur</a></li>
											<li><a
												href="search-product.php?location=Comilla"><span
													class="glyphicon glyphicon-ok-sign"></span> Comilla</a></li>
											<li><a
												href="search-product.php?location=Cox's Bazar"><span
													class="glyphicon glyphicon-ok-sign"></span> Cox's Bazar</a></li>
											<li><a href="search-product.php?location=Feni"><span
													class="glyphicon glyphicon-ok-sign"></span> Feni</a></li>

											<li><a
												href="search-product.php?location=Khagrachhari"><span
													class="glyphicon glyphicon-ok-sign"></span> Khagrachhari</a></li>

											<li><a
												href="search-product.php?location=Lakshmipur"><span
													class="glyphicon glyphicon-ok-sign"></span> Lakshmipur</a></li>
											<li><a
												href="search-product.php?location=Noakhali"><span
													class="glyphicon glyphicon-ok-sign"></span> Noakhali</a></li>
											<li><a
												href="search-product.php?location=Rangamati"><span
													class="glyphicon glyphicon-ok-sign"></span> Rangamati</a></li>

							</ul>
					</li>
					<li class=" has-sub" style="background: #E4E4E4; border: 1px solid #FFFFFF;">
						<a class="js-arrow" href="#">
							Dhaka <i class="far fa-plus-square" style="float: right;"></i></a>
							<ul class="list-unstyled navbar__sub-list js-sub-list ">
								<li><a
												href="search-product.php?location=Faridpur"><span
													class="glyphicon glyphicon-ok-sign"></span> Faridpur</a></li>
											<li><a
												href="search-product.php?location=Gazipur"><span
													class="glyphicon glyphicon-ok-sign"></span> Gazipur</a></li>
											<li><a
												href="search-product.php?location=Gopalganj"><span
													class="glyphicon glyphicon-ok-sign"></span> Gopalganj </a></li>
											<li><a
												href="search-product.php?location=Jamalpur"><span
													class="glyphicon glyphicon-ok-sign"></span> Jamalpur</a></li>
											<li><a
												href="search-product.php?location=Kishoreganj"><span
													class="glyphicon glyphicon-ok-sign"></span> Kishoreganj</a></li>

											<li><a
												href="search-product.php?location=Madaripur"><span
													class="glyphicon glyphicon-ok-sign"></span> Madaripur</a></li>
											<li><a
												href="search-product.php?location=Manikganj"><span
													class="glyphicon glyphicon-ok-sign"></span> Manikganj</a></li>
											<li><a
												href="search-product.php?location=Munshiganj"><span
													class="glyphicon glyphicon-ok-sign"></span> Munshiganj</a></li>
											<li><a
												href="search-product.php?location=Mymensingh"><span
													class="glyphicon glyphicon-ok-sign"></span> Mymensingh</a></li>

											<li><a
												href="search-product.php?location=Narayanganj"><span
													class="glyphicon glyphicon-ok-sign"></span> Narayanganj</a></li>
											<li><a
												href="search-product.php?location=Netrokona"><span
													class="glyphicon glyphicon-ok-sign"></span> Netrokona</a></li>
											<li><a
												href="search-product.php?location=Rajbari"><span
													class="glyphicon glyphicon-ok-sign"></span> Rajbari</a></li>
											<li><a
												href="search-product.php?location=Shariatpur"><span
													class="glyphicon glyphicon-ok-sign"></span> Shariatpur</a></li>
											<li><a
												href="search-product.php?location=Sherpurs"><span
													class="glyphicon glyphicon-ok-sign"></span> Sherpurs</a></li>
											<li><a
												href="search-product.php?location=Tangail"><span
													class="glyphicon glyphicon-ok-sign"></span> Tangail</a></li>
											<li><a
												href="search-product.php?location=Narsingdi"><span
													class="glyphicon glyphicon-ok-sign"></span> Narsingdi</a></li>

							</ul>
					</li>
					<li class=" has-sub" style="background: #E4E4E4; border: 1px solid #FFFFFF;">
						<a class="js-arrow" href="#">
							Khulna <i class="far fa-plus-square" style="float: right;"></i></a>
							<ul class="list-unstyled navbar__sub-list js-sub-list ">
								<li><a
												href="search-product.php?location=Bagerhat"><span
													class="glyphicon glyphicon-ok-sign"></span> Bagerhat</a></li>
											<li><a
												href="search-product.php?location=Chuadanga"><span
													class="glyphicon glyphicon-ok-sign"></span> Chuadanga</a></li>

											<li><a
												href="search-product.php?location=Jessore"><span
													class="glyphicon glyphicon-ok-sign"></span> Jessore</a></li>
											<li><a
												href="search-product.php?location=Jhenaida"><span
													class="glyphicon glyphicon-ok-sign"></span> Jhenaida</a></li>
											<li><a
												href="search-product.php?location=Kushtia"><span
													class="glyphicon glyphicon-ok-sign"></span> Kushtia</a></li>
											<li><a
												href="search-product.php?location=Magura"><span
													class="glyphicon glyphicon-ok-sign"></span> Magura</a></li>
											<li><a
												href="search-product.php?location=Meherpur"><span
													class="glyphicon glyphicon-ok-sign"></span> Meherpur</a></li>
											<li><a
												href="search-product.php?location=Narail"><span
													class="glyphicon glyphicon-ok-sign"></span> Narail</a></li>
											<li><a
												href="search-product.php?location=Satkhira"><span
													class="glyphicon glyphicon-ok-sign"></span> Satkhira</a></li>

							</ul>
					</li>
					<li class=" has-sub" style="background: #E4E4E4; border: 1px solid #FFFFFF;">
						<a class="js-arrow" href="#">
							Sylhet <i class="far fa-plus-square" style="float: right;"></i></a>
							<ul class="list-unstyled navbar__sub-list js-sub-list ">
								<li><a href="search-product.php?location=Habiganj"><span
									class="glyphicon glyphicon-ok-sign"></span> Habiganj</a></li>
							<li><a
								href="search-product.php?location=Moulvibazar"><span
									class="glyphicon glyphicon-ok-sign"></span> Moulvibazar</a></li>
							<li><a
								href="search-product.php?location=Sunamganj"><span
									class="glyphicon glyphicon-ok-sign"></span> Sunamganj</a></li>

							</ul>
					</li>
				</ul>
				<h3 style="text-align: center; margin: 8px 0px; font-size: 20px; background-color: #82ae46; padding: 8px 0;color:#fff;">Search by Status</h3>
				
				<ul class="list-unstyled navbar__list">
					<li style="background: #E4E4E4; border: 1px solid #FFFFFF;">
						<a  href="search-active-product.php"><i class="fas fa-check-circle"></i>Active</a>
					</li>
					<li style="background: #E4E4E4; border: 1px solid #FFFFFF;">
						<a href="search-expaired-product.php"><i class="fas fa-ban"></i>Expaired</a>
					</li>
				</ul>
			</nav>
			</div>
			<div class="col-md-10" style="padding: 20px 16px 0px 32px;">
				<table id="MyDataTable" class="table table-striped">
					<thead class="text-center">
						<tr style="background-color: #E4E4E4; color: #fff;">
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody class="text-center">
						<?php
		                while ($viewBid = mysqli_fetch_assoc($query)) {
		                ?>
						<tr >
							<td class="text-center"><?php echo "<img src='./admin/". @$viewBid['img'] . "'height='70' width='140'>"; ?>
												</td>
							<td>Name: <?php echo @$viewBid['title']; ?></td>
							<td>Category: <?php echo @$viewBid['cat_name']; ?></td>
							<td>Location: <?php echo @$viewBid['location']; ?></td>
							<td>Price: <?php echo @$viewBid['start_price']; ?></td>
							<td class="text-center">
								<a href="bidding.php?bid_id=<?php echo $viewBid['bid_id']; ?>" class="btn btn-success"   title="View Details" ><i class="fas fa-eye"></i> View Details</a>
								<?php
								date_default_timezone_set('Asia/Dhaka');
								$current_date=date('m/d/Y');
								if($viewBid['end_date'] >= $current_date){
								?>
								<p>Status: Active</p> 
							<?php }else{?>
								<p>Status: Expaired</p> 
							<?php }?>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<?php include("inc/footer.php"); ?>
    
