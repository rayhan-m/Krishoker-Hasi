<?php
		// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

@session_start();
if (@$_SESSION['user_login'] != TRUE) {
	$message = "";
	$message1 = "";

	if (isset($_POST['send'])) {
	$email=$_POST['email'];


	$connection = mysqli_connect('localhost', 'root', '', 'hasi');
	$sql = "SELECT * FROM user WHERE email='$email'";
	$query = $connection->query($sql);
	@$select = mysqli_fetch_assoc($query);

	if(@$select == ""){
		$message1= 'Incorrect Email !';
	}else{
		$u_name=$select['user_name'];
		$pass=$select['password'];

// Load Composer's autoloader
require 'admin/mailer/vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    //$mail->SMTPDebug = 2;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'hasikrishoker@gmail.com';                     // SMTP username
    $mail->Password   = 'k123456789@';                               // SMTP password
    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('hasikrishoker@gmail.com', 'Krishoker Hasi');
    $mail->addAddress($email);
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Forget Password';
    $mail->Body    = 'Your Username is = ' . $u_name .',   Password = ' . $pass;
    $mail->AltBody = 'Your Username is = ' . $u_name .',   Password = ' . $pass;

    $mail->send();
    $message = 'Mail has been sent';
} catch (Exception $e) {
    $$message= "Mail could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

	}
}
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Forget Password</title>
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
						<h4 class="text-center" style="color: #fff;background-color: green;margin: 0px 0px 24px 0px;padding: 13px;border-radius: 18px;"><?php echo $message ?></h4>
					</div>
					<?php } elseif($message1){?>
						<div>
						<h4 class="text-center" style="color: #fff;background-color: red;margin: 0px 0px 24px 0px;padding: 13px;border-radius: 18px;"><?php echo $message1 ?></h4>
					</div>
					<?php }?>
					<div class="wrap-input100 validate-input m-b-16" data-validate="">
						<input class="input100" type="email" name="email" placeholder="Please enter Email">
						<span class="focus-input100"></span>
					</div>

					<div class="text-right p-t-13 p-b-23">
						
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="send">
							Send Mail
						</button>
					</div>

					<div class="flex-col-c p-t-100 p-b-40">
						<a href="index.php" class="txt3">
							Home
						</a>

						<a href="login.php" class="txt3">
							Login
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