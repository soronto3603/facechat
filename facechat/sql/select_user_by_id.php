<?php
  include("dbconnect.php");
  $id=$_GET['id'];

  $query="SELECT * FROM facechat_user WHERE id='$id'";
  if($result=mysqli_query($con,$query)){
    while($row=mysqli_fetch_row($result)){
      echo json_encode($row);
      return;
    }
  }
  echo "false";
?>
