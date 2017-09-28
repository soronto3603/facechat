<html>
<head>
  <meta charset="utf-8">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="./css/update.css">
  <link rel="stylesheet" type="text/css" href="./css/header.css">
</head>
<body>
  <div>
    <center>
      <div class=profile_img onclick="camera_modal();">
        <img id=input_profile src="">
      </div>
    </center>
    <div class="points_box left_title">
        <div class=points>
          <div class=points_box_text>포인트</div>
          <div id=input_points></div>
        </div>
        <div class=likes>
          <div class=points_box_text>좋아요</div>
          <div id=input_likes></div>
        </div>
    </div>
    <div class=nickname>
      <div class=left_title>닉네임</div>
      <div class=right_text><input id=input_nickname type=text value=현운용></div>
      <div class=clear></div>
    </div>
    <div class=age>
      <div class=left_title>나이</div>
      <div class=right_text><input id=input_age type=text value=25 maxlength=2 onkeydown='$(this).val($(this).val().replace(/[^0-9]/g,""));'></div>
      <div class=clear></div>
    </div>
    <div class=sex>
      <div class=left_title>성별</div>
      <div class=right_text onclick="sex_modal();"><p id=input_sex>남성</p></div>
      <div class=clear></div>
    </div>
    <div class=loc>
      <div class=left_title>주제</div>
      <div class=right_text onclick="title_modal();"><p id=input_title>지금만나요~</p></div>
      <div class=clear></div>
    </div>
  </div>
  <div class=update_button onclick="update_user_info();">
    수정하기
  </div>

  <script src="./js/update.js"></script>
</body>
</html>
