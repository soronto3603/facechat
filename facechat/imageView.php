<?php
  $image=$_GET['image'];
  $backurl=$_GET['backurl'];
?>
<html>
  <head>
    <style>
      body{
        margin:0px;
        background-color:black;
      }
      .margin-top{
        margin-top:30%;
      }
      .close_btn{
        position:fixed;
        top:5px;
        right:5px;
      }
    </style>
  </head>
<body>
  <div class=close_btn onclick="back_button()"><img src="./img/iconmonstr-x-mark-1-240.png" width=32 height=32 ></div>
  <center>
    <div class=margin-top>
    </div>
    <img src='<?echo $image?>' style="border-radius:10px;max-width:300px;max-height:400px;">
  </center>
  <script>
    function back_button(){
      window.location.href="<?echo $backurl;?>";
    }
  </script>
</body>
</html>
