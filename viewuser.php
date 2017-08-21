<!DOCTYPE html>

<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/sidebarnohiderresponsive.css" />
<link rel="stylesheet" href="css/initmapapi.css" />

<link rel="stylesheet" href="datetimepicker-master/jquery.datetimepicker.css" />
<script type="text/javascript" src="js/jquery.js" ></script>

 <meta http-equip="Content-Type"  content="text/html; charset=utf-8"> 
</head>
<body lang=en>

<div id="wrapper"><div class="container-fluid">
			<div id="sidebar-wrapper">
					<ul class="sidebar-nav">
								<li id="myprofile">My Profile</li>
								<li id="bookashoot">Book a shoot</li>
								<li id="upcoming" >Upcoming Shoots</li>
								<li id="past">Past Shoots</li>

						</ul>

			</div>
					

			<div id="page-content-wrapper">

			<?php 
			session_start();
				header('Cache-Control: no-cache, no-store, must-revalidate');
				//if (isset($_GET['user'])){
				//$user=$_GET['user'];
				//if(isset($_SESSION['login'])){
					// if($user==$_SESSION['login']){
				echo "<div class=\"container-fluid\">
				<div class=\"row\">
				<div  id=\"info\">";
					echo "<div class=\"panel panel-default\"> <div class=\"panel-body\"><table class=\"table\">";
				
				require 'php/connect.php';
					$sqlname="SELECT * FROM users WHERE email='".mysqli_real_escape_string($connect,$_SESSION['email'])."'";
					if($query=mysqli_query($connect,$sqlname)){
					$row=mysqli_fetch_array($query);
						echo "<tr><td>".htmlentities($row['fname']). " </td></tr>";
					echo "<tr><td>	".htmlentities($row['place'])."</td></tr>";
					echo "<tr><td>	".htmlentities($row['dob'])."</td></tr>";
					
					$h=htmlentities($row['about']);
					echo "<tr><td>".nl2br($h)."</td></tr>";
					if(isset($_SESSION['email'])){
					echo "<tr><td><input type=\"button\" id=\"edit\" value=\"Edit\" class=\"pull-right\" /></td></tr>";}
					
					
						
						echo $_SESSION['email']."</table>";
					
				}
				echo "</table>";
				echo "</div></div></div></div></div>  ";
				
				//}
				//}
				//}
				 ?>



			</div>
			</div>
</div>


	
<script type="text/javascript" src="js/showsidebar.js"></script>
<script type="text/javascript" src="js/edit.js" ></script>



</body>

</html>