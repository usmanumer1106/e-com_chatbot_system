<?php
session_start();
session_unset();

if(session_destroy())
{
header("location:login.php");
}
else{
    header("location:shope.php");
}
?>