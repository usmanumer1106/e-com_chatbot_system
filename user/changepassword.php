<?php 
session_start();
require_once("header.php");
require_once('./config/dbconfig.php');
$db = new operationsuser();

?>  
 <div class="content-wrapper">
<div class="container-fluid">
               <div class="row">
                        <div class="col-xl-12 col-md-12">
                            <div class="card card-shadow mb-4">
                                <div class="card-header border-0">
                                    <div class="custom-title-wrap bar-primary">
                                        <div class="custom-title text-center"><h3> Change Password</h3></div>
                                    </div>
                                </div>
                                <?php $db->changepassword(); ?>
                                <div class="card-body">
                                <div class="col-md-12"> 
                                    <form method="post">
                                        <div class="form-group">
                                            <label for="exampleInputEmail11"><b>Old Password</b></label>
                                            <input type="input" name="old_password" class="form-control rounded-0" placeholder="Old Password">
                                        </div>
                                        <div class="form-group">
                                            <label for="password"><b>New Password</b></label>
                                            <input  id="password" type="password" name="new_password" class="form-control rounded-0" placeholder="New Password" onchange='check_pass()'>
                                        </div>
                                        <div class="form-group">
                                            <label for="password"><b>Confirm Password</b></label>
                                            <input  id="confirm_password" type="password" class="form-control rounded-0" placeholder="New Password" onchange='check_pass()'>
                                        </div>
                                      
                                        <div id="message" ></div>
                                        <div class="agile_label">
					<input id="check3" name="check3" type="checkbox" value="show password" onclick="myFunction()">
					<label class="check" for="check3">Show password</label>
				</div>
                                        
                                      <div class="col-md-12">  
                                        <div class="text-right">
                                            <button type="submit" id="change" name="btn_change" class="btn btn-purple rounded-0" >Change Password</button>
                                        </div>
                                        </div>
                                    </form>
                                </div>
                         </div>
                </div>
</div>
</div>
<script>
				function myFunction() {
                     var x = document.getElementById("password");
                     var y = document.getElementById("confirm_password");
                    if (x.type === "password") 
                    {
						x.type = "text";
                        y.type= "text";
					} else {
						x.type = "password";
                        y.type = "password";
                    }
 
  
                         
       }
       $('#password, #confirm_password').on('keyup', function () {
  if (($('#password').val() == $('#confirm_password').val()) && $('#password').val() !=" ") {
   
    $('#message').html('Matching').css('color', 'green');
   
    
  } else 
    $('#message').html('Not Matching').css('color', 'red');
 
}); 
               
		</script>             
                 
<?php
require_once("footer.php");
?>