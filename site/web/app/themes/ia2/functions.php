<?php
    if ( ! function_exists( 'intent_setup' ) ) :
        function intent_setup() {
            add_theme_support( 'title-tag' );

            add_theme_support( 'post-thumbnails' );

            register_nav_menus( array(
            'primary' => __( 'Primary Menu', 'intent' ),
            'footer_information'  => __( 'Footer Information Menu', 'intent' ),
            ) );

            add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            ) );
        }
        endif;
    add_action( 'after_setup_theme', 'intent_setup' );

    /**
    * Handles JavaScript detection.
    *
    * Adds a `js` class to the root `<html>` element when JavaScript is detected.
    *
    */
    function intent_javascript_detection() {
        echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
    }
    add_action( 'wp_head', 'intent_javascript_detection', 0 );

    /**
    * Enqueues scripts and styles.
    *
    */
    function intent_scripts() {
        // Add bootstrap, used in the main stylesheet.
         wp_enqueue_style( 'intent-bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css', array() );

        // Theme stylesheet.
        wp_enqueue_style( 'intent-style', get_stylesheet_uri() );

        // Add fontawsome, used in the main stylesheet.
         wp_enqueue_style( 'intent-font', get_template_directory_uri() . '/assets/css/font-awesome.css', array('intent-style') );
         wp_enqueue_style( 'slick-css', get_template_directory_uri() . '/assets/css/slick.css', array('intent-style') );
         wp_enqueue_style( 'fancy-css', get_template_directory_uri() . '/assets/css/jquery.fancybox.css', array('intent-style') );
         wp_enqueue_style( 'animate-css', get_template_directory_uri() . '/assets/css/animate.css', array('intent-style') );
         wp_enqueue_style( 'theme-color-css', get_template_directory_uri() . '/assets/css/theme-color/default.css', array('intent-style') );

        // Load the Internet Explorer specific stylesheet.
        /* wp_enqueue_style( 'linen-ie', get_template_directory_uri() . '/css/ie.css', array( 'linen-style' ), '20150930' );
        wp_style_add_data( 'linen-ie', 'conditional', 'lt IE 10' );

        // Load the Internet Explorer 8 specific stylesheet.
        wp_enqueue_style( 'linen-ie8', get_template_directory_uri() . '/css/ie8.css', array( 'linen-style' ), '20151230' );
        wp_style_add_data( 'linen-ie8', 'conditional', 'lt IE 9' );

        // Load the Internet Explorer 7 specific stylesheet.
        wp_enqueue_style( 'linen-ie7', get_template_directory_uri() . '/css/ie7.css', array( 'linen-style' ), '20150930' );
        wp_style_add_data( 'linen-ie7', 'conditional', 'lt IE 8' );

        // Load the html5 shiv.
        wp_enqueue_script( 'linen-html5', get_template_directory_uri() . '/js/html5.js', array(), '3.7.3' );
        wp_script_add_data( 'linen-html5', 'conditional', 'lt IE 9' );*/


        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
        }

        wp_enqueue_script( 'intent-bootstrap-script', get_template_directory_uri() . '/assets/js/bootstrap.js', array( 'jquery' ), '20151204', true );
        wp_enqueue_script( 'intent-slick-script', get_template_directory_uri() . '/assets/js/slick.js', array( 'jquery' ), '20151204', true );
        wp_enqueue_script( 'intent-waypoints-script', get_template_directory_uri() . '/assets/js/waypoints.js', array( 'jquery' ), '20151204', true );
        wp_enqueue_script( 'intent-counterup-script', get_template_directory_uri() . '/assets/js/jquery.counterup.js', array( 'jquery' ), '20151204', true );
        wp_enqueue_script( 'intent-mixitup-script', get_template_directory_uri() . '/assets/js/jquery.mixitup.js', array( 'jquery' ), '20151204', true );
        wp_enqueue_script( 'intent-fancybox-script', get_template_directory_uri() . '/assets/js/jquery.fancybox.pack.js', array( 'jquery' ), '20151204', true );
        wp_enqueue_script( 'intent-wow-script', get_template_directory_uri() . '/assets/js/wow.js', array( 'jquery' ), '20151204', true );
        wp_enqueue_script( 'intent-custom-script', get_template_directory_uri() . '/assets/js/custom.js', array( 'jquery' ), '20151204', true );
    }
    add_action( 'wp_enqueue_scripts', 'intent_scripts' );

/**
* Registers a widget area.
*
*/
function intent_widgets_init() {
    register_sidebar( array(
    'name'          => __( 'Sidebar', 'intent' ),
    'id'            => 'sidebar-1',
    'description'   => __( 'Add widgets here to appear in your sidebar.', 'intent' ),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
    ) );

}
add_action( 'widgets_init', 'intent_widgets_init' );


/**
    * Custom template tags for this theme.
    */
    require get_template_directory() . '/inc/template-tags.php';

    /**
    * Customizer additions.
    */
    require get_template_directory() . '/inc/customizer.php';


function intent_get_the_popular_excerpt($content, $limit = 40){
    $excerpt = $content;
    $excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
    $excerpt = strip_shortcodes($excerpt);
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, $limit);
    $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
    $excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
    return $excerpt;
}


   function new_excerpt_more($more) {
        global $post;
        return '<div><a class="moretag" href="'. get_permalink($post->ID) . '">Read More</a></div>';
    }
    add_filter('excerpt_more', 'new_excerpt_more');

    function intentaware_comment($comment, $args, $depth) {
        $GLOBALS['comment'] = $comment; 
    ?>

    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
        <div class="x-comment-img">
            <span class="avatar-wrap cf">
                <?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
            </span>
        </div>
        <article id="comment-<?php comment_ID() ?>" class="comment">
            <header class="x-comment-header">
                <?php printf( __( '<cite class="x-comment-author">%s</cite>' ), get_comment_author_link() ); ?>
                <div>
                    <a class="x-comment-time" href="<?php echo htmlspecialchars ( get_comment_link( $comment->comment_ID ) ) ?>">
                        <?php printf(__('<time datetime="%3$s">%1$s at %2$s</time> '), get_comment_date(), get_comment_time(), get_comment_date( 'c' )) ?>
                    </a>
                </div>
            </header>
            
            <section class="x-comment-content">
                <?php comment_text(); ?>
            </section>
            
            <div class="x-reply">
                <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
            </div>
            
        </article>
        <?php if ($comment->comment_approved == '0') : ?>
            <em><?php _e('Your comment is awaiting moderation.') ?></em><br />
        <?php endif; ?>
    <?php
}