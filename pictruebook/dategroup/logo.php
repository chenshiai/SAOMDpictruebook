<?php
$pass = $_POST['password'];
$con = mysqli_connect("localhost:3306", "root", "123456", "pictrebook");
if (!$con) {
	die('Could not connect: ' . mysqli_error());
}
mysqli_select_db($con, "pictrebook");
$user = "select * from user where password='".$pass."'";
if(!$result = mysqli_query($con, $user)){
		die('Could not connect:' . mysqli_error($con));
	}
$row = mysqli_fetch_array($result);
if($row['power']==3){
	echo $row['username'];
}else{
	echo "fail";
}
?>