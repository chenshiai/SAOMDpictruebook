<?php
$con = mysqli_connect("localhost:3306", "root", "123456", "pictrebook");
if (!$con) {
	die('Could not connect: ' . mysqli_error());
}
mysqli_select_db($con, "pictrebook");

$cutin = $_POST['cutin'];
$element = $_POST['element'];
$weapon = $_POST['weapon'];
$sex = $_POST['sex'];
$rare = $_POST['rare'];
$genus = $_POST['genus'];
if(mysqli_query($con, "insert into roule (rare,cutin,genus,element,weapon,sex) values('".$rare."','".$cutin."','".$genus."','".$element."','".$weapon."','".$sex."')")){
	echo "添加成功！";
}else{
	echo "添加失败！";
}
mysqli_close($con);

?>
