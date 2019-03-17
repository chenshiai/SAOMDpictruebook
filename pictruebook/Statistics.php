<?php
$con = mysqli_connect("localhost:3306", "root", "123456", "pictrebook");
if (!$con) {
	die('Could not connect: ' . mysqli_error());
}
mysqli_select_db($con, "pictrebook");
$find = "select * from roule";
if (!$result = mysqli_query($con, $find)) {
	die('Could not connect: ' . mysqli_error($con));
}
$i=0;
$all=0;
while($row = mysqli_fetch_array($result)){
	$i++;
	if($row['ss3text']!=null){
		$all++;
	}
}
$res = $all/$i*100;
echo "总数：".$i."<br/>";
echo "目前完成总数：".$all."<br/>";
echo "占百分比：".$res."%<br/>";
mysqli_close($con);
?>