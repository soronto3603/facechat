<?php
  include("dbconnect.php");
  $name=$_POST['name'];
  $phone=$_POST['phone'];
  $number=$_POST['number'];
  $address=$_POST['address'];
  $bank=$_POST['bank'];
  $account=$_POST['account'];
  $price=$_POST['price'];

  echo $query="INSERT INTO facechat_cacheback(no,name,phone,number,address,bank,account,price,process) VALUES(NULL,'$name','$phone','$number','$address','$bank','$account',$price,0);";
  mysqli_query($con,$query);

?>
