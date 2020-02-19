<?php

class Theme {

  const LANG = 'thelaunch';

  public static function set() {
    add_action('after_setup_theme', array('Theme', 'setup'));
		add_action('after_setup_theme', array('Theme', 'low_priority_setup'), 0);
		add_action('widgets_init', array('Theme', 'widgets'));
  }

  public static function setup() {
		load_theme_textdomain(self::LANG, get_template_directory().'/languages');
		add_theme_support('automatic-feed-links');
		add_theme_support('title-tag');
		add_theme_support('post-thumbnails');
		register_nav_menus([
      'primary' => esc_html__('Primary', self::LANG),
      'interior' => esc_html__('Interior', self::LANG),
      'side' => esc_html__('Side', self::LANG),
    ]);
		add_theme_support('html5', [
      'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
    ]);
		add_theme_support('customize-selective-refresh-widgets');
	}

	public static function low_priority_setup() {
		$GLOBALS['content_width'] = apply_filters('content_width', 1170);
	}

	public static function widgets() {
		register_sidebar([
      'name'          => esc_html__('Primary Sidebar', self::LANG),
			'id'            => 'primary',
			'description'   => esc_html__('Add widgets here.', self::LANG),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h5 class="widget-title '.'widget">',
			'after_title'   => '</h5>',
    ]);
	}

  public static function configureAcf() {
    define('MY_ACF_PATH', get_stylesheet_directory().'/assets/acf/');
    define('MY_ACF_URL', get_stylesheet_directory_uri().'/assets/acf/');
    include_once(MY_ACF_PATH.'acf.php');
    add_filter('acf/settings/url', function ($url) {
      return MY_ACF_URL;
    });
    add_filter('acf/settings/show_admin', function ($show_admin) {
      return true;
    });
    if (function_exists('acf_add_options_page')) {
    	acf_add_options_page([
    		'page_title' 	=> 'Theme Settings',
    		'menu_title'	=> 'Theme Settings',
    		'menu_slug' 	=> 'theme-settings',
    		'capability'	=> 'edit_posts',
    		'redirect'		=> false
    	]);
    }
  }

  public static function disableGutenberg() {
    add_filter('use_block_editor_for_post', '__return_false', 10);
    add_filter('use_block_editor_for_post_type', '__return_false', 10);
  }

}
