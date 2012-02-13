<div id="comments">
    <?php if (post_password_required()) : ?>
        <p class="nopassword"><?php _e('This post is password protected. Enter the password to view any comments.', 'twentyten'); ?></p>
    </div><!-- #comments -->
    <?php
    /* Stop the rest of comments.php from being processed,
     * but don't kill the script entirely -- we still have
     * to fully load the template.
     */
    return;
endif;
?>

<?php
// You can start editing here -- including this comment!
?>
<h2 class="comments-title">Comments <span>(<?php echo number_format_i18n(get_comments_number()); ?>)</span></h2>
<?php if (have_comments()) : ?>
    <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : // Are there comments to navigate through?  ?>
        <div class="navigation">
            <div class="nav-previous"><?php previous_comments_link(__('<span class="meta-nav">&larr;</span> Older', 'twentyten')); ?></div>
            <div class="nav-next"><?php next_comments_link(__('Newer <span class="meta-nav">&rarr;</span>', 'twentyten')); ?></div>
            <div class="clear"></div>
        </div> <!-- .navigation -->
    <?php endif; // check for comment navigation  ?>

    <ol class="commentlist">
        <?php
        /* Loop through and list the comments. Tell wp_list_comments()
         * to use twentyten_comment() to format the comments.
         * If you want to overload this in a child theme then you can
         * define twentyten_comment() and that will be used instead.
         * See twentyten_comment() in twentyten/functions.php for more.
         */
        wp_list_comments(array('callback' => 'twentyten_comment'));
        ?>
    </ol>

    <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : // Are there comments to navigate through?  ?>
        <div class="navigation">
            <div class="nav-previous"><?php previous_comments_link(__('<span class="meta-nav">&larr;</span> Older', 'twentyten')); ?></div>
            <div class="nav-next"><?php next_comments_link(__('Newer <span class="meta-nav">&rarr;</span>', 'twentyten')); ?></div>
            <div class="clear"></div>
        </div><!-- .navigation -->
    <?php endif; // check for comment navigation  ?>
<?php endif; // end have_comments() ?>

<?php comment_form(); ?>

</div>
