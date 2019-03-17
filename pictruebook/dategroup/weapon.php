<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>数据组-武器数据</title>
		<link rel="shortcut icon" href="../img/favicon.ico" />
		<meta name="keywords" content="刀剑神域，记忆重组，WIKI,SAOMD图鉴">
		<link rel="stylesheet" href="../css/index.css?v=180901" />
		<link rel="stylesheet" media="screen and (max-width:780px)" href="../css/index_760.css?v=180901" />
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=0" />
		<link rel="stylesheet" type="text/css" href="../css/details.css?v=1896"/>
		<link rel="stylesheet" type="text/css" media="screen and (max-width:780px)" href="../css/details_760.css?v=1896"/>
		<script type="text/javascript" src="../js/jsLoader.js" ></script>
		<style>
			ul{
				margin-top: 20px;
				width: 100%;
				float: left;
			}
			#element_wea li{
				float: left;
				width: 14%;
			}
			.weapondate{
				display: none;
				margin-bottom: 40px;
			}
			.weapondate li{
				position: relative;
				width: 95%;
				background: #FFFFFF;
				height: 60px;
				margin: 10px auto;
				line-height: 60px;
				border: solid 1px #4F4F4F;
			}
			.weapondate li:hover{
				box-shadow: #000000 0 0 10px;
			}
			.weapondate span{
				color: #FFFFFF;
				font-size: 1.8em;
				font-weight: bold;
				text-shadow: #000000 0 0 2px;
			}
			.weapondate img{
				float: left;
				height: 60px;
			}
			.up{
				position: absolute;
				z-index: 2;
			}
			.up span{
				text-align: center;
				float: left;
			}
			.un div{
				height: 60px;
			}
			.R4{
				position: absolute;
				z-index: 1;
				top: 0;
				left: 0;
				width: 60%;
			}
			.R4 span{
				float: right;
				margin-right:10px ;
			}
			.R5{
				position: absolute;
				z-index: 0;
				top: 0;
				left: 0;
				width: 100%;
			}
			.R5 span{
				float: right;
				margin-right:10px ;
			}
			.R41{
				background: rgb(99,99,99);
			}
			.R51{
				background: rgb(150,150,150);
			}
			.R43{
				background: rgb(86,206,255);
			}
			.R53{
				background: rgb(149,222,255);
			}
			.R44{
				background: rgb(255,87,71);
			}
			.R54{
				background: rgb(255,125,122);
			}
			.R42{
				background: rgb(109,204,114);
			}
			.R52{
				background: rgb(154,224,122);
			}
			.R45{
				background: rgb(229,131,53);
			}
			.R55{
				background: rgb(255,171,120);
			}
			.R47{
				background: rgb(116,77,180);
			}
			.R57{
				background: rgb(146,117,220);
			}
			.R46{
				background: rgb(255,214,50);
			}
			.R56{
				background: rgb(255,237,100);
			}
			.weaponform{
				position: absolute;
				z-index: 4;
				background: #C0C0C0;
				height: 60px;
				width:100%;
				display: none;
			}
			.weaponform input{
				height: 40px;
				font-size:1.2em ;
			}
			.weaponform div{
				height: 60px;
				color: #FFFFFF;
				float: right;
				font-size:1em ;
				font-weight: bold;
				margin-right: 5px;
			}
			.weaponform div:hover{
				color: #4F4F4F;
			}
			@media (max-width: 780px) {
				#element_wea img{
					width: 100%;
				}
				.un div{
					height: 45px;
				}
				.weapondate img{
					height: 45px;
				}
				.weapondate li{
					height: 45px;
					margin: 5px auto;
					line-height: 45px;
				}
				.weapondate span{
					font-size: 1em;
				}
				.up span{
					line-height: 25px;
				}
				.R4 span{
					line-height: 70px;
				}
				.R5 span{
					line-height: 70px;
				}
			}
		</style>
	</head>
	<body>
		<div id="bg"></div>
		<div id="topic">
			<div id="topcenter">
				<a href="../index.html" id="backhome" class="home hold">
					<span>主页</span>
				</a>
				<div class="list" onclick="openlist()"></div>
				<span></span>
			</div>
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
		<div class="logo" id="logo">
			<a>管理员登录</a>
		</div>
		<form id="userlogo">
			<span>输入管理员密码</span><br />
			<input type="password" id="password" name="password" />
			<a id="ok" onclick="submit2()"></a>
			<a id="close"></a>
		</form>
		<div id="center">
			<span style="display: block;width: 100%;text-align: center;font-size: 1.4em;color: #4F4F4F;">测试用武器数据-国际服最高ATK</span>
			<ul id="element_wea">
				<li onclick="ele(0)"><img src="../img/Element/icon_unattributed.png"/></li>
				<li onclick="ele(1)"><img src="../img/Element/icon_wind.png"/></li>
				<li onclick="ele(2)"><img src="../img/Element/icon_water.png"/></li>
				<li onclick="ele(3)"><img src="../img/Element/icon_fire.png"/></li>
				<li onclick="ele(4)"><img src="../img/Element/icon_earth.png"/></li>
				<li onclick="ele(5)"><img src="../img/Element/icon_light.png"/></li>
				<li onclick="ele(6)"><img src="../img/Element/icon_dark.png"/></li>
			</ul>
			<input type="hidden" id='user' value="" />
			<?php
			$con = mysqli_connect("localhost:3306", "root", "123456", "pictrebook");
			if (!$con) {
				die('Could not connect: ' . mysqli_error());
			}
			mysqli_select_db($con, "pictrebook");
			$find = "select * from weaponpa where element=1  order by weapon";
			if (!$result = mysqli_query($con, $find)) {
				die('Could not connect:' . mysqli_error($con));
			}
			
			for($k=1;$k<8;$k++){
				$find = "select * from weaponpa where element=".$k."  order by weapon";
				if (!$result = mysqli_query($con, $find)) {
					die('Could not connect:' . mysqli_error($con));
				}
				echo"<ul class='weapondate'>";
				$i=0;
				while($row = mysqli_fetch_array($result)){
				$i++;
				if($i>6&&$i<8)$i++;
				echo "<li class='un'>";
				echo "<div class='up'>";
				echo 	"<img src='../img/weapon/icon_job_".$i.".png'/>";
				echo	"<span>".$row['weaponname']."</span>";
				echo "</div>";
				echo "<p value=".$row['ATKR4']."></p>";
				echo "<p value=".$row['ATKR5']."></p>";
				echo "<div class='R4 R4".$k."'><span>".$row['ATKR4']."</span></div>";
				echo "<div class='R5 R5".$k."'><span>".$row['ATKR5']."</span></div>";
				echo "<form class='weaponform'>";
				echo	"<input type='hidden' name='id' value='".$row['id']."'/>";
				echo 	"武器名称:<input type='text' name='weaponname' value='".$row['weaponname']."' />";
				echo 	"R4ATK:<input type='text' name='R4' value='".$row['ATKR4']."' />";
				echo 	"R5ATK:<input type='text' name='R5' value='".$row['ATKR5']."' />";
				echo 	"<div class='submit'>确认</div>";
				echo 	"<div class='closeweapon'>取消</div>";
				echo "</form></li>";
				}
				echo "</ul>";
			}
				
			?>
		</div>
		<div id="links">
		<a href="../index.html">
			<div id="back">
			返回首页
			</div>
		</a>
		</div>
	</body>
	<botjs>
	</botjs>
	<script type="text/javascript" src="weapontiao.js" ></script>
	<script>
		if(MiniSite.Browser.ie){
            MiniSite.JsLoader.load("../JSON/indexJSON.js",function(){
            }); 
            MiniSite.JsLoader.load("../js/list.js",function(){
            });
            MiniSite.JsLoader.load("../js/index.js",function(){
            });
       }else{
            MiniSite.JsLoader.load("../JSON/indexJSON.js",function(){
            });
            MiniSite.JsLoader.load("../js/list.js",function(){
            });
            MiniSite.JsLoader.load("../js/index.js",function(){
            });
        }
       
	</script>
</html>
