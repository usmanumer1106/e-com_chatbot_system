<?php 

    
    require_once('./config/dbconfig.php');
    $db = new dbconfig();
 

    class operationscategory extends dbconfig
    {
        // Insert Record in the Database
        public function Store_Record()
        {
            if(isset($_POST['btn_addcat']))
            {
                $CatName = $_POST['cat_name'];
                if($this->insert_record($CatName))
                {
                    ?> <script>
                    $(document).ready(function(){
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
                                                    Category Added Successfully!
                                                </div>
                                                <div class="modal-footer">
                                                <a  href="addcategory.php" class="btn btn-primary">Okay</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                   <?php
                   
                }
                else
                {?>
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Failed!</h5>
                                                   
                                                </div>
                                                <div class="modal-body">
                                                    Failed To Add New Category!
                                                </div>
                                                <div class="modal-footer">
                                                    <a  href="addcategory.php" class="btn btn-primary">Okay</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                <?php } 
            }
        }

        // Insert Record in the Database Using Query    
        function insert_record($CatName)
        {
            global $db;
            $query = "INSERT INTO `category`(`category_name`) VALUES ('$CatName')";
            $result = mysqli_query($db->connection,$query);

            if($result)
            {
                return true;
            }
            else
            {
                return false;
            }
        }


        // View Database Record
        public function view_record()
        {
            global $db;
            $query = "select * from category";
            $result = mysqli_query($db->connection,$query);
            return $result;
        }

        // Delete Record
        public function Delete_Record($id)
        {
            global $db;
            $query = "delete from category where category_id='$id'";
            $result = mysqli_query($db->connection,$query);
            if($result)
            {
                ?> <script>
                    $(document).ready(function(){
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
                                                    Category Deleted Successfully!
                                                </div>
                                                <div class="modal-footer">
                                                <a  href="showcategory.php" class="btn btn-primary">Okay</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                   <?php
                   
                }
                else
                {?>
                <script>
                    $(document).ready(function(){
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
                                                    Failed To Delete Category!
                                                </div>
                                                <div class="modal-footer">
                                                    <a  href="addsubcategory.php" class="btn btn-primary">Okay</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                <?php }
        }

      

    }




?>