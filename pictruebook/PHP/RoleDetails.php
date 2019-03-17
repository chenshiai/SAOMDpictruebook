<!DOCTYPE html>
<html>
<?php $role = $_GET['role'];
$element = $weapon = $img = "";
$con = mysqli_connect("localhost:3306", "root", "123456", "pictrebook");
if (!$con) {
	die('Could not connect: ' . mysqli_error());
}
mysqli_select_db($con, "pictrebook");
$find = "select * from roule where id=" . $role;
if (!$result = mysqli_query($con, $find)) {
	die('Could not connect:' . mysqli_error($con));
}
$row = mysqli_fetch_array($result);
?>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
<title><?php echo $row['title'].'-'.$row['name']?></title>
<link rel="shortcut icon" href="../img/favicon.ico" />
<script type="text/javascript" src="../js/jsLoader.js" ></script>
<script type="text/javascript" src="../js/cssLoader.js"></script>
<script>if(CssSite.Browser.ie) {
	CssSite.CssLoader.load("../css/index.css", function() {});
	CssSite.CssLoader.load("../css/index_760.css", function() {});
	CssSite.CssLoader.load("../css/details.css", function() {});
	CssSite.CssLoader.load("../css/details_760.css", function() {});
} else {
	CssSite.CssLoader.load("../css/index.css", function() {});
	CssSite.CssLoader.load("../css/index_760.css", function() {});
	CssSite.CssLoader.load("../css/details.css", function() {});
	CssSite.CssLoader.load("../css/details_760.css", function() {});
}</script>
</head>

<body>
<div id="bg"></div>

<div id="topic">
<div id="topcenter">
<a href="../index.html" id="backhome" class="home">
<span>主页</span>
</a>
<div class="list" onclick="openlist()"></div>
<span></span>
</div>
<script>var backhome = document.getElementById("backhome");
if(backhome.classList.contains("hold") != true) {
	backhome.onmouseover = function() {
		backhome.classList.add("hold");
	}
	backhome.onmouseleave = function() {
		backhome.classList.remove("hold");
	}
}</script>
</div>
<div id="leftlist" class="lefthidden">
<ul id="leftlistui">
<li>
<div class="leftListClass">
<img src='../img/ui/category_02.png'/>
<h6><time></time></h6>
</div>
<span></span>
</li>
<li>
<div class="leftListClass">
<img src='../img/ui/category_00.png'/>
<h6><time></time></h6>
</div>
<span></span>
</li>
<li>
<div class="leftListClass">
<img src='../img/ui/category_05.png'/>
<h6><time></time></h6>
</div>
<span></span>
</li>
<li><span></span></li>
</ul>
</div>
<div id="center">
<div id="leftarea">
<?php echo "<img src='../img/cutin/" . $row['cutin'] . ".png' id='cutins'/>"; ?>
<div id="elewea">
<?php
if ($row['mustnull'] == null) {
	$img = "1";
} else {
	$img = $row['img'];
}
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
?>
</div>
<div id="tips">
备注:<br />
<p><?php echo $row['tips']?></p>
</div>
<div id="rare">
<?php
for ($i = 0; $i < $row['rare'] + 3; $i++) {
	echo "<img src='../img/ui/icon_rarity_1.png'/>";
}
if ($row['up'] == 1) {
	echo "<img src='../img/ui/icon_rarity_2.png'/>";
}
?>
</div>

<div class="title">
<span>[<?php echo $row['title']?>]</span>

</div>

<div id="name">
<span><?php echo $row['name']?></span>
</div>
<div id="data">
<ul>
<li class="HP">
<div class="HPbottom"></div>
<div id="HP" value="<?php echo $row['HP']?>">
<span>HP</span>
<p id="HPnum"><?php echo $row['HP']?></p>
</div>

</li>
<li class="HP">
<div class="HPbottom"></div>

<div id="MP" value="<?php echo $row['MP']?>">
<span>MP</span>
<p id="MPnum"><?php echo $row['MP']?></p>
</div>
</li>
<li class="HP">
<div class="HPbottom"></div>

<div id="ATK" value="<?php echo $row['ATK']?>">
<span>ATK</span>
<p id="ATKnum"><?php echo $row['ATK']?></p>
</div>
</li>
<li class="HP">
<div class="HPbottom"></div>

<div id="DEF" value="<?php echo $row['DEF']?>">
<span>DEF</span>
<p id="DEFnum"><?php echo $row['DEF']?></p>
</div>
</li>
<li class="HP">
<div class="HPbottom"></div>

