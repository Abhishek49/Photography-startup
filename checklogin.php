if(!isset($_POST['uname']) && !isset($_POST['pwd']) && isset($_COOKIE['login']) && !isset($_SESSION['login'])){
$cookie=$_COOKIE['login'];
$query2="SELECT * FROM login WHERE cookie='".mysqli_escape_string($connect,$cookie)."'";
if($r2=mysqli_query($connect,$query2)){
$login1=mysqli_num_rows($r2);
if($login1>0)
{

$uname1=mysqli_fetch_array($r2);
if($_SESSION['login']=$uname1['uname']){
header("Location:index.php");
}
}
}
}