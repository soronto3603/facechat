var my_phone;
var user_info;

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
function get_user_data(){
  $.get("http://hume.co.kr/facechat/sql/select_user_one_by_phone.php",{phone:my_phone}).done((r)=>{
    user_info=JSON.parse(r);
    document.getElementById('profile_img').src=user_info[7];
    var sex_text;
    if(user_info[4]==0){
      sex_text="남자";
    }else{
      sex_text="여자";
    }
    document.getElementById('profile_nickname').innerHTML=user_info[2]+" ("+sex_text+ " / "+user_info[11]+"세)";
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
      get_user_data();
    }
  }
}
