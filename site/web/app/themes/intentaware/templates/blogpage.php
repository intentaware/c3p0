<?php
/*
 * Template Name: Blogpage
 */
?>
<div class="container">
<button class="btn tf-btn btn-default"><a href="<?php echo(home_url()) ?>"><span class="glyphicon glyphicon-menu-left"></span> Home </a></button>
<div class="text">
<div class="section-title" style="min-height: 650px" >
                <h2><strong>Blog</strong></h2>
                
                <!--<p class="intro"><?php echo $page->post_content; ?></p> -->
                <?php 
                	$posts = get_posts();
                	foreach ($posts as $obj)
                	{
                		$post = (array)$obj;
                		?>

                		<section class="article" id="<?php echo $post['ID'] ?>">
                			<div class="postBox">
	                		<h4><a href="/?p=<?php echo $post['ID'] ?>"><?php echo $post['post_title']?></a></h4>
	                		<div class="line">
                    			<hr>
                			</div>
                			<div class="clearfix"></div>
	                		<p class="intro"><?php echo $post['post_content'] ?></p>
	                		<?php  $user = get_userdata($post['post_author']);
	                			$cats = array();
								foreach(wp_get_post_categories($post['ID']) as $c)
								{
									$cat = get_category($c);
									array_push($cats,$cat->name);
								}

								if(sizeOf($cats)>0)
								{
									$post_categories = implode(',',$cats);
								}
								else
								{
									$post_categories = "Not Assigned";
								}
	                		?>
	                		<div class="infoBox">
	                			Categories: <?php echo $post_categories; ?>
	                		</div>
	                		<div class="clearfix"></div>
	                		<div class="infoBox">
	                			Created By: <?php echo $user->user_login." on ".$post['post_date'] ?>

	                		</div>
                		</div>
                		
                		</section>
                		
                		<?php
                	}
                	?>
            </div>
            <div class="space"></div>
</div>
</div>