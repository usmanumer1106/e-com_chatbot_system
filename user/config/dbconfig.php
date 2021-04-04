<?php

require_once('./config/operationscategory.php');
require_once('./config/operationsuser.php');
require_once('./config/operationsproduct.php');
require_once('./config/operationscart.php');
require_once('./config/operationsorder.php');
class dbconfig
{
    public $connection;

    public function __construct()
    {
        $this->db_connect();
    }

    public function db_connect()
    {
        $this->connection = mysqli_connect('localhost', 'root', '', 'e-com');
        if (mysqli_connect_error()) {
            die(" Connect Failed ");
        }
    }

}
 
?>