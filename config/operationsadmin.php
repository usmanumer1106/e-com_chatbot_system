<!-- Created By Muhammad Usman Umer -->
<?php

require_once('./config/dbconfig.php');
$db = new dbconfig();

class operationsadmin extends dbconfig
{
    // function for login
    public function login()
    {
        global $db;
        if (isset($_POST['login'])) {

            $Email = $_POST['email'];
            $Password = md5($_POST['password']);

            $query = "SELECT * FROM `admin` WHERE admin_email='$Email' and admin_password='$Password'";

            $result = mysqli_query($db->connection, $query);
            if (mysqli_num_rows($result) > 0) {
                session_start();
                $data = mysqli_fetch_assoc($result);
                $_SESSION["adminid"] = $data['admin_id'];
                $_SESSION["adminname"] = $data['admin_name'];
                $_SESSION["admintype"] = $data['admin_type'];
                header("location:index.php");
            }
        }
    }
    // function for forgot password
    public function forgotpassword()
    {
        global $db;
        if (isset($_POST['forgot'])) {

            $Email = $_POST['email'];
            $query = "SELECT * FROM `admin` WHERE admin_email='$Email'";

            $result = mysqli_query($db->connection, $query);
            if (mysqli_num_rows($result) > 0) {
                $data=mysqli_fetch_assoc(($result));
               
                $to=$data['admin_email'];
                $Password=$data['admin_password'];
                $Subject=" "."Password Reset";
                $Body="Hi,".$data['admin_name']." Your Paaword for this account is".$data['admin_password']."";
    
              
              
               if(mail($to,$Subject,$Body,$Password)){
                    echo '<div class="alert alert-danger"> Password reset link sent to your email.</div>';
                }
           

            } else
             {
                
                echo '<div class="alert alert-danger"> No account with this email.</div>';
            }
        }
    }
    public function view_record()
    {
        global $db;
        $query = "SELECT * FROM `admin`";
        $result = mysqli_query($db->connection, $query);
        return $result;
    }

     // Insert Record in the Database
     public function Store_Record()
     {
         global $db;
         if(isset($_POST['btn_addadmin']))
         {
             $Name = $_POST['name'];
             $Email = $_POST['email'];
             $Address = $_POST['address'];
             $Phone = $_POST['phone'];
             $Type = $_POST['type'];

             $Password = md5( $_POST['password']);
             $query = "SELECT * FROM `admin` where admin_email='$Email'";
             $result = mysqli_query($db->connection, $query);
             $row=mysqli_num_rows($result);
             if($row>0)
             {
                echo '<div class="alert alert-danger"> User with same email already exsisted </div>';
             }

             else{

            
             if($this->insert_record($Name,$Email,$Address,$Phone,$Type,$Password))
             {
                 echo '<div class="alert alert-success"> Your Record Has Been Saved :) </div>';
                 
             }
             else
             {
                 echo '<div class="alert alert-danger"> Failed </div>';
             }
            }
         }
     }

     // Insert Record in the Database Using Query    
     function insert_record($Name,$Email,$Address,$Phone,$Type,$Password)
     {
         global $db;
         $query = "INSERT INTO `admin`( `admin_name`, `admin_email`, `admin_password`, `admin_phone`, `admin_type`, `admin_address`) 
         VALUES ('$Name','$Email', '$Password', '$Phone', '$Type', '$Address')";
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
    // Delete Record From Database
     public function Delete_Record($id)
     {
         global $db;
         $query = "delete from admin where admin_id='$id'";
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
      // Get Particular Record
      public function get_record($id)
      {
          global $db;
          $sql = "SELECT *   FROM `admin` WHERE admin_id='$id' ";
          $data = mysqli_query($db->connection,$sql);
          return $data;

      }

      public function update($id)
      {
          global $db;
          if (isset($_POST['btn_changetype'])) {
              $type=$_POST['type'];
              $sql = "update  `admin` set admin_type='$type' WHERE admin_id='$id' ";
              mysqli_query($db->connection,$sql);
          }
         
          if (isset($_POST['btn_changestatus'])) {
            $status=$_POST['status'];
            $sql = "update  `admin` set admin_status='$status' WHERE admin_id='$id' ";
            mysqli_query($db->connection,$sql);
        }
         
         

      }
}
?>