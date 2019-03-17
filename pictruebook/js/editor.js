var ss1name = document.getElementById("ss1name");
var ss2name = document.getElementById("ss2name");
var bs1name = document.getElementById("bs1name");
var bs2name = document.getElementById("bs2name");
var bs3name = document.getElementById("bs3name");
document.body.addEventListener('touchstart', function () { });
function goback(){
	history.back(-1);
	hp.style.width = 0;
	mp.style.width = 0;
	atk.style.width = 0;
	def.style.width = 0;
	cri.style.width = 0;
}

function update(){
	var up = document.getElementById("up");
	var upda = document.getElementById("update");
	if(upda.value==0){
		up.innerHTML = "可以进化";
		upda.value = 1;
	}else{
		up.innerHTML = "不可以进化";
		upda.value = 0;
	}
	
}

function ss1li(id){
	var x = "ss1li"+id.toString();
	var ssname = document.getElementById(x);
	ss1name.innerHTML = ssname.innerHTML;
	document.getElementById("ss1id").value = id;
}

function ss2li(id){
	var x = "ss2li"+id.toString();
	var ssname = document.getElementById(x);
	ss2name.innerHTML = ssname.innerHTML;
	document.getElementById("ss2id").value = id;
}

function bs1li(id){
	var x = "bs1li"+id.toString();
	var ssname = document.getElementById(x);
	bs1name.innerHTML = ssname.innerHTML;
	document.getElementById("bs1id").value = id;
}

function bs2li(id){
	var x = "bs2li"+id.toString();
	var ssname = document.getElementById(x);
	bs2name.innerHTML = ssname.innerHTML;
	document.getElementById("bs2id").value = id;
}

function bs3li(id){
	var x = "bs3li"+id.toString();
	var ssname = document.getElementById(x);
	bs3name.innerHTML = ssname.innerHTML;
	document.getElementById("bs3id").value = id;
}
var slotskill = document.getElementById("slotskill");
var slotid=slotskill.value;

var ssl = document.getElementById("ssl");
function delslot(id){
	slotid = slotskill.value;
	var x = "ssl"+id.toString();
	var child = document.getElementById(x);
	ssl.removeChild(child);
	slotid=slotid.replace(id+"/","");
	slotskill.value = slotid;
}

var moressl = document.getElementById("moressl");
function delslot1(id){
	slotid = slotskill.value;
	var x = "ssl"+id.toString();
	var child = document.getElementById(x);
	moressl.removeChild(child);
	slotid=slotid.replace(id+"/","");
	slotskill.value = slotid;
}

var xmlHttp;

function stateChanged() {
	if(xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {
		document.getElementById("slotlist").innerHTML = xmlHttp.responseText;
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

window.onload = function(str) {
	xmlHttp = GetXmlHttpObject();
	if(xmlHttp == null) {
		alert("browser");
		return;
	}
	var urls = "slotlist.php";
	xmlHttp.onreadystatechange = stateChanged;
	xmlHttp.open("GET", urls, true);
	xmlHttp.send(null);
}

var addslot = document.getElementById("addslot");
var slotlist = document.getElementById("slotlist");
var mask = document.getElementById("mask");

addslot.onclick = function(){
	slotlist.style.display = "block";
	mask.style.display = "block";
}
function xx(){
	slotlist.style.display = "none";
	mask.style.display = "none";
}


var xmlHttp1;
var id;

function stateChanged1() {
	if(xmlHttp1.readyState == 4 || xmlHttp1.readyState == "complete") {
		var li = document.createElement("li");
		li.id = "ssl"+id;
		li.innerHTML = xmlHttp1.responseText;
		document.getElementById("moressl").appendChild(li);
	}
}

function GetXmlHttp1Object() {
	var xmlHttp1 = null;
	try {
		// Firefox, Opera 8.0+, Safari
		xmlHttp1 = new XMLHttpRequest();
	} catch(e) {
		//Internet Explorer
		try {
			xmlHttp1 = new ActiveXObject("Msxml2.XMLHTTP");
		} catch(e) {
			xmlHttp1 = new ActiveXObject("Microsoft.XMLHTTP");
		}
	}
	return xmlHttp1;
}

function sslli(str) {
	xmlHttp1 = GetXmlHttp1Object();
	id=str;
	slotid=slotid.concat(id+"/");
	slotskill.value = slotid;
	if(xmlHttp1 == null) {
		alert("browser");
		return;
	}
	var urls = "moresslli.php?id="+str;
	xmlHttp1.onreadystatechange = stateChanged1;
	xmlHttp1.open("GET", urls, true);
	xmlHttp1.send(null);
	slotlist.style.display = "none";
	mask.style.display = "none";
}

function submit(){
	var form = document.getElementById("userlogo");
	form[0].submit();
}
