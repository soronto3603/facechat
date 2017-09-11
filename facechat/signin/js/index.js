var sex=0; //1:man 2:woman
var nick;
function init() {
	$('.sex').click(function(){
		if($(this).attr('id')=='man')sex=1;
		else sex=2;
		$('.sex').css("background-color","#333");
		$(this).css("background-color","white");
	});

	$('#join').click(function(){
		nick=$('#nick').val();
		if(nick.length<3){alert('3글자이상을 입력해주세요.');return;}
		if(sex==0){alert('성별을 선택해주세요.');return;}

		window.parent.postMessage('{"title":"signin","name":"'+nick+'","sex":"'+sex+'"}',"*");

		//db에 박으삼. nick과 sex(1:남자 2:여자)
	});
}


window.onload=init();
