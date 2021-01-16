<!-- php code in this page is  contributed by Muhammad Usman Umer -->
<?php
session_start();
if(!(isset($_SESSION['adminid'])))
{
    header("location:login.php");
}
require_once('./config/dbconfig.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">

    <!--favicon icon-->
    <link rel="icon" type="image/png" href="assets/img/favicon.html">

    <title>E-COM CHATBOT SYSTEM</title>

    <!--web fonts-->
    <link href="http://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

    <!--bootstrap styles-->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!--icon font-->
    <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/vendor/dashlab-icon/dashlab-icon.css" rel="stylesheet">
    <link href="assets/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
    <link href="assets/vendor/themify-icons/css/themify-icons.css" rel="stylesheet">
    <link href="assets/vendor/weather-icons/css/weather-icons.min.css" rel="stylesheet">

    <!--custom scrollbar-->
    <link href="assets/vendor/m-custom-scrollbar/jquery.mCustomScrollbar.css" rel="stylesheet">

    <!--jquery dropdown-->
    <link href="assets/vendor/jquery-dropdown-master/jquery.dropdown.css" rel="stylesheet">

    <!--jquery ui-->
    <link href="assets/vendor/jquery-ui/jquery-ui.min.css" rel="stylesheet">

    <!--iCheck-->
    <link href="assets/vendor/icheck/skins/all.css" rel="stylesheet">

    <!--vector maps -->
    <link href="assets/vendor/vector-map/jquery-jvectormap-1.1.1.css" rel="stylesheet" >

    <!--c3chart-->
    <link href="assets/vendor/c3chart/c3.min.css" rel="stylesheet">

    <!--custom styles-->
    <link href="assets/css/main.css" rel="stylesheet">

</head>

<body class="fixed-nav">

    <!--navigation : sidebar & header-->
    <nav class="navbar navbar-expand-lg fixed-top navbar-light" id="mainNav">

        <!--brand name-->
        <a class="navbar-brand" href="#" data-jq-dropdown="#jq-dropdown-1">
            <img class="pr-3 float-left" src="assets/img/logo-icon.png" srcset="assets/img/logo-icon@2x.png 2x"  alt=""/>
            <div class="float-left">
                <div> <i >E-COM SYSTEM</i></div>
            </div>
        </a>
        <!--/brand name-->
        <!--responsive nav toggle-->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!--/responsive nav toggle-->
      

        <div class="collapse navbar-collapse" id="navbarResponsive">

            
            <!--left side nav-->
            <ul class="navbar-nav left-side-nav" id="accordion">

                

                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                    <a class="nav-link nav-link-collapse" data-toggle="collapse" data-target="#dashboard">
                        <i class="vl_dashboard"></i>
                        <span class="nav-link-text">Orders </span>
                    </a>
                    <ul class="sidenav-second-level collapse show" id="dashboard" data-parent="#accordion">
                        <li class="active"> <a href="index.php">Dashboard</a> </li>
                        <li> <a href="###">Not Process Yet<b class="label orange pull-right"></b></a></li>
                        <li> <a href="###">In Process<b class="label orange pull-right"></b></a></li>
                        <li> <a href="###">Shipped<b class="label green pull-right"></b></a></li>
                        
                         </ul>
                </li>

                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="UI Elements">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" data-target="#ui_elements">
                        <i class="vl_slider-h-range"></i>
                        <span class="nav-link-text">Users</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="ui_elements" data-parent="#accordion">
                        <li> <a href="###">Show Users</a> </li>
                        <li> <a href="showadmin.php">Show Admin</a> </li>
                        <li> <a href="addadmin.php">Add Admin</a></li>
                    </ul>
                </li>
        

                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Widgets">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" data-target="#widgets">
                        <i class="vl_bond"></i>
                        <span class="nav-link-text">Categories</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="widgets" data-parent="#accordion">
                        <li> <a href="###">Show Categories</a> </li>
                        <li> <a href="###">Add Category</a> </li>
                    </ul>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Exra Pages">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" data-target="#extra_page">
                        <i class="vl_files"></i>
                        <span class="nav-link-text">Subcategories</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="extra_page" data-parent="#accordion">
                        <li> <a href="###">Show Subcategory</a> </li>
                        <li> <a href="###">Add Subcategory</a> </li>
                    </ul>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="UI Elements">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" data-target="#product">
                        <i class="vl_slider-h-range"></i>
                        <span class="nav-link-text">Product</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="product" data-parent="#accordion">
                        <li> <a href="###">Show Products</a> </li>
                        <li> <a href="###">Add Product</a></li>
                        
                    </ul>
                </li>

               
               
              

                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Account Setting">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" data-target="#accoutn_setting">
                        <i class="vl_slider-h-range"></i>
                        <span class="nav-link-text" >Account Setting</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="accoutn_setting" data-parent="#accordion">
                        <li> <a href="####">Change Password</a></li>
                        <li> <a href="signout.php">Sign Out</a></li>
                    </ul>
                </li>
                
                

               
            </ul>
            <!--/left side nav-->

            <!--nav push link-->
            <ul class="navbar-nav sidenav-toggler">
                <li class="nav-item">
                    <a class="nav-link text-center" id="left-nav-toggler">
                        <i class="fa fa-angle-left"></i>
                    </a>
                </li>
            </ul>
            <!--/nav push link-->

           

            <!--header rightside links-->
            <ul class="navbar-nav header-links ml-auto hide-arrow">
              
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle mr-lg-3" id="userNav" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="user-thumb">
                            <b><?php
                            echo $_SESSION["adminname"];
                            ?></b>
                            <img class="rounded-circle" src="assets/img/avatar/avatar1.jpg" alt=""/>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userNav">
                       
                        <a class="dropdown-item" href="changepassword.php">Change Password</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="signout.php">Sign Out</a>
                    </div>
                </li>
                
            </ul>
            <!--/header rightside links-->

        </div>
    </nav>
    <!--/navigation : sidebar & header-->























    <!--basic scripts-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/jquery-ui/jquery-ui.min.js"></script>
    <script src="assets/vendor/popper.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>

    <script src="assets/vendor/jquery-dropdown-master/jquery.dropdown.js"></script>

    <script src="assets/vendor/m-custom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>

    <!--sparkline-->
    <script src="assets/vendor/sparkline/jquery.sparkline.js"></script>
    <!--sparkline initialization-->
    <script src="assets/vendor/js-init/sparkline/init-sparkline.js"></script>

    <!--c3chart-->
    <script src="assets/vendor/c3chart/d3.min.js"></script>
    <script src="assets/vendor/c3chart/c3.min.js"></script>
    <!--c3chart initialization-->
    <script src="assets/vendor/js-init/c3chart/init-c3chart.js"></script>

    <!--chartjs-->
    <script src="assets/vendor/chartjs/Chart.bundle.min.js"></script>
    <!--chartjs initialization-->
    <script src="assets/vendor/js-init/chartjs/init-creative-state-chart.js"></script>
    <script src="assets/vendor/js-init/chartjs/init-area-chart.js"></script>
    <script src="assets/vendor/js-init/chartjs/init-line-chart.js"></script>
    <script src="assets/vendor/js-init/chartjs/init-doughnut-chart.js"></script>
    <script src="assets/vendor/js-init/chartjs/init-doughnut-chart2.js"></script>
    <script src="assets/vendor/js-init/chartjs/init-sales-report-chart.js"></script>
    <script src="assets/vendor/js-init/chartjs/init-bubble-chart.js"></script>

    <!--flot chart-->
    <script src="assets/vendor/flot/jquery.flot.min.js"></script>
    <script src="assets/vendor/flot/jquery.flot.pie.min.js"></script>
    <script src="assets/vendor/flot/jquery.flot.tooltip.min.js"></script>
    <!--flot chart initialization-->
    <script src="assets/vendor/js-init/flot/init-flot-widget.js"></script>

    <!--vectormap-->
    <script src="assets/vendor/vector-map/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="assets/vendor/vector-map/jquery-jvectormap-world-mill-en.js"></script>
    <!--vectormap initialization-->
    <script src="assets/vendor/js-init/vmap/init-vmap-world.js"></script>

    <!--[if lt IE 9]>
    <script src="assets/vendor/modernizr.js"></script>
    <![endif]-->

    <!--basic scripts initialization-->
    <script src="assets/js/scripts.js"></script>
     <!--datatables-->
     <script src="assets/vendor/data-tables/jquery.dataTables.min.js"></script>
    <script src="assets/vendor/data-tables/dataTables.bootstrap4.min.js"></script>
    <!--init datatable-->
    <script src="assets/vendor/js-init/init-datatable.js"></script>
 

      <!--select2-->
      <script src="assets/vendor/select2/js/select2.min.js"></script>
    <!--init select2-->
    <script src="assets/vendor/js-init/init-select2.js"></script>
   
     <!--[if lt IE 9]>
    <script src="assets/vendor/modernizr.js"></script>
    <![endif]-->
 <!--jquery validate-->
 <script src="assets/vendor/jquery-validation/jquery.validate.min.js"></script>

<!--jquery steps-->
<script src="assets/vendor/jquery-steps/jquery.steps.min.js"></script>
<!--init steps-->
<script src="assets/vendor/js-init/init-form-wizard.js"></script>

<!--jquery stepy-->
<script src="assets/vendor/jquery-steps/jquery.stepy.js"></script>
 <!--dropzone-->
 <script src="assets/vendor/dropzone/dropzone.js"></script>
    <!--init dropzone-->
    <script src="assets/vendor/js-init/init-dropzone.js"></script>
 
    <!--init date picker-->
    <script src="assets/vendor/date-picker/js/bootstrap-datepicker.min.js"></script>
    <script src="assets/vendor/js-init/pickers/init-date-picker.js"></script>

    


    <link href="assets/vendor/data-tables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="assets/vendor/select2/css/select2.css" rel="stylesheet">
       <!--dropzone-->
       <link href="assets/vendor/dropzone/dropzone.min.css" rel="stylesheet">
    <!--date picker-->
    <link href="assets/vendor/date-picker/css/bootstrap-datepicker.min.css" rel="stylesheet">
    
      <!--custom scrollbar-->
      <link href="assets/vendor/m-custom-scrollbar/jquery.mCustomScrollbar.css" rel="stylesheet">

<!--jquery dropdown-->
<link href="assets/vendor/jquery-dropdown-master/jquery.dropdown.css" rel="stylesheet">

<!--jquery ui-->
<link href="assets/vendor/jquery-ui/jquery-ui.min.css" rel="stylesheet">









</body>

</html>
