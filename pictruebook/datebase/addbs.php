<?php
$con = mysqli_connect("localhost:3306", "root", "123456", "pictrebook");
if (!$con) {
	die('Could not connect: ' . mysqli_error());
}
mysqli_select_db($con, "pictrebook");

$team = $_POST['team'];
$ssname = $_POST['ssname'];
$sstext = $_POST['sstext'];
if(mysqli_query($con, "insert into battleskill (team,ssname,sstext) values('".$team."','".$ssname."','".$sstext."')")){
	echo "添加成功！";
}else{
	echo "添加失败！";
	die('Could not connect: ' . mysqli_error($con));
}
mysqli_close($con);

?>
