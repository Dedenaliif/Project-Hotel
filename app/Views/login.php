<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<!-- Meta, title, CSS, favicons, etc. -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title><?php echo $title ?></title>

		<!-- Bootstrap -->
		<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
		<!-- Font Awesome -->
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		
		<!-- Custom Theme Style -->
		<link href="<?php echo base_url() ?>/public/asset/css/custom.css" rel="stylesheet">	
	</head>

	<body class="login">
		<div>
			<a class="hiddenanchor" id="signin"></a>

			<div class="login_wrapper">
				<div class="animate form login_form">
					<section class="login_content">
                    <form id="applications" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo $action; ?>" method="post">
							<h1>Sign In</h1>							
							<div>
								<input type="text" id="username" name="username" class="form-control" placeholder="Username" required="" />
							</div>
							<div>
								<input type="password" id="password" name="password" class="form-control" placeholder="Password" required="" />
							</div>
							<div>
								<button type="submit" class="btn btn-default"><i class="fa fa-lock"></i> Sign In</button>
								<a class="reset_pass" href="#">Lost your password?</a>
							</div>

							<div class="clearfix"></div>

							<div class="separator">
								<div>
									<h1>Project Hotel</h1>
									<p>© Copyright 2021</p>
								</div>
							</div>
                        </form>
					</section>
				</div>
			</div>
		</div>		
		<!-- Dynamic JS -->
		<?php if(!empty($js)){ echo $js; }?>
		
	</body>
</html>
