<?php include('header.php');
include_once('./config/dbconfig.php');
$db=new operationsuser();
session_start();
$id = $_SESSION['user_id'];
$result = $db->view_record_user($id);
$data = mysqli_fetch_assoc($result);
$db->Update_Record();


?>
<link href="./assets/css/font-awesome.css" rel="stylesheet">
	<link href="./assets/css/style.css" rel='stylesheet' type='text/css' />
	<link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">
<div class="text-center"> <h1>Update Account</h1></div>
<div class="w3ls-login">

		<!-- form starts here -->

		<form action="#" method="POST">
        <div class="agile-field-txt">
				<label>
					<i  style="color:black;" aria-hidden="true"></i> First Name :</label>
				<input type="text" name="firstname" placeholder="First Name" required="" value="<?php echo $data['user_firstname'] ?>" />
			</div>
            <div class="agile-field-txt">
				<label>
					<i style="color:black;" aria-hidden="true"></i> Last Name :</label>
				<input type="text" name="lastname" placeholder="Last Name" required=""  value="<?php echo $data['user_lastname'] ?>"/>
			</div>
            <div class="agile-field-txt">
				<label>
					<i  style="color:black;" aria-hidden="true"></i> Phone Number :</label>
				<input type="text" name="phone" placeholder="Phone Number" required="" value="<?php echo $data['user_phone'] ?>" />
			</div>
            <div class="agile-field-txt">
				<label>
					<i  style="color:black;" aria-hidden="true"></i> Email :</label>
				<input type="text" name="email" placeholder="Email" required="" value="<?php echo $data['user_email'] ?>" />
			</div>
            <div class="agile-field-txt">
				<label>
					<i  style="color:black;" aria-hidden="true"></i> Address :</label>
				<textarea  name="address"  required="" class="form-control" ><?php echo $data['user_address'] ?> </textarea>
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
				<input type="submit" value="Update" name="update" style="background-color:blue;">
			</div>
		</form>
	</div>
<?php include('footer.php') ?>