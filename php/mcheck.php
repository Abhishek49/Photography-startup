<?php

require 'connect.php';
if(isset($_POST['name']) && !empty($_POST['name'])){
$name=$_POST['name'];
$sql='SELECT * FROM users WHERE email=\''.mysqli_real_escape_string($connect,$name).'\'';
if($query=mysqli_query($connect,$sql)){
$num=mysqli_num_rows($query);
if($num>0)
echo "We already have an account with this email id";
else 
echo "";
}
}
if(!isset($_POST['name']) || empty($_POST['name']))
echo "Enter an email id";
?>