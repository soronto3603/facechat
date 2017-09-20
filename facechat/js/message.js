function move_talk_room(target){
  var phone=document.getElementById('phone').value;
  var url="http://hume.co.kr/facechat/talk/index.php?phone="+phone+"&target="+target+".php";
  window.parent.postMessage('{"title":"talk","talk":"'+url+'"}',"*");
}
