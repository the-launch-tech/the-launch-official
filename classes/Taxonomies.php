<?php

class Taxonomies {

  public function registerTaxonomies() {
    add_action('init', array('Taxonomies', 'type'), 0);
		add_action('init', array('Taxonomies', 'owner'), 0);
		add_action('init', array('Taxonomies', 'access'), 0);
		add_action('init', array('Taxonomies', 'steward'), 0);
		add_action('init', array('Taxonomies', 'security'), 0);
    add_action('init', array('Taxonomies', 'source'), 0);
    add_action('init', array('Taxonomies', 'use'), 0);
  }

  public static function type() {
  	register_taxonomy('type', ['entry'], self::buildArgs('Type', 'Types'));
  }

  public static function owner() {
    register_taxonomy('owner', ['entry'], self::buildArgs('Owner', 'Owners'));
  }

  public static function access() {
    register_taxonomy('access', ['entry'], self::buildArgs('Access', 'Accesses'));
  }

  public static function steward() {
    register_taxonomy('steward', ['entry'], self::buildArgs('Steward', 'Stewards'));
  }

  public static function security() {
    register_taxonomy('security', ['entry'], self::buildArgs('Security', 'Securities'));
  }

  public static function source() {
    register_taxonomy('source', ['entry'], self::buildArgs('Source', 'Sources'));
  }

  public static function use() {
    register_taxonomy('use', ['entry'], self::buildArgs('Place Used', 'Places Used'));
  }

  public static function buildArgs($single, $plural) {
    return [
  		'labels'                       => [
    		'name'                       => _x( $plural, 'Taxonomy General Name', 'kenan' ),
    		'singular_name'              => _x( $single, 'Taxonomy Singular Name', 'kenan' ),
    		'menu_name'                  => __( $single, 'kenan' ),
    		'all_items'                  => __( 'All ' . $plural, 'kenan' ),
    		'parent_item'                => __( 'Parent Item', 'kenan' ),
    		'parent_item_colon'          => __( 'Parent Item:', 'kenan' ),
    		'new_item_name'              => __( 'New Item Name', 'kenan' ),
    		'add_new_item'               => __( 'Add New Item', 'kenan' ),
    		'edit_item'                  => __( 'Edit Item', 'kenan' ),
    		'update_item'                => __( 'Update Item', 'kenan' ),
    		'view_item'                  => __( 'View Item', 'kenan' ),
    		'separate_items_with_commas' => __( 'Separate items with commas', 'kenan' ),
    		'add_or_remove_items'        => __( 'Add or remove items', 'kenan' ),
    		'choose_from_most_used'      => __( 'Choose from the most used', 'kenan' ),
    		'popular_items'              => __( 'Popular Items', 'kenan' ),
    		'search_items'               => __( 'Search Items', 'kenan' ),
    		'not_found'                  => __( 'Not Found', 'kenan' ),
    		'no_terms'                   => __( 'No items', 'kenan' ),
    		'items_list'                 => __( 'Items list', 'kenan' ),
    		'items_list_navigation'      => __( 'Items list navigation', 'kenan' ),
    	],
  		'hierarchical'               => false,
  		'public'                     => true,
  		'show_ui'                    => true,
  		'show_admin_column'          => true,
  		'show_in_nav_menus'          => false,
  		'show_tagcloud'              => false,
  		'rewrite'                    => false,
  	];
  }

}
