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
echo "<ul class='pictre'>";
while ($row = mysqli_fetch_array($result)) {
	if($row['ss3text']==null){
		echo "<li id='cutin' class='role'><a href='PHP/RoleDetails.php?role=" . $row['id'] . "' target='_Blank'>";
		echo "<img src='img/cutin/" . $row['cutin'] . ".png'/>";
		echo "</a></li>";
		}
	}
echo "</ul>";
mysqli_close($con);
?>