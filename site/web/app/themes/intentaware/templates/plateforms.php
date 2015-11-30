 <!--Template Name: plateforms -->

<?php $page = (get_page_by_title("Our Platforms")); ?>
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
