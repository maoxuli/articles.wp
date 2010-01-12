<?php get_header(); ?>

<div id="post-list">
  <?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post(); ?>
  <div class="post-home">
    <h2 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark">
      <?php the_title(); ?>
      </a></h2>
    <p class="post-messages"> <span class="post-time"> [
      <?php the_date(); ?>
      ] </span> <span class="indexpost-meta"> Posted in
      <?php the_category(',') ?>
      </span><span class="comments-popup-link"><a href="#comment">
      <?php comments_number('Leave a Comment', '1 Comment', '% Comments'); ?>
      </a></span></p>
    <div class="post-content">
      <?php the_excerpt(); ?>
    </div>
  </div>
  <?php endwhile; ?>
  <div class="navigation clearfix">
    <div class="alignleft">
      <?php next_posts_link(__('&laquo; Older Entries')) ?>
    </div>
    <div class="alignright">
      <?php previous_posts_link(__('Newer Entries &raquo;')) ?>
    </div>
  </div>
  <?php else : ?>
  <p>
    <?php _e('No posts found. Try a different search?'); ?>
  </p>
  <?php include (TEMPLATEPATH . '/searchform.php'); ?>
  <?php endif; ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
