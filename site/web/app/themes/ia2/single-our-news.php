<?php
    /**
    * The template for displaying all single posts for news and attachments
    *
    * @package WordPress
    * @subpackage Twenty_Sixteen
    * @since Twenty Sixteen 1.0
    */

    get_header(); ?>
<link rel='stylesheet' id='dashicons-css'  href='<?php echo get_template_directory_uri(); ?>/assets/css/integrity-light.css' type='text/css' media='all' />
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <section class="main">
            <div class="row">
                <div class="x-container max width offset">
                    <div class="x-main full" role="main">
                        <?php
                            // Start the loop.
                            while ( have_posts() ) : the_post();

                                // Include the single post content template.
                            ?>

                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <?php twentysixteen_post_thumbnail(); ?>
                                <div class="entry-wrap">
                                    <header class="entry-header">
                                        <?php the_title( '<h3 class="entry-title">', '</h3>' ); ?>

                                        <p class="p-meta">
                                            <span><i class="fa fa-pencil"></i><?php the_author(); ?></span>
                                            <span>
                                                <time datetime="<?php echo get_the_date( 'c' ); ?>" class="entry-date">
                                                    <i class="fa fa-calendar"></i> <?php the_date(); ?>
                                                </time>
                                            </span>
                                        </p>

                                    </header><!-- .entry-header -->

                                    <div class="entry-content content" style="margin-top: 5px;">
                                        <?php
                                            the_content();

                                            wp_link_pages( array(
                                            'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentysixteen' ) . '</span>',
                                            'after'       => '</div>',
                                            'link_before' => '<span>',
                                            'link_after'  => '</span>',
                                            'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>%',
                                            'separator'   => '<span class="screen-reader-text">, </span>',
                                            ) );

                                            if ( '' !== get_the_author_meta( 'description' ) ) {
                                                get_template_part( 'template-parts/biography' );
                                            }
                                        ?>
                                    </div><!-- .entry-content -->
                                </div>
                                <footer class="entry-footer cf">
                                    <?php the_tags(' ', '', ''); ?>
                                    <?php
                                        edit_post_link(
                                        sprintf(
                                        /* translators: %s: Name of current post */
                                        __( 'Edit<span class="screen-reader-text"> "%s"</span>', 'twentysixteen' ),
                                        get_the_title()
                                        ),
                                        '<span class="edit-link">',
                                        '</span>'
                                        );
                                    ?>
                                </footer><!-- .entry-footer -->
                            </article><!-- #post-## -->

                            <?php 
                                // If comments are open or we have at least one comment, load up the comment template.
                                if ( comments_open() || get_comments_number() ) {
                                    comments_template();
                                }


                                // End of the loop.
                                endwhile;
                        ?>
                    </div>
                </div>
            </div>
        </section>
    </main><!-- .site-main -->

</div><!-- .content-area -->
<?php get_footer(); ?>
