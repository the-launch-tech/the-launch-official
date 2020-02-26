<?php

class Assets {

  const VERSION = '1.0.0';

  public static function enqueue() {
    add_action('wp_enqueue_scripts', ['Assets', 'scripts']);
		add_action('wp_enqueue_scripts', ['Assets', 'styles']);
  }

  public static function scripts() {
    wp_enqueue_script('three-bundle', get_template_directory_uri().'/assets/js/resources/three.min.js', self::VERSION, true);
    wp_enqueue_script('net-bundle', get_template_directory_uri().'/assets/js/resources/vanta.net.min.js', self::VERSION, true);

    if (is_front_page()) :
      wp_enqueue_script('globe-bundle', get_template_directory_uri().'/assets/js/resources/vanta.globe.min.js', self::VERSION, true);
    else :
      wp_enqueue_script('waves-bundle', get_template_directory_uri().'/assets/js/resources/vanta.wave.min.js', self::VERSION, true);
    endif;

    wp_enqueue_script('vendor-bundle', get_template_directory_uri().'/dist/1.index.js', self::VERSION, true);
		wp_enqueue_script('script-bundle', get_template_directory_uri().'/dist/index.js', self::VERSION, true);
    wp_localize_script('script-bundle', 'args', [
      'is_home_page' => is_front_page(),
      'base_url' => home_url()
    ]);
	}

	public static function styles() {
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style('vendor-bundle', get_template_directory_uri().'/dist/1.css');
    wp_enqueue_style('style-bundle', get_template_directory_uri().'/dist/main.css');
	}

}
