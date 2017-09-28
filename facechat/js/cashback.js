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
