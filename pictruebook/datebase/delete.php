<?php
error_reporting(0);
$con = mysqli_connect("localhost:3306", "root", "123456", "pictrebook");
if (!$con) {
	die('Could not connect: ' . mysqli_error());
}
mysqli_select_db($con, "pictrebook");
if(isset($_GET['id'])){
	$id = $_GET['id'];
	if(mysqli_query($con, "delete from roule where id=".$id)){
		echo "删除成功！";
	}else{
		echo "删除失败！";
	}
}
if(isset($_GET['skill'])){
	$skill = $_GET['skill'];
	if(mysqli_query($con, "delete from swordskill where id=".$skill)){
		echo "删除成功！";
	}else{
		echo "删除失败！";
	}
}
if(isset($_GET['bs'])){
	$bs = $_GET['bs'];
	if(mysqli_query($con, "delete from battleskill where id=".$bs)){
		echo "删除成功！";
	}else{
		echo "删除失败！";
	}
}
if(isset($_GET['sl'])){
	$sl = $_GET['sl'];
	if(mysqli_query($con, "delete from skillslot where id=".$sl)){
		echo "删除成功！";
	}else{
		echo "删除失败！";
	}
}
mysqli_close($con);

?>
