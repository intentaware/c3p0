<!-- Start Footer -->    
<footer id="footer">
   <!-- <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="footer-top-area">             
                        <?php 
                            wp_nav_menu( array(
                            'menu'              => 'footer menu',
                            'theme_location'    => 'footer_information',
                            'container'         => 'div',
                            'menu_class'        => 'footer-social',
                            )
                            ); 
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>-->
    <div class="footer-bottom">
        <p>&copy; <?php echo date('Y'); ?> - <a href="<?php echo get_bloginfo('home'); ?>"><?php echo ot_get_option('copyright_text'); ?></a>&nbsp;All Right Reserved</p>
    </div>
        </footer>
        <?php wp_footer(); ?> 
    </body>
</html>