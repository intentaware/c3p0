<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js" ng-app="StarterApp">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <title><?php
            /*
            * Print the <title> tag based on what is being viewed.
            */
            global $page, $paged;

            wp_title( '|', true, 'right' );

            // Add the blog name.
            /*bloginfo( 'name' );*/
            //echo stripslashes(get_option('blogname'));

            // Add a page number if necessary:
            if ( $paged >= 2 || $page >= 2 )
                echo ' | ' . sprintf( __( 'Page %s', 'gafsc' ), max( $paged, $page ) );

    ?></title>

    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <script>(function(){document.documentElement.className='js'})();</script>

    <?php 
        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            // enqueue the javascript that performs in-link comment reply fanciness
            wp_enqueue_script( 'comment-reply' );
        }
    ?>

    <?php wp_head(); ?>
    
    <style type="text/css">
        * {
            outline: none;
        }
        
        html{margin-top: 0 !important;}
        
        #scrollerota {
            width: 500px;
            height: 333px;
            overflow: hidden;
            position: relative;
        }

        #scrollerota ul.text {
            list-style: none;
            width: 200px;
            background: url(<?php echo get_template_directory_uri(); ?>/images/pixel.png);
            position: absolute;
            top:0px;
            left: 0;
            padding: 0;
            margin: 0;
            color: #fff;
            font-size: 14px;
            line-height: 20px;
        }

        #scrollerota ul.text li {
            overflow: hidden;
        }

        #scrollerota a.readmore {
            background: #666;
            border: 1px solid #777;
            padding: 5px 0;
            text-align: center;
            color: #fff;
            clear: both;
            display: block;
            width: 80px;
            margin-top: 16px;
            text-decoration: none;
            font-size: 12px;
            line-height: 17px;
        }

        #scrollerota a:hover.readmore {
            background: #888;
            border: 1px solid #999;
            text-decoration: none;
        }

        #scrollerota ul.images {
            list-style: none;
            position: absolute;
            top: 0;
            left: 0;
            padding: 0;
            margin: 0;
        }

        #scrollerota ul.images li {
            float: left;
        }

        #scrollerota .controls {
            position: absolute;
            bottom: 10px;
            right: 10px;
        }

        #scrollerota .controls a {
            width: 22px;
            height: 22px;
            display: block;
            float: left;
            background: url(<?php echo get_template_directory_uri(); ?>/images/controls.png) no-repeat;
        }

        #scrollerota .controls .prev {
            background-position: 0 -22px;
        }

        #scrollerota .controls .next {
            background-position: -23px -22px;
        }

        #scrollerota .controls .play {
            background-position: -23px 0;
            display: none;
        }    

        ul#demo-block{ margin:0 15px 15px 15px; }
        ul#demo-block li{ margin:0 0 10px 0; padding:10px; display:inline; float:left; clear:both; color:#aaa; background:url('<?php echo get_template_directory_uri(); ?>/img/bg-black.png'); font:11px Helvetica, Arial, sans-serif; }
        ul#demo-block li a{ color:#eee; font-weight:bold; }
    </style>
    
    <script type="text/javascript">
        jQuery(document).ready(function(){
            var menu = jQuery('#bs-example-navbar-collapse-1').html();
            jQuery('#navbar').html(menu);
            
            jQuery('#btnNavBar').click(function(){
                jQuery('#blankHeight').slideToggle('slow');
            });
            
        });
    </script>
    
</head>

<body <?php body_class(); ?> layout="column" ng-controller="AppCtrl">
<div class="main2">
<div class="row">
    <nav class="navbar navbar-inverse navbar-fixed-top" style="border-bottom: 1px solid #080808">
        <div class="container">
            <div class="navbar-header" style="text-align: right;">
                <?php if(!is_front_page()){ ?>
                    <a href="#" class="btn btn-big btn-black btn-login" style="/*float:right; */margin:5px 10px;">Login</a>
                <?php } ?>
                
                <a class="navbar-brand" href="<?php echo get_bloginfo('siteurl'); ?>"><img src="<?php echo stripslashes(urldecode(get_option('site_logo'))); ?>" style="margin-top:-10px;"></a>
                <button type="button" class="navbar-toggle collapsed" id="btnNavBar" data-toggle="collapse" data-target="#navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
            </div>
            <div id="blankHeight" style="height: 35px; display: none;"></div>
            <div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">
            </div><!--/.navbar-collapse -->
        </div>
    </nav>
</div>