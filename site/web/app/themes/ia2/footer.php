<!-- Start Footer -->    
<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="footer-top-area">             
                    <ul class="nav navbar-nav navbar-right" style="width:220px;margin:0px auto;display:inline-block;">
                    
                        <li><a href="<?php echo ot_get_option('facebooklink'); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="<?php echo ot_get_option('twitterlink'); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="skype:<?php echo ot_get_option('skypelink'); ?>" target="_blank"><i class="fa fa-skype"></i></a></li>
                        <li><a href="<?php echo ot_get_option('googlepluslink'); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="<?php echo ot_get_option('linkedinlink'); ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>

                    </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; <?php echo date('Y'); ?> - <a href="<?php echo get_bloginfo('home'); ?>"><?php echo ot_get_option('copyright_text'); ?></a>&nbsp;All Right Reserved</p>
    </div>
        </footer>
        <?php wp_footer(); ?> 
    </body>
</html>