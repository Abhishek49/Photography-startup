<?php
session_start();
if(isset($_POST['date1'])&&isset($_POST['date2'])&&isset($_POST['place'])&&isset($_POST['desc'])&&isset($_POST['type'])&&!empty($_POST['date1'])&&!empty($_POST['date2'])&&!empty($_POST['place'])&&!empty($_POST['type'])){
$date1=$_POST['date1'];

$date2=$_POST['date2'];

$place=$_POST['place'];

$type=$_POST['type'];

$desc=$_POST['desc'];

$type=$_POST['type'];

$phno=$_POST['phno'];

$regex = '/^2{1}[0]{1}1{1}[5-9]{1}\/[0-1]{0,1}[0-9]{1}\/[0-3]{0,1}[0-9]{1} [0-2]{1}[0-3]{1}:[0-5]{1}[0-9]{1}$/';
if(preg_match($regex,$date1)&&preg_match($regex,$date2))
{$elem=explode('/',$date1);
$try=explode(' ',$elem[2]);
$elem[2]=$try[0];
$time=explode(":",$try[1]);

$elem1=explode('/',$date2);
$try1=explode(' ',$elem1[2]);
$elem1[2]=$try1[0];
$time1=explode(":",$try1[1]);

$timestamp1=mktime((int)$time[0],(int)$time[1],0,(int)$elem[1],(int)$elem[2],(int)$elem[0]);
require 'connect.php';
$res=mysqli_query($connect,'SELECT * FROM users WHERE email="'.$_SESSION['email'].'"');
$array=mysqli_fetch_array($res);
$timestamp2=mktime((int)$time1[0],(int)$time1[1],00,(int)$elem1[1],(int)$elem1[2],(int)$elem1[0]);

if($timestamp1<$timestamp2)
{//create an id

$times="".time();
$id=strtoupper("b".substr($type ,0,3)).$array['id'].$timestamp1;
echo $id;
	require 'connect.php';
	$query1='INSERT INTO `bookings`(`fname`, `email`, `id`, `date1`,`date2`,`phno`, `bill`, `paid`, `status`, `location`, `descp`, `type`, `extra`) VALUES ("'.mysqli_real_escape_string($connect,$_SESSION['name']).'","'.mysqli_real_escape_string($connect,$_SESSION['email']).'","'.mysqli_real_escape_string($connect,$id).'",'.$timestamp1.','.$timestamp2.',"'.mysqli_real_escape_string($connect,$phno).'",0.0,0.0,"Confirmation Awaited","'.mysqli_real_escape_string($connect,$place).'","'.mysqli_real_escape_string($connect,$desc).'","'.mysqli_real_escape_string($connect,$type).'","")';
	if(mysqli_query($connect,$query1)){
		echo "You have successfully booked and will be contacted soon for confirmation.";
	}
}

}
}

?>