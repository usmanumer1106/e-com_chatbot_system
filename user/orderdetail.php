<?php
session_start();
require_once('./config/dbconfig.php');
if (isset($_GET['O_ID'])) {
    $db = new operationsorder();
    $id = $_GET['O_ID'];
    $result = $db->get_record($id);

    if (isset($_POST['status'])) {
        $status = $_POST['status'];
        $db->change_status($id, $status);
    }
} else {
    header("location:index.php");
}
require_once("header.php");
$data = mysqli_fetch_assoc($result);
?>

<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card card-shadow mb-4">
            <div class="card-header border-0">
                <div class="custom-title-wrap bar-primary">
                    <div class="custom-title text-center">
                        <h3>Order Detail</h3>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="timetable_sub">

                    <tbody>
                        <tr style="height:50px;">
                            <th colspan="5">Personal Information</th>


                        </tr>
                        <tr>
                            <td class="text-left">Name:</td>
                            <td class="text-left" colspan="4"><?php echo $data['name']; ?></td>

                        </tr>
                        <tr>
                            <td class="text-left">Phone Number:</td>
                            <td class="text-left" colspan="4"><?php echo $data['phone']; ?></td>
                        </tr>
                        <tr>
                            <td class="text-left">Address</td>
                            <td class="text-left" colspan="4"><?php echo $data['address']; ?></td>
                        </tr>
                        <tr>
                            <td class="text-left">Payment</td>
                            <td class="text-left" colspan="4"><?php echo $data['payment']; ?></td>
                        </tr>




                        <tr>
                            <b>
                                <td colspan="5" style="text-align:center; font-size:20px">Order Includes</td>
                            </b>
                        </tr>
                        <tr>
                            <th>Product Image</th>
                            <th>Product Name</th>
                            <th> Size</th>
                            <th>Price</th>
                            <th>Quantity</th>
                        </tr>
                        <?php
                        $con = mysqli_connect('localhost', 'root', '', 'e-com');
                        $query = "SELECT *   FROM `order_detail` where order_id='$id' ";

                        $result2 = mysqli_query($con, $query);
                        $total = 0;
                        while ($data = mysqli_fetch_assoc($result2)) {
                        ?>
                            <tr>
                                <a href="productdetail.php=D_ID?<?php echo $data['product_id'] ?>">
                                    <td class="invert">
                                        <img src="../<?php echo $data['product_image'] ?>" height="150" width="300" />
                                    </td>
                                </a>
                                <td class="invert"><?php echo  $data['product_name'] ?></td>
                                <td class="invert"><?php echo  $data['product_size'] ?></td>
                                <td class="invert"><?php echo $data['product_price'];
                                                  
                                                    $total=$total+($data['product_price']*$data['product_quantity'])
                                                    ?></td>
                                <td class="invert"><?php echo $data['product_quantity'] ?></td>


                            </tr>
                        <?php } ?>
                        <tr>
                            <th><b>Total Price</b></th>
                            <th colspan="4" class="text-center">
                                <?php echo $total; ?>
                            </th>
                        </tr>



                    </tbody>
                </table>




            </div>
        </div>
    </div>
</div>
<?php
require_once("footer.php");
?>