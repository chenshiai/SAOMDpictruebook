<?php
$role = $_GET['role'];
$con = mysqli_connect("localhost:3306", "root", "123456", "pictrebook");
	if (!$con) {
		die('Could not connect: ' . mysqli_error());
	}
	mysqli_select_db($con, "pictrebook");
	$find = "select * from roule where id=".$role;
	if(!$result = mysqli_query($con, $find)){
		die('Could not connect:' . mysqli_error($con));
	}
	$row = mysqli_fetch_array($result);
	if($row['rare']!=3&&$row['up']!=1){
		echo "<img src='../img/pictureL/" . $row['cutin'] . ".jpg' class='imgl'/>";	
	}else if($row['rare']==2&&$row['up']==1){
		
		echo "<img src='../img/pictureL/r6/" . $row['cutin'] . ".jpg' class='imgl'/>";
		echo "<img src='../img/pictureL/r6/" . $row['cutin'] . "_1.jpg' class='imgl'/>";	
		echo "<img src='../img/pictureL/r6/" . $row['cutin'] . "_2.jpg' class='imgl'/>";	
		echo "<img src='../img/pictureL/r6/" . $row['cutin'] . "_3.jpg' class='imgl'/>";	
		echo "<img src='../img/pictureL/r6/" . $row['cutin'] . "_4.jpg' class='imgl'/>";
	}else if($row['rare']==3){
		echo "<img src='../img/pictureL/r6/" . $row['cutin'] . ".jpg' class='imgl'/>";
		echo "<img src='../img/pictureL/r6/" . $row['cutin'] . "_1.jpg' class='imgl'/>";	
		echo "<img src='../img/pictureL/r6/" . $row['cutin'] . "_2.jpg' class='imgl'/>";	
		echo "<img src='../img/pictureL/r6/" . $row['cutin'] . "_3.jpg' class='imgl'/>";	
		echo "<img src='../img/pictureL/r6/" . $row['cutin'] . "_4.jpg' class='imgl'/>";
	}else{
		echo "<img src='../img/pictureL/" . $row['cutin'] . ".jpg' class='imgl'/>";	
	}

	mysqli_close($con);
?>