<?php
session_start();

if($_SESSION['email']="email" ){
	if($_SESSION['name']="fanme"){
echo $_SESSION['email'];
echo $_SESSION['name'];
	}
}?>