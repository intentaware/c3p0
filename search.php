<?php get_header(); ?>

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/font-awesome.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/blog.css">

<script type="text/javascript">
    jQuery(document).ready(function(){
        /*============================================
        Show/Hide Blog Filter Bar
        ==============================================*/
        jQuery('.toggle-btn').click(function(){
            jQuery('.filters-bar').toggleClass('filters-open');
        });
    });

    var $ = jQuery.noConflict();
</script>
<?php 
    $wp_query->set('post_type', 'post');
    $blogPage = get_page_by_title('Blog'); 
    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $blogPage->ID ), 'full' );
?>


<style type="text/css">.header-page{background-image: url('<?php echo $image[0]; ?>');} </style>
<section data-bottom-top="background-position:50% -100px;" data-top-bottom="background-position:50% -300px;" class="jumbotron header-page header-blog skrollable skrollable-between" style="background-position: 50% -300px;">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>Search Results</h1>
                <br />
                <p><?php printf( __( 'You searched for "%s"', 'twentyfifteen' ), get_search_query() ); ?></p>

            </div>
        </div>
    </div>

</section>

<section id="blogmenu">
    <div class="main-content blog-articles">

        <div class="filters-container">
            <div class="filters-bar clearfix filters-open">
                <div class="filter-input fl">
                    <span class="filter-name">Category:</span>
                    <div class="btn-group">
                        <?php 
                            $cargs = array('show_option_none' => 'Select Category','class' => 'btn-filter', 'id' => 'category_parent', 'name' => 'category_parent','hide_empty' => 0, );
                            wp_dropdown_categories($cargs); 
                        ?>
                    </div>
                    <script type="text/javascript">
                        <!--
                        var dropdown = document.getElementById("category_parent");
                        function onCatChange() {
                            if ( dropdown.options[dropdown.selectedIndex].value > 0 ) {
                                location.href = "<?php echo esc_url( home_url( '/' ) ); ?>?cat="+dropdown.options[dropdown.selectedIndex].value;
                            }
                        }
                        dropdown.onchange = onCatChange;
                        -->
                    </script>
                </div>
                <div class="filter-input fr">
                    <?php echo get_search_form(); ?>
                </div>
                <div class="filter-input fr toggle-styles">
                    <a href="#" class="filter-grid-style active"><i class="fa fa-th-large"></i></a>
                    <a href="#" class="filter-list-style"><i class="fa fa-th-list"></i></a>
                </div>
                <div class="toggle-btn">
                    <div class="toggle-icon">
                        <i class="toggle-line"></i>
                        <i class="toggle-line"></i>
                        <i class="toggle-line"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section id="page">
    <div class="container">
        <div class="row article-loop">
            <?php if(have_posts()){ ?>

                <?php while(have_posts()){ the_post(); ?>

                    <article class="col-md-6 blog-article">
                        <header>
                            <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                            <div class="post-meta">
                                <div class="meta-item post-date">
                                    <i class="fa fa-calendar"></i>
                                    <?php the_time('M dS Y'); ?>
                                </div>
                                <div class="meta-item post-category">
                                    <i class="fa fa-folder"></i>
                                    <?php the_category(', '); ?>
                                </div>                         
                            </div>                    
                        </header>

                        <div class="post-content">
                            <?php if ( has_post_thumbnail() ) { ?>
                                <figure>
                                    <?php the_post_thumbnail( 'full' ); ?>
                                </figure>
                                <?php } ?>
                            <section>
                                <?php the_excerpt(); ?>
                            </section>
                        </div>

                        <footer class="clearfix">
                            <p class="read-more"><a class="btn btn-blue btn-medium" href="<?php the_permalink(); ?>">Read More &gt;</a></p>
                            <p class="social-icons">
                                Share:
                                <a target="blank" href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>&amp;t=<?php the_title(); ?>"><i class="fa fa-facebook"></i></a>
                                <a target="blank" href="http://twitter.com/share?text=<?php the_title(); ?>&amp;url=<?php the_permalink(); ?>&amp;via=Adomattic"><i class="fa fa-twitter"></i></a>
                                <a target="blank" href="https://plus.google.com/share?url=<?php the_permalink(); ?>&amp;t=<?php the_title(); ?>"><i class="fa fa-google-plus"></i></a>
                            </p>
                        </footer>

                    </article>

                    <?php } ?>

                <?php }else{ ?>
                    
                    <article class="hentry clearfix" id="post-not-found">
                        <header class="article-header">
                            <h2 style="text-align: center; text-transform: uppercase;">No Results Found!</h2>
                        </header>
                    </article>
                    
                <?php } ?>
        </div>
    </div>
</section>

        
<script src="<?php echo get_template_directory_uri(); ?>/js/masonry.pkgd.min.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/imagesloaded.pkgd.js" type="text/javascript"></script>

<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.callmasonry.js" type="text/javascript"></script>
<?php get_footer(); ?>