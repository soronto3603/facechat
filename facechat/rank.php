<html>
<head>
  <meta charset="utf-8">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="./css/rank.css">
  <link rel="stylesheet" type="text/css" href="./css/header.css">
</head>
<body>
  <div id=contents>
    <!-- <div class=line>
      <div class=line_rank>
        <div class=triangle_top_left></div>
        <div class=line_rank_text>01위</div>
      </div>
      <div class=line_image>이미지</div>
      <div class=line_contents>
        <div class=line_nickname>비밀스럽게</div>
        <div class=line_normal>(여 25세)</div>
      </div>
      <div class=icon_box>
        <div class=send_message>쪽지대화</div>
        <div class=call_facechat>영상신청</div>
      </div>
    </div> -->

  </div>
  <div id=modal_rank class=modal onclick="rank_modal();">
    <center>
      <div class=modal_rank_contents>
        <div class=modal_line>일일랭킹<div>
        <div class=modal_line>주간랭킹</div>
        <div class=modal_line>월간랭킹</div>
        <div class=modal_line>베스트</div>
      </div>
    </center>
  </div>
  <div id=modal_sex class=modal onclick="sex_modal();">
    <center>
      <div class=modal_sex_contents>
        <div class=modal_line>여성<div>
        <div class=modal_line>남성</div>
      </div>
    </center>
  </div>
  <script src="./js/rank.js"></script>
</body>
</html>
