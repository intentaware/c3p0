<!--Template Name: plateforms -->
<?php $page = (get_page_by_title("Brand Guidelines")); ?>
<div id="brand-guideline" class="text-center">
	<div class="container">
	    <div class="section-title center">
	        <h2>Take a look at <strong><?php echo $page->post_title; ?></strong></h2>
	        <div class="line">
	            <hr>
	        </div>
	        <div class="clearfix"></div>
	        <p class="intro"><?php echo $page->post_content; ?></p>
	    </div>
	</div>
</div>