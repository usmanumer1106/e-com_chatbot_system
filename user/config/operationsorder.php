<?php
require_once('./config/dbconfig.php');
$db = new dbconfig();

class operationsorder extends dbconfig
{
    public function view_recordall()
    {
        global $db;
    
        $id= $_SESSION['user_id'];
   
            $query = "SELECT * FROM `order` where user_id='$id'" ;
            $result = mysqli_query($db->connection, $query);
            return $result;
        
    }


    public function view_recordnotprocess()
    {
        global $db;
  
        $id= $_SESSION['user_id'];
   
            $query = "SELECT * FROM `order` WHERE  order.status ='' and user_id='$id'";
            $result = mysqli_query($db->connection, $query);
            return $result;
        
    }


    public function view_recordinprocess()
    {
        global $db;

     $id= $_SESSION['user_id'];
        $query = "SELECT * FROM `order` WHERE  order.status ='inprocess' and user_id='$id'";
            $result = mysqli_query($db->connection, $query);
            return $result;
      
    }

    public function view_recordclosed()
    {
        global $db;

        $id= $_SESSION['user_id'];

        $query = "SELECT * FROM `order` WHERE  order.status ='shipped' and user_id='$id'  ";
        $result = mysqli_query($db->connection, $query);
        return $result;
    }

      // Get Particular Record
      public function get_record($id)
      {
          global $db;
          $sql = "SELECT *   FROM `order` WHERE order_id='$id' ";
          $data = mysqli_query($db->connection, $sql);
          return $data;
      }


}
?>