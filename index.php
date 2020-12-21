<?php

session_start();
if (!(isset($_SESSION["admin_id"]))) {
	header("location:login.php");
}

?>
<p>
   Index Page For Testing
</p>