window.onload=()=>{
  get_notice();
}
function get_notice(){
  $.get("http://hume.co.kr/facechat2/sql/select_notice.php").done((r)=>{
    var obj=JSON.parse(r);
    for(var i=0;i<obj.length;i++){
      var html="<div class=line>";
      html+="<div class=content_head><font>"+obj[i][0]+".</font>"+decodeURI(obj[i][1])+"</div>";
        html+="<div class=content>"+decodeURI(obj[i][2])+"</div>";
      html+="</div>";
      document.getElementById('contents').innerHTML+=html;
    }
  });
}
window.onmessage=()=>{

}
