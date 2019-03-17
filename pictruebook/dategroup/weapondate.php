<?php
$id = $_POST['id'];
$name = $_POST['weaponname'];
$R4ATK = $_POST['R4ATK'];
$R5ATK = $_POST['R5ATK'];
$eleR4 = $R4ATK*1.2;
$eleR5 = $R5ATK*1.2;
$con = mysqli_connect("localhost:3306", "root", "123456", "pictrebook");
if (!$con) {
	die('Could not connect: ' . mysqli_error());
}
mysqli_select_db($con, "pictrebook");
mysqli_query($con, "update weaponpa set weaponname='".$name."' where id=".$id);
mysqli_query($con, "update weaponpa set ATKR4=".$R4ATK." where id=".$id);
mysqli_query($con, "update weaponpa set eleR4=".$eleR4." where id=".$id);
mysqli_query($con, "update weaponpa set ATKR5=".$R5ATK." where id=".$id);
mysqli_query($con, "update weaponpa set eleR5=".$eleR5." where id=".$id);

if(mysqli_query($con,$insert)){
	echo "成功！";
}else{
	echo "失败！";
}
mysqli_close($con);
?>