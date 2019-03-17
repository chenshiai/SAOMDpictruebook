var list = document.getElementsByClassName("list");
var listnum = 0;
var scroll = 0;
var leftlist = document.getElementById("leftlist");
var bg = document.getElementById("bg");

function openlist() {
	leftlist.className = leftlist.className == "lefthidden"? "leftlook" : "lefthidden";
	if(scroll!=0){
		bg.style.display = "none";
		scroll=0;
	}else{
		
		bg.style.display = "block";
		scroll=1;
	}
}