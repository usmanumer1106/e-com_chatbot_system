<!--PHP code contributed by Muhammad Usman Umer-->


<?php 

require_once('./config/dbconfig.php');
if(isset($_GET['A_ID'])){
$db = new operationsadmin();
$id=$_GET['A_ID'];
$result=$db->get_record($id);
$db->update($id);
$data = mysqli_fetch_assoc($result);
}else{
    header("location:index.php");
}
require_once("header.php");
?> 

<div class="content-wrapper">
    <div class="container-fluid">

<div class="card card-shadow mb-4">
                        <div class="card-header border-0">
                            <div class="custom-title-wrap bar-primary">
                            <div class="custom-title text-center"><h3>Admin Detail</h3></div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                               
                                <tbody>
                                
                                <tr>
                                     <th  >Name:</th>
                                    <td ><?php echo $data['admin_name']; ?></td>
                                    <th  >Email:</th>
                                    <td ><?php echo $data['admin_email'];?></td>
                                    
                                </tr>
                                <tr>
                                    <th>Phone Number:</th>
                                    <td><?php echo $data['admin_phone']; ?></td>
                                    <th>Admin Type:</th>
                                    <td><?php
                                    if($data['admin_type']=='su')
                                    {
                                    echo "Super User";
                                    }else echo "Admin" ?></td>
                                </tr>
                                <tr>
                                     <th >Address:</th>
                                    <td colspan="3"><?php echo $data['admin_address']; ?></td>
                                    
                                </tr>
                                <tr>
                                     <th>Status:</th>
                                    <td colspan="3">
                                    <?php
                                    if($data['admin_status']=='1')
                                    {
                                    echo "User Enabled";
                                }else echo "User Disabled" ?></td>
                                    
                                </tr>
                                </tbody>
                            </table>
                            
                            
                        </div>
                        <form method="POST">
                        <div class="col-md-12" >
                                          <div class="form-group">
                                                <label for="type"><b>User Type</b></label>
                                                    <select  id="type" name="type" class="form-control rounded-0">
                                                    <option value="NULL">Select User Type</option>    
                                                    <option value="su">Super User</option>  
                                                    <option value="admin">Admin</option>
                                                    </select>
                                        
                                          </div>
                         </div>  
                         
                         <div class="col-md-12">
                         <div class="text-right">
                                            <button type="submit" name="btn_changetype" class="btn btn-purple rounded-0"> Change Type</button>
                                        </div>
                         </div>
                                        <div class="col-md-12" >
                                          <div class="form-group">
                                                <label for="status"><b>Admin Status</b></label>
                                                    <select  id="status" name="status" class="form-control rounded-0">
                                                    <option value="NULL">Select Status</option>    
                                                    <option value="1">Enable</option>  
                                                    <option value="0">Disable</option>
                                                    </select>
                                        
                                          </div>
                         </div>  
                         <div class="col-md-12">
                         <div class="text-right">
                                            <button type="submit" name="btn_changestatus" class="btn btn-purple rounded-0">Change Status</button>
                                        </div>
                         </div>
                         </form>
<div>.</div>
                         </div>
                        </div>
                            </div>

                    </div>
                    </div>
<?php
require_once("footer.php");
?>