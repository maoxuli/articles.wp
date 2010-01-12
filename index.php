<?php get_header(); ?>

<div id="post-list">
  <?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post(); ?>
  <div id="post-<?php the_ID(); ?>" class="post-home">
    <h2 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark">
      <?php the_title(); ?>
      </a></h2>
    <p class="post-messages"> <span class="post-time">
      [ <?php the_date(); ?> ]
      </span> <span class="indexpost-meta">
      Posted in
      <?php the_category(',') ?>
      &nbsp;&nbsp;<!--?php the_tags('Tags:', ',', ' '); ?-->
      </span> <span class="comments-popup-link">
      <?php comments_popup_link('Leave a Comment', '1 Comment', '% Comments'); ?>
      </span></p>
    <div class="post-content">
      <?php the_content(__('continue reading...')); ?>
    </div>
  </div>
  <?php endwhile; else: ?>
  <div id="featured-post">
    <h2><a href="<?php the_permalink() ?>">Not Found</a></h2>
    <p>Sorry, but you are looking for something that isn't here.</p>
  </div>
  <?php endif; ?>
  <div class="navigation clearfix">
    <div class="alignleft">
      <?php next_posts_link(__('&laquo; Older Entries')) ?>
    </div>
    <div class="alignright">
      <?php previous_posts_link(__('Newer Entries &raquo;')) ?>
    </div>
  </div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
