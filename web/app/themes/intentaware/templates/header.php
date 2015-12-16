<?php if (is_front_page()) {
  ?>
      <nav id="tf-menu" class="navbar navbar-default navbar-fixed-top when-top">
      <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php esc_url(home_url('/')); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/logo-full.png" class="logo"></a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <?php
            if (has_nav_menu('primary_navigation')) : ?>
             <li><?php wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav navbar-right']); ?></li>
             <?php
            endif;
            ?>
          </ul>
        </div>
      </div>
    </nav>
<body>
<?php
}
?>
