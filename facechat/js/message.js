function move_talk_room(target){
  var phone=document.getElementById('phone').value;
  var url="http://hume.co.kr/facechat/talk/index.php?phone="+phone+"&target="+target;
  window.parent.postMessage('{"title":"talk","talk":"'+url+'"}',"*");
}
window.onload=()=>{
 add_line("821058837630","","현운용",0,25,"25km","2017/09");
 add_line("821031857630","","현운기",0,16,"24km","2017/03");
 add_line("821058837630","","현운용",0,25,"25km","2017/09");
 add_line("821031857630","","현운기",0,16,"24km","2017/03");
 add_line("821058837630","","현운용",0,25,"25km","2017/09");
 add_line("821031857630","","현운기",0,16,"24km","2017/03");
 add_line("821058837630","","현운용",0,25,"25km","2017/09");
 add_line("821031857630","","현운기",0,16,"24km","2017/03");
}
function add_line(phone,imguri,nickname,sex,age,loc,time){
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
  html+=      "사진없음";
  html+=    "</div>";
  html+=    "<div class=right_bubble style='width:"+line_text_width+"px'>";
  html+=      "<div class=line_text_first>";
  html+=        "<font class='line_text_nickname "+sex_color+"'>"+nickname+"</font>";
  html+=        "<font class=line_text_normal>"+sex_text+age+loc+"</font>";
  html+=        "<font class=line_text_time>"+time+"</font><</div>";
  html+=        "<div class=clear></div>";
  html+=      "<div class=line_text_second>영상채팅요청</div>";
  html+=    "</div>";
  html+=  "</div>";
  document.getElementById('contents').innerHTML+=html;
}
