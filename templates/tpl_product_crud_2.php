
<body>
		
	<div class="colorlib-loader"></div>

	<div id="page">		

		<div id="colorlib-services" class="">
				<div class="container">

				<div class="row">
					<div id="colorlib-logo"><a href="./index.php?module=home"><img src="images/logo.png"></a></div>
					<br>
				</div>
				{if $message_type != ""}
				<div class="row">
				{if $message_type == 1}
				<div class="alert alert-success  fade in" role="alert">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				  Adding new product successful.
				</div>
				{elseif $message_type == 2}
				<div class="alert alert-danger" role="alert">
				  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				  Error adding new product.
				</div>
				{elseif $message_type == 3}
				<div class="alert alert-success" role="alert">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				  Editing existing product successful.
				</div>
				{elseif $message_type == 4}
				<div class="alert alert-danger" role="alert">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				  Error editing product.
				</div>
				{elseif $message_type == 5}
				<div class="alert alert-success" role="alert">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				  Delete product successful.
				</div>
				{elseif $message_type == 6}
				<div class="alert alert-danger" role="alert">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				  Error deleting product.
				</div>
				{/if}
				</div>
				{/if}

				<div class="row">
					<a class="btn btn-danger pull-right" href="./index.php?module=logout">
					    Logout
					</a>
					{if empty($product)}
					<button class="btn btn-primary pull-right" type="button" data-toggle="collapse" data-target="#formAdd" aria-expanded="false" aria-controls="formAdd">
					    Add Product
					</button>					
					{else}
						<a class="btn btn-primary pull-right" href="./index.php?module=product_crud&open=1">Add Product</a>
					{/if}
					<br>
					<br>
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<td>#</td>
								<td>Product Name</td>
								<td>Action</td>
							</tr>
						</thead>
						{foreach from=$products key=$k item=v}
							<tr>
								<td>{$k+1}</td>
								<td>{$v.product_name}</td>
								<td>
									<a href="./index.php?module=product_crud&product_id={$v.product_id}">Edit</a> | 
									<a href="./index.php?module=product_crud&product_id={$v.product_id}&action=delete">Delete</a>
								</td>
							</tr>
						{/foreach}
					</table>
				</div>

				<div class="row {if empty($product) && $open != 1}collapse{/if}" id="formAdd">
					<hr>
					<br>
										<h3>{if empty($product)}Add{else}Edit{/if} Product</h3>
					<form action="./index.php?module=product_crud" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="action" value="{if empty($product)}AddProduct{else}EditProduct{/if}">
						<input type="hidden" name="product_id" value="{if !empty($product)}{$product.product_id}{/if}">

						<div class="form-group">
						    <label for="">Product Name <span class="required">*</span></label>		
						    <div class="row">						    	  
							    <div class="col-md-8 ">				    					    
								    <input class="form-control" name="product_name" value="{$product.product_name}" placeholder="#product name" maxlength="50" required autocomplete="off">
								    <small id="" class="form-text text-muted">50 maximum characters</small>
								</div>
							</div>
						</div>
						<div class="form-group">
						    <label for="">Short Description <span class="required">*</span></label>			
						    <div class="row">						    	  
							    <div class="col-md-8 ">	
							    	<textarea class="form-control" name="short_desc" placeholder="#short description" required maxlength="150">{$product.short_desc}</textarea>		    					    
								   <!-- <input class="form-control" name="product_name" value="{$product.short_desc}" placeholder="#short description" maxlength="150" required> -->
								    <small id="" class="form-text text-muted">150 maximum characters. To use in Products page.</small>
								</div>
							</div>
						</div>
						<div class="form-group">
						    <label for="">Product Image <span class="required">*</span></label>	
						    <div class="row">						    	  
							    <div class="col-md-3 ">							    	
									<input class="form-control" type="file" name="product_image" value="{if $product.product_image != ''}{$product.product_image}{/if}" {if $product.product_image == ''}required{/if}>
									{if $product.product_image != ""}
									<br>
									<img class="crud-image img-responsive" src="./images/{$product.product_image}">
									<p class="text-center">{$product.product_image}</p>
									{/if}
							    </div>   
						    </div>		
						</div>
						<div class="form-group">
						    <label for="">Main Description <span class="required">*</span></label>	
						    <div class="row">
						    	<div class="col-md-8 ">
								  	<textarea class="form-control main-desc-editor" name="main_desc" placeholder="#main description" required>
								  		{$product.main_desc}
								  	</textarea>									  					    	
							    </div>   								     
						    </div>		
						</div>
						<div class="form-group">
						    <label for="">Brochure <span class="required">*</span></label>	
						    <div class="row">	
							    <div class="col-md-3 text-center">
							    	<input class="form-control" type="file" name="brochure" value="{if $product.brochure != ''}{$product.brochure}{/if}" {if $product.product_image == ''}required{/if}>
							    	{if $product.brochure != ""}
							    	<br>
									<a href="./brochure/{$product.brochure}" target="__blank" style="margin: 0 auto;"><i class="far fa-file-pdf fa-3x" aria-hidden="true"></i> <br></a>
									<p class="text-center">{$product.brochure}</p>
									{/if}					    	
							    </div>    		
						    </div>			    						    
						</div>					
						<div class="form-group">
						    <label for="">Advantages <span class="required">*</span>, Image <span class="required">*</span> & Informations</label>	
						    <div class="row">
						    	<div class="col-md-8 ">
								  	<textarea class="form-control advantages-editor" name="content_1" placeholder="#advantages content">{$product.content_1}</textarea>									  					    	
							    </div>   							
							    <div class="col-md-3 ">							    	
									<input class="form-control" type="file" name="image_1" value="{if $product.image_1 != ''}{$product.image_1}{/if}" {if $product.image_1 == ''}required{/if}>
									{if $product.image_1 != ""}
									<br>
									<img class="crud-image img-responsive" src="./images/{$product.image_1}">
									<p class="text-center">{$product.image_1}</p>
									{/if}
							    </div>  	     
						    </div>		
						    <div class="row">
						    	<br>
						    	<div class="col-md-4 ">
						    		<input class="form-control" type="text" name="title_info_1" value="{$product.title_info_1}" placeholder="#title advantages info 1">
						    		<br>
								  	<textarea class="form-control advantages-info1-editor" name="info_1" placeholder="#advantages info 1">{$product.info_1}</textarea>									  					    	
							    </div>   

							    <div class="col-md-4 ">
							    	<input class="form-control" type="text" name="title_info_2" value="{$product.title_info_2}" placeholder="#title advantages info 2">
						    		<br>
								  	<textarea class="form-control advantages-info2-editor" name="info_2" placeholder="#advantages info 2">{$product.info_2}</textarea>									  					    	
							    </div>
							    <div class="col-md-4 ">
							    	<input class="form-control" type="text" name="title_info_3" value="{$product.title_info_3}" placeholder="#title advantages info 3">
						    		<br>
								  	<textarea class="form-control advantages-info3-editor" name="info_3" placeholder="#advantages info 3">{$product.info_3}</textarea>									  					    	
							    </div>								     
						    </div>
						</div>  	
						<div class="form-group">
						    <label for="">Applications</label>	
						    <div class="row">
						    	<div class="col-md-4 ">
								  	<textarea class="form-control application1-editor" name="application_1" placeholder="#application content">{$product.application_1}</textarea>									  					    	
							    </div>   								     
							    <div class="col-md-4 ">
								  	<textarea class="form-control application2-editor" name="application_2" placeholder="#application content">{$product.application_2}</textarea>									  					    	
							    </div>
						    </div>	
						</div>

						<div class="form-group">
						    <label for="">Product Line <span class="required">*</span></label>	
						    <div class="row">
						    	<div class="col-md-4 ">
								  	<textarea class="form-control productline1-editor" name="product_line_1" placeholder="#product line content">{$product.product_line_1}</textarea>									  					    	
							    </div>   								     
							    <div class="col-md-4 ">
								  	<textarea class="form-control productline2-editor" name="product_line_2" placeholder="#product line content">{$product.product_line_2}</textarea>									  					    	
							    </div>
							    <div class="col-md-4 ">
								  	<textarea class="form-control productline3-editor" name="product_line_3" placeholder="#product line content">{$product.product_line_3}</textarea>									  					    	
							    </div>
						    </div>	
						</div>

						<div class="form-group">
						    <label for="">Certification Description <span class="required">*</span></label>	
						    <div class="row">
						    	<div class="col-md-8 ">
								  	<textarea class="form-control certification-editor" name="certification_desc" placeholder="#certification description">{$product.certification_desc}</textarea>									  					    	
							    </div>  
						    </div>	
						</div>

						<div class="form-group">
						    <label for="">Download Description <span class="required">*</span></label>	
						    <div class="row">
						    	<div class="col-md-8 ">
								  	<textarea class="form-control download-editor" name="download_desc" placeholder="#download description">{$product.download_desc}</textarea>									  					    	
							    </div>  
						    </div>	
						</div>

					  	
						  <button type="submit" class="btn btn-success">Submit</button>
					</form>		
				</div>
				</div>
			</div>

	
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

	<!-- ckeditor -->
	<script src="./plugin/ckeditor5-build-classic/ckeditor.js"></script>
	<!-- <script src="./plugin/ckeditor5-build-inline/ckeditor.js"></script> -->

	<script type="text/javascript">
		//hide alert
		setTimeout(function () {
		    $('.alert').fadeOut();
        }, 3000);

        ClassicEditor
        .create( document.querySelector( '.main-desc-editor' ) )
        .catch( error => {
            console.error( error );
        } );

        ClassicEditor
        .create( document.querySelector( '.advantages-editor' ) )
        .catch( error => {
            console.error( error );
        } );

        ClassicEditor
        .create( document.querySelector( '.advantages-info1-editor' ) )
        .catch( error => {
            console.error( error );
        } );

        ClassicEditor
        .create( document.querySelector( '.advantages-info2-editor' ) )
        .catch( error => {
            console.error( error );
        } );

        ClassicEditor
        .create( document.querySelector( '.advantages-info3-editor' ) )
        .catch( error => {
            console.error( error );
        } );

        ClassicEditor
        .create( document.querySelector( '.application1-editor' ) )
        .catch( error => {
            console.error( error );
        } );

        ClassicEditor
        .create( document.querySelector( '.application2-editor' ) )
        .catch( error => {
            console.error( error );
        } );

        ClassicEditor
        .create( document.querySelector( '.productline1-editor' ) )
        .catch( error => {
            console.error( error );
        } );

        ClassicEditor
        .create( document.querySelector( '.productline2-editor' ) )
        .catch( error => {
            console.error( error );
        } );

        ClassicEditor
        .create( document.querySelector( '.productline3-editor' ) )
        .catch( error => {
            console.error( error );
        } );

        ClassicEditor
        .create( document.querySelector( '.certification-editor' ) )
        .catch( error => {
            console.error( error );
        } );

        ClassicEditor
        .create( document.querySelector( '.download-editor' ) )
        .catch( error => {
            console.error( error );
        } );
	</script>
</body>

