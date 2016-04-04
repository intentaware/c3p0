<?php 
    /**
    * Template Name: Home Page
    */
?>
<?php get_header(); ?>

<header id="header">
    <div class="header-inner">
        <!-- Header image -->
        <img src="<?php echo ot_get_option('home_page_background'); ?>" alt="img">
        <!--<div class="header-overlay">
        <div class="header-content">
        <h2 class="header-slide"><?php echo ot_get_option('heading_after_menu'); ?>
        <span><?php echo ot_get_option('text_after_heading'); ?></span>
        </h2>
        <div class="header-btn-area">
        <a class="knowmore-btn" href="<?php echo ot_get_option('button_link'); ?>"><?php echo ot_get_option('button_text'); ?></a>
        </div>
        </div>
        </div>-->
        <div class="header-overlay">
            <div class="header-content">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="false">
                    <!-- Indicators -->
                    <!-- <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    </ol>-->

                    <!-- Wrapper for slides -->
                    <div id="homecarousel" class="carousel-inner" role="listbox">
                        <div class="item active">

                            <!-- Start header content slider -->
                            <h2><?php echo ot_get_option('heading_after_menu'); ?>

                                <p><?php echo ot_get_option('text_after_heading'); ?></p>
                            </h2>
                            <!-- End header content slider -->  
                            <!-- Header btn area -->
                            <div class="header-btn-area">
                                <a class="knowmore-btn" href="<?php echo ot_get_option('button_link'); ?>"><?php echo ot_get_option('button_text'); ?></a>
                                <!--          <a class="download-btn" href="#">LOREAM</a>-->
                            </div>

                        </div>
                        <?php /* ?>
                        <div class="item">

                            <!-- Start header content slider -->
                            <h2><?php echo ot_get_option('heading_after_menu'); ?>
                                <p><?php echo ot_get_option('text_after_heading'); ?></p>
                            </h2>
                            <!-- End header content slider -->  
                            <!-- Header btn area -->
                            <div class="header-btn-area">
                                <a class="knowmore-btn" href="<?php echo ot_get_option('button_link'); ?>"><?php echo ot_get_option('button_text'); ?></a>
                                <!--          <a class="download-btn" href="#">LOREAM</a>-->
                            </div>

                        </div>

                        <div class="item">

                            <!-- Start header content slider -->
                            <h2><?php echo ot_get_option('heading_after_menu'); ?>
                                <p><?php echo ot_get_option('text_after_heading'); ?></p>
                            </h2>
                            <!-- End header content slider -->  
                            <!-- Header btn area -->
                            <div class="header-btn-area">
                                <a class="knowmore-btn" href="<?php echo ot_get_option('button_link'); ?>"><?php echo ot_get_option('button_text'); ?></a>
                                <!--          <a class="download-btn" href="#">LOREAM</a>-->
                            </div>

                        </div>
                        <?php */ ?>
                    </div>

                    <!-- Controls -->
                    <!--<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                    </a>-->
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Start menu section -->

<!-- End menu section -->

<!-- Start about section -->

