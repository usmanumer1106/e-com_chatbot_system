<?php
include('header.php');
?>
<?php
require_once "./config/dbconfig.php";

if (!empty($_POST["token"])) {
    $token = $_POST['token'];
    $name = $_POST['name'];
    $email = $_POST['email'];
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

    $pro_name = "macbook";
    $pro_Price = 123;
    $order_id = 2;

    $charge = \Stripe\Charge::create(array(
        'customer' => $customer->id,
        'amount' => $pro_Price * 100,
        'currency' => "pkr"

    ));

    $chargeJson = $charge->jsonSerialize();

    if ($chargeJson['amount_refunded'] == 0 && empty($chargeJson['failure_code']) && $chargeJson['paid'] == 1 && $chargeJson['captured'] == 1 && $chargeJson['status'] == 'succeeded') {
        $successMessage = "Stripe payment is completed successfully. The TXN ID is " . $chargeJson["balance_transaction"];
    }
}

?>

<?php if (!empty($successMessage)) { ?>
    <div id="success-message"><?php echo $successMessage; ?></div>
<?php  } ?>
<div id="error-message"></div>
<!--
<form id="frmStripePayment" action="" method="post">
    <div class="field-row">
        <label>Card Holder Name</label> <span id="card-holder-name-info" class="info"></span><br>
        <input type="text" id="name" name="name" class="demoInputBox">
    </div>
    <div class="field-row">
        <label>Email</label> <span id="email-info" class="info"></span><br>
        <input type="text" id="email" name="email" class="demoInputBox">
    </div>
    <div class="field-row">
        <label>Card Number</label> <span id="card-number-info" class="info"></span><br>
        <input type="text" id="card-number" name="card-number" class="demoInputBox">
    </div>
    <div class="field-row">
        <div class="contact-row column-right">
            <label>Expiry Month / Year</label> <span id="userEmail-info" class="info"></span><br>
            <select name="month" id="month" class="demoSelectBox">
                <option value="08">08</option>
                <option value="09">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
            </select> <select name="year" id="year" class="demoSelectBox">
                <option value="18">2018</option>
                <option value="19">2019</option>
                <option value="20">2020</option>
                <option value="21">2021</option>
                <option value="22">2022</option>
                <option value="23">2023</option>
                <option value="24">2024</option>
                <option value="25">2025</option>
                <option value="26">2026</option>
                <option value="27">2027</option>
                <option value="28">2028</option>
                <option value="29">2029</option>
                <option value="30">2030</option>
            </select>
        </div>
        <div class="contact-row cvv-box">
            <label>CVC</label> <span id="cvv-info" class="info"></span><br>
            <input type="text" name="cvc" id="cvc" class="demoInputBox cvv-input">
        </div>
    </div>
    <div>
        <input type="submit" name="pay_now" value="Submit" id="submit-btn" class="btnAction" onClick="stripePay(event);">

     
    </div>
    <input type='hidden' name='amount' value='0.5'> <input type='hidden' name='currency_code' value='USD'> <input type='hidden' name='item_name' value='Test Product'> <input type='hidden' name='item_number' value='PHPPOTEG#1'>
</form>
-->


<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script>
    function cardValidation() {
        var valid = true;
        var name = $('#name').val();
        var email = $('#email').val();
        var cardNumber = $('#card-number').val();
        var month = $('#month').val();
        var year = $('#year').val();
        var cvc = $('#cvc').val();

        $("#error-message").html("").hide();

        if (name.trim() == "") {
            valid = false;
        }
        if (email.trim() == "") {
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
            $("#loader").css("display", "none");
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
            $("#loader").css("display", "inline-block");
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


 

        <div class="w3ls-login  w3l-sub">
            <button type="submit" value="Pay" name="pay-now" style="background-color:blue;" id="submit-btn" onClick="stripePay(event);"></button>
        </div>
    </form>
</div>