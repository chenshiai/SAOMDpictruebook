var logo = document.getElementById("logo");
var userlogo = document.getElementById("userlogo");
var close = document.getElementById("close");
logo.onclick = function() {
	userlogo.style.display = "block";
	bg.style.display = "block";
}
close.onclick = function() {
	userlogo.style.display = "none";
	bg.style.display = "none";
}

var sel = document.getElementsByClassName("select");
var Elespan1 = sel[0].getElementsByTagName("span");
var Elespan2 = sel[1].getElementsByTagName("span");
var Elespan3 = sel[2].getElementsByTagName("span");
var Elespan4 = sel[3].getElementsByTagName("span");
var Elespan5 = sel[4].getElementsByTagName("span");
var sEle = document.getElementById("sElement");
document.body.addEventListener('touchstart', function() {});

var center = document.getElementById("center");
var bg = document.getElementById("bg");
var testtxt = document.getElementById("testtxt");
var question = document.getElementById("question");
var notice = document.getElementById("notice");
var notice1 = document.getElementById("notice1");
var a = 0;
var b = 0;
testtxt.onclick = function() {
	if(a == 1) {
		notice.style.width = 0 + "px";
		a = 0;
	} else {
		notice.style.width = 675 + "px";
		a = 1;
	}

}

question.onclick = function() {
	if(b == 1) {
		notice1.style.width = 0 + "px";
		b = 0;
	} else {
		notice1.style.width = 675 + "px";
		b = 1;
	}

}

var newroule = document.getElementsByClassName("roule");
var jizhun = document.getElementById("jizhun");
for(var i = 0; i < newroule.length; i++) {
	newroule[i].onclick = function() {
		var big = document.getElementsByClassName("gradual1");
		jizhun.className = big[0].className;
		big[0].className = this.className;
		this.className = jizhun.className;
		jizhun.className = "";
	}
}

var Ele_Ordinal = 0;
var Wea_Ordinal = 0;
var Sex_Ordinal = 0;
var Rar_Ordinal = 0;
var Sp_Ordinal = 0;
var Rou_Ordinal = "";
var Ele_c = 0;
var Wea_c = 0;
var Sex_c = 0;
var Rar_c = 0;
var Rou_c = 0;

function SelectEle(id) {
	Ele_c = 1;
	switch(id) {
		case 1:
			{
				sEle.className = "gray";
				Elespan1[0].innerHTML = "無属性";
				break;
			}
		case 2:
			{
				sEle.className = "green";
				Elespan1[0].innerHTML = "風属性";
				break;
			}
		case 3:
			{
				sEle.className = "blue";
				Elespan1[0].innerHTML = "水属性";
				break;
			}
		case 4:
			{
				sEle.className = "red";
				Elespan1[0].innerHTML = "火属性";
				break;
			}
		case 5:
			{
				sEle.className = "yellowish";
				Elespan1[0].innerHTML = "土属性";
				break;
			}
		case 6:
			{
				sEle.className = "yellow";
				Elespan1[0].innerHTML = "聖属性";
				break;
			}
		case 7:
			{
				sEle.className = "purple";
				Elespan1[0].innerHTML = "闇属性";
				break;
			}
		default:
			{
				Elespan1[0].innerHTML = "選擇屬性";
				break;
			}
	}
	Ele_Ordinal = id;
}

function SelectWea(id) {
	Wea_c = 1;
	switch(id) {
		case 1:
			{
				Elespan2[0].innerHTML = "單手劍";
				break;
			}
		case 2:
			{
				Elespan2[0].innerHTML = "細劍";
				break;
			}
		case 3:
			{
				Elespan2[0].innerHTML = "短劍";
				break;
			}
		case 4:
			{
				Elespan2[0].innerHTML = "單手棍";
				break;
			}
		case 5:
			{
				Elespan2[0].innerHTML = "狙擊槍";
				break;
			}
		case 6:
			{
				Elespan2[0].innerHTML = "長矛";
				break;
			}
		case 7:
			{
				Elespan2[0].innerHTML = "劍盾";
				break;
			}
		case 8:
			{
				Elespan2[0].innerHTML = "自動槍";
				break;
			}
		case 9:
			{
				Elespan2[0].innerHTML = "雙劍";
				break;
			}
		case 10:
			{
				Elespan2[0].innerHTML = "弓箭";
				break;
			}
		case 11:
			{
				Elespan2[0].innerHTML = "法杖";
				break;
			}
		default:
			{
				Elespan2[0].innerHTML = "選擇武器";
				break;
			}
	}
	Wea_Ordinal = id;
}

