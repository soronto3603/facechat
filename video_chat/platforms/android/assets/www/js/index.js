var state=1;//1이면 iframe , if set 2 , quickblox!
var selId=32507789;
var selName='abc';
var user_list; //user_list[0].id  full_name
var Imember;
var my_id;

function init(){
  Imember=setInterval(CheckMember,1000);
}

function get_user_list(){
  $('#query')
}
function CheckMember(){
  if(user_list){
      //to-do
      load_all_var();
      clearInterval(Imember);
  }
}
function load_all_var(){
  for(var i=0;i<user_list.length;i++){
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

}


window.onload=init();
