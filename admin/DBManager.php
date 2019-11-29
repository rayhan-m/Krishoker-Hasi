<?php
class DBManager {

    protected $connection;
    public function __construct() {
        $this->connection = mysqli_connect('localhost', 'root', '', 'hasi');
        if (!$this->connection) {
            die('Connection fail' . mysql_error($this->connection));
        }
    }

    //category//
    public function addCategory($data) {
        
        $sql = "INSERT INTO category (cat_name)VALUES ('$data[cat_name]')";
        if (mysqli_query($this->connection, $sql)) {
            $message = 'Added Successflly';
            return $message;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }

    public function viewCategory() {
        $sql = "SELECT * FROM category ";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function deleteCategory($cat_id) {
        $sql = "DELETE FROM category WHERE cat_id='$cat_id'";
        if (mysqli_query($this->connection, $sql)) {
            $message1 = 'Category Delete Successfully';
            return $message1;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function editCategory($cat_id) {
        $sql = "SELECT * FROM category WHERE cat_id='$cat_id'";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function updateCategory($data) {
        
        $sql = "UPDATE category SET cat_name = '$data[cat_name]' WHERE cat_id='$data[cat_id]'";
        if (mysqli_query($this->connection, $sql)) {
            session_start();
            $_SESSION['message'] = 'Update Successfully';
            header('location:category.php');
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    //End category//

    //Staff//
    public function addStaff($data) {
        $status="free";
        $sql = "INSERT INTO staff (full_name,user_name,password,phn_no,status)VALUES ('$data[full_name]','$data[user_name]','$data[password]','$data[phn_no]','$status')";
        if (mysqli_query($this->connection, $sql)) {
            $message = 'Added Successflly';
            return $message;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }

    public function viewStaff() {
        $sql = "SELECT * FROM staff ";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function deleteStaff($staff_id) {
        $sql = "DELETE FROM staff WHERE staff_id='$staff_id'";
        if (mysqli_query($this->connection, $sql)) {
            $message1 = 'Staff Delete Successfully';
            return $message1;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }

    //end Staff//


    //Staff Payment//
    public function addStaffPayment($data) {
        date_default_timezone_set('Asia/Dhaka');
        $payment_date=date('m/d/Y');
        $status='Pending';
        $sql = "INSERT INTO staff_payment (staff_id,payment_date,payment_month,salary,status) VALUES ('$data[staff_id]','$payment_date','$data[payment_month]','$data[salary]','$status')";
        if (mysqli_query($this->connection, $sql)) {
            $message = 'Successflly Added';
            return $message;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }

    public function viewStaffPayment() {
        $sql = "SELECT * FROM staff_payment";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }

    public function editStaffPayment($sp_id) {
        $sql = "SELECT * FROM staff_payment WHERE sp_id='$sp_id'";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }

    public function updateStaffPayment($data) {
        date_default_timezone_set('Asia/Dhaka');
        $payment_date=date('m/d/Y');

        $sql = "UPDATE staff_payment SET staff_id = '$data[staff_id]',payment_date = '$payment_date',payment_month = '$data[payment_month]',salary = '$data[salary]'  WHERE sp_id='$data[sp_id]'";
        if (mysqli_query($this->connection, $sql)) {
            session_start();
            $_SESSION['message'] = 'Update Successfully';
            header('location:staff-payment.php');
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    //End Staff Payment//

    //Staff Profile//
    public function editProfile($staff_id) {
        $sql = "SELECT * FROM staff WHERE staff_id='$staff_id'";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }

    public function updateProfile($data) {

    	$name = str_replace(" ", "_", $_FILES['fileToUpload'] ['name']);
        $temp = $_FILES['fileToUpload'] ['tmp_name'];
        move_uploaded_file($temp, "../admin/images" . $name);
        $url = "images". $name;

        $sql = "UPDATE staff SET full_name = '$data[full_name]',password = '$data[password]',phn_no = '$data[phn_no]',nid_no = '$data[nid_no]',address = '$data[address]',img = '$url' WHERE staff_id='$data[staff_id]'";
        if (mysqli_query($this->connection, $sql)) {
            header('location:user-profile.php');
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
//End Staff Profile//

        //Delivery//
    public function addDelivery($data) {
        $status="Pending";
        $approve="1";

        $sql = "INSERT INTO delivery (sell_id,staff_id,vehicle_id,status,approve)VALUES ('$data[sell_id]','$data[staff_id]','$data[vehicle_id]','$status','$approve')";
        if (mysqli_query($this->connection, $sql)) {
            $message = 'Added Successflly';
            header('location:delivery-report.php');
            return $message;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }

    public function viewDelivery() {
        $sql = "SELECT * FROM delivery ";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function deleteDelivery($delivery_id) {
        $sql = "DELETE FROM delivery WHERE delivery_id='$delivery_id'";
        if (mysqli_query($this->connection, $sql)) {
            $message1 = 'Delete Successfully';
            return $message1;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }

    //end Delivery//

    //Vehicle//
    public function addVehicle($data) {
        
        $name = str_replace(" ", "_", $_FILES['fileToUpload'] ['name']);
        $temp = $_FILES['fileToUpload'] ['tmp_name'];
        move_uploaded_file($temp, "upload/" . $name);
        $url = "upload/$name";
        $status="free";

        $sql = "INSERT INTO vehicle (type,license,weight,img,status)VALUES ('$data[type]','$data[license]','$data[weight]','$url','$status')";
        if (mysqli_query($this->connection, $sql)) {
            $message = 'Added Successflly';
            return $message;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }

    public function viewVehicle() {
        $sql = "SELECT * FROM vehicle ";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function deleteVehicle($vehicle_id) {
        $sql = "DELETE FROM vehicle WHERE vehicle_id='$vehicle_id'";
        if (mysqli_query($this->connection, $sql)) {
            $message1 = 'Vehicle Delete Successfully';
            return $message1;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }

    //end Vehicle//

    //Bid//
    public function addBid($data) {
        date_default_timezone_set('Asia/Dhaka');
        $start_date=date('m/d/Y');
        @session_start();
        $u_name=$_SESSION['user_name'];

        $name = str_replace(" ", "_", $_FILES['fileToUpload'] ['name']);
        $temp = $_FILES['fileToUpload'] ['tmp_name'];
        move_uploaded_file($temp, "../admin/upload/" . $name);
        $url = "upload/$name";

        $sql = "INSERT INTO bid_board (title, cat_name,location, start_date, end_date, start_price, quantity,u_name,img)VALUES ('$data[title]','$data[cat_name]','$data[location]','$start_date','$data[end_date]','$data[start_price]','$data[quantity]','$u_name','$url')";
        if (mysqli_query($this->connection, $sql)) {
            $message = 'Added Successflly';
            return $message;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }   
    }

    public function viewBid() {
        $sql = "SELECT * FROM bid_board ORDER BY bid_id DESC";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function viewOwnBid() {
        @session_start();
        $u_name=$_SESSION['user_name'];
        $sql = "SELECT * FROM bid_board WHERE u_name='$u_name' ORDER BY bid_id DESC";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function viewIndBid($bid_id) {
        $sql = "SELECT * FROM bid_board WHERE bid_id='$bid_id' order by bid_id DESC";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function deleteBid($bid_id) {
        $sql = "DELETE FROM bid_board WHERE bid_id='$bid_id'";
        if (mysqli_query($this->connection, $sql)) {
            $message1 = 'Delete Successfully';
            return $message1;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function editBid($bid_id) {
        $sql = "SELECT * FROM bid_board WHERE bid_id='$bid_id'";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function updateBid($data) {
        $sql = "UPDATE bid_board SET title = '$data[title]',cat_name = '$data[cat_name]',start_date = '$data[start_date]',end_date = '$data[end_date]',start_price = '$data[start_price]',quantity = '$data[quantity]' WHERE bid_id='$data[bid_id]'";
        if (mysqli_query($this->connection, $sql)) {
            session_start();
            $_SESSION['message'] = 'Update Successfully';
            header('location:bid-board.php');
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    //End Bid//

    //Comments//
    public function addComments($data) {
        date_default_timezone_set('Asia/Dhaka');
        $date=date('m/d/Y');
        $time=date('h:i:s a');
        @session_start();
        $user_name=$_SESSION['user_name'];
        $sql = "INSERT INTO comments (user_name, bid_id, price, date, time)VALUES ('$user_name','$data[bid_id]','$data[price]','$date','$time')";
        if (mysqli_query($this->connection, $sql)) {
            $message = 'Added Successflly';
            return $message;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }   
    }
    
    public function viewComments() {
        $sql = "SELECT bb.bid_id, price FROM bid_board as bb, comments as c WHERE bb.bid_id=c.bid_id";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    //End Comments//

    // User Register//
    public function addUser($data) {
        $name = str_replace(" ", "_", $_FILES['fileToUpload'] ['name']);
        $temp = $_FILES['fileToUpload'] ['tmp_name'];
        move_uploaded_file($temp, "admin/upload/" . $name);
        $url = "admin/upload/$name";

        $sql = "INSERT INTO user (fname, lname, user_name, password, email, phn_no,nid, address, img)VALUES ('$data[first_name]','$data[last_name]','$data[user_name]','$data[password]','$data[email]','$data[phn_no]','$data[nid]','$data[address]','$url')";
        if (mysqli_query($this->connection, $sql)) {
            session_start();
            $_SESSION['message'] = 'Register Successfully';
            header('location:login.php');
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }   
    }
    // End User Register//
        //User Profile//
    public function editUserProfile($user_id) {
        $sql = "SELECT * FROM user WHERE user_id='$user_id'";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }

    public function updateUserProfile($data) {

        $name = str_replace(" ", "_", $_FILES['fileToUpload'] ['name']);
        $temp = $_FILES['fileToUpload'] ['tmp_name'];
        move_uploaded_file($temp, "admin/upload/" . $name);
        $url = "admin/upload/$name";

        $sql = "UPDATE user SET fname = '$data[first_name]',lname = '$data[last_name]',password = '$data[password]',email = '$data[email]',phn_no = '$data[phn_no]', nid = '$data[nid]',address = '$data[address]',img = '$url' WHERE user_id='$data[user_id]'";
        if (mysqli_query($this->connection, $sql)) {
            $_SESSION['message'] = 'Updated Successfully';
            header('location:profile.php');
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
//End User Profile//

    // Farmer Register//
    public function addFarmer($data) {
        $name = str_replace(" ", "_", $_FILES['fileToUpload'] ['name']);
        $temp = $_FILES['fileToUpload'] ['tmp_name'];
        move_uploaded_file($temp, "../admin/upload/" . $name);
        $url = "../admin/upload/$name";

        $sql = "INSERT INTO farmer (fname, lname, user_name, password, email, phn_no,nid, address, img)VALUES ('$data[first_name]','$data[last_name]','$data[user_name]','$data[password]','$data[email]','$data[phn_no]','$data[nid]','$data[address]','$url')";
        if (mysqli_query($this->connection, $sql)) {
            session_start();
            $_SESSION['message'] = 'Register Successfully';
            header('location:login.php');
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }   
    }
        //Farmer Profile//
    public function editFarmerProfile($farmer_id) {
        $sql = "SELECT * FROM farmer WHERE farmer_id='$farmer_id'";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }

    public function updateFarmerProfile($data) {

        $name = str_replace(" ", "_", $_FILES['fileToUpload'] ['name']);
        $temp = $_FILES['fileToUpload'] ['tmp_name'];
        move_uploaded_file($temp, "../admin/upload/" . $name);
        $url = "../admin/upload/$name";

        $sql = "UPDATE farmer SET fname = '$data[first_name]',lname = '$data[last_name]',password = '$data[password]',email = '$data[email]',phn_no = '$data[phn_no]', nid = '$data[nid]',address = '$data[address]',img = '$url' WHERE farmer_id='$data[farmer_id]'";
        if (mysqli_query($this->connection, $sql)) {
            header('location:profile.php');
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
//End Farmer Profile//
    //Owner Profile//
    public function editOwnerProfile($admin_id) {
        $sql = "SELECT * FROM admin WHERE admin_id='$admin_id'";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }

    public function updateOwnerProfile($data) {

        $name = str_replace(" ", "_", $_FILES['fileToUpload'] ['name']);
        $temp = $_FILES['fileToUpload'] ['tmp_name'];
        move_uploaded_file($temp, "upload/" . $name);
        $url = "upload/$name";

        $sql = "UPDATE admin SET full_name = '$data[Full_name]',password = '$data[password]',img = '$url' WHERE admin_id='$data[admin_id]'";
        if (mysqli_query($this->connection, $sql)) {
            header('location:profile.php');
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
//End Owner Profile//
// Customer//
    public function viewCustomer() {
        $sql = "SELECT * FROM user";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    //end customer

    //Select Sell//
    public function Select($data) {
        
        $sql = "SELECT * FROM comments as c, bid_board as bb WHERE price=(SELECT MAX(price) FROM comments WHERE bid_id='$data' AND c.bid_id=bb.bid_id)";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }

    public function sellProduct($data) {
        date_default_timezone_set('Asia/Dhaka');
        $date=date('m/d/Y');
        $total1=0;
        $total1=($data['price'] * $data['quantity']);
        $payment_status="Pending";
        $status="1";
        $sql = "INSERT INTO sell (bid_id,title,price,quantity,total,sold_to,sold_by,date,payment_status,status)VALUES ('$data[bid_id]','$data[title]','$data[price]','$data[quantity]','$total1','$data[sold_to]','$data[sold_by]','$date','$payment_status','$status')";
        if (mysqli_query($this->connection, $sql)) {
            session_start();
            $_SESSION['message'] = 'Added Successfully';
            header('location:sell-product.php');
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }


    public function editSellProduct($sell_id) {
        $sql = "SELECT * FROM sell WHERE sell_id='$sell_id'";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }

    public function updateSellProduct($data) {
        $total=0;
        $total=($data['price'] * $data['quantity']);
        $sql = "UPDATE sell SET quantity = '$data[quantity]', total='$total' WHERE sell_id='$data[sell_id]'";
        if (mysqli_query($this->connection, $sql)) {
            session_start();
            $_SESSION['message'] = 'Product Sell Update Successfully';
            header('location:sell-product.php');
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }

    public function viewSell() {
        $sql = "SELECT * FROM sell ";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function viewIndSell() {
        $user_name=$_SESSION['user_name'];
        $sql = "SELECT * FROM sell as s, delivery as d Where s.sold_by='$user_name' AND d.sell_id=s.sell_id";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function deleteSell($sell_id) {
        $sql = "DELETE FROM sell WHERE sell_id='$sell_id'";
        if (mysqli_query($this->connection, $sql)) {
            $message1 = 'Delete Successfully';
            return $message1;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function editSell($sell_id) {
        $sql = "SELECT * FROM sell_fish WHERE sell_id='$sell_id'";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }

    //End Select Sell//

    //Blog //
        public function addPost($data) {
        date_default_timezone_set('Asia/Dhaka');
        $date=date('m/d/Y');
        $name = str_replace(" ", "_", $_FILES['fileToUpload'] ['name']);
        $temp = $_FILES['fileToUpload'] ['tmp_name'];
        move_uploaded_file($temp, "upload/" . $name);
        $url = "upload/$name";
        $user_name=$_SESSION['user_name'];
        $sql = "INSERT INTO blog (img,date,user_name, title,description)VALUES ('$url','$date','$user_name','$data[title]','$data[description]')";
        if (mysqli_query($this->connection, $sql)) {
            $message = 'Posted Successflly';
            return $message;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }

    public function viewPost() {
        $sql = "SELECT * FROM blog ";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function deletePost($blog_id) {
        $sql = "DELETE  FROM blog WHERE blog_id='$blog_id'";
        if (mysqli_query($this->connection, $sql)) {
            $message = 'Post Delete Successfully';
            return $message;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }

}