var get_data_interval;
var phone;
var target_phone;
var target_info;
window.onload=()=>{
  $('#talk_input_box').css("width",$(window).width()-80+"px");
  get_user_data();
  get_data_interval=setInterval(get_talk_data,1000);
}
function imageView(url){
  window.parent.postMessage('{"title":"imageView","url":"'+url+'"}',"*");
}
function request_facechat(){
  window.parent.postMessage('{"title":"facechat","id":"'+target_info[1]+'","name":"'+target_info[2]+'"}',"*");
}
function get_user_data(){
  phone=document.getElementById('phone').value;
  target=document.getElementById('target').value;
  $.get("http://hume.co.kr/facechat2/sql/select_user_one_by_phone.php",{phone:target}).done((r)=>{
    target_info=JSON.parse(r);
  });
}
window.onmessage=(e)=>{
  if(e.data=="backbutton"){
    backbutton();
  }else{
    var obj=JSON.parse(e.data);
    if(obj.title==""){

    }else if(obj.title=="Phone"){
      phone=obj.Phone;
    }
  }
}
function backbutton(){
  window.parent.postMessage("chatback","*");
}
function stop_to_get_data(){
  clearInterval(get_data_interval);
}
function add_next_day_line(date){
  var line_width=$(window).width()-20;
  var html='';
  html+="<div class='next_day_line' style='width:"+line_width+"px'>"+date+"</div>";
  document.getElementById('content_container').innerHTML+=html;
}
function add_chat(text,date,target,nickname,imguri){
  var html='';
  var type;
  if(target==0){
    type="me";
  }else if(target==1){
    type="target";
  }
  html+="<div class=content_"+type+">";
  if(target==1){
    html+="<img src='"+imguri+"' class='profile_photo ";
    html+="' width=40 height=40>";
  }
  html+="<div class='line_left ";
  if(target==0){
    html+="line_left_me";
  }
  html+="'><div class=chatbubble_"+type+">"+text+"</div>";
  html+="<div class=time>"+date+"</div></div></div>";
  html+="<div class=clear></div><div class=endline></div>";
  document.getElementById('content_container').innerHTML+=html;
}
var last_talk_number=0;
function get_talk_data(){
  var phone=document.getElementById('phone').value;
  var target=document.getElementById('target').value;
  $.post("http://hume.co.kr/facechat2/sql/select_chat.php",{
    no:last_talk_number,
    fromid:phone,
    toid:target
  }).done((r)=>{
    var obj=JSON.parse(r);
    if(obj.length==0)return;
    last_talk_number=obj[obj.length-1][0];
    for(var i=0;i<obj.length;i++){
      var type=0;
      if(phone==obj[i][1]){type=0;}
      else{type=1;}
      add_chat(obj[i][4],obj[i][3],type,obj[i][1],target_info[7]);
    }
  });
}
function send_message(){
  var phone=document.getElementById('phone').value;
  var target=document.getElementById('target').value;
  var content=document.getElementById('talk_input').value;
  $.post("http://hume.co.kr/facechat2/sql/insert_chat.php",{
    fromid:phone,
    toid:target,
    content:content,
    imguri:'',
    towasread:0,
  }).done((r)=>{
  });
}
