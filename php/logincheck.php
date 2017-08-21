<?php 
ob_start();
session_start();
if(require 'connect.php'){
	if(isset($_POST['email'])&& isset($_POST['pwd']) && !isset($_COOKIE['login']) && !isset($_SESSION['email'])){
		$email=$_POST['email']; 
		$pwd=$_POST['pwd'];
		$checkuserlogin='SELECT * FROM users WHERE email="'.mysqli_real_escape_string($connect,$email).'"';
		$runcheckuserlogin=mysqli_query($connect,$checkuserlogin);
		$loginarray= mysqli_fetch_array($runcheckuserlogin);
		$lastlogin=$loginarray['ts'];
		
		$ts=date_create(date('Y-m-d',time()));
		$ts1=date_create(date('Y-m-d',$lastlogin));
		
		$diff=date_diff($ts1,$ts);
		$time1 = strtotime(date('H:i',time()));
		$time2 = strtotime(date('H:i',$lastlogin));
		$td=($time1 - $time2)/60;
		
		
		
		if(($diff->format("%R%a")>0 || $td>59)&&($loginarray['llogin']>5)|| $loginarray['llogin']<=5)
		{
			if(password_verify($pwd,$loginarray['password']) && $loginarray['status']=="active")
			{
				mysqli_query($connect,'DELETE FROM login WHERE email="'.mysqli_real_escape_string($connect,$email).'"');
				$key=md5(date('H:i:s d,M,Y' ,time()).$email);
				$query1='INSERT INTO login VALUES(0,"'.mysqli_real_escape_string($connect,$loginarray['fname']).'","'.mysqli_real_escape_string($connect,$key).'", "'.mysqli_real_escape_string($connect,$email) .'")' ;
					if($r1=mysqli_query($connect,$query1) &&  $_SESSION['email']=$loginarray['$email'])
						{
						if($_SESSION['name']=$loginarray['fname']){echo "Logging You in...";
						$queryupdate='UPDATE users SET llogin=0, ts='.time().' where email="'.mysqli_real_escape_string($connect,$email).'"' ;
						$runqueryupdate=mysqli_query($connect,$queryupdate);
						if(setcookie('login',$key,time()+5000000000000))
						{}
						else
						echo "Cookies are Disabled please enable them in your browser!";
						header("Location:index.php");
						}}
					else 
						echo "Could'nt log You in";
				

			}
			else 
			{
				echo "Either this Account isn't registered with us or the password You've entered is incorrect<br />
			<form action=\"\" method=\"post\" > 

			<input type=\"text\" class=\"name\" placeholder=\"email\" name=\"email\" />


			<input type=\"password\" class=\"name\" placeholder=\"password\" name=\"pwd\" />

			<input type=\"submit\" value=\"login\" class=\"go\" name=\"login\" />
			<a href=\"resetpasswordrequest.php\">Forgot password</a>
			</form>
			";
			$checkquery='SELECT * FROM users WHERE email="'.mysqli_real_escape_string($connect,$email).'"';
			$runcheckquery=mysqli_query($connect,$checkquery);
			$lastlogina=mysqli_fetch_array($runcheckquery)['llogin']+1;
			$queryupdate	='UPDATE users SET llogin='.$lastlogina.', ts='.time().' where email="'.mysqli_real_escape_string($connect,$email).'"' ;
			$runqueryupdate=mysqli_query($connect,$queryupdate);
			}
		}
		else 
		echo "You've exceeded your limit please try after an hour";
}

if(isset($_SESSION['email']) || isset($_COOKIE['login'])){
	
echo "Seems You're already logged in ";}
if(isset($_COOKIE['login']) && (!isset($_SESSION['email']) && !isset($_SESSION['name']))){
$cookie=$_COOKIE['login'];
$query2="SELECT * FROM login WHERE cookie='".mysqli_escape_string($connect,$cookie)."'";
if($r2=mysqli_query($connect,$query2)){
$login1=mysqli_num_rows($r2);
if($login1>0)
{

$uname1=mysqli_fetch_array($r2);
if($_SESSION['email']=$uname1['email']){ 
if($_SESSION['name']=$uname1['fname']){
header("Location:index.php");
}
}}
}
}


}



?>