<?php
require_once('./config/dbconfig.php');
$db = new dbconfig();

class operationsorder extends dbconfig
{
    public function view_recordnotprocess()
    {
        global $db;
   
            $query = "SELECT * FROM `order` WHERE  order.status =''";
            $result = mysqli_query($db->connection, $query);
            return $result;
        
    }


    public function view_recordinprocess()
    {
        global $db;
     
        $query = "SELECT * FROM `order` WHERE  order.status ='inprocess' ";
            $result = mysqli_query($db->connection, $query);
            return $result;
      
    }

    public function view_recordclosed()
    {
        global $db;

        $query = "SELECT * FROM `order` WHERE  order.status ='shipped' ";
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


      public function change_status($id,$status)
      {
          global $db;
          $sql = "UPDATE `order` SET `status`='$status' WHERE order_id='$id' ";
    
        mysqli_query($db->connection, $sql);
$sql="SELECT *   FROM `order` join `user` on user.user_id=order.user_id   WHERE order_id='$id'";
$data=mysqli_fetch_assoc(mysqli_query($db->connection, $sql));


$to=$data['user_email'];
        $Subject = " " . "Order Status";
        $headers = "Content-type:text/html;charset=UTF-8" . "\r\n";
        $Body = "Hi, There Your Order is ".$status ;

        mail($to, $Subject, $Body, $headers);

         
      }


}
?>