<section id="about">
    <div id="section-2" class="section-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-content-wrapper row">
                        <div class="welcome-area">
                            <div class="title-area">            
                                <h2 class="tittle" style="color:#fff;"><?php echo ot_get_option('features_heading'); ?></h2>
                            </div>
                            <div class="section-slide-cover-wrapper col-md-12 hidden-xs">
                                <div class="welcome-content section-slide-cover-col-wrapper">
                                    <ul class="wc-table">
                                        <li>
                                            <div class="single-wc-content wow fadeInUp">
                                                <a href="#intent-quality-slide-1" data-idx='0' class="slide-cover-button">
                                                    <div class="slide-cover-img">
                                                        <img src="<?php echo ot_get_option('first_features_main_image'); ?>" alt="">
                                                    </div>
                                                    <h4 class="wc-tittle"><?php echo ot_get_option('first_featurs_heading'); ?></h4>

                                                    <p>
                                                        <?php echo ot_get_option('first_features_title'); ?>                                                   
                                                    </p>
                                                </a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="single-wc-content wow fadeInUp">
                                                <a href="#intent-quality-slide-2" data-idx='1' class="slide-cover-button">
                                                    <div class="slide-cover-img">
                                                        <img src="<?php echo ot_get_option('second_features_main_image'); ?>" alt="">
                                                    </div>
                                                    <h4 class="wc-tittle"><?php echo ot_get_option('second_featurs_heading'); ?></h4>

                                                    <p>
                                                        <?php echo ot_get_option('second_features_title'); ?>
                                                    </p>
                                                </a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="single-wc-content wow fadeInUp">
                                                <a href="#intent-quality-slide-3" data-idx='2' class="slide-cover-button">
                                                    <div class="slide-cover-img">
                                                        <img src="<?php echo ot_get_option('third_features_main_image'); ?>" alt="">
                                                    </div>
                                                    <h4 class="wc-tittle"><?php echo ot_get_option('third_featurs_heading'); ?></h4>

                                                    <p>
                                                        <?php echo ot_get_option('third_features_title'); ?>                                                   
                                                    </p>
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="section-slide-wrapper col-md-12 hidden-xs">
                                <div class="section-slide-navigation">
                                    <a href="#" class="back-btn"><i class="fa fa-chevron-left"></i> Back</a>
                                    <div class="section-slide-navigation-list">
                                        <a href="#intent-quality-slide-1"><?php echo ot_get_option('first_featurs_heading'); ?></a>/
                                        <a href="#intent-quality-slide-2"><?php echo ot_get_option('second_featurs_heading'); ?></a>/
                                        <a href="#intent-quality-slide-3"><?php echo ot_get_option('third_featurs_heading'); ?></a></div>
                                </div>
                                <div class="section-slide-container">
                                    <div class="section-slides">
                                        <div id="intent-quality-slide-1-slide" class="section-slide">
                                            <div class="col-md-10 col-md-offset-1">
                                                <div class="col-md-6 col-xs-6">
                                                    <h3><?php echo ot_get_option('first_features_title'); ?></h3>
                                                    <?php echo ot_get_option('first_features_descreption'); ?>
                                                </div>
                                                <div class="col-md-6 col-xs-6">
                                                    <div class="img-bitmap-block img-block"><img class="img-responsive" src="<?php echo ot_get_option('first_features_slider_image'); ?>" alt=""></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="intent-quality-slide-2-slide" class="section-slide">
                                            <div class="col-md-10 col-md-offset-1">
                                                <div class="col-md-6 col-xs-6">
                                                    <h3><?php echo ot_get_option('second_features_title'); ?></h3>
                                                    </h3>
                                                    <?php echo ot_get_option('second_features_descreption'); ?>
                                                </div>
                                                <div class="col-md-6 col-xs-6">
                                                    <div class="img-bitmap-block img-block"><img class="img-responsive" src="<?php echo ot_get_option('second_features_slider_image'); ?>" alt=""></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="intent-quality-slide-3-slide" class="section-slide">
                                            <div class="col-md-10 col-md-offset-1">
                                                <div class="col-md-6 col-xs-6">
                                                    <h3><?php echo ot_get_option('third_features_title'); ?></h3>
                                                    <?php echo ot_get_option('third_features_descreption'); ?>
                                                </div>
                                                <div class="col-md-6 col-xs-6">
                                                    <div class="img-bitmap-block img-block"><img class="img-responsive" src="<?php echo ot_get_option('third_features_slider_image'); ?>" alt=""></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row visible-xs feature_content_box">
                        <div class="col-md-12">
                            <div class="feature_container col-md-4">
                                <div class="col-md-12">
                                    <div class="img-container"><img class="img-responsive" src="<?php echo ot_get_option('first_features_slider_image'); ?>" alt=""></div>
                                </div>
                                <div class="col-md-12">
                                    <h3><?php echo ot_get_option('first_features_title'); ?></h3>
                                    <?php echo ot_get_option('first_features_descreption'); ?>
                                </div>
                            </div>
                            <div class="feature_container col-md-4">

                                <div class="col-md-12">
                                    <div class="img-container"><img class="img-responsive" src="<?php echo ot_get_option('second_features_slider_image'); ?>" alt=""></div>
                                </div>
                                <div class="col-md-12">
                                    <h3><?php echo ot_get_option('second_features_title'); ?></h3>
                                    <?php echo ot_get_option('second_features_descreption'); ?>
                                </div>

                            </div>

                            <div class="feature_container col-md-4">
                                <div class="col-md-12">
                                    <div class="img-container"><img class="img-responsive" src="<?php echo ot_get_option('third_features_slider_image'); ?>" alt=""></div>
                                </div>
                                <div class="col-md-12">
                                    <h3><?php echo ot_get_option('third_features_title'); ?></h3>
                                    <?php echo ot_get_option('third_features_descreption'); ?>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

