
	<?php
	$id=$_GET['id'];
	$con = mysqli_connect("localhost:3306", "root", "123456", "pictrebook");
	if (!$con) {
		die('Could not connect: ' . mysqli_error());
	}
	mysqli_select_db($con, "pictrebook");
	$moressl = "select * from skillslot where id=" . $id;
	$result = mysqli_query($con, $moressl);
	$row = mysqli_fetch_array($result);
	echo "<img src='../img/skillslot/slot_skill_icon_" . $row['img'] . ".png'/>";
	echo "<ul><li><span>" . $row['ssname'] . "(Lv." . $row['lv'] . ")</span>";
	echo "<p>" . $row['sstext'] . "</p></li></ul>";
	echo "<div id='close' onclick='delslot1(" . $row['id'] . ")'></div>";
	mysqli_close($con);	
	?>