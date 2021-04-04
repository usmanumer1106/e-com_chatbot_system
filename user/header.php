<?php
$n = 0;
if (isset($_SESSION['cart'])) {
	foreach ($_SESSION['cart'] as $id => $CartData) {
		$n++;
	}
}
?>
<script>
	addEventListener("load", function() {
		setTimeout(hideURLbar, 0);
	}, false);

	function hideURLbar() {
		window.scrollTo(0, 1);
	}
</script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/login_overlay.css" rel='stylesheet' type='text/css' />
<link href="css/style6.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/shop.css" type="text/css" />
<link rel="stylesheet" href="css/owl.carousel.css" type="text/css" media="all">
<link rel="stylesheet" href="css/owl.theme.css" type="text/css" media="all">
<link rel="stylesheet" type="text/css" href="css/jquery-ui1.css">
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/fontawesome-all.css" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Inconsolata:400,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800" />
<link rel="stylesheet" type="text/css" href="css/checkout.css">


<head>
<title>E-COM SYSTEM</title>
</head>

<header>
	<div class="row">
		<div class="col-md-3 top-info text-left mt-lg-4">
			<h6>Need Help</h6>
			<ul>
				<li>
					<i class="fas fa-phone"></i> Call
				</li>
				<li class="number-phone mt-3">0320-8500106</li>
			</ul>
		</div>
		<div class="col-md-6 logo-w3layouts text-center">
			<h1 class="logo-w3layouts">
				<a class="navbar-brand" href="shope.php">
					Apna Store </a>
			</h1>
		</div>

		<div class="col-md-3 top-info-cart text-right mt-lg-4">
			<ul class="cart-inner-info">
				
				<li class="galssescart galssescart2 cart cart box_1">
					<form action="cart.php" method="post" class="last">

						<button class="top_googles_cart" type="submit" name="submit">
							My Cart
							<i class="fas fa-cart-arrow-down"></i>
							<span style=" font-size:16px; padding-left:2px;    background-color:red; width:16px; line-height: 16px; text-align: center; color:#fff;      "><?php echo $n; ?>
							</span>
						</button>
					</form>

				</li>
			</ul>

		</div>
	</div>
	<div class="search">
		<div class="mobile-nav-button">
			<button id="trigger-overlay" type="button">
				<i class="fas fa-search"></i>
			</button>
		</div>
		<!-- open/close -->
		<div class="overlay overlay-door">
			<button type="button" class="overlay-close">
				<i class="fa fa-times" aria-hidden="true"></i>
			</button>
			<form action="#" method="post" class="d-flex">
				<input class="form-control" type="search" placeholder="Search here..." required="">
				<button type="submit" class="btn btn-primary submit">
					<i class="fas fa-search"></i>
				</button>
			</form>

		</div>
		<!-- open/close -->
	</div>
	<label class="top-log mx-auto"></label>
	<nav class="navbar navbar-expand-lg navbar-light bg-light top-header mb-2">

		<button class="navbar-toggler mx-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon">

			</span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav nav-mega mx-auto">
				<li class="nav-item">
					<a class="nav-link ml-lg-0" href="shope.php">Home
						<span class="sr-only">(current)</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="all.php">My Order</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="shope.php">Shope</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="account.php">My Account</a>
				</li>
				<li class="button-log" style="font-size:30px;">
					<a class="btn-open" href="#">
						<span class="fa fa-user"></span>
						<?php if (isset($_SESSION['user_id'])) {

						?>
							<a href="logout.php">Logout </a>
						<?php } else { ?>
							<a href="login.php">Login </a>
						<?php } ?>

					</a>
				</li>

			</ul>

		</div>
	</nav>
</header>