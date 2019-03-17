<?php
$con = mysqli_connect("localhost:3306", "root", "123456", "pictrebook");
if (!$con) {
	die('Could not connect: ' . mysqli_error());
}
mysqli_select_db($con, "pictrebook");
$find = "select * from roule where id=1";
if (!$result = mysqli_query($con, $find)) {
	die('Could not connect:' . mysqli_error($con));
}
$row = mysqli_fetch_array($result);
echo "人物：" . $row['title'] . "-" . $row['name']."</br>";
switch($row['element']) {
	case 1 :
		$element = "<img src='../img/Element/icon_attribute_unattributed.png' />";
		break;
	case 2 :
		$element = "<img src='../img/Element/icon_attribute_wind.png' />";
		break;
	case 3 :
		$element = "<img src='../img/Element/icon_attribute_water.png' />";
		break;
	case 4 :
		$element = "<img src='../img/Element/icon_attribute_fire.png' />";
		break;
	case 5 :
		$element = "<img src='../img/Element/icon_attribute_earth.png' />";
		break;
	case 6 :
		$element = "<img src='../img/Element/icon_attribute_light.png' />";
		break;
	case 7 :
		$element = "<img src='../img/Element/icon_attribute_dark.png' />";
		break;
	default :
		break;
}
switch($row['weapon']) {
	case 1 :
		$weapon = "<img src='../img/weapon/icon_job_1.png' style='position: absolute;z-index: 2;top:13px;left: 12px;'/>";
		break;
	case 2 :
		$weapon = "<img src='../img/weapon/icon_job_2.png' style='position: absolute;z-index: 2;top:13px;left: 12px;'/>";
		break;
	case 3 :
		$weapon = "<img src='../img/weapon/icon_job_3.png' style='position: absolute;z-index: 2;top:13px;left: 12px;'/>";
		break;
	case 4 :
		$weapon = "<img src='../img/weapon/icon_job_4.png' style='position: absolute;z-index: 2;top:13px;left: 12px;'/>";
		break;
	case 5 :
		$weapon = "<img src='../img/weapon/icon_job_5.png' style='position: absolute;z-index: 2;top:13px;left: 12px;'/>";
		break;
	case 6 :
		$weapon = "<img src='../img/weapon/icon_job_6.png' style='position: absolute;z-index: 2;top:13px;left: 12px;'/>";
		break;
	case 7 :
		$weapon = "<img src='../img/weapon/icon_job_7.png' style='position: absolute;z-index: 2;top:13px;left: 12px;'/>";
		break;
	case 8 :
		$weapon = "<img src='../img/weapon/icon_job_8.png' style='position: absolute;z-index: 2;top:13px;left: 12px;'/>";
		break;
	case 9 :
		$weapon = "<img src='../img/weapon/icon_job_9.png' style='position: absolute;z-index: 2;top:13px;left: 12px;'/>";
		break;
	case 10 :
		$weapon = "<img src='../img/weapon/icon_job_10.png' style='position: absolute;z-index: 2;top:13px;left: 12px;'/>";
		break;
	case 11 :
		$weapon = "<img src='../img/weapon/icon_job_11.png' style='position: absolute;z-index: 2;top:13px;left: 12px;'/>";
		break;
	default :
		break;
}
echo $element . $weapon;
echo "<br>前段连携时间：".$row['ss3sc'];
echo "<br>单体ss3时间:".$row['ss3time'];
echo "<br>ss3hit数:".$row['ss3hits'];
echo "<br>连携取消剩hit:".$row['ss3hitc'];
echo "<br>技能倍率:".$row['SKR'];

$findweapon = "select * from weaponpa where weapon=".$row['weapon']." and element=".$row['element'];
if (!$wearesult = mysqli_query($con, $findweapon)) {
	die('Could not connect:' . mysqli_error($con));
}
$wea = mysqli_fetch_array($wearesult);
$R4bs = 0.1;
$R5bs = 0.15;
$weak = 1.5;
$cri = 1.5;
$noweak80R4 = (($row['ATK80']+$wea['eleR4'])*($row['selfbs']+$row['ATKBuff']+$R4bs-1)+$row['slotd']-(1450*$row['Debuff']))*$row['SKR']*$row['hits20']*$row['hits30']*$row['cridemage'];
$noweak100R5 = (($row['ATK100']+$wea['eleR5'])*($row['selfbs']+$row['ATKBuff']+$R5bs-1)+$row['slotd']-(1450*$row['Debuff']))*$row['SKR']*$row['hits20']*$row['hits30']*$row['cridemage'];
$noweak80R5 = (($row['ATK80']+$wea['eleR5'])*($row['selfbs']+$row['ATKBuff']+$R5bs-1)+$row['slotd']-(1450*$row['Debuff']))*$row['SKR']*$row['hits20']*$row['hits30']*$row['cridemage'];
$noweak100R4 = (($row['ATK100']+$wea['eleR4'])*($row['selfbs']+$row['ATKBuff']+$R4bs-1)+$row['slotd']-(1450*$row['Debuff']))*$row['SKR']*$row['hits20']*$row['hits30']*$row['cridemage'];
echo "<br>不克制80级R4武器伤害：".round($noweak80R4*$cri)." DPS:".round($noweak80R4*$cri/$row['ss3time']);
echo "<br>克制80级R4武器伤害：".round($noweak80R4*$cri*($weak+$row['bscri'])*$row['slotr'])." DPS:".round(($noweak80R4*$cri*($weak+$row['bscri'])*$row['slotr'])/$row['ss3time']);

echo "<br>不克制80级R5武器伤害：".round($noweak80R5*$cri);
echo "<br>克制80级R5武器伤害：".round($noweak80R5*$cri*($weak+$row['bscri'])*$row['slotr']);

echo "<br>不克制100级R4武器伤害：".round($noweak100R4*$cri);
echo "<br>克制100级R4武器伤害：".round($noweak100R4*$cri*($weak+$row['bscri'])*$row['slotr']);

echo "<br>不克制100级R5武器伤害：".round($noweak100R5*$cri);
echo "<br>克制100级R5武器伤害：".round($noweak100R5*$cri*($weak+$row['bscri'])*$row['slotr']);


?>