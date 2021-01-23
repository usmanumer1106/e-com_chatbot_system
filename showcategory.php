<?php 
require_once("header.php");
require_once('./config/dbconfig.php');
$db = new operationscategory();
$result=$db->view_record();
if(isset($_POST['btn_delete'])){
    $ID =$_POST['ID'];
    $db->Delete_Record($ID);
}


?> 
<div class="content-wrapper">
    <div class="container-fluid">
   
        <div class="row">
                <div class="col-xl-12">
                    <div class="card card-shadow mb-4">
                        <div class="card-header border-0">
                            <div class="custom-title-wrap bar-primary">
                                <div class="custom-title text-center"><h3>Categories</h3></div>
                            </div>
                        </div>
                        <div class="card-body- pt-3 pb-4">
                            <div class="table-responsive">
                                <form method="POST">
                                <table id="data_table" class="table table-bordered table-striped" cellspacing="0">
                                    <thead>
                                    <tr>
                                    <th>Sr No</th>
                                        <th>Category Name</th>
                                    <th  >Action</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                    <th>Sr No</th>
                                    <th>Category Name</th>
                                    <th  >Action</th>
                                    </tr>
                                    </tfoot>
                                    <tbody> 
                                    <?php $n=1;
                                    while($data = mysqli_fetch_assoc($result))
                                    {
                                ?>
                                <td><b> <?php echo $n; $n++; ?></b></td>
                                    <td><?php echo $data['category_name'] ?></td>
                                    <input type="hidden" value="<?php echo $data['category_id'];?>" name="ID" />
                         <td>    
                                                                       <!-- Button trigger modal -->
                           <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal1">
                                        Delete
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete this?
                                                </div>
                                                <div class="modal-footer">
                                                    <a  class="btn btn-secondary" data-dismiss="modal">Close</a>
                                                    <button type="submit" class="btn btn-danger" name="btn_delete"> Delete</button>
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
                                </form>
                              
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