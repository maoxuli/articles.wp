<div id="side-bar">
  <ul>
    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
    <li id="search">
      <?php include (TEMPLATEPATH . '/searchform.php'); ?>
    </li>
    <li class="side-list">
      <h3>Popular Tags</h3>
      <?php wp_tag_cloud('smallest=10&largest=22&orderby=count&order=DESC&format=list&number=10'); ?>
    <li class="side-list">
      <h3>Categories</h3>
      <ul>
        <?php wp_list_categories('orderby=order&show_count=1&hide_empty=0&hierarchical=true&title_li='); ?>
      </ul>
    </li>
    <li class="side-list">
      <h3>Recent Posts</h3>
      <ul>
        <?php get_archives('postbypost', 5); ?>
      </ul>
    </li>
    <li class="side-list">
      <h3>Recent Comments</h3>
      <ul>
        <?php
global $wpdb;
$sql = "SELECT DISTINCT ID, post_title, post_password, comment_ID,
comment_post_ID, comment_author, comment_date_gmt, comment_approved,
comment_type,comment_author_url,
SUBSTRING(comment_content,1,20) AS com_excerpt
FROM $wpdb->comments
LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID =
$wpdb->posts.ID)
WHERE comment_approved = '1' AND comment_type = '' AND
post_password = ''
ORDER BY comment_date_gmt DESC
LIMIT 6";
$comments = $wpdb->get_results($sql);
$output = $pre_HTML;

foreach ($comments as $comment) {
$output .= "\n<li>"." <a href=\"" . get_permalink($comment->ID) .
"#comment-" . $comment->comment_ID . "\" title=\"on " .
$comment->post_title . "\">" .strip_tags($comment->comment_author)
."</a>"."："  . strip_tags($comment->com_excerpt)
."</li>";
}

$output .= $post_HTML;
echo $output;?>
      </ul>
    </li>
    <li class="side-list">
      <h3>Archives</h3>
      <ul>
        <?php wp_get_archives('type=monthly'); ?>
      </ul>
    </li>
    <li class="side-list">
      <h3>Blog roll</h3>
      <ul>
        <?php get_links('-1', '<li>', '</li>', '<br />', FALSE, 'id', FALSE, FALSE, -1, FALSE); ?>
      </ul>
    </li>
    <!--li class="widget widget_pages">
<h3><span>||</span>Pages</h3>
<ul>
 <?php wp_list_pages('title_li='); ?>
</ul>
</li-->
    <?php endif; ?>
  </ul>
</div>
