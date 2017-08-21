	$(document).ready(function(){
	alert('');
		});
		
	$('#pwd1').keyup(function(){
	one=$('#pwd').val();
	two=$('#pwd1').val();
	if(two!="")
	{if(one!=two)
	$('#pw').html("passwords dont match");
	else if(one==two)
	$('#pw').html("passwords match!!");
	}
	else if(two=="")
	$('#pw').html('');
	});
	$('#pwd').keyup(function(){
	one=$('#pwd').val();
	two=$('#pwd1').val();
	if(two!="")
	{if(one!=two)
	$('#pw').html("passwords dont match");
	else if(one==two)
	$('#pw').html("passwords match!!");
	}
	else if(two=="")
	$('#pw').html('');
	});


	$('#registerbox').submit(function(e){
		e.preventDefault();
	 str = $('#fname').val();
	 str3 = $('#pwd').val();
	str4 = $('#pwd1').val();
	 str5 = $('#email').val();
	var fn=0;var pw=0;var em=0;
	if(/^[a-zA-Z ]*$/.test(str) == false || str.length<3) {
		$('#fn').html('Enter a valid First name! You cannot use special characters or numbers in name and it should be atleast 3 characters');
	$('#pwd').val("");
	('#pwd1').val("");
		}
	else{
		 $('#fn').html('');
	}
	fn=1;


	if(str3 != str4 || str3.length<5) {
		$('#pw').html('Passwords don\'t match or invalid password minimum length is 5');
		$('#pwd').val('');
		$('#pwd1').val('');
		pw=0;
		}
		 
	else
	pw=1;


	var at = str5.match(/@/g);

	if(/^[a-zA-Z0-9_.@ ]*$/.test(str) == false || at!="@" || $('#email').val()=="")
	{
	$('#em').html("Enter a valid email id");
	$('#pwd').val("");
	('#pwd1').val("");
	em=0;
	}
	else
	em=1;

	function ajax1(){
	return $.ajax({
	type:'POST',
	url:'php/mcheck.php', 
	data:'name='+str5,
	success:function(data){
	$('#em').html(data);
	if(data=="Enter an email id" || data=="We already have an account with this email id"|| $('#em').val=="Enter an email id")
	em=0;
	else
		em=1;
	}});}

	//$(document).ajaxStop(function () {
		  // 0 === $.active

	$.when(ajax1()).done(function(a1){
		// the code here will be executed when all four ajax requests resolve.
		// a1, a2, a3 and a4 are lists of length 3 containing the response text,
		// status, and jqXHR object for each of the four ajax calls respectively.

	if(fn==1 && pw==1 && em==1){
 alert('em:'+em+' fn'+fn+' pw'+pw);
	$.post("php/registerin.php", { 
		fname: str,
		pass1: str3,
		pass2:str4,
		email:str5
	},function(data){	

	var jsonobj=$.parseJSON(data);
	if(jsonobj.error=="Registered")
	window.location="https://localhost/baxpo/registered.html";
	if(jsonobj.error=="some error occured")
	$('#fn').html("Some error occured while registering you please Try again later");
	if(jsonobj.error=="Invalid data entered Please recheck")
	$('#fn').html("Some invalid data had been entered. Please Try again later");
		
	}

	);}});
	});





