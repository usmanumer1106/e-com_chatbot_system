<?php

require_once('./config/dbconfig.php');
$db = new dbconfig();

class operationsuser extends dbconfig
{
    // function for login
    public function login()
    {
        global $db;
        if (isset($_POST['login'])) {

            $Email = $_POST['email'];
            $Password = md5($_POST['password']);

            $query = "SELECT * FROM `user` WHERE user_email='$Email' and user_password='$Password'";
            $result = mysqli_query($db->connection, $query);
            if (mysqli_num_rows($result) > 0) {

                $data = mysqli_fetch_assoc($result);
                $_SESSION["user_id"] = $data['user_id'];
                $_SESSION["user_email"]=$data['user_email'];
                $_SESSION["user_name"] = $data['user_firstname'] . " " . $data['user_lastname'];
            }
        }
    }
    // function for forgot password
    public function forgotpassword()
    {
        global $db;
        if (isset($_POST['forgot'])) {

            $Email = $_POST['email'];
            $query = "SELECT * FROM `user` WHERE user_email='$Email'";

            $result = mysqli_query($db->connection, $query);
            if (mysqli_num_rows($result) > 0) {
                $data = mysqli_fetch_assoc(($result));

                $to = $data['user_email'];
                $Password = $data['user_password'];
                $Subject = " " . "Password Reset";
                $headers = "Content-type:text/html;charset=UTF-8" . "\r\n";
                $Body = "Hi," . $data['user_firstname'] ." " . "<a href =\"http://localhost/store/user/passwordreset.php\">Click Here</a> to Reset Your Password";
             
           
             


                if (mail($to, $Subject, $Body, $headers)) {
                    $_SESSION["reset"]=$to;
                    echo '<div class="alert alert-danger"> Password sent to your email.</div>';
                }
            } else {

                echo '<div class="alert alert-danger"> No account with this email.</div>';
            }
        }
    }
    public function view_record_user($id)
    {
        global $db;
        $query = "SELECT * FROM `user` where user_id='$id'";
        $result = mysqli_query($db->connection, $query);
        return $result;
    }

    // Insert Record in the Database
    public function Store_Record()
    {
        global $db;
        if (isset($_POST['signup'])) {
            $FirstName = $_POST['firstname'];
            $Email = $_POST['email'];
            $Address = $_POST['address'];
            $Phone = $_POST['phone'];
            $LastName = $_POST['lastname'];
            $Password = md5($_POST['password']);
            $query = "SELECT * FROM `user` where user_email='$Email'";
            $result = mysqli_query($db->connection, $query);
            $row = mysqli_num_rows($result);
            if ($row > 0) {
                echo '<div class="alert alert-danger"> User with same email already exsisted </div>';
            } else {
                if ($this->insert_record($FirstName, $Email, $Address, $Phone, $LastName, $Password)) {
                    echo '<div class="alert alert-success"><a href="login.php"> Account Created Successfully Click Here to Login :)</a> </div>';
                } else {
                    echo '<div class="alert alert-danger"> Failed </div>';
                }
            }
        }
    }

    // Insert Record in the Database Using Query    
    function insert_record($FirstName, $Email, $Address, $Phone, $LastName, $Password)
    {
        global $db;
        $query = "INSERT INTO `user`(`user_firstname`, `user_lastname`, `user_email`, `user_address`, `user_password`, `user_phone`)
          VALUES ('$FirstName','$LastName', '$Email', '$Address', '$Password','$Phone')";
        $result = mysqli_query($db->connection, $query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    // Delete Record From Database
    public function Delete_Record($id)
    {
        global $db;
        $query = "delete from admin where admin_id='$id'";
        $result = mysqli_query($db->connection, $query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    // Get Particular Record
    public function get_record($id)
    {
        global $db;
        $sql = "SELECT *   FROM `admin` WHERE admin_id='$id' ";
        $data = mysqli_query($db->connection, $sql);
        return $data;
    }

    public function update($id)
    {
        global $db;
        if (isset($_POST['btn_changetype'])) {
            $type = $_POST['type'];
            $sql = "update  `admin` set admin_type='$type' WHERE admin_id='$id' ";
            mysqli_query($db->connection, $sql);
        }

        if (isset($_POST['btn_changestatus'])) {
            $status = $_POST['status'];
            $sql = "update  `admin` set admin_status='$status' WHERE admin_id='$id' ";
            mysqli_query($db->connection, $sql);
        }
    }

    public function Update_Record()
    {

        if (isset($_POST['update'])) {
            $FirstName = $_POST['firstname'];

            $Address = $_POST['address'];
            $Phone = $_POST['phone'];
            $LastName = $_POST['lastname'];
      

            if ($this->update_record2($FirstName, $Address, $Phone, $LastName)) {
                echo '<div class="alert alert-success"> Information Updated Successfully :) </div>';
            } else {
                echo '<div class="alert alert-danger"> Failed </div>';
            }
        }
    }


    // Insert Record in the Database Using Query    
    function update_record2($FirstName, $Address, $Phone, $LastName)
    {
        global $db;
        $id = $_SESSION['user_id'];
        $query = "UPDATE `user` SET `user_firstname`='$FirstName',`user_lastname`='$LastName',`user_address`='$Address',`user_phone`='$Phone' WHERE user_id='$id'";
        $result = mysqli_query($db->connection, $query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }


    public function changepassword()
    {
    
        global $db;
        $id = $_SESSION['user_id'];
        if(isset($_POST['btn_change']))
        {
            
            $oldpass = md5($_POST['old_password']);
            $newpass = md5($_POST['new_password']);
            
            $query="select * from user where user_id=$id and user_password='$oldpass'";
            $result=mysqli_query($db->connection,$query);
       
            $no=mysqli_num_rows($result);
          
            if($no>0 )
           {
            $query = "UPDATE `user` SET `user_password`= '$newpass' WHERE user_id='$id'";
            if(mysqli_query($db->connection,$query))
            echo '<div class="alert alert-success"> Password Change Successfuly </div>';
           
           }
           else{
            echo '<div class="alert alert-danger"> Wrong Old Password </div>';
           
           }
  
    
        
    }
    }
    public function passwordreset()
    {
    
        global $db;
    
        $email = $_SESSION['reset'];
  
        if(isset($_POST['btn_change']))
        {
            
         
            $newpass = md5($_POST['new_password']);
            
        
            $query = "UPDATE `user` SET `user_password`= '$newpass' WHERE user_email='$email'";
            if(mysqli_query($db->connection,$query)){
            echo '<div class="alert alert-success"> Password Change Successfuly <a href="login.php"> Click Here To Login</a> </div>';
           unset($_SESSION['reset']);
           }
           else{
            echo '<div class="alert alert-danger"> Wrong Old Password </div>';
           
           }
        }
  
    
        
    }
    
}
?>