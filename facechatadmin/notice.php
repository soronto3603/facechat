<html>
<head>
	<meta charset="UTF-8">
	<title>Notice</title>
	<link rel="stylesheet" type="text/css" href="css/notice.css">
</head>
<body>
	<table id='gv'>
		<tr>
			<td>제목</td>
			<td>내용</td>
			<td>저장</td>
		</tr>
		<tr>
			<td><input type=text class=inputtext id=stitle></td>
			<td><input type=text class=inputtext id=scontent></td>
			<td><div class=btn onclick='save()'>저장</div></td>
		</tr>
	</table>
	<table id='mem'>
		<tr>
			<td>순번</td>
			<td>제목</td>
			<td>내용</td>
			<td>수정</td>
			<td>삭제</td>
		</tr>
			<?
				include ("dblib.php");

				$result=mysqli_query($con,"select * from facechat_notice");
				$cnt=0;
				while($row=mysqli_fetch_array($result))
				{
					echo "<tr>";
					echo "<td>".$row['no']."</td>";
					echo "<td><input type=text class='inputtext' id=".$cnt."title value=\"".urldecode($row['title'])."\"></td>";
					echo "<td><input type=text class='inputtext' id=".$cnt."content value=\"".urldecode($row['content'])."\"></td>";
					echo "<td><center><div class='btn short' onclick='update(".$row['no'].",".$cnt.")'>수정</div></center></td>";
					echo "<td><center><div class='btn short' onclick='del(".$row['no'].")'>삭제</div></center></td>";
					echo "</tr>";
					$cnt=$cnt+1;
				}
			?>

	</table>
	<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
	<script src="js/notice.js"></script>
</body>
</html>
