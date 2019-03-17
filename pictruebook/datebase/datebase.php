<?php
$pass = $_POST['password'];
$con = mysqli_connect("localhost:3306", "root", "123456", "pictrebook");
if (!$con) {
	die('Could not connect: ' . mysqli_error());
}
mysqli_select_db($con, "pictrebook");
$user = "select * from user where power=1";
if(!$result = mysqli_query($con, $user)){
		die('Could not connect:' . mysqli_error($con));
	}
$row = mysqli_fetch_array($result);
if($row['password']==$pass){
}else{
	echo "<script>alert('密码错误')</script>";
	Header("refresh:0.1;url= ../index.html"); 
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title>数据库</title>
		<link rel="shortcut icon" href="img/favicon.ico" />
	</head>
	<style>
		*{
			margin: 0;
			padding: 0;
		}
		span{
			font-family:"微软雅黑" ;
			font-size: 25px;
		}
		li{
			list-style: none;
		}
		.tablee{
			display: none;
		}
	</style>
	<body>
		<div id="txt">
		默认序号：<br />
    	0.检索全部数据
    	<br />
    	属性对应序号：
    	1.无属性
    	2.风属性
    	3.水属性
    	4.火属性
    	5.土属性
    	6.圣属性
    	7.暗属性
    	<br />
    	武器对应序号：
    	1.单手剑
    	2.细剑
    	3.短剑
    	4.单手棍
    	5.狙击枪
    	6.长矛
    	7.剑盾
    	8.自动枪
    	9.双剑
    	10.弓箭手
    	11.法杖
    	<br />
    	性别对应序号：
    	1.男
    	2.女
    	<br />
    	稀有度对应序号：
    	1.4r
    	2.5r
    	3.6r
    	<br />
    	bs对应序号:
    	1.克制增爆伤
    	2.连击增伤
    	3.单纯+ATK
    	4.单纯+MP
    	5.+ATK&MP
    	6.+CRI&MP
    	7.+CRI&ATK
    	8.队长技
    	9.单纯+HP
    	10.+HP&MP
    	11.+HP&ATK
    	12.+HP&CRI
    	13.mp回复
    	14.克制切换增伤
    	15.克制CRI增加
    	16.单纯+CRI、
    	17.连击加时
    	<br />
    	技能槽位对应序号：
    	1.增加攻击力
    	2.增伤
    	3.连击
    	4.回复
    	5.保证系列
    	6.特有
    	7.额外附加
    	8.防御系
		</div>
		<div style="width: 1400px;margin:0 auto;">
			<h1>选择需要编辑的表单</h1>
			<a  href="#" onclick="roule(0)"><span>1.角色表</span></a>
			<br />
			<a href="#" onclick="roule(1)"><span>2.剑技表(SwordSkill)</span></a>
			<br />
			<a href="#" onclick="roule(2)"><span>3.战斗技能表(BattleSkill)</span></a>
			<br />
			<a href="#" onclick="roule(3)"><span>4.技能槽位表(SlotSkill)</span></a>
			<br />
			<a href="#"><span>5.角色特性表(SP)</span></a>
			<br />
			<hr />
			<div id="table"  class="tablee">
				<h3>角色表</h3>
				<form method="post" action="addroule.php">添加新角色(按照上方对应编号填写)<br />
					
				图片编号：<input type="text" name="cutin" value=''/>
				属性：<input type="text" name="element" value=''/>
				武器种：<input type="text" name="weapon" value=''/>
				性别：<input type="text" name="sex" value=''/>
				稀有度：<input type="text" name="rare" value=''/>
				人物属：<input type="text" name="genus" value=''/>
				卡池：<input type="text" name="card" value=''/>
				<input type="submit" value="添加"/>
				</form>
				<hr />
				<h3>角色ID查询</h3>
				<input type="text" id="rare" value=''/><input id="find"type="submit" value="查找"/>
				<hr />
				<?php
				
				$find = "select * from roule order by id desc";
				if(!$result = mysqli_query($con, $find)){
					die('Could not connect:' . mysqli_error($con));
				}
				echo "id|图片编号|属性|武器种|性别|稀有度|人物组|卡池|<br>";
				while($row = mysqli_fetch_array($result)){
					echo "<li id=".$row['id'].">";
					echo $row['id'];
					echo ' | '.$row['cutin']." | ".$row['element']." | ".$row['weapon']." | ".$row['sex']." | ".$row['rare'].' | '.$row['genus'].' | '.$row['card'];
					echo "<a href='delete.php?id=".$row['id']."'>删除</a>";
					echo "——";
					echo "<a href='update.php?id=".$row['id']."'>修改</a>";
					echo "</li><hr />";
				}
				?>
			</div>
			<div id="SwordSkill" class="tablee">
				<h3>剑技表(SwordSkill)</h3>
				<form method="post" action="addskill.php">添加新技能(按照上方对应编号填写)<br />
					
				技能名：<input type="text" name="ssname" value=''/>
				技能描述：<textarea style="font-size: 15px;" name="sstext" ></textarea>
				武器种：<input type="text" name="weapon" value=''/>
				消耗MP：<input type="text" name="ssmp" value=''/>
				<input type="submit" value="添加"/>
				</form>
				<hr />
				<?php
				echo "id|技能名|技能描述|武器种|mp消耗<br>";
				for($i=1;$i<=11;$i++){
					$findskill = "select * from swordskill where weapon=".$i;
					if(!$result = mysqli_query($con, $findskill)){
						die('Could not connect:' . mysqli_error($con));
					}
				
					while($skill = mysqli_fetch_array($result)){
						echo "<li id=".$skill['id'].">";
						echo $skill['id'];
						echo ' | '.$skill['ssname'].' | '.$skill['sstext'].' | '.$skill['weapon'].' | '.$skill['ssmp'].' |';
						echo "<a href='delete.php?bs=0&id=0&skill=".$skill['id']."'>删除</a>";
						echo "</li><hr />";
					}
					echo "<br/>";
				}
				?>
			</div>
			<div id="battleskill" class="tablee">
				<h3>战斗技能表(BattleSkill)</h3>
				<form method="post" action="addbs.php">添加新技能(按照上方对应编号填写)<br />
				类别：<input type="text" name="team" value=''/>
				名称：<input type="text" name="ssname" value=''/>
				描述：<textarea style="font-size: 15px;" name="sstext" ></textarea>
				<input type="submit" value="添加"/>
				</form>
				<?php
				echo "id|类别|名称|描述<br>";
				for($i=1;$i<=17;$i++){
					$findbs = "select * from battleskill where team=".$i;
					if(!$result = mysqli_query($con, $findbs)){
						die('Could not connect:' . mysqli_error($con));
					}
					while($bs = mysqli_fetch_array($result)){
						echo "<li id=".$bs['id'].">";
						echo $bs['id'];
						echo ' | '.$bs['team'].' | '.$bs['ssname'].' | '.$bs['sstext'].' |';
						echo "<a href='delete.php?skill=0&id=0&bs=".$bs['id']."'>删除</a>";
						echo "</li><hr />";
					}
					echo "<br />";
				}
				
				?>
			</div>
			<div class="tablee">
				<h3>技能槽位表(SlotSkill)</h3>
				<form method="post" action="addsl.php">添加新技能槽(按照上方对应编号填写)<br />
				类别：<input type="text" name="team" value=''/>
				名称：<input type="text" name="ssname" value=''/>
				等级：<input type="text" name="lv" value=''/>
				描述：<textarea style="font-size: 15px;" name="sstext" ></textarea>
				图标：<input type="text" name="img" value=''/>
				<input type="submit" value="添加"/>
				</form>
				<?php
				echo "id|类别|名称|等级|描述|图标|<br>";
				for($i=1;$i<=9;$i++){
					$findsl = "select * from skillslot where team=".$i;
					if(!$result = mysqli_query($con, $findsl)){
						die('Could not connect:' . mysqli_error($con));
					}
					while($sl = mysqli_fetch_array($result)){
						echo "<li id=".$sl['id'].">";
						echo $sl['id'];
						echo ' | '.$sl['team'].' | '.$sl['ssname'].' | '.$sl['lv'].' | '.$sl['sstext'].' | '.$sl['img'];
						echo "<a href='delete.php?sl=".$sl['id']."'>删除</a>";
						echo "</li><hr />";
					}
					echo "<br />";
				}
				
				?>
			</div>
		</div>

	</body>
	<script>
		var rare = document.getElementById('rare');
		var find = document.getElementById('find');
		var findID=0;
		find.onclick = function(){
			if(Number(rare.value)!=findID&&findID!=0){
				document.getElementById(findID).style.background = "#FFFFFF";
				findID=rare.value;
				var li = document.getElementById(rare.value);
				if(li!=null){
					li.style.background = "#ffde6e";
					document.documentElement.scrollTop = li.offsetTop;
				}else{
					findID=0;
				}
			}else{
				findID=rare.value;
				var li = document.getElementById(rare.value);
				if(li!=null){
					li.style.background = "#ffde6e";
					document.documentElement.scrollTop = li.offsetTop;
				}else{
					findID=0;
				}
			}
		}
		var tablee = document.getElementsByClassName('tablee')
		function roule(num){
			for(var i=0 ;i<4;i++){
				tablee[i].style.display = "none";
			}
			tablee[num].style.display = "block";
		}
		
	</script>
</html>
