$(document).ready(function(){
	var thisUrl = decodeURI(window.location.href);
	if(thisUrl.indexOf('index.html') >= 0){
		tempVal = setInterval(xPlay,2200);
	}
	
})

var moveing = false;
var tempVal;

function xAnimate (toTop,nowTop) {
	moveing = true;
	if(nowTop){
		$('#slide-box').animate({top:toTop + 'px'},220,'linear',function(){
			moveing = false;
			tempVal = setInterval(xPlay,2200);
		});
	}else{
		$('#slide-box').animate({top:toTop + 'px'},220,'linear',function(){
			moveing = false;
		});
	}
	var aNext = Math.abs(toTop/100);
	$('#slide-btns a').removeClass('on');
	$('#slide-btns a').eq(aNext).addClass('on');
};

function xClick (e) {
	if(moveing){
		return;
	}
	clearInterval(tempVal);
	e = e || window.event;
	var target = e.target || e.srcElement;
	var nowTop = document.getElementById('slide-box').offsetTop,
		xindex = parseInt($(target).text()) - 1,
		toTop =  -parseInt(xindex)*100;
	xAnimate(toTop,nowTop);
};

function xPlay () {
	var nowTop =  document.getElementById('slide-box').offsetTop;
	if(moveing){
		return;
	}
	if(nowTop > -200){
		var toTop = nowTop - 100;
		xAnimate(toTop);
	}else{
		var toTop = 0;
		xAnimate(toTop);
	}
};

function xFold (e) {
	e = e || window.event;
	var target = e.target || e.srcElement;
	e.stopPropagation();
	var xHeight = $(target).parent().height();
	var minHeight = 25;
	if(xHeight == 25){
		$(target).parent().css('height','auto');
		$('#showless').show();
		$('#showmore').hide();
	}else{
		$(target).parent().animate({height:minHeight + 'px'},function(){
			$('#showmore').show();
			$('#showless').hide();
		});
		
	}	
};

function xShowList (e) {
	e = e || window.event;
	var target = e.target || e.srcElement;
	e.stopPropagation();
	$(target).parent().parent().find('a').removeClass('on');
	$(target).addClass('on');

	var thiText = $(target).text();
	$('.pic-list').hide();
	if(thiText == '推荐'){
		$('.pic-list').eq(0).show();
	}else if(thiText == '环境'){
		$('.pic-list').eq(1).show();
	}else{
		$('.pic-list').eq(2).show();
	}
};