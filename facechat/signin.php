<html>
<head>
  <meta charset="utf-8">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="./css/signin.css">
</head>
<body>
  <script>
  function movescrollTop(){
    setTimeout(()=>{document.body.scrollTop=200;
      if(document.body.scrollTop==0){
        setTimeout(()=>{
          document.body.scrollTop=200;
        },500);
      }
    },300);

  }
  </script>
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
          <div class=modal_exit_content_btn onclick="exit_app()">종료</div>
          <div class=x_icon_box onclick="remove_exit_modal();"><img class=x_icon src="./img/iconmonstr-x-mark-1-240.png" width=20 height=20></div>
        </div>
      </center>
    </div>
  </div>
  <div id=age_modal class=modal  onclick="$('#age_modal').css('display','none')">
    <div style="margin-top:30%;">
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
            <img id=img class=image src="http://hume.co.kr/facechat2/img/No_Image_Available.png">
          </div>
        </center>
      </div>
    </div>
    <center>
      <div class=line onclick="movescrollTop()">
        <label><div style="width:50px;display:inline-block;    font-size: 14;">닉네임</div></label>
        <input id=nickname type=text maxlength=8 placeholder="닉네임을 입력해주세요" onclick="movescrollTop()" />
      </div>
      <div class=line>
        <label><div style="width:50px;display:inline-block;    font-size: 14;">나이</div></label>
        <div class=age_line onclick="$('#age_modal').css('display','block');">
          <font id=front_age>20</font>
          <font>세</font>
          <img class=age_open_triangle src="./img/iconmonstr-triangle-1-240.png" width=20 height=20>
        </div>
      </div>
    </center>
    <div class=line>
      <div style="    text-align: center;
    font-size: 17px;
    margin: 30px;
    color: gray;">성별을 선택해주세요.</div>
      <div>
        <div id=man class="sex_selection_btn man" onclick="select_man()"><img src="./img/men.png" style="width: 20px;
    position: relative;
    top: 3px;
    right: 5px;">남자</div>
        <div id=girl class="sex_selection_btn notselected" onclick="select_girl()"><img src="./img/woman.png" style="width: 20px;
    position: relative;
    top: 3px;
    right: 5px;">여자</div>
      </div>
    </div>
  </div>
  <div class=button_box onclick="request_location()">회원가입</div>
  <script src="./js/signin.js"></script>
</body>
</html>
