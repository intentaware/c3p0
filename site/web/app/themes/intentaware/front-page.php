
 <!--Template Name: Front Page -->

<?php while (have_posts()) : the_post(); ?>
  
  <div id="tf-home" class="text-center">
        <div class="overlay">
            <div class="content">
                <h1>Welcome on <strong><span class="color"><?php the_title() ?></span></strong></h1>
                <p class="lead"><?php the_content() ?></p>
                <a><span id="#tf-about" class="glyphicon glyphicon-menu-down arrow-down" ></span></a>
            </div>
        </div>
    </div>
<?php endwhile; ?>
<?php get_template_part('templates/about'); ?>
<?php get_template_part('templates/plateforms'); ?>
<?php get_template_part('templates/labs'); ?>
<?php get_template_part('templates/contact'); ?>