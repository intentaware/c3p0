</div>
<div class="row" id="diff">
    <div class="container">
        <div class="col-lg-12 foot" style="z-index: 99;">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                
                    <div class="navbar-header" id="fooetrHeader">
                      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                    </div>
                    
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <?php 
                        $args = array('theme_location' => 'primary', 'items_wrap' => '<ul id="%1$s" class="%2$s nav navbar-nav">%3$s</ul>',);
                        wp_nav_menu($args); 
                    ?>
                    </div>
                    
                </div>
            </nav>
        </div>
    </div>
</div>

<?php wp_footer(); ?>

<script type="text/javascript">
    jQuery("#scrollerota").scrollerota();
</script>
    </body>
</html>