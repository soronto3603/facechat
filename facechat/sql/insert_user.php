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
  $geo_loc_x=$_POST['x'];
  $geo_loc_y=$_POST['y'];

  echo $query="SELECT * FROM facechat_user WHERE phone='$phone'";
  if($result=mysqli_query($con,$query)){
    while($row=mysqli_fetch_row($result)){
      if($id!="") echo $query="UPDATE facechat_user SET id='$id',name='$name',tag='$tag',sex='$sex',loc='$loc',date=now(),imguri='$imguri',phone='$phone',age='$age' WHERE phone='$phone'";
      else echo $query="UPDATE facechat_user SET name='$name',tag='$tag',sex='$sex',loc='$loc',date=now(),imguri='$imguri',phone='$phone',age='$age' WHERE phone='$phone'";
      $result=mysqli_query($con,$query);
      return;
    }
  }
  echo $query="INSERT INTO facechat_user(no,id,name,tag,sex,loc,date,imguri,phone,points,likes,age,geo_loc_x,geo_loc_y) VALUES(NULL,'$id','$name','$tag','$sex','$loc',now(),'$imguri','$phone',0,0,'$age',0,0)";
  mysqli_query($con,$query);

?>
