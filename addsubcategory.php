<!--- PHP code in this page is  contributed by Muhammad Usman Umer --->
<?php 
require_once("header.php");
require_once('./config/dbconfig.php');
$db = new operationssubcategory();
$db2 = new operationscategory();

?>  
 <div class="content-wrapper">
<div class="container-fluid">
               <div class="row">
                        <div class="col-xl-12 col-md-12">
                            <div class="card card-shadow mb-4">
                                <div class="card-header border-0">
                                    <div class="custom-title-wrap bar-primary">
                                        <div class="custom-title text-center"><h2> Add Subcategory</h2></div>
                                    </div>
                                </div>
                                <?php $db->Store_Record(); ?>
                                <div class="card-body">
                                    <form method="post">
                                    <div class="col-md-12" >
                                      <div class="form-group">
                                                <label for="msubcat"><b>Main Category</b></label>
                                                    <select class="form-control rounded-0" id="msubcat" name="maincat">
                                                    <option value="NULL"> Select Main Category</option>
                                                              <?php
                                                              $category=$db2->view_record();
                                                                    while($data=mysqli_fetch_assoc($category))
                                                                    {
                                                                                          
                                                                    ?>

                                                                    <option value="<?php echo $data['category_id']; ?>">
                                                                  
                                                                    <?php echo $data['category_name']; ?>

                                                                    </option>

                                                                    <?php
                                                                    }
                                                                    ?>
                                                    </select>
                                        
                                          </div>
                                        </div>  
                                    <div class="col-md-12" >
                                    <div class="form-group">
                                            <label for="subcat"><b>Subcategory Name</b></label>
                                            <input type="input" id="subcat" name="subcatname" class="form-control rounded-0" placeholder="Enter Subcategory Name">
                                          
                                        </div>
                                </div>
                                
                                
                                      
                                        <div class="col-md-12" >
                                        <div class="text-right">
                                            <button type="submit" name="btn_addsubcat" class="btn btn-purple rounded-0">Add Category</button>
                                        </div>
                                        </div>
                                    </form>
                                </div>
                         </div>
                </div>
</div>
</div>
                            
                 
<?php
require_once("footer.php");
?>