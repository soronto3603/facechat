<?php
  include("dbconnect.php");
  $phone=$_GET['phone'];

  $query="UPDATE facechat_user SET date=now() WHERE phone='$phone'";
  $result=mysqli_query($con,$query);
?>
