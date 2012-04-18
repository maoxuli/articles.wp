<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>" />
<title><?php
    /*
     * Print the <title> tag based on what is being viewed.
     */
    global $page, $paged;

    wp_title('-', true, 'right');

    // Add the blog name.
    bloginfo('name');

    // Add the blog description for the home/front page.
    $site_description = get_bloginfo('description', 'display');
    if ($site_description && ( is_home() || is_front_page() ))
        echo " - $site_description";

    // Add a page number if necessary:
    if ($paged >= 2 || $page >= 2)
        echo ' - ' . sprintf(__('Page %s', 'twentyten'), max($paged, $page));
?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="http://www.liliqin.com/style.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php
    /* We add some JavaScript to pages with the comment form
     * to support sites with threaded comments (when in use).
     */
    if (is_singular() && get_option('thread_comments'))
        wp_enqueue_script('comment-reply');

    /* Always have wp_head() just before the closing </head>
     * tag of your theme, or you will break many plugins, which
     * generally use this hook to add elements to <head> such
     * as styles, scripts, and meta tags.
     */
    wp_head();
?>
</head>

<body>
<div id="container">
<div id="header">
    <h1><?php bloginfo('name') ?></h1>
    <h2><?php bloginfo('description') ?></h2>
    <p>&quot;Science is built up of facts, as a house is built of stones; but an 
       accumulation of facts is no more a science than a heap of stones is a house.&quot;</p>
    <p class="meta">~ Henri Poincaré, 1905</p>
    <div class="clear"></div>
</div>
<div id="mask">
<div id="menu">
    <table>
        <tr>
            <td><a href="http://www.liliqin.com/">HOME</a></td>
            <td><a href="http://www.liliqin.com/cv.html">ONLINE CV</a></td>
            <td><a href="http://www.liliqin.com/research.html">RESEARCH</a></td>
            <td class="current_item"><a href="<?php echo get_option('home'); ?>">PROTOCOLS</a></td>
            <td><a href="http://www.notdreams.com/" target="_blank">FAMILY</a></li>
        </tr>
    </table>
</div>
<div id="main">