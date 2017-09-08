
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
function click_face_chat_btn(){
  window.parent.postMessage('{"title":"facechat","id":"32507789","name":"abc"}',"*");
}
window.onload=()=>{

}
