<?php
session_start();
if(!isset($_SESSION['payment'])){
header('location:shope.php');
}
include('header.php');
require_once "./config/dbconfig.php";
include_once('./config/operationscart.php');
$db = new operationscart();
if (!empty($_POST["token"])) {

    $total = 0;
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $id => $CartData) {
            $price=$CartData['price']*$CartData['quantity'];
            $total = $total + $price;
        }
    }



    $token = $_POST['token'];
    $name = $_POST['name'];
    $email = $_SESSION['user_email'];
    $cardnum = $_POST['card-number'];
    $cvc = $_POST['cvc'];
    $exp_month = $_POST['month'];
    $exp_year = $_POST['year'];
    require_once "./stripe/init.php";

    $stripe = array(
        "secret_key" => "sk_test_51IJdYjAlIIaUhud0ZDz3EX88ArrUGikX62bDUoe5YuwEATTp8cUwJrKzJ1owgIucYR5tGEI2j6sbPRCSnRZ9I55I004TD9Pniy",
        "publishable_key" => "pk_test_51IJdYjAlIIaUhud01X28RJytb7qQf8Uft4plcLs1lEZMOCdZPpql8OG5wkdSNWznCS1e8PUY0B6Z7Ixp2sdnqzsN00tLTZYsyQ"
    );

    \Stripe\Stripe::setApiKey($stripe['secret_key']);

    $customer = \Stripe\Customer::create(array(
        'email' => $email,
        'source' => $token,
        'name' => $name,
        'description' => 'xyz description'

    ));


    $pro_Price = $total;


    $charge = \Stripe\Charge::create(array(
        'customer' => $customer->id,
        'amount' => $pro_Price * 100,
        'currency' => "pkr"

    ));

    $chargeJson = $charge->jsonSerialize();

    if ($chargeJson['amount_refunded'] == 0 && empty($chargeJson['failure_code']) && $chargeJson['paid'] == 1 && $chargeJson['captured'] == 1 && $chargeJson['status'] == 'succeeded') {
        $db->placeorder();
    }
}

?>

<?php if (!empty($successMessage)) { ?>
    <div id="success-message"><?php echo $successMessage; ?></div>
<?php  } ?>
<div id="error-message"></div>

<div class="text-center">
    <h1>Payment</h1>
</div>
<div class="w3ls-login">
    <form action="#" id="frmStripePayment" method="POST">
        <div class="agile-field-txt">
            <label>
                <i style="color:black;" aria-hidden="true"></i>Card Holder Name :</label>
            <input type="text" id="name" name="name" placeholder="Name" required="" />
        </div>
        <div class="agile-field-txt">
            <label>
                <i style="color:black;" aria-hidden="true"></i> Card Number :</label>
            <input type="text" id="card-number" name="card-number" placeholder="Card Number" required="" />
        </div>
        <div class="agile-field-txt">
            <label>
                <i style="color:black;" aria-hidden="true"></i> Expiry Month :</label>
            <input type="text" id="month" name="month" placeholder="Month" required="" />
        </div>
        <div class="agile-field-txt">
            <label>
                <i style="color:black;" aria-hidden="true"></i> Expiry Year :</label>
            <input type="text" id="year" name="year" placeholder="Expiry Year" required="" />
        </div>
        <div class="agile-field-txt">
            <label>
                <i style="color:black;" aria-hidden="true"></i> CVC:</label>
            <input type="text" id="cvc" name="cvc" placeholder="CVC Number" required="" />
        </div>
        <?php  
        $named=$_SESSION['orderdata']['named'];
        $addressd=$_SESSION['orderdata']['addressd'];
        $phoned=$_SESSION['orderdata']['phoned'];
        $paymentd=$_SESSION['orderdata']['paymentd'];
        
        ?>
        <input type="hidden" name="dname" value="<?php echo $named; ?>" />
        <input type="hidden" name="daddress" value="<?php echo $addressd ?>" />
        <input type="hidden" name="dphone" value="<?php echo $phoned; ?>" />
        <input type="hidden" name="dpayment" value="<?php echo $paymentd ?>" />

        <div class="w3ls-login  w3l-sub">
            <input type="submit" name="pay-now" value="Pay Now" style="background-color:blue;" id="submit-btn" onClick="stripePay(event);" />
        </div>
    </form>
</div>
<div style="margin-top:50px ;"></div>


<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script>
    function cardValidation() {
        var valid = true;
        var name = $('#name').val();

        var cardNumber = $('#card-number').val();
        var month = $('#month').val();
        var year = $('#year').val();
        var cvc = $('#cvc').val();

        $("#error-message").html("").hide();

        if (name.trim() == "") {
            valid = false;
        }

        if (cardNumber.trim() == "") {
            valid = false;
        }

        if (month.trim() == "") {
            valid = false;
        }
        if (year.trim() == "") {
            valid = false;
        }
        if (cvc.trim() == "") {
            valid = false;
        }

        if (valid == false) {
            $("#error-message").html("All Fields are required").show();
        }

        return valid;
    }
    //set your publishable key
    Stripe.setPublishableKey("pk_test_51IJdYjAlIIaUhud01X28RJytb7qQf8Uft4plcLs1lEZMOCdZPpql8OG5wkdSNWznCS1e8PUY0B6Z7Ixp2sdnqzsN00tLTZYsyQ");

    //callback to handle the response from stripe
    function stripeResponseHandler(status, response) {
        if (response.error) {
            //enable the submit button
            $("#submit-btn").show();

            //display the errors on the form
            $("#error-message").html(response.error.message).show();
        } else {
            //get token id
            var token = response['id'];
            //insert the token into the form
            $("#frmStripePayment").append("<input type='hidden' name='token' value='" + token + "' />");
            //submit form to the server
            $("#frmStripePayment").submit();
        }
    }

    function stripePay(e) {
        e.preventDefault();
        var valid = cardValidation();

        if (valid == true) {
            $("#submit-btn").hide();

            Stripe.createToken({
                number: $('#card-number').val(),
                cvc: $('#cvc').val(),
                exp_month: $('#month').val(),
                exp_year: $('#year').val()
            }, stripeResponseHandler);

            //submit from callback
            return false;
        }
    }
</script>




<?php
include('footer.php');
?>



<link href="./assets/css/font-awesome.css" rel="stylesheet">
<link href="./assets/css/style.css" rel='stylesheet' type='text/css' />
<link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">