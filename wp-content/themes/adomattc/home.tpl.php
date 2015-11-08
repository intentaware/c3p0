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
    
<?php /* ?>
<script type="text/javascript" charset="utf-8" src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.tubular.1.0.js"></script>
<script type="text/javascript">
jQuery().ready(function() {
    //jQuery('#video').tubular({videoId: 'MGhxkGOapHM'}); // where idOfYourVideo is the YouTube ID.
});
</script>
<?php */ ?>

<style type="text/css">
.overlay {
  background: none repeat scroll 0 0 rgba(36, 53, 69, 0.8);
  height: 100%;
  left: 0;
  position: fixed;
  top: 0;
  width: 100%;
  z-index: 1;
}
/*.overlay-gradient {
  background: linear-gradient(to bottom, rgba(36, 53, 69, 1) 0%, rgba(36, 53, 69, 0) 100%) repeat scroll 0 0 rgba(0, 0, 0, 0);
  height: 500px;
  width: 100%;
}*/

#video {
  height: 100%;
  left: 0;
  overflow: hidden;
  position: fixed !important;
  top: -20;
  width: 100%;
  z-index: 0;
  background: #000;
}
#video video {
  background: url("<?php echo get_template_directory_uri() ?>/images/poster.png") no-repeat scroll 0 0 / cover  rgba(0, 0, 0, 0);
  min-height: 100%;
  min-width: 100%;
  width: 100%;
  height: auto;
  position: relative;
  z-index: 1;
}
#video img {
  min-height: 100%;
  min-width: 100%;
  width: 100%;
  height: auto;
  position: relative;
  z-index: 1;
}
.showImage {
    display: block !important;
}
</style>


<?php 
   while(have_posts())
   {


    $showVideo = get_post_meta(get_the_ID(), 'wpcf-show-video', true);
    
    $video = $image = $imgClass = '';
    if($showVideo)
    {
        $video = get_post_meta(get_the_ID(), 'wpcf-home-video', true);
        if(empty($video))
        {
            $video = get_template_directory_uri().'/Skiing.mp4';
        }
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
    <?php
    }
    else
    {
        if ( has_post_thumbnail() ) {
            $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
            $imgClass = 'showImage';
        }
    }
?>

<div class="overlay <?php echo $imgClass ?>">
    <div class="overlay-gradient"></div>
</div>
    
<div id="video" class="<?php echo $imgClass ?>">
   <!--<iframe src="https://player.vimeo.com/video/60015330?autoplay=1&loop=1&title=0&byline=0&portrait=0&fullscreen=0" width="100%" height="100%" frameborder="0"></iframe>-->
   <?php if(!empty($video)){ ?>
        <video id="bgvid" poster="<?php echo get_template_directory_uri() ?>/images/poster.png" loop="" autoplay="">
            <source type="video/mp4" src="<?php echo $video; ?>"></source>
        </video>
    <?php }else if(!empty($image)){ ?>
        <img src="<?php echo $image[0]; ?>" />
    <?php } ?>
    
</div>


<div class="row">
    <div class="container">
        <div class="col-lg-12 top" style="z-index: 99;">
            <div class="col-lg-8 wel">
                <?php 
                        the_post();
                        
                        the_title('<h3>', '</h3>');
                        
                        the_content();
       
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
<?php } ?>
<?php get_footer(); ?>