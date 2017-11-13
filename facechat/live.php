<html>
<head>
  <meta charset="utf-8">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="./css/live.css">
  <link rel="stylesheet" type="text/css" href="./Swiper-3.4.2/dist/css/swiper.css">
  <script src="./Swiper-3.4.2/dist/js/swiper.js"></script>
</head>
<body>
  <div class=card_container>
    <div class="swiper-container">

        <div class="swiper-wrapper">

        </div>
    </div>
  </div>
  <div class=profile_button_box>
    <center>
      <div class=profile_btn  style="background-color:#e8222c" onclick="request_face_chat()"><img src="./img/facechat_btn.png" width=24 height=16>&nbsp;&nbsp;영상통화</div>
      <div class=profile_btn style="background-color:#a21a21" onclick="request_talk()"><img src="./img/msg_btn.png" width=24 height=16>&nbsp;&nbsp;쪽지</div>
      <div class=profile_btn style="background-color:#721119" onclick="click_like()"><img src="./img/like_btn.png" width=16 height=16>&nbsp;좋아요</div>
    </center>
  </div>
  <div id=rank_box class=rank_list_box>

  </div>
  <!-- <div style="display:none;" class=footer>
    랭킹
  </div> -->
  <script>

      var swiper = new Swiper('.swiper-container',{
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: 'auto',
      });
  </script>
  <script src="./js/live.js"></script>
</body>
</html>
