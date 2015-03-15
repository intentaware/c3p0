<?php get_header(); ?>
<div class="row">
    <div class="container">
        <div class="col-lg-12 top">
                <?php 
                    if(have_posts()){  
                        while(have_posts()){ 
                            the_post();  
                            the_title('<h3>', '</h3>');
                            
                            the_content();
                        }  
                    } 
                ?>
                
            
        </div>
    </div>
</div>
<?php get_footer(); ?>