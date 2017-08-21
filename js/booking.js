function isDate(txtDate)
{
    var currVal = txtDate;
    if(currVal == '')
        return false;
    
    var rxDatePattern = /^(\d{4})(\/|-)(\d{1,2})(\/|-)(\d{1,2})$/; //Declare Regex
    var dtArray = currVal.match(rxDatePattern); // is format OK?
    
    if (dtArray == null) 
        return false;
    
    dtMonth = dtArray[3];
    dtDay= dtArray[5];
    dtYear = dtArray[1];        
    
    if (dtMonth < 1 || dtMonth > 12) 
        return false;
    else if (dtDay < 1 || dtDay> 31) 
        return false;
    else if ((dtMonth==4 || dtMonth==6 || dtMonth==9 || dtMonth==11) && dtDay ==31) 
        return false;
    else if (dtMonth == 2) 
    {
        var isleap = (dtYear % 4 == 0 && (dtYear % 100 != 0 || dtYear % 400 == 0));
        if (dtDay> 29 || (dtDay ==29 && !isleap)) 
                return false;
    }
    return true;
}
function istime(time){
var regtime= /^([0-1][0-9])|(2[0-3])\:([0-5][0-9])$/;
var checktime=regtime.test(time); 
return checktime;
};
function isplace(place){
var regplace= /^[A-Z ,-/@$0-9a-z]{5,}$/;
var checkplace=regplace.test(place); 
return checkplace;
};

$('#book').click(function(){
var dt1=$('#datetimepicker1').val();
var dt2=$('#datetimepicker2').val();
var pl=$('#pac-input').val();
var ph=$('#phno').val();
var typ=$('#type').val();
var abt=$('#desc').val();
date1=dt1.split(" ");
alert(date1);
d1=date1[0];
t1=date1[1];

d2=dt2.split(" ")[0];
t2=dt2.split(" ")[1];



var placecheck=isplace(pl);
var  phcheck=/[0-9]{10}/.test(ph);

if((isDate(d1) && isDate(d2)) && (istime(t1) && istime(t2)) && isplace(pl) && phcheck){
$.post("php/book.php", { 
		date1: dt1,
		date2: dt2,
		place:pl,
		type:typ,
		desc:abt,
		phno:ph
		
	},function(data){	

	alert(data);
	}

	);


}
else
alert('Some details entered may be wrong. Please recheck');

});