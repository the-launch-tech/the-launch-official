<?php

class PostTypes {

  public function registerPostTypes() {
    add_action('init', array('PostTypes', 'entry'), 0);
    add_action('init', array('PostTypes', 'dashboard'), 0);
    add_action('init', array('PostTypes', 'footer'), 0);
  }

  public static function entry() {
  	register_post_type('entry', [
		  'label'                   => __('Entry', 'kenan'),
		  'description'             => __('Business Glossary Entries', 'kenan'),
		  'labels'                  => [
    		'name'                  => _x('Entries', 'Post Type General Name', 'kenan'),
    		'singular_name'         => _x('Entry', 'Post Type Singular Name', 'kenan'),
    		'menu_name'             => __('Entries', 'kenan'),
    		'name_admin_bar'        => __('Entry', 'kenan'),
    		'archives'              => __('Item Archives', 'kenan'),
    		'attributes'            => __('Item Attributes', 'kenan'),
    		'parent_item_colon'     => __('Parent Item:', 'kenan'),
    		'all_items'             => __('All Items', 'kenan'),
    		'add_new_item'          => __('Add New Item', 'kenan'),
    		'add_new'               => __('Add New', 'kenan'),
    		'new_item'              => __('New Item', 'kenan'),
    		'edit_item'             => __('Edit Item', 'kenan'),
    		'update_item'           => __('Update Item', 'kenan'),
    		'view_item'             => __('View Item', 'kenan'),
    		'view_items'            => __('View Items', 'kenan'),
    		'search_items'          => __('Search Item', 'kenan'),
    		'not_found'             => __('Not found', 'kenan'),
    		'not_found_in_trash'    => __('Not found in Trash', 'kenan'),
    		'featured_image'        => __('Featured Image', 'kenan'),
    		'set_featured_image'    => __('Set featured image', 'kenan'),
    		'remove_featured_image' => __('Remove featured image', 'kenan'),
    		'use_featured_image'    => __('Use as featured image', 'kenan'),
    		'insert_into_item'      => __('Insert into item', 'kenan'),
    		'uploaded_to_this_item' => __('Uploaded to this item', 'kenan'),
    		'items_list'            => __('Items list', 'kenan'),
    		'items_list_navigation' => __('Items list navigation', 'kenan'),
    		'filter_items_list'     => __('Filter items list', 'kenan'),
    	],
  		'supports'              => ['title', 'editor', 'thumbnail'],
  		'taxonomies'            => ['type', 'owner', 'steward', 'access', 'security'],
  		'hierarchical'          => true,
  		'public'                => true,
  		'show_ui'               => true,
  		'show_in_menu'          => true,
  		'menu_position'         => 5,
  		'menu_icon'             => 'dashicons-welcome-add-page',
  		'show_in_admin_bar'     => true,
  		'show_in_nav_menus'     => true,
  		'can_export'            => true,
  		'has_archive'           => false,
  		'exclude_from_search'   => false,
  		'publicly_queryable'    => true,
  		'rewrite'               => false,
  		'capability_type'       => 'page',
  	]);
  }

