<?php
require_once('./config/dbconfig.php');
$db = new operationsadmin();

?>

<html>

<head>
	<title>Recover Password</title>
	<!-- Meta-Tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<!-- //Meta-Tags -->

	<!-- Stylesheets -->
	<link href="./assets/css/font-awesome.css" rel="stylesheet">
	<link href="./assets/css/style.css" rel='stylesheet' type='text/css' />
	<!--// Stylesheets -->

	<!--fonts-->
	<link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">
	<!--//fonts-->

</head>

<body >
	<h1 style="color:black;">Forgot Password </h1>
	<div class="w3ls-login">

		<!-- form starts here -->

		<form action="" method="POST">
        <div class="agile-field-txt" style="font-size:23px;  text-align:left;">
				<p>Enter your email to recover your password.</p>
		
			</div>
			<div class="agile-field-txt">
				<label>
					<i class="fa fa-user" style="color:black;" aria-hidden="true"></i> Email :</label>
				<input type="text" name="email" placeholder="Email" required="" />
			</div>

			<div class="w3ls-login  w3l-sub">
				<input type="submit" value="Recover" name="forgot" style="background-color:blue;">
            </div>


				<?php $db->forgotpassword();?>
            
            
		</form>
	</div>
	<!-- //form ends here -->

    <!--copyright-->
    
	<div class="copy-wthree" style="margin-top:50px;">
		<p style="color:black;">COPYRIGHT © E-COM CHATBOT SYSTEM 2020 @ DEVELOPED BY UAH DEVS </p>
	</div>
	<!--//copyright-->
</body>

</html>