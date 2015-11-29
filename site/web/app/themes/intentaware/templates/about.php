<!--Template Name: about -->
<?php $page = (get_page_by_title("About")); ?>
<div id="tf-about">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="img/02.png" class="img-responsive">
                </div>
                <div class="col-md-6">
                    <div class="about-text">
                        <div class="section-title">
                            <h4>About us</h4>
                            <?php echo $page->post_content; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>