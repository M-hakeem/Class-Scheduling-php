// JavaScript Document
	document.preloadArray = new Array(); 
	document.preloadArray[14] = new Image(14,75); 
	document.preloadArray[14].src = "lscroll.gif";//on 
	document.preloadArray[15] = new Image(14,75); 
	document.preloadArray[15].src = "lscroll_on.gif";//on 
	document.preloadArray[16] = new Image(14,75); 
	document.preloadArray[16].src = "rscroll.gif";//on 
	document.preloadArray[17] = new Image(14,75); 
	document.preloadArray[17].src = "rscroll_on.gif";//on 
	rnd.today		= new Date();
	rnd.seed		= rnd.today.getTime();
	var randomVal	= rand(76);
	popupTEXT	= new Array();
	eventLINK	= new Array();
	eventIMAGE	= new Array();
	function flWin(){
		//MM_openBrWindow('History/3/1.html','hist','width=750,height=450');
	}
	function selectImg( obj, i ){ 
		obj.src=document.preloadArray[i].src; 
		return true; 
	} 
	function rnd() {
	        rnd.seed = (rnd.seed*9301+49297) % 233280;
	        return rnd.seed/(233280.0);
	}
	function rand(numberer) {
	    return Math.ceil(rnd()*numberer);
	}
	
	function pWinE(url, hWind, nWidth, nHeight, nScroll) {
		var cToolBar	= "toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=" + nScroll + ",resizable=0,width=" + nWidth + ",height=" + nHeight
  		var popupE		= window.open(url, hWind, cToolBar);
		popupE.focus();
	}	