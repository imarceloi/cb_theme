<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till #main div
 *
 * @package Odin
 * @since 2.2.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="no-js ie ie7 lt-ie9 lt-ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="no-js ie ie8 lt-ie9" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html class="no-js" <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon.ico" rel="shortcut icon" />
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/html5.js"></script>
	<![endif]-->
	<!--GOOGLE WEB FONTS-->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,600,400' rel='stylesheet' type='text/css'>
	<!--BX SLIDER CSS-->
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/jquery.bxslider.css">
	<?php wp_head(); ?>
	<!--CUSTOM CSS-->
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/custom.css">
</head>

<body <?php body_class(); ?>>
	<header id="header" class="navbar-fixed-top" role="banner">
		<nav id="main-navigation" class="navbar navbar-default container" role="navigation">
			<a class="navbar-brand" href="#inicio" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">							
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
			</a>
			<a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'odin' ); ?>"><?php _e( 'Skip to content', 'odin' ); ?></a>
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-navigation">
				<span class="sr-only"><?php _e( 'Toggle navigation', 'odin' ); ?></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse navbar-main-navigation navbar-right">
				<?php
					wp_nav_menu(
						array(
							'theme_location' => 'main-menu',
							'depth'          => 2,
							'container'      => false,
							'menu_class'     => 'nav navbar-nav',
							'fallback_cb'    => 'Odin_Bootstrap_Nav_Walker::fallback',
							'walker'         => new Odin_Bootstrap_Nav_Walker()
						)
					);
				?>
			</div><!-- .navbar-collapse -->
		</nav><!-- #main-menu -->
	</header><!-- #header -->

	<div id="main" class="site-main">
