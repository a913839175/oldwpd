
var dl;
var tx;
var pwd;
var logoObj;
var footerObj;
var mainObj;
function addLoadEvent(func){
			var oldonload=window.onload;
			if (typeof window.onload!='function') {
				window.onload=func;
			}else{
				window.onload=function(){
					oldonload();
					func();
				}
			};
		}



function init(){
	// alert("11111");
	dl=document.getElementById("dl");
	tx = document.getElementById("tx");
	pwd = document.getElementById("pwd");
	logoObj=document.getElementById("logo");
	footerObj=document.getElementById("footer");
	mainObj=document.getElementById("main");
	dl.onfocus=function(){
		if (this.value=="请填写用户名"){
			this.value="";
		}
	};
	dl.onblur=function(){
		if (this.value=="") {
			this.value="请填写用户名";
		}; 
	};
	tx.onfocus = function(){
	   if(this.value != "请填写密码") return;
	   this.style.display = "none";
	   pwd.style.display = "inline-block";
	   pwd.value = "";
	   pwd.focus();
	}
	pwd.onblur = function(){
	   if(this.value != "") return;
	   this.style.display = "none";
	   tx.style.display = "";
	   tx.value = "请填写密码";
	}


	window.onresize=function(){
		toResize();
	};
	toResize();
};//end init;


	function toResize(){
		var viewWidth=document.documentElement.clientWidth;
		var viewHeight=document.documentElement.clientHeight;
		mainObj.style.width=viewWidth+"px";
		mainObj.style.height=viewHeight+"px";
		if (viewWidth<=1002) {
			mainObj.style.width="1002px";
		};
		if (viewHeight<=630) {
			mainObj.style.height="630px";
		};
		


				if (viewWidth>1920) {
					logoObj.style.left=(viewWidth-1920)/2+65+"px";
					footerObj.style.left=(viewWidth-1920)/2+30+"px";
					 
				}else{
					logoObj.style.left="65px";
					footerObj.style.left="30px";
				};//end id
				if(viewHeight>800){
					logoObj.style.top=(viewHeight-800)/2+50+"px";
					footerObj.style.bottom=(viewHeight-800)/2+50+"px";
					
				}else{
					logoObj.style.top="50px";
					footerObj.style.bottom="50px";
				};

				var xPos;
				var yPos;
				xPos=(viewWidth-1920)/2+"px";
				yPos=(viewHeight-800)/2+"px";
			
				 mainObj.style.backgroundPosition = xPos+" "+yPos;

			
				console.log(mainObj.style.width,mainObj.style.height);
	};

addLoadEvent(init);
  