  public static function dashboard() {
  	register_post_type('dashboard', [
		  'label'                   => __('Dashboard', 'kenan'),
		  'description'             => __('Dashboards', 'kenan'),
		  'labels'                  => [
    		'name'                  => _x('Dashboards', 'Post Type General Name', 'kenan'),
    		'singular_name'         => _x('Dashboard', 'Post Type Singular Name', 'kenan'),
    		'menu_name'             => __('Dashboards', 'kenan'),
    		'name_admin_bar'        => __('Dashboard', 'kenan'),
    		'archives'              => __('Item Archives', 'kenan'),
    		'attributes'            => __('Item Attributes', 'kenan'),
    		'parent_item_colon'     => __('Parent Item:', 'kenan'),
    		'all_items'             => __('All Items', 'kenan'),
    		'add_new_item'          => __('Add New Item', 'kenan'),
    		'add_new'               => __('Add New', 'kenan'),
    		'new_item'              => __('New Item', 'kenan'),
    		'edit_item'             => __('Edit Item', 'kenan'),
    		'update_item'           => __('Update Item', 'kenan'),
    		'view_item'             => __('View Item', 'kenan'),
    		'view_items'            => __('View Items', 'kenan'),
    		'search_items'          => __('Search Item', 'kenan'),
    		'not_found'             => __('Not found', 'kenan'),
    		'not_found_in_trash'    => __('Not found in Trash', 'kenan'),
    		'featured_image'        => __('Featured Image', 'kenan'),
    		'set_featured_image'    => __('Set featured image', 'kenan'),
    		'remove_featured_image' => __('Remove featured image', 'kenan'),
    		'use_featured_image'    => __('Use as featured image', 'kenan'),
    		'insert_into_item'      => __('Insert into item', 'kenan'),
    		'uploaded_to_this_item' => __('Uploaded to this item', 'kenan'),
    		'items_list'            => __('Items list', 'kenan'),
    		'items_list_navigation' => __('Items list navigation', 'kenan'),
    		'filter_items_list'     => __('Filter items list', 'kenan'),
    	],
  		'supports'              => ['title', 'editor', 'thumbnail'],
  		'hierarchical'          => true,
  		'public'                => true,
  		'show_ui'               => true,
  		'show_in_menu'          => true,
  		'menu_position'         => 5,
  		'menu_icon'             => 'dashicons-forms',
  		'show_in_admin_bar'     => true,
  		'show_in_nav_menus'     => true,
  		'can_export'            => true,
  		'has_archive'           => true,
  		'exclude_from_search'   => false,
  		'publicly_queryable'    => true,
  		'rewrite'               => [
        'slug' => 'dashboard-list',
        'with_front' => false
      ],
  		'capability_type'       => 'page',
  	]);
  }

  public static function footer() {
    register_post_type('footer', [
  		'label'                 => __('Footer', 'kenan-it'),
  		'description'           => __('Footer builder, select one for your active footer', 'kenan-it'),
  		'labels'                => [
  			'name'                  => _x('Footers', 'Post Type General Name', 'kenan-it'),
  			'singular_name'         => _x('Footer', 'Post Type Singular Name', 'kenan-it'),
  			'menu_name'             => __('Footers', 'kenan-it'),
  			'name_admin_bar'        => __('Footers', 'kenan-it'),
  			'archives'              => __('Footer Archives', 'kenan-it'),
  			'attributes'            => __('Footer Attributes', 'kenan-it'),
  			'parent_item_colon'     => __('Parent Footer:', 'kenan-it'),
  			'all_items'             => __('All Footers', 'kenan-it'),
  			'add_new_item'          => __('Add New Footer', 'kenan-it'),
  			'add_new'               => __('Add New', 'kenan-it'),
  			'new_item'              => __('New Footer', 'kenan-it'),
  			'edit_item'             => __('Edit Footer', 'kenan-it'),
  			'update_item'           => __('Update Footer', 'kenan-it'),
  			'view_item'             => __('View Footer', 'kenan-it'),
  			'view_items'            => __('View Footers', 'kenan-it'),
  			'search_items'          => __('Search Footer', 'kenan-it'),
  			'not_found'             => __('Not found', 'kenan-it'),
  			'not_found_in_trash'    => __('Not found in Trash', 'kenan-it'),
  			'featured_image'        => __('Featured Image', 'kenan-it'),
  			'set_featured_image'    => __('Set featured image', 'kenan-it'),
  			'remove_featured_image' => __('Remove featured image', 'kenan-it'),
  			'use_featured_image'    => __('Use as featured image', 'kenan-it'),
  			'insert_into_item'      => __('Insert into Footer', 'kenan-it'),
  			'uploaded_to_this_item' => __('Uploaded to this Footer', 'kenan-it'),
  			'items_list'            => __('Footers list', 'kenan-it'),
  			'items_list_navigation' => __('Footers list navigation', 'kenan-it'),
  			'filter_items_list'     => __('Filter Footers list', 'kenan-it'),
  		],
  		'supports'              => ['title', 'editor'],
  		'hierarchical'          => false,
  		'public'                => true,
  		'show_ui'               => true,
  		'show_in_menu'          => true,
  		'menu_position'         => 5,
  		'menu_icon'             => 'dashicons-editor-kitchensink',
  		'show_in_admin_bar'     => true,
  		'show_in_nav_menus'     => true,
  		'can_export'            => true,
  		'has_archive'           => false,
  		'exclude_from_search'   => true,
  		'publicly_queryable'    => true,
  		'rewrite'               => false,
  		'capability_type'       => 'post',
  	]);
  }

}
