<style>
	*{
		padding: 0;
		margin: 0;
	}
	ul{
		width: 100%;
		list-style: none;
	}
	li{
		width: 100%;
		margin-bottom: 10px;
	}
.re1 {
	display: block;
	width: 110px;
	height: 35px;
	color: #FFFFFF;
	font-size: 1.2em;
	font-weight: bold;
	text-align: center;
	line-height: 35px;
	background: #4F4F4F;
	border-radius: 6px;
	margin-bottom: 10px;
}

.reply {
	width: 40%;
	margin-left: 10%;
	float: left;
	overflow: hidden;
	position: relative;
}
.otherreply{
	width: 50%;
	float: left;
}
#retext{

	display: block;
	overflow: hidden;
	resize: none;
	outline: none;
	width: 80%;
	height: 200px;
	font-size: 1em;
	color: #FFFFFF;
	background-color: #606060;
	font-family: "微软雅黑";
	padding: 10px 5px 0 5px;
}
#username{
	padding: 0 5px 0 5px;
	display: block;
	border: 0px;
	overflow: hidden;
	width: 80%;
	height: 30px;
	font-size: 1em;
	outline:none;
	background-color: #606060;
	border-radius: 3px;
	color: #FFFFFF;
	margin-bottom: 30px;
}
p{
	font-weight:800 ;
	color: #4F4F4F;
	font-size: 1em;
	text-align: center;
	padding: 0 30px 10px 30px;	
}
.name{
	display: block;
	height: 30px;
	font-size:1em ;
	font-weight: bold;
	color: #ed6f2a;
}
.time{
	color: #606060;
	font-size: 10px;
}
#sub{
	width: 100px;
	height: 40px;
	background: #FFFFFF;
	text-align: center;
	line-height: 40px;
	font-size: 1em;
	border-radius: 10px;
	color: #4F4F4F;
	cursor:pointer;
	float: right;
	margin-top: 10px;
	margin-right: 20px;
	display: block;
}
#sub:active{
	background: #22F4FF;
	color: #FFFFFF;
}
#surplus{
	position: absolute;
	bottom: 60px;
	right: 100px;
	color: #FFFFFF;
}
@media (max-width: 780px) {
	.reply {
		width: 90%;
		margin: 0 auto;
		float: none;
	}
	.re1 {
		margin-bottom: 5px;
		width: 100px;
		font-size: 1em;
	}
	#username{
		margin-bottom: 10px;
		width: 100%;
	}
	#retext{
		height: 150px;
		resize: none;
		width: 100%;
	}
	ul{
		width: 100%;
	}
	.otherreply{
		width: 90%;
		margin: 0 auto;
		float: none;
	}
	p{
		font-size: 1em;
		text-align: center;
		padding: 0 10px 10px 10px;	
	}
	#btn{
		font-size: 15px;
	}
	#surplus{
		right: 20px;
	}
}

</style>
<?php
	$roule = $_GET['roule'];
	$con = mysqli_connect("localhost:3306", "root", "123456", "pictrebook");
	if (!$con) {
		die('Could not connect: ' . mysqli_error());
	}
	mysqli_select_db($con, "pictrebook");
	$find = "select * from reply where roule=" . $roule;
	if (!$result = mysqli_query($con, $find)) {
		die('Could not connect:' . mysqli_error($con));
	}
	$row = mysqli_fetch_array($result);
	if($row['id']==null){
		$insert = "insert into reply (roule) values('" . $roule . "')";
		if (!mysqli_query($con, $insert)) {
			die('Could not connect:' . mysqli_error($con));
		}
	}
	?>
<div class="reply">
	<span class="re1">评论留言</span>
	<form>
		<input type="text" name="roule" style="display: none;" value="<?php echo $roule;?>"/>
		<input type="text" id="username" name="username" value=""/>
		<textarea  id="retext" name="retext"></textarea>
		<span id="surplus">200/200</span>
		<div id="sub">
			发表评论
		</div>
	</form>
	<div id="btn">
		<p>#第一个框输入你的昵称(选填)<br />#第二个框输入评论内容(必填)</p>
	</div>
</div>
<div class="otherreply">
<?php
$find = "select * from reply where roule=" . $roule . " order by id desc";
if (!$result = mysqli_query($con, $find)) {
	die('Could not connect:' . mysqli_error($con));
}
echo "<ul id='uili'>";
echo "<li id='theFirst'>";
echo "</li>";
while ($row = mysqli_fetch_array($result)) {
	echo "<li>";
	echo "<span class='name'>" . $row['user'] . "</span>";
	echo "<p>" . $row['centent'] . "</p>";
	echo "<span class='time'>发表时间：" . $row['time'] . "</span>";
	echo "<hr>";
	echo "</li>";
}
echo "</ul>";
mysqli_close($con);
?>
</div>
<script type="text/javascript">
var uili = document.getElementById('uili');
var sub = document.getElementById("sub");
var lastChild = uili.lastElementChild ? uili.lastElementChild : uili.lastChild;
var retextarea = document.getElementsByName("retext");
uili.removeChild(lastChild);

function txtCount(el) {
	var val = el.value;
	var eLen = val.length;
	return eLen;
}

retextarea[0].addEventListener('input', function() {
	var len = 200-txtCount(this); //   调用函数
	document.getElementById("surplus").innerHTML = len + "/200";
});

retextarea[0].addEventListener('propertychange', function() { //兼容IE
	var len = 200-txtCount(this); //   调用函数
	document.getElementById("surplus").innerHTML = len + "/200";
});

var xmlHttp;
if(window.XMLHttpRequest) {
	xmlHttp = new XMLHttpRequest();
} else if(window.ActiveXObject) {
	try {
		xmlHttp = new ActiveXObject("Msxm12.XMLHTTP");
	}
	catch(e){
		try{
			xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
		}catch(e){}
	}
}
function subreplystate() {
	if(xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {
		alert("你的评论我们已经收到咯~")
	}
}
sub.onclick = function(){

	var roule = document.getElementsByName("roule")[0].value;
	var username = document.getElementsByName("username")[0].value;
	var retext = document.getElementsByName("retext")[0].value;
	if(retext==""){
		alert("亲，请输入内容再发表喔~！");
	}else if(retext.length<200){
		retextarea[0].value ="";
		this.style.display = "none";
		if(username==""){
			username="Anonymous";
		}
		var first = document.getElementById("theFirst");
		first.innerHTML = "<span class='name'>" + username + "</span><p>" + retext + "</p><span class='time'>服务器接收中</span>";
		xmlHttp.onreadystatechange = subreplystate;
		xmlHttp.open("POST","subreply.php",true);
		xmlHttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
		xmlHttp.send("roule="+roule+"&username="+username+"&retext="+retext);
		location.reload();
	}else{
		alert("额，字数超过了喔~");
	}
	
}
</script>