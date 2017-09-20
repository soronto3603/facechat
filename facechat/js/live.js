var sel_id;
var sel_name;

function select_it(id,name){
  sel_id=id;
  sel_name=name;
}

function reload_data(){
  window.parent.postMessage('reload',"*");
  document.getElementById('load').style.display="block";
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
  html+='<img class=content_img src="./profileimg/'+imguri+'" width=200 height=200>';
  html+='<div class=profile_text>'+name+sex+loc+'</div>';
  html+='</div></center></div>';
  swiper.appendSlide(html);
}
function toggle_select(id){
  $('.content_container').removeClass("content_select");
  $('#content_container'+id).addClass("content_select");
}
function add_textuser(){
  var jisu='<div class="swiper-slide"><center>  <div id=content_container class=content_container onclick="alert(\'테스트유저로서 선택할 수 없습니다.\')">  <img class=content_img src="./profileimg/jisu.JPG" width=200 height=200>    <div class=profile_text>지수</div>  </div>  </center>  </div>';
  var iu='<div class="swiper-slide"><center>  <div id=content_container class=content_container onclick="alert(\'테스트유저로서 선택할 수 없습니다.\')"><img class=content_img src="./profileimg/iu.JPG" width=200 height=200>  <div class=profile_text>아이유</div>  </div>  </center></div>';
  swiper.appendSlide(jisu);
  swiper.appendSlide(iu);
}
window.onload=()=>{

}
// $.get("http://hume.co.kr/facechat/sql/select_user_by_id.php",{id:JSONDATA[i].id}).done((r)=>{
//   var user_data=JSON.parse(r);
//   //swiperAppendSlide(user_data[7],user_data[4],user_data[2],user_data[5],user_data[1]);
// });
var user_array;
window.onmessage=(e)=>{
  if(e.data==""){

  }else{
    var JSONDATA=JSON.parse(e.data);
    user_array=new Array();
    for(var i=0;i<JSONDATA.length;i++){
      if(JSONDATA[i]==null)continue;
      var user=new Object();
      user.id=JSONDATA[i].id;
      user.full_name=JSONDATA[i].full_name;
      user_array.push(user);
    }
    swiper.removeAllSlides();
    add_textuser();
    for(var i=0;i<user_array.length;i++){
      swiperAppendSlide("hyojin.JPG","",user_array[i].full_name,"",user_array[i].id);
    }
    document.getElementById('load').style.display="none";
  }
}
