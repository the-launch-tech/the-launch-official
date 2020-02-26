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
		<?php AsyncLoader::render(); ?>
		<?php if (is_front_page()) : ?>
			<header id="header-home" class="header-home">
				<nav id="navigation-home" class="navigation-home" data-aos="fade-down" data-aos-duration="800" data-aos-delay="1500">
					<?php wp_nav_menu(['menu' => 'Primary']); ?>
					<a href="<?php echo home_url(); ?>" id="logo-home" class="logo-home">
						<img src="<?php echo home_url(); ?>/wp-content/uploads/2020/02/logo-dark.png" alt="The Launch Logo" title="The Launch Logo" />
					</a>
				</nav>
				<div id="header-title-section" class="header-title-section">
					<h1 class="header-title" data-aos="fade-right" data-aos-duration="800" data-aos-delay="1500">The Launch</h1>
					<p class="header-subtitle" data-aos="fade-up" data-aos-duration="800" data-aos-delay="1500">A small and focused web and application development agency founded in 2019.</p>
				</div>
				<div id="globe-selector"></div>
				<div id="globe-fader"></div>
			</header>
		<?php else : ?>
			<header id="header" class="header">
				<nav id="navigation" class="navigation">
					<?php wp_nav_menu(['menu' => 'Interior']); ?>
				</nav>
				<?php if (!is_post_type_archive() && !is_single()) : ?>
					<div id="interior-title-section" class="interior-title-section">
						<h1 class="interior-title" data-aos="fade-left" data-aos-duration="800" data-aos-delay="2000"><?php the_title(); ?></h1>
						<h4 class="interior-subtitle" data-aos="fade-left" data-aos-duration="800" data-aos-delay="2000">The Launch</h4>
					</div>
				<?php else : ?>
					<div id="interior-title-section" class="interior-title-section interior-title-archive">
						<h3 class="interior-subtitle" data-aos="fade-left" data-aos-duration="800" data-aos-delay="2000"><?php the_title(); ?></h3>
					</div>
				<?php endif; ?>
				<div id="wave-selector"></div>
			</header>
		<?php endif; ?>
		<a class="skip-link screen-reader-text" href="#content">
			<?php esc_html_e( 'Skip to content', 'thelaunch' ); ?>
		</a>
