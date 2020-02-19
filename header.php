<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Kenan_IT
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="https://gmpg.org/xfn/11">
		<link rel="shortcut icon" href="https://tech.thelaunch-flagler.unc.edu/wp-content/uploads/2019/05/favicon.png">
		<link rel="shortcut icon" href="wp-content/themes/thelaunch/assets/favicon.png" type="image/png">
		<link rel="icon" href="wp-content/themes/thelaunch/assets/favicon.png" type="image/png">
		<link
        rel="stylesheet"
        href="https://pro.fontawesome.com/releases/v5.12.1/css/all.css"
        integrity="sha384-TxKWSXbsweFt0o2WqfkfJRRNVaPdzXJ/YLqgStggBVRREXkwU7OKz+xXtqOU4u8+"
        crossorigin="anonymous"
      />
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<?php SideNavigation::render(); ?>
		<?php if (is_home()) : ?>
			<header id="header" class="header">
				<?php SearchPane::render(); ?>
				<div id="globe">
				</div>
				<nav id="navigation" class="navigation">
				</nav>
			</header>
		<?php else : ?>
			<header id="header" class="header">
				<?php SearchPane::render(); ?>
				<nav id="navigation" class="navigation">
				</nav>
			</header>
		<?php endif; ?>
		<a class="skip-link screen-reader-text" href="#content">
			<?php esc_html_e( 'Skip to content', 'thelaunch' ); ?>
		</a>
