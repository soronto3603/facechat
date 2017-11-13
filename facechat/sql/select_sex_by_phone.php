<?php
  include("dbconnect.php");
  $phone=$_GET['phone'];

  $query="SELECT * FROM facechat_user WHERE phone='$phone'";
  $array_user=array();
  if($result=mysqli_query($con,$query)){
    while($row=mysqli_fetch_row($result)){
      echo json_encode($row[4]);
      return;
    }
  }
  echo "false";
?>
