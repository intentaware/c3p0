<?php 
    /**
    * Template Name: Contact Us
    */
?>
<?php get_header(); ?>
<style type="text/css">
    .breadcrumb {
        background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
        display: inline-block;
        margin: 0;
        padding: 25px 0;
    }
</style>
<?php if(have_posts()){
        while(have_posts()){
            the_post();
            $feat_image_url = '';
            if ( has_post_thumbnail() ) {

                $feat_image = wp_get_attachment_image_src( get_post_thumbnail_id(),"full");
                $feat_image_url = $feat_image[0];

            } 

        ?>
        <section class="main" style="background:#eee">
            <!--<div class="row">
            <div class="block-breadcrumb">
            <div class="container">
            <ul class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">Contact</li>
            </ul>
            </div>
            </div>
            </div>-->
            <div class="midd2">
                <div class="container">
                    <h4 class="head-color"><?php echo linen_page_title(get_the_title());?></h4>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="block-form box-border">
                            <h3><i class="fa fa-thumb-tack"></i>Our Address</h3>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </p>
                            <hr>
                            <h3><i class="fa fa-envelope-o"></i>Send Message</h3>
                            <?php echo do_shortcode('[contact-form-7 id="48" title="Untitled"]'); ?>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="block-form box-border">
                            <h3><i class="fa fa-adn"></i>Map</h3>
                            <hr>
                            <div class="google-map">
                                <iframe frameborder="0" style="overflow:hidden;height:100%;width:100%;" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d335900.93392687745!2d2.3504871190777603!3d48.87296719673322!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sru!2s!4v1394030722365"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php
            echo do_shortcode('[support_info]');
} }?>
<?php get_footer(); ?>
