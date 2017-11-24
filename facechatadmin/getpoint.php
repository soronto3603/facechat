<?
	include ("dblib.php");

	$name=$_POST['name'];
	mysqli_query($con,"select * from facechat_user where name='$name'");
	if($result=mysqli_query($con,$query)){
    while($row=mysqli_fetch_row($result)){
      echo $row['points'];
      return;
    }
  }
?>
