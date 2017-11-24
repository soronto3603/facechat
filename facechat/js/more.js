var my_phone;
var user_info;

function click_menu(str){
  var uri="http://ksar.co.kr/facechat2/"+str+".php";
  window.parent.postMessage('{"title":"more","more":"'+uri+'"}',"*");
}
function daydaycheck(){
  var value=50;
  $.post("http://ksar.co.kr/facechat2/sql/select_daydaycheck.php",{id:my_phone}).done((r)=>{
    console.log("more.js:daydaycheck Function"+r);
    if(r=="False"){
      $.post("http://ksar.co.kr/facechat2/sql/insert_point_by_phone.php",{phone:my_phone,value:value,why:"3"}).done((r)=>{

        alert("50포인트 출첵완료");
      });
    }else{
      alert("하루에 한 번만 할 수 있습니다.");
    }

  });
}
function get_user_data(){
  $.get("http://ksar.co.kr/facechat2/sql/select_user_one_by_phone.php",{phone:my_phone}).done((r)=>{
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
