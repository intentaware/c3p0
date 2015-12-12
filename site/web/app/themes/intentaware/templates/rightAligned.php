<!--Template Name: rightAligned -->

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
            <div id="<?php echo (str_replace(" ", "-", strtolower($page->post_title))); ?>" class="leftAligned">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="about-text">
                                <div class="section-title">
                                    <h4><?php echo $page->post_title ?></h4>
                                    <?php 
                                        if(array_key_exists("shortline", $custom))
                                        {
                                            ?>
                                                <h2><?php echo $custom['shortline'][0]?></h2>
                                            <?php
                                        }
                                    ?>
                                    <div class="line">
                                        <hr>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>  
                                <p class="textContent"><?php echo $content ?></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <img src="<?php echo $media['0'] ?>" class="img-responsive imgFrame">
                        </div>
                    </div>  
                </div>
            </div>
        <?php
    }
    else
    {
        ?>
            <div id="<?php echo (str_replace(" ", "-", strtolower($page->post_title))); ?>" class="text-center leftAligned">
        <div class="container">
            <div class="section-title center">
                <h4><?php echo $page->post_title ?></h4>
                <?php 
                    if(array_key_exists("shortline", $custom))
                    {
                        ?>
                            <h2><?php echo $custom['shortline'][0]?></h2>
                        <?php
                    }
                ?>
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
