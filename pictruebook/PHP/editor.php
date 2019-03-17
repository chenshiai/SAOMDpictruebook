<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title></title>
		<link rel="shortcut icon" href="../img/favicon.ico" />
		<link rel="stylesheet" href="../css/index.css?v=1.0" />
		<link rel="stylesheet" type="text/css" href="../css/editor.css?v=180829"/>
	</head>
	<?php
	$role = $_GET['id'];
	$element = $weapon = "";
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
	switch($row['element']){
		case 1:$element="<img src='../img/Element/icon_attribute_unattributed.png' />";break;
		case 2:$element="<img src='../img/Element/icon_attribute_wind.png' />";break;
		case 3:$element="<img src='../img/Element/icon_attribute_water.png' />";break;
		case 4:$element="<img src='../img/Element/icon_attribute_fire.png' />";break;
		case 5:$element="<img src='../img/Element/icon_attribute_earth.png' />";break;
		case 6:$element="<img src='../img/Element/icon_attribute_light.png' />";break;
		case 7:$element="<img src='../img/Element/icon_attribute_dark.png' />";break;
		default:break;
	}
	switch($row['weapon']){
		case 1:$weapon="<img src='../img/weapon/icon_job_1.png' style='position: absolute;z-index: 2;top:13px;left: 12px;'/>";break;
		case 2:$weapon="<img src='../img/weapon/icon_job_2.png' style='position: absolute;z-index: 2;top:13px;left: 12px;'/>";break;
		case 3:$weapon="<img src='../img/weapon/icon_job_3.png' style='position: absolute;z-index: 2;top:13px;left: 12px;'/>";break;
		case 4:$weapon="<img src='../img/weapon/icon_job_4.png' style='position: absolute;z-index: 2;top:13px;left: 12px;'/>";break;
		case 5:$weapon="<img src='../img/weapon/icon_job_5.png' style='position: absolute;z-index: 2;top:13px;left: 12px;'/>";break;
		case 6:$weapon="<img src='../img/weapon/icon_job_6.png' style='position: absolute;z-index: 2;top:13px;left: 12px;'/>";break;
		case 7:$weapon="<img src='../img/weapon/icon_job_7.png' style='position: absolute;z-index: 2;top:13px;left: 12px;'/>";break;
		case 8:$weapon="<img src='../img/weapon/icon_job_8.png' style='position: absolute;z-index: 2;top:13px;left: 12px;'/>";break;
		case 9:$weapon="<img src='../img/weapon/icon_job_9.png' style='position: absolute;z-index: 2;top:13px;left: 12px;'/>";break;
		case 10:$weapon="<img src='../img/weapon/icon_job_10.png' style='position: absolute;z-index: 2;top:13px;left: 12px;'/>";break;
		case 11:$weapon="<img src='../img/weapon/icon_job_11.png' style='position: absolute;z-index: 2;top:13px;left: 12px;'/>";break;
		default:break;
	}
	$findss1 = "select * from swordskill where id=".$row['ss1'];
	if(!$resultss1 = mysqli_query($con, $findss1)){
		$ss1name = mysqli_fetch_array($result);
	}else{
		$ss1name = mysqli_fetch_array($resultss1);
	}
	
	$findss2 = "select * from swordskill where id=".$row['ss2'];
	if(!$resultss2 = mysqli_query($con, $findss2)){
		$ss2name = mysqli_fetch_array($result);
	}else{
		$ss2name = mysqli_fetch_array($resultss2);
	}
	
	$bs1 = "select * from battleskill where id=".$row['bs1'];
	if(!$sult = mysqli_query($con, $bs1)){
		$bs1row = mysqli_fetch_array($result);
	}else{
		$bs1row = mysqli_fetch_array($sult);	
	}
	
	$bs2 = "select * from battleskill where id=".$row['bs2'];
	if(!$sult = mysqli_query($con, $bs2)){
		$bs2row = mysqli_fetch_array($result);
	}else{
		$bs2row = mysqli_fetch_array($sult);	
	}
	
	$bs3 = "select * from battleskill where id=".$row['bs3'];
	if(!$sult = mysqli_query($con, $bs3)){
		$bs3row = mysqli_fetch_array($result);
	}else{
		$bs3row = mysqli_fetch_array($sult);	
	}
	
	$findwea = "select * from swordskill where weapon=".$row['weapon'];
	if(!$result1 = mysqli_query($con, $findwea)){
		die('Could not connect:' . mysqli_error($con));
	}
	if(!$result2 = mysqli_query($con, $findwea)){
		die('Could not connect:' . mysqli_error($con));
	}
	
	?>
	<body>
		<div id="mask"></div>
		<div id="center">
			<form method="post" name="roledate" action="update.php?id=<?php echo $row['id']?>">
				<div style="position: relative;width: 120px;float: left;height: auto;">
					<?php echo "<img src='../img/cutin/" . $row['cutin'] . ".png' style='width:120px;'/>";?>
					<div id="elewea">
					<?php
						echo $element.$weapon;
					?>
					</div>
					<div id="tips">
						<h3>备注:</h3>
						<textarea name="tips"><?php echo $row['tips']?></textarea>
					</div>
					<div id="backs" onclick="update()">
						<?php
						if($row['up']==null||$row['up']==0){
							echo "<span id='up'>不可以进化</span>";
							echo "<input id='update' name='update' type='hidden' value='0'>";
						}else{
							echo "<span id='up'>可以进化</span>";
							echo "<input id='update' name='update' type='hidden' value='1'>";
						}
						?>
					</div>
				</div>
				<div id="inputname">
					<span style="color: #FFE5C4;" class="sp">称号</span>
					<input type="text" id="name" name="title" value="<?php echo $row['title']?>"/>
					<br />
					<span style="color: #FFE5C4;" class="sp">名称</span>
					<input type="text" id="name" name="name" value="<?php echo $row['name']?>"/>
					<br />
					<span style="color: #aae67e;" class="sp">HP</span>
					<input type="text" id="name" name="hp" value="<?php echo $row['HP']?>"/>
					<br />
					<span style="color: #6edce2;" class="sp">MP</span>
					<input type="text" id="name" name="mp" value="<?php echo $row['MP']?>"/>
					<br />
					<span style="color: #fb7979;" class="sp">ATK</span>
					<input type="text" id="name" name="atk" value="<?php echo $row['ATK']?>"/>
					<br />
					<span style="color: #a873d5;" class="sp">DEF</span>
					<input type="text" id="name" name="def" value="<?php echo $row['DEF']?>"/>
					<br />
					<span style="color: #dca35d;" class="sp">CRI</span>
					<input type="text" id="name" name="cri" value="<?php echo $row['CRI']?>"/>
					<br />
					<span style="color: red;" class="sp">SS1</span>
					<div id="selectss1">
						<span id="ss1name" class="ssname">
						<?php echo $ss1name['ssname']?>
						</span>
						<input type="hidden" name="ss1id" id="ss1id" value="<?php echo $ss1name['id']?>"/>
						<ul id="ss1" class="ss1">
							<?php
							while($ss1 = mysqli_fetch_array($result1)){
								echo "<li onclick='ss1li(".$ss1['id'].")' id='ss1li".$ss1['id']."'>";
								echo $ss1['ssname'];
								echo "</li>";
							}
							?>
						</ul>
					</div>
					<br />
					<span style="color: red;" class="sp">SS2</span>
					<div id="selectss1">
						<span id="ss2name" class="ssname">
						<?php echo $ss2name['ssname']?>
						</span>
						<input type="hidden" name="ss2id" id="ss2id" value="<?php echo $ss2name['id']?>"/>
						<ul id="ss2" class="ss1">
							<?php
							while($ss2 = mysqli_fetch_array($result2)){
								echo "<li onclick='ss2li(".$ss2['id'].")' id='ss2li".$ss2['id']."'>";
								echo $ss2['ssname'];
								echo "</li>";
							}
							?>
						</ul>
					</div>
					<br />
					<span style="color: green;" class="sp">BS1</span>
					<div id="selectss1">
						<span id="bs1name" class="ssname">
						<?php echo $bs1row['ssname']?>
						</span>
						<input type="hidden" name="bs1id" id="bs1id" value="<?php echo $bs1row['id']?>"/>
						<ul id="bs1">
							<li>属性克制增伤
								<ol>
								<?php
								$findbs = "select * from battleskill where team=1";
								if(!$bs = mysqli_query($con, $findbs)){
									die('Could not connect:' . mysqli_error($con));
								}
								while($bs1 = mysqli_fetch_array($bs)){
									echo "<li onclick='bs1li(".$bs1['id'].")' id='bs1li".$bs1['id']."'>";
									echo $bs1['ssname'];
									echo "</li>";
								}
								?>
								</ol>
							</li>
							<li>连击增伤
								<ol>
								<?php
								$findbs = "select * from battleskill where team=2";
								if(!$bs = mysqli_query($con, $findbs)){
									die('Could not connect:' . mysqli_error($con));
								}
								while($bs1 = mysqli_fetch_array($bs)){
									echo "<li onclick='bs1li(".$bs1['id'].")' id='bs1li".$bs1['id']."'>";
									echo $bs1['ssname'];
									echo "</li>";
								}
								?>
								</ol>
							</li>
							<li>提升ATk
								<ol>
								<?php
								$findbs = "select * from battleskill where team=3";
								if(!$bs = mysqli_query($con, $findbs)){
									die('Could not connect:' . mysqli_error($con));
								}
								while($bs1 = mysqli_fetch_array($bs)){
									echo "<li onclick='bs1li(".$bs1['id'].")' id='bs1li".$bs1['id']."'>";
									echo $bs1['ssname'];
									echo "</li>";
								}
								?>
								</ol>
							</li>
							<li>提升MP
								<ol>
								<?php
								$findbs = "select * from battleskill where team=4";
								if(!$bs = mysqli_query($con, $findbs)){
									die('Could not connect:' . mysqli_error($con));
								}
								while($bs1 = mysqli_fetch_array($bs)){
									echo "<li onclick='bs1li(".$bs1['id'].")' id='bs1li".$bs1['id']."'>";
									echo $bs1['ssname'];
									echo "</li>";
								}
								?>
								</ol>
							</li>
							<li>提升ATK与MP
								<ol>
								<?php
								$findbs = "select * from battleskill where team=5";
								if(!$bs = mysqli_query($con, $findbs)){
									die('Could not connect:' . mysqli_error($con));
								}
								while($bs1 = mysqli_fetch_array($bs)){
									echo "<li onclick='bs1li(".$bs1['id'].")' id='bs1li".$bs1['id']."'>";
									echo $bs1['ssname'];
									echo "</li>";
								}
								?>
								</ol>
							</li>
							<li>提升CRI与MP
								<ol>
								<?php
								$findbs = "select * from battleskill where team=6";
								if(!$bs = mysqli_query($con, $findbs)){
									die('Could not connect:' . mysqli_error($con));
								}
								while($bs1 = mysqli_fetch_array($bs)){
									echo "<li onclick='bs1li(".$bs1['id'].")' id='bs1li".$bs1['id']."'>";
									echo $bs1['ssname'];
									echo "</li>";
								}
								?>
								</ol>
							</li>
							<li>提升CRI与ATK
								<ol>
								<?php
								$findbs = "select * from battleskill where team=7";
								if(!$bs = mysqli_query($con, $findbs)){
									die('Could not connect:' . mysqli_error($con));
								}
								while($bs1 = mysqli_fetch_array($bs)){
									echo "<li onclick='bs1li(".$bs1['id'].")' id='bs1li".$bs1['id']."'>";
									echo $bs1['ssname'];
									echo "</li>";
								}
								?>
								</ol>
							</li>
							<li>队长技能
								<ol>
								<?php
								$findbs = "select * from battleskill where team=8";
								if(!$bs = mysqli_query($con, $findbs)){
									die('Could not connect:' . mysqli_error($con));
								}
								while($bs1 = mysqli_fetch_array($bs)){
									echo "<li onclick='bs1li(".$bs1['id'].")' id='bs1li".$bs1['id']."'>";
									echo $bs1['ssname'];
									echo "</li>";
								}
								?>
								</ol>
							</li>
							<li>提升HP
								<ol>
								<?php
								$findbs = "select * from battleskill where team=9";
								if(!$bs = mysqli_query($con, $findbs)){
									die('Could not connect:' . mysqli_error($con));
								}
								while($bs1 = mysqli_fetch_array($bs)){
									echo "<li onclick='bs1li(".$bs1['id'].")' id='bs1li".$bs1['id']."'>";
									echo $bs1['ssname'];
									echo "</li>";
								}
								?>
								</ol>
							</li>
							<li>提升HP与MP
								<ol>
								<?php
								$findbs = "select * from battleskill where team=10";
								if(!$bs = mysqli_query($con, $findbs)){
									die('Could not connect:' . mysqli_error($con));
								}
								while($bs1 = mysqli_fetch_array($bs)){
									echo "<li onclick='bs1li(".$bs1['id'].")' id='bs1li".$bs1['id']."'>";
									echo $bs1['ssname'];
									echo "</li>";
								}
								?>
								</ol>
							</li>
							<li>提升HP与ATK
								<ol>
								<?php
								$findbs = "select * from battleskill where team=11";
								if(!$bs = mysqli_query($con, $findbs)){
									die('Could not connect:' . mysqli_error($con));
								}
								while($bs1 = mysqli_fetch_array($bs)){
									echo "<li onclick='bs1li(".$bs1['id'].")' id='bs1li".$bs1['id']."'>";
									echo $bs1['ssname'];
									echo "</li>";
								}
								?>
								</ol>
							</li>
							<li>提升HP与CRI
								<ol>
								<?php
								$findbs = "select * from battleskill where team=12";
								if(!$bs = mysqli_query($con, $findbs)){
									die('Could not connect:' . mysqli_error($con));
								}
								while($bs1 = mysqli_fetch_array($bs)){
									echo "<li onclick='bs1li(".$bs1['id'].")' id='bs1li".$bs1['id']."'>";
									echo $bs1['ssname'];
									echo "</li>";
								}
								?>
								</ol>
							</li>
							<li>MP回复
								<ol>
								<?php
								$findbs = "select * from battleskill where team=13";
								if(!$bs = mysqli_query($con, $findbs)){
									die('Could not connect:' . mysqli_error($con));
								}
								while($bs1 = mysqli_fetch_array($bs)){
									echo "<li onclick='bs1li(".$bs1['id'].")' id='bs1li".$bs1['id']."'>";
									echo $bs1['ssname'];
									echo "</li>";
								}
								?>
								</ol>
							</li>
							<li>属性克制切换增伤
								<ol>
								<?php
								$findbs = "select * from battleskill where team=14";
								if(!$bs = mysqli_query($con, $findbs)){
									die('Could not connect:' . mysqli_error($con));
								}
								while($bs1 = mysqli_fetch_array($bs)){
									echo "<li onclick='bs1li(".$bs1['id'].")' id='bs1li".$bs1['id']."'>";
									echo $bs1['ssname'];
									echo "</li>";
								}
								?>
								</ol>
							</li>
							<li>属性克制CRI提升
								<ol>
								<?php
								$findbs = "select * from battleskill where team=15";
								if(!$bs = mysqli_query($con, $findbs)){
									die('Could not connect:' . mysqli_error($con));
								}
								while($bs1 = mysqli_fetch_array($bs)){
									echo "<li onclick='bs1li(".$bs1['id'].")' id='bs1li".$bs1['id']."'>";
									echo $bs1['ssname'];
									echo "</li>";
								}
								?>
								</ol>
							</li>
							<li>提升CRI
								<ol>
								<?php
								$findbs = "select * from battleskill where team=16";
								if(!$bs = mysqli_query($con, $findbs)){
									die('Could not connect:' . mysqli_error($con));
								}
								while($bs1 = mysqli_fetch_array($bs)){
									echo "<li onclick='bs1li(".$bs1['id'].")' id='bs1li".$bs1['id']."'>";
									echo $bs1['ssname'];
									echo "</li>";
								}
								?>
								</ol>
							</li>
							<li>连击持续时间延长
								<ol>
								<?php
								$findbs = "select * from battleskill where team=17";
								if(!$bs = mysqli_query($con, $findbs)){
									die('Could not connect:' . mysqli_error($con));
								}
								while($bs1 = mysqli_fetch_array($bs)){
									echo "<li onclick='bs1li(".$bs1['id'].")' id='bs1li".$bs1['id']."'>";
									echo $bs1['ssname'];
									echo "</li>";
								}
								?>
								</ol>
							</li>
						</ul>
					</div>
					<br />
					<span style="color: green;" class="sp">BS2</span>
					<div id="selectss1">
						<span id="bs2name" class="ssname">
						<?php echo $bs2row['ssname']?>
						</span>
						<input type="hidden" name="bs2id" id="bs2id" value="<?php echo $bs2row['id']?>"/>
						<ul id="bs1">
							<li>属性克制增伤
								<ol>
								<?php
								$findbs = "select * from battleskill where team=1";
								if(!$bs = mysqli_query($con, $findbs)){
									die('Could not connect:' . mysqli_error($con));
								}
								while($bs1 = mysqli_fetch_array($bs)){
									echo "<li onclick='bs2li(".$bs1['id'].")' id='bs2li".$bs1['id']."'>";
									echo $bs1['ssname'];
									echo "</li>";
								}
								?>
								</ol>
							</li>
							<li>连击增伤
								<ol>
								<?php
								$findbs = "select * from battleskill where team=2";
								if(!$bs = mysqli_query($con, $findbs)){
									die('Could not connect:' . mysqli_error($con));
								}
								while($bs1 = mysqli_fetch_array($bs)){
									echo "<li onclick='bs2li(".$bs1['id'].")' id='bs2li".$bs1['id']."'>";
									echo $bs1['ssname'];
									echo "</li>";
								}
								?>
								</ol>
							</li>
							<li>提升ATk
								<ol>
								<?php
								$findbs = "select * from battleskill where team=3";
								if(!$bs = mysqli_query($con, $findbs)){
									die('Could not connect:' . mysqli_error($con));
								}
								while($bs1 = mysqli_fetch_array($bs)){
									echo "<li onclick='bs2li(".$bs1['id'].")' id='bs2li".$bs1['id']."'>";
									echo $bs1['ssname'];
									echo "</li>";
								}
								?>
								</ol>
							</li>
							<li>提升MP
								<ol>
								<?php
								$findbs = "select * from battleskill where team=4";
								if(!$bs = mysqli_query($con, $findbs)){
									die('Could not connect:' . mysqli_error($con));
								}
								while($bs1 = mysqli_fetch_array($bs)){
									echo "<li onclick='bs2li(".$bs1['id'].")' id='bs2li".$bs1['id']."'>";
									echo $bs1['ssname'];
									echo "</li>";
								}
								?>
								</ol>
							</li>
							<li>提升ATK与MP
								<ol>
								<?php
								$findbs = "select * from battleskill where team=5";
								if(!$bs = mysqli_query($con, $findbs)){
									die('Could not connect:' . mysqli_error($con));
								}
								while($bs1 = mysqli_fetch_array($bs)){
									echo "<li onclick='bs2li(".$bs1['id'].")' id='bs2li".$bs1['id']."'>";
									echo $bs1['ssname'];
									echo "</li>";
								}
								?>
								</ol>
							</li>
							<li>提升CRI与MP
								<ol>
								<?php
								$findbs = "select * from battleskill where team=6";
								if(!$bs = mysqli_query($con, $findbs)){
									die('Could not connect:' . mysqli_error($con));
								}
								while($bs1 = mysqli_fetch_array($bs)){
									echo "<li onclick='bs2li(".$bs1['id'].")' id='bs2li".$bs1['id']."'>";
									echo $bs1['ssname'];
									echo "</li>";
								}
								?>
								</ol>
							</li>
							<li>提升CRI与ATK
								<ol>
								<?php
								$findbs = "select * from battleskill where team=7";
								if(!$bs = mysqli_query($con, $findbs)){
									die('Could not connect:' . mysqli_error($con));
								}
								while($bs1 = mysqli_fetch_array($bs)){
									echo "<li onclick='bs2li(".$bs1['id'].")' id='bs2li".$bs1['id']."'>";
									echo $bs1['ssname'];
									echo "</li>";
								}
								?>
								</ol>
							</li>
							<li>队长技能
								<ol>
								<?php
								$findbs = "select * from battleskill where team=8";
								if(!$bs = mysqli_query($con, $findbs)){
									die('Could not connect:' . mysqli_error($con));
								}
								while($bs1 = mysqli_fetch_array($bs)){
									echo "<li onclick='bs2li(".$bs1['id'].")' id='bs2li".$bs1['id']."'>";
									echo $bs1['ssname'];
									echo "</li>";
								}
								?>
								</ol>
							</li>
							<li>提升HP
								<ol>
								<?php
								$findbs = "select * from battleskill where team=9";
								if(!$bs = mysqli_query($con, $findbs)){
									die('Could not connect:' . mysqli_error($con));
								}
								while($bs1 = mysqli_fetch_array($bs)){
									echo "<li onclick='bs2li(".$bs1['id'].")' id='bs2li".$bs1['id']."'>";
									echo $bs1['ssname'];
									echo "</li>";
								}
								?>
								</ol>
							</li>
							<li>提升HP与MP
								<ol>
								<?php
								$findbs = "select * from battleskill where team=10";
								if(!$bs = mysqli_query($con, $findbs)){
									die('Could not connect:' . mysqli_error($con));
								}
								while($bs1 = mysqli_fetch_array($bs)){
									echo "<li onclick='bs2li(".$bs1['id'].")' id='bs2li".$bs1['id']."'>";
									echo $bs1['ssname'];
									echo "</li>";
								}
								?>
								</ol>
							</li>
							<li>提升HP与ATK
								<ol>
								<?php
								$findbs = "select * from battleskill where team=11";
								if(!$bs = mysqli_query($con, $findbs)){
									die('Could not connect:' . mysqli_error($con));
								}
								while($bs1 = mysqli_fetch_array($bs)){
									echo "<li onclick='bs2li(".$bs1['id'].")' id='bs2li".$bs1['id']."'>";
									echo $bs1['ssname'];
									echo "</li>";
								}
								?>
								</ol>
							</li>
							<li>提升HP与CRI
								<ol>
								<?php
								$findbs = "select * from battleskill where team=12";
								if(!$bs = mysqli_query($con, $findbs)){
									die('Could not connect:' . mysqli_error($con));
								}
								while($bs1 = mysqli_fetch_array($bs)){
									echo "<li onclick='bs2li(".$bs1['id'].")' id='bs2li".$bs1['id']."'>";
									echo $bs1['ssname'];
									echo "</li>";
								}
								?>
								</ol>
							</li>
							<li>MP回复
								<ol>
								<?php
								$findbs = "select * from battleskill where team=13";
								if(!$bs = mysqli_query($con, $findbs)){
									die('Could not connect:' . mysqli_error($con));
								}
								while($bs1 = mysqli_fetch_array($bs)){
									echo "<li onclick='bs2li(".$bs1['id'].")' id='bs2li".$bs1['id']."'>";
									echo $bs1['ssname'];
									echo "</li>";
								}
								?>
								</ol>
							</li>
							<li>属性克制切换增伤
								<ol>
								<?php
								$findbs = "select * from battleskill where team=14";
								if(!$bs = mysqli_query($con, $findbs)){
									die('Could not connect:' . mysqli_error($con));
								}
								while($bs1 = mysqli_fetch_array($bs)){
									echo "<li onclick='bs2li(".$bs1['id'].")' id='bs2li".$bs1['id']."'>";
									echo $bs1['ssname'];
									echo "</li>";
								}
								?>
								</ol>
							</li>
							<li>属性克制CRI提升
								<ol>
								<?php
								$findbs = "select * from battleskill where team=15";
								if(!$bs = mysqli_query($con, $findbs)){
									die('Could not connect:' . mysqli_error($con));
								}
								while($bs1 = mysqli_fetch_array($bs)){
									echo "<li onclick='bs2li(".$bs1['id'].")' id='bs2li".$bs1['id']."'>";
									echo $bs1['ssname'];
									echo "</li>";
								}
								?>
								</ol>
							</li>
							<li>提升CRI
								<ol>
								<?php
								$findbs = "select * from battleskill where team=16";
								if(!$bs = mysqli_query($con, $findbs)){
									die('Could not connect:' . mysqli_error($con));
								}
								while($bs1 = mysqli_fetch_array($bs)){
									echo "<li onclick='bs2li(".$bs1['id'].")' id='bs2li".$bs1['id']."'>";
									echo $bs1['ssname'];
									echo "</li>";
								}
								?>
								</ol>
							</li>
							<li>连击持续时间延长
								<ol>
								<?php
								$findbs = "select * from battleskill where team=17";
								if(!$bs = mysqli_query($con, $findbs)){
									die('Could not connect:' . mysqli_error($con));
								}
								while($bs1 = mysqli_fetch_array($bs)){
									echo "<li onclick='bs2li(".$bs1['id'].")' id='bs2li".$bs1['id']."'>";
									echo $bs1['ssname'];
									echo "</li>";
								}
								?>
								</ol>
							</li>
						</ul>
					</div>
					<br />
					<span style="color: green;" class="sp">BS3</span>
					<div id="selectss1">
						<span id="bs3name" class="ssname">
						<?php echo $bs3row['ssname']?>
						</span>
						<input type="hidden" name="bs3id" id="bs3id" value="<?php echo $bs3row['id']?>"/>
						<ul id="bs1">
							<li>属性克制增伤
								<ol>
								<?php
								$findbs = "select * from battleskill where team=1";
								if(!$bs = mysqli_query($con, $findbs)){
									die('Could not connect:' . mysqli_error($con));
								}
								while($bs1 = mysqli_fetch_array($bs)){
									echo "<li onclick='bs3li(".$bs1['id'].")' id='bs3li".$bs1['id']."'>";
									echo $bs1['ssname'];
									echo "</li>";
								}
								?>
								</ol>
							</li>
							<li>连击增伤
								<ol>
								<?php
								$findbs = "select * from battleskill where team=2";
								if(!$bs = mysqli_query($con, $findbs)){
									die('Could not connect:' . mysqli_error($con));
								}
								while($bs1 = mysqli_fetch_array($bs)){
									echo "<li onclick='bs3li(".$bs1['id'].")' id='bs3li".$bs1['id']."'>";
									echo $bs1['ssname'];
									echo "</li>";
								}
								?>
								</ol>
							</li>
							<li>提升ATk
								<ol>
								<?php
								$findbs = "select * from battleskill where team=3";
								if(!$bs = mysqli_query($con, $findbs)){
									die('Could not connect:' . mysqli_error($con));
								}
								while($bs1 = mysqli_fetch_array($bs)){
									echo "<li onclick='bs3li(".$bs1['id'].")' id='bs3li".$bs1['id']."'>";
									echo $bs1['ssname'];
									echo "</li>";
								}
								?>
								</ol>
							</li>
							<li>提升MP
								<ol>
								<?php
								$findbs = "select * from battleskill where team=4";
								if(!$bs = mysqli_query($con, $findbs)){
									die('Could not connect:' . mysqli_error($con));
								}
								while($bs1 = mysqli_fetch_array($bs)){
									echo "<li onclick='bs3li(".$bs1['id'].")' id='bs3li".$bs1['id']."'>";
									echo $bs1['ssname'];
									echo "</li>";
								}
								?>
								</ol>
							</li>
							<li>提升ATK与MP
								<ol>
								<?php
								$findbs = "select * from battleskill where team=5";
								if(!$bs = mysqli_query($con, $findbs)){
									die('Could not connect:' . mysqli_error($con));
								}
								while($bs1 = mysqli_fetch_array($bs)){
									echo "<li onclick='bs3li(".$bs1['id'].")' id='bs3li".$bs1['id']."'>";
									echo $bs1['ssname'];
									echo "</li>";
								}
								?>
								</ol>
							</li>
							<li>提升CRI与MP
								<ol>
								<?php
								$findbs = "select * from battleskill where team=6";
								if(!$bs = mysqli_query($con, $findbs)){
									die('Could not connect:' . mysqli_error($con));
								}
								while($bs1 = mysqli_fetch_array($bs)){
									echo "<li onclick='bs3li(".$bs1['id'].")' id='bs3li".$bs1['id']."'>";
									echo $bs1['ssname'];
									echo "</li>";
								}
								?>
								</ol>
							</li>
							<li>提升CRI与ATK
								<ol>
								<?php
								$findbs = "select * from battleskill where team=7";
								if(!$bs = mysqli_query($con, $findbs)){
									die('Could not connect:' . mysqli_error($con));
								}
								while($bs1 = mysqli_fetch_array($bs)){
									echo "<li onclick='bs3li(".$bs1['id'].")' id='bs3li".$bs1['id']."'>";
									echo $bs1['ssname'];
									echo "</li>";
								}
								?>
								</ol>
							</li>
							<li>队长技能
								<ol>
								<?php
								$findbs = "select * from battleskill where team=8";
								if(!$bs = mysqli_query($con, $findbs)){
									die('Could not connect:' . mysqli_error($con));
								}
								while($bs1 = mysqli_fetch_array($bs)){
									echo "<li onclick='bs3li(".$bs1['id'].")' id='bs3li".$bs1['id']."'>";
									echo $bs1['ssname'];
									echo "</li>";
								}
								?>
								</ol>
							</li>
							<li>提升HP
								<ol>
								<?php
								$findbs = "select * from battleskill where team=9";
								if(!$bs = mysqli_query($con, $findbs)){
									die('Could not connect:' . mysqli_error($con));
								}
								while($bs1 = mysqli_fetch_array($bs)){
									echo "<li onclick='bs3li(".$bs1['id'].")' id='bs3li".$bs1['id']."'>";
									echo $bs1['ssname'];
									echo "</li>";
								}
								?>
								</ol>
							</li>
							<li>提升HP与MP
								<ol>
								<?php
								$findbs = "select * from battleskill where team=10";
								if(!$bs = mysqli_query($con, $findbs)){
									die('Could not connect:' . mysqli_error($con));
								}
								while($bs1 = mysqli_fetch_array($bs)){
									echo "<li onclick='bs3li(".$bs1['id'].")' id='bs3li".$bs1['id']."'>";
									echo $bs1['ssname'];
									echo "</li>";
								}
								?>
								</ol>
							</li>
							<li>提升HP与ATK
								<ol>
								<?php
								$findbs = "select * from battleskill where team=11";
								if(!$bs = mysqli_query($con, $findbs)){
									die('Could not connect:' . mysqli_error($con));
								}
								while($bs1 = mysqli_fetch_array($bs)){
									echo "<li onclick='bs3li(".$bs1['id'].")' id='bs3li".$bs1['id']."'>";
									echo $bs1['ssname'];
									echo "</li>";
								}
								?>
								</ol>
							</li>
							<li>提升HP与CRI
								<ol>
								<?php
								$findbs = "select * from battleskill where team=12";
								if(!$bs = mysqli_query($con, $findbs)){
									die('Could not connect:' . mysqli_error($con));
								}
								while($bs1 = mysqli_fetch_array($bs)){
									echo "<li onclick='bs3li(".$bs1['id'].")' id='bs3li".$bs1['id']."'>";
									echo $bs1['ssname'];
									echo "</li>";
								}
								?>
								</ol>
							</li>
							<li>MP回复
								<ol>
								<?php
								$findbs = "select * from battleskill where team=13";
								if(!$bs = mysqli_query($con, $findbs)){
									die('Could not connect:' . mysqli_error($con));
								}
								while($bs1 = mysqli_fetch_array($bs)){
									echo "<li onclick='bs3li(".$bs1['id'].")' id='bs3li".$bs1['id']."'>";
									echo $bs1['ssname'];
									echo "</li>";
								}
								?>
								</ol>
							</li>
							<li>属性克制切换增伤
								<ol>
								<?php
								$findbs = "select * from battleskill where team=14";
								if(!$bs = mysqli_query($con, $findbs)){
									die('Could not connect:' . mysqli_error($con));
								}
								while($bs1 = mysqli_fetch_array($bs)){
									echo "<li onclick='bs3li(".$bs1['id'].")' id='bs3li".$bs1['id']."'>";
									echo $bs1['ssname'];
									echo "</li>";
								}
								?>
								</ol>
							</li>
							<li>属性克制CRI提升
								<ol>
								<?php
								$findbs = "select * from battleskill where team=15";
								if(!$bs = mysqli_query($con, $findbs)){
									die('Could not connect:' . mysqli_error($con));
								}
								while($bs1 = mysqli_fetch_array($bs)){
									echo "<li onclick='bs3li(".$bs1['id'].")' id='bs3li".$bs1['id']."'>";
									echo $bs1['ssname'];
									echo "</li>";
								}
								?>
								</ol>
							</li>
							<li>提升CRI
								<ol>
								<?php
								$findbs = "select * from battleskill where team=16";
								if(!$bs = mysqli_query($con, $findbs)){
									die('Could not connect:' . mysqli_error($con));
								}
								while($bs1 = mysqli_fetch_array($bs)){
									echo "<li onclick='bs3li(".$bs1['id'].")' id='bs3li".$bs1['id']."'>";
									echo $bs1['ssname'];
									echo "</li>";
								}
								?>
								</ol>
							</li>
							<li>连击持续时间延长
								<ol>
								<?php
								$findbs = "select * from battleskill where team=17";
								if(!$bs = mysqli_query($con, $findbs)){
									die('Could not connect:' . mysqli_error($con));
								}
								while($bs1 = mysqli_fetch_array($bs)){
									echo "<li onclick='bs3li(".$bs1['id'].")' id='bs3li".$bs1['id']."'>";
									echo $bs1['ssname'];
									echo "</li>";
								}
								?>
								</ol>
							</li>
							<li>无</li>
						</ul>
					</div>
					<br />
					<span style="color: red;" class="sp">SS3</span>
					<input type="text" id="name" name="ss3name" value="<?php echo $row['ss3']?>"/>
					<br />
					<span style="color: red;" class="sp">消耗</span>
					<input type="text" id="name" name="ss3mp" value="<?php echo $row['ss3mp']?>"/>
					<br />
					<span style="color: red;" class="sp">描述</span>
					<textarea id="ss3text" name="ss3text"><?php echo $row['ss3text']?></textarea>
				</div>
			<div id="selectslot">
				<span style="color: #FFFFFF;font-weight: bold;font-family: '微软雅黑';">添加技能槽位</span>
				<input type="hidden" id="slotskill" name="slotskill" value="<?php echo $row['sslot']?>"/>
				<ul id="ssl">
				<?php 
				$ssl = explode("/", $row['sslot']);
				for($i=0;$i<count($ssl)-1;$i++){
					$findssl = "select * from skillslot where id=".$ssl[$i];
					$result = mysqli_query($con, $findssl);
					$row = mysqli_fetch_array($result);
					echo "<li id='ssl".$row['id']."'>"."<img src='../img/skillslot/slot_skill_icon_".$row['img'].".png'/>";
					echo "<ul><li><span>".$row['ssname']."(Lv.".$row['lv'].")</span>";
					echo "<p>".$row['sstext']."</p></li></ul>";
					echo "<div id='close' onclick='delslot(".$row['id'].")'></div>";
					echo "</li>";
				}
				mysqli_close($con);
				?>
				</ul>
				<ul id="moressl">
					
				</ul>
				<div id="addslot">
					点击添加
				</div>
				<div id="slotlist">

				</div>
				
			</div>
			
			<div id="rule">
				<h2>规范：</h2>
				<p>
				<br />
				<br />卡池角色：尽量以【80级无装备】的数据来填写，如果不是则需要在备注中说明。
				<br />赠送角色：可以使用普通解放结晶突破的白送角色，要求同上。
				<br />活动角色：尽量以【100级无装备】的数据来填写，突破极限需要在备注中说明，若是其他情况也需要说明。
				<br />排位角色：解放结晶需要通过排位获得的角色，要求同上。
				<br />
				<br />关于技能槽：
				<br />1.战斗技能强化的技能槽直接添加即可。
				<br />2.剑技3强化的描述，如果原本SS3描述里没有说明，就麻烦自己加上强化描述吧。
				</p>
			</div>
			<div>
				<a href="#" onClick="goback()"><div id="back">
					返回上页
				</div></a>
				<div class="button">錯誤提交</div>
				<div id="button" class="button" onclick="submit()">完成修改</button>
			</div>
			</form>
		</div>
		
	</body>
	<script type="text/javascript" src="../js/editor.js?=180829" ></script>
</html>
