<html>
<head>
  <meta charset="utf-8">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="./css/live.css">
  <link rel="stylesheet" type="text/css" href="./css/header.css">
  <link rel="stylesheet" type="text/css" href="./Swiper-3.4.2/dist/css/swiper.css">
  <script src="./Swiper-3.4.2/dist/js/swiper.js"></script>
</head>
<body>
  <div class=card_container>
    <div class="swiper-container">
        <!-- <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div> -->
        <div class="swiper-wrapper">
            <!-- <div class="swiper-slide">

              <center>
                <div id=content_container class=content_container onclick="alert('테스트유저로서 선택할 수 없습니다.')">
                  <div class=profile_text>지수</div>
                  <img  class=content_img src="./profileimg/jisu.JPG" width=200 height=200>
                  <div class=profile_title>그린라이트일까요?</div>
                </div>
              </center>
            </div>
            <div class="swiper-slide">
              <center>
                <div id=content_container class=content_container onclick="alert('테스트유저로서 선택할 수 없습니다.')">
                  <div class=profile_text>아이유</div>
                  <img  class=content_img src="./profileimg/iu.JPG" width=200 height=200>
                  <div class=profile_title>그린라이트일까요?</div>
                </div>
              </center>
            </div> -->
        </div>
    </div>
  </div>
  <div class=profile_button_box>
    <center>
      <div class=profile_btn  onclick="request_face_chat()"><img src="./img/live.png" width=16 height=16>영상통화</div>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <div class=profile_btn onclick="request_talk()"><img src="./img/msg.png" width=16 height=16>&nbsp;&nbsp;쪽지</div>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <div class=profile_btn onclick="reload_data()">새로고침</div>
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
