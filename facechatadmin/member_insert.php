<?
	echo "123";
	include ("dblib.php");
	$nick=$_POST['nick'];
	$pfurl=$_POST['pfurl'];
	$sex=$_POST['sex'];
	$age=$_POST['age'];
	$topic=$_POST['topic'];
	$phone=$_POST['phone'];
	$point=$_POST['point'];
	$lat=$_POST['lat'];
	$lng=$_POST['lng'];

	echo "insert into facechat_user values(null,'','$nick','Hume','$sex','$topic',now(),'$pfurl','$phone',$point,0,'$age',$lat,$lng)";
	mysqli_query($con,"insert into facechat_user values(null,'','$nick','Hume','$sex','$topic',now(),'$pfurl','$phone',$point,0,'$age',$lat,$lng)");
?>
