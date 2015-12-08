<?php
/*
 * Template Name: Blogpage
 */
?>
<div class="container">
<button class="btn tf-btn btn-default"><a href="<?php echo(home_url()) ?>"><span class="glyphicon glyphicon-menu-left"></span> Home </a></button>
<div class="text-center">
<div class="section-title center" style="min-height: 650px" >
                <h2>Read Our <strong>Blog</strong></h2>
                <div class="line">
                    <hr>
                </div>
                <div class="clearfix"></div>
                <!--<p class="intro"><?php echo $page->post_content; ?></p> -->
                <?php 
                	$posts = get_posts();

                	foreach ($posts as $obj)
                	{
                		$post = (array)$obj;
                		?>
                		<div class="postBox">
	                		<h2><?php echo $post['post_title']?></h2>
	                		<p class="intro"><?php echo $post['post_content'] ?></p>
	                		<div class="infoBox">
	                			Created: <?php echo $post['post_date'] ?>
	                		</div>
                		</div>
                		<div class="line">
                    	<hr>
                		</div>
                		<div class="clearfix"></div>
                		<?php
                	}
                	?>
            </div>
            <div class="space"></div>
</div>
</div>