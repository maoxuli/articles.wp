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
                <div class="pic">
                    <a href="<?php the_permalink(); ?>" target="_blank">
                        <img src="<?php 
                            $logo = get_post_meta($post->ID, "post_image_value", $single = true); 
                            if(!$logo) {
                                echo bloginfo('wpurl')."/images/post_logo.jpg"; }
                            else {
                                echo bloginfo('wpurl')."/".$logo; } ?> " />
                    </a>
                </div>
                <div class="text">
                    <h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <p class="content"><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 240, " "); ?>
                        <a href="<?php the_permalink(); ?>">[...]</a>
                    </p>
                    <p class="meta"><?php the_time('m/d/Y'); ?> posted in <?php the_category(' '); ?></p>
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
