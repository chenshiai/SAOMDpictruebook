<?php
$con = mysqli_connect("localhost:3306", "root", "123456", "pictrebook");
if (!$con) {
	die('Could not connect: ' . mysqli_error());
}
mysqli_select_db($con, "pictrebook");
?>

</style>
<ul id="slots">
	<li>增加攻击力
		<ul>
			<?php
				$findssl = "select * from skillslot where team=1";
				if(!$slot = mysqli_query($con, $findssl)){
					die('Could not connect:' . mysqli_error($con));
				}
				while($slot1 = mysqli_fetch_array($slot)){
					echo "<li onclick='sslli(".$slot1['id'].")' id='sslli".$slot1['id']."'>";
					echo $slot1['ssname']."Lv".$slot1['lv'];
					echo "</li>";
				}
			?>
		</ul>
	</li>
	<li>增伤
		<ul>
			<?php
				$findssl = "select * from skillslot where team=2";
				if(!$slot = mysqli_query($con, $findssl)){
					die('Could not connect:' . mysqli_error($con));
				}
				while($slot1 = mysqli_fetch_array($slot)){
					echo "<li onclick='sslli(".$slot1['id'].")' id='sslli".$slot1['id']."'>";
					echo $slot1['ssname']."Lv".$slot1['lv'];
					echo "</li>";
				}
			?>
		</ul>
	</li>
	<li>连击
		<ul>
			<?php
				$findssl = "select * from skillslot where team=3";
				if(!$slot = mysqli_query($con, $findssl)){
					die('Could not connect:' . mysqli_error($con));
				}
				while($slot1 = mysqli_fetch_array($slot)){
					echo "<li onclick='sslli(".$slot1['id'].")' id='sslli".$slot1['id']."'>";
					echo $slot1['ssname']."Lv".$slot1['lv'];
					echo "</li>";
				}
			?>
		</ul>
	</li>
	<li>回复
		<ul>
			<?php
				$findssl = "select * from skillslot where team=4";
				if(!$slot = mysqli_query($con, $findssl)){
					die('Could not connect:' . mysqli_error($con));
				}
				while($slot1 = mysqli_fetch_array($slot)){
					echo "<li onclick='sslli(".$slot1['id'].")' id='sslli".$slot1['id']."'>";
					echo $slot1['ssname']."Lv".$slot1['lv'];
					echo "</li>";
				}
			?>
		</ul>
	</li>
	<li>保证系列
		<ul>
			<?php
				$findssl = "select * from skillslot where team=5";
				if(!$slot = mysqli_query($con, $findssl)){
					die('Could not connect:' . mysqli_error($con));
				}
				while($slot1 = mysqli_fetch_array($slot)){
					echo "<li onclick='sslli(".$slot1['id'].")' id='sslli".$slot1['id']."'>";
					echo $slot1['ssname']."Lv".$slot1['lv'];
					echo "</li>";
				}
			?>
		</ul>
	</li>
	<li>特有
		<ul>
			<?php
				$findssl = "select * from skillslot where team=6";
				if(!$slot = mysqli_query($con, $findssl)){
					die('Could not connect:' . mysqli_error($con));
				}
				while($slot1 = mysqli_fetch_array($slot)){
					echo "<li onclick='sslli(".$slot1['id'].")' id='sslli".$slot1['id']."'>";
					echo $slot1['ssname']."Lv".$slot1['lv'];
					echo "</li>";
				}
			?>
		</ul>
	</li>
	<li>额外附加
		<ul>
			<?php
				$findssl = "select * from skillslot where team=7";
				if(!$slot = mysqli_query($con, $findssl)){
					die('Could not connect:' . mysqli_error($con));
				}
				while($slot1 = mysqli_fetch_array($slot)){
					echo "<li onclick='sslli(".$slot1['id'].")' id='sslli".$slot1['id']."'>";
					echo $slot1['ssname']."Lv".$slot1['lv'];
					echo "</li>";
				}
			?>
		</ul>
	</li>
	<li>防御系
		<ul>
			<?php
				$findssl = "select * from skillslot where team=8";
				if(!$slot = mysqli_query($con, $findssl)){
					die('Could not connect:' . mysqli_error($con));
				}
				while($slot1 = mysqli_fetch_array($slot)){
					echo "<li onclick='sslli(".$slot1['id'].")' id='sslli".$slot1['id']."'>";
					echo $slot1['ssname']."Lv".$slot1['lv'];
					echo "</li>";
				}
			?>
		</ul>
	</li>
</ul>
<div id="xx" onclick="xx()"></div>
<?php
mysqli_close($con);	
?>