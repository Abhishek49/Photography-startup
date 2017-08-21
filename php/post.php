<?php
require 'connect.php';


if(isset($_POST['name']) && !empty($_POST['name'])){
$name=$_POST['name'];

$sqltouname='SELECT uname FROM users WHERE uname=\''.mysqli_real_escape_string($connect,$name).'\'';
if($query=mysqli_query($connect,$sqltouname)){
$num=mysqli_num_rows($query);
if($num>0)
echo "Username already in use.. please try another name";
else 
echo "Username Available!";
}
}
if(isset($_POST['name']) && empty($_POST['name']))
echo "Enter a username";
?>