function imgclick(obj)
{
	window.open(obj.src,'_blank');
}

function give()
{
	var nick=$('#nick').val();
	var point=$('#point').val();
	$.post("getpoint.php",
    {
        name:nick
    },
    function(data, status){
        var gp=Number(data);
        if(point[0]=='-'){
        	point=point.substring(1,point.length);
        	point=Number(point);
        	gp=gp-point;
        }else{
        	point=Number(point);
        	gp=gp+point;
        }


        $.post("updatepoint.php",
	    {
	        name:nick,
	        point:gp
	    },
	    function(data, status){
	        alert('포인트가 전송되었습니다.');
	    });
        
    });	
}