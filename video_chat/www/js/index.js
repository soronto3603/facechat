var state=1;//1이면 iframe , if set 2 , quickblox!
var selId=32507789;
var selName='abc';
var user_list; //user_list[0].id  full_name
var Imember;
var my_id;

function init(){
  Imember=setInterval(CheckMember,1000);
}
<<<<<<< HEAD
=======

function get_user_list(){
  $('#query')
}
>>>>>>> fa57fe9a151023583f91ccf139cd595933264f96
function CheckMember(){
  if(user_list){
      //to-do
      load_all_var();
      clearInterval(Imember);
  }
}
<<<<<<< HEAD
function auto_login(){
  window.plugins.sim.requestReadPermission((r)=>{
    window.plugins.sim.getSimInfo((r)=>{
      checkLoginStatus((e)=>{
        phone_number=r.phoneNumber.replace("+","");
        if(phone_number==""){
          alert("핸드폰 번호를 알 수 없습니다.");
        }
        if(e){
          $('#input_name').val(e);
          $("#submit_log").click();
        }else{
          document.getElementById('iframe').src="http://hume.co.kr/facechat/signin/";
        }
      });

    },()=>{})}, (er)=>{alert(er);});
}
function load_all_var(){
  for(var i=0;i<user_list.length;i++){

=======
function load_all_var(){
  for(var i=0;i<user_list.length;i++){
>>>>>>> fa57fe9a151023583f91ccf139cd595933264f96
    if(user_list[i]==null)continue;
    if(my_id==user_list[i].id){
      delete user_list[i];
    }
  }

  var json=JSON.stringify(user_list);
  document.getElementById('iframe').contentWindow.postMessage(json,'*');
}
function CheckMyid(id){
  my_id=id;
  $.get("http://hume.co.kr/facechat/sql/update_id.php",{id:my_id,phone:phone_number}).done((r)=>{

    //alert(r);
  });
<<<<<<< HEAD
}
=======

}


>>>>>>> fa57fe9a151023583f91ccf139cd595933264f96
window.onload=init();
