 <!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Activate Your Account</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/blog.css">
	<!-- Custom CSS -->
    <link href="css/scrolling-nav.css" rel="stylesheet">
	<link rel="stylesheet" href="css/registerform.css">
</head>

<body>

 <?php
 ob_start();
 require 'php/connect.php';
	if(isset($_GET['key'])){

		echo '<div id="wrapper"><div id="page-content-wrapper">
		<div class="container-fluid"><div class="row"><div class="col-sm-12">
			<div class="panel panel-default">
			<div class="panel-heading"><h4>Get your account activated</h4></div>
			<div class="panel-body">
			<form id="activatebox" method="post" action="activateaccount.php?key='.$_GET['key'].'" >';
					if(isset($_POST['email'])){
					
			$emailvalidationq="SELECT req FROM users WHERE email='".mysqli_real_escape_string($connect,$_POST['email'])."' AND req='".mysqli_real_escape_string($connect,$_GET['key'])."'";
			if($runemailvalidation=mysqli_query($connect,$emailvalidationq)){
					
				if(mysqli_num_rows($runemailvalidation)==1)
				{
					$activatequery="UPDATE users SET status='active' WHERE  email='".mysqli_escape_string($connect,$_POST['email'])."'";
					if(mysqli_query($connect,$activatequery))
					{
						echo "Activated Successfully.. Redirecting to Login";
						header('Location:newuser.php');
						
					}
					else
						echo "Something went wrong... Try again later";
						
					
				}
			
				else 
					echo "You have entered the wrong email address ";
					}}
			
			echo '<input type="email" class="name" placeholder="email" id="email" name="email" />
			<input type="submit" value="Activate!" class="go" id="go" name="submit"';if (isset($_SESSION['email'])){echo "disabled=true";} echo '/>

			</form>
				</div></div></div>
				</div></div></div>
		</div>';
		
	}
 
 
 
 
 ?>
 
<script type="text/javascript" src="js/jquery.js"></script>

<!-- Scrolling Nav JavaScript -->

    <script src="js/scrolling-nav.js"></script>

		<script type="text/javascript" src="js/effects.js"></script>

</body>

</html>
