jQuery(document).ready(function($){
	$("#navigation").find("ul.sub-menu").addClass("mdl-menu mdl-menu--bottom-left mdl-js-menu mdl-js-ripple-effect").attr("for","sub-menu");
console.log($('.rotate'));
	$('.rotate').each(function(){
		
		var el = $(this);
		var text = $(this).html().split(",");
		el.html(text[0]);
		setInterval(function() {
			el.animate({
              textShadowBlur:20,
              opacity: 0
            }, 500 , function() {
              index = $.inArray(el.html(), text)
              if((index + 1) == text.length) index = -1
              el.text(text[index + 1]).animate({
                textShadowBlur:0,
                opacity: 1
              }, 500 );
            });
		}, 2000);
	});
});