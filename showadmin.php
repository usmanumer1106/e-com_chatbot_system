
<!-- PHP code in this page is contributed by Muhammad Usman Umer -->

<?php 
require_once("header.php");
include_once('./config/dbconfig.php');
$db = new operationsadmin();
$result=$db->view_record();
?> 
<div class="content-wrapper">
    <div class="container-fluid">
   
        <div class="row">
                <div class="col-xl-12">
                    <div class="card card-shadow mb-4">
                        <div class="card-header border-0">
                            <div class="custom-title-wrap bar-primary">
                                <div class="custom-title text-center"><h3>Admin Management</h3></div>
                            </div>
                        </div>
                            <div class="table-responsive">
                                <table id="data_table" class="table table-bordered table-striped" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Admin Name</th>
                                    <th  >Email</th>
                                    <th>Phone</th>
                                    <th  >Status</th>
                                    <th >Detail</th>
                                    <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                    <th>Admin Name</th>
                                    <th  >Email</th>
                                    <th>Phone</th>
                                    <th  >Status</th>
                                    <th >Detail</th>
                                    <th>Delete</th>
                                    </tr>
                                    </tfoot>
                                    <tbody> 
                                    <?php 
                                    while($data = mysqli_fetch_assoc($result))
                                    {
                                        ?>
                                    <td><?php echo $data['admin_name'] ?></td>
                                    <td><?php echo $data['admin_email'] ?></td>
                                    <td><?php echo $data['admin_phone'] ?></td>
                                    <td> <?php
                                    if($data['admin_status']=='1')
                                    {
                                    echo "User Enabled";
                                }else echo "User Disabled" ?></td>
                                    <td>
                                    <a  href="admindetail.php?A_ID=<?php echo $data['admin_id'] ?>"  class="btn btn-secondary">Detail</a>
                                    </td>  
                                  <td>
                                    <div>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal1">
                                        Delete
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Delete Admin</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete this?
                                                </div>
                                                <div class="modal-footer">
                                                    <a  class="btn btn-secondary" data-dismiss="modal">Close</a>
                                                    <a  class="btn btn-danger" href="deleteadmin.php?D_ID=<?php echo $data['admin_id'] ?>" >Delete</a>
                                                   
                                                </div>
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