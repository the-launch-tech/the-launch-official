<?php

class Shortcodes {

  private static $instance = null;

	public static function get_instance() {
		if ( null == self::$instance )
			self::$instance = new self;
		return self::$instance;
	}

  public function __construct() {
    add_shortcode('display_menu', array($this, 'displayMenu'));
    add_shortcode('kenan_socials', array($this, 'kenanSocials'));
  }

  public static function displayMenu($atts) {
    $output = '';
  	$name = 'Primary';
  	$text = 'left';

  	if ( $atts ) {
  		$text = $atts[ 'text' ] ? $atts[ 'text' ] : $text;
  		$name = $atts[ 'name' ] ? $atts[ 'name' ] : $name;
  	}

  	$output .= wp_nav_menu( array(
  		'menu'   => $name,
  		'menu_class' => 'display-menu '. $text,
  		'container' => false,
  		'echo' => false
  	) );

  	return $output;
  }

  public static function kenanSocials($atts) {
    $output = '';
  	$color = '#fff';
  	$hover = '#e1e1e1';
  	$width = 40;
  	$socials = get_field( 'social_media_icons', 'options' );

  	if ( $atts ) {
  		$color = $atts[ 'color' ] ? $atts[ 'color' ] : $color;
  		$hover = $atts[ 'hover' ] ? $atts[ 'hover' ] : $hover;
  		$width = $atts[ 'width' ] ? $atts[ 'width' ] : $width;
  	}

  	$output .= '<div class="ks-wrapper">';
  	foreach ( $socials as $s ) {
  		$output .= '<a class="ks-anchor" href="' . $s[ 'anchor' ] . '" style="width: ' . $width . 'px; height: ' . $width . 'px;">';
  		$output .= '<i class="' . $s[ 'icon' ] . ' ks-icon" style="font-size: ' . $width . 'px;"></i>';
  		$output .= '</a>';
  	}
  	$output .= '</div>';

  	return $output;
  }

}