<div id="CRI" value="<?php echo $row['CRI']?>">
<span>CRI</span>
<p id="CRInum"><?php echo $row['CRI']?></p>
</div>
</li>
</ul>
</div>
<div id="swordskill">
<?php $ss1 = "select * from swordskill where id=" . $row['ss1'];
if (!$sult = mysqli_query($con, $ss1)) {
	$ss1row = mysqli_fetch_array($result);
} else {
	$ss1row = mysqli_fetch_array($sult);
}
$ss2 = "select * from swordskill where id=" . $row['ss2'];
if (!$sult = mysqli_query($con, $ss2)) {
	$ss2row = mysqli_fetch_array($result);
} else {
	$ss2row = mysqli_fetch_array($sult);
}
?>
<span class="ssspan">劍技(SwordSkill)</span>
<ul id="ss">
<li>
<span class="sssname"><?php echo $ss1row['ssname']?>(MP:<?php echo $ss1row['ssmp']?>)</span>
<p>
<?php echo $ss1row['sstext']?>
</p>
</li>
<hr />
<li>
<span  class="sssname"><?php echo $ss2row['ssname']?>(MP:<?php echo $ss2row['ssmp']?>)</span>
<p>
<?php echo $ss2row['sstext']?>
</p>
</li>
<hr />
<li>
<span class="sssname"><?php echo $row['ss3']?>(MP:<?php echo $row['ss3mp']?>)</span>
<p>
<?php echo $row['ss3text']?>
</p>
</li>
<?php $special = explode("/", $row['sp']);
echo "<div style='text-align: center;'>";
for ($i = 0; $i < count($special) - 1; $i++) {
	$find = "select * from sp where id=" . $special[$i];
	if (!$result_sp = mysqli_query($con, $find)) {
		die('Could not connect:' . mysqli_error($con));
	}
	$row_sp = mysqli_fetch_array($result_sp);
	echo "<img src='../img/status/" . $row_sp['img'] . ".png' title='" . $row_sp['sp'] . "'/>";
}
?>

<hr />
</ul>
</div>
<?php $bs1 = "select * from battleskill where id=" . $row['bs1'];
if (!$sult = mysqli_query($con, $bs1)) {
	$bs1row = mysqli_fetch_array($result);
} else {
	$bs1row = mysqli_fetch_array($sult);
}

$bs2 = "select * from battleskill where id=" . $row['bs2'];
if (!$sult = mysqli_query($con, $bs2)) {
	$bs2row = mysqli_fetch_array($result);
} else {
	$bs2row = mysqli_fetch_array($sult);
}

$bs3 = "select * from battleskill where id=" . $row['bs3'];
if (!$sult = mysqli_query($con, $bs3)) {
	$bs3row = mysqli_fetch_array($result);
} else {
	$bs3row = mysqli_fetch_array($sult);
}
?>
<div id="battleskill">
<span class="ssspan">戰鬥技能(BattleSkill)</span>
<ul id="bs">
<li>
<span class="sssname"><?php echo $bs1row['ssname']?></span>
<p>
<?php echo $bs1row['sstext']?>
</p>
</li>
<hr />
<li>
<span class="sssname"><?php echo $bs2row['ssname']?></span>
<p>
<?php echo $bs2row['sstext']?>
</p>
</li>
<hr />
<li>
<span class="sssname"><?php echo $bs3row['ssname']?></span>
<p>
<?php echo $bs3row['sstext']?>
</p>
</li>
<hr />
</ul>
</div>
<div id="skillsloat">
<span class="ssspan">技能槽位(SkillSlot)</span>
<ul id="ssl">
<?php
if ($row['sslot'] != null) {
	$ssl = explode("/", $row['sslot']);
	for ($i = 0; $i < count($ssl) - 1; $i++) {
		$findssl = "select * from skillslot where id=" . $ssl[$i];
		$result = mysqli_query($con, $findssl);
		$row = mysqli_fetch_array($result);
		echo "<li class='icon'>" . "<img src='../img/skillslot/slot_skill_icon_" . $row['img'] . ".png'/>";
		echo "<ul><li><span>" . $row['ssname'] . "(Lv." . $row['lv'] . ")</span>";
		echo "<p>" . $row['sstext'] . "</p></li></ul>";
		echo "</li>";
	}
}
mysqli_free_result($result);
mysqli_close($con);
?>
</ul>
<div id="look">
鼠标移至图标即可查看技能槽位
</div>
</div>
</div>
<?php $con = mysqli_connect("localhost:3306", "root", "123456", "pictrebook");
if (!$con) {
	die('Could not connect: ' . mysqli_error());
}
mysqli_select_db($con, "pictrebook");
$find = "select * from roule where id=" . $role;
if (!$result = mysqli_query($con, $find)) {
	die('Could not connect:' . mysqli_error($con));
}
$row = mysqli_fetch_array($result);
?>
<div id="rightarea">
<div id='leftscroll' class='zhi'></div>
<div id='rightscroll' class='zhi'></div>
<div id="pictre_L" value="<?php echo $row['id']?>">
<div id="pictrescroll"><img src="../img/pictureL/1.png" class="imgl"/></div>
</div>
<div class="download">点这里带走这张立绘！(下载时间为30s左右)</div>
</div>
<div id="links">
<a href="../index.html">
<div id="back">
返回首页
</div>
</a>
<div id="button">編輯此頁</div>
<form id="userlogo" method="post" action="<?php echo "editorlogo.php?id=" . $row['id']; ?>">
<span>身份验证</span><br />
<input type="password" id="password" name="password" />
<a id="ok" onclick="submit()"></a>
<a id="close"></a>
</form>
</div>

