<?php

require_once('./config/dbconfig.php');
if (isset($_GET['O_ID'])) {
    $db = new operationsorder();
    $id = $_GET['O_ID'];
    $result = $db->get_record($id);

    if(isset($_POST['status']))
    {
        $status=$_POST['status'];
       $db->change_status($id,$status);
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
                <table class="table table-bordered">

                    <tbody>
                    <tr>
                            <b>
                                <th colspan="5" style="text-align:center; font-size:20px">Personal Information</th>
                            </b>
                        </tr>
                       <tr>
                       <th>Name:</th>
                       <td  scope="col" colspan="4"><?php echo $data['name']; ?></td>
                       </tr>
                       <tr>
                       <th>Phone Number:</th>
                       <td  scope="col" colspan="4"><?php echo $data['phone']; ?></td>
                       </tr>
                        <tr>
                            <th>Address</th>
                            <td scope="col" colspan="4"><?php echo $data['address']; ?></td>

                        </tr>
                        <tr>
                            <th>Payment</th>
                            <td scope="col" colspan="4"><?php echo $data['payment']; ?></td>

                        </tr>




                        <tr>
                            <b>
                                <th colspan="5" style="text-align:center; font-size:20px">Order Includes</th>
                            </b>
                        </tr>
                        <tr>
                            <th>Product Image</th>
                            <th>Product Name</th>
                            <th>Product Size</th>
                            <th>Price</th>
                            <th>Quantity</th>
                        </tr>
                        <?php
                        $con = mysqli_connect('localhost', 'root', '', 'e-com');
                        $query = "SELECT *   FROM `order_detail` where order_id='$id' ";

                        $result2 = mysqli_query($con, $query);
                        $total=0;
                        while ($data = mysqli_fetch_assoc($result2)) {
                        ?>
                            <tr>
                                <a href="productdetail.php=D_ID?<?php echo $data['product_id'] ?>">
                                    <th>
                                        <img src="<?php echo $data['product_image'] ?>" height="150" width="300" />
                                    </th>
                                </a>
                                <th><?php echo  $data['product_name'] ?></th>
                                <th><?php echo  $data['product_size'] ?></th>
                                <th><?php echo $data['product_price']; $total=$total+($data['product_price']*$data['product_quantity']); ?></th>
                                <th><?php echo $data['product_quantity'] ?></th>


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
                <form method="POST">
                <div class="form-group">
                    <label for="status"><b>Change Status</b></label>
                    <select class="form-control rounded-0" id="type" name="status">
                        <option value="">Select Option</option>
                        <option value="inprocess">In Process</option>
                        <option value="shipped">Shipped</option>
                    </select>

                </div>

                <div class="text-right">
                    <button type="submit" name="btn_changesellprice" class="btn btn-purple rounded-0">Change Status</button>
                </div>
                </form>


            </div>
        </div>
    </div>
</div>
<?php
require_once("footer.php");
?>