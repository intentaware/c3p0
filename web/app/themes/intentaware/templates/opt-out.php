<!--Template Name: Opt-out -->
<?php $page = (get_page_by_title("Opt-Out"));
        $packet = get_the_post_thumbnail($page->ID);
        $src = preg_match_all('@[(a-zA-z//:0-9/.)]+@i', $packet, $matches);
        
    if(has_post_thumbnail($page->ID))
    {
        $image = ($matches[0][6]);
        ?>
        <div id="opt-out" class="text-center imaged" style="background-image: url('<?php echo $image; ?>')">
            <div class="overlay">
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
        </div>  

        <?php

    }
    else
    {
        ?>
        <div id="opt-out" class="text-center">
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
    }
 ?>