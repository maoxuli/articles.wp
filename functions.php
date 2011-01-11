<?php

if ( ! function_exists( 'twentyten_comment' ) ) :
function twentyten_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
		<div class="comment-author vcard">
			<?php echo get_avatar( $comment, 40 ); ?>
			<?php printf( __( '%s <span class="says">says:</span>', 'twentyten' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
		</div><!-- .comment-author .vcard -->
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'twentyten' ); ?></em>
			<br />
		<?php endif; ?>

		<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
			<?php
				/* translators: 1: date, 2: time */
				printf( __( '%1$s at %2$s', 'twentyten' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'twentyten' ), ' ' );
			?>
		</div><!-- .comment-meta .commentmetadata -->

		<div class="comment-body"><?php comment_text(); ?></div>

		<div class="reply">
			<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div><!-- .reply -->
	</div><!-- #comment-##  -->

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'twentyten' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'twentyten' ), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}
endif;

$post_custom_fields =
    array(
        "post_image" => array(
        "name" => "post_image",
        "std" => "",
        "title" => "Image Path (For Example: http://example.com/wordpress/wp-content/uploads/image-name.jpg):",
        )
);

function post_custom_fields() {
    global $post, $post_custom_fields;

    foreach ($post_custom_fields as $meta_box) {
        $meta_box_value = stripslashes(get_post_meta($post->ID, $meta_box['name'] . '_value', true));

        if ($meta_box_value == "")
            $meta_box_value = $meta_box['std'];

        echo '<p style="margin-bottom:10px;">';
        echo'<input type="hidden" name="' . $meta_box['name'] . '_noncename" id="' . $meta_box['name'] . '_noncename" value="' . wp_create_nonce(plugin_basename(__FILE__)) . '" />';
        echo' ' . $meta_box['title'] . ' ';
        echo'<input type="text" name="' . $meta_box['name'] . '_value" value="' . attribute_escape($meta_box_value) . '" style="width:98%;" /><br />';
        echo '</p>';
    }
}

function create_meta_box() {
    global $theme_name;
    if (function_exists('add_meta_box')) {
        add_meta_box('new-meta-boxes', 'Post Image Location', 'post_custom_fields', 'post', 'normal', 'high');
    }
}

function save_postdata($post_id) {
    global $post, $post_custom_fields;

    foreach ($post_custom_fields as $meta_box) {
        // Verify
        if (!wp_verify_nonce($_POST[$meta_box['name'] . '_noncename'], plugin_basename(__FILE__))) {
            return $post_id;
        }

        if ('page' == $_POST['post_type']) {
            if (!current_user_can('edit_page', $post_id))
                return $post_id;
        } else {
            if (!current_user_can('edit_post', $post_id))
                return $post_id;
        }

        $data = $_POST[$meta_box['name'] . '_value'];

        if (get_post_meta($post_id, $meta_box['name'] . '_value') == "")
            add_post_meta($post_id, $meta_box['name'] . '_value', $data, true);
        elseif ($data != get_post_meta($post_id, $meta_box['name'] . '_value', true))
            update_post_meta($post_id, $meta_box['name'] . '_value', $data);
        elseif ($data == "")
            delete_post_meta($post_id, $meta_box['name'] . '_value', get_post_meta($post_id, $meta_box['name'] . '_value', true));
    }
}

add_action('admin_menu', 'create_meta_box');
add_action('save_post', 'save_postdata');
?>