<div id="sidebar">
    <div id="highlights">
        <img src="<?php bloginfo('wpurl'); ?>/wp-content/uploads/logo/maoxuli.jpg" />
        <div class="box">
            <?php
            $sticky = get_option( 'sticky_posts' );
            $args = array(
                'posts_per_page' => 6,
                'post__in' => $sticky,
                'ignore_sticky_posts' => 1
            );
            $the_query = new WP_Query( $args );
            ?>
            <ul>
                <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                <?php endwhile; ?>
            </ul>
            <?php wp_reset_postdata(); ?>
            <p class="more"><a href="<?php echo get_option('home'); ?>/highlights">More &raquo;</a></p>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>
    <div id="navi">
        <?php /* If this is home page */
        if( is_home() ) { ?>
            <ul>
                <li class="current_item"><a href="<?php echo get_option('home'); ?>">Latest</a></li>
                <li><a href="<?php echo get_option('home'); ?>/highlights">Highlights</a></li>
                <li onmouseover="showtopics()" onmouseout="closetopics()"><a href="#">Topics</a></li>
            </ul>
            <h2>Latest</h2>
            <?php /*If this is a category */
        } elseif ( is_category() ) { ?>
            <ul>
                <li><a href="<?php echo get_option('home'); ?>">Latest</a></li>
                <li><a href="<?php echo get_option('home'); ?>/highlights">Highlights</a></li>
                <li class="current_item" onmouseover="showtopics()" onmouseout="closetopics()"><a href="#">Topics</a></li>
            </ul>    
            <h2><?php single_cat_title(); ?></h2>
            <?php /* If this is a tag */
        } elseif ( is_tag() ) { ?>
            <ul>
                <li><a href="<?php echo get_option('home'); ?>">Latest</a></li>
                <li><a href="<?php echo get_option('home'); ?>/highlights">Highlights</a></li>
                <li class="current_item" onmouseover="showtopics()" onmouseout="closetopics()"><a href="#">Topics</a></li>
            </ul>
            <h2><?php single_tag_title(); ?></h2>
            <?php /* If this is highlights page */
        } elseif ( is_page('highlights') ) { ?>
            <ul>
                <li><a href="<?php echo get_option('home'); ?>">Latest</a></li>
                <li class="current_item"><a href="<?php echo get_option('home'); ?>/highlights">Highlights</a></li>
                <li onmouseover="showtopics()" onmouseout="closetopics()"><a href="#">Topics</a></li>
            </ul>
            <h2>Highlights</h2>
            <?php /* If this is a single page */
        } elseif ( is_single() ) { ?>
            <ul>
                <li><a href="<?php echo get_option('home'); ?>">Latest</a></li>
                <li><a href="<?php echo get_option('home'); ?>/highlights">Highlights</a></li>
                <li onmouseover="showtopics()" onmouseout="closetopics()"><a href="#">Topics</a></li>
            </ul>
            <h2>&nbsp;</h2>
            <?php /* else */
        } else { ?>
            <ul>
                <li><a href="<?php echo get_option('home'); ?>">Latest</a></li>
                <li><a href="<?php echo get_option('home'); ?>/highlights">Highlights</a></li>
                <li onmouseover="showtopics()" onmouseout="closetopics()"><a href="#">Topics</a></li>
            </ul>
            <h2>&nbsp;</h2>
        <?php } ?> 
        <div class="clear"></div>
    </div>
    <div id="topics-mask"></div> 
    <div id="topics" onmouseover="showtopics()" onmouseout="closetopics()">
        <h3>Categories</h3>
        <ul class="wp-cat-list">
            <?php wp_list_categories('orderby=order&style=list&show_count=1&hide_empty=1&depth=1&title_li='); ?> 
        </ul>
        <h3>Tags</h3>
        <?php wp_tag_cloud('format=list&smallest=9&largest=16&number=20&orderby=name&order=ASC&separator= . '); ?>
    </div> 
</div>
<script type="text/javascript" language="javascript" >
    <!--
    function showtopics(){
        document.getElementById("topics-mask").style.display="block";
        document.getElementById("topics").style.display="block";
    }
    function closetopics(){
        document.getElementById("topics-mask").style.display="none";
        document.getElementById("topics").style.display="none";
    }
    -->
</script>
