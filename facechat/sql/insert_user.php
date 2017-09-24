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
  $age=$_POST['age'];

  $query="SELECT * FROM facechat_user WHERE phone='$phone'";
  if($result=mysqli_query($con,$query)){
    while($row=mysqli_fetch_row($result)){
      if($_POST['id']=="")$query="UPDATE facechat_user SET name='$name',tag='$tag',sex='$sex',loc='$loc',date='$date',imguri='$imguri',phone='$phone',points=0,likes=0,age='$age' WHERE phone='$phone'";
      else $query="UPDATE facechat_user SET id='$id',name='$name',tag='$tag',sex='$sex',loc='$loc',date='$date',imguri='$imguri',phone='$phone',points=0,likes=0,age='$age' WHERE phone='$phone'";
      $result=mysqli_query($con,$query);
      return;
    }
  }
  $query="INSERT INTO facechat_user(no,id,name,tag,sex,loc,date,imguri,phone,points,likes) VALUES(NULL,'$id','$name','$tag','$sex','$loc','$date','$imguri','$phone',0,0)";
  mysqli_query($con,$query);

?>
