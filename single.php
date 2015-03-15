<?php get_header(); ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/font-awesome.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/blog.css">

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
                <div data-bottom-top="background-position:50% -100px;" data-top-bottom="background-position:50% -300px;" class="jumbotron header-page header-blog-post skrollable skrollable-between" style="background-position: 50% -300px; position: relative;">
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

                <div class="container">
                    <div class="row">
                        <!--<div class="col-md-8 col-md-offset-2">-->
                        <div class="col-md-11 col-md-offset-1">
                            <div class="post-meta single-post-meta clearfix">
                                <div class="meta-item post-date">
                                    <?php the_time('d S'); ?><br><?php the_time('M'); ?>
                                </div>

                                <div class="meta-item post-category">
                                    <i class="fa fa-folder"></i>
                                    <?php the_category(', '); ?>
                                </div>

                                <div class="meta-item post-comments">
                                    <i class="fa fa-comment"></i>
                                    <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></p>
                                </div>

                                <div class="social-icons">
                                    Share:
                                    <a target="blank" href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>&amp;t=<?php the_title(); ?>"><i class="fa fa-facebook"></i></a>
                                    <a target="blank" href="https://twitter.com/home?status=<?php the_permalink(); ?>&amp;t=<?php the_title(); ?>"><i class="fa fa-twitter"></i></a>
                                    <a target="blank" href="https://plus.google.com/share?url=<?php the_permalink(); ?>&amp;t=<?php the_title(); ?>"><i class="fa fa-google-plus"></i></a>
                                </div>

                            </div>
                        </div>
                    </div>
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

                        </div>
                    </div>
                </div>
            </section>


            <section class="post-author">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 author-box">
                            <div class="author-avatar">
                                <?php echo get_avatar( get_the_author_meta( 'user_email' ), 70 ); ?>
                            </div>
                            <div class="author-info">
                                <h4>Article by: <a href="<?php echo home_url(); ?>"><?php the_author(); ?></a></h4>
                                <?php the_author_meta( 'description' ); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </article>

        <div class="container">
            <?php comments_template(); ?> 
        </div>
        
        <?php } ?>

    <?php } ?>

<?php get_footer(); ?>