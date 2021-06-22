<?php 
   include("inc/connection.php");
   include("partials/Fun.php");

   session_start();

?>


<!doctype html>
<html lang="en">
  <head>
  	<title>Login 10</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="login-assets/css/style.css">

	</head>
	<body class="img js-fullheight" style="background-image: url(login-assets/images/bg.jpg);">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	<h3 class="mb-4 text-center">Have an account?</h3>
		      	<form action="" class="signin-form" method="POST">
		      		<div class="form-group">
		      			<input type="text" name = "user_email" class="form-control" placeholder="User Mail" required>
		      		</div>
	            <div class="form-group">
	              <input id="password-field" name = "user_pass" type="password" class="form-control" placeholder="Password" required>
	              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	            </div>
	            <div class="form-group">
	            	<button type="submit" name = "login" class="form-control btn btn-primary submit px-3">Sign In</button>
	            </div>
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
		            	<label class="checkbox-wrap checkbox-primary">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
									</label>
								</div>
								<div class="w-50 text-md-right">
									<a href="#" style="color: #fff">Forgot Password</a>
								</div>
	            </div>
	          </form>
	          <?php
	            if(isset($_POST['login'])){
	            	$u_email = $_POST['user_email'];
	            	$u_password = $_POST['user_pass'];
	            	$enc = sha1($u_password);
	            	$info = get_by($conn , "users" , "WHERE u_email = '$u_email' AND u_password = '$enc'");
	            	if(!empty($info)){
	            		foreach($info as $k=>$v){
	            			$_SESSION[$k] = $v;
	            		}
		            	// $_SESSION['u_email'] = $info['u_email'];
		            	// $_SESSION['u_password'] = $info['u_password'];
		            	if($_SESSION['u_email'] == $u_email && $_SESSION['u_password'] == $enc){
		            		echo "hello ".$info['u_name'];
		            		header("location: dashboard.php");
		            	}else{
		            		echo "bye";
		            		header("location : index.php");
		            	}
	                }
	            	
	          }
	          ?>
	          <p class="w-100 text-center">&mdash; Or Sign In With &mdash;</p>
	          <div class="social d-flex text-center">
	          	<a href="#" class="px-2 py-2 mr-md-1 rounded"><span class="ion-logo-facebook mr-2"></span> Facebook</a>
	          	<a href="#" class="px-2 py-2 ml-md-1 rounded"><span class="ion-logo-twitter mr-2"></span> Twitter</a>
	          </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="login-assets/js/jquery.min.js"></script>
  <script src="login-assets/js/popper.js"></script>
  <script src="login-assets/js/bootstrap.min.js"></script>
  <script src="login-assets/js/main.js"></script>

	</body>
</html>

<?php ob_end_flush()?>