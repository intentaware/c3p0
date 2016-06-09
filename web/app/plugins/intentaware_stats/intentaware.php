<?php
    /**
    * Plugin Name:IntentAware Utilities
    * Author: IntentAware
    * Author URI: http://intentaware.com
    * Version:1.0
    * Description:This plugin include script on head tag and generate reports
    */

    global $wpdb,$intentClassObj;

    require 'inc/intentaware.cls.php';

    /* Runs when plugin is activated */
    register_activation_hook(__FILE__ ,'intentaware_plugin_install'); 

    if ( !function_exists('intentaware_plugin_install' ) ) {
        function intentaware_plugin_install() {
            global $wpdb;
        }
    }

    function intent_load_scripts($hook) {

        if ( 'intentaware_page_intent-report' != $hook ) {
            return;
        }
        wp_enqueue_style( 'bootstrap-min',plugins_url('/css/bootstrap.min.css',__FILE__), array( ), false,'all');
        wp_enqueue_style( 'dataTables-css',plugins_url('/css/dataTables.bootstrap.min.css',__FILE__), array( ), false,'all');
        wp_enqueue_style( 'responsive-bootstrap', plugins_url('/css/responsive.bootstrap.min.css',__FILE__), array( ), false ,'all');
        wp_enqueue_script( 'bootstrap-min-js', plugins_url('/js/bootstrap.min.js', __FILE__) , array( 'jquery' ), false, true );
        wp_enqueue_script( 'jquery-dataTables', plugins_url('/js/jquery.dataTables.min.js', __FILE__) , array( 'jquery' ), false, true );
        wp_enqueue_script( 'dataTables-bootstrap', plugins_url('/js/dataTables.bootstrap.min.js', __FILE__) , array( 'jquery' ), false, true );
        wp_enqueue_script( 'dataTables-responsive', plugins_url('/js/dataTables.responsive.min.js', __FILE__) , array( 'jquery' ), false, true );
        wp_enqueue_script( 'responsive-bootstrap-js', plugins_url('/js/responsive.bootstrap.min.js', __FILE__) , array( 'jquery' ), false, true );
        wp_enqueue_script( 'custome-js', plugins_url('/js/custome.js', __FILE__) , array( 'jquery' ), false, true );
    }  
    add_action( 'admin_enqueue_scripts', 'intent_load_scripts'); 

    add_action( 'admin_menu', 'intent_plugin_menu' );

    if ( !function_exists('intent_plugin_menu' ) ) {
        function intent_plugin_menu() {
            add_menu_page ( 'Intentaware', 'Intentaware', 'manage_options', 'setting', 'intent_plugin_options');
            add_submenu_page ( 'setting', 'Settings', 'Settings', 'manage_options', 'setting');
            add_submenu_page ( 'setting', 'Reports', 'Reports', 'manage_options', 'intent-report','intent_report_callback');
        }
    }
    if ( !function_exists('intent_plugin_options' ) ) {
        function intent_plugin_options() {
            if ( !current_user_can( 'manage_options' ) )  {
                wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
            }
            include('admin/settings.php');
        }
    }

    if ( !function_exists('intent_report_callback' ) ) {
        function intent_report_callback() {
            if ( !current_user_can( 'manage_options' ) )  {
                wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
            }
            global $wpdb,$intentClassObj;
            $action = (isset($_REQUEST['action']) && $_REQUEST['action'] != "") ? $_REQUEST['action'] : 'datatable';

            include("admin/intent_admin_{$action}.php");
        }
    }

    add_action('wp_head', 'AddJavascriptToHead');

    if ( !function_exists('AddJavascriptToHead' ) ) {

        function AddJavascriptToHead(){
            $publisherId = get_option('publisherid');
            $assetId = get_option('assetid');
            if($publisherId !='' && $assetId !=''){
            ?>
            <script>
                (function() {
                    document.intentaware = "<?php echo $publisherId; ?>";
                    document.assetID = "<?php echo $assetId; ?>";
                    var b = document.currentScript.parentNode,
                    a = document.createElement("script");
                    a.type = "text/javascript";
                    a.async = !0;
                    a.src = "https://app.intentaware.com/magneto/guages.js";
                    b.appendChild(a)
                })();
            </script>
            <?php
            } 
        }

        add_action('init', 'intent_init_callback');
        if ( !function_exists('intent_init_callback' ) ) {
            function intent_init_callback()
            {
                global $intentClassObj;    

                $publisherKey = get_option('publisherid');
                $assetKey = get_option('assetid');
                $intentClassObj = new intentawarecls($publisherKey,$assetKey);

            }
        }

    }

    add_action( 'wp_ajax_csv', 'create_csv_callback' );
    add_action( 'wp_ajax_nopriv_csv', 'create_csv_callback' );

    if ( !function_exists('create_csv_callback' ) ) {
        function create_csv_callback()
        {
            global $intentClassObj;

            if ( !current_user_can( 'manage_options' ) )  {
                wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
            }

            $filename = date('Y-m-d');
            header("Content-type: text/csv");
            header("Content-Disposition: attachment; filename=api-report-$filename.csv");
            header("Pragma: no-cache");
            header("Expires: 0");
            $csvData = $intentClassObj->getCsvData();
            echo $csvData;
            die;
        }
    }

    function intent_add_dashboard_widgets() {
        add_meta_box( 'intent_dashboard_widget', 'IntentAware History', 'intent_dashboard_widget_function', 'dashboard', 'side', 'high' );
    }
    add_action( 'wp_dashboard_setup', 'intent_add_dashboard_widgets' );

    function intent_dashboard_widget_function() {
        global $intentClassObj;
        include("admin/admin_dashboard_widget.php");
    }
    
    function array_sort_by_column(&$array, $column, $direction = SORT_ASC) {
        $reference_array = [];

        foreach($array as $key => $row) {
            $reference_array->$key = $row->$column;
        }

        array_multisort($reference_array, $direction, $array);
    }
?>