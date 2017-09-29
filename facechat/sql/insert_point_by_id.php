<?php
  include("dbconnect.php");
  $id=$_POST['id'];
  $value=$_POST['value'];
  $why=$_POST['why'];

  echo $query="INSERT INTO facechat_point_log(no,id,date,value) VALUES(NULL,'$phone',now(),$value)";
  mysqli_query($con,$query);
  $query="UPDATE facechat_user SET points=points+$value WHERE id='$id'";
  mysqli_query($con,$query);
?>
