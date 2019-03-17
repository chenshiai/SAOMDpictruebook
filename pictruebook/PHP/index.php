<?php
error_reporting(0);
$url = $_GET['ord'];
$ele = explode('/', $url);
$con = mysqli_connect("localhost:3306", "root", "123456", "pictrebook");
if (!$con) {
	die('Could not connect: ' . mysqli_error());
}
mysqli_select_db($con, "pictrebook");
$i = 0;
if ($ele[5] < 2) {
	if ($ele[0] != 0)
		$element = "element=" . $ele[0];
	else
		$element = "";

	if ($ele[1] != 0)
		$weapon = "weapon=" . $ele[1];
	else
		$weapon = "";

	if ($ele[2] != 0)
		$sex = "sex=" . $ele[2];
	else
		$sex = "";

	if ($ele[3] != 0)
		$rare = "rare=" . $ele[3];
	else
		$rare = "";
	
	if ($ele[4] != "")
		$rou = "genus='" . $ele[4] ."'";
	else
		$rou = "";
	
	$find = "select id,cutin,title,name from roule where ".$element.$weapon.$sex.$rare.$rou;
} else {
	if ($ele[0] != 0)
		$element = "element=" . $ele[0] . " and ";
	else
		$element = "";

	if ($ele[1] != 0)
		$weapon = "weapon=" . $ele[1] . " and ";
	else
		$weapon = "";

	if ($ele[2] != 0)
		$sex = "sex=" . $ele[2] . " and ";
	else
		$sex = "";

	if ($ele[3] != 0)
		$rare = "rare=" . $ele[3] . " and ";
	else
		$rare = "";
		
	if ($ele[4] != "")
		$rou = "genus='" . $ele[4] . "' and ";
	else
		$rou = "";
	
	$find = "select id,cutin,title,name from roule where ".$element.$weapon.$sex.$rare.$rou."mustnull is null";
}

if (!$result = mysqli_query($con, $find)) {
	echo "<div id='order'>";
		echo "Σ(っ°Д°;)っ<br>什么也没选啊！";
		echo "</div>";
	die();
}else{
	echo "<ul class='pictre'>";
while ($row = mysqli_fetch_array($result)) {
	echo "<li class='role'><a href='PHP/RoleDetails.php?role=" . $row['id'] . "'>";
	echo "<img src='img/cutin/" . $row['cutin'] . ".png' title='[" . $row['title'] . "]" . $row['name'] . "'/>";
	echo "</a></li>";
	$i = 1;
}
}

if ($i == 0) {
		echo "<div id='order'>";
		echo "Σ(っ°Д°;)っ<br>欸，找不到<br>这不是我的问题<br>当然不是";
		echo "</div>";
}
echo "</ul>";
mysqli_free_result($result);
mysqli_close($con);


function getip() {
	if (isset($_SERVER)) {
		if (isset($_SERVER[HTTP_X_FORWARDED_FOR]) && strcasecmp($_SERVER[HTTP_X_FORWARDED_FOR], "unknown"))//代理
		{
			$realip = $_SERVER[HTTP_X_FORWARDED_FOR];
		} elseif (isset($_SERVER[HTTP_CLIENT_IP]) && strcasecmp($_SERVER[HTTP_CLIENT_IP], "unknown")) {
			$realip = $_SERVER[HTTP_CLIENT_IP];
		} elseif (isset($_SERVER[REMOTE_ADDR]) && strcasecmp($_SERVER[REMOTE_ADDR], "unknown")) {
			$realip = $_SERVER[REMOTE_ADDR];
		} else {
			$realip = 'unknown';
		}
	} else {
		if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown")) {
			$realip = getenv("HTTP_X_FORWARDED_FOR");
		} elseif (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown")) {
			$realip = getenv("HTTP_CLIENT_IP");
		} elseif (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown")) {
			$realip = getenv("REMOTE_ADDR");
		} else {
			$realip = 'unknown';
		}
	}
	return $realip;
}

function modifyipcount($ip) {
	$con = mysqli_connect("localhost:3306", "root", "123456", "pictrebook");
	if (!$con) {
		die('Could not connect: ' . mysqli_error());
	}
	mysqli_select_db($con, "pictrebook");
	$findip = "select * from ip where ipdata='".$ip."'";
	$result1 = mysqli_query($con, $findip);
	$row = mysqli_fetch_array($result1);
	$iptime = time();
	$day = date('j');
	if (!$row) {
		$query = "INSERT INTO ip (ipdata,iptime) VALUES ('" . $ip . "','" . $iptime . "')";
		mysqli_query($con,$query);
		$query = "SELECT day,todayipcount,allipcount FROM count";
		$result = mysqli_query($con,$query);
		$row = mysqli_fetch_array($result);
		$allipcount = $row['allipcount'] + 1;
		$todayipcount = $row['todayipcount'] + 1;
		if ($day == $row['day']) {
			$query = "UPDATE count SET allipcount='" . $allipcount . "',todayipcount='" . $todayipcount . "'";
		} else {
			$query = "UPDATE count SET allipcount='" . $allipcount . "',day='" . $day . "',todayipcount='1'";
		}

		mysqli_query($con,$query);
	} else {
		$query = "SELECT iptime FROM ip WHERE ipdata='" . $ip . "'";
		
		$result = mysqli_query($con,$query);
		$row = mysqli_fetch_array($result);
		$query = "SELECT day,todayipcount,allipcount FROM count";
		$result = mysqli_query($con,$query);
		$row1 = mysqli_fetch_array($result);
		if ($iptime - $row['iptime'] > 1) {
			$query = "UPDATE ip SET iptime='" . $iptime . "' WHERE ipdata='" . $ip . "'";
			mysqli_query($con,$query);
			$allipcount = $row1['allipcount'] + 1;
			if ($day == $row1['day']) {
				$query = "UPDATE count SET allipcount='" . $allipcount . "'";
			} else {
				$query = "UPDATE count SET allipcount='" . $allipcount . "',day='" . $day . "',todayipcount='1'";
			}
			mysqli_query($con,$query);
		}
		if ($day != $row1['day']) {
			$query = "UPDATE count SET day='" . $day . "',todayipcount='1'";
			mysqli_query($con,$query);
		}
	}
}

$realip = getip();
modifyipcount($realip);

?>