<?php
$con = mysqli_connect("localhost:3306", "root", "123456", "pictrebook");
if (!$con) {
	die('Could not connect: ' . mysqli_error());
}
mysqli_select_db($con, "pictrebook");
$team = $_POST['team'];
$ssname = $_POST['ssname'];
$sstext = $_POST['sstext'];
$lv = $_POST['lv'];
$img = $_POST['img'];
if(mysqli_query($con, "insert into skillslot (team,ssname,sstext,lv,img) values('".$team."','".$ssname."','".$sstext."','".$lv."','".$img."')")){
	echo "添加成功！";
}else{
	echo "添加失败！";
}
mysqli_close($con);

?>
