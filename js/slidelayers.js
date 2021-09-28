var startValue	= 0; 
var WHEREAMI	= startValue;
var Cposition	= 0;
var Nposition	= 0;
var ltMove;
var ltaMove;
var rtMove;
var rtaMove;
var trTime;
var hz_floater	= startValue;
var LFTposition;

if (document.layers) {
	self.onerror	= deal_with_error;
	self.onReload	= rEload_Doc;
	self.onResize	= rEload_Doc;
}

function deal_with_error(msg, url, line) {
    rEload_Doc();
    return true;
}

function CLRtimers() {
	moveitemVA = false;
	clearTimeout(ltMove);
	clearTimeout(rtMove);
	clearTimeout(trTime);
}
function hideDLY() {
	trTime = setTimeout("hidePopups()",popupHideDelay);
}
function hidePopups() {
	clearTimeout(trTime);
	if(document.layers){
		for (a=0; a<=popupCNT-1; a++,eval("document.popupCtr.document.LYR" + a + ".visibility='hidden'"));
		document.popupCtr.zIndex = 1;
		}
	else if(document.all) {
		for (a=0; a<=popupCNT-1; a++,eval("document.all.LYR" + a + ".style.visibility='hidden'"));
		document.all.popupCtr.style.zIndex = 1;
		}
	else if(document.getElementById) {
		for (a=0; a<=popupCNT-1; a++,eval("document.getElementById('LYR" + a + "').style.visibility ='hidden'"));
		document.getElementById('popupCtr').style.zIndex = 1;
		}
}

function LayerMoveTo(xpos) {
	var layerID;
	var positionTrack=0;
	for (a=1; a<=popupCNT;a++) {
		layerID = "IMG" + a;
		positionTrack = RTend + (a*105)-105;
		if(positionTrack + xpos-0 < 750) {
			if(document.all) {
				document.all[layerID].style.left = positionTrack+xpos-0;
				document.all[layerID].style.visibility = "visible";
				//alert('document all');
			} 
			else if(document.layers) {
				//alert('document layers');
				document.eventCtr.document[layerID].left = parseInt(positionTrack + xpos);
				document.eventCtr.document[layerID].visibility = "visible";
			}
			else if(document.getElementById) {
				//alert('document getelementbuid');
				eval("document.getElementById('" + layerID + "').style.left = positionTrack+xpos-0");
				eval("document.getElementById('" + layerID + "').style.visibility='visible'");
			}
		}
}

}
function gotoLeft() {
	CLRtimers();
	if(hz_floater != LTend) {
		LayerMoveTo(hz_floater);
		hz_floater = hz_floater - 5;	
		ltMove = setTimeout("gotoLeft('eventCtr')",TMRinterval);
	}
}
function gotoRight() {
	CLRtimers();
	if(hz_floater != RTend) {
		LayerMoveTo(hz_floater);		
		hz_floater = hz_floater + 5;
		rtMove = setTimeout("gotoRight('eventCtr')",TMRinterval);
	}
}

function showWindow(eventLayerID) {
	CLRtimers();
	var parentLayer;
	parentLayer = "LYR" + replace(eventLayerID,"IMG","")
	hidePopups(); 
    if(document.layers) {
		parentYpos = parseInt(eval("document.eventCtr.document." + eventLayerID + ".left"));
		if(parentYpos < 300){
			//document.popupCtr.clip.left		= parseInt(parentYpos + 80);
			document.popupCtr.clip.width	= 250; 
			document.popupCtr.zIndex		= 10;
			document.popupCtr.document[parentLayer].left		= parentYpos + 100;
			document.popupCtr.document[parentLayer].top			= -3;
			document.popupCtr.document[parentLayer].visibility	= "visible";
		}
	}
	else if(document.all) {
		parentYpos = parseInt(document.all[eventLayerID].style.left);
		if(parentYpos < 300){
				//document.all.popupCtr.style.clip			= "rect(-30 " + parseInt(parentYpos + 250) + " 60 " + parseInt(parentYpos + 80) + ")";
				document.all.popupCtr.style.zIndex			= 10;
				document.all[parentLayer].style.left		= parentYpos + 100;
				document.all[parentLayer].style.top			= -3;
				document.all[parentLayer].style.visibility	= "visible";
			}
	}
	else if(document.getElementById) {
		parentYpos = parseInt(eval("document.getElementById('" + eventLayerID + "').style.left"));
		if(parentYpos < 300){
				//document.getElementById('popupCtr').style.clip = "rect(-30px " + parseInt(parentYpos + 250) + "px 60px " + parseInt(parentYpos + 80) + "px)";
				document.getElementById('popupCtr').style.zIndex = 10;
				eval("document.getElementById('" + parentLayer + "').style.left=parentYpos + 100");
				eval("document.getElementById('" + parentLayer + "').style.top=-3");
				eval("document.getElementById('" + parentLayer + "').style.visibility='visible'");
			}
	}
}
function replace(string,text,by) {
    var strLength = string.length, txtLength = text.length;
    if ((strLength == 0) || (txtLength == 0)) return string;
    var i = string.indexOf(text);
    if ((!i) && (text != string.substring(0,txtLength))) return string;
    if (i == -1) return string;
    var newstr = string.substring(0,i) + by;
    if (i+txtLength < strLength)
        newstr += replace(string.substring(i+txtLength,strLength),text,by);
    return newstr;
}
function openNewWin(url) {
    NewWin = window.open(url, 'popupWin', 'scrollbars,resizable,dependent,width=475,height=475,left=yes,top=yes');
    NewWin.focus();
}   

function rEload_Doc() {
	location.reload(true);
}