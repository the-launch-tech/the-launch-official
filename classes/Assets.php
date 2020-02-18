<?php

class Assets {

  const LANG = 'kenan';
  const VERSION = 1;

  public static function enqueue() {
    add_action('wp_enqueue_scripts', array('Assets', 'scripts'));
		add_action('wp_enqueue_scripts', array('Assets', 'styles'));
  }

  public static function scripts() {
		wp_enqueue_script('focus-fix-script', get_template_directory_uri().'/assets/js/skip-link-focus-fix.js', array(), self::VERSION, true);
		wp_enqueue_script('scroll-top-script', get_template_directory_uri().'/assets/js/scroll-top.js', array('jquery'), self::VERSION, true);
    wp_enqueue_script('home-menu-script', get_template_directory_uri().'/assets/js/home-menu.js', array('jquery'), self::VERSION, true);
    wp_enqueue_script('anime-script', get_template_directory_uri().'/assets/js/anime.js', array('jquery'), self::VERSION, true);
    wp_enqueue_script('navigation-script', get_template_directory_uri().'/assets/js/navigation.js', array('jquery'), self::VERSION, true);
    wp_enqueue_script('search-toggle-script', get_template_directory_uri().'/assets/js/search-toggle.js', array('jquery'), self::VERSION, true);
    wp_enqueue_script('sticky-menu-script', get_template_directory_uri().'/assets/js/sticky-menu.js', array('jquery'), self::VERSION, true);
	}

	public static function styles() {
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style('font-awesome-style', 'https://use.fontawesome.com/releases/v5.7.1/css/all.css');
    wp_enqueue_style('fonts-style', get_template_directory_uri().'/assets/fonts/fonts.css');
    wp_enqueue_style('general-style', get_template_directory_uri().'/assets/css/general.css');
    wp_enqueue_style('footer-style', get_template_directory_uri().'/assets/css/footer.css');
    wp_enqueue_style('header-style', get_template_directory_uri().'/assets/css/header.css');
    wp_enqueue_style('glossary-style', get_template_directory_uri().'/assets/css/glossary.css');
	}
}
