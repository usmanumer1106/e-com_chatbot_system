<?php
require_once("header.php");
require_once('./config/dbconfig.php');
$db = new operationsorder();
$result = $db->view_recordnotprocess();
?>
<div class="content-wrapper">
    <div class="container-fluid">

        <div class="row">
            <div class="col-xl-12">
                <div class="card card-shadow mb-4">
                    <div class="card-header border-0">
                        <div class="custom-title-wrap bar-primary">
                            <div class="custom-title text-center">
                                <h3>Complaints</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body- pt-3 pb-4">

                        <div class="table-responsive">
                            <table id="data_table" class="table table-bordered table-striped" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th> Order Date</th>
                                        <th>Address</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Order ID</th>
                                        <th> Order Date</th>
                                        <th>Address</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>

                                    <?php
                                    while ($data = mysqli_fetch_assoc($result)) {
                                    ?>
                                        <td><?php echo $data['order_id']; ?></td>
                                        <td><?php echo $data['order_date'] ?></td>
                                        <td><?php echo $data['address'] ?></td>
                                      
                                        <td><button type="button" class="btn btn-danger rounded-0">Not process yet</button></td>

                                        <td><a href="orderdetail.php?O_ID=<?php echo $data['order_id'] ?>" class="btn btn-secondary rounded-0">Detail</a></td>
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