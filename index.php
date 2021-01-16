<!-- php code contributed by Muhammad Usman Umer -->

<?php 
   require_once("header.php");
   require_once('./config/dbconfig.php');
?>
<div class="content-wrapper">

<!--creative states-->
<div class="creative-state-area">
    <div class="row">
        <div class="col-lg-7 col-12">
            <h4 class="creative-state-title">Overall Complaints Report</h4>
        </div>
        <div class="col-lg-5  col-12 text-lg-right">
            <div class="row short-states mb-lg-0 mb-4">
               
             
            </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-4">
            <div class=" bg-danger text-center pull-left">
              
            </div>
            <div class="creative-state-info text-center pull-left">
                <h3 class="mt-4"></h3>
                <p class="mb-0">Total Orders</p>
                
              

            </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-4">
            <div class=" bg-warning text-center pull-left">
              
            </div>
            <div class="creative-state-info text-center pull-left">
                <h3 class="mt-4"></h3>
                <p class="mb-0">Resolved Orders</p>
                
            </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-4">
            <div class=" bg-purple text-center pull-left"> 
            </div>
            <div class="creative-state-info text-center pull-left">
                <h3 class="mt-4"></h3>
                <p class="mb-0">Pending Orders</p>
               
            </div>
        </div>
    </div>
</div>
<!--/creative states-->


<?php
require_once('footer.php');
?>