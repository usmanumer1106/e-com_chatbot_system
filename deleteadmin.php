<?php 

    require_once('./config/dbconfig.php');
    $db = new operationsadmin();
    
    if(isset($_GET['D_ID']))
    {
        global $db;
        $ID = $_GET['D_ID'];

        if($db->Delete_Record($ID))
        {
            
          header("location:showadmin.php");
        }
        else
        {
           header("location:showadmin.php");
        }
    }


?>