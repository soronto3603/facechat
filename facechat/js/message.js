function move_talk_room(target){
  var url="http://hume.co.kr/facechat/talk/index.php?phone="+my_phone+"&target="+target;
  window.parent.postMessage('{"title":"talk","talk":"'+url+'","back_url":"message"}',"*");
}
var my_phone;
window.onload=()=>{
  window.parent.postMessage("Phone","*");
  //get_chatroom_list();
}

function get_chatroom_list(){
  $.post("http://hume.co.kr/facechat/sql/select_chatroom.php",{id:my_phone}).done((r)=>{
    var result=JSON.parse(r);
    for(var i=0;i<result.length;i++){
      var target_phone;
      if(result[i][1]==my_phone)target_phone=result[i][2];
      else if(result[i][2]==my_phone)target_phone=result[i][1];
      $.post("http://hume.co.kr/facechat/sql/select_user_by_chatroom.php",{target:target_phone,phone:my_phone,date:result[i][3],last_update:result[i][4]}).done((re)=>{
        if(re=="false"){

        }{

          var result2=JSON.parse(re);
          add_line(result2[8],result2[7],result2[2],result2[4],result2[11],result2[5],result2[14],result2[15])
        }

      });
    }
  });
}
function add_line(phone,imguri,nickname,sex,age,loc,time,last_update){
  var line_text_width=$(window).width()-160;
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
  html+=  "<div class=line onclick='move_talk_room(\""+phone+"\")'>";
  html+=    "<div class=left_photo>";
  html+=      "<img src='"+imguri+"' width=100% height=100%>";
  html+=    "</div>";
  html+=    "<div class=right_bubble style='width:"+line_text_width+"px'>";
  html+=      "<div class=line_text_first>";
  html+=        "<font class='line_text_nickname "+sex_color+"'>"+nickname+"</font>";
  html+=        "<font class=line_text_normal>"+sex_text+" "+age+" "+loc+"</font>";
  html+=        "<font class=line_text_time>"+time+"</font><</div>";
  html+=        "<div class=clear></div>";
  html+=      "<div class=line_text_second>"+last_update+"</div>";
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
      get_chatroom_list();
    }
  }
}
