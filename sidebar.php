<div id="sidebar">
    <div id="highlights">
        <img src="<?php echo bloginfo('wpurl'); ?>/images/logo.jpg" />
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
            <p class="more"><a href="<?php echo get_option('home'); ?>/highlights/">More &raquo;</a></p>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>
    <div id="navi">
        <?php /* If this is home page */
        if( is_home() ) { ?>
        <table>
            <tr>
                <td class="first_item">Latest</td>
                <td class="current_item"><a href="<?php echo get_option('home'); ?>">Latest</a></td>
                <td><a href="<?php echo get_option('home'); ?>/highlights/">Highlights</a></td>
                <td onmouseover="showtopics()" onmouseout="closetopics()"><a href="#">Topics</a></td>
            </tr>
        </table>
            <?php /*If this is a category */
        } elseif ( is_category() ) { ?>
        <table>
            <tr>
                <td class="first_item"><?php single_cat_title(); ?></td>
                <td><a href="<?php echo get_option('home'); ?>">Latest</a></td>
                <td><a href="<?php echo get_option('home'); ?>/highlights/">Highlights</a></td>
                <td class="current_item" onmouseover="showtopics()" onmouseout="closetopics()"><a href="#">Topics</a></td>
            </tr>
        </table>    
            <?php /* If this is a tag */
        } elseif ( is_tag() ) { ?>
        <table>
            <tr>
                <td class="first_item"><?php single_tag_title(); ?></td>
                <td><a href="<?php echo get_option('home'); ?>">Latest</a></td>
                <td><a href="<?php echo get_option('home'); ?>/highlights/">Highlights</a></td>
                <td class="current_item" onmouseover="showtopics()" onmouseout="closetopics()"><a href="#">Topics</a></td>
            </tr>
        </table>
            <?php /* If this is highlights page */
        } elseif ( is_page('highlights') ) { ?>
        <table>
            <tr>
                <td class="first_item">Highlights</td>
                <td><a href="<?php echo get_option('home'); ?>">Latest</a></td>
                <td class="current_item"><a href="<?php echo get_option('home'); ?>/highlights/">Highlights</a></td>
                <td onmouseover="showtopics()" onmouseout="closetopics()"><a href="#">Topics</a></td>
            </tr>
        </table>
            
            <?php /* If this is a single page */
        } elseif ( is_single() ) { ?>
        <table>
            <tr>
                <td class="first_item">&nbsp;</td>
                <td><a href="<?php echo get_option('home'); ?>">Latest</a></td>
                <td><a href="<?php echo get_option('home'); ?>/highlights/">Highlights</a></td>
                <td onmouseover="showtopics()" onmouseout="closetopics()"><a href="#">Topics</a></td>
            </tr>
        </table>
            <?php /* else */
        } else { ?>
        <table>
            <tr>
                <td class="first_item">&nbsp;</td>
                <td><a href="<?php echo get_option('home'); ?>">Latest</a></td>
                <td><a href="<?php echo get_option('home'); ?>/highlights/">Highlights</a></td>
                <td onmouseover="showtopics()" onmouseout="closetopics()"><a href="#">Topics</a></td>
            </tr>
        </table>
        <?php } ?> 
    </div>
    <div id="topics-mask"></div> 
    <div id="topics" onmouseover="showtopics()" onmouseout="closetopics()">
        <h3>Categories</h3>
        <ul class="wp_list_categories">
        <?php wp_list_categories('style=list&title_li=&orderby=order&order=ASC&show_count=1&hide_empty=0'); ?>
        </ul>
        <h3>Tags</h3>
        <?php wp_tag_cloud('format=list&orderby=name&order=ASC'); ?>
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
