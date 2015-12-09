<?php get_template_part('templates/second-header'); ?>
<div class="container blogContainer">
  <div class="text">
  <div class="section-title">
    <?php while (have_posts()) : the_post(); ?>
      <article <?php post_class(); ?>>
        <header>
          <h2 class="entry-title"><strong><?php the_title(); ?></strong></h2>
          <?php get_template_part('templates/entry-meta'); ?>
        </header>
        <div class="line">
          <hr>
        </div>
        <div class="clearfix"></div>
        </div>
        <div class="entry-content">
          <p class="intro"><?php the_content(); ?></p>
        </div>
        <footer>
          <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
        </footer>
        <div class="commentControl">
          <?php comments_template('/templates/comments.php'); ?>
        </div>
      </article>
    <?php endwhile; ?>
  </div>
</div>

