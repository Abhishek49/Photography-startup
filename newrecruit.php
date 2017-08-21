<!DOCTYPE html>
<html lang="en">


<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Baxpo-User Page</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/blog.css">

    <!-- Custom CSS -->
    <link href="css/scrolling-nav.css" rel="stylesheet">
		<link rel="stylesheet" href="css/registerform.css">
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container">
            <div class="navbar-header">
 <a class="navbar-brand" href="#page-top">Brand image</a>
</div></div>
    </nav>
	
	
	<div id="wrapper">
	<div id="page-content-wrapper">
		<div class="container-fluid">
		<div class="row">
		<!--Registration form pannel-->
				<div class="col-sm-6">
				
				<div class="panel panel-default">
			<div class="panel-heading"><h4>Login..</h4></div>
			<div class="panel-body">
				<form action="php/logincheck.php" method="post" > 

					<input type="text" class="name" placeholder="Username" name="uname" />


					<input type="password" class="name" placeholder="password" name="pwd" />

					<input type="submit" value="login" class="go" name="login" />

					</form>

					<a href="resetpasswordrequest.php">Forgot password</a>

			</div>
		
				</div>
				</div>
		<div class="col-sm-6">
			<?php if (isset($_SESSION['email'])){ob_start();
				echo "You are already logged in.Try logging out before registering.Redirecting to Baxpo."; 
			header("refresh:2;url=home.php" );}
				?>
				
		<div class="panel panel-default">
			<div class="panel-heading"><h4>Or Register yourself..</h4></div>
			<div class="panel-body">
			<form id="registerbox" action="register.php" >
			<span id="fn"></span>
			<input type="text" class="name" placeholder="Your Name" id="fname" name="fname" />
			<input type="password" class="name" placeholder="password" id="pwd" name="pass1" />
			<span id="pw"></span>
			<input type="password" class="name" placeholder="Password again.." id="pwd1" name="pass2" />
			<span id="em"></span>
			<input type="email" class="name" placeholder="email" id="email" name="email" />
			<input type="submit" value="Register me!" class="go" id="go" name="submit"<?php if (isset($_SESSION['login'])){echo "disabled=true";} ?> />

			</form>
				</div></div></div>
		</div>
</div>
</div>
</div>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/register.js"></script>





    <!-- Scrolling Nav JavaScript -->

    <script src="js/scrolling-nav.js"></script>

		<script type="text/javascript" src="js/effects.js"></script>

</body>

</html>



