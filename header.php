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
<link rel="stylesheet" type="text/css" media="all" href="http://www.maoxuli.com/style.css" />
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
    <p>&quot;The real danger is not that computers will begin to think
        like men, but that men will begin to think like computers.&quot;</p>
    <p class="meta">~ Sydney J. Harris</p>
    <div class="clear"></div>
</div>
<div id="mask">
    <div id="menu">
        <ul>
            <li><a href="http://www.maoxuli.com/">HOME</a></li>
            <li><a href="http://www.maoxuli.com/resume.html">RÉSUMÉ</a></li>
            <li><a href="http://www.maoxuli.com/portfolio/">PORTFOLIO</a></li>
            <li class="current_item"><a href="<?php echo get_option('home'); ?>">INSIGHTS</a></li>
            <li><a href="http://www.notdreams.com/" target="_blank">FAMILY</a></li>
        </ul>
    </div>
    <div id="main">