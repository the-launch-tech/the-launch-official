<?php

class PostTypes {

  public function registerPostTypes() {
    add_action('init', ['PostTypes', 'entry'], 0);
    add_action('init', ['PostTypes', 'dashboard'], 0);
    add_action('init', ['PostTypes', 'footer'], 0);
  }

  public static function entry() {
  	register_post_type('service', [
		  'label'                   => __('Service', 'thelaunch'),
		  'description'             => __('Business Glossary Services', 'thelaunch'),
		  'labels'                  => [
    		'name'                  => _x('Services', 'Post Type General Name', 'thelaunch'),
    		'singular_name'         => _x('Service', 'Post Type Singular Name', 'thelaunch'),
    		'menu_name'             => __('Services', 'thelaunch'),
    		'name_admin_bar'        => __('Service', 'thelaunch'),
    		'archives'              => __('Item Archives', 'thelaunch'),
    		'attributes'            => __('Item Attributes', 'thelaunch'),
    		'parent_item_colon'     => __('Parent Item:', 'thelaunch'),
    		'all_items'             => __('All Items', 'thelaunch'),
    		'add_new_item'          => __('Add New Item', 'thelaunch'),
    		'add_new'               => __('Add New', 'thelaunch'),
    		'new_item'              => __('New Item', 'thelaunch'),
    		'edit_item'             => __('Edit Item', 'thelaunch'),
    		'update_item'           => __('Update Item', 'thelaunch'),
    		'view_item'             => __('View Item', 'thelaunch'),
    		'view_items'            => __('View Items', 'thelaunch'),
    		'search_items'          => __('Search Item', 'thelaunch'),
    		'not_found'             => __('Not found', 'thelaunch'),
    		'not_found_in_trash'    => __('Not found in Trash', 'thelaunch'),
    		'featured_image'        => __('Featured Image', 'thelaunch'),
    		'set_featured_image'    => __('Set featured image', 'thelaunch'),
    		'remove_featured_image' => __('Remove featured image', 'thelaunch'),
    		'use_featured_image'    => __('Use as featured image', 'thelaunch'),
    		'insert_into_item'      => __('Insert into item', 'thelaunch'),
    		'uploaded_to_this_item' => __('Uploaded to this item', 'thelaunch'),
    		'items_list'            => __('Items list', 'thelaunch'),
    		'items_list_navigation' => __('Items list navigation', 'thelaunch'),
    		'filter_items_list'     => __('Filter items list', 'thelaunch'),
    	],
  		'supports'              => ['title', 'editor', 'thumbnail', 'excerpt', 'post-attributes'],
  		'taxonomies'            => ['specialization'],
  		'hierarchical'          => true,
  		'public'                => true,
  		'show_ui'               => true,
  		'show_in_menu'          => true,
  		'menu_position'         => 5,
  		'menu_icon'             => 'dashicons-shield',
  		'show_in_admin_bar'     => true,
  		'show_in_nav_menus'     => false,
  		'can_export'            => true,
  		'has_archive'           => true,
  		'exclude_from_search'   => false,
  		'publicly_queryable'    => true,
      'rewrite'               => [
        'slug' => 'website-and-app-services',
        'with_front' => false
      ],
  		'capability_type'       => 'page',
  	]);
  }

