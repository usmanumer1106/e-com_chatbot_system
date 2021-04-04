<?php
session_start();
require_once('./config/dbconfig.php');
require_once('./config/operationscart.php');
$db = new operationscart();
$db->Store_Record();
if (isset($_GET['p_id'])) {

    $db = new operationsproduct();
    $id = $_GET['p_id'];
    $result = $db->get_record($id);
    $result2 = $db->get_size($id);
    $data = mysqli_fetch_assoc($result);
} else {
    header("location:index.php");
}

require_once("header.php");
?>

<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card card-shadow mb-4">
            <div class="card-header border-0">
                <div class="custom-title-wrap bar-primary">
                    <div class="custom-title text-center">
                        <h3>Product Detail</h3>
                    </div>
                </div>
            </div>
            <form method="POST">
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <td rowspan="5" style="width:450px;"><img height="300px" width="450px" src="../<?php echo $data['product_image']; ?>" alt="Image" /></td>
                            <td><b> Product Name: </b><?php echo $data['product_name']; ?></td>
                        </tr>
                        <tr>
                            <td><b>Price: </b><?php
                                                if ($data['product_status'] == 1) {
                                                    echo $data['product_discount'];
                                                } else {
                                                    echo $data['product_price'];
                                                }


                                                ?></td>
                        </tr>

                        <tr>
                            <td><b> Description: </b><?php echo $data['product_description']; ?></td>
                        </tr>


                        <tr>
                              <td>
                       <div class="form-group">
                        <label for="sprice"><b>Select Size</b></label>
                        <select class="form-control rounded-0" id="type" name="size">
                            <option value="S">Small</option>
                            <option value="M">Medium</option>
                            <option value="L">Large</option>
                            <option value="XL">Extra Large</option>
                        </select>

                    </div>
                       </td>
                 
                        </tr>
                        <tr>
                            <td>

                                <div class="form-group">
                                    <label for="sprice"><b>Enter Quantity</b></label>
                                    <input required type="text" name="quantity" placeholder="Quantity" class="form-control rounded-0" maxlength="2" />
                                </div>
                                

                            </td>

                        </tr>



                    </table>
                    <input type="hidden" name="id" value="<?php echo $data['product_id']; ?>">
                    <input type="hidden" name="image" value="<?php echo $data['product_image']; ?>">
                    <input type="hidden" name="name" value="<?php echo $data['product_name']; ?>">
                    <input type="hidden" name="price" value="<?php if ($data['product_status'] == 1) {
                                                                    echo $data['product_discount'];
                                                                } else {
                                                                    echo $data['product_price'];
                                                                } ?>">

                    <div class="col-md-12">
                        <div class="text-right">
                            <button type="submit" name="addtocartsingle" class="btn btn-purple rounded-0">Add to Cart</button>
                        </div>
                    </div>

            </form>
        </div>
    </div>
</div>
</div>

<?php
require_once("footer.php");
?>