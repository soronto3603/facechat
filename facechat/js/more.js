var my_phone;

function click_menu(str){
  var uri="http://hume.co.kr/facechat/"+str+".php";
  window.parent.postMessage('{"title":"more","more":"'+uri+'"}',"*");
}
function daydaycheck(){
  var value=50;
  $.post("http://hume.co.kr/facechat/sql/insert_point_by_phone.php",{phone:my_phone,value:value,why:"출석체크"}).done((r)=>{
    alert("50포인트 출첵완료");
  });
}

window.onload=()=>{
  window.parent.postMessage("Phone","*");
}
window.onmessage=(e)=>{
  if(e.data==""){

  }else{
    var JSONDATA=JSON.parse(e.data);
    if(JSONDATA.title=="phone"){
      my_phone=JSONDATA.phone;
    }
  }
}
