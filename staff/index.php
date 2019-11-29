<?php
@session_start();
if ($_SESSION['staff_login'] == TRUE) {

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
							<!--Calender-->

							<div id='wrap'>

								<div id='calendar'></div>

								<div style='clear:both'></div>

							</div>
							<!--End Calender-->
						</div>
					</div>
				</div>
				<!-- END MAIN CONTENT-->

				<?php include("include/footer.php");
			}else{
				header('location:./login.php');
			}
			?>
