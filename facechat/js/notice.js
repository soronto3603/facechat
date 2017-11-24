window.onload=()=>{
  get_notice();
}
function open_div(number){
  if(document.getElementById('div'+number).style.display=="none"){
    document.getElementById("div"+number).style.display="block";
  }else{
    document.getElementById('div'+number).style.display="none";
  }

}
function get_notice(){
  $.get("http://ksar.co.kr/facechat2/sql/select_notice.php").done((r)=>{
    var obj=JSON.parse(r);
    for(var i=0;i<obj.length;i++){
      var html='<div class="line" onclick="open_div('+obj[i][0]+')">';
      html+=  '<div class="line_icon"><img src="./img/iconmonstr-arrow-25-240gray.png" width=20 height=20></div>';
      html+='<div class="content_head">'+decodeURI(obj[i][1])+'</div>';
      html+='</div><div class=content_box style="display:none" id=div'+obj[i][0]+'><div class="content">'+decodeURI(obj[i][2])+'</div></div>';

      document.getElementById('contents').innerHTML+=html;
    }
  });
}
window.onmessage=()=>{

}
