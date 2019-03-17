var hp = document.getElementById("HP");
var mp = document.getElementById("MP");
var atk = document.getElementById("ATK");
var def = document.getElementById("DEF");
var cri = document.getElementById("CRI");

var hpnum = document.getElementById("HPnum");
var mpnum = document.getElementById("MPnum");
var atknum = document.getElementById("ATKnum");
var defnum = document.getElementById("DEFnum");
var crinum = document.getElementById("CRInum");

var bg = document.getElementById("bg");
var size = 0;
document.body.addEventListener('touchstart', function() {});

var logo = document.getElementById("button");
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

function submit() {
	var form = document.getElementsByTagName("form");
	form[0].submit();
}

function goback() {
	history.back(-1);
	hp.style.width = 0;
	mp.style.width = 0;
	atk.style.width = 0;
	def.style.width = 0;
	cri.style.width = 0;
}

var xmlHttp;
var pictrescroll = document.getElementById("pictrescroll");
var pictre_L = document.getElementById("pictre_L");
var imgl = document.getElementsByClassName("imgl");
var firstload = 0;
function stateChanged() {
	if(xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {
		firstload=1;
		pictrescroll.innerHTML = xmlHttp.responseText;
		if(imgl.length == 1) {
			left.style.display = "none";
			right.style.display = "none";
		}
		var i = 0;
		for(; i < imgl.length; i++) {
			imgl[i].style.width = 100 + "%";
			if(i > 0) {
				imgl[i].style.display = "none";
			}
		}
	}
}
var imgnum = 0;
var left = document.getElementById("leftscroll");
left.onclick = function() {
	var i = imgnum;
	imgnum--;
	if(imgnum < 0) {
		imgnum = imgl.length - 1;
		imgl[i].style.display = "none";
		imgl[imgnum].style.display = "block";
	} else {
		imgl[i].style.display = "none";
		imgl[imgnum].style.display = "block";
	}
}
var right = document.getElementById("rightscroll");
right.onclick = function() {
	var i = imgnum;
	imgnum++;
	if(imgnum > imgl.length - 1) {
		imgnum = 0;
		imgl[i].style.display = "none";
		imgl[imgnum].style.display = "block";
	} else {
		imgl[i].style.display = "none";
		imgl[imgnum].style.display = "block";
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

var download = document.getElementsByClassName("download");
download[0].onclick = function() {
	var role = pictre_L.getAttribute("value");
	var urls = "download.php?id=" + role + "&num=" + imgnum;
	window.location.href = urls;
}


pictrescroll.onclick = function() {
	if(firstload == 0) {
		var role = pictre_L.getAttribute("value");
		xmlHttp = GetXmlHttpObject();
		if(xmlHttp == null) {
			alert("浏览器不支持!!!∑(ﾟДﾟノ)ノ");
			return;
		}
		var urls = "pictreL.php?role=" + role;
		xmlHttp.onreadystatechange = stateChanged;
		xmlHttp.open("GET", urls, true);
		xmlHttp.send(null);
	}

}

function setIframeHeight(iframe) {
	if(iframe) {
		var iframeWin = iframe.contentWindow || iframe.contentDocument.parentWindow;
		if(iframeWin.document.body) {
			iframe.height = iframeWin.document.documentElement.scrollHeight || iframeWin.document.body.scrollHeight;
		}
	}
};
window.onload = function() {

	size = hp.getAttribute("value") / 210;
	hp.style.width = size + "%";
	hpnum.style.left = size-10 + "%";
	
	size = mp.getAttribute("value") / 4;
	mp.style.width = size + "%";
	mpnum.style.left = size-5.5 + "%";
	
	size = atk.getAttribute("value") / 55;
	atk.style.width = size + "%";
	atknum.style.left = size-8 + "%";

	size = def.getAttribute("value") / 40;
	def.style.width = size + "%";
	defnum.style.left = size-8 + "%";

	size = cri.getAttribute("value") / 50;
	cri.style.width = size + "%";
	crinum.style.left = size-8 + "%";
	
	if(window.screen.width < 780) {
		hpnum.style.left =20+"%";
		mpnum.style.left = 20+"%";
		atknum.style.left = 20+"%";
		defnum.style.left = 20+"%";
		crinum.style.left = 20+"%";
		for(var i = 0; i < imgl.length; i++) {
			imgl[i].style.width = pictre_L.offsetWidth + "px";
		}
		pictrescroll.width = pictre_L.offsetWidth * 5 + "px";
	}
	var iframe = document.getElementById('external-frame');
	setIframeHeight(iframe);
	if(iframe.attachEvent) {
		iframe.attachEvent("onreadystatechange", function() {
			//此事件在内容没有被载入时候也会被触发，所以我们要判断状态
			//有时候会比较怪异 readyState状态会跳过 complete 所以我们loaded状态也要判断
			if(iframe.readyState === "complete" || iframe.readyState == "loaded") {
				//代码能执行到这里说明已经载入成功完毕了
				//要清除掉事件
				setIframeHeight(iframe);
				iframe.detachEvent("onreadystatechange", arguments.callee);
				//这里是回调函数
			}
		});
	} else {
		iframe.addEventListener("load", function() {
			//代码能执行到这里说明已经载入成功完毕了
			setIframeHeight(iframe);
			this.removeEventListener("load", arguments.call, false);
			//这里是回调函数
		}, false);
	}
}