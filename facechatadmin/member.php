<html>
<head>
	<meta charset="UTF-8">
	<title>Member</title>
	<link rel="stylesheet" type="text/css" href="css/member.css">
</head>
<body>
	<?
		if($_GET['url'])
			echo "<script>var pfurl='".$_GET['url']."';</script>";
		else
			echo "<script>var pfurl='';</script>";
	?>
	<table id='gv'>
		<tr>
			<td>닉네임</td>
			<td>프로필사진</td>
			<td>성별</td>
			<td>나이</td>
			<td>주제</td>
			<td>핸드폰</td>
			<td>포인트</td>
			<td>Latitue</td>
			<td>Longitude</td>
			<td>저장</td>
		</tr>
		<tr>
			<td><input type=text class=inputtext id=nick></td>
			<td><form name="upload-form" action="upload.php" method="post" enctype="multipart/form-data">
			<input type="hidden" name="MAX_FILE_SIZE" value="25242880"/>
			<input type=file name=upload id=upload>
			<input type=submit value='이미지업로드'>
			</form><?
				$url=$_GET['url'];
				if($url)echo "<center><img class=profile src=\"".$url."\"></center>";
			?></td>
			<td><input type=text class='inputtext short' id=sex></td>
			<td><input type=text class='inputtext short' id=age></td>
			<td><input type=text class=inputtext id=topic></td>
			<td><input type=text class='inputtext short' id=phone></td>
			<td><input type=text class='inputtext short' id=point></td>
			<td><input type=text class='inputtext short' id=lat></td>
			<td><input type=text class='inputtext short' id=lng></td>
			<td><div class=btn onclick='save()'>저장</div></td>
		</tr>
	</table>
	<table id='mem'>
		<tr>
			<td>순번</td>
			<td>프로필사진</td>
			<td>닉네임</td>
			<td>성별</td>
			<td>나이</td>
			<td>주제</td>
			<td>핸드폰</td>
			<td>좋아요</td>
			<td>포인트</td>
			<td>Latitue</td>
			<td>Longitude</td>
			<td>수정</td>
			<td>삭제</td>
		</tr>
			<?
				include ("dblib.php");
				$result=mysqli_query($con,"select * from facechat_user");
				$cnt=0;
				while($row=mysqli_fetch_array($result))
				{
					echo "<tr>";
					echo "<td>".$row['no']."</td>";
					echo "<td><img class=profile src=".$row['imguri']." onclick='imgclick(this)'></td>";
					echo "<td><input type=text class='inputtext short' id=".$cnt."name value=".$row['name']."></td>";
					echo "<td><input type=text class='inputtext short' id=".$cnt."sex value=".$row['sex']."></td>";
					echo "<td><input type=text class='inputtext short' id=".$cnt."age value=".$row['age']."></td>";
					echo "<td><input type=text class=inputtext id=".$cnt."loc value=".$row['loc']."></td>";
					echo "<td><input type=text class=inputtext id=".$cnt."phone value=".$row['phone']."></td>";
					echo "<td><input type=text class='inputtext short' id=".$cnt."likes value=".$row['likes']."></td>";
					echo "<td><input type=text class='inputtext short' id=".$cnt."points value=".$row['points']."></td>";
					echo "<td><input type=text class='inputtext short' id=".$cnt."lat value=".$row['geo_loc_x']."></td>";
					echo "<td><input type=text class='inputtext short' id=".$cnt."lng value=".$row['geo_loc_y']."></td>";
					echo "<td><center><div class=btn onclick='update(".$row['no'].",".$cnt.")'>수정</div></center></td>";
					echo "<td><center><div class=btn onclick='del(".$row['no'].")'>삭제</div></center></td>";
					echo "</tr>";
					$cnt=$cnt+1;
				}
			?>

	</table>
	<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
	<script src="js/member.js"></script>
</body>
</html>
