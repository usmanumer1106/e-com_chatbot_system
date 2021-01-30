<!-- PHP code in this page is  contributed by Muhammad Usman Umer -->
<?php
require_once("header.php");
include_once('./config/dbconfig.php');
$db = new operationsproduct();
$result = $db->view_record();
?>
<div class="content-wrapper">
    <div class="container-fluid">

        <div class="row">
            <div class="col-xl-12">
                <div class="card card-shadow mb-4">
                    <div class="card-header border-0">
                        <div class="custom-title-wrap bar-primary">
                            <div class="custom-title text-center">
                                <h3>Product Management</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body- pt-3 pb-4">
                        <div class="table-responsive">
                            <table id="data_table" class="table table-bordered table-striped" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Sr No</th>
                                        <th>Product Image</th>
                                        <th>Product Name</th>
                                        <th>Product Price</th>

                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Sr No</th>
                                        <th>Product Image</th>
                                        <th>Product Name</th>
                                        <th>Product Price</th>

                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    while ($data = mysqli_fetch_assoc($result)) {
                                    ?>
                                        <td><?php echo $no;
                                            $no++ ?></td>
                                        <td> <img src="<?php echo $data['product_image'] ?>" alt="Picture" width="100" height="50"></td>
                                        <td><?php echo $data['product_name'] ?></td>
                                        <td><?php echo $data['product_price'] ?></td>
                                        <td><a href="productdetail.php?D_ID=<?php echo $data['product_id'] ?>" class="btn btn-secondary rounded-0">Detail</a></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require_once("footer.php");
?>