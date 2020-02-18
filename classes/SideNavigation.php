<?php

class SideNavigation {
  private static $instance = null;

  public static function get_instance() {
    if ( null == self::$instance )
      self::$instance = new self;
    return self::$instance;
  }

  private function __construct() {
    $this->open_button_id = 'KenanSideNavigation';
    $this->close_button_id = 'KenanCloseNavigation';
    $this->component_container_id = 'ksn-container';
    $this->overlay_id = 'ksn-overlay';
    $this->top_page_id = 'page';

    $this->menu_name = 'Side';
    $this->menu_location = 'side';

    $term = get_term_by('name', 'Side', 'nav_menu');
    $id = $term->term_id;


    $this->FIELDS = array(
      'below_content' => get_field( 'below_content', $term ),
      'above_content' => get_field( 'above_content', $term ),
      'LOCALIZE' => array(
        'breakpoint' => get_field( 'breakpoint', $term ),
        'fade_in_time' => get_field( 'fade_in_time', $term ),
        'fade_out_time' => get_field( 'fade_out_time', $term ),
        'slide_in_time' => get_field( 'slide_in_time', $term ),
        'slide_out_time' => get_field( 'slide_out_time', $term ),
        'open_id' => $this->open_button_id,
        'close_id' => $this->close_button_id,
        'container_id' => $this->component_container_id,
        'overlay_id' => $this->overlay_id,
        'page_id' => $this->top_page_id,
      )
    );

    add_action( 'wp_enqueue_scripts', array( $this, 'set_side_nav_scripts' ) );
    add_action( 'wp_enqueue_scripts', array( $this, 'set_side_nav_styles' ) );
  }

  function set_side_nav_scripts() {
    wp_enqueue_script(
  		'side-navigation-script',
  		get_template_directory_uri() . '/assets/js/side-navigation.js',
  		array('jquery'),
  		1,
  		true
  	);

    wp_localize_script(
  		'side-navigation-script',
  		'_ksn',
  		$this->FIELDS[ 'LOCALIZE' ]
  	);
  }

  function set_side_nav_styles() {
    wp_enqueue_style(
      'side-navigation-style',
      get_template_directory_uri() . '/assets/css/side-navigation.css'
    );
  }

	public function render_side_nav() {
		$output = '';

		$output .= '<div id="' . $this->overlay_id . '">';
		$output .= '</div>';
		$output .= '<div id="' . $this->component_container_id . '">';
		$output .= '<button id="' . $this->close_button_id . '" class="side-toggle close" aria-controls="' . $this->menu_location . ' close" aria-expanded="true">';
		$output .= '<i class="fas fa-bars" aria-hidden="true"></i>';
		$output .= '</button>';
		$output .= '<div id="ksn-menu-content">';
		if ( $this->FIELDS[ 'above_content' ] ) {
			$output .= '<div id="ksn-above-content">';
			$output .= $this->FIELDS[ 'above_content' ];
			$output .= '</div>';
		}
		$output .= wp_nav_menu( array(
			'menu_class' => $this->menu_location,
			'container' => false,
			'echo' => false,
			'theme_location' => $this->menu_location,
			'echo' => false,
		) );
		if ( $this->FIELDS[ 'below_content' ] ) {
			$output .= '<div id="ksn-below-content">';
			$output .= $this->FIELDS[ 'below_content' ];
			$output .= '</div>';
		}
		$output .= '</div>';
		$output .= '</div>';

		return $output;
	}

  public function render_side_nav_button() {
    $output = '';

    $output .= '<button id="' . $this->open_button_id . '" class="side-toggle" aria-controls="' . $this->menu_location . '" aria-expanded="false">';
      $output .= '<i class="fas fa-bars" aria-hidden="true"></i>';
    $output .= '</button>';

    return $output;
  }
}
