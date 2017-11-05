var phone;
var my_lat;
var my_lng;
var is_signin=0;
window.onload=()=>{
  //text_center_margin();
  request_phone_number();
  //window.parent.postMessage("location","*");
}
function reset_check_box(str){
  document.getElementById(str).checked=false;
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
  window.parent.postMessage("CameraModal","*");
}
function text_center_margin(){
  $('.normal').css("width",($(window).width()-102)+"px");
}
function update_user_info(){
  window.parent.postMessage("GetPst","*");
  // var imguri=document.getElementById('input_profile').src;
  // if(document.getElementById('input_profile').src=="http://hume.co.kr/facechat/img/man.png"){
  //   alert("프로필 이미지를 등록해주세요.")
  // }
  // var nickname;
  // if(document.getElementById('nickname').value==""){
  //   alert("닉네임을 입력해주세요.");
  //   return;
  // }else{
  //   nickname=document.getElementById('nickname').value;
  // }
  // var age;
  // if(document.getElementById('age').value==""){
  //   alert("나이를 입력해주세요.");
  //   return;
  // }else{
  //   age=document.getElementById('age').value;
  // }
  // var sex;
  // if(document.getElementById('man').checked){
  //   sex=0;
  // }else if(document.getElementById('girl').checked){
  //   sex=1;
  // }else{
  //   alert("성별을 선택해주세요.");
  //   return;
  // }
  // var title=document.getElementById('title').value;
  // $.post("http://hume.co.kr/facechat/sql/insert_user.php",{
  //   name:nickname,
  //   tag:"Hume",
  //   sex:sex,
  //   loc:title,
  //   imguri:imguri,
  //   phone:phone,
  //   lat:my_lat,
  //   lng:my_lng,
  //   point:3000,
  //   age:age
  // }).done((r)=>{
  //   alert(r+"완료");
  // });
}
function update_user_info2(){
  imguri=document.getElementById('input_profile').src;
  nickname=document.getElementById('nickname').value;
  if(document.getElementById('man').checked){
    sex=0;
  }else{
    sex=1;
  }
  age=document.getElementById('age').value;
  sql="UPDATE facechat_user SET imguri='"+imguri+"',name='"+nickname+"',sex='"+sex+"',age='"+age+"' WHERE phone='"+phone+"'";

  $.post("http://hume.co.kr/facechat2/sql/insert_user_sigin.php",{
    sql:sql
  }).done((r)=>{
    alert(r+"완료");
  });
}
function get_user_info(){
  $.get("http://hume.co.kr/facechat2/sql/select_user_one_by_phone.php",{phone:phone}).done((r)=>{
    if(r=="false"){
        //alert("사용자를 찾을 수 없습니다.");
        window.parent.postMessage("Siging","*");
    }else{
      //alert("사용자 정보 있음" +r);
      var obj=JSON.parse(r);
      document.getElementById('nickname').value=obj[2];
      if(obj[4]==0){
        document.getElementById('man').checked=true;
        document.getElementById('girl').checked=false;
      }
      else if(obj[4]==1){
        document.getElementById('girl').chekced=true;
        document.getElementById('man').checked=false;
      }
      document.getElementById('age').value=obj[11];
      document.getElementById('title').value=obj[5];
      document.getElementById('point').innerHTML=obj[9];

      document.getElementById('input_profile').src=obj[7];
      document.getElementById('update_button').innerHTML="<div class=update_button onclick=\"update_user_info2();\">수정하기</div>";
    }
  });
}
var imguri;
var nickname;
var age;
var sex;
window.onmessage=(e)=>{
  if(e.data==""){

  }else{
    var obj=JSON.parse(e.data);
    if(obj.title=="ThumbUri"){
      document.getElementById('input_profile').src=obj.ThumbUri;
    }else if(obj.title=="phone"){
      phone=obj.phone;
      get_user_info();
    }else if(obj.title=="location"){
      my_lat=obj.lat;
      my_lng=obj.lng;

      imguri=document.getElementById('input_profile').src;
      if(imguri=="http://hume.co.kr/facechat2/img/man.png"){
        alert("프로필 이미지를 등록해 주세요.");
        return;
      }
      nickname=$("#nickname").val();
      if(nickname==""){
        alert("닉네임을 입력해주세요.");
        return;
      }
      age=$("#age").val();
      if(age==""){
        alert("나이를 입력해주세요.");
        return;
      }
      sex=0;

      if(document.getElementById('man').checked){
        sex=0;
      }else if(document.getElementById('girl').checked){
        sex=1;
      }

      var sql="insert into facechat_user values(null,'','"+$("#nickname").val()+"','Hume','"+sex+"','친구만나기',now(),'"+document.getElementById('input_profile').src+"','"+phone+"',3000,123,"+$("#age").val()+","+my_lat+","+my_lng+");";
      $.post("http://hume.co.kr/facechat2/sql/insert_user_sigin.php",{
        sql:sql
      }).done((r)=>{
        alert("회원가입 완료");
        window.parent.postMessage('{"title":"SigingEnd","name":"'+nickname+'"}',"*");
      });
    }
  }
}
