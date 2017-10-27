var user_array='';
var phone='';
var lat=0;
var lng=0;
var sex;
window.onload=()=>{
  document.getElementById('modal_exit').style.display="none";
  menu_size();
  request_phone_number();
  setTimeout(request_loc,3000);
  cordova_get_token();
  if(document.getElementById('back_url').value==""){
    click_menu("live");
  }else{
    click_menu(document.getElementById('back_url').value);
  }
}

function cordova_get_token(){
  window.parent.postMessage("token","*");
}
function request_loc(){
  window.parent.postMessage("location","*");
}
function request_phone_number(){
  window.parent.postMessage("Phone","*");
}
function togotosettings(){
  $('#modal_location').css('display','none');
  window.parent.postMessage("location_settings","*");
}
function click_menu(btn){
  var url="http://hume.co.kr/facechat/"+btn+".php";
  document.getElementById('content_iframe').src=url;
}
function menu_size(){
  var height=$(window).height()-93;
  $('#content_iframe').css("height",height);
}
function get_my_point(){
  $.get("http://hume.co.kr/facechat/sql/select_user_one_by_phone.php",{phone:phone}).done((r)=>{
    var json=JSON.parse(r);
    $('#my_point').html(json[9]+"P");
    sex=json[4];
    console.log("sex:"+sex);
  });
}
window.onmessage=(e)=>{
  if(e.data=="Camera"){
    window.parent.postMessage("Camera","*");
  }else if(e.data=="sex"){
    document.getElementById('content_iframe').contentWindow.postMessage('{"title":"sex","sex":"'+sex+'"}',"*");
  }else if(e.data=="CameraModal"){
    document.getElementById('modal_camera').style.display="block";
  }else if(e.data=="PhotoLibrary"){
    window.parent.postMessage("PhotoLibrary","*");
  }else if(e.data=="UserList"){
    document.getElementById('content_iframe').contentWindow.postMessage(user_array,"*");
  }else if(e.data=="Phone"){
    document.getElementById('content_iframe').contentWindow.postMessage('{"title":"phone","phone":"'+phone+'"}',"*");
  }else if(e.data=="Reload"){
    window.parent.postMessage("Reload","*");
  }else if(e.data=="location"){
    document.getElementById('content_iframe').contentWindow.postMessage('{"title":"location","lat":"'+lat+'","lng":"'+lng+'"}',"*");
  }else if(e.data=="backbutton"){
    var current_url=document.getElementById('content_iframe').src;
    if(current_url.indexOf("cashback.php")!=-1 || current_url.indexOf("charge.php")!=-1 || current_url.indexOf("notice.php")!=-1 || current_url.indexOf("point_log.php")!=-1){
      document.getElementById('content_iframe').src="http://hume.co.kr/facechat/more.php";
    }else{
      document.getElementById('modal_exit').style.display="block";
    }
  }else if(e.data=="Siging"){
    is_signing=1;
  }else if(e.data=="GetPst"){
    window.parent.postMessage("GetPst","*");
  }else if(e.data=="LoadOn"){
    modal_load();
  }else if(e.data=="LoadOff"){
    modal_load();
  }else{
    var obj=JSON.parse(e.data);
    if(obj.title=="ThumbUri"){
      document.getElementById('content_iframe').contentWindow.postMessage('{"title":"ThumbUri","ThumbUri":"http://hume.co.kr/facechat/profileimg/'+obj.ThumbUri+'"}',"*");
    }else if(obj.title=="facechat"){
      window.parent.postMessage('{"title":"facechat","id":"'+obj.id+'","name":"'+obj.name+'"}',"*");
    }else if(obj.title=="Phone"){
      phone=obj.Phone;
      get_my_point();
    }else if(obj.title=="talk"){
      modal_send_msg(obj.phone,obj.img);
      //window.parent.postMessage('{"title":"talk","talk":"'+obj.talk+'","back_url":"'+obj.back_url+'"}',"*");
    }else if(obj.title=="location"){
      console.log("Menu.js:Location / LAT:"+obj.x+"/LNG:"+obj.y);
      lat=obj.x;
      lng=obj.y;
      if(obj.x==0 || obj.y==0){
        $('#modal_location').css("display","block");
      }
    }else if(obj.title=="more"){
      document.getElementById('content_iframe').src=obj.more;
    }else if(obj.title=="SigingEnd"){
      is_signing=0;
      click_menu("live");
      window.parent.postMessage('{"title":"signin","name":"'+obj.name+'"}',"*");
    }else if(obj.title=="chatroom"){
      window.parent.postMessage('{"title":"chatroom","talk":"http://hume.co.kr/facechat/talk/index.php?phone='+phone+'&target='+obj.phone+'","back_url":"message"}',"*");
    }else if(obj.title=="imageView"){
      // alert(123);
      // document.getElementById('imageViewIframe').src="http://hume.co.kr/facechat/imageView.php?image="+obj.img+"?backurl="+obj.backurl;
      // document.getElementById('imageView').style.display="block";
    }else{
      user_array=e.data;
      document.getElementById('content_iframe').contentWindow.postMessage(user_array,"*");
      //alert("menu:::"+user_array);
    }
  }
}
function modal_load(){
  // if(document.getElementById('load').style.display=="none"){
  //   document.getElementById('load').style.display="block";
  // }else{
  //   document.getElementById('load').style.display="none";
  // }
}
function modal_exit(){
  if(document.getElementById('modal_exit').style.display=="none"){
    document.getElementById('modal_exit').style.display="block";
  }else{
    document.getElementById('modal_exit').style.display="none";
  }
}
function modal_exit_line(str){
  if(str=="exit"){
    window.parent.postMessage("exit","*");
  }else{
    //document.getElementById('modal_exit').style.display="none";
  }
}
function modal_camera(){
  if(document.getElementById('modal_camera').style.display=="none"){
    document.getElementById('modal_camera').style.display="block";
  }else{
    document.getElementById('modal_camera').style.display="none";
  }
}
function modal_camera_line(str){
  window.parent.postMessage(str,"*");
}
function modal_send_msg(phone,img){
  document.getElementById('send_msg_img').src=img;
  document.getElementById('input_send_msg_phone').value=phone;
  document.getElementById('modal_send_msg').style.display="block";
}
function send_message(){
  target_phone=document.getElementById('input_send_msg_phone').value;
  var text=document.getElementById('input_send_msg').value;
  close_send_message();
  $.post("http://hume.co.kr/facechat/sql/insert_chat.php",{fromid:phone,toid:target_phone,content:text}).done((r)=>{
    alert("전송완료");
    document.getElementById('input_send_msg').value='';
  });
}
function close_send_message(){
  document.getElementById('modal_send_msg').style.display="none";
  document.getElementById('input_send_msg').value='';
}
