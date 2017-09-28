<?php
  include("dbconnect.php");
  $phone=$_POST['phone'];
  $value=$_POST['value'];
  $why=$_POST['why'];

  echo $query="INSERT INTO facechat_point_log(no,id,date,value) VALUES(NULL,'$phone',now(),$value)";
  mysqli_query($con,$query);
  $query="UPDATE facechat_user SET points=points+$value WHERE phone='$phone'";
  mysqli_query($con,$query);
?>