  public static function dashboard() {
  	register_post_type('portfolio', [
		  'label'                   => __('Portfolio', 'thelaunch'),
		  'description'             => __('Portfolios', 'thelaunch'),
		  'labels'                  => [
    		'name'                  => _x('Portfolios', 'Post Type General Name', 'thelaunch'),
    		'singular_name'         => _x('Portfolio', 'Post Type Singular Name', 'thelaunch'),
    		'menu_name'             => __('Portfolios', 'thelaunch'),
    		'name_admin_bar'        => __('Portfolio', 'thelaunch'),
    		'archives'              => __('Item Archives', 'thelaunch'),
    		'attributes'            => __('Item Attributes', 'thelaunch'),
    		'parent_item_colon'     => __('Parent Item:', 'thelaunch'),
    		'all_items'             => __('All Items', 'thelaunch'),
    		'add_new_item'          => __('Add New Item', 'thelaunch'),
    		'add_new'               => __('Add New', 'thelaunch'),
    		'new_item'              => __('New Item', 'thelaunch'),
    		'edit_item'             => __('Edit Item', 'thelaunch'),
    		'update_item'           => __('Update Item', 'thelaunch'),
    		'view_item'             => __('View Item', 'thelaunch'),
    		'view_items'            => __('View Items', 'thelaunch'),
    		'search_items'          => __('Search Item', 'thelaunch'),
    		'not_found'             => __('Not found', 'thelaunch'),
    		'not_found_in_trash'    => __('Not found in Trash', 'thelaunch'),
    		'featured_image'        => __('Featured Image', 'thelaunch'),
    		'set_featured_image'    => __('Set featured image', 'thelaunch'),
    		'remove_featured_image' => __('Remove featured image', 'thelaunch'),
    		'use_featured_image'    => __('Use as featured image', 'thelaunch'),
    		'insert_into_item'      => __('Insert into item', 'thelaunch'),
    		'uploaded_to_this_item' => __('Uploaded to this item', 'thelaunch'),
    		'items_list'            => __('Items list', 'thelaunch'),
    		'items_list_navigation' => __('Items list navigation', 'thelaunch'),
    		'filter_items_list'     => __('Filter items list', 'thelaunch'),
    	],
  		'supports'              => ['title', 'editor', 'thumbnail', 'excerpt', 'post-attributes'],
      'supports'              => ['client', 'specialization'],
  		'hierarchical'          => false,
  		'public'                => true,
  		'show_ui'               => true,
  		'show_in_menu'          => true,
  		'menu_position'         => 5,
  		'menu_icon'             => 'dashicons-awards',
  		'show_in_admin_bar'     => true,
  		'show_in_nav_menus'     => false,
  		'can_export'            => true,
  		'has_archive'           => true,
  		'exclude_from_search'   => false,
  		'publicly_queryable'    => true,
  		'rewrite'               => [
        'slug' => 'website-and-app-portfolio',
        'with_front' => false
      ],
  		'capability_type'       => 'page',
  	]);
  }

  public static function footer() {
    register_post_type('team', [
  		'label'                 => __('Team', 'thelaunch'),
  		'description'           => __('Team People, select one for your active footer', 'thelaunch'),
  		'labels'                => [
  			'name'                  => _x('Teams', 'Post Type General Name', 'thelaunch'),
  			'singular_name'         => _x('Team', 'Post Type Singular Name', 'thelaunch'),
  			'menu_name'             => __('Teams', 'thelaunch'),
  			'name_admin_bar'        => __('Teams', 'thelaunch'),
  			'archives'              => __('Team Archives', 'thelaunch'),
  			'attributes'            => __('Team Attributes', 'thelaunch'),
  			'parent_item_colon'     => __('Parent Team:', 'thelaunch'),
  			'all_items'             => __('All Teams', 'thelaunch'),
  			'add_new_item'          => __('Add New Team', 'thelaunch'),
  			'add_new'               => __('Add New', 'thelaunch'),
  			'new_item'              => __('New Team', 'thelaunch'),
  			'edit_item'             => __('Edit Team', 'thelaunch'),
  			'update_item'           => __('Update Team', 'thelaunch'),
  			'view_item'             => __('View Team', 'thelaunch'),
  			'view_items'            => __('View Teams', 'thelaunch'),
  			'search_items'          => __('Search Team', 'thelaunch'),
  			'not_found'             => __('Not found', 'thelaunch'),
  			'not_found_in_trash'    => __('Not found in Trash', 'thelaunch'),
  			'featured_image'        => __('Featured Image', 'thelaunch'),
  			'set_featured_image'    => __('Set featured image', 'thelaunch'),
  			'remove_featured_image' => __('Remove featured image', 'thelaunch'),
  			'use_featured_image'    => __('Use as featured image', 'thelaunch'),
  			'insert_into_item'      => __('Insert into Team', 'thelaunch'),
  			'uploaded_to_this_item' => __('Uploaded to this Team', 'thelaunch'),
  			'items_list'            => __('Teams list', 'thelaunch'),
  			'items_list_navigation' => __('Teams list navigation', 'thelaunch'),
  			'filter_items_list'     => __('Filter Teams list', 'thelaunch'),
  		],
  		'supports'              => ['title', 'editor', 'excerpt', 'page-attributes', 'thumbnail'],
      'taxonomies'              => ['role', 'specialization'],
  		'hierarchical'          => false,
  		'public'                => true,
  		'show_ui'               => true,
  		'show_in_menu'          => true,
  		'menu_position'         => 5,
  		'menu_icon'             => 'dashicons-editor-kitchensink',
  		'show_in_admin_bar'     => true,
  		'show_in_nav_menus'     => false,
  		'can_export'            => true,
  		'has_archive'           => true,
  		'exclude_from_search'   => false,
  		'publicly_queryable'    => true,
      'rewrite'               => [
        'slug' => 'team-members',
        'with_front' => false
      ],
  		'capability_type'       => 'post',
  	]);
  }

}
