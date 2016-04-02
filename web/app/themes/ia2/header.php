<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/icon" href="<?php echo ot_get_option('favicon_icon'); ?>"/>

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!-- BEGAIN PRELOADER -->
<div id="preloader">
    <div class="loader">&nbsp;</div>
</div>
<!-- END PRELOADER -->

<!-- SCROLL TOP BUTTON -->
<a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
<!-- END SCROLL TOP BUTTON -->

<!-- Start header section -->  

<div class="navbar-wrapper header-section">
    <div class="row">
        <nav class="navbar navbar-inverse navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php bloginfo('home'); ?>"><img src="<?php echo ot_get_option('logo'); ?>"></a>
                </div>
                <div id="navbar" class="navbar-collapse collapse navbar-right">

                    <ul class="nav navbar-nav navbar-right" style="margin-right:10px;">
                    
                        <li><a href="<?php echo ot_get_option('facebooklink'); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="<?php echo ot_get_option('twitterlink'); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="<?php echo ot_get_option('skypelink'); ?>" target="_blank"><i class="fa fa-skype"></i></a></li>
                        <li><a href="<?php echo ot_get_option('googlepluslink'); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="<?php echo ot_get_option('linkedinlink'); ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>

                    </ul>
                    <div class="clearfix"></div>

                    <?php
                        wp_nav_menu( array(
                        'menu'              => 'header menu',
                        'theme_location'    => 'primary',
                        'container'         => 'ul',
                        'menu_class'        => 'nav navbar-nav navbar-right',
                        )
                        );
                    ?>
                </div>
            </div>
        </nav>

    </div>
</div>