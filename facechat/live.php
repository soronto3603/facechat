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
      <div class="menu selected_menu" id=menu1 value=menu1 onclick="">라이브</div>
      <div class=menu id=menu2 value=menu2 onclick="click_menu('talk')">토크</div>
      <div class=menu id=menu3 value=menu3 onclick="click_menu('rank')">순위</div>
      <div class=menu id=menu4 value=menu4 onclick="click_menu('message')">쪽지함</div>
      <div class=menu id=menu5 value=menu5 onclick="click_menu('more')">더보기</div>
    </div>
    <div class=reload_icon_container onclick="reload_data()">
      <p class=reload_icon_text>새로고침<img class=reload_icon src="./img/iconmonstr-refresh-3-240.png" width=20 height=20></p>
    </div>

  </div>
  <div class=card_container>
    <div class="swiper-container">
        <!-- <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div> -->
        <div class="swiper-wrapper">
            <div class="swiper-slide">

              <center>
                <div id=content_container class=content_container onclick="alert('테스트유저로서 선택할 수 없습니다.')">
                  <img  class=content_img src="./profileimg/jisu.JPG" width=200 height=200>
                  <div class=profile_text>지수</div>
                </div>
              </center>
            </div>
            <div class="swiper-slide">
              <center>
                <div id=content_container class=content_container onclick="alert('테스트유저로서 선택할 수 없습니다.')">
                  <img  class=content_img src="./profileimg/iu.JPG" width=200 height=200>
                  <div class=profile_text>아이유</div>
                </div>
              </center>
            </div>
        </div>

        <!-- <div class="swiper-pagination"></div> -->
    </div>
    <div class=request_face_chat onclick="click_face_chat_btn()">
      영상통화
    </div>
  </div>
  <!-- <div style="display:none;" class=footer>
    랭킹
  </div> -->
  <script>

      var swiper = new Swiper('.swiper-container',{
        pagination: '.swiper-pagination',
        effect: 'coverflow',
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: 'auto',
        coverflow: {
            rotate: 50,
            stretch: 0,
            depth: 100,
            modifier: 1,
            slideShadows : true
        }
      });
  </script>
  <script src="./js/menu.js"></script>
  <script src="./js/live.js"></script>
</body>
</html>
