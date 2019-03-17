<?php
$con = mysqli_connect("localhost:3306", "root", "123456", "pictrebook");
if (!$con) {
	die('Could not connect: ' . mysqli_error());
}
mysqli_select_db($con, "pictrebook");
echo "<ul class='sta'>";
$find = "select * from roule where genus='kirito'";
if (!$result = mysqli_query($con, $find)) {
	die('Could not connect: ' . mysqli_error($con));
}
while ($row = mysqli_fetch_array($result)) {
	echo "<li class='role'><a href='PHP/RoleDetails.php?role=" . $row['id'] . "'>";
	echo "<img src='img/cutin/" . $row['cutin'] . ".png'/>";
	echo "</a></li>";
}
echo "<hr>";

echo "</ul>";

mysqli_close($con);
?>