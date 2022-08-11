<nav class="colorlib-nav" role="navigation">
				<div class="top-menu">
					<div class="container">
						<div class="row">
							<div class="col-xs-2">
								<div id="colorlib-logo"><a href="./index.php?module=home"><img src="images/logo.webp"></a></div>
							</div>
							<div class="col-xs-10 text-right menu-1">
								<ul>
									<li {if $module == 'home'}class="active"{/if}><a href="./index.php?module=home">Home</a></li>
									<li {if $module == 'about'}class="active"{/if}><a href="./index.php?module=about">About</a></li>
									<li ></li>
									<li class="has-dropdown {if $module == 'products' || $module == 'product'}active{/if}">
									<a href="./index.php?module=products">Products</a>
										<ul class="dropdown">
											<!-- <li><a href="./index.php?module=product&product_id=1">Sample 1</a></li> -->
											{foreach $products as $v}
											<li {if $product_id == $v.product_id}class="active"{/if}><a href="./index.php?module=product&product_id={$v.product_id}">{$v.product_name}</a></li>
											{/foreach}
										</ul>
									</li>
									<li {if $module == 'contact'}class="active"{/if}><a href="./index.php?module=contact">Contact</a></li>
									<li {if $module == 'login'}class="active"{/if}><a href="./index.php?module=login">Login</a></li>
									<!-- <li class="has-dropdown">
										<a href="./index.php?module=work">Projects</a>
										<ul class="dropdown">
											<li><a href="#">Commercial</a></li>
											<li><a href="#">Apartment</a></li>
											<li><a href="#">House</a></li>
											<li><a href="#">Building</a></li>
										</ul>
									</li>
									
									<li><a href="./index.php?module=blog">Blog</a></li> -->
								</ul>
							</div>
						</div>
					</div>
				</div>
			</nav>