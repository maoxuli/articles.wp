<?php get_header(); ?>

<div id="post-single">
  <?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post(); ?>
  <div class="post-home">
    <h2 class="post-title">
      <?php the_title(); ?>
    </h2>
    <p class="post-messages"> <span class="post-time"> [
      <?php the_date(); ?>
      ] </span> <span class="indexpost-meta">
      Posted in
      <?php the_category(',') ?>
      &nbsp;&nbsp;<!--?php the_tags('Tags:', ',', ' '); ?-->
      </span><span class="comments-popup-link"><a href="#comment">
      <?php comments_number('Leave a Comment', '1 Comment', '% Comments'); ?>
      </a></span></p>
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
  <div id="comment">
    <?php comments_template('', true); ?>
  </div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
