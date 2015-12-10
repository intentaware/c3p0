<?php
/*
 * Template Name: Blogpage
 */
?>
<?php get_template_part('templates/second-header'); ?>
<div class="container blogContainer">
<div class="text">
<div style="min-height: 650px" >
    <h2><strong>Blog</strong></h2>
    <?php 
    	$posts = get_posts();
    	foreach ($posts as $obj)
    	{
    		$post = (array)$obj;
    		?>
    		<section class="article" id="<?php echo $post['ID'] ?>">
    			<div class="postBox">
        			<div class="section-title">
            			<h4>
            				<a href="/?p=<?php echo $post['ID'] ?>"><?php echo $post['post_title']?></a>
        				</h4>
                		<div class="line">
                			<hr>
            			</div>
            			<div class="clearfix"></div>
        			</div>	
            		<p class="intro"><?php echo $post['post_content'] ?></p>
            		<?php  
            			$user = get_userdata($post['post_author']);
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
            <hr>
	<?php
        	}
	?>
</div>
    <div class="space"></div>
</div>
</div>