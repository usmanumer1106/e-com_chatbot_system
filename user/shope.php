<?php
session_start();
include_once('header.php');

$con = mysqli_connect('localhost', 'root', '', 'e-com');
$query = "SELECT count(product_id) as count  FROM `product` ";
$result = mysqli_query($con, $query);
$data = mysqli_fetch_array($result);
$totalrecords = $data['count'];
$limit = 8;
$totalpages = ceil($totalrecords / $limit);
if (isset($_GET['pageNo'])) {
	$pageNo = $_GET['pageNo'];
} else {
	$pageNo = 1;
}
$offset = ($limit * $pageNo) - $limit;
$query = "select * from product limit $offset,$limit";
$result = mysqli_query($con, $query);


include_once('./config/dbconfig.php');
include_once('./config/operationscart.php');
$db = new operationsproduct();
$db2 = new operationscart();
if (isset($_POST['search'])) {
	$id = $_POST['searchvalue'];
	$result = $db->view_record_product($id);
} else if (isset($_GET['C_ID'])) {
	$id = $_GET['C_ID'];
	$result = $db->view_record_product_category($id);
} else if (isset($_GET['SC_ID'])) {
	$id = $_GET['SC_ID'];
	$result = $db->view_record_product_subcategory($id);
} else {
	//	$result = $db->view_record();
}
$result2 = $db->view_record_category();
$result3 = $db->view_record_subcategory();
$db2->Store_Record();
?>
<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
	<div class="container-fluid">
		<div class="inner-sec-shop px-lg-4 px-3">

			<div class="row">
				<!-- product left -->
				<div class="side-bar col-lg-3">
					<div class="search-hotel">
						<h3 class="agileits-sear-head">Search Here..</h3>
						<form action="#" method="post">
							<input class="form-control" type="search" name="searchvalue" placeholder="Search here..." required="">
							<button class="btn1" name="search" type="submit">
								<i class="fas fa-search"></i>
							</button>
							<div class="clearfix"> </div>
						</form>
					</div>
					<!-- price range -->
					<div class="range">
						<h3 class="agileits-sear-head">Categories</h3>
						<ul class="dropdown-menu6">
							<?php
							while ($data = mysqli_fetch_assoc($result2)) {
							?>
								<li>
									<a href="shope.php?C_ID=<?php echo $data['category_id'] ?>"><?php echo $data['category_name'] ?></a>
								</li>
							<?php } ?>
						</ul>
					</div>
					<!-- //price range -->


					<!-- price range -->
					<div class="range">
						<h3 class="agileits-sear-head">Subategories</h3>
						<ul class="dropdown-menu6">
							<?php
							while ($data = mysqli_fetch_assoc($result3)) {
							?>
								<li>
									<a href="shope.php?SC_ID=<?php echo $data['subcategory_id'] ?>"><?php echo $data['subcategory_name'] ?></a>
								</li>
							<?php } ?>
						</ul>
					</div>
					<!-- //price range -->
				</div>
				<!-- //product left -->
				<!--/product right-->


				<div class="left-ads-display col-lg-9">
					<div class="wrapper_top_shop">
						<div class="row">
							<div class="col-md-6 shop_left">
								<img src="images/banner3.jpg" alt="">
								<h6>40% off</h6>
							</div>
							<div class="col-md-6 shop_right">
								<img src="images/banner4.jpg" alt="">
								<h6>50% off</h6>
							</div>

						</div>
						<div class="row">
							<?php $n = 0;
							while ($data = mysqli_fetch_assoc($result)) {
							?>
								<div class="col-md-3 product-men women_two shop-gd">
									<div class="product-googles-info googles" style="margin-bottom: 15px;">
										<div class="men-pro-item" >
											<div class="men-thumb-item" >
												<img height="250px" src="../<?php echo $data['product_image'] ?>" alt="">
												<div class="men-cart-pro">
													<div class="inner-men-cart-pro">
														<a href="singleproduct.php?p_id=<?php echo $data['product_id'] ?>" class="link-product-add-cart">Quick View</a>
													</div>
												</div>
												<span class="product-new-top"><?php if ($data['product_status'] == 1) {
																					echo "Sale";
																				} else {
																					echo "Regular";
																				} ?></span>
											</div>
											<div class="item-info-product">
												<div class="info-product-price">
													<div class="grid_meta">
														<div class="product_price">
															<h4>
																<a href="singleproduct.php"><?php echo $data['product_name']; ?></a>
															</h4>
															<div class="grid-price mt-2">
																<span class="money "><b>Rs</b><?php if ($data['product_status'] == 1) {
																									echo $data['product_discount'];
																								} else {
																									echo $data['product_price'];
																								} ?></span>
															</div>
														</div>

													</div>
													<div class="googles single-item hvr-outline-out">
														<form action="#" method="post">
															<input type="hidden" name="id" value="<?php echo $data['product_id']; ?>">
															<input type="hidden" name="image" value="<?php echo $data['product_image']; ?>">
															<input type="hidden" name="name" value="<?php echo $data['product_name']; ?>">
															<input type="hidden" name="price" value="<?php echo $data['product_price']; ?>">
															<button type="submit" class="googles-cart pgoogles-cart" name="btn_cart">
																<i class="fas fa-cart-plus"></i>
															</button>
														</form>

													</div>
												</div>
												<div class="clearfix"></div>
											
											</div>
										</div>
									</div>
								</div>
							
								<?php $n++;
								if ($n == 4) {
									$n = 0; ?>
									<div class="clearfix"></div>
									
								<?php } ?>

							<?php } ?>

						</div>
						<!--//product right-->
						<div class="row">
							<div class="col-md-12">
								<div class="product-pagination text-center">
									<nav>
									<div style="margin-top: 20px;"></div>
										<ul class="pagination">
											<?php
											if ($pageNo != 1) {

											?>
												<li>
													<a href="shope.php?pageNo=<?php echo --$pageNo; ?>" aria-label="Previous" class="form-control">
														<span aria-hidden="true">&laquo;</span>
													</a>
												</li>
											<?php
											}
											for ($i = 1; $i <= $totalpages; $i++) {
											?>
												<li class="form-control"><a href="shope.php?pageNo=<?php echo $i; ?>"><?php echo $i; ?></a></li>
											<?php
											}
											if ($pageNo != $totalpages) {
											

											?>

												<li>
													<a href="shope.php?PageNo=<?php echo ++$pageNo; ?>" aria-label="Next" class="form-control">
														<span aria-hidden="true">&raquo;</span>
													</a>
												</li>
											<?php } ?>
										</ul>
									</nav>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
</section>


<?php include_once('footer.php');
?>