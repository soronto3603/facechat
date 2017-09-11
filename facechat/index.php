<html>
<head>
  <meta charset="utf-8">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="./css/index.css">
  <link rel="stylesheet" type="text/css" href="./Swiper-3.4.2/dist/css/swiper.css">
  <script src="./Swiper-3.4.2/dist/js/swiper.js"></script>
</head>
<body>
  <div class=top>
    <div class=title_container>
      화상채팅
    </div>
    <div class=navigator_container>
      <div class=menu id=menu1 value=menu1 onclick="click_menu(0)">메인</div>
      <div class=menu id=menu2 value=menu2 onclick="click_menu(1)">쪽지</div>
      <div class=menu id=menu3 value=menu3 onclick="click_menu(2)">랭킹</div>
      <div class=menu id=menu4 value=menu4 onclick="click_menu(3)">위치번호</div>
      <div class=menu id=menu5 value=menu5 onclick="click_menu(4)">위치번호</div>
      <div class=menu id=menu6 value=menu6 onclick="click_menu(5)">더보기</div>
    </div>
    <div class=navigator_line id=menu_line></div>
    <div class=reload_icon_container onclick="reload_data()">
      <tag>새로고침</tag>
      <img src="./img/iconmonstr-refresh-3-240.png" width=20 height=20>
    </div>

  </div>
  <div class=card_container>
    <div class="swiper-container">
        <div class="swiper-scrollbar"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-wrapper">
            <!-- <div class="swiper-slide">
              <center>
                <img src="./img/hyojin.JPG" width=200 height=200>
                <div>여/공효진/36</div>
                <div class=request_face_chat onclick="click_face_chat_btn()">영상통화신청하기</div>
              </center>
            </div>
            <div class="swiper-slide">
              <center>
                <img src="./img/jimin.JPG" width=200 height=200>
                <div>여/한지민/33</div>
                <div class=request_face_chat onclick="click_face_chat_btn()">영상통화신청하기</div>
              </center>
            </div>
            <div class="swiper-slide">
              <center>
                <img src="./img/yesl.JPG" width=200 height=200>
                <div>여/한예슬/32</div>
                <div class=request_face_chat onclick="click_face_chat_btn()">영상통화신청하기</div>
              </center>
            </div> -->
        </div>
        <div class="swiper-pagination"></div>
    </div>
  </div>
  <div class=footer>
    랭킹
  </div>
  <script>
      var swiper = new Swiper('.swiper-container', {
          spaceBetween: 50,
          centeredSlides: true,
          slideToClickedSlide: true,
          grabCursor: true,
          nextButton: '.swiper-button-next',
          prevButton: '.swiper-button-prev',
          scrollbar: '.swiper-scrollbar',
          pagination: '.swiper-pagination',
      });
  </script>

  <script src="./js/index.js"></script>
</body>
</html>
