<html>
<head>
  <meta charset="utf-8">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="./css/charge.css">
</head>
<body>
  <div class=header>포인트 충전하기</div>
  <div id=point>2050P</div>
  <div class=contents_title_line>
    <div class=contents_title>포인트 구매하기</div>
  </div>
  <center>
    <div class=contents>
      <div class="cash_box">
        <div class=cash_help>포인트 충전으로<br>즐거운 화상채팅을<br>즐겨보세요.</div>
      </div>
      <div class=cash_box onclick="request_payment(5500)">
        5500P
        <div class=cash_box_help>5,500원</div>
      </div>
      <div class=cash_box onclick="request_payment(11000)">
        11000P
        <div class=cash_box_help>11,000원</div>
      </div>
      <div class=cash_box onclick="request_payment(33000)">
        33000P
        <div class=cash_box_help>33,000원</div>
      </div>
      <div class=cash_box onclick="request_payment(55000)">
        55000P
        <div class=cash_box_help>55,000원</div>
      </div>
      <div class=cash_box onclick="request_payment(110000)">
        110000P
        <div class=cash_box_help>110,000원</div>
      </div>

    </div>
  </center>
  <script src="./js/charge.js"></script>
</body>
</html>
