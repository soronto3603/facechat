<html>
<head>
  <meta charset="utf-8">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="./css/more.css">
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
      <p class=title_text>뷰티캠</p>
    </div>
    <div class=navigator_container>
      <div class=menu id=menu1 value=menu1 onclick="click_menu('live')">라이브</div>
      <div class=menu id=menu2 value=menu2 onclick="click_menu('talk')">토크</div>
      <div class=menu id=menu3 value=menu3 onclick="click_menu('rank')">순위</div>
      <div class=menu id=menu4 value=menu4 onclick="click_menu('message')">쪽지함</div>
      <div class="menu selected_menu" id=menu5 value=menu5 onclick="">더보기</div>
    </div>
  </div>
  <div>
    <center>
      <div class=profile_img>
      </div>
    </center>
    <div class="points_box left_title">
        <div class=points>
          <div class=points_box_text>포인트</div>
          <div id=input_points></div>
        </div>
        <div class=likes>
          <div class=points_box_text>좋아요</div>
          <div id=input_likes></div>
        </div>
    </div>
    <div class=nickname>
      <div class=left_title>닉네임</div>
      <div class=right_text><input id=input_nickname type=text value=현운용></div>
      <div class=clear></div>
    </div>
    <div class=age>
      <div class=left_title>나이</div>
      <div class=right_text><input id=input_age type=text value=25 maxlength=2 onkeydown='$(this).val($(this).val().replace(/[^0-9]/g,""));'></div>
      <div class=clear></div>
    </div>
    <div class=sex>
      <div class=left_title>성별</div>
      <div class=right_text onclick="sex_modal();"><p id=input_sex>남성</p></div>
      <div class=clear></div>
    </div>
    <div class=loc>
      <div class=left_title>주제</div>
      <div class=right_text onclick="title_modal();"><p id=input_title>지금만나요~</p></div>
      <div class=clear></div>
    </div>
  </div>
  <div class=update_button onclick="update_user_info();">
    수정하기
  </div>
  <div id=modal_sex class=modal onclick="sex_modal();">
    <center>
      <div class=modal_sex_contents>
        <div class=modal_line onclick='modal_sex_line("여성")'>여성</div>
        <div class=modal_line onclick='modal_sex_line("남성")'>남성</div>
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
  <script src="./js/menu.js"></script>
  <script src="./js/more.js"></script>
</body>
</html>
