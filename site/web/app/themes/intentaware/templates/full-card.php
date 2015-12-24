<!--Template Name: Full Card -->
<?php 
	$content = $page->post_content;
        $content = preg_replace("/<img[^>]+\>/i", " ", $content);          
        $content = str_replace(']]>', ']]>', $content);
?>
<div id="<?php echo (str_replace(" ", "-", strtolower($page->post_title))); ?>">
	<div class="mdl-card amazing mdl-cell mdl-cell--12-col">
	
	    <div class="mdl-card__title mdl-color-text--grey-50">
	    	<div class="node"></div>
	      <h3 class="quote" ><a href="#"><div class="line"></div><strong><?php echo $page->post_title ?></strong></a></h3>
	    </div>
	    <div class="mdl-card__supporting-text mdl-color-text--grey-600">
	      <?php echo $content ?>
	    </div>
	</div>
</div>