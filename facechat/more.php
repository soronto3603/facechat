<html>
<head>
  <meta charset="utf-8">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="./css/more.css">
</head>
<body>
  <div class=profile onclick="click_menu('update')">
    <div class=profile_image><img id=profile_img src="./img/man.png" width=100% height=100%></div>
    <div class=profile_text>
      <p id=profile_nickname></p>
      <p class=profile_help>프로필을 수정하려면 터치 해주세요.</p>
    </div>
    <div class=clear></div>
  </div>
  <div class=icon_box>
    <div class=icon onclick="click_menu('charge')">
      충전
    </div>
    <div class=icon onclick="click_menu('cashback')">
      환급
    </div>
    <div class=icon onclick="daydaycheck()">
      출석체크
    </div>
    <!-- <div class=icon onclick="click_menu('point_log')">
      포인트 사용내역
    </div> -->
    <div class=icon onclick="click_menu('notice')">
      공지사항
    </div>
  </div>
  <script src="./js/more.js"></script>
</body>
</html>
