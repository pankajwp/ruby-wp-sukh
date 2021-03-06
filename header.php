<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package CMSSuperHeroes
 * @subpackage CMS Theme
 * @since 1.0.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="initial-scale=1, width=device-width" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="shortcut icon" type="image/x-icon" href="<?php book_junky_favicon_icon(); ?>" />
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<?php book_junky_page_loading(); ?>
	<?php book_junky_start_boxed(); ?>
	<div id="page" class="hfeed site">
		<header id="masthead" class="site-header">
			<?php book_junky_header(); ?>
		</header><!-- #masthead -->
	    <?php book_junky_page_title(); ?><!-- #page-title -->
		<div id="content" class="site-content">