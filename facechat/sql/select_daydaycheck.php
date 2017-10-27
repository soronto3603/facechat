<?php
  include("dbconnect.php");
  $id=$_POST['id'];

  $query="SELECT * FROM facechat_point_log WHERE id=$id AND date>CURDATE() AND why='3'";

  $result_array=array();
  if ($result=mysqli_query($con,$query))
  {
    // Fetch one and one row
    while ($row=mysqli_fetch_row($result))
    {
      echo "True";
      return;
    }
    // Free result set
    mysqli_free_result($result);
  }
  echo "False";
?>
