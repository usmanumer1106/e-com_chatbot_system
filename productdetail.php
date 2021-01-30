<!-- PHP code in this page is  contributed by Muhammad Usman Umer -->
<?php
require_once('./config/dbconfig.php');
if (isset($_GET['D_ID'])) {

    $db = new operationsproduct();
    $id = $_GET['D_ID'];
    $result = $db->get_record($id);
    $result2 = $db->get_size($id);
    $data = mysqli_fetch_assoc($result);
} else {
    header("location:index.php");
}

if (isset($_POST['btn_changesellprice'])) {
    $val = $_POST['sprice'];
    $db->show_sellprice($id, $val);
}
if (isset($_POST['btn_resetstock'])) {
    $db->reset_stock($id);
}
if (isset($_POST['btn_addnewstock'])) {
    session_start();
    $_SESSION['addstockid'] = $id;
    header("location:addstock.php?P_ID=" . $id);
}
if (isset($_POST['btn_editproduct'])) {
    session_start();
    $_SESSION['editproductid'] = $id;
    header("location:editproduct.php?P_ID=" . $id);
}
if (isset($_POST['btn_delete'])) {
   
    $db->Delete_Record($id);
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
                            <td rowspan="5" style="width:450px;"><img height="300px" width="450px" src="<?php echo $data['product_image']; ?>" alt="Image" /></td>
                            <td><b> Product Name: </b><?php echo $data['product_name']; ?></td>
                        </tr>
                        <tr>
                            <td><b> Actual Price: </b><?php echo $data['product_price']; ?></td>
                        </tr>
                        <tr>
                            <td><b> Discounted Price: </b><?php echo $data['product_discount']; ?></td>
                        </tr>
                        <tr>
                            <td><b> Description: </b><?php echo $data['product_description']; ?></td>
                        </tr>
                        <tr>
                            <td><b> Selling On: </b><?php
                                                    if ($data['product_status'] == 1) {
                                                        echo "Discounted Price";
                                                    } else {
                                                        echo "Actual Price";
                                                    }
                                                    ?>
                            </td>

                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="text-right">

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger rounded-0" data-toggle="modal" data-target="#modal1">
                                        Delete Product
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body text-left">
                                                    Are you sure you want to delete this?
                                                </div>
                                                <div class="modal-footer">
                                                    <a class="btn btn-secondary rounded-0" data-dismiss="modal" style="color: white;">Close</a>
                                                    <button type="submit" class="btn btn-danger  rounded-0" name="btn_delete"> Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal -->




                                    

                                </div>
                                <div class="text-left" style="margin-top: -42px;">
                                    <button type="submit" name="btn_editproduct" class="btn btn-purple rounded-0">Edit Product</button>

                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <h3>Availible Stock:</b></h3>
                            </td>
                            <td>

                            </td>
                        </tr>
                        <tr>
                            <td><b>Size</b></td>
                            <td><b>Quantity</b></td>
                        </tr>
                        <?php while ($data2 = mysqli_fetch_assoc($result2)) { ?>
                            <tr>
                                <td><?php echo $data2['size_name'] ?></td>
                                <td><?php echo $data2['size_quantity'] ?></td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td>
                                 <!-- Button trigger modal -->
                                 <button type="button" style="width: 450px;" class="btn btn-purple rounded-0" data-toggle="modal" data-target="#modal">
                                 Reset Stock To Zero
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body text-left">
                                                    Are you sure you want to Reset Stock?
                                                </div>
                                                <div class="modal-footer">
                                                    <a class="btn btn-secondary rounded-0" data-dismiss="modal" style="color: white;">Close</a>
                                                    <button type="submit"   class="btn btn-purple rounded-0" name="btn_resetstock"> Reset Stock</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal -->



                               
                            </td>
                            <td>
                                <button style="width: 500px;" type="submit" name="btn_addnewstock" class="btn btn-purple rounded-0">Add New Stock</button>
                            </td>
                        </tr>
                    </table>

                    <div class="form-group">
                        <label for="sprice"><b>Show Price</b></label>
                        <select class="form-control rounded-0" id="type" name="sprice">
                            <option value="NULL">Select Option</option>
                            <option value="0">Show Actual Price</option>
                            <option value="1">Show Discounted Price</option>
                        </select>

                    </div>
                    <div class="col-md-12">
                        <div class="text-right">
                            <button type="submit" name="btn_changesellprice" class="btn btn-purple rounded-0">Change Selling Price</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
require_once("footer.php");
?>