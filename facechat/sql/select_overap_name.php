<?php
  include("dbconnect.php");
  $name=$_GET['name'];

  $query="SELECT * FROM facechat_user WHERE name='$name'";
  if($result=mysqli_query($con,$query)){
    while($row=mysqli_fetch_row($result)){
      echo "true";
      return;
    }
  }
  echo "false";
?>
