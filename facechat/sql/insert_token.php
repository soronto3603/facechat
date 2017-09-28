<?php
  include("dbconnect.php");
  $token=$_POST['token'];
  $phone=$_POST['phone'];

  $query="SELECT * FROM facechat_token WHERE phone='$phone'";
  if ($result=mysqli_query($con,$query))
  {
    // Fetch one and one row
    while ($row=mysqli_fetch_row($result))
    {
        $query="DELETE FROM facechat_token WHERE phone='$phone'";
        mysqli_query($con,$query);
    }
  }
  echo $query="INSERT INTO facechat_token(no,token,phone) VALUES(NULL,'$token','$phone')";
  mysqli_query($con,$query);
?>