<section style="display:inline-block;">
    <div class="row">
        <div class="col-md-12">
            <div class="about-area">

                <div class="row">
                    <?php $advertisers =  get_post(75);?>
                    <div class="col-md-6 col-sm-6 col-xs-12 wow fadeInLeft sq">
                        <div class="about-right" >
                            <div class="title-area">
                                <h2 class="tittle_2"><?php echo $advertisers->post_title; ?></h2>
                                <span class="tittle-line"></span>
                                <?php //echo apply_filters('the_excerpt', $advertisers->post_content); ?>
                                <p><?php echo intent_get_the_popular_excerpt($advertisers->post_content,350) ?></p>
                                <div class="about-btn-area">
                                    <a href="<?php echo get_permalink(75); ?>" class="button button-default" data-text="KNOW MORE"><span>KNOW MORE</span></a>
                                </div>                    
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 sq">
                        <div class="about-left wow fadeInRight">
                            <img src="<?php echo  wp_get_attachment_url( get_post_thumbnail_id($advertisers->ID) ); ?>" alt="img">
                        </div>
                    </div>

                </div>


                <div class="row">
                    <?php $publisher =  get_post(78);?>
                    <div class="col-md-6 col-sm-6 col-xs-12  wow fadeInLeft sq">
                        <div class="about-left" style="min-height:455px;">
                            <img src="<?php echo  wp_get_attachment_url( get_post_thumbnail_id($publisher->ID) ); ?>" alt="img">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 sq">
                        <div class="about-right wow fadeInRight" style="background-color:#222; margin:0px; min-height:455px;">
                            <div class="title-area">
                                <h2 class="tittle_2"><?php echo $publisher->post_title; ?></h2>
                                <span class="tittle-line"></span>
                                <?php //echo apply_filters('the_excerpt', $publisher->post_content); ?>
                                <p><?php echo intent_get_the_popular_excerpt($publisher->post_content,350) ?></p>
                                <div class="about-btn-area">
                                    <a href="<?php echo get_permalink(78); ?>" class="button button-default" data-text="KNOW MORE"><span>KNOW MORE</span></a>
                                </div>                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- End about section -->

