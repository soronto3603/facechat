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
      <img class=reverse_arrow src="./img/iconmonstr-arrow-25-240.png" width=40 height=40>
      <div class=header_title>채팅방</div>
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
    <footer class=footer>
      <div class=plus_icon_box><img class=plus_icon src="./img/iconmonstr-plus-1-240.png" width=30 height=30></div>
      <div id=talk_input_box class=talk_input_box><input id=talk_input class=talk_input type=text/></div>
      <div class=confirm_box><div class=confirm onclick="send_message();"><p class=confirm_text>전송</p></div>
      </div>
      <div claa=clear></div>
    </footer>
    <script src="./js/index.js"></script>
  </body>
</html>
