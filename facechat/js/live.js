var sel_id;
var sel_name;
var phone;

function select_it(id,name){
  sel_id=id;
  sel_name=name;
}
function request_face_chat(){
  var swiperno=swiper.activeIndex;
  select_it(user_info_array[swiperno].id,user_info_array[swiperno].name);
  click_face_chat_btn();
}
function request_face_chat_val(id,name){
  select_it(id,name);
  click_face_chat_btn();
}
function request_talk(){
  var swiperno=swiper.activeIndex;
  window.parent.postMessage('{"title":"talk","talk":"'+user_info_array[swiperno].phone+'"}',"*");
}
function request_talk_val(phone){
  window.parent.postMessage('{"title":"talk","talk":"'+phone+'"}',"*");
}
function reload_data(){
  window.parent.postMessage('Reload',"*");
  //document.getElementById('load').style.display="block";
}
function click_face_chat_btn(){
  if(sel_id==null || sel_name==null){
    alert("유저를 선택해주세요.");
    return;
  }
  window.parent.postMessage('{"title":"facechat","id":"'+sel_id+'","name":"'+sel_name+'"}',"*");
}

function swiperAppendSlide(imguri,sex,name,loc,id){
  //alert(html);
  var html='<div class="swiper-slide">';
  html+='<center>';
  html+='<div id=content_container'+id+' class=content_container onclick="select_it(\''+id+'\',\''+name+'\');toggle_select('+id+')">';
  html+='<img class=content_img src="'+imguri+'" width=200 height=200>';
  html+='<div class=profile_text>'+name+sex+loc+'</div>';
  html+='</div></center></div>';
  swiper.appendSlide(html);
}
function toggle_select(id){
  $('.content_container').removeClass("content_select");
  $('#content_container'+id).addClass("content_select");
}
function add_testuser(){
  var iu='<div class="swiper-slide"><center><div id=content_container class=content_container onclick="alert(\"테스트유저로서 선택할 수 없습니다.\")"><div class=profile_text>아이유</div><img  class=content_img src="./profileimg/iu.JPG" width=200 height=200><div class=profile_title>그린라이트일까요?</div></div></center></div>'
  swiper.appendSlide(iu);
}
window.onload=()=>{
  rank_box_size();
  window.parent.postMessage("Reload","*");
  window.parent.postMessage("Phone","*");
  add_line("01위","","현운용",0,26,'821058837630');
  add_line("02위","","이정헌",0,24,'01036906736');
}
function rank_box_size(){
  var height=$(window).height()*0.5-70;
  $('.rank_list_box').css("height",height);
}
function get_rank_lis(){

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
  html+=      "<div class=send_message onclick='request_talk_val(\""+phone+"\")'>쪽지대화</div>";
  html+=      "<div class=call_facechat onclick='request_face_chat_val(\""+id+"\",\""+nickname+"\")'>영상신청</div>";
  html+=    "</div>";
  html+=  "</div>";
  document.getElementById('rank_box').innerHTML+=html;
}
// $.get("http://hume.co.kr/facechat/sql/select_user_by_id.php",{id:JSONDATA[i].id}).done((r)=>{
//   var user_data=JSON.parse(r);
//   //swiperAppendSlide(user_data[7],user_data[4],user_data[2],user_data[5],user_data[1]);
// });
var user_array;
var user_info_array=[];
window.onmessage=(e)=>{
  if(e.data==""){

  }else{
    var JSONDATA=JSON.parse(e.data);
    if(JSONDATA.title=="phone"){
      phone=JSONDATA.phone;
    }
    user_array=new Array();
    for(var i=0;i<JSONDATA.length;i++){
      if(JSONDATA[i]==null)continue;
      var user=new Object();
      user.id=JSONDATA[i].id;
      user.full_name=JSONDATA[i].full_name;
      user_array.push(user);
    }
    swiper.removeAllSlides();
    //add_testuser();

    for(var i=0;i<user_array.length;i++){
      $.get("http://hume.co.kr/facechat/sql/select_user_by_id.php",{
        id:user_array[i].id
      }).done((r)=>{
        var obj=JSON.parse(r);
        swiperAppendSlide(obj.imguri,"",obj.name,"",obj.id);
        user_info_array[user_info_array.length]=obj;
      });
    }
    //document.getElementById('load').style.display="none";
  }
}
