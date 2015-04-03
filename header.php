<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
<title><?php wp_title('|', true, 'right'); ?> <?php bloginfo('name'); ?></title>

<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/favicon.ico" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<script type="text/javascript">
var templateUrl = '<?= get_bloginfo("template_url"); ?>';
</script>

<?php wp_head(); ?>
</head>
<body <?php body_class($class); ?>>

	<header class="main-nav">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><h5>neat</h5></a>
		<ul class="menu">
			<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>blog">blog</a></li>
			<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>stuff">stuff</a></li>
			<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>events">events</a></li>
			<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>about">about</a></li>
			<div id="nav-toggle"><span></span></div>
		</ul>
	</header>
