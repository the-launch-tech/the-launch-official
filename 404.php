<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Kenan_IT
 */

get_header();
?>
<section class="error-404 not-found">
	<div class="page-content">
		<h1 class="page-title" data-aos="fade-right" data-aos-duration="800" data-aos-delay="1500">The Launch</h1>
		<h4 class="header-subtitle" data-aos="fade-up" data-aos-duration="800" data-aos-delay="1500"><?php esc_html_e( "It looks like you're lost in space!", 'thelaunch' ); ?></h4>
	</header>
	<div id="globe-selector"></div>
	<div id="globe-fader"></div>
</section>
<?php
get_footer();
