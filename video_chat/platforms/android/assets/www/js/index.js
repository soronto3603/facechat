var state=1;//1이면 iframe , if set 2 , quickblox!
var selId=32507789;
var selName='abc';
var user_list; //user_list[0].id
var Imember;

function init(){
  Imember=setInterval(CheckMember,1000);
}

function CheckMember(){
  if(user_list){
      alert(user_list.length);
      //todo
      clearInterval(Imember);
  }
}



window.onload=init();
