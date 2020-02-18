<?php

class Glossary {

  private static $instance = null;

	public static function get_instance() {
		if ( null == self::$instance )
			self::$instance = new self;
		return self::$instance;
	}

  public function __construct() {
    $this->searchAction = 'glossary_search';
    $this->detailsAction = 'glossary_details';

    add_action('wp_enqueue_scripts', array($this, 'enqueue'));
    add_action('wp_ajax_nopriv_glossary_search', array($this, 'glossary_search'));
    add_action('wp_ajax_glossary_search', array($this, 'glossary_search'));
    add_action('wp_ajax_nopriv_glossary_details', array($this, 'glossary_details'));
    add_action('wp_ajax_glossary_details', array($this, 'glossary_details'));
  }

  public static function enqueue() {
    wp_enqueue_script(
      'glossary-script',
      get_template_directory_uri().'/assets/js/glossary/index.js',
      array('jquery'),
      1,
      true
    );

    wp_localize_script('glossary-script', 'GLOSSARY', [
      'url' => admin_url('admin-ajax.php'),
      'search_security' => wp_create_nonce($this->searchAction),
      'search_action' => $this->searchAction,
      'details_security' => wp_create_nonce($this->detailsAction),
      'details_action' => $this->detailsAction,
    ]);
  }

  public static function glossary_search() {
    check_ajax_referer('glossary_search', 'security');

  	$html = '';

  	$query = [
  		'post_type' => 'entry',
  		'posts_per_page' => -1,
  		'post_status' => 'publish',
  		's' => $_GET['value']
  	];

  	$results = new WP_Query($query);

  	if ($results->have_posts()) :
  		$html .= '<ul class="glossary-results-list">';
  		while ($results->have_posts()) :
  			$results->the_post();
  			$html .= '<li class="glossary-results-item" data-id="'.get_the_ID().'">'.get_the_title().'</li>';
  		endwhile;
  		$html .= '</ul>';
  	endif;

    echo $html;
  }

  public static function glossary_details() {
    check_ajax_referer('glossary_details', 'security');

  	$html = '';

  	$ID = $_GET['id'];

  	$post = get_post($ID);

  	$taxonomies = [
  		['terms' => get_the_terms($post, 'type'), 'label' => 'Types'],
  		['terms' => get_the_terms($post, 'owner'), 'label' => 'Owners'],
  		['terms' => get_the_terms($post, 'access'), 'label' => 'Access'],
  		['terms' => get_the_terms($post, 'steward'), 'label' => 'Stewards'],
  		['terms' => get_the_terms($post, 'security'), 'label' => 'Security'],
  		['terms' => get_the_terms($post, 'source'), 'label' => 'Sources'],
  		['terms' => get_the_terms($post, 'use'), 'label' => 'Places Used'],
  	];

  	$html .= '<div class="gl-details-post">';
  		$html .= '<h3 class="gl-details-posttitle">'.$post->post_title.'</h3>';
  		$html .= '<div class="gl-details-postcontent">'.$post->post_content.'</div>';
  		$html .= '<div class="gl-details-taxonomies">';
  		foreach ($taxonomies as $tax) {
  			if ($tax) {
  				$html .= '<div class="gl-details-tax">';
  				if ($tax['terms']) {
  					$html .= '<h5 class="gl-details-tax-title">'.$tax['label'].'</h5>';
  					$html .= '<ul class="gl-details-tax-list">';
  						foreach ($tax['terms'] as $item) {
  							$html .= '<li class="gl-details-tax-listitem">'.$item->name.'</li>';
  						}
  					$html .= '</ul>';
  				}
  				$html .= '</div>';
  			}
  		}
  		$html .= '</div>';
  	$html .= '</div>';

    echo $html;
  }

  public static function render() {
    ?>
    <div class="gl-wrapper">
      <div class="gl-search">
        <input type="text" name="search" placeholder="Search Glossary" value="" id="search_glossary_input" />
        <button type="button" class="dark-blue-button" id="search_glossary">Search</button>
        <button type="button" class="transparent-button" id="reset_glossary">Reset</button>
      </div>
      <div class="gl-content">
        <div class="gl-results">
          <h3 class="gl-results-title">Search Results</h3>
          <div id="results_glossary">
          </div>
        </div>
        <div class="gl-details">
          <h3 class="gl-details-title">Term Details</h3>
          <div id="details_glossary">
          </div>
        </div>
      </div>
    </div>
    <?php
  }
}
