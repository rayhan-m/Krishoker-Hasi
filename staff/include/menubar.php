
<!-- HEADER -->
<header class="header-desktop">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="header-wrap">    
                <div class="header-button ">
                    <div class="account-wrap">
                        <div class="account-item clearfix js-item-menu">
                            <div class="image">
                                <?php
                                $user_name=$_SESSION['user_name'];
                                $connection = mysqli_connect('localhost', 'root', '', 'hasi');
                                $sql = "SELECT * from staff WHERE user_name='$user_name'";
                                $result = $connection->query($sql);
                                $pro = mysqli_fetch_assoc($result);
                                ?>
                                <img src="../admin/<?php echo @$pro['img'];?>" /> 
                            </div>
                            <div class="content">
                                <a class="js-acc-btn" href="#"><?php echo @$pro['full_name'];?></a>
                            </div>
                            <div class="account-dropdown js-dropdown">
                                <div class="info clearfix">
                                    <div class="image" style="height: 100px; width: 100px;border-radius: 50px;margin-left: 90px;">
                                        <a href="#">
                                            <img src="../admin/<?php echo @$pro['img'];?>"/>
                                        </a>
                                    </div>
                                    <div class="content" style="margin-left: 45px;">
                                        <h5 class="name">
                                            <a href="#">Name: <?php echo @$pro['full_name'];?></a>
                                        </h5>
                                        
                                    </div>
                                </div>
                                <div class="account-dropdown__body">
                                    <div class="account-dropdown__item">
                                        <a href="user-profile.php">
                                            <i class="zmdi zmdi-account"></i>Profile</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="editProfile.php?staff_id=<?php echo $pro['staff_id']; ?>">
                                                <i class="fas fa-edit"></i>Edit Profile</a>
                                                
                                            </div>
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
                    </div>
                </div>
            </header>
    <!-- END HEADER -->