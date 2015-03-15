<form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="form-group search" method="get" ehem="" role="search">
    <input type="text" placeholder="search" lass="form-control" id="s" name="s" value="<?php echo get_search_query(); ?>">
    <button type="submit" class="btn-search"><i class="fa fa-search"></i></button>
</form>    