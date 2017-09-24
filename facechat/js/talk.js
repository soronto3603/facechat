window.onload=()=>{
  add_line("","ㄱㄱㄱㄱ영상","현운용",1,"25","전주","57분전",1234);
  add_line("","안녕하세요 잘부탁","이정헌",0,"26","익산","58분전",453);
  add_line("","ㄱㄱㄱㄱ영상","현운용",1,"25","전주","57분전",1234);
  add_line("","안녕하세요 잘부탁","이정헌",0,"26","익산","58분전",453);
  add_line("","ㄱㄱㄱㄱ영상","현운용",1,"25","전주","57분전",1234);
  add_line("","안녕하세요 잘부탁","이정헌",0,"26","익산","58분전",453);
}
function add_line(imguri,text,nickname,sex,age,loc,time,id){
  //
  var line_text_width=$(window).width()-260;
  var sex_color;
  var sex_text;
  if(sex==0){
    sex_color="man";
    sex_text="남자";
  }else if(sex==1){
    sex_color="girl";
    sex_text="여자";
  }
  var html="<div class=line>";
  html+="<div class=img_left>";
  html+="<div class='image_box line_left_margin'>사진없음</div>";
  html+="</div>";
  html+="<div class=line_contents style='width:"+line_text_width+"'>";
  html+="<div class=line_text>"+text+"</div>";
  html+="<div class='line_nickname "+sex_color+"'>"+nickname+"</div>";
  html+="<div class=line_normal>"+sex_text+" "+age+" "+loc+" "+time+"</div>";
  html+="</div>";
  html+="<div class=icon_box>";
  html+="<div class=send_message>쪽지대화</div>";
  html+="<div class=call_facechat>영상신청</div>";
  html+="</div>";
  html+="</div>";
  document.getElementById('contents').innerHTML+=html;
}
