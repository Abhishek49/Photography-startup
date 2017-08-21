//topnav message still to made
$('#upcoming').click(function(){
 $.post("php/showusercontent.php",{index:1}, function(data){
        $('#info').html(data);
		
		alert(index);
    });
});
$('#past').click(function(){$.post("php/showusercontent.php",{index:2}, function(data){
        $('#info').html(data);
		alert(index);
    });});
$('#myprofile').click(function(){$.post("php/showusercontent.php",{index:3}, function(data){
        $('#info').html(data);
		alert(index);
    });});
$('#bookashoot').click(function(){$.post("php/showusercontent.php",{index:4}, function(data){
	$('#info').html(data);
	
	
    });
});
$('.retrieve').click(function(e){
	e.preventDefault();
	link=$(this).attr('href');
	$.post("php/showusercontent.php",{id:link}, function(data){
		if(data=="Success")
		{
        $('#page-content-wrapper').html("You have successsfully booked yourself a shoot. Moving to Upcoming shoots");}
    setTimeout(function(){ $('#upcoming').trigger('click');}, 1000);
	});
});