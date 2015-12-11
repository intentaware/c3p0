
 <!--Template Name: Front Page -->

<?php while (have_posts()) : the_post();
if(has_post_thumbnail(get_the_ID()))
{
	$thumbId = get_post_thumbnail_id();
	$thumbUrl = wp_get_attachment_url($thumbId);
	$my_wp_query = new WP_Query();
	$all_wp_pages = $my_wp_query->query(array('post_type' => 'page'));
	$children = get_page_children( get_the_ID(), $all_wp_pages );
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
<?php 	$mypages = get_pages( array( 'child_of' => $post->ID, 'sort_column' => 'post_date', 'sort_order' => 'asce' ) );
foreach( $mypages as $page )
{
	$content = $page->post_content;
 	if ( ! $content )
 	$content = apply_filters( 'the_content', $content );
 	$childTemplate = get_page_template_slug($page->ID);
 	include(locate_template($childTemplate));
}
?>
<?php endwhile; ?>

