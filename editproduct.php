<!-- PHP code in this page is  contributed by Muhammad Usman Umer -->
<?php
if (isset($_GET['P_ID'])) {
    require_once("header.php");
    $id = $_GET['P_ID'];
} else {
    header("location:index.php");
}
if ($id == $_SESSION['editproductid']) {
    $db = new operationsproduct();
    $result = $db->get_record($id);
    $data = mysqli_fetch_assoc($result);

    if (isset($_POST['btn_updateproduct'])) {
        $db->update_product($id);
       
    }

?>
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 col-md-12">
                    <div class="card card-shadow mb-4">
                        <div class="card-header border-0">
                            <div class="custom-title-wrap bar-primary">
                                <div class="custom-title text-center">
                                    <h2> Edit Product</h2>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <form method="post" enctype="multipart/form-data">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="first"><b>Product Name</b></label>
                                        <input required type="input" name="name" class="form-control rounded-0" id="first" value="<?php echo $data['product_name']; ?>">

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="last"><b>Product Price</b></label>
                                        <input type="input" name="price" class="form-control rounded-0" id="last" value="<?php echo $data['product_price']; ?>">

                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="phone"><b>Discount Price</b></label>
                                        <input type="input" name="dprice" class="form-control rounded-0" id="phone" value="<?php echo $data['product_discount']; ?>">

                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="detail"><b>Description</b></label>
                                        <textarea name="detail" class="form-control rounded-0" id="detail" rows="3"><?php echo $data['product_description']; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="file"><b>Product Image</b></label>
                                        <input type="file" name="file" class="form-control rounded-0" id="file" value="<?php echo $data['product_image']; ?>" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                <div class="text-left">
                                    <a href="productdetail.php?D_ID=<?php echo $id; ?>" class="btn btn-purple rounded-0">back</a>
                                </div>
                                    <div class="text-right" style="margin-top: -42px;">
                                        <button type="submit" name="btn_updateproduct" class="btn btn-purple rounded-0">Update Product</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   

<?php }
require_once("footer.php");
?>