var state=1;//1이면 iframe , if set 2 , quickblox!
var selId=33835596;
var selName='ㅈㄷㄷㄷ';
var user_list; //user_list[0].id  full_name
var Imember;
var girl_point_interval;
var my_id;
var gift_point;
var sex=-1;
var isgirl_point=0;

function check_camera_page_is_block(){
  // clearInterval(girl_point_interval);
  if($('#camera_page').css("display")=="block"){
    console.log("camera_page_is_block point:"+isgirl_point);
    if(sex==-1){
      $.get("http://hume.co.kr/facechat2/sql/select_user_by_id.php",{id:my_id}).done((r)=>{
        if(r=="false"){

        }else{
          var object=JSON.parse(r);
          sex=object.sex;
        }
      });
    }else{
      if(sex==0){
        clearInterval(girl_point_interval);
      }
    }
    isgirl_point++;
    if(isgirl_point==60){
      isgirl_point=0;
      $.get("http://hume.co.kr/facechat2/sql/update_user_point.php",{id:my_id,point:'10',why:1}).done((r)=>{

      });
    }
  }else{
    isgirl_point=0;
    sex=-1;
    console.log("camera_page_non_block");
  }
}

function send_point_modal(){
  document.getElementById('modal_send_point').style.display='block';
}
function send_point(howmuch){
  $('#give_point_modal').css('display','none');
  $('#send_point_accept_msg').html(selName+"님께 "+howmuch+"포인트를 선물하시겠습니까?");
  $('#give_point_accept_modal').css("display","block");
  gift_point=howmuch;
  // $.get("http://hume.co.kr/facechat2/sql/update_user_point.php",{id:id,point:point,why:5}).done((r)=>{
  //
  // });
}
function send_point_accetp(){
  $('#give_point_accept_modal').css('display','none');
  $.get("http://hume.co.kr/facechat2/sql/update_user_point.php",{id:my_id,point:"-"+gift_point,why:5}).done((r)=>{
    console.log(r);
    if(r=="false"){
      alert("포인트가 모자랍니다.");
    }else{
      $.get("http://hume.co.kr/facechat2/sql/update_user_point.php",{id:selId,point:gift_point,why:5}).done((r)=>{
        console.log(r);
        alert("선물을 완료했습니다.");
      });
    }
  });
}
function close_send_modal(){
  document.getElementById('modal_send_point').style.display="none";
}
function init(){
  Imember=setInterval(CheckMember,1000);
  girl_point_interval=setInterval(check_camera_page_is_block,1000);
}
function CheckMember(){
  if(user_list){
      //to-do
      clearInterval(Imember);
  }
}
function auto_login(){
  window.plugins.sim.requestReadPermission((r)=>{
    window.plugins.sim.getSimInfo((r)=>{
      checkLoginStatus((e)=>{
        phone_number=r.phoneNumber.replace("+","");
        if(phone_number==""){
          alert("핸드폰 번호를 알 수 없습니다. (Permission Error)");
          navigator.app.exitApp();
        }
        if(e){
          $('#input_name').val(e);
          $("#submit_log").click();
        }else{
          document.getElementById('iframe').src="http://hume.co.kr/facechat2/signin.php";
          splash_animation(100);
        }
      });

    },()=>{})}, (er)=>{alert(er);});
}
function load_all_var(){
  if(user_list){
    for(var i=0;i<user_list.length;i++){

      if(user_list[i]==null)continue;
      if(my_id==user_list[i].id){
        delete user_list[i];
      }
    }

    var json=JSON.stringify(user_list);
    document.getElementById('iframe').contentWindow.postMessage(json,'*');
  }
}
function CheckMyid(id){
  my_id=id;
  $.get("http://hume.co.kr/facechat2/sql/update_id.php",{id:my_id,phone:phone_number}).done((r)=>{

    //alert(r);
  });
}
window.onload=init();
