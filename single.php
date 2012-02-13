<?php get_header(); ?>
<div id="singlepost">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="post">
        <h2 class="post-title"><?php the_title(); ?></h2>
        <p class="post-meta">Posted on <?php the_time('m/d/Y'); ?>. <?php the_tags(); ?>. </p>
        <div class="post-content"><?php the_content(); ?></div>
    </div>
    <?php comments_template( '', true ); ?>
    <?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>

