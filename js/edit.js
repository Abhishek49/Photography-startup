

$('#gos').click(function(){

var place=$('#place').val();
var dob=$('#dob').val();
var password=$('#pwd').val();
var about=$('#about').val();
var s=1;
 $.post("update.php", { 
 place:place,
dob:dob,
submit:s,
password:password,
about:about, },
 function(data){

	if(data==1){alert(data);
	$('#error').html("Successfully Changed!");
	}
	else if(data==2)
	$('#error').html("Password is wrong");
	else if(data==3){
	alert("Log in to continue");
	window.location="https://localhost/baxpo/index.php";
 }
	else
	$('#error').html("Some error occurred try again later");
 });

});
