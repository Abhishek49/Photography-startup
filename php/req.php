<?php

require 'connect.php';
$query=mysqli_query($connect,'SELECT req FROM users WHERE fname="Abhishek"');
$run=mysqli_fetch_array($query);
echo $run['req'];
?>