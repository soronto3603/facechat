window.onload=()=>{
  // add_line("01위","","이정헌",0,26,123);
  // add_line("02위","","현운용",0,24,234);
  // add_line("01위","","이정헌",0,26,123);
  // add_line("02위","","현운용",0,24,234);
  // add_line("01위","","이정헌",0,26,123);
  // add_line("02위","","현운용",0,24,234);
  window.parent.postMessage("Phone","*");
  window.parent.postMessage("location","*");
}
var my_phone;

function request_talk(phone){
  window.parent.postMessage('{"title":"talk","talk":"'+phone+'"}',"*");
}
function request_face_chat(id,name){
  select_it(id,name);
  click_face_chat_btn();
}

function add_line(rank,imguri,nickname,sex,age,id,phone){
  var sex_text;
  var sex_color;
  if(sex==0){
    sex_text="남";
    sex_color="man";
  }else if(sex==1){
    sex_text="여";
    sex_color="girl";
  }
  var html="";
  html+=  "<div class=line>";
  html+=    "<div class=line_rank>";
  html+=      "<div class=triangle_top_left></div>";
  html+=      "<div class=line_rank_text>"+rank+"</div>";
  html+=    "</div>";
  html+=    "<div class=line_image>이미지</div>";
  html+=    "<div class=line_contents>";
  html+=      "<div class='line_nickname "+sex_color+"'>"+nickname+"</div>";
  html+=      "<div class=line_normal>("+sex_text+" "+age+"세)</div>";
  html+=    "</div>";
  html+=    "<div class=icon_box>";
  html+=      "<div class=send_message onclick='request_talk(\""+phone+"\")'>쪽지대화</div>";
  html+=      "<div class=call_facechat onclick='request_face_chat(\""+id+"\",\""+nickname+"\")'>영상신청</div>";
  html+=    "</div>";
  html+=  "</div>";
  document.getElementById('contents').innerHTML+=html;
}
window.onmessage=(e)=>{
  if(e.data==""){

  }else{
    var JSONDATA=JSON.parse(e.data);
    if(JSONDATA.title=="phone"){
      my_phone=JSONDATA.phone;
    }else if(JSONDATA.title=="location"){
      my_lat=JSONDATA.lat;
      my_lng=JSONDATA.lng;
      get_users_info();
    }

  }
}
