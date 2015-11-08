<?php 
    /**
    * Template Name: Contact Page
    */
?>
<?php get_header(); ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/font-awesome.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/blog.css">

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/myscripts.js" type="text/javascript"></script>

<script type="text/javascript">
    jQuery(document).ready(function(){
        /*============================================
        Show/Hide Blog Filter Bar
        ==============================================*/
        jQuery('.toggle-btn').click(function(){
            jQuery('.filters-bar').toggleClass('filters-open');
        });
    });

    var $ = jQuery.noConflict();
</script>

<?php if(have_posts()){ ?>

    <?php while(have_posts()){ the_post(); ?>

        <?php 
            /*$blogPage = get_page_by_title('Blog'); 
            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $blogPage->ID ), 'full' );*/
            if ( has_post_thumbnail() ) {
                $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
            }
        ?>
        <style type="text/css">.header-page{background-image: url('<?php echo $image[0]; ?>');} </style>

        <article>
            <header>
                <div data-bottom-top="background-position:50% -100px;" data-top-bottom="background-position:50% -100px;" class="jumbotron header-page header-blog-post skrollable skrollable-between" style="background-position: 50% -100px; position: relative;">
                    <div class="container">
                        <div class="row">
                            <!--<div class="col-md-8 col-md-offset-2">-->
                            <div class="col-md-12">
                                <h1><?php the_title(); ?></h1>
                            </div>
                        </div>
                    </div>
                    <div class="myOverlay"></div>
                </div>


            </header>

            <section id="post" class="main-content blog-content">
                <div class="container">
                    <div class="row">
                        <!--<div class="col-md-8 col-md-offset-2">-->
                        <div class="">
                            <?php /* if ( has_post_thumbnail() ) { ?>
                                <figure class="featured-image"> 
                                <?php the_post_thumbnail( 'full' ); ?>
                                </figure>
                            <?php }*/ ?>

                            <?php the_content(); ?>
                            <form id="contact_form">
                                <div id="sa_contactdiv">
                                    <table>
                                        <tr><td>Name:<span style="color:#D70000">*</span> <br><input id="name" type="text" name="name" required="true"/></td></tr>
                                        <tr><td>E-mail Address: <span style="color:#D70000">*</span><br><input id="email" type="text" name="email" required="true" /></td></tr>
                                        <tr><td>Subject: <span style="color:#D70000">*</span><br><input id="subject" type="text" name="subject" required="true" /></td></tr>
                                        <tr><td>Message: <span style="color:#D70000">*</span><br><textarea id="msg" name="msg" cols="42" rows="9" required="true"></textarea></td></tr>
                                        <tr><td><input id="submit" name="submit" type="submit" value="Send Message" style="font-weight:bold"></td></tr>
                                    </table>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </section>

        </article>
        <?php } ?>

    <?php } ?>

<?php get_footer(); ?>