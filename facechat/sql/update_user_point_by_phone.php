<?php
  include("dbconnect.php");
  $phone=$_GET['phone'];
  $point=$_GET['point'];
  $why=$_GET['why'];

  $point=str_replace($point,"undefined","");


  if(strpos($point,"-") !== false){
    $query="SELECT points FROM facechat_user WHERE phone='$phone'";
    if($result=mysqli_query($con,$query)){
      while($row=mysqli_fetch_row($result)){
        if(intval($row[0])<-intval($point)){
          echo "false";
          return;
        }
      }
    }
    $query="UPDATE facechat_user SET points=points$point WHERE phone='$phone'";
  }else{
    $query="UPDATE facechat_user SET points=points+$point WHERE phone='$phone'";
  }

  $result=mysqli_query($con,$query);
  $query="SELECT phone FROM facechat_user WHERE phone='$phone'";
  if($result=mysqli_query($con,$query)){
    while($row=mysqli_fetch_row($result)){
      $query="insert into facechat_point_log(no,id,date,value,why) values(NULL,'".$row[0]."',now(),$point,$why)";
      mysqli_query($con,$query);
    }
  }
?>
