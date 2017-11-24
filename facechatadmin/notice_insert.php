<?
	include ("dblib.php");
	$title=$_POST['title'];
	$content=$_POST['content'];
	
	mysqli_query($con,"insert into facechat_notice values(null,'$title','$content')");
?>
