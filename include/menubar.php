<?php @session_start();?>
<!-- HEADER -->
<header class="header-desktop">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="header-wrap">
                <li class="nav-item"><a href="index.php" class="nav-link" style="color: #000;">Home</a></li>
                <li class="nav-item"><a href="product.php" class="nav-link"style="color: #000;">Products</a></li>
                <li class="nav-item"><a href="about.php" class="nav-link"style="color: #000;">About</a></li>
                <li class="nav-item"><a href="blog.php" class="nav-link"style="color: #000;">Blog</a></li>
                <li class="nav-item"><a href="contact.php" class="nav-link"style="color: #000;">Contact</a></li>
                <?php if (@$_SESSION['user_login'] == TRUE) {?>
                <div class="header-button ">
                    <div class="account-wrap">
                        <div class="account-item clearfix js-item-menu">
                            <div class="image">
                                <?php
                                    $user_name=$_SESSION['user_name'];
                                    $connection = mysqli_connect('localhost', 'root', '', 'hasi');
                                    $sql = "SELECT * from user WHERE user_name='$user_name'";
                                    $result = $connection->query($sql);
                                    $pro = mysqli_fetch_assoc($result);
                                    
                                ?>
                                <img src="<?php echo @$pro['img'];?>"  />
                                
                            </div>
                            <div class="content">
                                <a class="js-acc-btn" href="#"><?php echo @$pro['user_name'];?></a>
                            </div>
                            <div class="account-dropdown js-dropdown">
                                <div class="info clearfix">
                                    <div class="image">
                                        <a href="#">
                                            <img src="<?php echo @$pro['img'];?>"/>
                                        </a>
                                    </div>
                                    <div class="content">
                                        <h5 class="name">
                                            Name: <a href="#"><?php echo @$pro['user_name'];?></a><br/>
                                            Email:<a href="#"><?php echo @$pro['email'];?></a>
                                        </h5>
                                        
                                    </div>
                                </div>
                                <div class="account-dropdown__body">
                                    <div class="account-dropdown__item">
                                        <a href="profile.php">
                                            <i class="zmdi zmdi-account"></i>Profile</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="editUserProfile.php?user_id=<?php echo $pro['user_id']; ?>"">
                                                <i class="fas fa-edit"></i>Edit Profile</a>
                                            </div>
                                            <div class="account-dropdown__item">
                                        <a  href="previous-history.php"><i class="fas fa-th"></i>Previous History</a>
                                        </div>
                                            <div class="account-dropdown__footer">
                                                <a href="logout.php">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php }?>
                        </div>
                    </div>
                </header>
            <!-- END HEADER -->