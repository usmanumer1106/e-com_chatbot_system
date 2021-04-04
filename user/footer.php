<footer class="py-lg-5 py-3">
			<div class="container-fluid px-lg-5 px-3">
				<div class="row footer-top-w3layouts">
					<div class="col-lg-3 footer-grid-w3ls">
						<div class="footer-title">
							<h3>About Us</h3>
						</div>
						<div class="footer-text">
							<p>This is Apna Store Welcome Here You are most Welcome Here.</p>
							<ul class="footer-social text-left mt-lg-4 mt-3">

								<li class="mx-2">
									<a href="#">
										<span class="fab fa-facebook-f"></span>
									</a>
								</li>
								<li class="mx-2">
									<a href="#">
										<span class="fab fa-twitter"></span>
									</a>
								</li>
							
							</ul>
						</div>
					</div>
					<div class="col-lg-3 footer-grid-w3ls">
						<div class="footer-title">
							<h3>Get in touch</h3>
						</div>
						<div class="contact-info">
							<h4>Location :</h4>
							<p>Sargodha</p>
						
						</div>
					</div>
					<div class="col-lg-3 footer-grid-w3ls">
						<div class="footer-title">
							<h3>Quick Links</h3>
						</div>
						<ul class="links">
							<li>
								<a href="index.html">Home</a>
							</li>
							<li>
								<a href="about.html">About</a>
							</li>
						
							<li>
								<a href="contact.html">Contact Us</a>
							</li>
						</ul>
					</div>
					<div class="col-lg-3 footer-grid-w3ls">
						<div class="footer-title">
							<h3>Sign up for your offers</h3>
						</div>
						<div class="footer-text">
							<p>By subscribing to our mailing list you will always get latest news and updates from us.</p>
							<form action="#" method="post">
								<input class="form-control" type="email" name="Email" placeholder="Enter your email..." required="">
								<button class="btn1">
									<i class="far fa-envelope" aria-hidden="true"></i>
								</button>
								<div class="clearfix"> </div>
							</form>
						</div>
					</div>
				</div>
				<div class="copyright-w3layouts mt-4">
					<p class="copy-right text-center ">&copy; 2021 APNA STORE All Rights Reserved | Design by
						<a href="mailto:usmanumer1106@gmail.com"> Muhammad Usman Umer </a>
					</p>
				</div>
			</div>
        </footer>
        

        <!--jQuery-->
		<script src="js/jquery-2.2.3.min.js"></script>
		<!-- newsletter modal -->
		<!--search jQuery-->
		<script src="js/modernizr-2.6.2.min.js"></script>
		<script src="js/classie-search.js"></script>
		<script src="js/demo1-search.js"></script>
		<!--//search jQuery-->
	

		<script src="js/owl.carousel.js"></script>
		<script>
			$(document).ready(function () {
				$('.owl-carousel').owlCarousel({
					loop: true,
					margin: 10,
					responsiveClass: true,
					responsive: {
						0: {
							items: 1,
							nav: true
						},
						600: {
							items: 2,
							nav: false
						},
						900: {
							items: 3,
							nav: false
						},
						1000: {
							items: 4,
							nav: true,
							loop: false,
							margin: 20
						}
					}
				})
			})
		</script>

		<!-- //end-smooth-scrolling -->


		
		<script src="js/move-top.js"></script>
    <script src="js/easing.js"></script>
    <script>
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event) {
                event.preventDefault();
                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 900);
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            /*
            						var defaults = {
            							  containerID: 'toTop', // fading element id
            							containerHoverID: 'toTopHover', // fading element hover id
            							scrollSpeed: 1200,
            							easingType: 'linear' 
            						 };
            						*/

            $().UItoTop({
                easingType: 'easeOutQuart'
            });

        });
    </script>
    <!--// end-smoth-scrolling -->

		<script src="js/bootstrap.js"></script>
        <!-- js file -->
        
