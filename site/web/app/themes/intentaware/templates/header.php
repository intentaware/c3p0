<header class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
  <div class="android-header mdl-layout__header mdl-layout__header--waterfall">
  <div class="mdl-layout__header-row">
  <span class="android-title mdl-layout-title">
            <a href="<?= esc_url(home_url('/')); ?>"><img class="brand android-logo-image" src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/logo-full.png"></a>
          </span>
  <div class="android-header-spacer mdl-layout-spacer"></div>
  <div class="android-navigation-container">
    <nav class="android-navigation mdl-navigation" id="navigation">
      <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']);
      endif;
      ?>
    </nav>
    </div>
    </div>
  </div>
</header>