var user_array='';
var phone='';
var lat;
var lng;
window.onload=()=>{
  document.getElementById('modal_exit').style.display="none";

  menu_size();
  request_phone_number();
  request_loc();
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
function click_menu(btn){
  var url="http://hume.co.kr/facechat/"+btn+".php";
  document.getElementById('content_iframe').src=url;
}
function menu_size(){
  var height=$(window).height()-130;
  $('#content_iframe').css("height",height);
}
window.onmessage=(e)=>{
  if(e.data=="Camera"){
    window.parent.postMessage("Camera","*");
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
  }else{
    var obj=JSON.parse(e.data);
    if(obj.title=="ThumbUri"){
      document.getElementById('content_iframe').contentWindow.postMessage('{"title":"ThumbUri","ThumbUri":"http://hume.co.kr/facechat/profileimg/'+obj.ThumbUri+'"}',"*");
    }else if(obj.title=="facechat"){
      window.parent.postMessage('{"title":"facechat","id":"'+obj.id+'","name":"'+obj.name+'"}',"*");
    }else if(obj.title=="Phone"){
      phone=obj.Phone;
    }else if(obj.title=="talk"){
      window.parent.postMessage('{"title":"talk","talk":"'+obj.talk+'","back_url":"'+obj.back_url+'"}',"*");
    }else if(obj.title=="location"){
      lat=obj.x;
      lng=obj.y;
      $.get("http://hume.co.kr/facechat/sql/update_user_loc.php",{
        x:lat,
        y:lng,
        phone:phone
      }).done((r)=>{
        //alert(r);
      });
    }else if(obj.title=="more"){
      document.getElementById('content_iframe').src=obj.more;
    }else{
      user_array=e.data;
      document.getElementById('content_iframe').contentWindow.postMessage(user_array,"*");
      //alert("menu:::"+user_array);
    }
  }
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
