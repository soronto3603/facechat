<?php
  include("dbconnect.php");
  $lat=$_POST['lat'];
  $lng=$_POST['lng'];
  $query="SELECT *,( 3959 * acos ( cos ( radians($lat) ) * cos( radians( geo_loc_x ) ) * cos( radians($lng ) - radians(64.363333) ) + sin ( radians(31.589167) ) * sin( radians( $lat ) ) ) ) AS `distance`,TIMESTAMPDIFF(hour,date,now()) AS 'hour',TIMESTAMPDIFF(minute,date,now()) AS 'minute' FROM facechat_user";
  $result_array=array();
  if($result=mysqli_query($con,$query)){
    while($row=mysqli_fetch_row($result)){
      array_push($result_array,$row);
    }
  }
  echo json_encode($result_array);
?>
