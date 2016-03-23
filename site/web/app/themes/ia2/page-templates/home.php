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
        <div class="header-overlay">
            <div class="header-content">
                <!-- Start header content slider -->
                <h2 class="header-slide"><?php echo ot_get_option('heading_after_menu'); ?>
                    <span><?php echo ot_get_option('text_after_heading'); ?></span>
                </h2>
                <!-- End header content slider -->  
                <!-- Header btn area -->
                <div class="header-btn-area">
                    <a class="knowmore-btn" href="<?php echo ot_get_option('button_link'); ?>"><?php echo ot_get_option('button_text'); ?></a>
                    <!--          <a class="download-btn" href="#">LOREAM</a>-->
                </div>
            </div>
        </div>      
    </div>
</header>

<!-- Start menu section -->

<!-- End menu section -->

<!-- Start about section -->
<section id="about">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Start welcome area -->
                <div class="welcome-area">
                    <div class="title-area">            
                        <h2 class="tittle" style="color:#fff;">What we offers</h2>
                        <!--              <span class="tittle-line" style=" background-color:#fff;"></span>
                        -->              <!--<p style="color:#fff;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt  labore et dolore magna aliqua. Ut enim ad minim veniamo laboris nis</p>-->
                    </div>
                    <?php
                        $args=array('post_type' => 'ouroffer','posts_per_page' => 4,'post_status' => 'publish',);

                        $my_query = null;
                        $my_query = new WP_Query($args); 
                        if( $my_query->have_posts() ) {
                        ?>

                        <div class="welcome-content">
                            <ul class="wc-table">
                                <?php  while ($my_query->have_posts()) : $my_query->the_post(); ?>
                                    <li>
                                        <div class="single-wc-content wow fadeInUp">
                                            <!--<span class="fa fa-users wc-icon"></span>-->
                                            <?php  echo types_render_field("font-awesome-icons");  ?>                                        
                                            <h4 class="wc-tittle"><?php the_title();?></h4>
                                            <p><?php echo get_the_excerpt(); ?></p>
                                        </div>
                                    </li>
                                    <?php endwhile; ?>
                            </ul>
                        </div>
                        <?php }

                        wp_reset_query();

                    ?>               
                </div>
                <!-- End welcome area -->
            </div>
        </div>

    </div>
</section> 
<section>

    <div class="row">
        <div class="col-md-12">
            <div class="about-area">

                <div class="row">
                    <?php $advertisers =  get_post(75);?>
                    <div class="col-md-6 col-sm-6 col-xs-12 wow fadeInLeft sq">
                        <div class="about-right" style="background-color:#222; margin:0px; min-height:455px;">
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
                        <div class="about-right wow fadeInRight">
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
                    <div class="title-area">
                        <h2 class="tittle">Latest news</h2>
                        <!--              <span class="tittle-line"></span>
                        -->             
                    </div>
                    <p class="add">We love advertising and advanced digital solutions.</p>
                    <!-- From Blog content -->
                    <div class="from-blog-content">
                        <?php
                            $args=array('post_type' => 'our-news','posts_per_page' => 4,'post_status' => 'publish',);

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


<!-- Start call to action -->
<section id="call-to-action">
    <img src="<?php bloginfo('template_url'); ?>/assets/images/call-to-action-bg.png" alt="img">
    <div class="call-to-overlay">
        <div class="container">
            <div class="call-to-content wow fadeInUp">
                <h2>Want to keep in touch with intentaware?</h2>
                <h4>Register for our newsletter today</h4>
                <a href="#" class="button button-default" data-text="GET IT NOW" style="border:1px solid #fff !important;color:#fff !important;"><span>Newsletter registration</span></a>
            </div>
        </div>
    </div> 
</section>
<!-- End call to action -->

<!-- Start Team action -->
<section id="team">
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
</section>
<!-- Start Team action -->




<!-- Start Testimonial section -->
<section id="testimonial">
    <img src="<?php bloginfo('template_url'); ?>/assets/images/testimonial-bg.jpg" alt="img">
    <div class="counter-overlay">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Start Testimonial area -->
                    <div class="testimonial-area">
                        <div class="title-area">
                            <h2 class="tittle">TESTIMONIAL</h2>
                            <!--                <span class="tittle-line"></span>              
                        -->              </div>
                        <?php
                            $args=array('post_type' => 'testimonial','post_status' => 'publish',);

                            $my_query = null;
                            $my_query = new WP_Query($args); 

                            if( $my_query->have_posts() ) {
                            ?>
                            <div class="testimonial-conten">
                                <!-- Start testimonial slider -->
                                <div class="testimonial-slider">
                                    <!-- single slide -->
                                    <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
                                        <div class="single-slide">
                                            <p><?php echo get_the_content(); ?></p>
                                            <div class="single-testimonial">
                                                <img class="testimonial-thumb" src="<?php echo wp_get_attachment_image_url(get_post_thumbnail_id(get_the_ID()));?>" alt="img">
                                                <p><?php the_title(); ?></p>
                                            </div>
                                        </div>
                                        <!-- single slide -->
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
</section>
<!-- End Testimonial section -->

<!-- Start Contact section -->
<section id="contact">
    <div class="container">
        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="contact-right wow fadeInRight">
                    <h2>We’d love to hear about your project.</h2>
                    <!-- <form action="" class="contact-form">
                    <div class="form-group col-md-4">                
                    <input type="text" class="form-control" placeholder="Name">
                    </div>
                    <div class="form-group col-md-4">                
                    <input type="email" class="form-control" placeholder="Enter Email">
                    </div>
                    <div class="form-group col-md-4">                
                    <input type="email" class="form-control" placeholder="Phone">
                    </div>              
                    <div class="form-group col-md-12">
                    <textarea class="form-control"></textarea>
                    </div>
                    <div class="header-btn-area">
                    <a class="knowmore-btn" href="#">KNOW MORE</a>
                    </div>
                    </form>-->
                    <?php echo do_shortcode('[contact-form-7 id="69" title="Contact form 1" html_id="contact-form-69" html_class="contact-form"]'); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Contact section -->
<!-- Start Google Map -->
<section id="google-map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m8!1m3!1d6303.67022361714!2d144.955652!3d-37.817331!3m2!1i1024!2i768!4f13.1!4m6!3e6!4m0!4m3!3m2!1d-37.8173306!2d144.9556518!5e0!3m2!1sen!2sbd!4v1442411159706" width="100%" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>  
        </section>
        <!-- End Google Map -->
<?php get_footer(); ?>