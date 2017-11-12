<?php
  include("dbconnect.php");
  $query="SELECT * FROM facechat_notice ORDER BY no DESC";
  $result_array=array();
  if($result=mysqli_query($con,$query)){
    while($row=mysqli_fetch_row($result)){
      array_push($result_array,$row);
    }
  }
  echo json_encode($result_array);
?>
