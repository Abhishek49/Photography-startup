
<?php
if(isset($_POST['submit'])){
$place=$_POST['place'];
$dob=$_POST['dob'];
$pwd=$_POST['password'];
$about=$_POST['about'];
}
$connect=mysql_connect('localhost','root','jaimala02');
mysql_select_db('baxpo',$connect);
$q="SELECT password from users where uname='user'";
$r=mysql_query($q,$connect);
$pwd1=mysql_fetch_array($r);




if(isset($_COOKIE['login']))
{
if($pwd==$pwd1[0]){

	$sqlname="UPDATE users SET place=\"".mysql_real_escape_string($place)."\", dob=\"".mysql_real_escape_string($dob)."\", about=\"".mysql_real_escape_string($about)."\" WHERE uname='user'"; 
	if($query=mysql_query($sqlname,$connect)){
	{echo "1";}}
} 
else 
echo "2";
}
else
echo "3";
?>
