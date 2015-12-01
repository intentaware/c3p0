 <!--Template Name: plateforms -->

<?php $page = (get_page_by_title("Our Platforms"));
    if(has_post_thumbnail($page->ID))
    {
        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ) ); 
        print_r($image);
        ?>
        
        <div id="tf-services" class="text-center" style="background-image: url('<?php echo $image[0]; ?>')">

        <?php

    }
 ?>
 <div id="tf-services" class="text-center">
        <div class="container">
            <div class="section-title center">
                <h2>Take a look at <strong><?php echo $page->post_title; ?></strong></h2>
                <div class="line">
                    <hr>
                </div>
                <div class="clearfix"></div>
                <p class="intro"><?php echo $page->post_content; ?></p>
            </div>
            <div class="space"></div>
        </div>
    </div>
    <?php 
        $check =  has_post_thumbnail($page->ID);
        $packet = get_the_post_thumbnail($page->ID);
        $src = preg_match('@^(src=)?([^"]+)@i', $packet, $matches);
        var_dump(wp_get_attachment_image_src( get_post_thumbnail_id($post->ID) ));
     ?>