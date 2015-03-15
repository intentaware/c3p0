<?php
    if ( ! function_exists( 'adomattic_setup' ) ) :
        /**
        * Sets up theme defaults and registers support for various WordPress features.
        *
        * Note that this function is hooked into the after_setup_theme hook, which
        * runs before the init hook. The init hook is too late for some features, such
        * as indicating support for post thumbnails.
        *
        * @since Twenty Fifteen 1.0
        */
        function adomattic_setup() {
            global $wpdb;
            // Add default posts and comments RSS feed links to head.
            add_theme_support( 'automatic-feed-links' );

            /*
            * Let WordPress manage the document title.
            * By adding theme support, we declare that this theme does not use a
            * hard-coded <title> tag in the document head, and expect WordPress to
            * provide it for us.
            */
            add_theme_support( 'title-tag' );

            /*
            * Enable support for Post Thumbnails on posts and pages.
            *
            * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
            */
            add_theme_support( 'post-thumbnails' );

            // This theme uses wp_nav_menu() in two locations.
            register_nav_menus( array(
            'primary' => __( 'Primary Menu',      'adomattic' ),
            ) );

            /*
            * Switch default core markup for search form, comment form, and comments
            * to output valid HTML5.
            */
            add_theme_support( 'html5', array(
            'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
            ) );

            /*
            * Enable support for Post Formats.
            *
            * See: https://codex.wordpress.org/Post_Formats
            */
            add_theme_support( 'post-formats', array(
            'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
            ) );

            $sql = "CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}signup_form_data` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `company_name` varchar(255) NOT NULL,
            `first_name` varchar(100) NOT NULL,
            `last_name` varchar(100) NOT NULL,
            `email` varchar(255) NOT NULL,
            `password` varchar(255) NOT NULL,
            `contact_no` varchar(50) NOT NULL,
            `form_type` varchar(50) NOT NULL,
            `created_date` int(11) NOT NULL,
            PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=latin1";

            $wpdb->query($sql);

        }
        endif; // adomattic_setup
    add_action( 'after_setup_theme', 'adomattic_setup' );

    /**
    * Register widget area.
    *
    * @since Twenty Fifteen 1.0
    *
    * @link https://codex.wordpress.org/Function_Reference/register_sidebar
    */
    function adomattic_widgets_init() {
        register_sidebar( array(
        'name'          => __( 'Widget Area', 'adomattic' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Add widgets here to appear in your sidebar.', 'adomattic' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
        ) );
    }
    add_action( 'widgets_init', 'adomattic_widgets_init' );

    /**
    * Enqueue scripts and styles.
    *
    * @since Twenty Fifteen 1.0
    */
    function adomattic_scripts() {
        // Load the Internet Explorer specific stylesheet.
        wp_enqueue_style( 'adomattic-bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array( ), '20141010' );

        // Load our main stylesheet.
        wp_enqueue_style( 'adomattic-style', get_stylesheet_uri() );

        if(is_front_page()){
            wp_enqueue_style( 'supersized', get_template_directory_uri() . '/css/supersized.css');
        }
        wp_enqueue_script( 'adomattic-bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '20151212' );
        wp_enqueue_script( 'adomattic-easing-js', get_template_directory_uri() . '/js/jquery.easing.min.js', array( 'jquery' ), '20151212' );
        wp_enqueue_script( 'adomattic-supersized-js', get_template_directory_uri() . '/js/supersized.3.2.7.min.js', array( 'jquery' ), '20151212');
        wp_enqueue_script( 'adomattic-scrollerota-js', get_template_directory_uri() . '/js/jquery.scrollerota.js', array( 'jquery' ), '20151212', true );
    }
    add_action( 'wp_enqueue_scripts', 'adomattic_scripts' );

    add_action('admin_menu', 'adomattic_admin_menu');
    function adomattic_admin_menu()
    {
        add_theme_page('adomattic Theme Options', 'Theme Options', 'edit_theme_options', 'adomattic_theme', 'adomattic_theme_option_callback');

        add_menu_page( 'Signup Form Data', 'Signup Form Data', 'manage_options', '/admin/signup_data.php', 'adomatic_signupdata' );
    }

    function adomatic_signupdata()
    {
        global $wpdb;

        $action = ((isset($_REQUEST['action'])) && $_REQUEST['action'] != "") ? $_REQUEST['action'] : 'advertise';

        include('admin/signup_data.php');
    }

    function adomattic_theme_option_callback()
    {
        global $wpdb;

        $action = ((isset($_REQUEST['action'])) && $_REQUEST['action'] != "") ? $_REQUEST['action'] : 'theme_option';

        include('admin/theme_options.php');
    }

    add_action( 'admin_enqueue_scripts', 'adomattic_load_admin_script' );

    function adomattic_load_admin_script() {
        wp_enqueue_media();
        wp_register_script('general-admin', get_template_directory_uri().'/js/general-admin.js', array('jquery'));
        wp_enqueue_script('general-admin');
    }


    function adomattic_pagination($pages = '', $range = 4)
    { 
        $showitems = ($range * 2)+1; 

        global $paged;
        if(empty($paged)) $paged = 1;

        if($pages == '')
        {
            global $wp_query;
            $pages = $wp_query->max_num_pages;
            if(!$pages)
            {
                $pages = 1;
            }
        }  

        if(1 != $pages)
        {
            echo "<div class=\"pagination\"><span>Page ".$paged." of ".$pages."</span>";
            if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
            if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";

            for ($i=1; $i <= $pages; $i++)
            {
                if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
                {
                    echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
                }
            }

            if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">Next &rsaquo;</a>"; 
            if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last &raquo;</a>";
            echo "</div>\n";
        }
    }

    if ( ! function_exists( 'adomattic_comment_nav' ) ) :
        /**
        * Display navigation to next/previous comments when applicable.
        *
        * @since Twenty Fifteen 1.0
        */
        function adomattic_comment_nav() {
            // Are there comments to navigate through?
            if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
            ?>
            <nav class="navigation comment-navigation" role="navigation">
                <h2 class="screen-reader-text"><?php _e( 'Comment navigation', 'twentyfifteen' ); ?></h2>
                <div class="nav-links">
                    <?php
                        if ( $prev_link = get_previous_comments_link( __( 'Older Comments', 'twentyfifteen' ) ) ) :
                            printf( '<div class="nav-previous">%s</div>', $prev_link );
                            endif;

                        if ( $next_link = get_next_comments_link( __( 'Newer Comments', 'twentyfifteen' ) ) ) :
                            printf( '<div class="nav-next">%s</div>', $next_link );
                            endif;
                    ?>
                </div><!-- .nav-links -->
            </nav><!-- .comment-navigation -->
            <?php
            endif;
    }
    endif;


class CSS_Menu_Maker_Walker extends Walker {

    var $db_fields = array( 'parent' => 'menu_item_parent', 'id' => 'db_id' );

    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul>\n";
    }

    function end_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }

    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

        global $wp_query;
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
        $class_names = $value = ''; 
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;

        /* Add active class */
        if(in_array('current-menu-item', $classes)) {
            $classes[] = 'active';
            unset($classes['current-menu-item']);
        }

        /* Check for children */
        $children = get_posts(array('post_type' => 'nav_menu_item', 'nopaging' => true, 'numberposts' => 1, 'meta_key' => '_menu_item_menu_item_parent', 'meta_value' => $item->ID));
        if (!empty($children)) {
            $classes[] = 'has-sub';
        }

        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

        $output .= $indent . '<li' . $id . $value . $class_names .'>';

        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'><span>';
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        $item_output .= '</span></a>';
        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }

    function end_el( &$output, $item, $depth = 0, $args = array() ) {
        $output .= "</li>\n";
    }
}


function adomatic_SearchFilter($query) {
    if ($query->is_search) {
        $query->set('post_type', 'post');
    }
    return $query;
}

add_filter('pre_get_posts','adomatic_SearchFilter');