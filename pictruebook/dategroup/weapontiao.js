var li = document.getElementsByClassName('un');
for(var i = 0; i < li.length; i++) {
	var size = 10;
	var rare = li[i].getElementsByTagName('p');
	var R4 = li[i].getElementsByClassName('R4');
	var R5 = li[i].getElementsByClassName('R5');
	size = (rare[0].getAttribute('value')-1000) / 10;
	if(size < 10) {
		size = 100;
	}
	R4[0].style.width = size + "%";
	size = (rare[1].getAttribute('value')) / 23;
	if(size < 10) {
		size = 100;
	}
	R5[0].style.width = size + "%";
}
var element_wea = document.getElementById('element_wea');
var eleli = element_wea.getElementsByTagName('li');
var weapondate = document.getElementsByClassName('weapondate');
window.onload = function() {
	weapondate[0].style.display = "block";
	username=getCookie('dategroup')
	if(username!=null && username!=""){
		document.getElementById('user').value = "dateClerk";
	}
}

function ele(num) {
	for(var i = 0; i < eleli.length; i++) {
		weapondate[i].style.display = "none";
	}
	weapondate[num].style.display = "block";
}
var closeweapon = document.getElementsByClassName('closeweapon');
var up = document.getElementsByClassName('up');
for(var i = 0; i < up.length; i++) {
	up[i].onclick = function() {
		var weaponform = this.parentNode.getElementsByClassName('weaponform');
		if(document.getElementById('user').value != "dateClerk") {
			alert("没有修改的权限喔~");
		} else {
			weaponform[0].style.display = "block";
		}
	}
}

for(var i = 0; i < closeweapon.length; i++) {
	closeweapon[i].onclick = function() {
		var form = this.parentNode;
		form.style.display = "none";
	}
}
var xmlHttp;
if(window.XMLHttpRequest) {
	xmlHttp = new XMLHttpRequest();
} else if(window.ActiveXObject) {
	try {
		xmlHttp = new ActiveXObject("Msxm12.XMLHTTP");
	} catch(e) {
		try {
			xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
		} catch(e) {}
	}
}

function getCookie(c_name)
{
if (document.cookie.length>0)
  {
  c_start=document.cookie.indexOf(c_name + "=")
  if (c_start!=-1)
    { 
    c_start=c_start + c_name.length+1 
    c_end=document.cookie.indexOf(";",c_start)
    if (c_end==-1) c_end=document.cookie.length
    return unescape(document.cookie.substring(c_start,c_end))
    } 
  }
return ""
}

function setCookie(c_name,value,expiredays)
{
var exdate=new Date()
exdate.setDate(exdate.getDate()+expiredays)
document.cookie=c_name+ "=" +escape(value)+
((expiredays==null) ? "" : ";expires="+exdate.toGMTString())
}


function subreplystate() {
	if(xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {
		alert("修改成功~！")
	}
}

function subreplyst() {
	if(xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {
		var user = document.getElementById('user');
		if(xmlHttp.responseText!='fail'){
			setCookie('dategroup',xmlHttp.responseText,7);
			user.value = "dateClerk";
		}else{
			alert("此密码没有授权。");
		}
		
		userlogo.style.display = "none";
		bg.style.display = "none";
	}
}
var Submit = document.getElementsByClassName('submit');
for(var i=0;i<Submit.length;i++){
	Submit[i].onclick = function(){
		var form = this.parentNode;
		form.style.display = "none";
		var id=form.getElementsByTagName('input')[0].value;
		var weaponname=form.getElementsByTagName('input')[1].value;
		var R4ATK=form.getElementsByTagName('input')[2].value;
		var R5ATK=form.getElementsByTagName('input')[3].value;
		weaponname=weaponname.replace(/\+/g,'%2B');
　　		if (!isNaN(R4ATK)&&!isNaN(R5ATK)) { 
			xmlHttp.onreadystatechange = subreplystate;
			xmlHttp.open("POST","weapondate.php",true);
			xmlHttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
			xmlHttp.send("id="+id+"&weaponname="+weaponname+"&R4ATK="+R4ATK+"&R5ATK="+R5ATK);
　		}else{
　　　		　alert('请输入正整数');
		}
		
	}
}

function submit2() {
	var pass = document.getElementById("password").value;
	xmlHttp.onreadystatechange = subreplyst;
	xmlHttp.open("POST","logo.php",true);
	xmlHttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
	xmlHttp.send("password="+pass);
}
