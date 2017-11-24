<?
	include ("dblib.php");

	$name=$_POST['name'];
	$point=$_POST['point'];


	mysqli_query($con,"update facechat_user set points=$point where name='$name'");
?>
