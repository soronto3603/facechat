<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
  </head>
  <body>
    <input id=phone type=hidden value='<?echo $_GET['phone']?>'/>
    <input id=target type=hidden value='<?echo $_GET['target']?>'/>
    <header class=header>
      <div id=backbutton style="display:inline-block" onclick="backbutton()">
        <img class=reverse_arrow src="./img/iconmonstr-arrow-25-240.png" width=15 height=15>
        <div class=header_title>채팅방</div>
        <div class=facechat_btn onclick="request_facechat()"><img src="http://hume.co.kr/facechat/img/live.png" width=25 height=25 style="    position: relative;
    left: 10px;
    top: 6px;">
          <p style="    color: gray;
    margin: 0px;
    font-size: 12px;
    position: relative;
    bottom: 25px;
    right: -37px;">영상통화</p>
        </div>
      </div>
    </header>
    <div id=content_container class=content_container>

      <!-- <div class=content_target>
        <img class=profile_photo width=30 height=30>
        <div class=nickname>nickname</div>
        <div class=chatbubble_target>123</div>
        <div class=time>2017/05/33</div>
      </div>
      <div class=clear></div>
      <div class=endline></div>
      <div class=content_me>
        <img class=profile_photo width=30 height=30>
        <div class=nickname>me</div>
        <div class=chatbubble_me>asd</div>
        <div class=time>2017/05/33</div>
      </div>
      <div class=clear></div>
      <div class=endline></div> -->

    </div>
    <div style="width:100%;height:60px;"></div>
    <footer class=footer>
      <div id=talk_input_box class=talk_input_box><input id=talk_input class=talk_input type=text/></div>
      <div class=confirm_box><div class=confirm onclick="send_message();"><p class=confirm_text>전송</p></div>
      </div>
      <div claa=clear></div>
    </footer>
    <script src="./js/index.js"></script>
  </body>
</html>
