<!-- Created By Muhammad Usman Umer -->
<?php

require_once('./config/dbconfig.php');
$db = new dbconfig();

class operationsadmin extends dbconfig
{

    public function login()
    {
        global $db;
        if (isset($_POST['login'])) {

            $Email = $_POST['email'];
            $Password = $_POST['password'];

            $query = "SELECT * FROM `admin` WHERE admin_email='$Email' and admin_password='$Password'";

            $result = mysqli_query($db->connection, $query);
            if (mysqli_num_rows($result) > 0) {
                session_start();
                $data = mysqli_fetch_assoc($result);
                $_SESSION["admin_id"] = $data['admin_id'];
                header("location:index.php");
            }
        }
    }
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
                $Subject="Password Reset";
                $Body="Hi,".$data['admin_name']." Your Paaword for this account is".$data['admin_password']."";
                $sender_email = "From: soulhacker6678@gmail.com";
                echo '<div class="alert alert-danger"> Password reset link sent to your email.</div>';
               /*
               Will Work Only If Mail Server is exsisted 
               if(mail($to,$Subject,$Body,$sender_email)){
                    echo '<div class="alert alert-danger"> Password reset link sent to your email.</div>';
                }
                */

            } else
             {
                
                echo '<div class="alert alert-danger"> No account with this email.</div>';
            }
        }
    }
}
?>