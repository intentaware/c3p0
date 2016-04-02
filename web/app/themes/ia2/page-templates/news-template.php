<?php 
    /**
    * Template Name: News
    */
?>
<?php get_header(); ?>
<link rel='stylesheet' id='dashicons-css'  href='<?php echo get_template_directory_uri(); ?>/assets/css/integrity-light.css' type='text/css' media='all' />
<?php if(have_posts()){
        while(have_posts()){
            the_post();
        ?>
        <section class="main">
            <div class="row">
                <header class="x-header-landmark x-container max width">
                    <h1 class="h-landmark"><span><?php the_title(); ?></span></h1>
                </header>
                <p class="p-landmark-sub"><span></span></p>

                <div class="x-container max width offset">
                    <div class="x-main full" role="main">
                        <div class="container">                    
                            <div class="from-blog-content">
                                <?php
                                    $args=array('post_type' => 'our-news','posts_per_page' => 10,'post_status' => 'publish',);

                                    $my_query = null;
                                    $my_query = new WP_Query($args); 
                                    if( $my_query->have_posts() ) {
                                    ?>
                                    <div class="row">
                                        <?php  while ($my_query->have_posts()) : $my_query->the_post(); ?>
                                            <div class="col-sm-6 col-md-3">
                                                <article class="single-from-blog">
                                                    <figure>
                                                        <a href="<?php the_permalink();?>"><img src="<?php echo wp_get_attachment_image_url(get_post_thumbnail_id(get_the_ID()));?>" alt="img"></a>
                                                    </figure>
                                                    <div class="blog-title">
                                                        <h2><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
                                                        <p><span class="blog-date"><?php echo get_the_date(); ?></span></p>
                                                    </div>
                                                    <p><?php the_excerpt();?></p>

                                                </article>
                                            </div>
                                            <?php endwhile; ?>
                                    </div>    
                                    <?php }  
                                    wp_reset_query(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
} }?>
<?php get_footer(); ?>