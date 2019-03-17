<?php
//$con = mysqli_connect("localhost:3306", "root", "123456", "pictrebook");
//if (!$con) {
//	die('Could not connect: ' . mysqli_error());
//}
//mysqli_select_db($con, "pictrebook");
//$findcard = "select * from card";
//if ($result1 = mysqli_query($con, $findcard)) {
//	while ($card = mysqli_fetch_array($result1)) {
//		$roule = explode("/", $card['roule']);
//		for ($i = 0; $i < count($roule) - 1; $i++) {
//			$find = "update roule set sp='" . $card['special'] . "' where id=" . $roule[$i];
//			if (!$result = mysqli_query($con, $find)) {
//				die('Could not connect:' . mysqli_error($con));
//			}
//
//		}
//	}
//			mysqli_free_result($result1);
//
//}
error_reporting(0);

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