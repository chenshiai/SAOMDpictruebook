var testtxth = {
	"txth1": "欢迎访问本站！这是一个兴趣使然的站点",
	"txth2": "[更新]再次点击可以关闭",
	"txth3": "——开放人物名称筛选。数据组页面设计ing",//这里是更新内容简述，修改后记得修改【更新】时间
	"txth4": "",
	"topic": "SAOMD人物图鉴",//这里是网站顶端标题
	"bottomtipch": "<a style='text-decoration: none;color:#4f4f4f' href='http://www.miitbeian.gov.cn'>赣ICP备18011747号 </a>Copyright © 丨ConGreat"//这里是网站底端信息
}
var time = {
	"li1":"2018-10-02",//这里是【更新】的更新时间
	"li2":"2018-09-13",//这里是【通常】的更新时间
	"li3":"2018-09-16"//这里是【其他】的更新时间
}
var testtxt = {
	"txt1": "<h2>"+testtxth.txth1+"</h2>",
	"txt2": "<h4>["+time.li1+"]"+testtxth.txth2+"</h4>",
	"txt3": "<h4>"+testtxth.txth3+"</h4>",
	"txt4": "",
	"bottomtipc": testtxth.bottomtipch
}

var leftlist = {
	"li1":"<br><h5>"+testtxth.txth3+"</h5>",
	"li2":"<br><h5>——这里并不是游戏官方网站，是由玩家自主搭建，所以加载速度比较慢。会降低图片质量来提高加载速度。<br>请理解( • ̀ω•́ )✧</h5>",
	//这里是【通常】内容的描述，修改后记得修改【通常】时间
	
	"li3":"<br><h5>——本站暂不完全支持IE浏览器，iOS端建议使用Safari浏览器。</h5>"
	//这里是【其他】内容的描述，修改后记得修改【其他】时间
}

//下面是首页照片墙的六张图片url，建议从公告中获取750*750分辨率的无底立绘
var newroule = {
	"img": [
		"<img src='img/newrolue/011.png'/>",
		"<img src='img/newrolue/015.png'/>",
		"<img src='img/newrolue/016.png'/>",
		"<img src='img/newrolue/017.png'/>",
		"<img src='img/newrolue/009.png'/>",
		"<img src='img/newrolue/010.png'/>"
	]
}
if(document.getElementById("topcenter")!=undefined){
	var topcenter = document.getElementById("topcenter");
	try{
		topcenter.getElementsByTagName("span")[1].innerHTML = testtxth.topic;		
	}catch(e){}

}
if(document.getElementsByClassName("txt") != undefined) {
	var noticetxt = document.getElementsByClassName("txt");
	try {
		noticetxt[0].innerHTML = testtxt.txt1;
		noticetxt[1].innerHTML = testtxt.txt2;
		noticetxt[2].innerHTML = testtxt.txt3;
		noticetxt[3].innerHTML = testtxt.txt4;
	} catch(e) {}
}
if(document.getElementById("leftlistui")!=undefined){
	var leftlistui = document.getElementById("leftlistui");
	var leftli = leftlistui.getElementsByTagName("li");
	try{
		leftli[0].getElementsByTagName("span")[0].innerHTML = leftlist.li1;
		leftli[1].getElementsByTagName("span")[0].innerHTML = leftlist.li2;
		leftli[2].getElementsByTagName("span")[0].innerHTML = leftlist.li3;
	}catch(e){}
}
if(document.getElementsByClassName("leftListClass")!=undefined){
	var ListClass = document.getElementsByClassName("leftListClass");
	try{
		ListClass[0].getElementsByTagName("time")[0].innerHTML = time.li1;
		ListClass[1].getElementsByTagName("time")[0].innerHTML = time.li2;
		ListClass[2].getElementsByTagName("time")[0].innerHTML = time.li3;
	}catch(e){}
}
if(document.getElementById("bottomtipc") != undefined) {
	var bottomtipc = document.getElementById("bottomtipc");
	try {
		bottomtipc.innerHTML = testtxt.bottomtipc;
	} catch(e) {}

}
if(document.getElementsByClassName("roule") != undefined) {
	var roule = document.getElementsByClassName("roule");
	try{
		for(var i = 0; i < roule.length; i++) {
			roule[i].innerHTML = newroule.img[i];
		}
	}catch(e){}
}