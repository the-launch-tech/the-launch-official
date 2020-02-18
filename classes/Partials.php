<?php

class Partials {
	private static $instance = null;

	public static function get_instance() {
		if ( null == self::$instance )
			self::$instance = new self;
		return self::$instance;
	}

	private function __construct() {}

	public function query_footer() {
		$query = array(
			'post_type' => 'footer',
			'post_status' => 'publish',
			'posts_per_page' => 1,
			'meta_key' => 'is_active',
			'meta_value' => true
		);

		$footers = new WP_Query( $query );

		wp_reset_postdata();

		return $footers->have_posts() ?
			$footers :
			null;
	}

	public function get_header_fields() {
		$banner_image = get_field( 'h_banner_image', 'options' );
		$site_title = get_field( 'site_title', 'options' );

		return array(
			'banner_image' => $banner_image,
			'site_title' => $site_title ? $site_title : 'Kenan-Flagler'
		);
	}

	public function get_header_bar( $fields, $NAV ) {
		$output = '';

		$output .= is_front_page() ? '<header id="home-top-bar" class="top-bar">' : '<header id="standard-top-bar" class="top-bar">';
		$output .= '<div class="top-bar-container">';
		$output .= '<a class="top-bar-branding" href="' . get_home_url() . '">';
		$output .= '<svg xmlns="http://www.w3.org/2000/svg" width="331" height="48" viewBox="0 0 331 48"><g fill="none" fill-rule="evenodd"><path fill="#FFF" fill-rule="nonzero" d="M190.13 18l-3.73-5.47v5.34h-2.93V6.27h2.93v4.93l3.47-4.93h3.33l-4.13 5.46 4.26 5.74-3.2.53"></path><path fill="#FFF" fill-rule="nonzero" d="M194.8 17.87V6.27h7.2v2.4h-4.4v2.13h3.33l.4 2.27h-3.73v2.4h4.53v2.4h-7.33"></path><path fill="#FFF" fill-rule="nonzero" d="M211.6 17.87l-4.53-6.94v6.94h-2.67V6.27h2.8l4.27 6.53V6.27H214v11.6h-2.4"></path><path fill="#FFF" fill-rule="nonzero" d="M220 13.2h2.53l-1.2-4-1.33 4zm-.13-6.93h3.2l4 11.2-2.94.53-.8-2.53h-4l-.8 2.4h-2.8l4.14-11.6z"></path><path fill="#FFF" fill-rule="nonzero" d="M235.87 17.87l-4.54-6.94v6.94h-2.66V6.27h2.8l4.26 6.53V6.27h2.67v11.6h-2.53"></path><path fill="#FFF" fill-rule="nonzero" d="M240.8 14.13v-2.4h4.53v2.4h-4.53"></path><path fill="#FFF" fill-rule="nonzero" d="M250.67 8.67v2.4h2.93l.4 2.4h-3.33v4.4h-2.94V6.27h6.94v2.4h-4"></path><path fill="#FFF" fill-rule="nonzero" d="M256.53 17.87V6.27h2.94v9.06h3.46l.4 2.54h-6.8"></path><path fill="#FFF" fill-rule="nonzero" d="M268.93 13.2h2.54l-1.34-4-1.2 4zm-.13-6.93h3.07l4 11.2-2.8.53-.94-2.53h-4l-.66 2.4h-2.8l4.13-11.6z"></path><path fill="#FFF" fill-rule="nonzero" d="M282.4 18c-3.73 0-5.73-2.4-5.73-5.87 0-3.6 2.26-6 5.73-6a7.2 7.2 0 0 1 3.6.8l-.4 2.54c-.93-.54-1.87-1.07-3.07-1.07-2 0-2.93 1.47-2.93 3.73 0 2.14.93 3.6 2.93 3.6.67 0 1.07-.13 1.6-.4v-2h-2l-.4-2.13h4.8v5.6c-1.2.8-2.53 1.2-4.13 1.2"></path><path fill="#FFF" fill-rule="nonzero" d="M289.07 17.87V6.27h2.8v9.06h3.6l.4 2.54h-6.8"></path><path fill="#FFF" fill-rule="nonzero" d="M297.6 17.87V6.27h7.07v2.4h-4.27v2.13h3.33l.27 2.27h-3.6v2.4h4.4v2.4h-7.2"></path><path fill="#FFF" fill-rule="nonzero" d="M310.8 8.53h-.93v3.34h.93c1.2 0 1.87-.67 1.87-1.74 0-1.06-.67-1.6-1.87-1.6zm2.4 9.47l-2.53-4.13h-.8v4h-2.8V6.27h4c2.8 0 4.4 1.33 4.4 3.73 0 1.6-.8 2.67-2.14 3.2l2.8 4.27-2.93.53z"></path><path fill="#FFF" fill-rule="nonzero" d="M187.2 36.8h-1.07v2.93h1.07c1.2 0 1.87-.4 1.87-1.46 0-.94-.67-1.47-1.87-1.47zm0-4.4h-1.07v2.53h1.07c1.07 0 1.6-.53 1.6-1.33s-.53-1.2-1.6-1.2zm.13 9.47h-3.86v-11.6h4c2.53 0 3.86 1.2 3.86 3.06 0 1.2-.8 2-1.73 2.4 1.33.4 2.13 1.2 2.13 2.8 0 2.14-1.6 3.34-4.4 3.34z"></path><path fill="#FFF" fill-rule="nonzero" d="M200.8 40.67c-1.07.8-2 1.33-3.33 1.33-2.14 0-3.6-1.07-3.6-3.73v-8h2.8v7.6c0 1.06.53 1.6 1.6 1.6a3.6 3.6 0 0 0 2.26-.94v-8.26h2.94v11.6h-2.4l-.27-1.2"></path><path fill="#FFF" fill-rule="nonzero" d="M209.6 42c-1.6 0-2.8-.4-4-.93l.4-2.4a7.9 7.9 0 0 0 3.6 1.06c.8 0 1.47-.4 1.47-1.06 0-.67-.4-.94-2-1.6-2.27-.8-3.34-1.6-3.34-3.47 0-2.27 1.74-3.47 4-3.47 1.47 0 2.4.4 3.47.8l-.4 2.4a7.32 7.32 0 0 0-3.07-.93c-.8 0-1.33.4-1.33.93 0 .54.4.8 1.87 1.47 2.4.8 3.46 1.73 3.46 3.6 0 2.4-1.86 3.6-4.13 3.6"></path><path fill="#FFF" fill-rule="nonzero" d="M215.87 41.87v-11.6h2.8v11.6h-2.8"></path><path fill="#FFF" fill-rule="nonzero" d="M228.53 41.87L224 34.93v6.94h-2.67v-11.6h2.8l4.27 6.53v-6.53h2.67v11.6h-2.54"></path><path fill="#FFF" fill-rule="nonzero" d="M233.73 41.87v-11.6h7.07v2.4h-4.27v2.13h3.34l.26 2.27h-3.6v2.4h4.4v2.4h-7.2"></path><path fill="#FFF" fill-rule="nonzero" d="M246.67 42c-1.6 0-2.8-.4-4-.93l.4-2.4a7.9 7.9 0 0 0 3.6 1.06c.8 0 1.46-.4 1.46-1.06 0-.67-.4-.94-2-1.6-2.26-.8-3.33-1.6-3.33-3.47 0-2.27 1.73-3.47 4-3.47 1.47 0 2.4.4 3.47.8l-.4 2.4a7.32 7.32 0 0 0-3.07-.93c-.8 0-1.33.4-1.33.93 0 .54.4.8 1.86 1.47 2.4.8 3.47 1.73 3.47 3.6 0 2.4-1.87 3.6-4.13 3.6"></path><path fill="#FFF" fill-rule="nonzero" d="M256.27 42a9.8 9.8 0 0 1-4-.93l.4-2.4a7.95 7.95 0 0 0 3.73 1.06c.8 0 1.33-.4 1.33-1.06 0-.67-.4-.94-2-1.6-2.26-.8-3.2-1.6-3.2-3.47 0-2.27 1.74-3.47 3.87-3.47 1.47 0 2.53.4 3.47.8l-.4 2.4a7.32 7.32 0 0 0-3.07-.93c-.8 0-1.2.4-1.2.93 0 .54.27.8 1.73 1.47 2.54.8 3.47 1.73 3.47 3.6 0 2.4-1.87 3.6-4.13 3.6"></path><path fill="#FFF" fill-rule="nonzero" d="M269.87 42c-1.6 0-2.94-.4-4-.93l.4-2.4c1.2.66 2.4 1.06 3.6 1.06.8 0 1.33-.4 1.33-1.06 0-.67-.27-.94-1.87-1.6-2.26-.8-3.33-1.6-3.33-3.47 0-2.27 1.73-3.47 4-3.47 1.47 0 2.4.4 3.47.8l-.54 2.4a6.8 6.8 0 0 0-2.93-.93c-.93 0-1.33.4-1.33.93 0 .54.4.8 1.73 1.47 2.53.8 3.6 1.73 3.6 3.6 0 2.4-1.87 3.6-4.13 3.6"></path><path fill="#FFF" fill-rule="nonzero" d="M280.93 42c-3.33 0-5.46-2.27-5.46-5.87s2.13-6 5.6-6c1.33 0 2.26.27 3.06.8l-.4 2.54a3.83 3.83 0 0 0-2.4-.94c-1.86 0-3.06 1.34-3.06 3.6 0 2.14 1.33 3.47 3.06 3.47.94 0 1.74-.27 2.67-.8l.27 2.4c-.8.53-1.87.8-3.34.8"></path><path fill="#FFF" fill-rule="nonzero" d="M293.2 41.87V37.2h-4v4.67h-2.8v-11.6h2.8v4.4h4v-4.4h2.93v11.6h-2.93"></path><path fill="#FFF" fill-rule="nonzero" d="M303.73 32.4c-1.6 0-2.66 1.33-2.66 3.73 0 2.27 1.06 3.74 2.66 3.74s2.67-1.47 2.67-3.74c0-2.4-1.07-3.73-2.67-3.73zm0 9.6c-3.33 0-5.46-2.4-5.46-5.87 0-3.6 2.13-6 5.46-6 3.34 0 5.47 2.4 5.47 5.87 0 3.6-2.13 6-5.47 6z"></path><path fill="#FFF" fill-rule="nonzero" d="M316.4 32.4c-1.6 0-2.67 1.33-2.67 3.73 0 2.27 1.07 3.74 2.67 3.74 1.6 0 2.67-1.47 2.67-3.74 0-2.4-1.07-3.73-2.67-3.73zm0 9.6c-3.33 0-5.47-2.4-5.47-5.87 0-3.6 2.14-6 5.47-6 3.33 0 5.47 2.4 5.47 5.87 0 3.6-2.14 6-5.47 6z"></path><path fill="#FFF" fill-rule="nonzero" d="M324 41.87v-11.6h2.93v9.06h3.47l.4 2.54H324"></path><path fill="#FFF" fill-rule="nonzero" d="M169.47 48h-.54V0h.54v48"></path><path fill="#FFF" fill-rule="nonzero" d="M15.87 13.2H16c5.33-.13 8.27 1.87 8.53 2.67h2.14l.66-1.47V14c-.66-.67-6-2.13-12.4-2.13-6.8 0-11.2 1.33-12 2l-.26.26.13.4.13.4h.27l.13-.13v-.53l.4-.14.27.14.13.26c.14.14.4-.13 1.34-.26l.26-.14v-.4c0-.13-.13-.26.27-.26l.53-.14c.27-.13.27 0 .4.14v.4c.14.13.27-.14 2-.27l.4-.13v-.27c-.13-.27-.13-.4.27-.4h.8c.53-.13.4 0 .53.27v.26h.27l2.53-.13H14v-.53l.4-.14h.93l.54.14v.53"></path><path fill="#FFF" fill-rule="nonzero" d="M14.93 4.67c-5.06 0-8.26 1.6-10.26 3.6l-.14.13.27.13C9.2 6.67 14 7.87 15.47 9.6v.13c-1.6 0-2.8-.13-5.74.27-1.6.27-2.93.4-4.13.8-1.87.4-3.2 1.07-4 1.6l-.4.4-.13.4-.14.67h.27c.27-.27.93-.8 1.87-1.2.93-.54 2.53-1.07 4.13-1.34a44.4 44.4 0 0 1 15.33 0c2.27.54 4 1.07 5.2 1.6l1.2.8c.27.4.27.14.27 0l-.53-1.2c-1.47-2.66-5.34-7.86-13.74-7.86"></path><path fill="#FFF" fill-rule="nonzero" d="M0 39.07c0 1.2 4.93 3.6 15.33 3.6 10 0 15.2-2.4 15.2-3.6V37.2s0-.13 0 0c-.13-.4-.66-.4-2.26-.53v-.94l-.54.4c-1.33.8-6.4 1.87-12.66 1.87-7.2 0-12.4-1.47-13.2-2.27v1.6c2.4 1.6 9.86 3.2 17.2 2.4h.53c.13 0 .27.27-.13.4C15.2 41.47 4.53 41.2 0 37.73v1.34"></path><path fill="#FFF" fill-rule="nonzero" d="M21.2 15.73v-.26.26"></path><path fill="#FFF" fill-rule="nonzero" d="M21.2 15.73v-.26.26z"></path><path fill="#FFF" fill-rule="nonzero" d="M18.53 15.2h-.13.13"></path><path fill="#FFF" fill-rule="nonzero" d="M21.33 14.67h-2.8l-.13.13v.4l.13.13h1.07l-.27.27-.4.27-.13.26v20.14c0 .4.67.4 1.2.4.53 0 1.2 0 1.2-.4v-20.8l.13-.14.27-.13v-.4l-.27-.13"></path><path fill="#FFF" fill-rule="nonzero" d="M16.8 28.67v-.14h.27v-.13h-4v.13h.26v.14l.27.4.13.13h1.07l.27.13v.27l-1.2.67-.14.13v4l-.4.13v.8h3.47v-.8l-.4-.13v-5.07l.4-.66"></path><path fill="#FFF" fill-rule="nonzero" d="M26.8 15.73H24l-.13.14v.4l.13.13h.93l.14.13-.27.14-.4.26-.13.27v18.27c0 .26.66.4 1.2.4.53 0 1.2-.14 1.2-.4V16.53l.13-.13.27-.13v-.4l-.27-.14"></path><path fill="#FFF" fill-rule="nonzero" d="M11.47 14.67h-2.8l-.27.13v.4l.27.13h.93l-.13.27-.4.27-.14.26v20.14c0 .4.54.4 1.2.4.54 0 1.07 0 1.2-.4V15.33h.14l.13-.13v-.4l-.13-.13"></path><path fill="#FFF" fill-rule="nonzero" d="M6 15.73H3.2l-.27.27v.27l.27.26h.93L4 16.8l-.4.27-.13.26v18.14c0 .4.53.4 1.2.4.53 0 1.06 0 1.2-.4V16.53H6l.13-.26V16L6 15.73"></path><path fill="#FFF" fill-rule="nonzero" d="M153.33 15.6c-1.86-5.2-6.8-8.67-12.93-8.67-9.47 0-15.47 6.8-15.47 16.4 0 10.27 7.47 17.87 16.14 17.87 4.4 0 10-1.47 13.86-8.4H156a41.89 41.89 0 0 1-3.6 8.27c-3.73-.4-6.13 1.6-12.93 1.6-11.6 0-19.87-7.6-19.87-18.14 0-11.06 8.53-19.06 20.4-19.06 7.2 0 10.27 2.26 12.13 2.26.54 0 .8-.13.94-.4h.93l.4 8.27h-1.07"></path><path fill="#FFF" fill-rule="nonzero" d="M106 6.27v1.06c4.53.14 5.6.8 5.6 4.27v22.67l-26.8-28H63.33v1.06c4.8.27 5.6 1.2 5.6 6.67v13.33c0 9.74-6.53 12.4-12.93 12.4-8.53 0-13.07-4.66-13.07-12.4V11.6c0-3.33 1.34-4.27 4.54-4.27H48V6.27H33.33v1.06c3.87.14 4.94.67 4.94 4.27v16.67c0 8.13 5.46 14.4 16.4 14.4 12.4 0 16.93-7.6 16.93-14.67V12.67c0-4.27 2-5.2 4.67-5.2 1.46 0 3.06.4 4.4 1.33v28c0 2.67-1.2 3.87-4.8 3.87h-.14v1.06h13.2v-1.06c-4.8 0-5.73-.8-5.73-4.94V11.2l29.47 30.93h1.46V10.4c0-2.27.94-3.07 5.2-3.07V6.27H106"></path></g></svg>';
		$output .= '</a>';
		$output .= '<div class="phantom-column"></div>';
		$output .= '<div>';
		$output .= '<button class="search-toggle"><span>Search</span> <i class="fas fa-search"></i></button>';
		$output .= $NAV->render_side_nav_button();
		$output .= '</div>';
		$output .= '</div>';
		if ( !is_front_page() ) {
			$output .= wp_nav_menu(
				array(
					'theme_location' => 'interior',
					'menu_id' => 'interior-menu',
					'echo' => false
				)
			);
		}
		$output .= '</header>';

		return $output;
	}

	public function get_banner_menu( $fields ) {
		$output = '';

		$output .= '<div id="home-banner-header">';
		$output .= '<div class="home-banner-overlay">';
		$output .= wp_nav_menu(
			array(
				'theme_location' => 'primary',
				'menu_id' => 'home-menu',
				'echo' => false
			)
		);
		$output .= '</div>';
		$output .= '<img class="home-banner-image" src="' . $fields[ 'banner_image' ] . '" alt="Home Banner Header Banner" />';
		$output .= '</div>';

		return $output;
	}
}
