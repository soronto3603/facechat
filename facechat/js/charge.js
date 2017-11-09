window.onload=()=>{
  setInterval(request_point,1000);
  request_point();
}
function request_point(){
  window.parent.postMessage("point","*");
}
function request_payment(howmuch){
  console.log("charge.js"+howmuch);
  window.parent.postMessage('{"title":"payment","payment":"'+howmuch+'"}',"*");
}
window.onmessage=(e)=>{
  if(e.data==""){

  }else{
    var JSONDATA=JSON.parse(e.data);
    if(JSONDATA.title=="point"){
      document.getElementById('point').innerHTML='<img src="http://hume.co.kr/facechat2/img/iconmonstr-coin-2-32.png" width="18" height="18" style="position: relative;top: 3px;right:3px;">'+JSONDATA.point+"P";
    }
  }
}
