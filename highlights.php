<?php
/* Template Name: Highlights */
?>
<?php get_header(); ?>
<?php get_sidebar(); ?>
<div id="postlist">
    <?php
        $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
        $sticky = get_option( 'sticky_posts' );
        $args = array(
            'paged' => $paged,
            'post__in' => $sticky,
            'ignore_sticky_posts' => 1
        );
        query_posts( $args );
    ?>
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <div class="section">
                <a href="<?php the_permalink(); ?>" target="_blank">
                    <img src="<?php 
                        $logo = get_post_meta($post->ID, "post_image_value", $single = true); 
                        if(!$logo) {
                            $cat = get_the_category(); 
                            $logo = bloginfo('wpurl')."/wp-content/uploads/logo/".$cat[0]->category_nicename.".gif";}
                        echo $logo;
                    ?>" />
                </a>
                <div class="post">
                    <h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <p class="post-content"><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 240, " "); ?>
                        <a href="<?php the_permalink(); ?>">[...]</a>
                    </p>
                    <p class="post-meta"><?php the_time('m/d/Y'); ?> posted in <?php the_category(' '); ?></p>
                </div>
                <div class="clear"></div>
            </div>
        <?php endwhile; ?>
        <div class="navi">
            <div class="left"><?php previous_posts_link('&larr; Newer') ?></div>
            <div class="right"><?php next_posts_link('Older &rarr;') ?></div>
            <div class="clear"></div>
        </div>
    <?php endif; ?>
</div>
<?php get_footer(); ?>
