<?php
require_once("header.php");
include_once('./config/dbconfig.php');
$db = new operationsadmin();
$result = $db->view_user();
?>
<div class="content-wrapper">
    <div class="container-fluid">

        <div class="row">
            <div class="col-xl-12">
                <div class="card card-shadow mb-4">
                    <div class="card-header border-0">
                        <div class="custom-title-wrap bar-primary">
                            <div class="custom-title text-center">
                                <h3>User Management</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body- pt-3 pb-4">
                        <div class="table-responsive">
                            <table id="data_table" class="table table-bordered table-striped" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>


                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>

                                        <th>Delete</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    while ($data = mysqli_fetch_assoc($result)) {
                                    ?>
                                        <td><?php echo $data['user_firstname'] . " " . $data['user_lastname'] ?></td>
                                        <td><?php echo $data['user_email'] ?></td>
                                        <td><?php echo $data['user_email'] ?></td>
                                        <td> <?php
                                                if ($data['user_status'] == '1') {
                                                    echo "User Enabled";
                                                } else echo "User Disabled" ?></td>




                        </div>
                    </div>
                </div>

            </div>


            </td>
            </tr>
        <?php
                                    }
        ?>
        </tbody>
        </table>
        </div>
    </div>
</div>


<?php
require_once("footer.php");
?>