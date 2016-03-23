<?php get_header(); ?>

<?php if(have_posts()){
        while(have_posts()){
            the_post();
        ?>
        <section class="main" style="min-height: 500px;">
            <div class="row">
                <div class="container">
                    <h1 style="margin: 0 0 30px; border-bottom: 3px solid rgba(205, 21, 44, 0.8); padding: 0 0 20px; color: #fff; color: rgba(0, 0, 0, 0.7)"><span><?php the_title(); ?></span></h1>
                        <?php echo the_content(); ?>
                </div>
            </div>
        </section>
        <?php
        } }?>
<?php get_footer(); ?>