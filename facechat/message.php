<html>
<head>
  <meta charset="utf-8">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="./css/message.css">
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
      <p class=title_text>BeautyCAM</p>
    </div>
    <div class=navigator_container>
      <div class=menu id=menu1 value=menu1 onclick="click_menu('live')">라이브</div>
      <div class=menu id=menu2 value=menu2 onclick="click_menu('talk')">토크</div>
      <div class=menu id=menu3 value=menu3 onclick="click_menu('rank')">순위</div>
      <div class="menu selected_menu" id=menu4 value=menu4 onclick="">쪽지함</div>
      <div class=menu id=menu5 value=menu5 onclick="click_menu('more')">더보기</div>
    </div>
  </div>
  <div class=option_container>

  </div>
  <div class=contents>
    <div class=line onclick="move_talk_room('821031857630')">
      <div class=left_photo>

      </div>
      <div class=right_bubble>
        <div class=line_text_first>
          <font class=line_text_nickname>와플</font>
          <font class=line_text_normal>여27세???km</font>
          <font class=line_text_time>59분전</font><</div>
          <div class=clear></div>
        <div class=line_text_second>영상채팅요청</div>
      </div>
    </div>
  </div>

  <script src="./js/menu.js"></script>
  <script src="./js/message.js"></script>
</body>
</html>
