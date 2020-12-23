<!-- Front-end contributed by Muhammad-Hasnat BSITF17E043 -->

<?php
require_once('./config/dbconfig.php');
$db = new operationsadmin();
$db->login();
session_start();
if (isset($_SESSION["admin_id"])) {
	header("location:index.php");
}
?>
<html>

<head>
	<title>E-COM CHATBOT SYSTEM</title>
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

<body style="margin-top:-40px; margin-bottom:-60px;">
	<h1 style="color:black;">CMS Sargodha </h1>
	<div class="w3ls-login">

		<!-- form starts here -->

		<form action="#" method="POST">
			<div class="agile-field-txt">
				<label>
					<i class="fa fa-user" style="color:black;" aria-hidden="true"></i> Email :</label>
				<input type="text" name="email" placeholder="Email" required="" />
			</div>
			<div class="agile-field-txt">
				<label>
					<i class="fa fa-lock" style="color:black;" aria-hidden="true"></i> password :</label>
				<a href="#" class="w3ls-right">forgot password?</a>
				<input type="password" name="password" placeholder="Password" required="" id="myInput" />
				<div class="agile_label">
					<input id="check3" name="check3" type="checkbox" value="show password" onclick="myFunction()">
					<label class="check" for="check3">Show password</label>
				</div>
			</div>

			<!-- script for show password -->
			<script>
				function myFunction() {
					var x = document.getElementById("myInput");
					if (x.type === "password") {
						x.type = "text";
					} else {
						x.type = "password";
					}
				}
			</script>
			<!-- //script for show password -->

			<div class="w3ls-login  w3l-sub">
				<input type="submit" value="Login" name="login" style="background-color:blue;">
			</div>
		</form>
	</div>
	<!-- //form ends here -->

	<!--copyright-->
	<div class="copy-wthree">
		<p style="color:black;">COPYRIGHT © E-COM CHATBOT SYSTEM 2020 @ DEVELOPED BY UAH DEVS </p>
	</div>
	<!--//copyright-->
</body>

</html>
