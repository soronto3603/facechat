<?
	include ("dblib.php");
	$no=$_POST['no'];

	mysqli_query($con,"delete from facechat_notice where no=$no");
?>
