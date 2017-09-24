<html>
<head>
  <meta charset="utf-8">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="./css/rank.css">
  <link rel="stylesheet" type="text/css" href="./css/header.css">
</head>
<body>
  <input id=phone type=hidden value='<?echo $_GET['phone']?>'/>
  <div id=load>
    <center>
      <div style="width:1px;height:1px;top-margin:45%;"></div>
      <img src="./img/Spinner.gif" width=100 height=100>
    </center>
  </div>
  <div class=top>
    <div class=title_container>
      <p class=title_text>뷰티캠</p>
    </div>
    <div class=navigator_container>
      <div class=menu id=menu1 value=menu1 onclick="click_menu('live')">라이브</div>
      <div class=menu id=menu2 value=menu2 onclick="click_menu('talk')">토크</div>
      <div class="menu selected_menu" id=menu3 value=menu3 onclick="">순위</div>
      <div class=menu id=menu4 value=menu4 onclick="click_menu('message')">쪽지함</div>
      <div class=menu id=menu5 value=menu5 onclick="click_menu('more')">더보기</div>
    </div>
  </div>
  <div class=option_container>
    <div class="option_menu" onclick="rank_modal();">
      <center>
        <p class=option_text>일일랭킹</p>
        <img class=option_img src="./img/iconmonstr-triangle-3-240.png" width=20 height=20>
      </center>
    </div>
    <div class="option_menu" onclick="sex_modal();">
      <center>
        <p class=option_text>여성</p>
        <img class=option_img src="./img/iconmonstr-triangle-3-240.png" width=20 height=20>
      </center>
    </div>
  </div>
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
  <script src="./js/menu.js"></script>
  <script src="./js/rank.js"></script>
</body>
</html>
