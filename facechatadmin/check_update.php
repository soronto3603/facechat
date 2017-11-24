<?
	include ("dblib.php");
	$no=$_POST['no'];
	$proc=$_POST['proc'];

	mysqli_query($con,"update facechat_cacheback set process='$proc' where no=$no")
?>
