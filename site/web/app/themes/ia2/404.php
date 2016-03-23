<?php
    /**
    * The template for displaying 404 pages (not found)
    *
    * @package WordPress
    * @subpackage Twenty_Sixteen
    * @since Twenty Sixteen 1.0
    */

    get_header(); ?>
<link rel='stylesheet' id='dashicons-css'  href='<?php echo get_template_directory_uri(); ?>/assets/css/integrity-light.css' type='text/css' media='all' />
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <div class="row">
            <div class="x-container max width offset">
                <div class="x-main full" role="main">
                    <section class="error-404 not-found">
                        <header class="page-header">
                            <h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.'); ?></h1>
                        </header><!-- .page-header -->

                        <div class="page-content">
                            <p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?' ); ?></p>

                            <?php get_search_form(); ?>
                        </div><!-- .page-content -->
                    </section><!-- .error-404 -->
                </div>
            </div>
        </div>
    </main><!-- .site-main -->

    </div><!-- .content-area -->

<?php get_footer(); ?>
