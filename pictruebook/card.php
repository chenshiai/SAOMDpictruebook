<?php
$con = mysqli_connect("localhost:3306", "root", "123456", "pictrebook");
if (!$con) {
	die('Could not connect: ' . mysqli_error());
}
mysqli_select_db($con, "pictrebook");
$find = "select * from card";
if (!$result = mysqli_query($con, $find)) {
	die('Could not connect:' . mysqli_error($con));
}
while($row = mysqli_fetch_array($result)){
	$roule = explode("/", $row['roule']);
	for($i=0;$i<count($roule)-1;$i++){
		mysqli_query($con, "update roule set card='" . $row['id'] . "' where id=" . $roule[$i]);
	}
}
mysqli_close($con);
?>