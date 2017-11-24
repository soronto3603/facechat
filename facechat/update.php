<html>
<head>
  <meta charset="utf-8">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="./css/update.css">
</head>
<body style="background-color:#efefef">
  <div>
    <center>
      <div class=profile_img onclick="camera_modal();">
        <img id=input_profile src="./img/man.png">
      </div>
    </center>

  </div>
  <div class=content>
    <div id=point_line class=normal_line>
      <div class=normal_title>포인트</div>
      <div id=point class=normal_div>3000</div>
    </div>
    <div id=nickname_line class=normal_line>
      <div class=normal_title>닉네임</div>
      <input type=text id=nickname class=normal placeholder="닉네임을 입력해주세요.">
    </div>
    <div id=age_line class=normal_line>
      <div class=normal_title>나이</div>
      <!-- <input type=text id=age class=normal value=24세> -->
      <input type=number id=age class=normal max="99" maxlength=2 placeholder=20>
    </div>
    <div id=sex_line class=normal_line>
      <div class=normal_title>성별</div>
      <!-- <input type=text id=sex class=normal value=남성> -->
      <div id=sex_block></div>
    </div>
    <div id=point_line class=normal_line>
      <div class=normal_title>좋아요</div>
      <div id=like class=normal_div></div>
    </div>
    <div id=title_line class=normal_line style="display:none;">
      <div class=normal_title>주제</div>
      <input type=text id=title class=normal value=친구주세요>
    </div>
  </div>
  <div id=update_button><div class=update_button onclick="update_user_info2()">수정하기</div></div>

  <script src="./js/update.js"></script>
</body>
</html>
