<?php
$user = $_POST['username'];
$text = str_replace("\r\n","<br/>",$_POST['retext'],$i);
$roule = $_POST['roule'];
date_default_timezone_set('PRC');
$time = date("Y-m-d");
$con = mysqli_connect("localhost:3306", "root", "123456", "pictrebook");
if (!$con) {
	die('Could not connect: ' . mysqli_error());
}
mysqli_select_db($con, "pictrebook");
$insert = "insert into reply(user,time,centent,roule) values('".$user."','".$time."','".$text."','".$roule."') where id=".$id;
echo $insert;
if(mysqli_query($con,$insert)){
	echo "成功！";
}else{
	echo "失败！";
}
mysqli_close($con);
?>