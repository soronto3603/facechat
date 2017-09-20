<?php
  include("dbconnect.php");
  $fromid=$_POST['fromid'];
  $toid=$_POST['toid'];
  $date=date("Y/m/d H:i:s");
  $content=urlencode($_POST['content']);
  $imguri=$_POST['imguri'];
  $towasread=$_POST['towasread'];

  $query="SELECT * FROM facechat_chatroom WHERE ((fromid='$fromid' AND toid='$toid') OR (fromid='$toid' AND toid='$fromid'))";
  $roomnumber;
  if($result=mysqli_query($con,$query)){
    $query="INSERT INTO facechat_chatroom(no,fromid,toid,date,last_update) VALUES(NULL,'$fromid','$toid','$date','$content')";
    while($row=mysqli_fetch_row($result)){
      $query="UPDATE facechat_chatroom SET date='$date',last_update='$content' WHERE no=".$row[0];
      break;
    }
    mysqli_query($con,$query);
  }
  $query="INSERT INTO facechat_chat(no,fromid,toid,date,content,imguri,towasread) VALUES(NULL,'$fromid','$toid','$date','$content','$imguri','$towasread');";
  mysqli_query($con,$query);

?>
