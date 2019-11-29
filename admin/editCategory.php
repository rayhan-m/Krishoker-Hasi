<?php 
session_start();
if ($_SESSION['admin_login'] == TRUE) {
require_once './DBManager.php';
$cat_id = $_GET['cat_id']; 
$DBM = new DBManager();
$editCat = $DBM->editCategory($cat_id);
$Cat = mysqli_fetch_assoc($editCat);
if (isset($_POST['button'])) {
    $DBM->updateCategory($_POST);
}
?>
<?php include("include/header.php"); ?>
<?php include("include/menubar.php"); ?>
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
                                                <h3 style="text-align:center; color: #82ae46;">Edit Category Info</h3>
                                            </div> <!-- /panel-heading -->   
                                            <div class="test">
                                                <form action="" method="post" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                        <input type="hidden" name="cat_id" value="<?php echo $Cat['cat_id']; ?>" class="form-control" >
                                                        
                                                        <div class="form-group">
                                                            <label>Category Name:</label>
                                                            <input type="text" name="cat_name" class="form-control" placeholder="Enter Category Name" value="<?php echo $Cat['cat_name']; ?>" required>
                                                        </div>                           
                                                     
                                                    <button type="submit" name="button" class="btn btn-primary ">Update</button>
                                                    <a href="category.php" class="btn btn-secondary pull-right">Cancel</a>
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