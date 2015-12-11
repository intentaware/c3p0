<!--Template Name: LeftAligned -->

<?php
    $custom = get_post_custom($page->ID);
    $media = array();
    foreach(get_attached_media('image',$page->ID) as $attachment)
    {
        $media[] = $attachment->guid;
        
    }
    if(!empty($media))
    {
        $content = $page->post_content;
        $content = preg_replace("/<img[^>]+\>/i", " ", $content);          
        $content = str_replace(']]>', ']]>', $content);
        ?>
            <div id="" class="leftAligned">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="<?php echo $media['0'] ?>" class="img-responsive">
                        </div>
                        <div class="col-md-6">
                            <div class="about-text">
                                <div class="section-title">
                                    <h4><?php echo $page->post_title ?></h4>
                                    <h2><?php echo $custom['shortline'][0]?></h2>
                                    <div class="line">
                                        <hr>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>  
                                <p class="textContent"><?php echo $content ?></p>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
        <?php
    }
    else
    {
        ?>
            <div id="" class="text-center leftAligned">
        <div class="container">
            <div class="section-title center">
                <h4><?php echo $page->post_title ?></h4>
                <h2><?php echo $custom['shortline'][0]?></h2>
                <div class="line">
                    <hr>
                </div>
                <div class="clearfix"></div>
            </div>
            <p class="textContent"><?php echo $content ?></p>
            <div class="space"></div>
        </div>
    </div>
        <?php
    }               
        ?>
