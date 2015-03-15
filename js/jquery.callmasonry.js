$(document).ready(function() {

	/*============================================
	Masonry - loaded in HTML file
	==============================================*/
	$('.article-loop').imagesLoaded(function(){
		$('.article-loop').masonry({
			itemSelector: '.blog-article'
		});
	});

	/*============================================
	Switch Blog Grid/List
	==============================================*/
	var isActive = true;

	$('.filter-list-style').click(function(e) {
		$(this).addClass('active').siblings().removeClass('active');
		$('.blog-article').animate({opacity: "0"}, 800, function() {
			$(this).removeClass('col-md-6 blog-article').addClass('col-md-8 col-md-offset-2 blog-article').animate({opacity: "1"}, 2000);
		});
		$('.article-loop').masonry('destroy');
		pde(e);
	});

	$('.filter-grid-style').click(function(e) {
		$(this).addClass('active').siblings().removeClass('active');
		$('.blog-article').animate({opacity: "0"}, 800, function() {
			$(this).removeClass('col-md-8 col-md-offset-2 blog-article').addClass('col-md-6 blog-article').animate({opacity: "1"}, 2000);
			$('.article-loop').imagesLoaded(function(){
				$('.article-loop').masonry({
					itemSelector: '.blog-article'
				});
			});
		});
		pde(e);
	});
	
});