//导航效果（兼容IE6）
$(function(){
	   $("#nav ul li:has(ul)").hover(function(){
			$(this).children("ul").stop(true,true).show();
        },function(){
		    $(this).children("ul").stop(true,true).delay(1000).slideUp(600);
		});
})