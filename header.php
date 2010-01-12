<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title>
    <?php wp_title(''); ?>
    <?php if (is_single() or is_page() or is_category()) { ?>
        -
    <?php } ?>
    <?php bloginfo('name'); ?>
</title>
<!--link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/logo.ico" /-->
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php printf(__('%s RSS Feed', 'kubrick'), get_bloginfo('name')); ?>" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php printf(__('%s Atom Feed', 'kubrick'), get_bloginfo('name')); ?>" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php if (is_singular())
    wp_enqueue_script('comment-reply'); ?>
<?php wp_head(); ?>
</head>
    
<body>
<div id="container">
<div id="head">
    <!--img src="<?php bloginfo('template_url'); ?>/images/logo-50x48.gif" alt="Logo" /-->
    <h1><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
    <p><?php bloginfo('description'); ?></p>
</div>
<div id="navi">
    <ul id="left-menu" class="menu-ul">
        <li><a href="<?php bloginfo('url'); ?>">HOME<p>Frontpage</p></a></li>
        <li><a href="http://www.maoxuli.com/">ABOUT ME<p>Personal website</p></a></li>
        <li><a href="http://www.notdreams.com/" target="_blank">NOT DREAMS<p>My life, my story</p></a></li>
    </ul>
    <ul id="right-menu" class="menu-ul">
        <li><a href="http://www.ppengine.com/" target="_blank">PPEngine<p>P2P Internet</p></a></li>
    </ul>
</div>
