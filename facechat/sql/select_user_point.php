<?php
  include("dbconnect.php");
  $phone=$_POST['phone'];

  $query="select * from facechat_user where phone <> '$phone' order by points desc;";
  $result_array=array();
  if($result=mysqli_query($con,$query)){
    while($row=mysqli_fetch_row($result)){
      array_push($result_array,$row);
    }
  }
  echo json_encode($result_array);
?>
