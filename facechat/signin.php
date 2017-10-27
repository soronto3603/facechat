<html>
<head>
  <meta charset="utf-8">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="./css/signin.css">
</head>
<body>
  <div id=loading_modal class=modal>
    <center>
      <img class=loading_img src="./img/Spinner_signin.gif">
    </center>
  </div>
  <div id=exit_modal class=modal>
    <div class=modal_top_margin>
      <center>
        <div class=modal_exit_content>
          <div class=modal_exit_content_text>앱을 종료하시겠습니까?</div>
          <div class=modal_exit_content_btn>종료</div>
          <div class=x_icon_box onclick="remove_exit_modal();"><img class=x_icon src="./img/iconmonstr-x-mark-1-240.png" width=20 height=20></div>
        </div>
      </center>
    </div>
  </div>
  <div id=age_modal class=modal onclick="$('#age_modal').css('display','none')">
    <div class=modal_top_margin>
      <center>
        <div id=age_list class=modal_age_content>

        </div>
      </center>
    </div>
  </div>
  <div id=img_modal class=modal onclick="$('#img_modal').css('display','none')">
    <div class=modal_top_margin>
      <center>
        <div class=modal_img_content>
          <div class=modal_img_line onclick="camera_message('Camera')">카메라</div>
          <div class=modal_img_line onclick="camera_message('PhotoLibrary')">갤러리</div>
        </div>
      </center>
    </div>
  </div>
  <div class=container>
    <div class=line>
      <div class=image_line>
        <center>
          <div class=image_box onclick="$('#img_modal').css('display','block')">
            <img id=img class=image>
          </div>
        </center>
      </div>
    </div>
    <div class=line>
      <label>닉네임</label>
      <div>
        <input id=nickname type=text maxlength=8 placeholder="닉네임을 입력해주세요" />
      </div>
    </div>
    <div class=line>
      <label>나이</label>
      <div>
        <div>
          <div class=age_line onclick="$('#age_modal').css('display','block');">
            <font id=front_age>20</font>
            <font>세</font>
            <img class=age_open_triangle src="./img/iconmonstr-triangle-1-240.png" width=20 height=20>
          </div>
        </div>
      </div>
    </div>
    <div class=line>
      <label>성별</label>
      <div>
        <div id=man class="sex_selection_btn man" onclick="select_man()">남자</div>
        <div id=girl class="sex_selection_btn notselected" onclick="select_girl()">여자</div>
      </div>
    </div>
  </div>
  <div class=button_box onclick="request_location()">회원가입</div>
  <script src="./js/signin.js"></script>
</body>
</html>
