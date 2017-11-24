<html>
<head>
	<meta charset="UTF-8">
	<title>Point</title>
	<link rel="stylesheet" type="text/css" href="css/point.css">
</head>
<body>
	<table id='gv'>
		<tr>
			<td>닉네임</td>
			<td>포인트</td>
			<td>포인트전송</td>
		</tr>
		<tr>
			<td><input type=text class=inputtext id=nick></td>
			<td><input type=text class=inputtext id=point></td>
			<td><div class=btn onclick='give()'>전송</div></td>
		</tr>
	</table>
	<table id='mem'>
		<tr>
			<td>프로필사진</td>
			<td>닉네임</td>
			<td>핸드폰</td>
			<td>날짜</td>
			<td>포인트</td>
			<td>사유</td>
		</tr>
		<?
			include ("dblib.php");

			$result=mysqli_query($con,"select facechat_user.imguri,facechat_point_log.id,facechat_user.name,facechat_point_log.date,facechat_point_log.value,facechat_point_log.why from facechat_point_log,facechat_user where facechat_user.phone=facechat_point_log.id");

			while($row=mysqli_fetch_array($result))
			{
				echo "<tr>";
				echo "<td><img class=profile src=".$row['imguri']." onclick='imgclick(this)'></td>";
				echo "<td>".$row['name']."</td>";
				echo "<td>".$row['id']."</td>";
				echo "<td>".$row['date']."</td>";
				echo "<td>".$row['value']."</td>";
				echo "<td>".$row['why']."</td>";
				echo "</tr>";
			}
		?>
	</table>
	<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
	<script src="js/point.js"></script>
</body>
</html>
