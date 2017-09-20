function click_menu(btn){
  var url="http://hume.co.kr/facechat/"+btn+".php";
  window.parent.postMessage('{"title":"move","move":"'+url+'"}',"*");
}
