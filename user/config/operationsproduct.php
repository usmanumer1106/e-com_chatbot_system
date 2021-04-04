<?php

require_once('./config/dbconfig.php');
$db = new dbconfig();

class operationsproduct extends dbconfig
{
   //View record from Database 
    public function view_record()
    {
        global $db;
        $query = "SELECT * FROM `product` ";
        $result = mysqli_query($db->connection, $query);
        return $result;
    }
    public function get_record($id)
    {
        global $db;
        $query = "SELECT * FROM `product` where product_id='$id' ";
        $result = mysqli_query($db->connection, $query);
        return $result;
    }
    public function get_size($id)
    {
        global $db;
        $sql = "SELECT *   FROM `size` WHERE product_id='$id' ";
        $data = mysqli_query($db->connection, $sql);
        return $data;
    }

public function  view_record_product($value)
    {
        global $db;
        $query = "SELECT * FROM `product` where product_name LIKE '%$value%'";
        $result = mysqli_query($db->connection, $query);
        return $result;
    }
    public function view_record_product_category($id)
    {
        global $db;
        $query = "SELECT * FROM `product` where category_id='$id'";
        $result = mysqli_query($db->connection, $query);
        return $result;
    }
    public function view_record_product_subcategory($id)
    {
        global $db;
        $query = "SELECT * FROM `product` Where subcategory_id='$id'";
        $result = mysqli_query($db->connection, $query);
        return $result;
    }
    public function view_record_category()
    {
        global $db;
        $query = "SELECT * FROM `category` LIMIT 5";
        $result = mysqli_query($db->connection, $query);
        return $result;
    }
    public function view_record_subcategory()
    {
        global $db;
        $query = "SELECT * FROM `subcategory` LIMIT 5";
        $result = mysqli_query($db->connection, $query);
        return $result;
    }

}
