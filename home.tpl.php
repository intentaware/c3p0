<?php 
/**
* Template Name: Home Page
*/
?>
<?php get_header(); ?>
<?php        
        // WP_Query arguments
        $args = array (
        'post_type'              => 'slider',
        'post_status'            => 'publish',
        'tax_query' => array(
        array(
        'taxonomy' => 'slider_category',
        'field' => 'slug',
        'terms' => 'home-slider'
        )
        )
        );

        // The Query
        $query = new WP_Query( $args );

        // The Loop
        if ( $query->have_posts() ) {
            $i = 0; 
            while ( $query->have_posts() ) {
                $query->the_post();
                // do something
                if(has_post_thumbnail())
                {
                    $image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
                    $thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), array(768, 505) );
                }
                
                $slides[$i] = array(
                                    'image' => $image[0],
                                    'title' => get_the_title(),
                                    'thumb' => $thumb[0],
                                             );
                $i++;
            }
        } 
/*        echo "<pre>"; print_r($slides); die;*/
        
        // Restore original Post Data
        wp_reset_postdata();

    ?>
    <script type="text/javascript">        
        jQuery(function($){
            $.supersized({
                // Components                            
                slide_links                :    'blank',    // Individual links for each slide (Options: false, 'num', 'name', 'blank')
                thumb_links                :    1,            // Individual thumb links for each slide
                thumbnail_navigation    :   0,            // Thumbnail navigation
                slides                     :      <?php echo json_encode($slides); ?>,
            });
        });

</script>


<!--<div class="overlay">
    <div class="overlay-gradient"></div>
</div>-->
    
<!--<div id="video">
   <iframe src="https://player.vimeo.com/video/60015330?autoplay=1&loop=1&title=0&byline=0&portrait=0&fullscreen=0" width="100%" height="100%" frameborder="0"></iframe>
</div>-->


<div class="row">
    <div class="container">
        <div class="col-lg-12 top">
            <div class="col-lg-8 wel">
                <?php 
                    while(have_posts())
                    {
                        the_post();
                        
                        the_title('<h3>', '</h3>');
                        
                        the_content();
                    }
                ?>
            </div>
            <div class="col-lg-4 dis">
                <a href="<?php echo get_permalink(2); ?>" class="btn btn-big btn-white" style="margin-bottom:20px; margin-top:10px;">Advertiser</a>
                <div class="clearfix"></div>
                <a href="<?php echo get_permalink(10); ?>" class="btn btn-big btn-white">Publisher</a>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>