$(document).ready(function(){	
	$("#cmenu a").click(function(){
		var closest_ul = $(this).closest("ul");
		var parallel_active_links = closest_ul.find(".active")
		var closest_li = $(this).closest("li");
		var link_status = closest_li.hasClass("active");
		var count = 0;

		closest_ul.find("ul").slideUp(function(){
			if(++count == closest_ul.find("ul").length)
				parallel_active_links.removeClass("active");
		});

		if(!link_status)
		{
			closest_li.children("ul").slideDown();
			closest_li.addClass("active");
		}
	})
})
