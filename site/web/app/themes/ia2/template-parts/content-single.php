<?php
    /**
    * The template part for displaying single posts
    *
    * @package WordPress
    * @subpackage Twenty_Sixteen
    * @since Twenty Sixteen 1.0
    */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php twentysixteen_post_thumbnail(); ?>
    <div class="entry-wrap">
        <header class="entry-header">
            <?php the_title( '<h2 style="font-size:20px;" class="entry-title">', '</h1>' ); ?>

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



        <div class="entry-content content">
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
