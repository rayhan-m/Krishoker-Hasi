<?php 
session_start();
if ($_SESSION['farmer_login'] == TRUE) {
require_once '../admin/DBManager.php';
$bid_id = $_GET['bid_id']; 
$DBM = new DBManager();
$editBid = $DBM->editBid($bid_id);
$bid = mysqli_fetch_assoc($editBid);
if (isset($_POST['button'])) {
    $DBM->updateBid($_POST);
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
                            <div class="section__content section__content--p30">
                                <div class="container-fluid">
                                    <h3 style="text-align:center; color: #82ae46;">Edit Bid Info</h3>
                                    <div class="row">
                                        <div class="col-md-8 col-md-offset-2">
                                            <div class="panel-heading ">
                                            </div> <!-- /panel-heading -->   
                                            <div class="test">
                                                <form action="" method="post" enctype="multipart/form-data">
                                                   <input type="hidden" name="bid_id" value="<?php echo $bid['bid_id']; ?>" class="form-control" >
                                                   <div class="form-group">
                                                    <label>Title:</label>
                                                    <input type="text" name="title"class="form-control" placeholder="Enter Title" value="<?php echo $bid['title']; ?>" required>
                                                </div>
                                                <div class="form-group">
                                                   <label>Category Name:</label>
                                                   <select type="text" class="form-control" name="cat_name" required>
                                                      
                                                      <?php
                                                      $connection = mysqli_connect('localhost', 'root', '', 'hasi');
                                                      $sql = "SELECT cat_name from category";
                                                      $result = $connection->query($sql);

                                                      while ($row = $result->fetch_array()) {
                                                         echo "<option value='" . $row['cat_name'] . "'>" . $row['cat_name'] . "</option>";
                                    } // while
                                    ?>
                                    <option value="<?php if($bid['cat_name'] == $row['cat_name'] ) echo "selected"; ?>"></option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Start Date:</label>
                                <input type="text" class="form-control" id="datepicker" name="start_date"placeholder="Start Date" value="<?php echo $bid['start_date']; ?>" required/>
                            </div>
                            <div class="form-group">
                                <label>End Date:</label>
                                <input type="text" class="form-control" id="datepicker" name="end_date"placeholder="End Date" value="<?php echo $bid['end_date']; ?>" required/>
                            </div>
                            <div class="form-group">
                                <label>Start Price/KG:</label>
                                <input type="number" name="start_price"class="form-control" placeholder="Enter Price/KG" value="<?php echo $bid['start_price']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Quantity:</label>
                                <input type="number" name="quantity" class="form-control" placeholder="Enter quantity" value="<?php echo $bid['quantity']; ?>" required>
                            </div>                           
                            
                            <button type="submit" name="button" class="btn btn-primary ">Update</button>
                            <a href="bid-info.php" class="btn btn-secondary pull-right">Cancel</a>
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