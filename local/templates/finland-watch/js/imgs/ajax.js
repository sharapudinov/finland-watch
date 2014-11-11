(function($) {
$(function() {
  $("#leftblock").load("http://zarabotat-na-sajte.ru/ajax/leftajax.html");
  $("#navigationtop").load("http://zarabotat-na-sajte.ru/ajax/navigationtop.html");
  $("#navigationniz").load("http://zarabotat-na-sajte.ru/ajax/navigationniz.html");
  $("#birzhi").load("http://zarabotat-na-sajte.ru/ajax/birzhi.html");
  $("#rightold").load("http://zarabotat-na-sajte.ru/ajax/right.html");
  $("#right").load("http://zarabotat-na-sajte.ru/ajax/right2.html");
  $("#topmenu").load("http://zarabotat-na-sajte.ru/ajax/topmenu.html");
  $("#leftniz").load("http://zarabotat-na-sajte.ru/ajax/leftniz.html");
  $("#rekfor").load("http://zarabotat-na-sajte.ru/ajax/rekfor.html");
  $("#shapka").load("http://zarabotat-na-sajte.ru/ajax/shapka.html");
  $("#niz").load("http://zarabotat-na-sajte.ru/ajax/niz.html");
  $("#anons").load("http://zarabotat-na-sajte.ru/ajax/anons.html");
})
})(jQuery);


$(document).ready(function(){
    var br = $.browser;
    $(window).scroll(function() {
        var top = $(document).scrollTop();
        if (top < 850) {
            $(".rightnewsnew").css({position: 'inherit', top: '15px'});
        } else if ((!br.msie) || ((br.msie) && (br.version > 7))) {
            $(".rightnewsnew").css({top: '0px', position: 'fixed', top: '0px'});
        } else if ((br.msie) && (br.version <= 7)) {
            $(".rightnewsnew").css({top: '0px', position: 'fixed', top: '0px'});
        }

    });
});


(function() {

function goTop(acceleration, time) {
	acceleration = acceleration || 0.1;
	time = time || 12;

	var dx = 0;
	var dy = 0;
	var bx = 0;
	var by = 0;
	var wx = 0;
	var wy = 0;

	if (document.documentElement) {
		dx = document.documentElement.scrollLeft || 0;
		dy = document.documentElement.scrollTop || 0;
	}
	if (document.body) {
		bx = document.body.scrollLeft || 0;
		by = document.body.scrollTop || 0;
	}
	var wx = window.scrollX || 0;
	var wy = window.scrollY || 0;

	var x = Math.max(wx, Math.max(bx, dx));
	var y = Math.max(wy, Math.max(by, dy));

	var speed = 1 + acceleration;
	window.scrollTo(Math.floor(x / speed), Math.floor(y / speed));
	if(x > 0 || y > 0) {
		var invokeFunction = "top.goTop(" + acceleration + ", " + time + ")"
		window.setTimeout(invokeFunction, time);
	}
	return false;
}

function scrollTop(){
	var a = document.getElementById('gotop');
	
	if( ! a ){
		// если нет элемента добавл€ем его
		var a = document.createElement('a');
		a.id = "gotop";
		a.className = "scrollTop";
		a.href = "#";
		a.style.display = "none";
		a.style.position = "fixed";
		a.style.zIndex = "9999";
		a.onclick = function(e){ e.preventDefault(); window.top.goTop(); }
		document.body.appendChild(a);
	}
	
	var stop = (document.body.scrollTop || document.documentElement.scrollTop);
	if( stop > 550 ){
		a.style.display = 'block';
		smoothopaque(a, 'show', 30);
	} else {
		smoothopaque(a, 'hide', 30, function(){a.style.display = 'none';});
	}

	return false;
}

//прозрачность
function smoothopaque(el, todo, speed, endFunc){	
	var 
	startop = Math.round( el.style.opacity * 100 ),
	op = startop,
	endop = (todo == 'show') ? 100 : 0;
	
	clearTimeout( window['top'].timeout );

	window['top'].timeout = setTimeout(slowopacity, 33);
	
	function slowopacity(){
		if( startop < endop ){
			op += 7;
			if( op < endop )
				window['top'].timeout = setTimeout(slowopacity, speed);
			else
				(endFunc) && endFunc();
		}
		else {
			op -= 7;
			if( op > endop ){
				window['top'].timeout = setTimeout(slowopacity, speed);
			}
			else
				(endFunc) && endFunc();
		}
		setopacity(el, op);		
	}
}

function setopacity(el, opacity){
	el.style.opacity = (opacity/100);
	el.style.filter = 'alpha(opacity=' + opacity + ')';
}

if (window.addEventListener){
	window.addEventListener("scroll", scrollTop, false);
	window.addEventListener("load", scrollTop, false);
}
else if (window.attachEvent){
	window.attachEvent("onscroll", scrollTop);
	window.attachEvent("onload", scrollTop);
}	

window['top'].goTop = goTop;

})();