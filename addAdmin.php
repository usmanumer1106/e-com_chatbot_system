<!--PHP code contributed by Muhammad Usman Umer-->

<?php 
require_once("header.php");
require_once('./config/dbconfig.php');
$db = new operationsadmin();
?>  
 <div class="content-wrapper">
<div class="container-fluid">
               <div class="row">
                        <div class="col-xl-12 col-md-12">
                            <div class="card card-shadow mb-4">
                                <div class="card-header border-0">
                                    <div class="custom-title-wrap bar-primary">
                                        <div class="custom-title text-center"><h2> Add Admin</h2></div>
                                    </div>
                                </div>
                                <?php $db->Store_Record(); ?>
                                <div class="card-body">
                                    <form method="post">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="Name"><b>Name</b></label>
                                                <input required type="input" name="name" class="form-control rounded-0" id="Name" placeholder="Name">
                                          
                                            </div>
                                        </div>
                                        
                                       
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="email"><b>Email</b></label>
                                                <input type="email" name="email" class="form-control rounded-0" id="email" placeholder="exampale@email.com">
                                          
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="phone"><b>Contact Number</b></label>
                                                <input type="input" name="phone" class="form-control rounded-0" id="phone" placeholder="03xx xxxxxxx">
                                          
                                            </div>
                                        </div>
                                       
                                       

                                          <div class="col-md-12" >
                                          <div class="form-group">
                                                <label for="type"><b>User Type</b></label>
                                                    <select  id="type" name="type" class="form-control rounded-0">
                                                    <option value="NULL">Select User Type</option>    
                                                    <option value="su">Super User</option>  
                                                    <option value="admin">Admin</option>
                                                    </select>
                                        
                                          </div>
                                        </div>     
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="address"><b>Address</b></label>
                                                <textarea  name="address" class="form-control rounded-0" id="address">  </textarea>
                                          
                                            </div>
                                        </div>                                  
                                        
                                        <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="password"><b>Password</b></label>
                                                    <input required type="password" name="password" class="form-control" id="password" placeholder="Password" />
                                                </div>
                                        </div>
                                        <div class="col-md-12">
                                     
                                        <input id="check3" name="check3" type="checkbox" value="show password" onclick="myFunction()">
				                    
                                    	<label class="check" for="check3">Show password</label>
                                    
                                        <div class="col-md-12">

                                        <div class="text-right">
                                            <button type="submit" name="btn_addadmin" class="btn btn-purple rounded-0">Add Admin</button>
                                        </div>
                                </div>
                                    </form>
                                </div>
                         </div>
                </div>
</div>
</div> 
	<!-- script for show password -->
    <script>
				function myFunction() {
					var x = document.getElementById("password");
					if (x.type === "password") {
						x.type = "text";
					} else {
						x.type = "password";
					}
				}
			</script>
			<!-- //script for show password -->


<?php
require_once("footer.php");
?>