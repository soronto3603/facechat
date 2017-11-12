<?php
  include("dbconnect.php");
  $id=$_POST['id'];

  $query="select * from facechat_user where id='$id' AND now()-date<5;";
  //$query="select * from facechat_user where phone <> '$phone' order by points desc;";
  if($result=mysqli_query($con,$query)){
    while($row=mysqli_fetch_row($result)){
      echo "True";
      return;
    }
  }
  echo "False";
?>
