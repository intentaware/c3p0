<!--Template Name: fullBackground -->
<?php 
$custom = get_post_custom($page->ID);
if(has_post_thumbnail($page->ID))
{
	$thumbId = get_post_thumbnail_id($page->ID);
	$thumbUrl = wp_get_attachment_url($thumbId);
	?>
	<div id="<?php echo (str_replace(" ", "-", strtolower($page->post_title))); ?>" class="text-center imaged" style="background-image: url('<?php echo $thumbUrl ?>')">
            <div class="overlay fullBG">
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