var sel_id;
var sel_name;
var phone;
var my_lat;
var my_lng;

function select_it(id,name){
  sel_id=id;
  sel_name=name;
}
function request_face_chat(){
  var swiperno=swiper.activeIndex;
  if(user_info_array[swiperno]['id']){
    select_it(user_info_array[swiperno]['id'],user_info_array[swiperno]['name']);
    click_face_chat_btn();
  }
}
function request_face_chat_val(id,name){
  select_it(id,name);
  click_face_chat_btn();
}
function click_like(){
  var swiperno=swiper.activeIndex;
  document.getElementById('like'+user_info_array[swiperno]['id']).innerHTML=document.getElementById('like'+user_info_array[swiperno]['id']).innerHTML*1+1;

  $.get("http://hume.co.kr/facechat2/sql/update_like_by_phone.php",{phone:user_info_array[swiperno]['phone']}).done((r)=>{
    console.log("["+user_info_array[swiperno]['phone']+"] plus a like");
  });
}
function request_talk(){
  var swiperno=swiper.activeIndex;
  if(user_info_array[swiperno]['phone']){
    window.parent.postMessage('{"title":"talk","phone":"'+user_info_array[swiperno]['phone']+'","img":"'+user_info_array[swiperno]['img']+'"}',"*");
  }else {
    alert("대상을 찾을 수 없습니다.");
  }

}
function request_talk_val(phone,img){
  window.parent.postMessage('{"title":"talk","phone":"'+phone+'","img":"'+img+'"}',"*");
}
function reload_data(){
  get_user_data();
  //window.parent.postMessage('Reload',"*");
  //document.getElementById('load').style.display="block";
}
function click_face_chat_btn(){
  if(sel_id==null || sel_name==null){
    alert("유저를 선택해주세요.");
    return;
  }
  window.parent.postMessage('{"title":"facechat","id":"'+sel_id+'","name":"'+sel_name+'"}',"*");
}

function swiperAppendSlide(imguri,sex,name,loc,id,point,age){
  //alert(html);
  var sex_text;
  if(sex==0){
    sex_text="남성";
  }else{
    sex_text="여성";
  }
  var html='<div class="swiper-slide">';
  html+='<center>';
  html+='<div id=content_container'+id+' class=content_container">';

  html+='<div class=content_img_box><img onclick="imageView(\''+imguri+'\')" class=content_img src="'+imguri+'" width=200 height=200"></div>';
  html+='<div class=profile_text><div class=text_detail>'+sex_text+" / "+age+"세 / <font id=like"+id+">"+point+"</font></div><div class=text_name>"+name+'</div></div>';
  html+='</div></center></div>';
  swiper.appendSlide(html);
}

