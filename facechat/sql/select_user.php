<?php
  include("dbconnect.php");
  $lat=$_POST['lat'];
  $lng=$_POST['lng'];
  $phone=$_POST['phone'];
  $type=$_POST['type'];
  $query;
  if($type=="rank"){
    //$query="SELECT *,round(sqrt(pow(abs(geo_loc_y-$lat),2)+pow(abs(geo_loc_x-$lng),2)),2) AS `distance`,TIMESTAMPDIFF(hour,date,now()) AS 'hour',TIMESTAMPDIFF(minute,date,now()) AS 'minute' FROM facechat_user WHERE phone<>'$phone' AND now()-date<5 ORDER BY points desc";
    $query="SELECT *,round(sqrt(pow(abs(geo_loc_y-$lat),2)+pow(abs(geo_loc_x-$lng),2)),2) AS `distance`,TIMESTAMPDIFF(hour,date,now()) AS 'hour',TIMESTAMPDIFF(minute,date,now()) AS 'minute' FROM facechat_user WHERE phone<>'$phone' ORDER BY points desc";
  }else{
    $query="SELECT *,round(sqrt(pow(abs(geo_loc_y-$lat),2)+pow(abs(geo_loc_x-$lng),2)),2) AS `distance`,TIMESTAMPDIFF(hour,date,now()) AS 'hour',TIMESTAMPDIFF(minute,date,now()) AS 'minute' FROM facechat_user WHERE phone<>'$phone' AND now()-date<5 ORDER BY distance asc";
  }
  $result_array=array();
  if($result=mysqli_query($con,$query)){
    while($row=mysqli_fetch_row($result)){
      array_push($result_array,$row);
    }
  }
  echo json_encode($result_array);
?>
