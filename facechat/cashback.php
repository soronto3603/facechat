<html>
<head>
  <meta charset="utf-8">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="./css/cashback.css">
</head>
<body>
  <div class="header full_width" style="display:none">
    <font class=header_left_text>보유캐시</font><font class=header_right_text>0캐시</font>
    <div class=clear></div>
  </div>


  <div id=bd>
    <div class=line_tag>예금주</div>
    <div class="line_input full_width"><input type=text class=normal_input id=name></div>
    <div class=line_tag>휴대폰번호</div>
    <div class="line_input full_width"><input type=text class=normal_input id=phone></div>
    <div class=line_tag>주민번호</div>
    <div class="line_input full_width"><input type=text class=half_input id=number_pre maxlength=6 ><div class=half_input_dash>-</div><input type=text class=half_input style="width:30px;" id=number_post maxlength=1 ></div>
    <div class=line_tag>주소</div>
    <div class="line_input full_width"><input type=text class=normal_input id=address></div>
    <div class=line_tag>은행</div>
    <div class="line_input full_width"><input type=text class=normal_input id=bank></div>
    <div class=line_tag>계좌</div>
    <div class="line_input full_width"><input type=text class=normal_input id=account></div>
    <div class=line_tag>신청캐시</div>
    <div class="line_input full_width"><input type=text class=normal_input id=price></div>
    <div id=blank>
  </div>

  <div class=btn onclick="insert_cashback()">환급신청</div>
  <script src="./js/cashback.js"></script>

</body>
</html>
