<html>
<head>
	<meta charset="UTF-8">
	<title>Notice</title>
	<link rel="stylesheet" type="text/css" href="css/notice.css">
</head>
<body>

	<table id='mem'>
		<tr>
			<td>순번</td>
			<td>닉네임</td>
			<td>핸드폰</td>
			<td>주민등록번호</td>
			<td>주소</td>
			<td>은행</td>
			<td>계좌번호</td>
			<td>환급금</td>
			<td>상태</td>
			<td>삭제</td>
		</tr>
			<?
				include ("dblib.php");
				$result=mysqli_query($con,"select * from facechat_cacheback");
				$cnt=0;
				while($row=mysqli_fetch_array($result))
				{
					echo "<tr>";
					echo "<td>".$row['no']."</td>";
					echo "<td>".$row['name']."</td>";
					echo "<td>".$row['phone']."</td>";
					echo "<td>".$row['number']."</td>";
					echo "<td>".$row['address']."</td>";
					echo "<td>".$row['bank']."</td>";
					echo "<td>".$row['account']."</td>";
					echo "<td>".$row['price']."</td>";
					echo "<td><select id='".$cnt."state' onchange=\"chgstate(".$row['no'].",".$cnt.")\">";
					if($row['process']==0){
						echo "<option value=\"0\" selected='selected'>대기중</option>
						<option value=\"1\">진행중</option>
						<option value=\"2\">환급완료</option>";
					}else if($row['process']==1){
						echo "<option value=\"0\">대기중</option>
						<option value=\"1\" selected='selected'>진행중</option>
						<option value=\"2\">환급완료</option>";
					}else if($row['process']==2){
						echo "<option value=\"0\">대기중</option>
						<option value=\"1\">진행중</option>
						<option value=\"2\" selected='selected'>환급완료</option>";
					}
					echo "</select></td>";
					echo "<td><center><div class='btn short' onclick='del(".$row['no'].")'>삭제</div></center></td>";
					echo "</tr>";
					$cnt=$cnt+1;
				}
			?>

	</table>
	<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
	<script src="js/check.js"></script>
</body>
</html>
