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
	<div id="home" class="fullBg" style="background-image: url(<?php echo $thumbUrl; ?>)">
    	<div class="overlay coverUp">
        	<div class="content">
            	<h1><strong style="color: #fff"><?php the_title() ?></strong></h1>
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
	<div class="fullBg">
		<div class="overlay"></div>
	</div>
	<div class="android-content mdl-layout__content">
		<a name="top"></a>
        <div class="android-be-together-section mdl-typography--text-center">
          <div class="logo-font android-slogan"><span class="color"><strong style="background-color: #6ab344"><?php the_title() ?></strong></span></div>
          <div class="logo-font android-sub-slogan"><b class="rotate">Orginization,Publisher,Advertiser</b></div>
          <div class="c2a">
          <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color--orange mdl-button--accent">
  			Order Free Demo
		</button>
		</div>
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
