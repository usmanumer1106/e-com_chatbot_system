<!-- Front-end contributed by Muhammad-Hasnat -->
<?php
session_start();

require_once('./config/dbconfig.php');
$db = new operationsuser();
$db->login();
if (isset($_SESSION["user_id"])) {
	if($_SESSION['checkout']=="1"){
		header("location:checkout.php");
	 }else{
		header("location:shope.php");
	 }
}
include('header.php');

?>

	<link href="./assets/css/font-awesome.css" rel="stylesheet">
	<link href="./assets/css/style.css" rel='stylesheet' type='text/css' />
	<link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">
	<div class="text-center">
	<h1>Login</h1>
</div>
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
				<a href="forgotpassword.php" class="w3ls-right">forgot password?</a>
				<input type="password" name="password" placeholder="Password" required="" id="myInput" />
				<div class="agile_label">
					<input id="check3" name="check3" type="checkbox" value="show password" onclick="myFunction()">
					<label class="check" for="check3">Show password</label>
                    <a href="signup.php" class="w3ls-right">Sign Up Here</a>
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
	<div style="margin-top: 50px;"></div>

<?php include('footer.php'); ?>