<section id="from-blog">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="from-blog-area">
                    <div class="title-area" <?php if(ot_get_option('resources_header_back_image') != ''){ ?> style="background: rgba(0, 0, 0, 0) url('<?php echo ot_get_option('resources_header_back_image'); ?>') no-repeat scroll center center;" <?php } ?>>
                        <h2 class="tittle"><?php echo ot_get_option('resources_section_heading'); ?></h2>
                        <!--              <span class="tittle-line"></span>
                        -->             
                    </div>
                    <p class="add"><?php echo ot_get_option('resources_text_after_heading'); ?></p>
                    <!-- From Blog content -->
                    <div class="from-blog-content">
                        <?php
                            $args=array('post_type' => 'post','posts_per_page' => 4,'post_status' => 'publish',);

                            $my_query = null;
                            $my_query = new WP_Query($args); 
                            if( $my_query->have_posts() ) {
                            ?>
                            <div class="row">
                                <?php  while ($my_query->have_posts()) : $my_query->the_post(); ?>
                                    <div class="col-sm-6 col-md-3 rs">
                                        <article class="single-from-blog">
                                            <figure>
                                                <a href="<?php the_permalink();?>"><img src="<?php echo wp_get_attachment_image_url(get_post_thumbnail_id(get_the_ID()));?>" alt="img"></a>
                                            </figure>
                                            <div class="blog-title">
                                                <h2><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
                                                <p><span class="blog-date"><?php echo get_the_date(); ?></span></p>
                                            </div>
                                            
                                            <div class="resource_content">
                                                <p><?php echo intent_get_the_popular_excerpt(get_the_content(), 70); ?></p>
                                            </div>
                                            
                                            <div class="resouce_more">
                                                <a href="<?php the_permalink(); ?>">Read More</a>
                                            </div>

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


<!-- Start call to action -->
<!--<section id="call-to-action">
<div class="call-to-overlay">
<div class="container">
<div class="call-to-content wow fadeInUp">
<h2>Want to keep in touch with intentaware?</h2>
<h4>Register for our newsletter today</h4>
<a href="#" class="button button-default" data-text="GET IT NOW" style="border:1px solid #fff !important;color:#fff !important;"><span>Newsletter registration</span></a>
</div>
</div>
</div> 
</section>-->
<!-- End call to action -->

<!-- Start Team action -->
<!--<section id="team">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="about-area_2">

<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 wow fadeInLeft sq" style="visibility: visible; animation-name: fadeInLeft;">
<div class="about-right" style="margin:0px; min-height:455px;">
<div class="title-area">
<h2 class="tittle_2">Our Case Studies</h2>
<span class="tittle-line"></span>
<p>ed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illotore itatis et quasi architecto beatae vitae dicta sunt explicabo.</p> 

<div class="progress">
<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">
Loeam ipsum is 
</div>
</div>
<div class="progress">
<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
Loeam ipsum is simply
</div>
</div>
<div class="progress">
<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 70%;">
Loeam ipsum is simply text
</div>
</div>                    

</div>
</div>
</div>
<div class="col-md-6 col-sm-6 col-xs-12 sq">
<div class="about-left wow fadeInRight" style="visibility: visible; animation-name: fadeInRight;">
<img src="<?php bloginfo('template_url'); ?>/assets/images/mob.png" alt="img" style="width: 72%;height: auto;">
</div>
</div>

</div>



</div>
</div>
</div>
</div>
</section>-->
<!-- Start Team action -->




<!-- Start Testimonial section -->
<!--<section id="testimonial">
<img src="<?php bloginfo('template_url'); ?>/assets/images/testimonial-bg.jpg" alt="img">
<div class="counter-overlay">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="testimonial-area">
<div class="title-area">
<h2 class="tittle">TESTIMONIAL</h2>
</div>
<?php
    $args=array('post_type' => 'testimonial','post_status' => 'publish',);

    $my_query = null;
    $my_query = new WP_Query($args); 

    if( $my_query->have_posts() ) {
    ?>
    <div class="testimonial-conten">
    <div class="testimonial-slider">
    <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
        <div class="single-slide">
        <p><?php echo get_the_content(); ?></p>
        <div class="single-testimonial">
        <img class="testimonial-thumb" src="<?php echo wp_get_attachment_image_url(get_post_thumbnail_id(get_the_ID()));?>" alt="img">
        <p><?php the_title(); ?></p>
        </div>
        </div>
        <?php endwhile; ?>
    </div>
    </div>

    <?php  }
    wp_reset_query();
?>                    
</div>
</div>
</div>
</div>
</div> 
</section>-->
<!-- End Testimonial section -->

<!-- Start Contact section -->
<section id="contact" <?php if(ot_get_option('here_about_section_background') != ''){ ?> style="background-image: url('<?php echo ot_get_option('here_about_section_background')?>');" <?php }else{ ?> style="background-color: #555;" <?php } ?>>
    <div class="container">
        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="contact-right wow fadeInRight">
                    <h2 <?php if(ot_get_option('here_bout_title_back_image') != ''){ ?> style="background: rgba(0, 0, 0, 0) url('<?php echo ot_get_option('here_bout_title_back_image') ?>') no-repeat scroll center center;" <?php } ?> ><?php echo ot_get_option('here_about_title'); ?></h2>
                    <?php echo do_shortcode(ot_get_option('here_about_form_shortcode')); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Contact section -->
<!-- Start Google Map -->
<!--<section id="google-map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m8!1m3!1d6303.67022361714!2d144.955652!3d-37.817331!3m2!1i1024!2i768!4f13.1!4m6!3e6!4m0!4m3!3m2!1d-37.8173306!2d144.9556518!5e0!3m2!1sen!2sbd!4v1442411159706" width="100%" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>  
        </section>-->
        <!-- End Google Map -->
<?php get_footer(); ?>