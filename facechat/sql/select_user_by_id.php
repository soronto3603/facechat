<?php
  include("dbconnect.php");
  $id=$_GET['id'];

  $query="SELECT * FROM facechat_user WHERE id='$id'";
  $array_user=array();
  if($result=mysqli_query($con,$query)){
    while($row=mysqli_fetch_row($result)){
      $array_user['no']=$row[0];
      $array_user['id']=$row[1];
      $array_user['name']=$row[2];
      $array_user['tag']=$row[3];
      $array_user['sex']=$row[4];
      $array_user['loc']=$row[5];
      $array_user['date']=$row[6];
      $array_user['imguri']=$row[7];
      $array_user['phone']=$row[8];
      $array_user['points']=$row[9];
      $array_user['likes']=$row[10];
      $array_user['age']=$row[11];
      echo json_encode($array_user);
      return;
    }
  }
  echo "false";
?>