function add_testuser(){
  var iu='<div class="swiper-slide"><center><div id=content_container class=content_container onclick="alert(\"테스트유저로서 선택할 수 없습니다.\")"><div class=profile_text>아이유</div><img  class=content_img src="./profileimg/iu.JPG" width=200 height=200><div class=profile_title>그린라이트일까요?</div></div></center></div>'
  swiper.appendSlide(iu);
}
window.onload=()=>{
  rank_box_size();
  window.parent.postMessage("Phone","*");

}
function imageView(url){
  window.parent.postMessage('{"title":"imageView","url":"'+url+'"}',"*");
}
function rank_box_size(){
  // var height=$(window).height()*0.5-70;
  // $('.rank_list_box').css("height",height);
}
var rank_count=1;
function add_line(imguri,text,nickname,sex,age,loc,time,id,phone_){
  var line_text_width=$(window).width()-260;
  var sex_color;
  var sex_text;



  var a_loc=Math.round(parseFloat(loc));
  //강원도 - 제주도 617km
  if(a_loc>617)a_loc="???";

  if(sex==0){
    sex_color="man";
    sex_text="남자";
  }else if(sex==1){
    sex_color="girl";
    sex_text="여자";
  }
  var html="<div class=line>";
  html+="<div class=img_left>";
  html+="<div class='image_box line_left_margin'><img onclick='imageView(\""+imguri+"\")' class=img src='"+imguri+"' width=100% height=100%></div>";
  html+="</div>";
  html+="<div class=line_contents style='width:"+line_text_width+"'>";
  html+="<div class='line_nickname "+sex_color+"'>"+nickname+"</div>";
  html+="<div class=line_text>"+text+"</div>";
  html+="<div class=line_normal>"+sex_text+" / "+age+"세 / "+a_loc+"Km</div>";
  html+="</div>";
  html+="<div class=icon_box1>";
  html+="<div class=send_message onclick='request_talk_val(\""+phone_+"\",\""+imguri+"\")'><img src='./img/chat.png' width=50 height=50></div>";
  html+="<div class=call_facechat onclick='request_face_chat_val(\""+id+"\",\""+nickname+"\")'><img src='./img/video.png' width=50 height=50></div>";
  html+="</div>";
  html+="</div>";
  rank_count++;
  document.getElementById('rank_box').innerHTML+=html;
}
function get_users_info(){
  $.post("http://hume.co.kr/facechat2/sql/select_user.php",{lat:my_lat,lng:my_lng,phone:phone,type:""}).done((r)=>{
    var user_json=JSON.parse(r);
    if(user_json.length==0){
      document.getElementById('rank_box').innerHTML='<div class=nothing_user_line>접속중인 유저가 없습니다.</div>';
    }
    for(var i=0;i<user_json.length;i++){
      if(user_json[i][4]==my_sex)continue;
      add_line(user_json[i][7],user_json[i][5],user_json[i][2],user_json[i][4],user_json[i][11],user_json[i][13],user_json[i][6],user_json[i][1],user_json[i][8]);
    }
  });
}
// $.get("http://hume.co.kr/facechat/sql/select_user_by_id.php",{id:JSONDATA[i].id}).done((r)=>{
//   var user_data=JSON.parse(r);
//   //swiperAppendSlide(user_data[7],user_data[4],user_data[2],user_data[5],user_data[1]);
// });
function get_user_data(){
  swiper.removeAllSlides();
  //phone="821058837630";
  $.post("http://hume.co.kr/facechat2/sql/select_user_point.php",{phone:phone}).done((r)=>{
    var user_json=JSON.parse(r);
    console.log("live.js"+r);
    if(user_json.length==0){
      swiper.appendSlide("<div class='swiper-slide'><div class=nothing_user>접속중인 유저가 없습니다.</div></div>");
    }
    for(var i=0;i<user_json.length;i++){
      if(user_json[i][4]==my_sex)continue;
      swiperAppendSlide(user_json[i][7],user_json[i][4],user_json[i][2],'',user_json[i][1],user_json[i][10],user_json[i][11]);
      //user_info_array[user_info_array.length]=JSON.parse('{"id":"'+user_json[i][1]+'","name":"'+user_json[2]+'"}');
      user_info_array[user_info_array.length]={'id':user_json[i][1],'name':user_json[i][2],'img':user_json[i][7],'phone':user_json[i][8]};
    }
  });
}

var user_array;
var user_info_array=[];
var my_sex=-1;
window.onmessage=(e)=>{
  if(e.data==""){

  }else{
    var JSONDATA=JSON.parse(e.data);
    if(JSONDATA.title=="phone"){
      phone=JSONDATA.phone;
      $.get("http://hume.co.kr/facechat2/sql/select_sex_by_phone.php",{phone:phone}).done((r)=>{
        my_sex=r;
        window.parent.postMessage("Reload","*");
        window.parent.postMessage("location","*");
        get_user_data();
      });
    }else if(JSONDATA.title=="location"){
      my_lat=JSONDATA.lat;
      my_lng=JSONDATA.lng;
      rank_count=1;
      get_users_info();
    }else if(JSONDATA.title=="sex"){
      my_sex=JSONDATA.sex;
    }
    // user_array=new Array();
    // for(var i=0;i<JSONDATA.length;i++){
    //   if(JSONDATA[i]==null)continue;
    //   var user=new Object();
    //   user.id=JSONDATA[i].id;
    //   user.full_name=JSONDATA[i].full_name;
    //   user_array.push(user);
    // }
    // swiper.removeAllSlides();
    // //add_testuser();
    //
    // for(var i=0;i<user_array.length;i++){
    //   $.get("http://hume.co.kr/facechat/sql/select_user_by_id.php",{
    //     id:user_array[i].id
    //   }).done((r)=>{
    //     var obj=JSON.parse(r);
    //     swiperAppendSlide(obj.imguri,"",obj.name,"",obj.id);
    //     user_info_array[user_info_array.length]=obj;
    //   });
    // }
    //document.getElementById('load').style.display="none";
  }
}
