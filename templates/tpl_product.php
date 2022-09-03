
<body>
		
	<div class="colorlib-loader"></div>

	<div id="page">

		{$header}

		<aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="{if $product.product_bg_image != ""}background-image: url(images/{$product.product_bg_image}){/if};">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-8 col-sm-12 col-md-offset-2 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<h2>METTEC SYSTEME</h2>
				   					{if substr(strip_tags($product.product_name),0,1) != "#"}<h1>{$product.product_name}</h1>{/if}
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>

		<div id="colorlib-services" class="">
				<div class="container">
				<div class="row">
					
					<div class="col-md-6 colorlib-heading animate-box">	
						{if substr(strip_tags($product.main_desc),0,1) != "#"}					
						
							{$product.main_desc}
												
						<br>
						{/if}
						<a class="btn-download" target="__blank" href="./brochure/{$product.brochure}">
							<i class="far fa-file-pdf" aria-hidden="true"></i>&nbsp;&nbsp;Download Brochure
						</a>
					</div>	
					<div class="col-md-6">
						<img class="img-responsive" src="images/{if $product.product_image != ""}{$product.product_image}{else}dummy-image.jpg{/if}" >
					</div>				
				</div>
				</div>
			</div>

		<div id="colorlib-about" class="colorlib-light-grey">
			<div class="container">				
				<div class="row row-pb-lg">
					<div class="col-md-8 col-md-offset-2 text-center animate-box colorlib-heading animate-box mb-0">
						<span class="sm">{if substr(strip_tags($product.content_title),0,1) != "#"}{$product.content_title}{/if}</span>	
						<br>						
					</div>					
					<div class="col-md-6">
						<img class="img-responsive" src="images/{if $product.image_1 != ""}{$product.image_1}{else}dummy-image.jpg{/if}" alt="Free HTML5 Bootstrap Template by colorlib.com">
					</div>
					<div class="col-md-6 ">
						{if substr(strip_tags($product.content_1),0,1) != "#"}
						<div class="about animate-box">
							<!-- <h2>Advantages</h2> -->
							{$product.content_1}
						</div>
						{/if}
					</div>
				</div>
				{if $product.title_info_1|strip_tags:false|substr:0:1 != "#"}
				<div class="row">
					{for $i=1 to 3}
					{if $product.{"title_info_$i"}|strip_tags:false|substr:0:1 != "#"}
					<div class="col-md-4 animate-box">
						<div class="services">
							<span class="icon">
								{if $i == 1}
								<i class="flaticon-engineering"></i>
								{elseif $i == 2}
								<i class="flaticon-sketch"></i>
								{elseif $i == 3}
								<i class="flaticon-conveyor"></i>
								{/if}
							</span>
							<div class="desc">
								{$product.{"title_info_$i"}}
								{$product.{"info_$i"}}													
							</div>
						</div>
					</div>
					{/if}
					{/for}
				</div>
				{/if}
			</div>
		</div>
		
		{if $product.application_1|strip_tags:false|substr:0:1 != "#"}
		<div id="colorlib-about">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center animate-box colorlib-heading mb-0">
						<span class="sm">Applications</span>						
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-4 col-md-offset-2 animate-box">						
						{if $product.application_1|strip_tags:false|substr:0:1 != "#"}
						<div class="services">								
							{$product.application_1}
						</div>
						{/if}
					</div>		
					<div class="col-md-4 animate-box">						
						{if $product.application_2|strip_tags:false|substr:0:1 != "#"}
						<div class="services">								
							{$product.application_2}
						</div>
						{/if}
					</div>					
				</div>
			</div>
		</div>
		{/if}
		
		{if $product.product_line_1|strip_tags:false|substr:0:1 != "#"}
		<div id="colorlib-about" {if $product.application_1|strip_tags:false|substr:0:1 != "#"}class="colorlib-light-grey"{/if}>
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center animate-box colorlib-heading mb-0">
						<span class="sm">Product Line</span>						
					</div>
				</div>
				
				<div class="row">
					{for $i=1 to 3}					
					{if $product.{"product_line_$i"}|strip_tags:false|substr:0:1 != "#"}
					<div class="col-md-4 {if $i == 1 && $product.product_line_3 == ''}col-md-offset-2{/if} animate-box">
						<div class="services">								
							{$product.{"product_line_$i"}}							
						</div>
					</div>							
					{/if}
					{/for}
				</div>
			</div>
		</div>
		{/if}

		{if substr(strip_tags($product.certification_desc),0,1) != "#" && substr(strip_tags($product.download_desc),0,1) != "#"}
		<div id="colorlib-testimony" >
			<div class="container">
				<div class="row">
					{if substr(strip_tags($product.certification_desc),0,1) != "#"}
					<div class="col-md-6 text-justify animate-box ">
						<!-- <span class="sm">Certification</span> -->
						<h2>Certification</h2>						
						{$product.certification_desc}						
					</div>		
					{/if}
					{if substr(strip_tags($product.download_desc),0,1) != "#"}
					<div class="col-md-5 col-md-offset-1 text-justify animate-box ">
						<!-- <span class="sm">Certification</span> -->
						<h2>&nbsp;</h2>
						
						{$product.download_desc}
						
						<br>
						<a class="btn-download" target="__blank" href="./brochure/{$product.brochure}">
							<i class="far fa-file-pdf" aria-hidden="true"></i>&nbsp;&nbsp;Download Brochure
						</a>
					</div>		
					{/if}		
				</div>
			</div>
		</div>
		{/if}
	
		<!-- <div id="colorlib-subscribe">
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
		</div> -->

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

