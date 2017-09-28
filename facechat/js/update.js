var phone;
window.onload=()=>{
  text_center_margin();
  request_phone_number();
}
function request_phone_number(){
  window.parent.postMessage("Phone","*");
}
function modal_title_line(str){
  document.getElementById('input_title').innerHTML=str;
}
function modal_sex_line(str){
  document.getElementById('input_sex').innerHTML=str;
}
function modal_camera_line(str){
  window.parent.postMessage(str,"*");
}
function title_modal(){
  if(document.getElementById('modal_title').style.display=="block"){
    document.getElementById('modal_title').style.display="none";
  }else if(document.getElementById('modal_title').style.display=="none"){
    document.getElementById('modal_title').style.display="block";
  }else{
    document.getElementById('modal_title').style.display="block";
  }
}
function sex_modal(){
  if(document.getElementById('modal_sex').style.display=="block"){
    document.getElementById('modal_sex').style.display="none";
  }else if(document.getElementById('modal_sex').style.display=="none"){
    document.getElementById('modal_sex').style.display="block";
  }else{
    document.getElementById('modal_sex').style.display="block";
  }
}
function camera_modal(){
  if(document.getElementById('modal_camera').style.display=="block"){
    document.getElementById('modal_camera').style.display="none";
  }else if(document.getElementById('modal_camera').style.display=="none"){
    document.getElementById('modal_camera').style.display="block";
  }else{
    document.getElementById('modal_camera').style.display="block";
  }
}
function text_center_margin(){
  $('.left_title').css("margin-left",($(window).width()-280)/2+"px");
}
function update_user_info(){
  var imguri=document.getElementById('input_profile').src;
  var nickname=document.getElementById('input_nickname').value;
  var age=document.getElementById('input_age').value;
  var sex=document.getElementById('input_sex').innerHTML;
  var title=document.getElementById('input_title').innerHTML;
  $.post("http://hume.co.kr/facechat/sql/insert_user.php",{
    name:nickname,
    tag:"Hume",
    sex:sex,
    loc:title,
    imguri:imguri,
    phone:phone,
    age:age
  }).done((r)=>{
    alert(r+"완료");
  });
}
function get_user_info(){
  $.get("http://hume.co.kr/facechat/sql/select_user_one_by_phone.php",{phone:phone}).done((r)=>{
    if(r=="false"){
        alert("사용자를 찾을 수 없습니다.");
        return;
    }
    var obj=JSON.parse(r);
    document.getElementById('input_nickname').value=obj[2];
    if(obj[4]==0)document.getElementById('input_sex').innerHTML="남성";
    else if(obj[4]==1)document.getElementById('input_sex').innerHTML="여성";
    document.getElementById('input_age').value=obj[11];
    document.getElementById('input_title').innerHTML=obj[5];
    document.getElementById('input_points').innerHTML=obj[9];
    document.getElementById('input_likes').innerHTML=obj[10];
    document.getElementById('input_profile').src=obj[7];
  });
}
window.onmessage=(e)=>{
  if(e.data==""){

  }else{
    var obj=JSON.parse(e.data);
    if(obj.title=="ThumbUri"){
      document.getElementById('input_profile').src=obj.ThumbUri;
    }else if(obj.title=="phone"){
      phone=obj.phone;

      get_user_info();
    }
  }
}
