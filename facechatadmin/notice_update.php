<?
	include ("dblib.php");
	$no=$_POST['no'];
	$title=$_POST['title'];
	$content=$_POST['content'];

	mysqli_query($con,"update facechat_notice set title='$title',content='$content' where no=$no");
?>