function SelectSex(id) {
	Sex_c = 1;
	switch(id) {
		case 1:
			{
				Elespan3[0].innerHTML = "男性";
				break;
			}
		case 2:
			{
				Elespan3[0].innerHTML = "女性";
				break;
			}
		default:
			{
				Elespan3[0].innerHTML = "選擇性別";
				break;
			}
	}
	Sex_Ordinal = id;
}

function SelectRare(id) {
	Rar_c = 1;
	switch(id) {
		case 1:
			{
				Elespan4[0].innerHTML = "四星(4R)";
				break;
			}
		case 2:
			{
				Elespan4[0].innerHTML = "五星(5R)";
				break;
			}
		case 3:
			{
				Elespan4[0].innerHTML = "六星(6R)";
				break;
			}
		default:
			{
				Elespan4[0].innerHTML = "选择稀有度";
				break;
			}
	}
	Rar_Ordinal = id;
}

function SelectRoule(id) {
	Rou_c = 1;
	switch(id) {
		case 1:
			{
				Elespan5[0].innerHTML = "桐人";
				Rou_Ordinal = "kirito";
				break;
			}
		case 2:
			{
				Elespan5[0].innerHTML = "亚丝娜";
				Rou_Ordinal = "asuna";
				break;
			}
		case 3:
			{
				Elespan5[0].innerHTML = "莉法";
				Rou_Ordinal = "leafa";
				break;
			}
		case 4:
			{
				Elespan5[0].innerHTML = "西莉卡";
				Rou_Ordinal = "silica";
				break;
			}
		case 5:
			{
				Elespan5[0].innerHTML = "莉兹贝特";
				Rou_Ordinal = "lisbeth";
				break;
			}
		case 6:
			{
				Elespan5[0].innerHTML = "诗乃";
				Rou_Ordinal = "sinon";
				break;
			}
		case 7:
			{
				Elespan5[0].innerHTML = "有纪";
				Rou_Ordinal = "yuuki";
				break;
			}
		case 8:
			{
				Elespan5[0].innerHTML = "克莱因";
				Rou_Ordinal = "klein";
				break;
			}
		case 9:
			{
				Elespan5[0].innerHTML = "艾基尔";
				Rou_Ordinal = "agil";
				break;
			}
		case 10:
			{
				Elespan5[0].innerHTML = "斯朵蕾雅";
				Rou_Ordinal = "strea";
				break;
			}
		case 11:
			{
				Elespan5[0].innerHTML = "菲莉亚";
				Rou_Ordinal = "philia";
				break;
			}
		case 12:
			{
				Elespan5[0].innerHTML = "伶茵";
				Rou_Ordinal = "rain";
				break;
			}
		case 13:
			{
				Elespan5[0].innerHTML = "赛玟";
				Rou_Ordinal = "seven";
				break;
			}
		case 14:
			{
				Elespan5[0].innerHTML = "幸";
				Rou_Ordinal = "sachi";
				break;
			}
		case 15:
			{
				Elespan5[0].innerHTML = "亚鲁戈";
				Rou_Ordinal = "argo";
				break;
			}
		case 16:
			{
				Elespan5[0].innerHTML = "希兹克利夫";
				Rou_Ordinal = "heathcliff";
				break;
			}
		case 17:
			{
				Elespan5[0].innerHTML = "结衣";
				Rou_Ordinal = "yui";
				break;
			}
		case 18:
			{
				Elespan5[0].innerHTML = "普蕾蜜亚";
				Rou_Ordinal = "premiere";
				break;
			}
		case 19:
			{
				Elespan5[0].innerHTML = "YUNA";
				Rou_Ordinal = "yuna";
				break;
			}
		case 20:
			{
				Elespan5[0].innerHTML = "尤吉欧";
				Rou_Ordinal = "eugeo";
				break;
			}
		case 21:
			{
				Elespan5[0].innerHTML = "爱丽丝";
				Rou_Ordinal = "alice";
				break;
			}
		case 22:
			{
				Elespan5[0].innerHTML = "莲";
				Rou_Ordinal = "LLENN";
				break;
			}
		case 23:
			{
				Elespan5[0].innerHTML = "林鵙鹟";
				Rou_Ordinal = "pitohui";
				break;
			}
		case 24:
			{
				Elespan5[0].innerHTML = "不可次郎";
				Rou_Ordinal = "buke";
				break;
			}
		case 25:
			{
				Elespan5[0].innerHTML = "瑛二";
				Rou_Ordinal = "eiji";
				break;
			}
		case 26:
			{
				Elespan5[0].innerHTML = "其他";
				Rou_Ordinal = "other";
				break;
			}
		default:
			{
				Elespan5[0].innerHTML = "角色名称";
				Rou_Ordinal = "";
				break;
			}
	}

}

