<!--Template Name: Grid -->
<?php 
$custom = get_post_custom($page->ID);
$content = $page->post_content;

$cats = explode(',', strtolower($content));
$allPosts = array();
foreach ($cats as $key => $value)
{
	$args = array();
	$args['category_name'] = $value;
	$args['orderby'] = 'date';
	$args['order'] = 'DESC';

	$allPosts[] = get_posts($args);
}
	$loop = array();
	$x = 0;
	foreach ($allPosts as $key => $objects) {

		foreach ($objects as $key => $value) {
			if (++$x == 4) break;
			$value = (array)$value;
			$content = strip_tags($value['post_content']);
			$value['post_content'] = $content;
			$pos = strpos($content, ' ', 50);
			$value['min_desc'] = substr($content, 0, $pos); 
			$loop[] = $value;
		}
	}
?>
<div id="<?php echo (str_replace(" ", "-", strtolower($page->post_title))); ?>" class="leftAligned">
	<div class="container">
		<div class="section-title center text-center">
        	<h4><?php echo $page->post_title ?></h4>
        		<?php 
            	if(array_key_exists("shortline", $custom))
            	{
            	    ?>
            	        <h2><?php echo $custom['shortline'][0]?></h2>
            	    <?php
            	}
            	    ?>
            <div class="line">
                <hr>
            </div>
            <div class="clearfix"></div>
    	</div>
		<div class="mdl-grid">
			<?php foreach ($loop as $key => $value)
			{
				?>
					<div class="mdl-cell mdl-cell--4-col">
						<div class="demo-card-square mdl-card mdl-shadow--2dp">
							<div class="mdl-card__title mdl-card--expand">
								<h2 class="mdl-card__title-text"><?php echo $value['post_title'] ?></h2>
							</div>
							<div class="mdl-card__supporting-text">
								<?php echo $value['min_desc']."..." ?>
							</div>
							<div class="mdl-card__actions mdl-card--border">
    							<a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
    							Read More...
    							</a>
    						</div>
    					</div>	
    				</div>
				<?php
			}
				?>
		</div>
	</div>
</div>
