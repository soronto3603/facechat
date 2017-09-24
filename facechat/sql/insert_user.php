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
<<<<<<< HEAD
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

=======

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

>>>>>>> fa57fe9a151023583f91ccf139cd595933264f96
?>
