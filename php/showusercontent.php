<?php

require 'connect.php';
session_start();
if(isset($_POST['index'])&& isset($_SESSION['email']) && isset($_SESSION['name'])){
	$index=$_POST['index'];
	$time=time();
	
	switch($index){
	case 1: 
	$upcoming="SELECT * from bookings WHERE email='".mysqli_real_escape_string($connect,$_SESSION['email'])."' AND date1>".mysqli_real_escape_string($connect,$time)." ORDER BY date1";
	echo "<table class=\"table\">";
	if($runquery=mysqli_query($connect,$upcoming)){
		
	echo "<tr><th>id</th><th>date</th><th>Total Bill</th><th>Paid Amount</th><th>Place</th><th>status</th></tr>";
	
	while($row=mysqli_fetch_array($runquery)){
	echo "<a href='".$row['id']."'><tr><td>".htmlentities($row['id'])."</td><td>".htmlentities($row['date1'])."</td><td>".htmlentities($row['bill'])."</td><td>".htmlentities($row['paid'])."</td><td>".htmlentities($row['location'])."</td><td>".htmlentities($row['status'])."</td></tr></a>";
	}	}
	echo "</table>";
	break;
	case 2:	$past="SELECT * from bookings WHERE email='".mysqli_real_escape_string($connect,$_SESSION['email'])."' AND date1<'".$time."' ORDER BY date1";
	if($runquery=mysqli_query($connect,$past)){
		echo "<table class=\"table\">
	<tr><th>id</th><th>date</th><th>Total Bill</th><th>Paid Amount</th><th>Place</th><th>status</th></tr>";
	
	while($row1=mysqli_fetch_array($runquery)){
	echo "<a href='".$row1['id']."'><tr><td>".htmlentities($row1['id'])."</td><td>".htmlentities(date('d M,Y H:i',$row1['date1']))."</td><td>".htmlentities($row1['bill'])."</td><td>".htmlentities($row1['paid'])."</td><td>".htmlentities($row1['location'])."</td><td>".htmlentities($row1['status'])."</td></tr></a>";
	}	}
	echo "</table>";
	break;
	case 3://include edit.js
	$sqlname="SELECT * FROM users WHERE email='".mysqli_real_escape_string($connect,$_SESSION['email'])."'";
					if($query=mysqli_query($connect,$sqlname)){
					echo "<div class=\"container-fluid\"><div class=\"row\"><div class=\"col-sm-4\"><div id=\"info\">";
					echo "<div class=\"panel panel-default\"> <div class=\"panel-body\"><table class=\"table\">";
					while($row=mysqli_fetch_array($query)){



					echo "<tr><td>".htmlentities($row['fname']). " </td></tr>";
					echo "<tr><td>	".htmlentities($row['place'])."</td></tr>";
					echo "<tr><td>	".htmlentities($row['dob'])."</td></tr>";
					
					$h=htmlentities($row['about']);
					echo "<tr><td>".nl2br($h)."</td></tr>";
					if(isset($_SESSION['login'])){
					echo "<tr><td><input type=\"button\" id=\"edit\" value=\"Edit\" class=\"pull-right\" /></td></tr>";}}
					echo "</table>";
					echo "</div></div></div>";
						echo "</div></div></div>";
				
					
				}
				break;
	case 4://include datetimepicker
	echo "
	
<p>Starts at: <input type=\"text\" readonly=\"readonly\"id=\"datetimepicker1\" name=\"date1\">


Ends at: <input type=\"text\" readonly=\"readonly\"id=\"datetimepicker2\"  name=\"date2\"></p>

	<script src=\"datetimepicker-master/build/jquery.datetimepicker.full.min.js\"></script>
	<script>

function addDays(theDate, days) {
    return new Date(theDate.getTime() + days*24*60*60*1000);
}

var nd = addDays(new Date(), 2);
var nd1= addDays(new Date(), 365);
var maxdate1=nd1.getFullYear()+'/'+ (nd1.getMonth()+1) +'/'+nd1.getDate();

var mindate1=nd.getFullYear()+'/'+ (nd.getMonth()+1) +'/'+nd.getDate();
var mindate2=mindate1;
$('#datetimepicker1').datetimepicker({
 timepicker:true,
 
minDate: mindate1,
 maxDate: maxdate1
});


	$('#datetimepicker2').datetimepicker({
 timepicker:true,

minDate: mindate2,
maxDate: maxdate1
});

</script>";
//end of datepicker
//select place
echo " 

   	<input id=\"pac-input\" class=\"controls\" type=\"text\"
        placeholder=\"Enter a location\" >
		<div id=\"map\"></div>
		
 <script src=\"js/initgglmap.js \"></script><script src=\"https://maps.googleapis.com/maps/api/js?key=AIzaSyAtTws-Xtc-xOluho0VccnrLS3ctcZil4Q&signed_in=false&libraries=places&callback=initMap \" async defer></script>	
 <script src=\"js/booking.js \"></script>

		
";
$seluserdet="SELECT * from users WHERE email='".mysqli_real_escape_string($connect,$_SESSION['email'])."'";
	
    	echo "Select a type of event:<select id=\"type\" name=\"type\" >

<option value=\"Mega event\">a. MegaEvent photography</option>
<option value=\"portfolio\">b. Portfolio Shoot</option>
<option value=\"wedding\">c. Wedding Photography </option>
<option value=\"abstract\">d. Abstract Photography</option>
<option value=\"brand\">e. Brand Photography </option>
<option value=\"brand\" disabled=\"disabled\" color=\"gray\">______________________</option>
<option value=\"flashmob\">a. Flash mobs</option>
<option value=\"musiccover\">b. Musical covers</option>
<option value=\"dancecover\">c. Dance covers</option>
<option value=\"Theatreacts\">d. Theatre and drama acts</option>
	</select><br>
	<input type=\"number\" maxlength=\"10\"id=\"phno\" placeholder=\"Phone number\" name=\"phno\" value=\"";if($runuserdet=mysqli_query($connect,$seluserdet)){$array12=mysqli_fetch_array($runuserdet); echo htmlentities($array12['ph']); } echo "\"  /> <br>";
	echo "<textarea placeholder=\"Please describe here...\" id=\"desc\" name=\"desc\"></textarea>";

	echo "<input type=\"button\" name=\"submit\" value=\"Book!\" id=\"book\" />";
	}
}
if(isset($_POST['id'])&& isset($_SESSION['email'])){
$details="SELECT * from 'bookings' WHERE email='".mysqli_real_escape_string($connect,$_SESSION['email'])."' AND id=".$_POST['id'];
	if($runquery=mysqli_query($connect,$details)){
	while($row=mysqli_fetch_array($runquery)){
	echo "<div class=\"container-fluid\"><div class=\"row\"><div class=\"col-sm-8\"><div class=\"container-fluid\"><div class=\"row\"><div class=\"col-sm-12\">".htmlentities($row['id'])."</div></div><div class=\"row\"><div class=\"col-sm-12\">".htmlentities($row['date'])."</div><div><div class=\"row\"><div class=\"col-sm-12\">".htmlentities($row['bill'])."</div></div><div class=\"row\"><div class=\"col-sm-12\">".htmlentities($row['paid'])."</div></div><div class=\"row\"><div class=\"col-sm-12\">".htmlentities($row['place'])."<div class=\"row\"><div class=\"col-sm-12\">".htmlentities($row['status'])."</div></div></div></div></div></div></a>";
	}	}



}





?>