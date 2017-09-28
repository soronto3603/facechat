<?php
  include("dbconnect.php");
  $last_readed_no=$_POST['no'];
  $fromid=$_POST['fromid'];
  $toid=$_POST['toid'];

  $query="SELECT * FROM facechat_chat";
  if($last_readed_no!=""){
    $query=$query." WHERE no>$last_readed_no";
  }
  if($fromid && $toid){
    $query=$query." AND ((fromid='$fromid' AND toid='$toid') OR (fromid='$toid' AND toid='$fromid'))";
  }
  $result_array=array();
  if ($result=mysqli_query($con,$query))
  {
    // Fetch one and one row
    while ($row=mysqli_fetch_row($result))
    {
      array_push($result_array,$row);
    }
    // Free result set
    mysqli_free_result($result);
  }
  echo urldecode(json_encode($result_array));
?>
