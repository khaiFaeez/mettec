<style type="text/css">
	.container{
		position: absolute;
    top: 50%;
    left: 50%;
    -moz-transform: translateX(-50%) translateY(-50%);
    -webkit-transform: translateX(-50%) translateY(-50%);
    transform: translateX(-50%) translateY(-50%);
	}

	body{
		background-color: #fafafa;
	}
	.panel{
		box-shadow: -2px -2px 0px 1px rgb(247 148 30);
	}

	.panel-body {
	    padding: 30px;
	}
</style>
<body >
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-default">
				  <div class="panel-body">
				  	
					<div class="text-center">
							<br>
						<div id="colorlib-logo"><a href="./index.php?module=home"><img src="images/logo.png" width="400"></a></div>
						<br><br>
						<h1>Login</h1>
						  <form action="./index.php?module=login" method="POST" enctype="multipart/form-data">

						  	<input type="hidden" name="action" value="AuthUser">

							<input class="form-control" type="text" name="user" placeholder="Username" autocomplete="off"><br>
							<input  class="form-control" type="password" name="pass" placeholder="Password">
							<span style="color: red">{$error_message}</span>
							<br>
							<input class="btn btn-primary pull-right" type="submit" name="login" class="login loginmodal-submit" value="Login">
							<br><br>
						  </form>											  
					</div>
			
				  </div>
				</div>
			</div>
			
		</div>
	</div>
</body>