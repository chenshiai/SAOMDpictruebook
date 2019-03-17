<?php
$id = $_GET['id'];
$pass = $_POST['password'];
$con = mysqli_connect("localhost:3306", "root", "123456", "pictrebook");
if (!$con) {
	die('Could not connect: ' . mysqli_error());
}
mysqli_select_db($con, "pictrebook");
$user = "select * from user where power=2";
if(!$result = mysqli_query($con, $user)){
		die('Could not connect:' . mysqli_error($con));
	}
$row = mysqli_fetch_array($result);
if($row['password']==$pass){
	Header("Location: editor.php?id=".$id); 
}else{
	echo "<script>alert('密码错误')</script>";
	Header("refresh:0.1;url= ../index.html"); 
}
?>