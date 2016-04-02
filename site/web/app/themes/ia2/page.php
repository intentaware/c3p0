<?php get_header(); ?>
<link rel='stylesheet' id='dashicons-css'  href='<?php echo get_template_directory_uri(); ?>/assets/css/integrity-light.css' type='text/css' media='all' />
<?php if(have_posts()){
        while(have_posts()){
            the_post();
        ?>
        <section class="main">
            <div class="row">
                <header class="x-header-landmark x-container max width">
                    <h3 class="h-landmark"><span><?php the_title(); ?></span></h3>
                </header>
                <p class="p-landmark-sub"><span></span></p>

                <div class="x-container max width offset">
                    <div class="x-main full" role="main">
                        <div class="container">                    
                            <?php echo the_content(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
} }?>
<?php get_footer(); ?>