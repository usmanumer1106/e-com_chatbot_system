<?php 

    
    require_once('./config/dbconfig.php');
    $db = new dbconfig();

    class operationssubcategory extends dbconfig
    {
        // Insert Record in the Database
        public function Store_Record()
        {
            if(isset($_POST['btn_addsubcat']))
            {
                $SubCatName = $_POST['subcatname'];
                $MainCatId =   $_POST['maincat']; 
                if($this->insert_record($SubCatName,$MainCatId))
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
                                                    Subcategory Added Successfully!
                                                </div>
                                                <div class="modal-footer">
                                                <a  href="addsubcategory.php" class="btn btn-primary">Okay</a>
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
                                                    Failed To Add New SubCategory!
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

        // Insert Record in the Database Using Query    
        function insert_record($SubCatName,$MainCatId)
        {
            global $db;
            $query = "INSERT INTO `subcategory`(`subcategory_name`, `category_id`) VALUES ('$SubCatName','$MainCatId')";
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
            $query = "select * from subcategory inner join category on category.category_id=subcategory.category_id";
         
            $result = mysqli_query($db->connection,$query);
            return $result;
        }

        // Get Particular Record
        public function get_record($id)
        {
            global $db;
            $sql = "select * from subcategory where subcategory_id='$id'";
            $data = mysqli_query($db->connection,$sql);
            return $data;

        }

      

        // Delete Record
        public function Delete_Record($id)
        {
            global $db;
            $query = "delete from subcategory where subcategory_id='$id'";
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
                                                Subategory Deleted Successfully!
                                            </div>
                                            <div class="modal-footer">
                                            <a  href="showsubcategory.php" class="btn btn-primary">Okay</a>
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
                                                Failed To Delete Subategory!
                                            </div>
                                            <div class="modal-footer">
                                                <a  href="showsubcategory.php" class="btn btn-primary">Okay</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
            <?php }
        }

      

    }
?>