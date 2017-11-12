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
  <div class=line_tag>예금주</div>
  <div class="line_input full_width"><input type=text class=normal_input id=name></div>
  <div class=line_tag>휴대폰번호</div>
  <div class="line_input full_width"><input type=text class=normal_input id=phone></div>
  <div class=line_tag>주민번호</div>
  <div class="line_input full_width"><input type=text class=half_input id=number_pre maxlength=6 ><div class=half_input_dash>-</div><input type=text class=half_input_ style="width:30px;" id=number_post maxlength=1 ><div style="    display: inline-block;
    margin-left: 10px;
    font-size: 20px;">* * * * * *</div></div>
  <div class=line_tag>주소</div>
  <div class="line_input full_width"><input type=text class=normal_input id=address></div>
  <div class=line_tag>은행</div>
  <div class="line_input full_width"><input type=text class=normal_input id=bank></div>
  <div class=line_tag>계좌</div>
  <div class="line_input full_width"><input type=text class=normal_input id=account></div>
  <div class=line_tag>신청캐시</div>
  <div class="line_input full_width"><input type=text class=normal_input id=price></div>
  <div class=line_support style="display:none">* 3만 캐시 이상 신청 가능 합니다.</div>
  <div class=cashback_button style="    height: 60px;
    background-color: #e13c3a;
    color: white;
    text-align: center;
    line-height: 60px;
    position: absolute;
    bottom: 0px;
    width: 100%;" onclick="insert_cashback()">환급신청</div>
  <script src="./js/cashback.js"></script>

</body>
</html>
