<?php

class Taxonomies {

  public function registerTaxonomies() {
    add_action('init', array('Taxonomies', 'role'), 0);
		add_action('init', array('Taxonomies', 'client'), 0);
		add_action('init', array('Taxonomies', 'specialization'), 0);
		add_action('init', array('Taxonomies', 'subject'), 0);
  }

  public static function role() {
  	register_taxonomy('role', ['team'], self::buildArgs('Role', 'Roles'));
  }

  public static function client() {
    register_taxonomy('client', ['portfolio'], self::buildArgs('Client', 'Clients'));
  }

  public static function specialization() {
    register_taxonomy('specialization', ['portfolio', 'service', 'team'], self::buildArgs('Specialization', 'specializations'));
  }

  public static function subject() {
    register_taxonomy('subject', ['post'], self::buildArgs('Subject', 'Subjects'));
  }

  public static function buildArgs($single, $plural) {
    return [
  		'labels'                       => [
    		'name'                       => _x( $plural, 'Taxonomy General Name', 'thelaunch' ),
    		'singular_name'              => _x( $single, 'Taxonomy Singular Name', 'thelaunch' ),
    		'menu_name'                  => __( $single, 'thelaunch' ),
    		'all_items'                  => __( 'All '.$plural, 'thelaunch' ),
    		'parent_item'                => __( 'Parent '.$single, 'thelaunch' ),
    		'parent_item_colon'          => __( 'Parent '.$single.':', 'thelaunch' ),
    		'new_item_name'              => __( 'New '.$single.' Name', 'thelaunch' ),
    		'add_new_item'               => __( 'Add New '.$single, 'thelaunch' ),
    		'edit_item'                  => __( 'Edit '.$single, 'thelaunch' ),
    		'update_item'                => __( 'Update '.$single, 'thelaunch' ),
    		'view_item'                  => __( 'View '.$single, 'thelaunch' ),
    		'separate_items_with_commas' => __( 'Separate '.$plural.' with commas', 'thelaunch' ),
    		'add_or_remove_items'        => __( 'Add or remove '.$plural, 'thelaunch' ),
    		'choose_from_most_used'      => __( 'Choose from the most used', 'thelaunch' ),
    		'popular_items'              => __( 'Popular '.$plural, 'thelaunch' ),
    		'search_items'               => __( 'Search '.$plural, 'thelaunch' ),
    		'not_found'                  => __( 'Not Found', 'thelaunch' ),
    		'no_terms'                   => __( 'No '.$plural, 'thelaunch' ),
    		'items_list'                 => __( $plural.' list', 'thelaunch' ),
    		'items_list_navigation'      => __( $plural.' list navigation', 'thelaunch' ),
    	],
  		'hierarchical'               => true,
  		'public'                     => true,
  		'show_ui'                    => true,
  		'show_admin_column'          => true,
  		'show_in_nav_menus'          => false,
  		'show_tagcloud'              => false,
  		'rewrite'                    => false,
  	];
  }

}
