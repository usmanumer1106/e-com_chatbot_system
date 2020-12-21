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
                echo '<div class="alert alert-danger"> Password reset link sent to your email.</div>';

            } else
             {
                
                echo '<div class="alert alert-danger"> No account with this email.</div>';
            }
        }
    }
}
?>