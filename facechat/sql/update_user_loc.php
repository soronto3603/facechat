<?php
  include("dbconnect.php");
  $phone=$_GET['phone'];
  $lat=$_GET['x'];
  $lng=$_GET['y'];

  echo $query="UPDATE facechat_user SET geo_loc_y=$lng,geo_loc_x=$lat WHERE phone='$phone'";
  $result=mysqli_query($con,$query);
?>
