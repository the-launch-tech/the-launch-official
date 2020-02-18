<?php

class Theme {

  const LANG = 'kenan';

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
		register_nav_menus(array(
			'primary' => esc_html__('Primary', self::LANG),
      'interior' => esc_html__('Interior', self::LANG),
      'side' => esc_html__('Side', self::LANG),
		));
		add_theme_support('html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		));
		add_theme_support('customize-selective-refresh-widgets');
	}

	public static function low_priority_setup() {
		$GLOBALS['content_width'] = apply_filters('content_width', 1170);
	}

	public static function widgets() {
		register_sidebar(array(
			'name'          => esc_html__('Default Sidebar', self::LANG),
			'id'            => 'default-sidebar',
			'description'   => esc_html__('Add widgets here.', self::LANG),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title '.'widget">',
			'after_title'   => '</h4>',
		));
	}

}
