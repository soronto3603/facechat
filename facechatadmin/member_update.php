<?
	include ("dblib.php");
	$no=$_POST['no'];
	$name=$_POST['name'];
	$sex=$_POST['sex'];
	$age=$_POST['age'];
	$topic=urldecode($_POST['topic']);
	$phone=$_POST['phone'];
	$like=$_POST['likes'];
	$point=$_POST['point'];
	if($point=='')$point=0;
	$lat=$_POST['lat'];
	if($lat=='')$lat=0;
	$lng=$_POST['lng'];
	if($lng=='')$lng=0;
	
	mysqli_query($con,"update facechat_user set name='$name',sex='$sex',age=$age,loc='$topic',phone='$phone',likes='$like',points=$point,geo_loc_x=$lat,geo_loc_y=$lng where no=$no");
?>
