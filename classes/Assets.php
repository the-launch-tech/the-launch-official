<?php

class Assets {

  const VERSION = '1.0.0';

  public static function enqueue() {
    add_action('wp_enqueue_scripts', ['Assets', 'scripts']);
		add_action('wp_enqueue_scripts', ['Assets', 'styles']);
  }

  public static function scripts() {
		wp_enqueue_script('script-bundle', get_template_directory_uri().'/dist/index.js', self::VERSION, true);
	}

	public static function styles() {
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style('style-bundle', get_template_directory_uri().'/dist/main.css');
	}
  
}
