<?php
$id = $_GET['id'];
$con = mysqli_connect("localhost:3306", "root", "123456", "pictrebook");
if (!$con) {
	die('Could not connect: ' . mysqli_error());
}
mysqli_select_db($con, "pictrebook");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$cutin = $_POST['cutin'];
	$element = $_POST['element'];
	$weapon = $_POST['weapon'];
	$sex = $_POST['sex'];
	$rare = $_POST['rare'];
	$genus = $_POST['genus'];
	$card = $_POST['card'];
	mysqli_query($con, "update roule set cutin='".$cutin."' where id=".$id);
	mysqli_query($con, "update roule set element='".$element."' where id=".$id);
	mysqli_query($con, "update roule set weapon='".$weapon."' where id=".$id);
	mysqli_query($con, "update roule set sex='".$sex."' where id=".$id);
	mysqli_query($con, "update roule set rare='".$rare."' where id=".$id);
	mysqli_query($con, "update roule set genus='".$genus."' where id=".$id);
	mysqli_query($con, "update roule set card='".$card."' where id=".$id);
	echo "修改完成";
}
$find = "select * from roule where id=".$id;
if(!$result = mysqli_query($con, $find)){
		die('Could not connect:' . mysqli_error($con));
	}
$row = mysqli_fetch_array($result);
?>
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
<form method="post" action="<?php echo 'update.php?id='.$id?>"><h3>修改角色(按照上方对应编号填写)</h3>
	图片编号：<input type="text" name="cutin" value='<?php echo $row['cutin']?>'/><br />
	属性：<input type="text" name="element" value='<?php echo $row['element']?>'/><br />
	武器种：<input type="text" name="weapon" value='<?php echo $row['weapon']?>'/><br />
	性别：<input type="text" name="sex" value='<?php echo $row['sex']?>'/><br />
	稀有度：<input type="text" name="rare" value='<?php echo $row['rare']?>'/><br />
	人物属：<input type="text" name="genus" value='<?php echo $row['genus']?>'/>
	卡池：<input type="text" name="card" value='<?php echo $row['card']?>'/>
	<input type="submit" value="确认修改"/>
</form>
<?php


mysqli_close($con);
	
?>