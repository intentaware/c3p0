
 <!--Template Name: Front Page -->

<?php while (have_posts()) : the_post();
if(has_post_thumbnail(get_the_ID()))
{
	$thumbId = get_post_thumbnail_id();
	$thumbUrl = wp_get_attachment_url($thumbId);
	?>
	<div id="home" class="text-center" style="background-image: url(<?php echo $thumbUrl; ?>)">
    	<div class="overlay">
        	<div class="content">
            	<h1>Welcome on <strong><span class="color"><?php the_title() ?></span></strong></h1>
            	<p class="lead"><?php the_content() ?></p>
            	<a><span id="#tf-about" class="glyphicon glyphicon-menu-down arrow-down" ></span></a>
        	</div>
    	</div>
	</div>
	<?php
}
else
{
	?>
	<div id="home" class="text-center" style="color: #5a5a5a">
        	<div class="content">
            	<h1>Welcome on <strong><span class="color"><?php the_title() ?></span></strong></h1>
            	<p class="intro"><?php the_content() ?></p>
            	<a><span id="#tf-about" class="glyphicon glyphicon-menu-down arrow-down" ></span></a>
        	</div>
	</div>
	<?php
}
?>
  

<?php endwhile; ?>
<?php get_template_part('templates/about'); ?>
<?php get_template_part('templates/plateforms'); ?>
<?php get_template_part('templates/labs'); ?>
<?php get_template_part('templates/brandGuideline'); ?>
<?php get_template_part('templates/opt-out'); ?>
<?php get_template_part('templates/contact'); ?>