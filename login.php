<?php
@session_start();
if (@$_SESSION['user_login'] != TRUE) {
$message = "";
if (isset($_POST['login'])) {
$user_name =$_POST['user_name'];
$password = $_POST['password'];
//echo $user_name;
$con = mysqli_connect("localhost", "root", "", "hasi");

	
	$user_name = mysqli_real_escape_string($con, $_POST['user_name']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$result = mysqli_query($con, "SELECT * FROM user WHERE user_name = '" . $user_name. "' and password = '" . $password. "'");

	
	if ($row = mysqli_fetch_array($result)) {
		$_SESSION['user_name']=$user_name;
		$_SESSION['user_login']=TRUE;
		header("Location:index.php");
	}	
	else {
        $message= 'Incorrect Username or Password!!!';
	}
}
	

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main1.css">
	<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				
				<form class="login100-form validate-form p-l-55 p-r-55 p-t-178" action="" method="post">
					
					<span class="login100-form-title">
                        <img src="images/icon/logo.png" alt="logo">
					</span>
					<?php if($message){?>
					<div>
						<h4 class="text-center" style="color: #fff;background-color: red;margin: 0px 0px 24px 0px;padding: 13px;border-radius: 18px;"><?php echo $message ?></h4>
					</div>
					<?php }?>
					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter username">
						<input class="input100" type="text" name="user_name" placeholder="Username">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Please enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
					</div>

					<div class="text-right p-t-13 p-b-23">
						
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="login">
							Sign in
						</button>
						<a href="forget-password.php" class="txt2">Forget Password?</a>
					</div>

					<div class="flex-col-c p-t-100 p-b-40">
						<a href="index.php" class="txt3">
							Home
						</a>

						<a href="registration.php" class="txt3">
							Sign up now
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	
	<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="js/main1.js"></script>

</body>
</html>
<?php
}else{
    header('location:index.php');
}
?>