<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("location:login.php");
 }
include_once('header.php');
?>
<?php
include_once('./config/dbconfig.php');
$db = new operationsorder();
$result=$db->view_recordinprocess();

?>
<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
	<div class="container-fluid">
		<div class="inner-sec-shop px-lg-4 px-3">
			
			<div class="row">
				<!-- product left -->
				<div class="side-bar col-lg-3">
					
                <a href="all.php">
                        <div class="range">
                            <h3 class="agileits-sear-head">All Orders</h3>
                        </div>
                    </a>

                    <a href="notprocess.php">
                        <div class="range">
                            <h3 class="agileits-sear-head">Not Process Yet</h3>
                        </div>
                    </a>
                    <a href="inprocess.php">
                        <div class="range">
                            <h3 class="agileits-sear-head">In Process</h3>
                        </div>
                    </a>
                    <a href="shipped.php">
                        <div class="range">
                            <h3 class="agileits-sear-head">Shipped</h3>
                        </div>
                    </a>


				</div>
				<!-- //product left -->
				<!--/product right-->


				<div class="left-ads-display col-lg-9">
					<div class="wrapper_top_shop">
					
						<div class="row">
                        <div class="table-responsive">
                            <table id="data_table" class="table table-bordered table-striped" cellspacing="0">
                                <thead>
                                    <tr>
                                  
                                        <th> Order Date</th>
                                        <th>Address</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                               
                                <tbody>

                                    <?php
                                    while ($data = mysqli_fetch_assoc($result)) {
                                    ?>
                                    
                                        <td><?php echo $data['order_date'] ?></td>
                                        <td><?php echo $data['address'] ?></td>
                                      
                                        <td><button type="button" class="btn btn-warning rounded-0">In Process</button></td>

                                        <td><a href="orderdetail.php?O_ID=<?php echo $data['order_id'] ?>" class="btn btn-secondary rounded-0">Detail</a></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
						</div>
						<!--//product right-->
					</div>
			
				</div>
			</div>
</section>


<?php include_once('footer.php');
?>