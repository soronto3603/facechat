var sex=0;
var nickname='';
var age=20;
var img='';
var phone='';
var lat=0;
var lng=0;

function camera_message(str){
  window.parent.postMessage(str,"*");
}
function exit_app(){
  window.parent.postMessage("exit","*");
}
function select_man(){
  $("#man").removeClass("notselected").addClass("man");
  $("#girl").removeClass("girl").addClass("notselected");
  sex=0;
}
function select_girl(){
  $("#girl").removeClass("notselected").addClass("girl");
  $("#man").removeClass("man").addClass("notselected");
  sex=1;
}
function remove_exit_modal(){
  $('#exit_modal').css('display','none');
}
function age_list_up(){
  var html="";
  for(var i=18;i<48;i++){
    html+="<div class=age_modal_line onclick='select_age_line("+i+")'>"+i+"</div>";
  }
  document.getElementById('age_list').innerHTML=html;
}
function select_age_line(age_){
  age=age_;
  $('#front_age').html(age);
}
function request_location(){
  window.parent.postMessage('location','*');
}
function signin(){
  // nickname=$('#nickname').val();
  // if(img=='')alert("이미지를 넣어주세요.");
  // if(nickname.length<3 || nickname.length>8)alert("닉네임은 최소3글자에서 최대 8글자까지 가능합니다.");
  //
  // $.post("http://hume.co.kr/facechat/sql/insert_user_signin.php",{
  //   var sql="insert into facechat_user values(null,'','"+$("#nickname").val()+"','Hume','"+sex+"','친구만나기',now(),'"+document.getElementById('input_profile').src+"','"+phone+"',3000,123,"+$("#age").val()+","+my_lat+","+my_lng+");";
  // }).done((r)=>{
  //
  // });
  // window.postMessage('{"title":"signin","name":"'+nickname+'"}',"*");
  //alert(sex+nickname+age+img);
}
function request_phone(){
  window.parent.postMessage("Phone","*");
}

window.onload=()=>{
  //$("#exit_modal").css("display","block");
  age_list_up();
  request_phone();
  //$("#age_modal").css("display","block");
  //$("#img_modal").css("display","block");

  $('#exit_modal').css("display","none");
  $('#age_modal').css("display","none");
  $('#img_modal').css("display","none");
}
window.onmessage=(e)=>{
  if(e.data=="backbutton"){
    console.log(document.getElementById('exit_modal').style.display);
    if(document.getElementById('exit_modal').style.display=='block'||
    document.getElementById('age_modal').style.display=="block"||
  document.getElementById('img_modal').style.display=="block" ){
      $('#exit_modal').css("display","none");
      $('#age_modal').css("display","none");
      $('#img_modal').css("display","none");
    }else{
      $('#exit_modal').css("display","block");
    }
  }else{
    var JSONDATA=JSON.parse(e.data);
    if(JSONDATA.title=="ThumbUri"){
      img=JSONDATA.ThumbUri;
      $('#img').attr('src',"./profileimg/"+JSONDATA.ThumbUri);
    }else if(JSONDATA.title=="location"){
      nickname=$('#nickname').val();
      if(img==''){
        alert("이미지를 넣어주세요.")
        return;
      }
      if(img.indexOf("http://hume.co.kr/facechat2/profileimg/")!=-1){

      }else{
        img="http://hume.co.kr/facechat2/profileimg/"+img;
      }

      if(nickname.length<3 || nickname.length>8){
        alert("닉네임은 최소3글자에서 최대 8글자까지 가능합니다.");
        return;
      }

      lat=JSONDATA.x;
      lng=JSONDATA.y;
      $.get("http://hume.co.kr/facechat2/sql/select_overap_name.php",{
        name:nickname
      }).done((r)=>{
        if(r=="true"){
          alert("중복된 닉네임 입니다.");
        }else{
          var sql="delete from facechat_user where phone='"+phone+"'";
          $.post("http://hume.co.kr/facechat2/sql/insert_user_sigin.php",{sql:sql}).done((r)=>{
            var sql="insert into facechat_user values(null,'','"+nickname+"','Hume','"+sex+"','친구만나기',now(),'"+img+"','"+phone+"',3000,123,"+age+","+lat+","+lng+");";
            $('#loading_modal').css("display","block");
            $.post("http://hume.co.kr/facechat2/sql/insert_user_sigin.php",{
              sql:sql
            }).done((r)=>{
              window.parent.postMessage('{"title":"signin","name":"'+nickname+'"}',"*");
              //alert("회원가입완료");
            });
          });
        }
      });
    }else if(JSONDATA.title=="Phone"){
      phone=JSONDATA.Phone;
    }

  }
}
