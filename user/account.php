<?php 
session_start();
if(!isset($_SESSION['user_id'])){
header('location:shope.php');
}


include('header.php');

include_once('./config/dbconfig.php');
$db = new operationsuser();

$id = $_SESSION['user_id'];
$result = $db->view_record_user($id);
$data = mysqli_fetch_assoc($result);

?>

<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
    <div class="container">
        <div class="inner-sec-shop px-lg-4 px-3">

            <div class="checkout-right">


                <table class="timetable_sub">


                    <tbody>
                        <tr>
                            <th colspan="2" style="height: 50px;">My Account</th>
                        </tr>
                        <tr>
                            <td><b>Name:</b></td>
                            <td class="text-left"><?php echo $data['user_firstname'] . " " . $data['user_lastname']  ?></td>
                        </tr>
                        <tr>
                            <td><b>Email:</b></td>
                            <td class="text-left"><?php echo $data['user_email'] ?></td>
                        </tr>
                        <tr>
                            <td><b>Phone:</b></td>
                            <td class="text-left"><?php echo $data['user_phone'] ?></td>
                        </tr>
                        <tr>
                            <td><b>Address:</b></td>
                            <td class="text-left"><?php echo $data['user_address'] ?></td>
                        </tr>
                        <tr>
                        <td colspan="2">
                    <div class="text-left" style="margin-left: 150px;" >    <a  href="updateaccount.php"> Update Info</a></div>
                    <div class="text-right" style="margin-top: -20px; margin-right:150px;" >    <a  href="changepassword.php"> Change Password</a></div>
                        </td>
                        </tr>
                        



                    </tbody>
                </table>
            </div>




            <div class="clearfix"> </div>

        </div>

    </div>

    </div>
</section>


<?php include('footer.php') ?>