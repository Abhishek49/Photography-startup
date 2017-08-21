<?php
require 'php/connect.php';
session_start();
$seluserdet="SELECT * from users WHERE email='".mysqli_real_escape_string($connect,$_SESSION['email'])."'";
if($runuserdet=mysqli_query($connect,$seluserdet)){$array12=mysqli_fetch_array($runuserdet); echo htmlentities($array12['ph']); }	




?>