<?php
$con = mysqli_connect("localhost:3306", "root", "123456", "pictrebook");
if (!$con) {
	die('Could not connect: ' . mysqli_error());
}
mysqli_select_db($con, "pictrebook");

$ssname = $_POST['ssname'];
$sstext = $_POST['sstext'];
$weapon = $_POST['weapon'];
$ssmp = $_POST['ssmp'];
if(mysqli_query($con, "insert into swordskill (ssname,sstext,weapon,ssmp) values('".$ssname."','".$sstext."',".$weapon.",".$ssmp.")")){
	echo "添加成功！";
}else{
	echo "添加失败！";
}
mysqli_close($con);

?>
