<?php
  include("dbconnect.php");
  $id=$_POST['id'];
  $name=$_POST['name'];
  $tag=$_POST['tag'];
  $sex=$_POST['sex'];
  $loc=$_POST['loc'];
  $imguri=$_POST['imguri'];
  $phone=$_POST['phone'];
  $age=$_POST['age'];
  echo $lat=$_POST['lat'];
  echo $lng=$_POST['lng'];
  $point=$POST['point'];

  $query="DELETE FROM facechat_chat WHERE fromid='$phone' OR toid='$phone'";
  mysqli_query($con,$query);

  echo $query="SELECT * FROM facechat_user WHERE phone='$phone'";
  if($result=mysqli_query($con,$query)){
    while($row=mysqli_fetch_row($result)){
      if($id!="") echo $query="UPDATE facechat_user SET id='$id',name='$name',tag='$tag',sex='$sex',loc='$loc',date=now(),imguri='$imguri',phone='$phone',age='$age' WHERE phone='$phone'";
      else echo $query="UPDATE facechat_user SET name='$name',tag='$tag',sex='$sex',loc='$loc',date=now(),imguri='$imguri',phone='$phone',age='$age' WHERE phone='$phone'";
      $result=mysqli_query($con,$query);
      return;
    }
  }
  echo $query="INSERT INTO facechat_user(no,id,name,tag,sex,loc,date,imguri,phone,points,likes,age,geo_loc_x,geo_loc_y) VALUES(NULL,'$id','$name','$tag','$sex','$loc',now(),'$imguri','$phone',$point,0,'$age',$geo_loc_x,$geo_loc_y)";
  mysqli_query($con,$query);

?>
