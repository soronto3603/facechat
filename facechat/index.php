<html>
<head>
  <meta charset="utf-8">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="./css/header.css">
</head>
<body>
  <input id=back_url type=hidden value='<?echo $_GET['back_url']?>'/>
  <input id=phone type=hidden value='<?echo $_GET['phone']?>'/>
  </div>
  <div class=top>
    <div class=title_container>
      <p class=title_text>뷰티캠</p>
      <p id=my_point class=title_point><img src="http://hume.co.kr/facechat2/img/iconmonstr-coin-2-32.png" width="16" height="16" style="position: relative;top: 3px;right:3px;">0P</p>
    </div>
    <div class=navigator_container>
      <div class=menu id=menu1 value=menu1 onclick="click_menu('live')">
        <div class=menu_icon_box><img class=icon_img src="./img/live.png"></div>
        <div class=menu_text>라이브</div>
      </div>
      <div class=menu id=menu2 value=menu2 onclick="click_menu('talk')">
        <div class=menu_icon_box><img class=icon_img src="./img/msg.png"></div>
        <div class=menu_text>토크</div>
      </div>
      <div class=menu id=menu3 value=menu3 onclick="click_menu('rank')">
        <div class=menu_icon_box><img class=icon_img src="./img/rank.png"></div>
        <div class=menu_text>순위</div>
      </div>
      <div class=menu id=menu4 value=menu4 onclick="click_menu('message')">
        <div class=menu_icon_box><img class=icon_img src="./img/talk.png"></div>
        <div class=menu_text>쪽지함</div>
      </div>
      <div class=menu id=menu5 value=menu5 onclick="click_menu('more')">
        <div class=menu_icon_box><img class=icon_img src="./img/more.png"></div>
        <div class=menu_text>더보기</div>
      </div>
    </div>
  </div>
  <div id=modal_send_msg class=modal>
    <center>
        <div class=modal_send_msg_contents>
          <div class=modal_send_msg_header>쪽지보내기</div>
          <div  class=modal_send_msg_img style="border-radius:50px;">
            <img id=send_msg_img src="" width=100 height=100 style="border-radius:50px;">
          </div>
          <div class=modal_send_msg_input>
            <input id=input_send_msg>
            <input type=hidden id=input_send_msg_phone>
          </div>
          <div class=modal_send_msg_icon_box>
            <div class=modal_send_btn onclick="send_message()">쪽지보내기</div>
            <div class=modal_send_close_btn onclick="close_send_message()">닫기</div>
          </div>
        </div>
    </center>
  </div>
  <div id=modal_exit class=modal onclick="modal_exit();">
    <center>
      <div class=modal_exit_contents>
        <div class=modal_exit_title>종료하시겠습니까?</div>
        <div>
          <div class="modal_exit_btn" style="background-color:#f5c33f;color:black" onclick='modal_exit_line("exit")'>종료</div>
          <div class=modal_exit_btn style="background-color:gray" onclick='modal_exit_line("")'>취소</div>
        </div>
      </div>
    </center>
  </div>
  <div id=modal_camera class=modal onclick="modal_camera();">
    <center>
      <div class=modal_camera_contents>
        <div class=modal_line onclick='modal_camera_line("Camera")'>카메라</div>
        <div class=modal_line onclick='modal_camera_line("PhotoLibrary")'>갤러리</div>
      </div>
    </center>
  </div>
  <div id=modal_sex class=modal onclick="sex_modal();">
    <center>
      <div class=modal_sex_contents>
        <div class=modal_line onclick='modal_sex_line("여성")'>여성</div>
        <div class=modal_line onclick='modal_sex_line("남성")'>남성</div>
      </div>
    </center>
  </div>
  <div id=modal_location class=modal>
    <center>
      <div class=modal_location>
        <div class=modal_location_line style="line-height:65px;">위치정보를 가져올 수 없습니다!</div>
        <div class=modal_location_line  style="line-height:45px;">위치 설정을 확인해주세요!</div>
        <div class=modal_location_btn onclick="togotosettings();">설정하러 가기</div>
        <div class=close_btn_box onclick="$('#modal_location').css('display','none')">
          <img class=close_btn src="./img/iconmonstr-x-mark-1-240.png" width=20 height=20>
        </div>
      </div>
    </center>
  </div>
  <div id=modal_title class=modal onclick="title_modal();">
    <center>
      <div class=modal_title_contents>
        <div class=modal_line onclick='modal_title_line("영상채팅해요~")'>영상채팅해요~</div>
        <div class=modal_line onclick='modal_title_line("지금 만나요~")'>지금 만나요~</div>
        <div class=modal_line onclick='modal_title_line("그린라이트 일까요?")'>그린라이트 일까요?</div>
        <div class=modal_line onclick='modal_title_line("그린라이트를 원해!")'>그린라이트를 원해!</div>
        <div class=modal_line onclick='modal_title_line("친구 구해요~")'>친구 구해요~</div>
        <div class=modal_line onclick='modal_title_line("영화구경 갈까요?")'>영화구경 갈까요?</div>
        <div class=modal_line onclick='modal_title_line("스포츠를 좋아해요?")'>스포츠를 좋아해요?</div>
        <div class=modal_line onclick='modal_title_line("드라이브해요~")'>드라이브해요~</div>
        <div class=modal_line onclick='modal_title_line("고민있어요...")'>고민있어요...</div>
        <div class=modal_line onclick='modal_title_line("수다나 떨어요~")'>수다나 떨어요~</div>
        <div class=modal_line onclick='modal_title_line("애인 없어요~")'>애인 없어요~</div>
        <div class=modal_line onclick='modal_title_line("연애란 무엇일까?")'>연애란 무엇일까?</div>
        <div class=modal_line onclick='modal_title_line("진로 상담 바래요")'>진로 상담 바래요</div>
        <div class=modal_line onclick='modal_title_line("무엇이든 물어보세요~")'>무엇이든 물어보세요~</div>
        <div class=modal_line onclick='modal_title_line("남자는 왜이래요?")'>남자는 왜이래요?</div>
        <div class=modal_line onclick='modal_title_line("여자는 왜이래요?")'>여자는 왜이래요?</div>
        <div class=modal_line onclick='modal_title_line("질문 있어요~")'>질문 있어요~</div>
        <div class=modal_line onclick='modal_title_line("조언 구해요~")'>조언 구해요~</div>
        <div class=modal_line onclick='modal_title_line("심심풀이~")'>심심풀이~</div>
      </div>
    </center>
  </div>
  <div id=imageView>
    <iframe id=imageViewIframe></iframe>
  </div>
  <iframe id=content_iframe></iframe>
  <script src="./js/menu.js"></script>
</body>
</html>
