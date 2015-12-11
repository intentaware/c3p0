<?php while (have_posts()) : the_post(); ?>
  
  <div id="tf-home" class="text-center">
        <div class="overlay">
            <div class="content">
                <h1>Welcome on <strong><span class="color"><?php the_title() ?></span></strong></h1>
                <p class="lead"><?php the_content() ?></p>
                <a href="#tf-about" class="fa fa-angle-down page-scroll"></a>
            </div>
        </div>
    </div>
<?php endwhile; ?>
