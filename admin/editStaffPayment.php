<?php 
session_start();
if ($_SESSION['admin_login'] == TRUE) {
require_once './DBManager.php';
$sp_id = $_GET['sp_id']; 
$DBM = new DBManager();
$editStaffPayment = $DBM->editStaffPayment($sp_id);
$staff_payment = mysqli_fetch_assoc($editStaffPayment);
if (isset($_POST['button'])) {
    $DBM->updateStaffPayment($_POST);
}
?>
<?php include("include/header.php"); ?>
<?php include("include/menubar.php"); ?>
<script>
	$(function () {
       $("#datepicker").datepicker({minDate: "-100Y-1M -10D", maxDate: 0});
   });
</script>
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
                                    <div class="row">
                                        <div class="col-md-8 col-md-offset-2">
                                            <div class="panel-heading ">
                                                <h3 style="text-align:center; color: #82ae46;">Edit Staff Payment Info</h3>
                                            </div> <!-- /panel-heading -->   
                                            <div class="test">
                                                <form action="" method="post" enctype="multipart/form-data">
                                                    <input type="hidden" name="sp_id" value="<?php echo $staff_payment['sp_id']; ?>" class="form-control">
                                                    <div class="form-group">
                                                      <label>Staff ID:</label>
                                                      <select type="number" class="form-control" name="staff_id" required>

                                                         <?php
                                                         $connection = mysqli_connect('localhost', 'root', '', 'hasi');
                                                         $sql = "SELECT staff_id from staff";
                                                         $result = $connection->query($sql);

                                                         while ($row = $result->fetch_array()) {
                                                            echo "<option value='" . $row['staff_id'] . "'>" . $row['staff_id'] . "</option>";
	                                    } // while
	                                    ?>
	                                    <option value="<?php if($staff_payment['staff_id'] == $row['staff_id'] ) echo "selected"; ?>"></option>
	                                </select>
	                            </div>   

                                <div class="form-group">
                                    <label>Payment Month</label>
                                    <div>
                                        <select class="form-control" name="payment_month" required>
                                            <option value="">~~SELECT~~</option>
                                            <option value="January" <?php if ($staff_payment['payment_month'] == 'January') echo "selected"; ?> >January</option>
                                            <option value="February" <?php if ($staff_payment['payment_month'] == 'February') echo "selected"; ?> >February</option>
                                            <option value="March" <?php if ($staff_payment['payment_month'] == 'March') echo "selected"; ?> >March</option>
                                            <option value="April" <?php if ($staff_payment['payment_month'] == 'April') echo "selected"; ?>>April</option>
                                            <option value="May" <?php if ($staff_payment['payment_month'] == 'May') echo "selected"; ?>>May</option>
                                            <option value="June" <?php if ($staff_payment['payment_month'] == 'June') echo "selected"; ?>>June</option>
                                            <option value="July" <?php if ($staff_payment['payment_month'] == 'July') echo "selected"; ?>>July</option>
                                            <option value="August" <?php if ($staff_payment['payment_month'] == 'August') echo "selected"; ?>>August</option>
                                            <option value="September" <?php if ($staff_payment['payment_month'] == 'September') echo "selected"; ?>>September</option>
                                            <option value="October" <?php if ($staff_payment['payment_month'] == 'October') echo "selected"; ?>>October</option>
                                            <option value="November" <?php if ($staff_payment['payment_month'] == 'November') echo "selected"; ?>>November</option>
                                            <option value="December" <?php if ($staff_payment['payment_month'] == 'December') echo "selected"; ?>>December</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Salary:</label>
                                    <input type="number" value="<?php echo $staff_payment['salary']; ?>" name="salary" class="form-control" placeholder="Salary" required>
                                </div> 
                                <button type="submit" name="button" class="btn btn-primary ">Update</button>
                                <a href="staff-payment.php" class="btn btn-secondary pull-right">Cancel</a>
                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include("include/footer.php"); 
    }else{
    header('location:login.php');
}
?>