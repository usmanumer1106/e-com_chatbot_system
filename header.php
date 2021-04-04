
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
    <?php include_once("css.php")?>
    <title>E-COM SYSTEM</title>

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
                        <li> <a href="notprocessorder.php">Not Process Yet<b class="label orange pull-right"></b></a></li>
                        <li> <a href="inprocessorder.php">In Process<b class="label orange pull-right"></b></a></li>
                        <li> <a href="shippedorder.php">Shipped<b class="label green pull-right"></b></a></li>
                        
                         </ul>
                </li>

                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="UI Elements">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" data-target="#ui_elements">
                        <i class="vl_slider-h-range"></i>
                        <span class="nav-link-text">Users</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="ui_elements" data-parent="#accordion">
                        <li> <a href="showuser.php">Show Users</a> </li>
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
                        <li> <a href="showcategory.php">Show Categories</a> </li>
                        <li> <a href="addcategory.php">Add Category</a> </li>
                    </ul>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Exra Pages">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" data-target="#extra_page">
                        <i class="vl_files"></i>
                        <span class="nav-link-text">Subcategories</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="extra_page" data-parent="#accordion">
                        <li> <a href="showsubcategory.php">Show Subcategory</a> </li>
                        <li> <a href="addsubcategory.php">Add Subcategory</a> </li>
                    </ul>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="UI Elements">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" data-target="#product">
                        <i class="vl_slider-h-range"></i>
                        <span class="nav-link-text">Product</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="product" data-parent="#accordion">
                        <li> <a href="showproduct.php">Show Products</a> </li>
                        <li> <a href="addproduct.php">Add Product</a></li>
                        
                    </ul>
                </li>

               
               
              

                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Account Setting">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" data-target="#accoutn_setting">
                        <i class="vl_slider-h-range"></i>
                        <span class="nav-link-text" >Account Setting</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="accoutn_setting" data-parent="#accordion">
                        <li> <a href="changepassword.php">Change Password</a></li>
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
    <?php include_once("javascript.php")?>
</body>

</html>
