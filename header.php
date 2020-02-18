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

$fields = Partials::get_header_fields();
$NAV = SideNavigation::get_instance();

?>
<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="https://gmpg.org/xfn/11">
		<link rel="shortcut icon" href="https://tech.kenan-flagler.unc.edu/wp-content/uploads/2019/05/favicon.png">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<div id="page" class="site">
			<?php echo get_search_form( false ); ?>
			<?php echo $NAV->render_side_nav(); ?>
			<a class="skip-link screen-reader-text" href="#content">
				<?php esc_html_e( 'Skip to content', 'kenan-it' ); ?>
			</a>
			<?php
			echo Partials::get_header_bar( $fields, $NAV );
			if ( is_front_page() )
				echo Partials::get_banner_menu( $fields );
			?>
			<div id="content" class="site-content">
