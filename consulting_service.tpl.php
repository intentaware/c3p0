<?php 
    /**
    * Template Name: Consulting Services
    */
?>
<?php get_header(); ?>

<style type="text/css">
    body.page-template-consulting_service-tpl .myContainer {
/*        width: 940px;*/
        text-align: center;
    }
    .page-template-consulting_service-tpl .page-header {
        border-bottom: medium none;
        margin-bottom: 0;
        text-align: center;
    }
    .page-template-consulting_service-tpl .mytop
    {
        margin-top: 50px;
        width: 100%;
    }
    .page-template-consulting_service-tpl .package {
        border: 1px solid #d8dee4;
        border-radius: 3px;
        box-sizing: border-box;
        padding: 20px;
        text-align: center;
        margin-bottom: 20px;
    }
    .page-template-consulting_service-tpl .package h3 {
        font-weight: bold;
        margin-top: 0;
    }

    .page-template-consulting_service-tpl .package h4.price {
         color: #c8cdd2;
        font-size: 52px;
        font-weight: bold;
        line-height: 55px;
        margin-bottom: 20px;
        margin-top: 0;
    }
    .page-template-consulting_service-tpl .package ul {
        list-style: outside none none;
        margin: 0;
        padding: 0;
    }
    .page-template-consulting_service-tpl .package ul li {
        color: #546678;
        letter-spacing: 1px;
        line-height: 25px;
    }
    .myContainer .row {
        margin-bottom: 20px;
    }
    .myContainer .contact {
        text-align: center;
    }
    .myContainer .contact .pseudoButton {
        border-color: #c0272c;
        border-width: 2px;
        color: #c0272c;
        background-clip: padding-box;
        border-radius: 8px 8px 0;
        font-size: 16px;
        line-height: 18px;
        min-width: 161px;
        padding: 11px 30px;
        width: 100%;
        z-index: 0;
        transition: all 0.5s ease-out 0s;
         position: relative;
    }
    .myContainer .contact a:hover {
         background: none repeat scroll 0 0 #c0272c;
         color: #fff;
        text-decoration: none;
    }
    .myContainer .contact span {
        font-size: 24px;
        position: relative;
        top: 3px;
    }
    .myFullWidth h3{
        color: #2a333c;
    }
    @media only screen and (min-width:200px) and (max-width:340px){
        .page-template-consulting_service-tpl .package h4.price {
            font-size: 40px;
        }
    }
    @media only screen and (min-width:341px) and  (max-width:380px){
        .page-template-consulting_service-tpl .package h4.price {
            font-size: 48px;
        }
    }
</style>
<div class="row mytop">&nbsp;</div>

<?php if(have_posts()){ ?>

    <?php while(have_posts()){ the_post(); ?>
        <?php  
            $email = get_post_meta(get_the_ID(), 'wpcf-email', true);
            $subject = get_post_meta(get_the_ID(), 'wpcf-email-subject', true);
        ?>
        <div class="container myContainer">
            <div class="row">
                <div class="col-md-12 myFullWidth">
                    <div class="page-header">
                        <h1><?php the_title(); ?></h1>
                        <h3><?php the_content(); ?></h3>
                    </div>

                    <div class="row">
                    
                        <?php 
                            for($i=1; $i<=2; $i++)
                            {
                        ?>
                            <div class="col-md-6">
                                <div class="package">
                                    <h3><?php echo get_post_meta(get_the_ID(), "wpcf-package-block-{$i}-title", true); ?></h3>
                                    <h4 class="price"><?php echo get_post_meta(get_the_ID(), "wpcf-package-block-{$i}-price", true); ?></h4>
                                    
                                    <?php 
                                        $features = "";
                                        $features = explode('<br />', nl2br(get_post_meta(get_the_ID(), "wpcf-package-block-{$i}-features", true))); 
                                    ?>
                                    
                                    <ul>
                                        <?php foreach($features as $feature){ ?>
                                            <li><?php echo $feature; ?></li>
                                        <?php } ?>
                                    </ul>

                                </div>
                            </div>
                        <?php } ?>

                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <h3>Get in touch to discuss a solution that's best for you.</h3>
                        </div>
                    </div>

                    <div class="row contact">
                        <div class="col-md-4 col-md-offset-4">
                            <a class="btn btn-blue btn-medium pseudoButton" href="mailto:<?php echo $email; ?>?subject=<?php echo $subject; ?>">
                                <span class="icon glyphicon-envelope"></span>
                                <?php echo $email; ?>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <?php } ?>

    <?php } ?>

<?php get_footer(); ?>