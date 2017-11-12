window.onload=()=>{
  full_size_resize();
  half_size_resize();
}
function full_size_resize(){
  var width=$(window).width()-21;
  $('.full_width').css("width",width);
}
function half_size_resize(){
  var halfwidth=$(window).width()/2-31;
  $('.half_input').css("width",halfwidth);
}
function insert_cashback(){
  var name=document.getElementById('name').value;
  var phone=document.getElementById('phone').value;
  var number=document.getElementById('number_pre').value+document.getElementById('number_post').value;
  var address=document.getElementById('address').value;
  var bank=document.getElementById('bank').value;
  var account=document.getElementById('account').value;
  var price=document.getElementById('price').value;

  if(name=="" || name.length<3){
    alert("이름은 3글자 이상 입력해주세요.");
    return;
  }
  if(phone==""){
    alert("핸드폰 번호를 입력해주세요.");
    return;
  }
  if(number.length!=7){
    alert("주민등록번호가 이상합니다.");
    return;
  }
  if(address==""){
    alert("주소를 입력해주세요.");
    return;
  }
  if(bank==""){
    alert("은행을 입력해주세요.");
    return;
  }
  if(account==""){
    alert("계좌번호를 입력해주세요.");
    return;
  }
  if(price==""){
    alert("신청캐시를 입력해주세요.");
    return;
  }

  $.post("http://hume.co.kr/facechat2/sql/insert_cacheback.php",{name:name,phone:phone,number:number,address:address,bank:bank,acoount:account,price:price}).done((r)=>{
    console.log(r);
    alert("신청되었습니다.")
  });
}
