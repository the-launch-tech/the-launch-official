<?php

class PortfolioPreview {

  public static function setShortcode() {
    add_shortcode('portfolio_preview', 'PortfolioPreview::render');
  }

  public static function registerApi() {
    add_action('rest_api_init', function () {
      register_rest_route('thelaunch', '/portfolio-preview', array(
        'methods' => 'GET',
        'callback' => function ($params) {
            $paged = $params['paged'] ? (int)$params['paged'] : 1;
            $portfolios = self::query($paged);
            $html = self::loopPortfolios($portfolios);
            echo json_encode(['html' => $html, 'max_num_pages' => $portfolios->max_num_pages]);
          },
      ));
    });
  }

  public static function query($paged = 1) {
    return new WP_Query([
      'post_type' => 'portfolio',
      'posts_per_page' => 8,
      'order' => 'RAND',
      'paged' => (int)$paged
    ]);
  }

  public static function loopPortfolios($portfolios)  {
    $html = '';
    if ($portfolios->have_posts()) :
      while ($portfolios->have_posts()) :
        $portfolios->the_post();
        $clients = get_the_terms(get_the_ID(), 'client');
        $html .= '<article class="portfolio-preview-item" data-aos="fade-up" data-aos-duration="700" data-aos-offset="200">';
          $html .= '<div class="portfolio-preview-content">';
            $html .= '<div class="portfolio-preview-head">';
              $html .= '<h4 class="portfolio-preview-title"><a href="'.get_the_permalink().'">'.get_the_title().'</a></h4>';
              if ($clients) :
                foreach ($clients as $client) :
                  $html .= '<h6 class="portfolio-preview-client">'.$client->name.'</h6>';
                endforeach;
              endif;
            $html .= '</div>';
            $html .= '<hr class="portfolio-preview-break" />';
            $html .= '<div class="portfolio-preview-excerpt">'.get_the_excerpt().'</div>';
          $html .= '</div>';
          if (get_the_post_thumbnail_url()) :
            $html .= '<img class="portfolio-preview-thumbnail" src="'.get_the_post_thumbnail_url().'" alt="'.get_the_title().'" title="'.get_the_title().'">';
          endif;
        $html .= '</article>';
      endwhile;
    else :
      $htlm .= '<p>Unable to find portfolios!</p>';
    endif;
    return $html;
  }

  public static function render($atts) {
    $html = '';

    if ($atts) {

    }

    $portfolios = self::query(1);

    $html .= '<div id="portfolio-preview-wrapper" class="portfolio-preview-wrapper">';
    $html .= '<div id="portfolio-preview-content" class="portfolio-preview-content content-list">';
    $html .= self::loopPortfolios($portfolios);
    $html .= '</div>';
    if ($portfolios->max_num_pages > 1) :
      $html .= '<div class="portfolio-preview-load-wrapper">';
      $html .= '<i id="portfolio-preview-load" class="fal fa-chevron-down"></i>';
      $html .= '</div>';
    endif;
    $html .= '</div>';


    return $html;
  }

}
