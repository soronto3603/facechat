<?php
  include("dbconnect.php");
  $id=$_GET['id'];
  $phone=$_GET['phone'];

  $query="UPDATE facechat_user SET id='$id' WHERE phone='$phone'";
  $result=mysqli_query($con,$query)
?>
