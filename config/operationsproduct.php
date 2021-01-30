<?php

require_once('./config/dbconfig.php');
$db = new dbconfig();
class operationsproduct extends dbconfig
{
    //View record from Database 
    public function view_record()
    {
        global $db;
        $query = "SELECT * FROM `product`";
        $result = mysqli_query($db->connection, $query);
        return $result;
    }
    // Insert Record in the Database
    public function Store_Record()
    {
        if (isset($_POST['btn_addproduct'])) {
            $Name = $_POST['name'];
            $Price = $_POST['price'];
            $Detail = $_POST['detail'];
            $Sprice = $_POST['sprice'];
            $Dprice = $_POST['dprice'];
            $Subcat = $_POST['subcat'];
            $Maincat = $_POST['maincat'];
            if ($_FILES['file']['size'] > 0) {
                $temp = $_FILES["file"]["name"];
                $newfilename = rand(1111111111, 9999999999) . $temp;
                $File = "pictureproduct/" . $newfilename;
                move_uploaded_file($_FILES['file']['tmp_name'], $File);
            } else {
                $File = "";
            }


            if ($this->insert_record($Name, $Price, $Detail, $Sprice, $Dprice, $File, $Subcat, $Maincat)) {
                require_once("css.php");
                require_once("javascript.php");
?>
                <script>
                    $(document).ready(function() {
                        $("#exampleModal").modal('show');
                    });
                </script>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Success!</h5>

                            </div>
                            <div class="modal-body">
                                Product Added Successfully!
                            </div>
                            <div class="modal-footer">
                                <a href="addproduct.php" class="btn btn-primary">Okay</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            } else {
                require_once("css.php");
                require_once("javascript.php"); ?>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Failed!</h5>

                            </div>
                            <div class="modal-body">
                                Failed To Add New Product!
                            </div>
                            <div class="modal-footer">
                                <a href="addproduct.php" class="btn btn-primary">Okay</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }
        }
    }

    // Insert Record in the Database Using Query    
    function insert_record($Name, $Price, $Detail, $Sprice, $Dprice, $File, $Subcat, $Maincat)
    {
        global $db;
        $query = "INSERT INTO `product`(`product_name`, `product_price`, `product_description`, `product_discount`, `product_status`, `product_image`,`subcategory_id`,`category_id`) 
         VALUES ('$Name','$Price','$Detail','$Dprice', '$Sprice','$File', '$Subcat', '$Maincat')";
        $result = mysqli_query($db->connection, $query);

        if ($result) {
            $query2 = "SELECT * FROM product ORDER BY product_id DESC LIMIT 1";
            $result1 = mysqli_query($db->connection, $query2);
            $data = mysqli_fetch_assoc($result1);
            $pid = $data['product_id'];
            $query3 = "INSERT INTO `size`(`size_name`, `size_quantity`, `product_id`) VALUES ('S','0','$pid'),('M','0','$pid'),('L','0','$pid'),('XL','0','$pid')";
            mysqli_query($db->connection, $query3);
            return true;
        } else {
            return false;
        }
    }

    // Get Particular Record
    public function get_record($id)
    {
        global $db;
        $sql = "SELECT *   FROM `product` WHERE product_id='$id' ";
        $data = mysqli_query($db->connection, $sql);
        return $data;
    }
    // Get Size of The Particular Product
    public function get_size($id)
    {
        global $db;
        $sql = "SELECT *   FROM `size` WHERE product_id='$id' ";
        $data = mysqli_query($db->connection, $sql);
        return $data;
    }
    // Change the Product Status
    public function show_sellprice($id, $val)
    {
        global $db;
        $sql = "UPDATE `product` SET `product_status`='$val' WHERE product_id='$id' ";
        mysqli_query($db->connection, $sql);
        header("location:productdetail.php?D_ID=" . $id);
    }
    // Reset Stock to Zero
    public function reset_stock($id)
    {
        global $db;
        $sql = "UPDATE `size` SET `size_quantity`=0 WHERE product_id='$id' ";
        mysqli_query($db->connection, $sql);
    
        header("location:productdetail.php?D_ID=" . $id);
    }
    // Update Product Stock
    public function add_stock($id, $S, $M, $L, $XL)
    {
        global $db;

        $sql = "SELECT * FROM `size` WHERE product_id='$id' AND size_name='S'";
        $result = mysqli_query($db->connection, $sql);
        $data = mysqli_fetch_assoc($result);
        $sid = $data['size_id'];

        $query1 = " UPDATE `size` SET`size_quantity`= `size_quantity`+'$S' WHERE size_id='$sid'";
        mysqli_query($db->connection, $query1);

        $sql = "SELECT * FROM `size` WHERE product_id='$id' AND size_name='M'";
        $result = mysqli_query($db->connection, $sql);
        $data = mysqli_fetch_assoc($result);
        $sid = $data['size_id'];

        $query1 = " UPDATE `size` SET`size_quantity`= `size_quantity`+'$M' WHERE size_id='$sid'";
        mysqli_query($db->connection, $query1);

        $sql = "SELECT * FROM `size` WHERE product_id='$id' AND size_name='L'";
        $result = mysqli_query($db->connection, $sql);
        $data = mysqli_fetch_assoc($result);
        $sid = $data['size_id'];

        $query1 = " UPDATE `size` SET`size_quantity`= `size_quantity`+'$L' WHERE size_id='$sid'";
        mysqli_query($db->connection, $query1);

        $sql = "SELECT * FROM `size` WHERE product_id='$id' AND size_name='XL'";
        $result = mysqli_query($db->connection, $sql);
        $data = mysqli_fetch_assoc($result);
        $sid = $data['size_id'];

        $query1 = " UPDATE `size` SET`size_quantity`= `size_quantity`+'$XL' WHERE size_id='$sid'";
        $result = mysqli_query($db->connection, $query1);


        if ($result) {
            require_once("css.php");
            require_once("javascript.php");
            ?>
            <script>
                $(document).ready(function() {
                    $("#exampleModal").modal('show');
                });
            </script>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Success!</h5>

                        </div>
                        <div class="modal-body">
                            Stock Updated Successfully!
                        </div>
                        <div class="modal-footer">
                            <a href="productdetail.php?D_ID=<?php echo  $id; ?> " class="btn btn-primary">Okay</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        } else {
            require_once("css.php");
            require_once("javascript.php"); ?>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Failed!</h5>

                        </div>
                        <div class="modal-body">
                            Failed To Update Stock!
                        </div>
                        <div class="modal-footer">
                            <a href="productdetail.php?D_ID=<?php echo  $id; ?> " class="btn btn-primary">Okay</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php }
    }



