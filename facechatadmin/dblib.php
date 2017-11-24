<?
	$db_host ="localhost";
	$db_user="defysoft";
	$db_passwd="elvkdl09!";
	$db_name="defysoft_godohosting_com";
	$con=mysqli_connect($db_host,$db_user,$db_passwd,$db_name);
	if(mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
?>
