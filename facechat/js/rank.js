window.onload=()=>{
  add_line("01위","","이정헌",0,26,123);
  add_line("02위","","현운용",0,24,234);
  add_line("01위","","이정헌",0,26,123);
  add_line("02위","","현운용",0,24,234);
  add_line("01위","","이정헌",0,26,123);
  add_line("02위","","현운용",0,24,234);
}
function rank_modal(){
  if(document.getElementById('modal_rank').style.display=="block"){
    document.getElementById('modal_rank').style.display="none";
  }else if(document.getElementById('modal_rank').style.display=="none"){
    document.getElementById('modal_rank').style.display="block";
  }else{
    document.getElementById('modal_rank').style.display="block";
  }
}
function sex_modal(){
  if(document.getElementById('modal_sex').style.display=="block"){
    document.getElementById('modal_sex').style.display="none";
  }else if(document.getElementById('modal_sex').style.display=="none"){
    document.getElementById('modal_sex').style.display="block";
  }else{
    document.getElementById('modal_sex').style.display="block";
  }
}
function add_line(rank,imguri,nickname,sex,age,id){
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
  html+=      "<div class=send_message>쪽지대화</div>";
  html+=      "<div class=call_facechat>영상신청</div>";
  html+=    "</div>";
  html+=  "</div>";
  document.getElementById('contents').innerHTML+=html;
}
