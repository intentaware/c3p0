<?php
    /**
    * The template for displaying Category pages
    *
    * @link https://codex.wordpress.org/Template_Hierarchy
    *
    * @package WordPress
    * @subpackage Twenty_Fourteen
    * @since Twenty Fourteen 1.0
    */

    get_header(); ?>
<link rel='stylesheet' id='dashicons-css'  href='<?php echo get_template_directory_uri(); ?>/assets/css/integrity-light.css' type='text/css' media='all' />
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <section class="main">
            <div id="content" class="row" role="main">

                <?php if ( have_posts() ) : ?>

                    <header class="x-header-landmark x-container max width">
                        <h3 class="h-landmark">
                            <span>
                                <?php if(is_tag()){ ?>
                                    <?php printf( __( 'Tag Archive') ); ?>
                                <?php }else{ ?>
                                    <?php printf( __( 'Category Archive') ); ?>
                                <?php } ?>
                            </span>
                        </h3>

                        <p class="p-landmark-sub">
                            <span>
                                <?php if(is_tag()){ ?>
                                    Below you'll find a list of all posts that have been tagged as
                                    <strong>"<?php echo single_tag_title( '', false ); ?>"</strong>
                                <?php }else{ ?>
                                    Below you'll find a list of all posts that have been categorized as
                                    <strong>"<?php echo single_cat_title( '', false ); ?>"</strong>
                                <?php } ?>
                            </span>
                        </p>

                        <?php
                            // Show an optional term description.
                            $term_description = term_description();
                            if ( ! empty( $term_description ) ) :
                                printf( '<div class="taxonomy-description">%s</div>', $term_description );
                                endif;
                        ?>
                    </header><!-- .archive-header -->

                    <div class="x-container max width offset">
                        <div class="x-main full" role="main">
                            <div id="x-iso-container" class="x-iso-container x-iso-container-posts cols-3 isotope">

                                <?php
                                    // Start the Loop.
                                    while ( have_posts() ) : the_post();
                                    ?>

                                    <article id="post-<?php the_ID(); ?>" <?php post_class(array('isotope-item')); ?>>
                                        <?php twentysixteen_post_thumbnail(); ?>    
                                        <div class="entry-wrap">
                                            <header class="entry-header">
                                                <?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
                                                    <span class="sticky-post"><?php _e( 'Featured', 'twentysixteen' ); ?></span>
                                                    <?php endif; ?>

                                                <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

                                                <p class="p-meta">
                                                    <span><i class="fa fa-pencil"></i><?php the_author(); ?></span>
                                                    <span>
                                                        <time datetime="<?php echo get_the_date( 'c' ); ?>" class="entry-date">
                                                            <i class="fa fa-calendar"></i> <?php the_date(); ?>
                                                        </time>
                                                    </span>
                                                    <span>
                                                        <?php $myCategories = array(); ?>
                                                        <?php foreach((get_the_category()) as $cat) { 
                                                                $myCategories[] = '<a href="'.get_category_link( $cat->cat_ID ).'">'.
                                                                '<i class="fa fa-bookmark"></i> '.$cat->cat_name.
                                                                '</a>';
                                                            } 
                                                            echo implode(", ", $myCategories);
                                                        ?>
                                                    </span>
                                                    <span><a class="meta-comments" title="Leave a comment on: '<?php the_title(); ?>'" href="<?php comments_link(); ?>"><i class="fa fa-comments"></i> Leave a Comment</a></span>
                                                </p>

                                            </header><!-- .entry-header -->

                                            <?php twentysixteen_excerpt(); ?>

                                            <div class="entry-content">
                                                <?php
                                                    /* translators: %s: Name of current post */
                                                    the_excerpt( sprintf(
                                                    __( 'Read More', 'twentysixteen' ),
                                                    get_the_title()
                                                    ) );

                                                    wp_link_pages( array(
                                                    'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentysixteen' ) . '</span>',
                                                    'after'       => '</div>',
                                                    'link_before' => '<span>',
                                                    'link_after'  => '</span>',
                                                    'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>%',
                                                    'separator'   => '<span class="screen-reader-text">, </span>',
                                                    ) );
                                                ?>
                                            </div><!-- .entry-content -->
                                        </div>

                                        <footer class="entry-footer cf">
                                            <?php the_tags(' ', '', ''); ?>
                                        </footer><!-- .entry-footer -->
                                    </article>
                                    <?php
                                        endwhile;
                                    echo '</div>';
                                    // Previous/next page navigation.
                                    the_posts_pagination( array(
                                    'prev_text'          => __( '&larr;', 'twentysixteen' ),
                                    'next_text'          => __( '&rarr;', 'twentysixteen' ),
                                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>',
                                    ) );

                                    // If no content, include the "No posts found" template.
                                    else :
                                    get_template_part( 'template-parts/content', 'none' );

                                    endif;
                            ?>

                        </div>
                    </div>
                </div>
            </div><!-- #content -->
        </section><!-- #primary -->
    </main>
</div>

<script type="text/javascript">
    jQuery(document).ready(function($) {


        var $container = $('#x-iso-container');

        $container.before('<span id="x-isotope-loading"><span>');

        $(window).load(function() {
            $container.isotope({
                itemSelector   : '.x-iso-container > .hentry',
                resizable      : true,
                filter         : '*',
                containerStyle : {
                    overflow : 'hidden',
                    position : 'relative'
                }
            });
            $('#x-isotope-loading').stop(true,true).fadeOut(300);
            $('#x-iso-container > .hentry').each(function(i) {
                $(this).delay(i * 150).animate({'opacity' : 1},500);
            });
        });

        $(window).smartresize(function() {
            $container.isotope({  });
        });

    });
</script>
<script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/assets/js/x-body.min.js'></script>
<?php
get_footer();
