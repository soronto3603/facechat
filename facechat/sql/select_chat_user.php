<?php
  include("dbconnect.php");
  $phone=$_GET['phone'];

  $query="SELECT * from (select * from facechat_chat where (toid='$phone' OR fromid='$phone') order by no desc) as a group by fromid,toid;";
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
