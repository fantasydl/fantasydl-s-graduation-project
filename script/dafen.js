var fenshu1 = 0;
var fenshu2 = 0;
var fenshu3 = 0;
var fenshu4 = 0;
// 打分
$(document).ready(function(){
	$("#chooseStars1 a").each(function(){
		$(this).bind("mouseover",function(){
			var toClass = "chooseStars" + $(this).text() + "_h";
			$("#chooseStars1").removeClass().addClass(toClass).addClass("clearfix");
		})
		$(this).bind("mouseout",function(){
			var toClass = "chooseStars" + fenshu1;
			$("#chooseStars1").removeClass().addClass(toClass).addClass("clearfix");
		})
		$(this).bind("click",function(){
			var toClass = "chooseStars" + $(this).text();
			fenshu1 = $(this).text();
			$("#chooseStars1").removeClass().addClass(toClass).addClass("clearfix");
		})
	});
	$("#chooseStars2 a").each(function(){
		$(this).bind("mouseover",function(){
			var toClass = "chooseStars" + $(this).text() + "_h";
			$("#chooseStars2").removeClass().addClass(toClass).addClass("clearfix");
		})
		$(this).bind("mouseout",function(){
			var toClass = "chooseStars" + fenshu2;
			$("#chooseStars2").removeClass().addClass(toClass).addClass("clearfix");
		})
		$(this).bind("click",function(){
			var toClass = "chooseStars" + $(this).text();
			fenshu2 = $(this).text();
			$("#chooseStars2").removeClass().addClass(toClass).addClass("clearfix");
		})
	});
	$("#chooseStars3 a").each(function(){
		$(this).bind("mouseover",function(){
			var toClass = "chooseStars" + $(this).text() + "_h";
			$("#chooseStars3").removeClass().addClass(toClass).addClass("clearfix");
		})
		$(this).bind("mouseout",function(){
			var toClass = "chooseStars" + fenshu3;
			$("#chooseStars3").removeClass().addClass(toClass).addClass("clearfix");
		})
		$(this).bind("click",function(){
			var toClass = "chooseStars" + $(this).text();
			fenshu3 = $(this).text();
			$("#chooseStars3").removeClass().addClass(toClass).addClass("clearfix");
		})
	});
	$("#chooseStars4 a").each(function(){
		$(this).bind("mouseover",function(){
			var toClass = "chooseStars" + $(this).text() + "_h";
			$("#chooseStars4").removeClass().addClass(toClass).addClass("clearfix");
		})
		$(this).bind("mouseout",function(){
			var toClass = "chooseStars" + fenshu4;
			$("#chooseStars4").removeClass().addClass(toClass).addClass("clearfix");
		})
		$(this).bind("click",function(){
			var toClass = "chooseStars" + $(this).text();
			fenshu4 = $(this).text();
			$("#chooseStars4").removeClass().addClass(toClass).addClass("clearfix");
		})
	});
})