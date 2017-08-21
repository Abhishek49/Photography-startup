<?php
if(isset($_POST['fname']) && isset($_POST['pass1']) && isset($_POST['pass2']) && isset($_POST['email']) && !empty($_POST['fname']) && !empty($_POST['pass1']) && !empty($_POST['pass2']) && !empty($_POST['email'])){
	
$fname =$_POST['fname'];
$pw1 =$_POST['pass1'];
$pw2 =$_POST['pass2'];
$email =$_POST['email'];
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   return $data;
}
$ebool = test_input($email);
$eres=filter_var($ebool, FILTER_VALIDATE_EMAIL);

$fbool = test_input($fname);
$fres=preg_match("/^[a-zA-Z ]*$/",$fbool);


//email check
if(require 'connect.php'){
	
if(isset($email) && !empty($email)){
$sql='SELECT * FROM users WHERE email=\''.mysqli_real_escape_string($connect,$email).'\'';
if($query=mysqli_query($connect,$sql)){
	
$num=mysqli_num_rows($query);

if($num==0){


if($fres && $eres && !isset($_SESSION['login']) && strlen($pw1)>4 && strlen($pw2)>4 && $pw1==$pw2)
{
	
	$word="newname".$email.time();
	$key=password_hash($word ,PASSWORD_BCRYPT );
	$message = "Your account was created  on ".date('d m Y',time())." at baxpo.com. Thus, to Activate Your account, follow the link given below:/n/n/n http://www.baxpo.com/activateaccount.php?k=".$key;

	//if(mail($email, 'Account activation at Baxpo', $message)){

	$sql="INSERT INTO users (fname,password,email,req,status) VALUES('".mysqli_real_escape_string($connect,$fname)."','".mysqli_real_escape_string($connect,password_hash($pw1,PASSWORD_BCRYPT))."','".mysqli_real_escape_string($connect,$email)."','".mysqli_real_escape_string($connect,$key)."','".mysqli_real_escape_string($connect,'activationawaited')."')";
	if($run_query=mysqli_query($connect,$sql))
	    echo json_encode(['error'=>'Registered']); 
	else
		echo json_encode(['error'=>'some error occured']); 

	//}
	//else
		//echo json_encode(['error'=>'some error occured']); 

}
else 
	echo json_encode(['error'=>'Invalid data entered Please recheck']);;

}}}}
else
echo  json_encode(['error'=>'Couldn\'t connect to server try again later ']);
}

?>
