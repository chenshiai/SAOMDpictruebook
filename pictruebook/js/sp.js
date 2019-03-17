var sel = document.getElementsByClassName("select");
var Elespan1 = sel[0].getElementsByTagName("span");
var sEle = document.getElementById("sElement");
var cutin = document.getElementById("cutin");
var nowbuff = document.getElementById("nowbuff");
document.body.addEventListener('touchstart', function() {});

var center = document.getElementById("center");

var Ele_Ordinal = 0;
var Wea_Ordinal = 0;
var Sex_Ordinal = 0;
var Rar_Ordinal = 0;
var Sp_Ordinal = 0;

function SelectSP(id) {
	switch(id) {
		case 1:
			{
				nowbuff.innerHTML = "攻击力提升";
				break;
			}
		case 2:
			{
				nowbuff.innerHTML = "会心提升";
				break;
			}
		case 3:
			{
				nowbuff.innerHTML = "暴伤提升";
				break;
			}
		case 4:
			{
				nowbuff.innerHTML = "防御值提升";
				break;
			}
		case 5:
			{
				nowbuff.innerHTML = "速度提升";
				break;
			}
		case 6:
			{
				nowbuff.innerHTML = "攻击力提升Zone";
				break;
			}
		case 7:
			{
				nowbuff.innerHTML = "HP回复";
				break;
			}
		case 8:
			{
				nowbuff.innerHTML = "MP回复";
				break;
			}
		case 9:
			{
				nowbuff.innerHTML = "防御力|攻击力下降";
				break;
			}
		case 10:
			{
				nowbuff.innerHTML = "霸体";
				break;
			}
		case 11:
			{
				nowbuff.innerHTML = "眩晕";
				break;
			}
		case 12:
			{
				nowbuff.innerHTML = "陷阱";
				break;
			}
		case 13:
			{
				nowbuff.innerHTML = "自动反弹";
				break;
			}
		case 14:
			{
				nowbuff.innerHTML = "切换SS3";
				break;
			}
		case 15:
			{
				nowbuff.innerHTML = "无效化防壁";
				break;
			}
		case 16:
			{
				nowbuff.innerHTML = "技能必定暴击";
				break;
			}
		default:
			{
				nowbuff.innerHTML = "";
				break;
			}
	}
	Sp_Ordinal = id;
	php();
}

var xmlHttp;

function stateChanged() {
	if(xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {
		document.getElementById("spcenter").innerHTML = xmlHttp.responseText;
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

function php() {
	var urls = "PHP/index.php";
	urls = urls + "?ord=" + Ele_Ordinal + "/" + Wea_Ordinal + "/" + Sex_Ordinal + "/" + Rar_Ordinal + "/" + Sp_Ordinal;
	xmlHttp.onreadystatechange = stateChanged;
	xmlHttp.open("GET", urls, true);
	xmlHttp.send(null);
}
window.onload = function(str) {
	xmlHttp = GetXmlHttpObject();
	//	str = finduser();
	if(xmlHttp == null) {
		alert("browser");
		return;
	}
}

var selectbuff = document.getElementById("selectbuff");
var spleft = document.getElementById("spleft");
var buff = document.getElementById("buff");
selectbuff.onclick = function() {
	if(document.body.clientWidth <= 760) {
		spleft.style.display = "block";
		selectbuff.style.display = "none";
	}

}
buff.onclick = function() {
	if(document.body.clientWidth <= 760) {
		spleft.style.display = "none";
		selectbuff.style.display = "block";
	}
}