<?php
  include("dbconnect.php");
  $sql=$_POST['sql'];
  mysqli_query($con,$sql);
?>
