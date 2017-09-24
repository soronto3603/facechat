
var menu_item_list=[
    document.getElementById('menu1'),document.getElementById('menu2'),
    document.getElementById('menu3'),document.getElementById('menu4'),
    document.getElementById('menu5'),document.getElementById('menu6')
  ];
function click_menu(btn_n){
    select_btn=btn_n;
    var width_size=$('#menu1').width();

    //document.getElementById('menu_line').style.left=width_size*btn_n;
    $('#menu_line').animate({left:width_size*btn_n+"px"},300,()=>{});
    //alert(btn_n);
}
function reload_data(){
  window.parent.postMessage('reload',"*");
}
function click_face_chat_btn(id,name){
  window.parent.postMessage('{"title":"facechat","id":"'+id+'","name":"'+name+'"}',"*");
}
function swiperAppendSlide(imguri,sex,name,loc,id){
  var html="<div class='swiper-slide'><center><img src='./profileimg/";
  html+=imguri;
  html+="' width=200 height=200><div>"+sex+name+loc+"</div>";
  html+="<div class=request_face_chat onclick='click_face_chat_btn(\""+id+"\",\""+name+"\")'>"+id+name+"영상통화신청하기</div>";
  html+="</center></div>";
  //alert(html);
  swiper.appendSlide(html);
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
    for(var i=0;i<user_array.length;i++){
      swiperAppendSlide("jimin.JPG","",user_array[i].full_name,"",user_array[i].id);
    }
  }
}