    // update function 1
    public function update_product($id)
    {
        if (isset($_POST['btn_updateproduct'])) {
            $Name = $_POST['name'];
            $Price = $_POST['price'];
            $Detail = $_POST['detail'];
            $Dprice = $_POST['dprice'];
            if ($_FILES['file']['size'] > 0) {
                $temp = $_FILES["file"]["name"];
                $newfilename = rand(1111111111, 9999999999) . $temp;
                $File = "pictureproduct/" . $newfilename;
                move_uploaded_file($_FILES['file']['tmp_name'], $File);
            } else {
                $File = " ";
            }
            if ($this->update_record($Name, $Price, $Detail, $Dprice, $File, $id)) {
                require_once("css.php");
                require_once("javascript.php");
            ?>
                <script>
                    $(document).ready(function() {
                        $("#exampleModal").modal('show');
                    });
                </script>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Success!</h5>

                            </div>
                            <div class="modal-body">
                                Product Updated Successfully!
                            </div>
                            <div class="modal-footer">
                                <a href="productdetail.php?D_ID=<?php echo  $id; ?> " class="btn btn-primary">Okay</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            } else {
                require_once("css.php");
                require_once("javascript.php"); ?>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Failed!</h5>

                            </div>
                            <div class="modal-body">
                                Failed To Update Product!
                            </div>
                            <div class="modal-footer">
                                <a href="productdetail.php?D_ID=<?php echo  $id; ?> " class="btn btn-primary">Okay</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }
        }
    }


    // Update Function 2
    function update_record($Name, $Price, $Detail, $Dprice, $File, $id)
    {
        global $db;
        if ($File == " ") {
            $query = "UPDATE `product` SET `product_name`='$Name' ,`product_price`='$Price' ,`product_description`='$Detail',`product_discount`='$Dprice'WHERE product_id='$id'";
        } else {
            $query = "UPDATE `product` SET `product_name`='$Name' ,`product_price`='$Price' ,`product_description`='$Detail',`product_discount`='$Dprice', `product_image`='$File' WHERE product_id='$id'";
        }
        $result = mysqli_query($db->connection, $query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }


    // Delete Record
    public function Delete_Record($id)
    {

        global $db;
        echo $id;
        $query = "delete from size where product_id='$id'";
        $result = mysqli_query($db->connection, $query);
        $query = "delete from product where product_id='$id'";
        $result = mysqli_query($db->connection, $query);
        if ($result) {
            require_once("css.php");
            require_once("javascript.php");
            ?> <script>
                $(document).ready(function() {
                    $("#exampleModal").modal('show');
                });
            </script>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Success!</h5>

                        </div>
                        <div class="modal-body">
                            Product Deleted Successfully!
                        </div>
                        <div class="modal-footer">
                            <a href="showproduct.php" class="btn btn-primary">Okay</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php

        } else {
            require_once("css.php");
            require_once("javascript.php"); ?>
            <script>
                $(document).ready(function() {
                    $("#exampleModal").modal('show');
                });
            </script>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Failed!</h5>

                        </div>
                        <div class="modal-body">
                            Failed To Delete Product!
                        </div>
                        <div class="modal-footer">
                            <a href="productdetail.php?D_ID=<?php echo $id; ?>" class="btn btn-primary">Okay</a>
                        </div>
                    </div>
                </div>
            </div>
<?php }
    }
}
