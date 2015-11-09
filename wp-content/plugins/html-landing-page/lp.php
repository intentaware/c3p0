<?php if (!function_exists('wp_head')) exit(); ?>
<?php

/*
  Plugin Name: Landing Page
  Version: 1.0
  Description: Allows you to upload html landing pages and display them instead of the page you choose. Perfect for internet marketing, clickbank offers, etc. To get started just activate the plugin and visit the landing page link in the menu. From there upload a template and select the page you wish to use.
  Author: some.lamer@gmail.com
*/

class cLandingPage
{
  private $path;
  private $url;
  private $inc_path;

  function __construct()
  {
    $upload_dir = wp_upload_dir();
    $this->path = $upload_dir['basedir'] . '/landingpage-templates/';
    $this->inc_path = plugin_dir_path(__FILE__);
    $this->url = $upload_dir['baseurl'] . '/' . basename($this->path) . '/';

    add_action('admin_menu', array($this,'admin_menu')); 
    add_action('admin_init', array($this,'admin_init'));
    add_filter('parse_query', array($this,'parse_query'));
    register_activation_hook( __FILE__, array($this,'activation_hook'));
    register_uninstall_hook( __FILE__, array($this,'uninstall_hook'));
  }

  public function uninstall_hook()
  {
    global $wpdb;
    $wpdb->query("DROP TABLE landingpages");
  }

  public function activation_hook()
  {
    global $wpdb;
    $wpdb->query('
      CREATE TABLE IF NOT EXISTS `landingpages` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `page` int(11) NOT NULL,
        `redir_302` text NOT NULL,
        `rewrite_js` text NOT NULL,
        `rewrite_img` text NOT NULL,
        `rewrite_links` text NOT NULL,
        `rewrite_css` text NOT NULL,
        `rewrite_local` text NOT NULL,
        `template` text NOT NULL,
        PRIMARY KEY (`id`),
        UNIQUE KEY `id` (`id`)
      ) AUTO_INCREMENT=1 ;
    ');

   if (!file_exists($this->path))
     exec('mkdir ' . $this->path);
  }

  public function admin_init()
  {
    wp_register_style('lp-admin', $this->url . 'admin-style.css');
    wp_enqueue_style('lp-admin');
  }

  public function admin_menu()
  {
    $page = add_menu_page(
      'Landing Page',
      'Landing Page',
      'manage_options',
      'lp',
      array($this,'admin_page'),
      null
    );
  }

  public function admin_page()
  {
    include($this->inc_path . 'admin.php');
  }

  private function page_dropdown($name,$selected)
  {
    wp_dropdown_pages(array('name'=>$name,'show_option_none'=>'None','selected'=>$selected,'echo'=>1));
  }

  public function parse_query($wp_query)
  {
    global $wpdb;
    $row = $wpdb->get_row($wpdb->prepare("SELECT * FROM landingpages WHERE page=%d OR page=%d",
      array($wp_query->get_queried_object_id(),$wp_query->get('page_id'))),OBJECT);
    if ($row) {
      $template = $row->template;
      if ($template == '') return;

      $template_url = $this->url . $template . '/';
      $template = $this->path . $template . '/';

      if ($row->redir_302 == 'on') {
        header('Location: ' . $template_url);
        exit();
      }

      $html = file_get_contents($template . 'index.html');
      $doc = DOMDocument::loadHTML($html);
      if ($row->rewrite_img == 'on') {
        $elements = $doc->getElementsByTagName('img');
        foreach ($elements as $ele) {
          if ($ele->hasAttribute('src')) {
            if ($row->rewrite_local == 'on' && substr($ele->getAttribute('src'),0,4) == 'http') continue;
            $ele->setAttribute('src', $template_url . $ele->getAttribute('src'));
          }
        }
      }
      if ($row->rewrite_js == 'on') {
        $elements = $doc->getElementsByTagName('script');
        foreach ($elements as $ele) {
          if ($ele->hasAttribute('src')) {
            if ($row->rewrite_local == 'on' && substr($ele->getAttribute('src'),0,4) == 'http') continue;
            $ele->setAttribute('src', $template_url . $ele->getAttribute('src'));
          }
        }
      }
      if ($row->rewrite_css == 'on') {
        $elements = $doc->getElementsByTagName('link');
        foreach ($elements as $ele) {
          if ($ele->hasAttribute('href')) {
            if ($row->rewrite_local == 'on' && substr($ele->getAttribute('href'),0,4) == 'http') continue;
            $ele->setAttribute('href', $template_url . $ele->getAttribute('href'));
          }
        }
      }
      if ($row->rewrite_links == 'on') {
        $elements = $doc->getElementsByTagName('a');
        foreach ($elements as $ele) {
          if ($ele->hasAttribute('href')) {
            if ($row->rewrite_local == 'on' && substr($ele->getAttribute('href'),0,4) == 'http') continue;
            $ele->setAttribute('href', $template_url . $ele->getAttribute('href'));
          }
        }
      }
      $html = $doc->saveXML();
      echo $html;
      exit();
    }
  }

  private function select_template_dropdown($name = null,$selected = null)
  {
    $dir = $this->path;

    $templates = array();
    $files = scandir($dir);
    foreach ($files as $file) if (is_dir($dir . $file) && $file != '.' && $file != '..') $templates[] = $file;

    echo "<select name=\"$name\">";
    echo "<option value=\"None\">None</option>";
    foreach ($templates as $template) {
      if ($selected == $template) echo "<option value=\"$template\" selected=\"selected\">$template</option>";
      else echo "<option value=\"$template\">$template</option>";
    }
    echo "</select>";
  }
}

$lp = new cLandingPage();

?>