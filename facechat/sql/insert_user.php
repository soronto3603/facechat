<?php
  include("dbconnect.php");
  $id=$_POST['id'];
  $name=$_POST['name'];
  $tag=$_POST['tag'];
  $sex=$_POST['sex'];
  $loc=$_POST['loc'];
  $date=date("Y/m/d H:i:s");
  $imguri=$_POST['imguri'];
  $phone=$_POST['phone'];

  echo $query="INSERT INTO facechat_user(no,id,name,tag,sex,loc,date,imguri,phone)
  VALUES(NULL,'$id','$name','$tag','$sex','$loc','$date','$imguri','$phone')";
  mysqli_query($con,$query);

  // $query="SELECT * FROM facechat_user WHERE id='$phone'";
  // if($result=mysqli_query($con,$query)){
  //   while($row=mysqli_fetch_row($result)){
  //     echo $query="INSERT INTO facechat_user(no,id,name,tag,sex,loc,date,imguri,phone)
  //     VALUES(NULL,'$id','$name','$tag','$sex','$loc','$date','$imguri','$phone')";
  //     mysqli_query($con,$query);
  //     return;
  //   }
  // }
  // echo $query="UPDATE facechat_user SET id='$id',name='$name',tag='$tag',sex='$sex',loc='$loc',date='$date',imguri='$imguri',phone='$phone' WHERE phone='$phone'";
  // $result=mysqli_query($con,$query);

?>
