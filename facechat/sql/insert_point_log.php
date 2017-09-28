<?php
  include("dbconnect.php");
  $id=$_POST['id'];
  $value=$_POST['value'];

  $query="INSERT INTO facechat_point_log(no,id,date,value) VALUES(NULL,'$id',now())";

?>
