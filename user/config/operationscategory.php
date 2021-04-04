<?php 

    
    require_once('./config/dbconfig.php');
    $db = new dbconfig();
 

    class operationscategory extends dbconfig
    {
        // Insert Record in the Database
        public function Store_Record()
        {
            global $db;
            if(isset($_POST['btn_addcat']))
            {
                $CatName = $_POST['cat_name'];
                if($this->insert_record($CatName))
                {
                    echo '<div class="alert alert-success"> Your Record Has Been Saved :) </div>';
                    
                }
                else
                {
                    echo '<div class="alert alert-danger"> Failed </div>';
                }
            }
        }

        // Insert Record in the Database Using Query    
        function insert_record($a)
        {
            global $db;
            $query = "INSERT INTO `category`(`category_name`) VALUES ('$a')";
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
                return true;
            }
            else
            {
                return false;
            }
        }

      

    }




?>