<?php
  include("dbconnect.php");
  $id=$_POST['id'];

  echo $query="SELECT * FROM facechat_chatroom WHERE (fromid=$id OR toid=$id)";

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
  echo json_encode($result_array);
?>
