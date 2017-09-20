<html>
<head>
  <meta charset="utf-8">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="./css/talk.css">
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
      <div class="menu selected_menu" id=menu2 value=menu2 onclick="">토크</div>
      <div class=menu id=menu3 value=menu3 onclick="click_menu('rank')">순위</div>
      <div class=menu id=menu4 value=menu4 onclick="click_menu('message')">쪽지함</div>
      <div class=menu id=menu5 value=menu5 onclick="click_menu('more')">더보기</div>
    </div>
  </div>
  <div class=option_container>
    <div class=option_menu>전체</div>
    <div class=option_menu>지역</div>
    <div class=option_menu>동네</div>
    <div class=option_menu>근처</div>
    <div class=option_menu>마이톡</div>
    <div class=option_menu>토크등록</div>
  </div>
  <div id=contents>
    <div class=line>
      <div class=img_left>
      </div>
      <div class=line_contents>
      </div>
      <div class=icon_box>
      </div>
    </div>
  </div>
  <script src="./js/menu.js"></script>
  <script src="./js/talk.js"></script>
</body>
</html>
