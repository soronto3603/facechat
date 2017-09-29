window.onload=()=>{
  // add_line("","ㄱㄱㄱㄱ영상","현운용",1,"25","전주","57분전",1234);
  // add_line("","안녕하세요 잘부탁","이정헌",0,"26","익산","58분전",453);
  // add_line("","ㄱㄱㄱㄱ영상","현운용",1,"25","전주","57분전",1234);
  // add_line("","안녕하세요 잘부탁","이정헌",0,"26","익산","58분전",453);
  // add_line("","ㄱㄱㄱㄱ영상","현운용",1,"25","전주","57분전",1234);
  // add_line("","안녕하세요 잘부탁","이정헌",0,"26","익산","58분전",453);
  window.parent.postMessage("Phone","*");
  window.parent.postMessage("location","*");
  //setInterval(get_chatroom_list,2000);
}
var my_phone;
var my_lat;
var my_lng;
function get_chatroom_list(){
  document.getElementById('contents').innerHTML="";
  $.get("http://hume.co.kr/facechat/sql/select_chat_user.php",{phone:my_phone}).done((r)=>{
    var chatroom_json=JSON.parse(r);

    for(var i=0;i<chatroom_json.length;i++){
      var target_phone;
      if(chatroom_json[i][1]==my_phone)target_phone=chatroom_json[i][2];
      else if(chatroom_json[i][2]==my_phone)target_phone=chatroom_json[i][1];
      $.post("http://hume.co.kr/facechat/sql/select_user_by_chatroom.php",{target:target_phone,phone:my_phone,date:chatroom_json[i][3],last_update:chatroom_json[i][4]}).done((re)=>{
        if(re=="false"){

        }else{
          var result=JSON.parse(re);
          add_line(result[7],result[15],result[2],result[4],result[11],result[5],result[14],'',result[8]);
        }
      });
    }
  });
  // $.post("http://hume.co.kr/facechat/sql/select_chatroom.php",{id:my_phone}).done((r)=>{
  //   var result=JSON.parse(r);
  //   for(var i=0;i<result.length;i++){
  //     var target_phone;
  //     if(result[i][1]==my_phone)target_phone=result[i][2];
  //     else if(result[i][2]==my_phone)target_phone=result[i][1];
  //     $.post("http://hume.co.kr/facechat/sql/select_user_by_chatroom.php",{target:target_phone,phone:my_phone,date:result[i][3],last_update:result[i][4]}).done((re)=>{
  //       if(re=="false"){
  //       }{
  //         //alert(re);
  //         var result2=JSON.parse(re);
  //         add_line(result2[7],result2[15],result2[2],result2[4],result2[11],result2[5],result2[14],'',result2[8])
  //       }
  //     });
  //   }
  // });
}
// function get_user_info(){
//   my_phone="821058837630";
//   my_lat="123";
//   my_lng="123";
//   $.post("http://hume.co.kr/facechat/sql/select_user.php",{lat:my_lat,lng:my_lng,phone:my_phone}).done((r)=>{
//     var user_json=JSON.parse(r);
//     for(var i=0;i<user_json.length;i++){
//       add_line(user_json[i][7],user_json[i][5],user_json[i][2],user_json[i][4],user_json[i][11],user_json[i][14],user_json[i][6],user_json[i][1],user_json[i][8]);
//     }
//   });
// }
function request_talk(phone){
  window.parent.postMessage('{"title":"chatroom","phone":"'+phone+'"}',"*");
}
function request_face_chat_val(id,name){
  window.parent.postMessage('{"title":"facechat","id":"'+id+'","name":"'+name+'"}',"*");
}
function add_line(imguri,text,nickname,sex,age,loc,time,id,phone){
  var line_text_width=$(window).width()-260;
  var sex_color;
  var sex_text;

  var a_loc=Math.round(parseFloat(loc));

  if(sex==0){
    sex_color="man";
    sex_text="남자";
  }else if(sex==1){
    sex_color="girl";
    sex_text="여자";
  }
  var html="<div class=line onclick='request_talk(\""+phone+"\")'>";
  html+="<div class=img_left>";
  html+="<div class='image_box line_left_margin'><img class=img src='"+imguri+"' width=100% height=100%></div>";
  html+="</div>";
  html+="<div class=line_contents style='width:"+line_text_width+"'>";
  html+="<div class='line_nickname "+sex_color+"'>"+nickname+"</div>";
  html+="<div class=line_normal>"+sex_text+" / "+age+"세</div>";
  html+="<div class=line_text>"+text+"</div>";
  html+="</div>";
  html+="<div class=icon_box>";
  html+="</div>";
  html+="</div>";
  document.getElementById('contents').innerHTML+=html;
}
window.onmessage=(e)=>{
  if(e.data==""){

  }else{
    var JSONDATA=JSON.parse(e.data);
    if(JSONDATA.title=="phone"){
      my_phone=JSONDATA.phone;
      get_chatroom_list();
    }else if(JSONDATA.title=="location"){
      my_lat=JSONDATA.lat;
      my_lng=JSONDATA.lng;

    }

  }
}
// function move_talk_room(target){
//   var url="http://hume.co.kr/facechat/talk/index.php?phone="+my_phone+"&target="+target;
//   window.parent.postMessage('{"title":"talk","talk":"'+url+'","back_url":"message"}',"*");
// }
// var my_phone;
// window.onload=()=>{
//   window.parent.postMessage("Phone","*");
//   get_chatroom_list();
//   //get_chatroom_list();
// }
//
// function get_chatroom_list(){
//   my_phone="821058837630";
//   $.post("http://hume.co.kr/facechat/sql/select_chatroom.php",{id:my_phone}).done((r)=>{
//     var result=JSON.parse(r);
//     for(var i=0;i<result.length;i++){
//       var target_phone;
//       if(result[i][1]==my_phone)target_phone=result[i][2];
//       else if(result[i][2]==my_phone)target_phone=result[i][1];
//       $.post("http://hume.co.kr/facechat/sql/select_user_by_chatroom.php",{target:target_phone,phone:my_phone,date:result[i][3],last_update:result[i][4]}).done((re)=>{
//         if(re=="false"){
//
//         }{
//
//           var result2=JSON.parse(re);
//           add_line(result2[8],result2[7],result2[2],result2[4],result2[11],result2[5],result2[14],result2[15])
//         }
//
//       });
//     }
//   });
// }
// function add_line(phone,imguri,nickname,sex,age,loc,time,last_update){
//   var line_text_width=$(window).width()-160;
//   var sex_text;
//   var sex_color;
//
//   if(sex==0){
//     sex_text="남자";
//     sex_color="man";
//   }else if(sex==1){
//     sex_text="여자";
//     sex_color="girl";
//   }
//   var html="";
//   html+=  "<div class=line onclick='move_talk_room(\""+phone+"\")'>";
//   html+=    "<div class=left_photo>";
//   html+=      "<img src='"+imguri+"' width=60 height=60 style='border-radius:40px;margin-top:10px'>";
//   html+=    "</div>";
//   html+=    "<div class=right_bubble style='width:"+line_text_width+"px'>";
//   html+=      "<div class=line_text_first>";
//   html+=        "<font class='line_text_nickname "+sex_color+"'>"+nickname+"</font>";
//   html+=        "<font class=line_text_normal>"+sex_text+" / "+age+"세</font>";
//   //html+=        "<font class=line_text_time>"+time+"</font><</div>";
//   html+=        "<div class=clear></div>";
//   html+=      "<div class=line_text_second>"+last_update+"</div>";
//   html+=    "</div>";
//   html+=  "</div>";
//   document.getElementById('contents').innerHTML+=html;
// }
// window.onmessage=(e)=>{
//   if(e.data==""){
//
//   }else{
//     var JSONDATA=JSON.parse(e.data);
//     if(JSONDATA.title=="phone"){
//       my_phone=JSONDATA.phone;
//       get_chatroom_list();
//     }
//   }
// }
