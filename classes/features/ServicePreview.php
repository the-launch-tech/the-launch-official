<?php

class ServicePreview {

  public static function setShortcode() {
    add_shortcode('service_preview', 'ServicePreview::render');
  }

  public static function render($atts) {
    $html = '';

    if ($atts) {

    }

    $services = new WP_Query([
      'post_type' => 'service',
      'order' => 'DESC',
      'orderby' => 'date'
    ]);

    if ($services->have_posts()) :
      $html .= '<div class="service-preview-wrapper">';
      while ($services->have_posts()) :
        $services->the_post();
        $html .= '<article class="service-preview-item" data-aos="fade-up" data-aos-duration="700" data-aos-offset="200">';
          $html .= '<div class="service-preview-head">';
            $html .= '<i class="'.get_field('icon', get_the_ID()).'"></i>';
            $html .= '<h4 class="service-preview-title"><a href="'.get_the_permalink().'">'.get_the_title().'</a></h4>';
          $html .= '</div>';
          $html .= '<hr class="service-preview-break" />';
          $html .= '<div class="service-preview-excerpt">'.get_the_excerpt().'</div>';
        $html .= '</article>';
      endwhile;
      $html .= '</div>';
    endif;

    return $html;
  }

}
