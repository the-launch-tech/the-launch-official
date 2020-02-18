<?php

class Utilities {
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

  public static function removeDefaultPostType() {
    add_action('admin_menu', function () {
      remove_menu_page( 'edit.php' );
    });
    add_action('admin_bar_menu', function ($wp_admin_bar) {
      $wp_admin_bar->remove_node('new-post');
    }, 999);
    add_action('wp_dashboard_setup', function () {
      remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
    }, 999);
  }

  public static function removeComments() {
    add_action('admin_menu', function () {
      remove_menu_page('edit-comments.php');
    });
    add_action('init', function () {
      remove_post_type_support('post', 'comments');
      remove_post_type_support('page', 'comments');
    }, 100);
    add_action('wp_before_admin_bar_render', function () {
      global $wp_admin_bar;
      $wp_admin_bar->remove_menu('comments');
    });
  }

  public static function get_column_width_percent( $c ) {
    if ( $c === 1 )
      return 100;
    else if ( $c === 2 )
      return 50;
    else if ( $c === 3 )
      return 33;
    else if ( $c === 4 )
      return 25;
    else if ( $c === 5 )
      return 20;
    else if ( $c === 6 )
      return 16.66666;
    else if ( $c === 7 )
      return 14.285711;
    else if ( $c === 8 )
      return 12.5;
    else if ( $c === 9 )
      return 11.111111111;
    else if ( $c === 10 )
      return 10;
    else if ( $c === 11 )
      return 9.0909090;
    else if ( $c === 12 )
      return 8.33333333;
    else
      return 50;
  }

  public static function choose_display_name( $field_name, $id ) {
  	$display_name = get_field( $field_name, $id );
  	return $display_name ? $display_name : get_the_title( $id );
  }

}
