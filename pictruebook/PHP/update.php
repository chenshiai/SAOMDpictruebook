<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$id = $_GET['id'];
	$con = mysqli_connect("localhost:3306", "root", "123456", "pictrebook");
	if (!$con) {
		die('Could not connect: ' . mysqli_error());
	}
	mysqli_select_db($con, "pictrebook");
	$title = $_POST['title'];
	$name = $_POST['name'];
	$tips = $_POST['tips'];

	$hp = $_POST['hp'];
	$mp = $_POST['mp'];
	$atk = $_POST['atk'];
	$def = $_POST['def'];
	$cri = $_POST['cri'];
	$ss1id = $_POST['ss1id'];
	$ss2id = $_POST['ss2id'];
	$bs1id = $_POST['bs1id'];
	$bs2id = $_POST['bs2id'];
	$bs3id = $_POST['bs3id'];
	$ss3name = $_POST['ss3name'];
	$ss3mp = $_POST['ss3mp'];
	$ss3text = $_POST['ss3text'];
	$slotskill = $_POST['slotskill'];
	mysqli_query($con, "update roule set title='" . $title . "' where id=" . $id);
	mysqli_query($con, "update roule set name='" . $name . "' where id=" . $id);
	mysqli_query($con, "update roule set tips='" . $tips . "' where id=" . $id);
	mysqli_query($con, "update roule set HP='" . $hp . "' where id=" . $id);
	mysqli_query($con, "update roule set MP='" . $mp . "' where id=" . $id);
	mysqli_query($con, "update roule set ATK='" . $atk . "' where id=" . $id);
	mysqli_query($con, "update roule set DEF='" . $def . "' where id=" . $id);
	mysqli_query($con, "update roule set CRI='" . $cri . "' where id=" . $id);
	mysqli_query($con, "update roule set ss1='" . $ss1id . "' where id=" . $id);
	mysqli_query($con, "update roule set ss2='" . $ss2id . "' where id=" . $id);
	mysqli_query($con, "update roule set bs1='" . $bs1id . "' where id=" . $id);
	mysqli_query($con, "update roule set bs2='" . $bs2id . "' where id=" . $id);
	mysqli_query($con, "update roule set bs3='" . $bs3id . "' where id=" . $id);
	mysqli_query($con, "update roule set ss3='" . $ss3name . "' where id=" . $id);
	mysqli_query($con, "update roule set ss3mp='" . $ss3mp . "' where id=" . $id);
	mysqli_query($con, "update roule set ss3text='" . $ss3text . "' where id=" . $id);
	mysqli_query($con, "update roule set sslot='" . $slotskill . "' where id=" . $id);
	if ($_POST['update'] != null) {
		$update = $_POST['update'];
		mysqli_query($con, "update roule set up='" . $update . "' where id=" . $id);
		echo $update;
	}
	mysqli_close($con);
	Header("Location: RoleDetails.php?role=" . $id);
}
?>