var xmlHttp;

function stateChanged() {
	if(xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {
		document.getElementById("portrait").innerHTML = xmlHttp.responseText;
	} else {
		document.getElementById("portrait").innerHTML = "<div id='order'>─=≡Σ((( つ•̀ω•́)つ<br>努力搜索中......</div>";
	}
}

function start() {
	if(xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {
		document.getElementById("start").innerHTML = xmlHttp.responseText;
	}
}

function GetXmlHttpObject() {
	var xmlHttp = null;
	try {
		// Firefox, Opera 8.0+, Safari
		xmlHttp = new XMLHttpRequest();
	} catch(e) {
		//Internet Explorer
		try {
			xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
		} catch(e) {
			xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
	}
	return xmlHttp;
}
xmlHttp = GetXmlHttpObject();

function cle() {
	Ele_Ordinal = 0;
	Wea_Ordinal = 0;
	Sex_Ordinal = 0;
	Rar_Ordinal = 0;
	Rou_Ordinal = "";
	Ele_c = 0;
	Wea_c = 0;
	Sex_c = 0;
	Rar_c = 0;
	Rou_c = 0;
	sEle.className = "sEle";
	Elespan1[0].innerHTML = "选择属性";
	Elespan2[0].innerHTML = "选择武器";
	Elespan3[0].innerHTML = "选择性別";
	Elespan4[0].innerHTML = "选择稀有度";
	Elespan5[0].innerHTML = "角色名称";
}

function php() {
	var urls = "PHP/index.php";
	var tol = Ele_c + Wea_c + Sex_c + Rar_c + Rou_c;
	urls = urls + "?ord=" + Ele_Ordinal + "/" + Wea_Ordinal + "/" + Sex_Ordinal + "/" + Rar_Ordinal + "/" + Rou_Ordinal + "/" + tol;
	xmlHttp.onreadystatechange = stateChanged;
	xmlHttp.open("GET", urls, true);
	xmlHttp.send(null);
}

//var unfinished = document.getElementById("find");
//unfinished.onclick = function() {
//	var urls = "PHP/unfinished.php";
//	xmlHttp.onreadystatechange = stateChanged;
//	xmlHttp.open("GET", urls, true);
//	xmlHttp.send(null);
//}

function submit() {
	var form = document.getElementsByTagName("form");
	form[0].submit();
}

var kiripa = document.getElementById("kiripa");
var globale = document.getElementById("globalnotice");
var kipa = 1;
globale.onclick = function() {
	//	if(window.screen.width < 780) {
	if(kipa == 1) {

		kiripa.style.background = "#4f4f4f";
		kipa = 0;
		document.getElementById("kiripaif").src = "http://saomd.kiripa.com";
	}
	if(kiripa.className == "lookglo") {
		kiripa.style.background = "none";
		kiripa.className = "closeglo";
		kiripa.height = 0;
	} else {
		kiripa.className = "lookglo";
	}
	//	}else{
	//		window.open("http://saomd.kiripa.com","title","height=700,width=405",false);
	//
	//	}
}

function uis() {
	var left = center.offsetLeft;
	try {
		if(left <= 120) {

			globale.style.right = 7 + "px";
			testtxt.style.left = 7 + "px";
			question.style.left = 7 + "px";
		} else {
			globale.style.right = left - 120 + "px";
			testtxt.style.left = left - 120 + "px";
			question.style.left = left - 120 + "px";
		}
	} catch(ex) {}
	var bodyleft = document.body.clientWidth / 2 - 175;

	userlogo.style.left = bodyleft + "px";
}
window.onresize = function() {
	uis();
}

window.onload = function(str) {
	uis();
	if(xmlHttp == null) {
		alert("browser");
		return;
	}
	var globals = document.getElementById("global");
	globals.className = "hiddenglobal";
	globals.addEventListener('animationend', function() {
		globals.style.display = "none";
	});
	var bg2 = document.getElementById("bg2");
	if(window.screen.width > 780) {
		bg2.style.width = window.screen.width + "px";
	}

	var bodyleft = document.body.clientWidth / 2 - 175;
	userlogo.style.left = bodyleft + "px";

	var u = navigator.userAgent;
	if(u.indexOf('Android') > -1 || u.indexOf('Linux') > -1) { //安卓手机
	} else if(u.indexOf('iPhone') > -1) { //苹果手机
		kiripa.style.overflowY = "scroll";
	} else if(u.indexOf('Windows Phone') > -1) { //winphone手机
	}

}

function test(a) {
	alert(a);
}