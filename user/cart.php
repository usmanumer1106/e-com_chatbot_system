<?php
session_start();
include_once('header.php');
include_once('./config/operationscart.php');
$db = new operationscart();
$db->Store_Record();

?>


<!--checkout-->

<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
	<div class="container">
		<div class="inner-sec-shop px-lg-4 px-3">
			<h3 class="tittle-w3layouts my-lg-4 mt-3">Checkout </h3>
			<div class="checkout-right">
				<h4>Your shopping cart contains:
					<span><?php echo $n; if($n==0){unset( $_SESSION['cart']);} ?> Products</span>
				</h4>
<b>Note* To Change Size Go to Single Product Page</b>
				<table class="timetable_sub">
					<thead>
						<tr>
							<th>SL No.</th>
							<th>Product</th>
							<th>Quantity</th>
							<th>Size</th>
							<th>Product Name</th>
							<th>Price</th>
							<th>Total</th>
							<th>Remove</th>
						</tr>
					</thead>

					<tbody>
						<?php $n = 1;
						$total = 0;
						if (isset($_SESSION['cart'])) {
							foreach ($_SESSION['cart'] as $id => $CartData) {
								$subtotal = $CartData['price'] * $CartData['quantity'];
								$total += $subtotal;
						?>
								<tr class="rem1">
									<td class="invert"> <?php echo $n;
														$n++; ?></td>
									<td >

										<a href="singleproduct.php?p_id=<?php echo $CartData['id']; ?>">
											<img height="200px" width="150px" src="../<?php echo $CartData['image']; ?>" >

										</a>
									</td>
									<form method="post">
										<td class="invert">
											<div class="quantity">
												<div class="quantity-select">
													<button class="entry value-minus" name="btn_minus">&nbsp;</button>
													<div class="entry value">
														<span><?php echo $CartData['quantity']; ?></span>
													</div>
													<input type="hidden" name="id" value="<?php echo $CartData['id']; ?>">
													<button class="entry value-plus active" name="btn_plus">&nbsp;</button>
												</div>
											</div>
										</td>
										<td class="invert"><?php echo $CartData['size']; ?></td>
										<td class="invert"><?php echo $CartData['name']; ?></td>

										<td class="invert"><?php echo $CartData['price']; ?></td>
										<td class="invert"><?php echo $subtotal; ?></td>
										<td class="invert">
											<div class="rem">

												<button class="close1" style=" border: none; " name="delete"> </button>
											</div>

										</td>
									</form>
								</tr>

							<?php }
						} else { ?>
							<tr>
								<td style="color: red;  font-size:25px;" colspan="7">No Item In Cart</td>

							</tr>
						<?php } ?>
						<tr>
							<b>
								<td style="color: black; font-size:20px;" colspan="2">Total Price</td>
								<td style="color: black; font-size:20px;" colspan="6"><?php echo $total; ?></td>
							</b>
						</tr>

					</tbody>
				</table>
			</div>


			<div class="col-md-12 address_form">
				<?php if (isset($_SESSION['cart'])) { ?>
					<div class="checkout-right-basket">
						<a href="checkout.php">Checkout</a>
					</div>
				<?php } ?>
			</div>


			<div class="clearfix"> </div>

		</div>

	</div>

	</div>
</section>
<!--//checkout-->





<?php
include_once('footer.php');


?>