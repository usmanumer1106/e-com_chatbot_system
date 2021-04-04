<?php include('header.php');
include_once('./config/dbconfig.php');
$db = new operationsuser();
$db->Store_Record()


?>
<link href="./assets/css/font-awesome.css" rel="stylesheet">
<link href="./assets/css/style.css" rel='stylesheet' type='text/css' />
<link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">
<div class="text-center">
	<h1>Signup</h1>
</div>
<div class="w3ls-login">
	<form action="#" method="POST">
		<div class="agile-field-txt">
			<label>
				<i style="color:black;" aria-hidden="true"></i> First Name :</label>
			<input type="text" name="firstname" placeholder="First Name" required="" />
		</div>
		<div class="agile-field-txt">
			<label>
				<i style="color:black;" aria-hidden="true"></i> Last Name :</label>
			<input type="text" name="lastname" placeholder="Last Name" required="" />
		</div>
		<div class="agile-field-txt">
			<label>
				<i style="color:black;" aria-hidden="true"></i> Phone Number :</label>
			<input type="text" name="phone" placeholder="Phone Number" required="" />
		</div>
		<div class="agile-field-txt">
			<label>
				<i style="color:black;" aria-hidden="true"></i> Email :</label>
			<input type="text" name="email" placeholder="Email" required="" />
		</div>
		<div class="agile-field-txt">
			<label>
				<i style="color:black;" aria-hidden="true"></i> Address :</label>
			<textarea name="address" required="" class="form-control"> </textarea>
		</div>
		<div class="agile-field-txt">
			<label>
				<i style="color:black;" aria-hidden="true"></i> password :</label>

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
			<input type="submit" value="Signup" name="signup" style="background-color:blue;">
		</div>
	</form>
</div>
<div style="margin-top: 50px;"></div>
<?php include('footer.php') ?>