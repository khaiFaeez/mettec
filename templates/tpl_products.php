
	<body>
			
		<div class="colorlib-loader"></div>

		<div id="page">
			
			{$header}
			
			<aside id="colorlib-hero">
				<div class="flexslider">
					<ul class="slides">
				   	<li style="background-image: url(images/786092152.jpg);">
				   		<div class="overlay"></div>
				   		<div class="container-fluid">
				   			<div class="row">
					   			<div class="col-md-8 col-sm-12 col-md-offset-2 slider-text">
					   				<div class="slider-text-inner text-center">
					   					<h2>METTIC SYSTEME</h2>
					   					<h1>Our Products</h1>
					   				</div>
					   			</div>
					   		</div>
				   		</div>
				   	</li>
				  	</ul>
			  	</div>
			</aside>

			<div id="colorlib-services" class="pb-0">
				<div class="container">
				<div class="row">
					<div class="col-md-6 colorlib-heading animate-box">						
						<p class="text-justify">
							Mettic Systeme provides a wide range of construction materials and construction chemicals. The harmonized product range allows the easy selection as well as ideal combination and processing of individual construction materials.
						</p>
						<p class="text-justify">
							Thanks to versatile fields of application such as commercial and residential buildings, bridges, power plants, marine engineering, railways, the proper function of project site can be ensured in the long run by the use of our product systems
						</p>
					</div>
					<div class="col-md-5 col-md-offset-1 colorlib-heading animate-box">						
						
						<img class="img-responsive" src="images/1262474764.jpg" alt="Free HTML5 Bootstrap Template by colorlib.com">
					</div>
				</div>
				</div>
			</div>

			<div id="colorlib-services">
				<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center animate-box colorlib-heading animate-box" style="margin-bottom: 1em;">
						<span class="sm">OUR PRODUCTS</span>
						<h2><span class="thin">Our Proprietary</span> <span class="thick"> Engineering Products</span></h2>
						
					</div>
					<div class="col-md-12" style="margin-bottom: 1em;">
						<p class="text-center">Thanks to versatile fields of application such as commercial and residential buildings, bridges, power plants, marine engineering, railways, the proper function of project site can be ensured in the long run by the use of our product systems</p>
					</div>
				</div>
				<div class="row">
					{foreach $products as $v}
						<div class="col-md-4 text-center animate-box">
							<div class="staff" class="staff-img" style="background-image: url(images/{$v.product_image});">
								<a href="./index.php?module=product&product_id={$v.product_id}" class="desc">
									<h3>{$v.product_name}</h3>
									<!-- <span>learn more</span> -->
									<div class="parag">
										<p class="text-justify">{$v.short_desc}</p>
									</div>
								</a>
							</div>
						</div>
					{/foreach}	
					</div>					
				</div>
			</div>
		
			<div id="colorlib-subscribe">
				<div class="overlay"></div>
				<div class="container">
					<div class="row">
						<div class="col-md-12 col-md-offset-0 colorlib-heading animate-box">
							<h2>Sign up for a Newsletter</h2>
							<div class="row">
								<div class="col-md-7">
									<p>Enter your email address to get the latest news, events and special offers delivered right to your inbox.</p>
								</div>
								<div class="col-md-5">
									<form class="form-inline qbstp-header-subscribe">
										<div class="row">
											<div class="col-md-12 col-md-offset-0">
												<div class="form-group">
													<input type="text" class="form-control" id="email" placeholder="Enter your email">
													<button type="submit" class="btn btn-primary">Subscribe</button>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			{$footer}
		</div>

		<div class="gototop js-top">
			<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
		</div>
		
		<!-- jQuery -->
		<script src="js/jquery.min.js"></script>
		<!-- jQuery Easing -->
		<script src="js/jquery.easing.1.3.js"></script>
		<!-- Bootstrap -->
		<script src="js/bootstrap.min.js"></script>
		<!-- Waypoints -->
		<script src="js/jquery.waypoints.min.js"></script>
		<!-- Stellar Parallax -->
		<script src="js/jquery.stellar.min.js"></script>
		<!-- Flexslider -->
		<script src="js/jquery.flexslider-min.js"></script>
		<!-- Owl carousel -->
		<script src="js/owl.carousel.min.js"></script>
		<!-- Magnific Popup -->
		<script src="js/jquery.magnific-popup.min.js"></script>
		<script src="js/magnific-popup-options.js"></script>
		<!-- Counters -->
		<script src="js/jquery.countTo.js"></script>
		<!-- Main -->
		<script src="js/main.js"></script>

	</body>


