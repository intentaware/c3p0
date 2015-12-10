<!--Template Name: labs -->
<?php $page = (get_page_by_title("CAREER INFORMATION")); ?>
<div id="tf-clients" class="text-center">
        <div class="overlay">
            <div class="container">

                <div class="section-title center">
                    <h2>Some of <strong><?php echo $page->post_title; ?></strong></h2>
                    <div class="line">
                        <hr>
                    </div>
                    <div class="clearfix"></div>
                    <p class="intro"><?php echo $page->post_content; ?></p>
                </div>
            </div>
        </div>
    </div>