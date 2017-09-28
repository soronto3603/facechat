<?php
  include("dbconnect.php");
  $target=$_POST['target'];
  $phone=$_POST['phone'];
  $date=$_POST['date'];
  $last_update=$_POST['last_update'];

  $query="SELECT * FROM facechat_user WHERE phone='$target'";

  if($result=mysqli_query($con,$query)){
    while($row=mysqli_fetch_row($result)){
      array_push($row,$date);
      array_push($row,$last_update);
      echo urldecode(json_encode($row));
      return;
    }
  }
  echo "false";
?>
