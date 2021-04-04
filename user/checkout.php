<?php
session_start();
if(!isset($_SESSION['cart'])){
	header('location:shope.php');
}
require_once('./config/dbconfig.php');
include_once('./config/operationscart.php');
$db = new operationsuser();
$id = $_SESSION['user_id'];
$result = $db->view_record_user($id);
$data = mysqli_fetch_assoc($result);
$db = new operationscart();
if (!$_SESSION['user_id']) {
	$_SESSION['checkout'] = "1";
	header("location:login.php");
}
unset( $_SESSION['checkout']);
include('header.php');

if (isset($_POST['order'])) {
	$chose = $_POST['dpayment'];
	if ($chose == 'cod') {
		
		$db->placeorder();
	} else {
	$_SESSION['orderdata']=array("named"=>$_POST['dname'], "phoned"=>$_POST['dphone'], "addressd"=> $_POST['daddress'], "paymentd"=>$_POST['dpayment']);
		$_SESSION['payment']="payment";
		header('location:payment2.php');
	}
}
?>
<link href="./assets/css/font-awesome.css" rel="stylesheet">
<link href="./assets/css/style.css" rel='stylesheet' type='text/css' />
<link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">
<div class="text-center">
	<h1>Checkout</h1>
</div>
<div class="w3ls-login">

	<!-- form starts here -->

	<form action="checkout.php" method="POST">
		<div class="agile-field-txt">
			<label>
				<i style="color:black;" aria-hidden="true"></i> Name :</label>
			<input type="text" name="dname" placeholder="Name" required="" value="<?php echo $data['user_firstname'] . ' ' . $data['user_lastname'] ?>" />
		</div>

		<div class="agile-field-txt">
			<label>
				<i style="color:black;" aria-hidden="true"></i> Phone Number :</label>
			<input type="text" name="dphone" placeholder="Phone Number" required="" value=" <?php echo $data['user_phone'] ?>" />
		</div>

		<div class="agile-field-txt">
			<label>
				<i style="color:black;" aria-hidden="true"></i> Address :</label>
			<textarea name="daddress" required="" class="form-control"><?php echo $data['user_address'] ?> </textarea>
		</div>
		<div class="agile-field-txt">
			<label>
				<i style="color:black;" aria-hidden="true"></i> Payment Method :</label>
			<br />
			<select name="dpayment" class="form-control">
				<option value="stripe" selected>
					Card
				</option>
				<option value="cod">
					Cash On Delivery
				</option>


			</select>

		</div>



		<div class="w3ls-login  w3l-sub">
			<input type="submit" value="Place Order" name="order" style="background-color:blue;">
		</div>
	</form>
</div>
</div>
<div style="margin-top:50px ;"></div>

<?php include('footer.php'); ?>