<div class="card">
<hr />
<!--<div class="title">
<span>[卡池所属]</span>
</div>-->
<?php $open = 0;
$findcard = "select * from card where id=" . $row['card'];
if ($result1 = mysqli_query($con, $findcard)) {
	$open = 1;
	$card = mysqli_fetch_array($result1);
	echo "<img class='cardimg' src='../img/card/" . $card['imgurl'] . ".jpg'/>";
	$roule = explode("/", $card['roule']);
}
?>
<div id="cardtext">
<?php
if ($open == 1) {
	echo "<span>卡池：" . $card['name'] . "</span>";
	echo "<span>简称：" . $card['title'] . "</span>";
	echo "</div>";
	for ($i = 0; $i < count($roule) - 1; $i++) {
		$find = "select * from roule where id=" . $roule[$i];
		if (!$result = mysqli_query($con, $find)) {
			die('Could not connect:' . mysqli_error($con));
		}
		$row = mysqli_fetch_array($result);
		echo "<li class='role'><a href='RoleDetails.php?role=" . $row['id'] . "'>";
		echo "<img src='../img/cutin/" . $row['cutin'] . ".png' title='[" . $row['title'] . "]" . $row['name'] . "'/>";
		echo "</a></li>";
		mysqli_free_result($result);
	}

}
mysqli_close($con);
?>
</div>

</div>
<div id="reply">
<hr/>
<iframe id="external-frame" frameborder="0" scrolling="yes" width="100%" height="500px" src="../reply/reply.php?roule=<?php echo $role; ?>"></iframe>
</div>
</div>
<div id="bottomtipc"></div>
<div id="bg2"></div>

</body>
<botjs></botjs>
<script type="text/javascript">if(MiniSite.Browser.ie) {
	MiniSite.JsLoader.load("../JSON/indexJSON.js", function() {});
	MiniSite.JsLoader.load("../js/list.js", function() {});
	MiniSite.JsLoader.load("../js/details.js", function() {});
} else {
	MiniSite.JsLoader.load("../JSON/indexJSON.js", function() {});
	MiniSite.JsLoader.load("../js/list.js", function() {});
	MiniSite.JsLoader.load("../js/details.js", function() {});
}</script>
<script type="text/javascript">/*技能槽大于6个时缩放*/
var icon = document.getElementsByClassName("icon");

function ssl() {
	if(icon.length > 5 && window.innerWidth < 760) {
		var scale = 100 / icon.length;
		for(i = 0; i < icon.length; i++) {
			var img = icon[i].getElementsByTagName("img");
			img[0].style.width = 100 + "%";
			icon[i].style.width = scale + "%";
			icon[i].style.height = 50 + "px";
		}
	} else {
		for(i = 0; i < icon.length; i++) {
			var img = icon[i].getElementsByTagName("img");
			img[0].style.width = 60 + "px";
			icon[i].style.width = 60 + "px";
			icon[i].style.height = 60 + "px";
		}
	}
}

window.onresize = function() {
	ssl();
}
ssl();</script>

</html>
