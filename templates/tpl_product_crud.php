
<body>
		
	<div class="colorlib-loader"></div>

	<div id="page">		

		<div id="colorlib-services" class="">
				<div class="container">

				<div class="row">
					<div id="colorlib-logo"><a href="./index.php?module=home"><img src="images/logo.webp"></a></div>
					<br>
				</div>
				<div id="error_alert_div" style="display: none">
					<div class="alert alert-danger" role="alert">
					  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					  <span id="error_alert_message"></span>
					</div>
				</div>
				<div id="success_alert_div" style="display: none">
					<div class="alert alert-success" role="alert">
					  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					  <span id="success_alert_message"></span>
					</div>
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
									<a class="delete-product" data-id="{$v.product_id}">Delete</a>
									<!-- href="./index.php?module=product_crud&product_id={$v.product_id}&action=delete" -->
								</td>
							</tr>
						{/foreach}
					</table>
				</div>

				<div class="row {if empty($product) && $open != 1}collapse{/if}" id="formAdd">
					<hr>
					<br>
					<h3>{if empty($product)}Add{else}Edit{/if} Product</h3>
					<span>Note : This product page will appear exactly as the form filled below. Area with hashtag (eg. #details) is editable.</span><br><br>

					<form action="./index.php?module=product_crud" method="POST" enctype="multipart/form-data" id="productForm">
						<input type="hidden" name="action" value="{if empty($product)}AddProduct{else}EditProduct{/if}">
						<input type="hidden" name="product_id" value="{if !empty($product)}{$product.product_id}{/if}">

						<div id="page" style="border : 1px solid #cecece; padding: 10px; border-radius: 5px;">							

							<aside id="colorlib-hero">
								<div class="flexslider">
									<ul class="slides">
								   	<li style="{if $product.product_bg_image != ""}background-image: url(images/{$product.product_bg_image}){else}background-image: url(images/dummy-image.jpg);background-position-y: center;{/if};">
								   		<div class="overlay"></div>
								   		<div class="container-fluid">
								   			<div class="row">
									   			<div class="col-md-8 col-sm-12 col-md-offset-2 slider-text">
									   				<div class="slider-text-inner text-center">
									   					<h2>METTEC SYSTEME</h2>
									   					<div id="product_name" style="text-align: center;">
									   						{if $product.product_name != ''}{$product.product_name}{else}<h1>#product_name</h1>{/if}
									   					</div>									   					
									   				</div>
									   			</div>
									   		</div>
								   		</div>
								   	</li>
								  	</ul>
							  	</div>
							</aside>

							<div class="col-md-12" style="border : 1px solid #cecece; padding: 10px; border-radius: 5px; margin-top: 10px">
								<div class="col-md-6">									
									<label>Short Description</label><textarea class="form-control" name="short_desc" maxlength="200" rows="4">{$product.short_desc}</textarea>
									<small class="pull-right">This only appears on products page</small>
								</div>								
								<div class="col-md-6">									
									<label>Product Background Image</label>
									{if $product.product_bg_image != ""}									
									<p class="">{$product.product_bg_image}</p>
									{/if}
									<input class="form-input" type="file" name="product_bg_image" value="{if $product.product_bg_image != ''}{$product.product_bg_image}{/if}" >
									<input type="hidden" name="product_bg_image_path" value="{if $product.product_bg_image != ''}{$product.product_bg_image}{/if}">
								</div>
							</div>

							<div id="colorlib-services" class="">
									<div class="container">
									<div class="row">
										
										<div class="col-md-6 colorlib-heading animate-box">	
											<div class="others-editor" id="main_desc" style="min-height: 150px">					
												
													{if $product.main_desc != ''}{$product.main_desc}{else}#main_description{/if}
												
											</div>
											<br>
											<a class="btn-download" href="javascript:void(0)">
												<i class="far fa-file-pdf" aria-hidden="true"></i>&nbsp;&nbsp;Download Brochure
											</a>
											<br>
											<div id="brochure">	
												<br>
												Brochure:
												{if $product.brochure != ""}									
												<p class="">{$product.brochure}</p>
												{/if}
												<input class="form-input" type="file" name="brochure" value="{if $product.brochure != ''}{$product.brochure}{/if}" >
												<input type="hidden" name="brochure_path" value="{if $product.brochure != ''}{$product.brochure}{/if}">
											</div>
										</div>	
										<div class="col-md-6">
											<img class="img-responsive" src="{if $product.product_image != ''}images/{$product.product_image}{else}images/dummy-image.jpg{/if}" style="max-height: 200px; margin:auto;">
											<div class=" id="product_image">
												<br>
												Product image:
												{if $product.product_image != ""}									
												<p class="">{$product.product_image}</p>
												{/if}
												<input class="form-input" type="file" name="product_image" value="{if $product.product_image != ''}{$product.product_image}{/if}" >		
												<input type="hidden" name="product_image_path" value="{if $product.product_image != ''}{$product.product_image}{/if}">
											</div>
										</div>				
									</div>
									</div>
								</div>

							<div id="colorlib-about" class="colorlib-light-grey">
								<div class="container">				
									<div class="row row-pb-lg">
										<div class="col-md-8 col-md-offset-2 text-center animate-box colorlib-heading animate-box mb-0">
											<div class="others-editor sm" style="text-align: center" id="content_title">
												{if $product.content_title != ''}{$product.content_title}{else}#Advantages{/if}
											</div>
											<span class="sm"></span>	
											<br>						
										</div>					
										<div class="col-md-6">											
											<img class="img-responsive" src="{if $product.image_1 != ''}images/{$product.image_1}{else}images/dummy-image.jpg{/if}" style="max-height: 200px; margin:auto;">
											<div class=" id="image_1">
												<br>
												Advantage image:
												{if $product.image_1 != ""}									
												<p class="">{$product.image_1}</p>
												{/if}
												<input class="form-input" type="file" name="image_1" value="{if $product.image_1 != ''}{$product.image_1}{/if}" >
												<input type="hidden" name="image_1_path" value="{if $product.image_1 != ''}{$product.image_1}{/if}">		
											</div>
										</div>
										<div class="col-md-6 ">
											
											<div class="about animate-box">
												<!-- <h2>Advantages</h2> -->
												<div class="others-editor" id="content_1">
													
													{if $product.content_1 != ''}{$product.content_1}{else}<p>#content_1</p>{/if}
												</div>
											</div>
										</div>
									</div>
									
									<div class="row">
										{for $i=1 to 3}
										
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
													<div class="others-editor" id="title_info_{$i}">
														{if $product.{"title_info_$i"} != ''}{$product.{"title_info_$i"}}{else}<h3>#title_info_{$i}</h3>{/if}
														
													</div>
													<div class="others-editor" id="info_{$i}">
														{if $product.{"title_info_$i"} != ''}{$product.{"info_$i"}}{else}#info_{$i}{/if}
													</div>
												</div>
											</div>
										</div>
										
										{/for}
									</div>
									
								</div>
							</div>
							
							<div id="colorlib-about">
								<div class="container">
									<div class="row">
										<div class="col-md-8 col-md-offset-2 text-center animate-box colorlib-heading mb-0">
											<span class="sm">Applications</span>						
										</div>
									</div>
									
									<div class="row">
										<div class="col-md-4 col-md-offset-2 animate-box">
											<div class="others-editor services" id="application_1">
												
												{if $product.application_1 != ''}{$product.application_1}{else}<p>#application_1</p>{/if}
											</div>
										</div>		
										<div class="col-md-4 animate-box">
											<div class="others-editor services" id="application_2">
												{if $product.application_2 != ''}{$product.application_2}{else}<p>#application_2</p>{/if}
											</div>
										</div>					
									</div>
								</div>
							</div>							

							<div id="colorlib-about" class="colorlib-light-grey">
								<div class="container">
									<div class="row">
										<div class="col-md-8 col-md-offset-2 text-center animate-box colorlib-heading mb-0">
											<span class="sm">Product Line</span>						
										</div>
									</div>
									
									<div class="row">
										{for $i=1 to 3}
										
										<div class="col-md-4 animate-box">
											<div class="others-editor services" id="product_line_{$i}">
												

												{if $product.{"product_line_{$i}"} != ''}{$product.{"product_line_{$i}"}}{else}<p>#product_line_{$i}	</p>{/if}
											</div>
										</div>							
										
										{/for}
									</div>
								</div>
							</div>

							<div id="colorlib-testimony" >
								<div class="container">
									<div class="row">
										<div class="col-md-6 text-justify animate-box ">
											<!-- <span class="sm">Certification</span> -->
											<h2>Certification</h2>											
											<div class="others-editor services" id="certification_desc" style="min-height: 150px">												
												{if $product.certification_desc != ''}{$product.certification_desc}{else}<p>#certification_desc</p>{/if}
											</div>
										</div>		
										<div class="col-md-5 col-md-offset-1 text-justify animate-box ">
											<!-- <span class="sm">Certification</span> -->
											<h2>&nbsp;</h2>
											<div class="others-editor services" id="download_desc" style="min-height: 100px">
												{if $product.download_desc != ''}{$product.download_desc}{else}<p>#download_desc</p>{/if}
											</div>											
											<a class="btn-download" href="javascript:void(0)">
												<i class="far fa-file-pdf" aria-hidden="true"></i>&nbsp;&nbsp;Download Brochure
											</a>
											<br>
											<br>												
												{if $product.brochure != ""}									
												Brochure:
												<p class="">{$product.brochure}</p>
												{/if}
										</div>				
									</div>
								</div>
							</div>

						</div>
					  	<br>
						  <button type="submit" class="btn btn-success pull-right">Submit</button>
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
	<!-- <script src="./plugin/ckeditor5-build-classic/ckeditor.js"></script> -->
	<!-- <script src="./plugin/ckeditor5-build-inline/ckeditor.js"></script> -->
	<script src="./plugin/ckeditor5-custom/build/ckeditor.js"></script>

	<script type="text/javascript">
		//hide alert
		setTimeout(function () {
		    $('.alert').fadeOut();
        }, 3000);

        /*ckeditor*/
        /*init for product name only*/
        let editor = [];
        let editor_key = [];

        InlineEditor
        .create( document.querySelector( '#product_name' ),
        {
        	placeholder: ' ',
        } )
        .then( newEditor => {
	        editor['product_name'] = newEditor;
	        editor_key.push('product_name');
	    } )
        .catch( error => {
            console.error( error );
        } );

        /*init for others*/
        $.each( $(".others-editor") , function( i, l ){
		  
		  // console.log($(this).attr('id'))

		  	InlineEditor
	        .create( document.querySelector( '#'+$(this).attr('id') ),
	        {
	        	removePlugins: ['Title']
	        } )
	        .then( newEditor => {
		        editor[$(this).attr('id')] = newEditor;
		        editor_key.push($(this).attr('id'));

		    } )
	        .catch( error => {
	            console.error( error );
	        } );

		});

        /*end ckeditor*/
        
        /*form ajax*/
        $("#productForm").submit(function(e) {

		    e.preventDefault(); // avoid to execute the actual submit of the form.

		    var form = $(this);
		    var actionUrl = form.attr('action');

		    var form_data = form.serializeArray();		    

		    // console.log(actionUrl);

		    $.each(editor_key, function(index,value){
		    	// console.log(editor[value].getData());
		    	
		    	form_data.push({ name: value, value: editor[value].getData() });
		    });

		    $.ajax({
		        type: "POST",
		        url: actionUrl,
		        data: form_data, // serializes the form's elements.		        
			    dataType: "json",
		        success: function(data)
		        {
		          // alert(data); // show response from the php script.
		          if(data.status)
		          {
		          	// location.reload();

		          	window.location.href = data.go_page;

		       //$('#success_alert_message').text("Adding new product successful.");
		       //    	$('#success_alert_div').show();

		       //    	setTimeout(function () {
					    // $('#success_alert_div').fadeOut();
			      //   }, 3000);

			      //   $('#productForm')[0].reset();
		          }
		          else
		          {
		          	
		          	$('#error_alert_message').text("Error adding new product.");
		          	$('#error_alert_div').fadeIn();

		          	setTimeout(function () {
					    $('#error_alert_div').fadeOut();
			        }, 3000);

		          	//scroll to top
			        $('.js-gotop').click();
		          }
		        }
		    });
		    
		});

		$('#productForm input[type="file"]').on('change', function(){
	    	// console.log($(this).attr('name'));

	    	// console.log($(this)[0].files);

	    	// form_data.push({ name: $(this).attr('name'), value: $(this)[0].files });

	    	var fd = new FormData();
	        var files = $(this)[0].files;
	        var input_name = $(this).attr('name');

	        // Check file selected or not
	        if(files.length > 0){
	           fd.append('file',files[0]);

	           $.ajax({
	              url: './index.php?module=product_crud&action=UploadFileOrImage&input_name='+input_name,
	              type: 'post',
	              data: fd,
	              contentType: false,
	              processData: false,
			      dataType: "json",
	              success: function(data){	              	
	                 if(data.status){
	                    
	                    // console.log('input[name="'+input_name+'_path"] = '+data.file_name)

	                    $('input[name="'+input_name+'_path"]').val(data.file_name);
	                 }else{
	                    alert('file not uploaded');
	                 }
	              },
	           });
	        }else{
	           alert("Please select a file.");
	        }
	    });

		/*$('#colorlib-hero li').on('click', function(event ){
			console.log(event.target.nodeName)
		})*/

		$(".delete-product").on('click',function(){

			var product_id = $(this).data('id');

			Swal.fire({
			  title: 'You are deleting this product ',
			  icon: 'warning',
			  html:
			    'Are you sure you want to proceed?',
  			  confirmButtonColor: '#5cb85c',
			  showDenyButton: true,			  
			  confirmButtonText: 'Yes ',
			  denyButtonText: 'No'
			}).then((result) => {
			  /* Read more about isConfirmed, isDenied below */
			  if (result.isConfirmed) {
			    // Swal.fire('Saved!', '', 'success')
			    window.location.href = "./index.php?module=product_crud&product_id="+product_id+"&action=delete";
			  }
			})
		})

	</script>
</body>

